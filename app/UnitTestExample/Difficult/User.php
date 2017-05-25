<?php
/**
 * Created by PhpStorm.
 * User: chrisyang
 * Date: 2017/5/24
 * Time: 上午3:28
 */

namespace App\UnitTestExample\Difficult;


class User
{
    private $id;

    private $name;

    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @param $name
     * @return $this|null
     */
    public function find($name)
    {
        if ($name != 'David') {
            return null;
        }

        $this->setId(100);
        $this->setName('David');
        $this->setPassword('59334664');

        return $this;
    }
}