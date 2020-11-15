<?php

namespace App;

class Operation
{
    public static function makeAddition(Money $firstFigure, Money $secondFigure, string $toCurrency): Money
    {
        $amount = $firstFigure->getExchangedAmount($toCurrency) + $secondFigure->getExchangedAmount($toCurrency);
        return Money::createNew($amount, $toCurrency);
    }

    public static function makeSubstraction(Money $firstFigure, Money $secondFigure, string $toCurrency): Money
    {
        $amount = $firstFigure->getExchangedAmount($toCurrency) - $secondFigure->getExchangedAmount($toCurrency);
        return Money::createNew($amount, $toCurrency);
    }

    public static function makeDivision(Money $firstFigure, float $division): Money
    {
        $amount = $firstFigure->getAmount() / $division;
        $currency = $firstFigure->getCurrency();
        $firstFigure->setAmount($amount);
        return $firstFigure;
    }

    public static function makeMultiplication(Money $firstFigure, float $multiplicator): Money
    {
        $amount = $firstFigure->getAmount() * $multiplicator;
        $currency = $firstFigure->getCurrency();
        $firstFigure->setAmount($amount);
        return $firstFigure;
    }

    public static function makeCompare(Money $firstFigure, Money $secondFigure): bool
    {
        $currency = $firstFigure->getCurrency();
        $firstAmount = $firstFigure->getExchangedAmount($currency);
        $secondAmount = $secondFigure->getExchangedAmount($currency);
        return abs($firstAmount - $secondAmount) < PHP_FLOAT_EPSILON;
    }

    public static function roundAmount(Money $money): Money
    {
        $money->setAmount(round($money->getAmount()));
        return $money;
    }

    public static function exchange($money, $toCurrency): Money
    {
        $money->setAmount($money->getExchangedAmount($toCurrency));
        $money->setCurrency($toCurrency);
        return $money;
    }
}
