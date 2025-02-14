<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

// Define routes
$router->add('home', 'HomeController', 'index');
$router->add('login', 'UserController', 'login_page');
$router->add('register', 'UserController', 'register_page');

$router->add('create_user', 'UserController', 'register');

$router->add('events', 'EventController', 'getAllEvents');

$url = $_GET['url'] ?? '';
$router->dispatch($url);
