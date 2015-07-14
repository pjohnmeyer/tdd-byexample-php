<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/13/15
 * Time: 11:47 PM
 */
class Money
{
    protected $amount;
    private $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    static public function dollar($amount)
    {
        return new Dollar($amount, 'USD');
    }

    static public function franc($amount)
    {
        return new Franc($amount, 'CHF');
    }

    public function currency()
    {
        return $this->currency;
    }
}