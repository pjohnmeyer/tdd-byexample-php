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
        return $source->reduce($to);
    }
}