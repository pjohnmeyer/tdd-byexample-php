<?php

require_once 'Money.php';
require_once 'Bank.php';
require_once 'Sum.php';

/**
 * Created by PhpStorm.
 * User: patrick.johnmeyer
 * Date: 7/6/15
 * Time: 10:19 PM
 */
class TestMoney extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->bank = new Bank();
        $this->bank->addRate('CHF', 'USD', 2);
    }

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
        $reduced = $this->bank->reduce($sum, 'USD');
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

    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $result = $this->bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney()
    {
        $result = $this->bank->reduce(Money::dollar(1), 'USD');
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferentCurrency()
    {
        $result = $this->bank->reduce(Money::franc(2), 'USD');
        $this->assertEquals(Money::dollar(1), $result);
    }

    public function testIdentity()
    {
        $this->assertEquals(1, $this->bank->rate('USD', 'USD'));
    }

    public function testMixedAddition()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $result = $this->bank->reduce($fiveBucks->plus($tenFrancs), 'USD');
        $this->assertEquals(Money::dollar(10), $result);
    }

    public function testSumPlusMoney()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $step1 = new Sum($fiveBucks, $tenFrancs);
        $sum = $step1->plus($fiveBucks);
        $result = $this->bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(15), $result);
    }

    public function testSumTimes()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $step1 = new Sum($fiveBucks, $tenFrancs);
        $sum = $step1->times(2);
        $result = $this->bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(20), $result);
    }
}
