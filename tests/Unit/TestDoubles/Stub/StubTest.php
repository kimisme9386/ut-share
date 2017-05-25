<?php

namespace Tests\Unit\Stub;

use Tests\TestCase;
use Mockery as m;
use App\UnitTestExample\User;
use App\UnitTestExample\Auth;
use App\UnitTestExample\ILogger;

class StubTest extends TestCase
{
    public function testStubDouble()
    {

        $userModel = new StubUser();

        $logger = m::mock(ILogger::class);
        $logger->shouldReceive('info')->with('login success')->andReturn('log info : login success');
        $logger->shouldReceive('warn')->with('login fail')->andReturn('log warn: login fail');

        $auth = new Auth($userModel, $logger);

        $this->assertTrue($auth->login('David_fake', 59334664));
        $this->assertFalse($auth->login('David', 123455));
    }

    public function testStubDoubleWithMock()
    {

        $userModel = m::mock(User::class);
        $userModel->shouldReceive('find')->withAnyArgs()->andReturnSelf();
        $userModel->shouldReceive('getPassword')->withAnyArgs()->andReturn('59334664');

        $logger = m::mock(ILogger::class);
        $logger->shouldReceive('info')->with('login success')->andReturn('log info : login success');
        $logger->shouldReceive('warn')->with('login fail')->andReturn('log warn: login fail');
        $auth = new Auth($userModel, $logger);

        $this->assertTrue($auth->login('David', 59334664));
        $this->assertFalse($auth->login('David', 123455));
    }
}

class StubUser
{
    public function find($name)
    {
        return $this;
    }

    public function getPassword()
    {
        return 59334664;
    }
}