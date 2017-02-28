<?php

namespace Extcode\CartSimpleProduct\Domain\Model;

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
 * Product
 *
 * @package cart_simple_product
 * @author Daniel Lorenz <ext.cart.simple.product@extco.de>
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * SKU
     *
     * @var string
     * @validate NotEmpty
     */
    protected $sku = '';

    /**
     * Title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Price
     *
     * @var float
     */
    protected $price = 0.0;

    /**
     * Tax Class Id
     *
     * @var integer
     */
    protected $taxClassId = 1;

    /**
     * Returns SKU
     *
     * @return string $sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Sets SKU
     *
     * @param string $sku
     *
     * @return void
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * Returns Title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets Title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * Returns Price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets Price
     *
     * @param float $price
     *
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Returns TaxClassId
     *
     * @return integer
     */
    public function getTaxClassId()
    {
        return $this->taxClassId;
    }

    /**
     * Sets TaxClassId
     *
     * @param integer $taxClassId
     *
     * @return void
     */
    public function setTaxClassId($taxClassId)
    {
        $this->taxClassId = $taxClassId;
    }
}
