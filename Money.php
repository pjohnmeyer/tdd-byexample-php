<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/13/15
 * Time: 11:47 PM
 */
abstract class Money
{
    protected $amount;

    static public function dollar($amount)
    {
        return new Dollar($amount);
    }

    static public function franc($amount)
    {
        return new Franc($amount);
    }

    public abstract function currency();
}