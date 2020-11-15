<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\{
    Product,
    Money
};

class ProductTest extends TestCase
{
    public function testCanCreate(): void
    {
        $product = Product::createNew(Money::createNew(35999, "CZK"), "Telefon A", 15);
        $this->assertInstanceOf(
            Product::class,
            $product
        );
    }

    public function testCanSetAttributes(): void
    {
        $product = Product::createNew(Money::createNew(35999, "CZK"), "Telefon A", 15);
        $product->setMoney(Money::createNew(1200, "EUR"));
        $this->assertEquals($product->getMoney()->getAmount(), 1200);
        $this->assertEquals($product->getMoney()->getCurrency(), "EUR");
        $product->setName("Telefon B");
        $this->assertEquals($product->getName(), "Telefon B");
        $product->setSoldAmount(10);
        $this->assertEquals($product->getSoldAmount(), 10);
    }
}
