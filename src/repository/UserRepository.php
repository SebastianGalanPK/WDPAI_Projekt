<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByLogin(string $login): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM Users WHERE login = :login
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
            $user['email']
        );
    }
}