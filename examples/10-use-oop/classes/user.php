<?php

class User
{
    private $firstName;

    public function register($username, $password)
    {
        // Control parameters and register user.
    }

    public function login($username, $password)
    {
        // Check if user exists
    }

    public function getName()
    {
        return $this->firstName;
    }
}

