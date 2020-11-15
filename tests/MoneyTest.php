<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Money;

class MoneyTest extends TestCase
{
    private $money;

    public function testCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Money::class,
            Money::createNew(125, "CZK")
        );
    }

    public function testCanGetAmount(): void
    {
        $money = Money::createNew(125, "CZK");
        $this->assertEquals(125, $money->getAmount());
    }

    public function testCanGetCurrency(): void
    {
        $money = Money::createNew(125, "CZK");
        $this->assertEquals("CZK", $money->getCurrency());
    }
}
