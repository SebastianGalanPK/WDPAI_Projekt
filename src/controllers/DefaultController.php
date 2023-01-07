<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/CommunityRepository.php';

class DefaultController extends AppController{

    public function index(){
        //$cr = new CommunityRepository();
        //$community = $cr->getUserCommunity(9);

        $this->render('home', ['user_community' => $community]);
    }

    public function home(){
        //$cr = new CommunityRepository();
        //$community = $cr->getUserCommunity(9);

        $this->render('home', ['user_community' => $community]);
    }

    public function signIn(){
        $this->render('signIn');
    }

    public function signUp(){
        $this->render('signUp');
    }
}
?>