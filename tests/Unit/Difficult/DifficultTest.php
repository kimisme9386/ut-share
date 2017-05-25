<?php

namespace Tests\Unit\Difficult;

use Tests\TestCase;
use Mockery as m;
use App\UnitTestExample\Difficult\User;
use App\UnitTestExample\Difficult\Auth;

class DifficultTest extends TestCase
{
//    public function testAuth()
//    {
//        $auth = new Auth();
//        $this->assertTrue($auth->login('David', 59334664));
//        $this->assertFalse($auth->login('David_fake', 59334664));
//        $this->assertFalse($auth->login('David', 12345));
//    }

    public function testAuthNoneIoc()
    {
        $mockUser = m::mock('overload:' . User::class);
        $mockUser->shouldReceive('find')->withAnyArgs()->andReturnSelf();
        $mockUser->shouldReceive('getPassword')->andReturn('12345');

        $auth = new Auth();
        $this->assertTrue($auth->login('David_fake', '12345'));
    }
}