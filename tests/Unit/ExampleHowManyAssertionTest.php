<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午12:06
 */

namespace Tests\Unit;

use Tests\TestCase;
use App\UnitTestExample\Order;

class ExampleHowManyAssertionTest extends TestCase
{
    public function testOrderNormal()
    {
        $order = new Order(100, 5);
        $this->assertEquals(500, $order->getAmount());

        $order = new Order(0, 5);
        $this->assertEquals(0, $order->getAmount());
    }

    public function testOrderExceptionWithQtyIsZero()
    {
        $this->expectExceptionMessage('qty must be granter than zero.');
        $order = new Order(100, 0);
        $order->getAmount();
    }

    public function testOrderExceptionWithPriceIsNegative()
    {
        $this->expectExceptionMessage('price must be positive.');
        $order = new Order(-1, 1);
        $order->getAmount();
    }
}