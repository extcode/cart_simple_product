<?php

namespace Extcode\CartSimpleProduct\Utility;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Product Utility
 *
 * @package cart_simple_product
 * @author Daniel Lorenz <ext.cart.simple.product@extco.de>
 */
class ProductUtility
{
    /**
     * Object Manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * @var array
     */
    protected $cartConf;

    /**
     * @var array
     */
    protected $cartSimpleProductConf;

    /**
     * Intitialize
     */
    public function __construct()
    {
        $this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Extbase\Object\ObjectManager::class
        );

        $this->configurationManager = $this->objectManager->get(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class
        );

        $this->cartConf = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'Cart'
        );

        $this->cartSimpleProductConf = $this->configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'CartSimpleProduct'
        );
    }

    public function loadCartProductFromForeignDataStorage($params)
    {
        $cartProductValues = $params['cartProductValues'];
        $productStorageId = $params['productStorageId'];

        $cartProduct = $params['cartProduct'];
        $taxClasses = $params['taxClasses'];

        if (intval($this->cartSimpleProductConf['settings']['productStorageId']) === $productStorageId) {
            $productStorageConf = $this->cartConf['productStorages'][$productStorageId];
            if ($productStorageConf['class'] == 'Extcode\CartSimpleProduct\Domain\Repository\ProductRepository') {
                $productId = intval($cartProductValues['productId']);

                $productRepository = $this->objectManager->get(
                    \Extcode\CartSimpleProduct\Domain\Repository\ProductRepository::class
                );

                /** @var \Extcode\CartSimpleProduct\Domain\Model\Product $productProduct */
                $productProduct = $productRepository->findByUid($productId);

                $cartProduct = new \Extcode\Cart\Domain\Model\Cart\Product(
                    $productType = 100,
                    $productProduct->getUid(),
                    $productStorageId,
                    null,
                    $productProduct->getSku(),
                    $productProduct->getTitle(),
                    $productProduct->getPrice(),
                    $taxClasses[$productProduct->getTaxClassId()],
                    $cartProductValues['quantity'],
                    $isNetPrice = false,
                    $feVariant = null
                );
            }

            $params['cartProduct'] = $cartProduct;
        }

        return [$params];
    }
}
