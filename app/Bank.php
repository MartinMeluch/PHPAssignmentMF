<?php

namespace App;

class Bank
{
    private $bank;

    private function __construct()
    {
        $this->bank = [];
    }

    public static function createNew(): Bank
    {
        return new self();
    }

    public function getBank(): array
    {
        return $this->bank;
    }

    public function addProduct(Product $product): void
    {
        $this->bank[] = $product;
    }

    public function getTotal($toCurrency): Money
    {
        $totalAmount = 0;
        foreach ($this->bank as $product) {
            $money = $product->getMoney();
            $money = Operation::makeMultiplication($money, $product->getSoldAmount());
            $totalAmount += $money->getExchangedAmount($toCurrency);
        }
        $resultTotal = Money::createNew($totalAmount, $toCurrency);
        return $resultTotal;
    }
}
