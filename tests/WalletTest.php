<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\{
    Wallet,
    Money
};

class WalletTest extends TestCase
{
    private $wallet;

    public function setUp(): void
    {
        $this->wallet = new Wallet();
    }

    public function testCanAddContent(): void
    {
        $newContentToBeAdded = Money::createNew(125, "CZK");
        $this->wallet->addToContent($newContentToBeAdded);
        $this->assertContains(
            $newContentToBeAdded,
            $this->wallet->getWallet()
        );
    }

    public function testCanMakeSumWithoutCurrency(): void
    {
        $this->wallet->addToContent(
            Money::createNew(2000, "CZK")
        );
        $this->wallet->addToContent(
            Money::createNew(100, "CZK")
        );
        $this->wallet->addToContent(
            Money::createNew(50, "CZK")
        );
        $this->assertEquals($this->wallet->toSum(), 2150);
    }

    public function testCanMakeSumWithCurrency(): void
    {
        $this->wallet->addToContent(
            Money::createNew(2000, "CZK")
        );
        $this->wallet->addToContent(
            Money::createNew(100, "EUR")
        );
        $this->wallet->addToContent(
            Money::createNew(50, "USD")
        );
        $this->assertEquals($this->wallet->toSumWithCurrency("CZK")->getAmount(), 5700);
    }
}
