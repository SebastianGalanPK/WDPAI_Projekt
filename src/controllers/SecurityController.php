<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render("signIn");
        }

        $login = $_POST["login"];
        $password = $_POST["password"];

        $user = $userRepository->getUserByLogin($login);

        if(!$user){
            return $this->render("signIn", ['messages' => ['User with this login not exist!']]);
        }

        if($login!==$user->getLogin()){
            return $this->render("signIn", ['messages' => ['User with this login not exist!']]);
        }

        if($password!==$user->getPassword()){
            return $this->render("signIn", ['messages' => ['Wrong password!']]);
        }
        
        return $this->render('home');
    }

    public function register(){
        if(!$this->isPost()){
            return $this->render("signUp");
        }

        $login = $_POST["login"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        return $this->render('home');
    }
}

?>