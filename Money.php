<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/13/15
 * Time: 11:47 PM
 */
class Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
        $child_class = get_class($this);
        return new $child_class($this->amount * $multiplier);
    }
}