<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午3:46
 */

namespace Tests\Unit\Dummy;

use Tests\TestCase;
use Mockery as m;
use App\UnitTestExample\User;
use App\UnitTestExample\Auth;
use App\UnitTestExample\ILogger;

class DummyTest extends TestCase
{
    public function testDummyDouble()
    {
        $userModel = new User();
        $logger = new DummyLogger();
        $auth = new Auth($userModel, $logger);

        $this->assertTrue($auth->login('David', 59334664));
        $this->assertFalse($auth->login('John', 59334664));
        $this->assertFalse($auth->login('David', 123455));
    }

    public function testDummyDoubleWithMock()
    {

        $userModel = new User();

        $logger = m::mock(ILogger::class);
        $logger->shouldReceive('info')->withAnyArgs()->andReturnNull();
        $logger->shouldReceive('warn')->withAnyArgs()->andReturnNull();

        $auth = new Auth($userModel, $logger);

        $this->assertTrue($auth->login('David', 59334664));
        $this->assertFalse($auth->login('John', 59334664));
        $this->assertFalse($auth->login('David', 123455));
    }
}


class DummyLogger implements ILogger
{
    public function info($message)
    {
        return null;
    }

    public function warn($message)
    {
        return null;
    }
}