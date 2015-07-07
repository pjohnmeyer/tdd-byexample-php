<?php

require_once 'Dollar.php';

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
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    // PHP thankfully gives us member-wise equality for free
    public function testEquality()
    {
        $this->assertEquals(new Dollar(5), new Dollar(5));
        $this->assertNotEquals(new Dollar(5), new Dollar(6));
    }
}
