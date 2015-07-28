<?php

require_once 'Money.php';
require_once 'Bank.php';

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
        $this->assertNotEquals(Money::franc(5), Money::dollar(5));
    }

    public function testCurrency()
    {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);

        // using assertInstanceOf where the type system handles things in the
        // Java examples
        $this->assertInstanceOf('Expression', $sum);
        $this->assertInstanceOf('Sum', $sum);
        $this->assertEquals($five, $sum->augend); // (FWIW I normally use "lhs" and "rhs")
        $this->assertEquals($five, $sum->addend);
    }
}
