<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

// Define routes
$router->add('home', 'HomeController', 'index', ['AuthMiddleware']);
$router->add('login', 'UserController', 'login_page');
$router->add('register', 'UserController', 'register_page');

$router->add('create_user', 'UserController', 'register');
$router->add('find_user', 'UserController', 'login');
$router->add('logout', 'UserController', 'logout');

$router->add('events', 'EventController', 'getAllEvents', ['AuthMiddleware']);
$router->add('event/details/{event_id}', 'EventController', 'eventDetails', ['AuthMiddleware']);

$router->add('admin/dashboard', 'AdminController', 'index', ['AuthMiddleware', 'RoleMiddleware::admin']);
$router->add('organizer/dashboard', 'OrganizerController', 'index', ['AuthMiddleware', 'RoleMiddleware::organizer']);

$url = $_GET['url'] ?? '';
$router->dispatch($url);