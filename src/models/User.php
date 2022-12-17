<?php

class User{
    private $login;
    private $password;
    private $email;

    public function __construct(string $login, string $password, string $email)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }
}

?>