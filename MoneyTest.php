<?php

require_once 'Dollar.php';
require_once 'Franc.php';

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/6/15
 * Time: 10:19 PM
 */
class TestMoney extends PHPUnit_Framework_TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    // PHP thankfully gives us member-wise equality for free
    public function testEquality()
    {
        $this->assertEquals(Money::dollar(5), Money::dollar(5));
        $this->assertNotEquals(Money::dollar(5), Money::dollar(6));
        $this->assertEquals(new Franc(5), new Franc(5));
        $this->assertNotEquals(new Franc(5), new Franc(6));
        $this->assertNotEquals(new Franc(5), Money::dollar(5));
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}
