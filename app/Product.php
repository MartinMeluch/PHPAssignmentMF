<?php

namespace App;

class Product
{

    private $money;
    private $name;
    private $soldAmount;

    private function __construct(Money $money, string $name, int $soldAmount)
    {
        $this->money = $money;
        $this->name = $name;
        $this->soldAmount = $soldAmount;
    }

    public static function createNew(Money $money, string $name, int $soldAmount)
    {
        return new self($money, $name, $soldAmount);
    }

    public function getBank(): Bank
    {
        return $this->bank;
    }

    public function getSoldAmount(): int
    {
        return $this->soldAmount;
    }

    public function getMoney(): Money
    {
        return $this->money;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSoldAmount(int $soldAmount): void
    {
        $this->soldAmount = $soldAmount;
    }

    public function setMoney(Money $money): void
    {
        $this->money = $money;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
