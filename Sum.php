<?php

require_once 'Expression.php';

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
}