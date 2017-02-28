<?php

namespace Extcode\CartSimpleProduct\Controller;

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

/**
 * Product Controller
 *
 * @package cart_simple_product
 * @author Daniel Lorenz <ext.cart.simple.product@extco.de>
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * productRepository
     *
     * @var \Extcode\CartSimpleProduct\Domain\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @param \Extcode\CartSimpleProduct\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(
        \Extcode\CartSimpleProduct\Domain\Repository\ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * Initialize Action
     *
     * @return void
     */
    protected function initializeAction()
    {
        $configurationManager = $this->objectManager->get(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::class
        );

        $cartConfiguration =
            $configurationManager->getConfiguration(
                \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
                'Cart'
            );

        $this->settings['cart']['pid'] = $cartConfiguration['settings']['cart']['pid'];
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $products = $this->productRepository->findAll();

        $this->view->assign('products', $products);
    }

    /**
     * action show
     *
     * @param \Extcode\CartSimpleProduct\Domain\Model\Product $product
     *
     * @ignorevalidation $product
     *
     * @return void
     */
    public function showAction(\Extcode\CartSimpleProduct\Domain\Model\Product $product = null)
    {
        if (empty($product)) {
            $this->forward('list');
        }

        $this->view->assign('product', $product);
    }
}
