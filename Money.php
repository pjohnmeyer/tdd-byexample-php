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

    public function times($multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }
}