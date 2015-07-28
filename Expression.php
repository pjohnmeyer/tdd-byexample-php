<?php

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/21/15
 * Time: 12:43 AM
 */
interface Expression
{
    public function reduce(Bank $bank, $to);

    public function plus(Expression $addend);
}