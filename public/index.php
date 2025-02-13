<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

// Define routes
$router->add('', 'HomeController', 'index', ['RoleMiddleware::admin']);
$router->add('login', 'AuthController', 'login');
$router->add('event', 'UserController', 'index');

$url = $_GET['url'] ?? '';
$router->dispatch($url);
