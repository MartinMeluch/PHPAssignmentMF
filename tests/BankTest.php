<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\{
    Bank,
    Product,
    Money
};

class BankTest extends TestCase
{
    private $bank;

    public function setUp(): void
    {
        $this->bank = Bank::createNew();
    }

    public function testCanCreate(): void
    {
        $this->assertInstanceOf(
            Bank::class,
            $this->bank
        );
    }

    public function testCanAdd(): void
    {
        $product = Product::createNew(Money::createNew(35999, "CZK"), "Telefon A", 15);
        $this->bank->addProduct($product);
        $this->assertContains(
            $product,
            $this->bank->getBank()
        );
    }

    public function testCanReturnTotal(): void
    {
        $firstProduct = Product::createNew(Money::createNew(35999, "CZK"), "Telefon A", 15);
        $this->bank->addProduct($firstProduct);
        $secondProduct = Product::createNew(Money::createNew(178, "EUR"), "Modem B", 30);
        $this->bank->addProduct($secondProduct);
        $total = $this->bank->getTotal("CZK");
        $this->assertEquals($total->getAmount(), 678825);
        $this->assertEquals($total->getCurrency(), "CZK");
    }
}
