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
    public function __construct($amount)
    {
        $this->amount = $amount;
    }
}