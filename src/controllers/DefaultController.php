<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/CommunityRepository.php';

class DefaultController extends AppController{

    public function index(){
        $this->render('home');
    }

    public function home(){
        $this->render('home');
    }

    public function signIn(){
        $this->render('signIn');
    }

    public function signUp(){
        $this->render('signUp');
    }
}
?>