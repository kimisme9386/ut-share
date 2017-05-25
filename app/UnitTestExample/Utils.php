<?php

namespace App\UnitTestExample;


class Utils
{
    public static function numberFormat($number, $decimals)
    {
        return number_format($number, $decimals, '.', '');
    }
}