<?php

namespace Tests\Unit\Spy;

use Tests\TestCase;
use Mockery as m;
use App\UnitTestExample\User;
use App\UnitTestExample\Auth;
use App\UnitTestExample\ILogger;

class SpyTest extends TestCase
{
    public function testSpyDouble()
    {
        $userModel = m::mock(User::class);
        $userModel->shouldReceive('find')->withAnyArgs()->andReturnSelf();
        $userModel->shouldReceive('getPassword')->withAnyArgs()->andReturn('59334664');

        $logger = new SpyLogger();

        $auth = new Auth($userModel, $logger);

        $auth->login('David', 59334664);

        $this->assertEquals(1, $logger->callInfoCount);

    }

    public function testSpyDoubleWithMock()
    {
        $userModel = m::mock(User::class);
        $userModel->shouldReceive('find')->withAnyArgs()->andReturnSelf();
        $userModel->shouldReceive('getPassword')->withAnyArgs()->andReturn('59334664');

        $logger = m::spy(ILogger::class);
        $logger->shouldReceive('info')->withAnyArgs()->andReturn('log info : login success')->once();

        $auth = new Auth($userModel, $logger);

        $auth->login('David', 59334664);
    }
}

class SpyLogger implements ILogger
{
    public $callInfoCount = 0;

    public $callWarnCount = 0;

    public function info($message)
    {
        $this->callInfoCount++;
        echo 'log info : ' . $message . "\n";
    }

    public function warn($message)
    {
        $this->callWarnCount++;
        echo 'log warn : ' . $message . "\n";
    }
}