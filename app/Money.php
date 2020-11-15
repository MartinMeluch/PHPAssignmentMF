<?php

namespace App;

define('EXCHANGE_RATES', [
    "CZK" => [
        "CZK" => 1,
        "EUR" => 26,
        "USD" => 22
    ],
    "EUR" => [
        "CZK" => 0.04,
        "EUR" => 1,
        "USD" => 0.89
    ],
    "USD" => [
        "CZK" => 0.04,
        "EUR" => 1.12,
        "USD" => 1
    ]
]);


class Money
{

    private $amount;
    private $currency;

    private function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function createNew(float $amount, string $currency)
    {
        return new self($amount, $currency);
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getExchangedAmount(string $toCurrency): float
    {
        return $this->amount * EXCHANGE_RATES[$toCurrency][$this->currency];
    }
}
