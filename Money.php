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