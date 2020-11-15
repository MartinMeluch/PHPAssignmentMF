<?php

namespace App;

class Wallet
{
    private $content;

    public function __construct()
    {
        $this->content = array();
    }

    public function addToContent(Money $newContent): void
    {
        $this->content[] = $newContent;
    }

    public function getWallet(): array
    {
        return $this->content;
    }

    public function toSum(): float
    {
        $sum = 0;
        foreach ($this->content as $money) {
            $sum += $money->getAmount();
        }
        return $sum;
    }

    public function toSumWithCurrency($toCurrency): Money
    {
        $sum = 0;
        foreach ($this->content as $money) {
            $sum += $money->getExchangedAmount($toCurrency);
        }
        return Money::createNew($sum, $toCurrency);
    }
}
