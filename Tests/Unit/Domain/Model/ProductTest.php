<?php

namespace Extcode\CartSimpleProduct\Tests\Domain\Model;

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
 * Product Test
 *
 * @package cart_simple_product
 * @author Daniel Lorenz <ext.cart.simple.product@extco.de>
 */
class ProductTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * Product
     *
     * @var \Extcode\CartSimpleProduct\Domain\Model\Product
     */
    protected $product = null;

    protected function setUp()
    {
        $this->product = new \Extcode\CartSimpleProduct\Domain\Model\Product();
    }

    protected function tearDown()
    {
        unset($this->product);
    }

    /**
     * @test
     */
    public function getSkuReturnsInitialValue()
    {
        $this->assertSame(
            '',
            $this->product->getSku()
        );
    }

    /**
     * @test
     */
    public function setSkuSetsSku()
    {
        $this->product->setSku('SKU');

        $this->assertSame(
            'SKU',
            $this->product->getSku()
        );
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValue()
    {
        $this->assertSame(
            '',
            $this->product->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $this->product->setTitle('Title');

        $this->assertSame(
            'Title',
            $this->product->getTitle()
        );
    }

    /**
     * @test
     */
    public function getPriceReturnsInitialValue()
    {
        $this->assertSame(
            0.0,
            $this->product->getPrice()
        );
    }

    /**
     * @test
     */
    public function setPriceSetsPrice()
    {
        $this->product->setPrice(10.00);

        $this->assertSame(
            10.00,
            $this->product->getPrice()
        );
    }

    /**
     * @test
     */
    public function getTaxClassIdReturnsInitialValue()
    {
        $this->assertSame(
            1,
            $this->product->getTaxClassId()
        );
    }

    /**
     * @test
     */
    public function setTaxClassIdSetsTaxClassId()
    {
        $this->product->setTaxClassId(2);

        $this->assertSame(
            2,
            $this->product->getTaxClassId()
        );
    }
}
