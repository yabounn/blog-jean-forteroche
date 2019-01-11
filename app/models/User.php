<?php
namespace App\Models;

class User extends Model
{
    private $id;
    private $username;
    private $password;
    private $email;

    public function setId($userId)
    {
        $userId = (int) $userId;

        if($userId > 0)
        {
            $this->id = $userId;
        }
    }

    public function setUsername($username)
    {
        if(is_string($username))
        {
            $this->username = $username;
        }
    }

    public function setPassword($userPassword)
    {
        if($userPassword)
        {
            $this->password = $userPassword;
        }
    }

    public function setEmail($addressMail)
    {
        if($addressMail)
        {
            $this->email = $addressMail;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username; 
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }
}