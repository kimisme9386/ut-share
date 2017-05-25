<?php

namespace Tests\Unit\Fake;

use Tests\TestCase;
use Mockery as m;
use App\UnitTestExample\User;
use App\UnitTestExample\Auth;
use App\UnitTestExample\ILogger;

class FakeTest extends TestCase
{
    public function testStubDouble()
    {

        $userModel = new FakeUser();

        $logger = m::mock(ILogger::class);
        $logger->shouldReceive('info')->with('login success')->andReturn('log info : login success');
        $logger->shouldReceive('warn')->with('login fail')->andReturn('log warn: login fail');
        $auth = new Auth($userModel, $logger);

        $this->assertTrue($auth->login('David', 59334664));
        $this->assertFalse($auth->login('David', 123455));
    }
}

class FakeUser
{
    public function find($name)
    {
        if ($name == 'David') {
            return $this;
        } else {
            return null;
        }
    }

    public function getPassword()
    {
        return 59334664;
    }
}