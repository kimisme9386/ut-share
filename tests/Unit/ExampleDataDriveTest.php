<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/23
 * Time: 下午11:08
 */

namespace Tests\Unit;

use Tests\TestCase;
use App\UnitTestExample\Utils;

class ExampleDataDriveTest extends TestCase
{

    public function testNumberFormatNormal()
    {
        $this->assertEquals(20.12, Utils::numberFormat(20.12345, 2));
        $this->assertEquals(1024.23, Utils::numberFormat(1024.23456, 2));
        $this->assertEquals(2048.35, Utils::numberFormat(2048.34567, 2));
        $this->assertEquals(4096.46, Utils::numberFormat(4096.45678, 2));
        $this->assertEquals(-12345.12, Utils::numberFormat(-12345.12345, 2));
    }

    /**
     *  @dataProvider additionProvider
     *
     * @param $expected
     * @param $number
     */
    public function testNumberFormat($expected, $number)
    {
        $this->assertEquals($expected, Utils::numberFormat($number, 2));
    }

    public function additionProvider()
    {
        return [
            [20.12, 20.12345],
            [1024.23, 1024.23456],
            [2048.35, 2048.34567],
            [-12345.12, -12345.12345]
        ];
    }
}