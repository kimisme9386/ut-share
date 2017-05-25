<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午3:28
 */

namespace App\UnitTestExample\Difficult;


class Auth
{
    public function login($id, $password)
    {
        $user = new User();
        $logger = new Logger();

        /** @var  $findUser User */
        $findUser = $user->find($id);

        if ($findUser && $findUser->getPassword() == $password) {
            $logger->info('login success');
            return true;
        }

        $logger->warn('login fail');
        return false;
    }
}