<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\{
    Operation,
    Money
};

class OperationTest extends TestCase
{
    public function testCanAdd(): void
    {
        $money = Operation::makeAddition(
            Money::createNew(2000, "CZK"),
            Money::createNew(100, "EUR"),
            "CZK"
        );
        $this->assertEquals($money->getAmount(), 4600);
    }

    public function testCanSubstract(): void
    {
        $money = Operation::makeSubstraction(
            Money::createNew(2000, "CZK"),
            Money::createNew(10, "EUR"),
            "CZK"
        );
        $this->assertEquals($money->getAmount(), 1740);
    }

    public function testCanDivide(): void
    {
        $money = Operation::makeDivision(
            Money::createNew(2000, "CZK"),
            20
        );
        $this->assertEquals($money->getAmount(), 100);
    }

    public function testCanMultiple(): void
    {
        $money = Operation::makeMultiplication(
            Money::createNew(2000, "CZK"),
            5
        );
        $this->assertEquals($money->getAmount(), 10000);
    }

    public function testCanCompareSame(): void
    {
        $firstMoney = Money::createNew(2600, "CZK");
        $secondMoney = Money::createNew(100, "EUR");
        $this->assertTrue(Operation::makeCompare($firstMoney, $secondMoney));
    }

    public function testCanCompareDifferent(): void
    {
        $firstMoney = Money::createNew(2600, "CZK");
        $secondMoney = Money::createNew(150, "EUR");
        $this->assertFalse(Operation::makeCompare($firstMoney, $secondMoney));
    }

    public function testCanRoundDown(): void
    {
        $money = Money::createNew(200.44, "CZK");
        $money = Operation::roundAmount($money);
        $this->assertEquals(200, $money->getAmount());
    }

    public function testCanRoundUp(): void
    {
        $money = Money::createNew(200.74, "CZK");
        $money = Operation::roundAmount($money);
        $this->assertEquals(201, $money->getAmount());
    }

    public function testCanExchange(): void
    {
        $money = Money::createNew(150, "EUR");
        $money = Operation::exchange($money, "CZK");
        $this->assertEquals($money->getAmount(), 3900);
        $this->assertEquals($money->getCurrency(), "CZK");
    }
}
