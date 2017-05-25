<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/23
 * Time: 下午11:53
 */

namespace App\UnitTestExample\Difficult;


use Mockery\Exception;

class Order
{
    private $price;
    private $qty;

    public function __construct($price, $qty)
    {
        $this->price = $price;
        $this->qty = $qty;
    }

    public function getAmount()
    {
        if ($this->qty < 1) {
            throw new Exception("qty must be granter than zero.");
        }

        if ($this->price < 0) {
            throw new Exception("price must be positive.");
        }

        return $this->price * $this->qty;
    }
}