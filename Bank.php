<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/21/15
 * Time: 12:43 AM
 */
class Bank
{
    public function reduce(Expression $source, $to)
    {
        $amount = $source->augend->amount + $source->addend->amount;
        return new Money($amount, $to);
    }
}