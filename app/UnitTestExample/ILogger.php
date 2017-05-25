<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午4:10
 */

namespace App\UnitTestExample;


interface ILogger
{
    public function info($message);

    public function warn($message);
}