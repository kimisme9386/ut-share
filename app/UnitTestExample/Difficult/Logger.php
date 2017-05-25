<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午3:28
 */

namespace App\UnitTestExample\Difficult;


class Logger
{
    public function info($message)
    {
        echo 'log info : ' . $message . "\n";
    }

    public function warn($message)
    {
        echo 'log warn : ' . $message . "\n";
    }
}