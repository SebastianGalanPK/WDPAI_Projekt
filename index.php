<?php
    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('home', 'DefaultController');
    Routing::get('signIn', 'DefaultController');
    Routing::get('signUp', 'DefaultController');

    Routing::get('login', 'SecurityController');
    Routing::get('register', 'SecurityController');

    Routing::run($path);
?>