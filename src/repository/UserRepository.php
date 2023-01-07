<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByLogin(string $login): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."User" WHERE login = :login
        ');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

        return new User(
            $user['login'],
            $user['password'],
            $user['email'],
            $user['rank'],
            $user['id']
        );
    }

    public function getUserByEmail(string $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public."User" WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            return null;
        }

        return new User(
            $user['login'],
            $user['password'],
            $user['email'],
            $user['rank'],
            $user['id']
        );
    }

    public function addNewUser(string $login, string $password, string $email){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public."User" (id, login, password, email) VALUES (DEFAULT, :login, :password, :email);
        ');

        $stmt->bindParam(':login',$login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email',$email, PDO::PARAM_STR);
        $stmt->execute();
    }
}