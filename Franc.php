<?php

require_once 'Money.php';
/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/6/15
 * Time: 11:24 PM
 */
class Franc extends Money
{
    public function __construct($amount, $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier, $this->currency);
    }
}