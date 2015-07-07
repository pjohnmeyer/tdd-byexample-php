<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/6/15
 * Time: 11:24 PM
 */
class Franc
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}