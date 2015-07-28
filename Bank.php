<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/21/15
 * Time: 12:43 AM
 */
class Bank
{
    private $rateTable = array();

    public function reduce(Expression $source, $to)
    {
        return $source->reduce($this, $to);
    }

    public function addRate($from, $to, $rate)
    {
        $this->rateTable[$from][$to] = $rate;
    }

    public function rate($from, $to)
    {
        return $this->rateTable[$from][$to];
    }
}