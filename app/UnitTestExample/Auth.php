<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午3:28
 */

namespace App\UnitTestExample;


class Auth
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Logger
     */
    protected $logger;

    public function __construct($user, ILogger $logger)
    {
        $this->user = $user;
        $this->logger = $logger;
    }

    public function login($id, $password)
    {
        /** @var  $findUser User */
        $findUser = $this->user->find($id);

        if ($findUser && $findUser->getPassword() == $password) {
            $this->logger->info('login success');
            return true;
        }

        $this->logger->warn('login fail');
        return false;
    }
}