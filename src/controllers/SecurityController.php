<?php
session_start();

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

        //$pass = password_verify($user->getPassword(), PASSWORD_BCRYPT);

        if(password_verify($password, $user->getPassword())){
            return $this->render("signIn", ['messages' => ['Wrong password!']]);
        }

        $_SESSION['user_session'] = serialize($user);

        header("Location: /../../index.php");
        exit();
    }

    public function register(){
        if(!$this->isPost()){
            return $this->render("signUp");
        }

        $userRepository = new UserRepository();

        $login = $_POST["login"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $login = trim($login);
        $password = trim($password);
        $email = trim($email);

        if(strlen($login) < 5 || strlen($login)>16){
            return $this->render("signUp", ['messages' => ['Your login should be between 5 and 16 letters.']]);
        }
        if(strlen($password) < 8){
            return $this->render("signUp", ['messages' => ['Your password should have at least 8 letters.']]);
        }
        if(strlen($email) < 3){
            return $this->render("signUp", ['messages' => ['Your email is not valid']]);
        }

        if($userRepository->getUserByLogin($login)!=null){
            return $this->render("signUp", ['messages' => ['This login is taken!']]);
        }
        if($userRepository->getUserByEmail($email)!=null){
            return $this->render("signUp", ['messages' => ['This email is taken!']]);
        }

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $userRepository->addNewUser($login, $passwordHashed, $email);

        //$user = new User($login, $passwordHashed, $email, 0);

        //header("Location: signIn.php");

        return $this->render('signIn', ['messages'=> ['Sing In Now']]);
    }

    public function logout(){
        unset($_SESSION['user_session']);

        header("Location: /../../index.php");
        exit();
    }
}

?>