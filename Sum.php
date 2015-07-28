<?php

require_once 'Expression.php';
require_once 'Money.php';

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/27/15
 * Time: 10:18 PM
 */
class Sum implements Expression
{
    public $augend;
    public $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, $to)
    {
        $amount = $this->augend->reduce($bank, $to)->amount
            + $this->addend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
    }

    public function plus(Expression $addend)
    {
        return new Sum($this, $addend);
    }
}