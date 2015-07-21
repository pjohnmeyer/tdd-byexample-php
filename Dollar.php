<?php

require_once 'Money.php';

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/6/15
 * Time: 10:32 PM
 */
class Dollar extends Money
{
    public function __construct($amount, $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times($multiplier)
    {
        return new Dollar($this->amount * $multiplier, $this->currency);
    }
}