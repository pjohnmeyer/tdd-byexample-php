<?php

require_once 'Expression.php';

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/13/15
 * Time: 11:47 PM
 */
class Money implements Expression
{
    public $amount;
    public $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    static public function dollar($amount)
    {
        return new Money($amount, 'USD');
    }

    static public function franc($amount)
    {
        return new Money($amount, 'CHF');
    }

    public function currency()
    {
        return $this->currency;
    }

    public function times($multiplier)
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $addend)
    {
        return new Sum($this, $addend);
    }

    public function reduce($to)
    {
        return $this;
    }
}