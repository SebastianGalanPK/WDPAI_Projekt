<?php
    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('home', 'DefaultController');
    Routing::get('signIn', 'DefaultController');
    Routing::get('signUp', 'DefaultController');

    Routing::post('login', 'SecurityController');
    Routing::post('register', 'SecurityController');
    Routing::post('logout', 'SecurityController');

    Routing::post('addNewMeme', 'MemeController');

    Routing::run($path);
?>