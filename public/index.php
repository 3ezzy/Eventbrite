<?php

define('ROOT', dirname(__FILE__));

// Autoloader de Composer
require_once ROOT . '/../vendor/autoload.php';

// Configuration de base
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Chargement des classes core
require_once ROOT . '/../core/Controller.php';
require_once ROOT . '/../core/Model.php';
require_once ROOT . '/../core/Router.php';

// Configuration de Twig
$loader = new \Twig\Loader\FilesystemLoader(ROOT . '/../app/views');
$twig = new \Twig\Environment($loader, [
    'cache' => ROOT . '/../app/cache',
    'debug' => true
]);
global $twig;

// Traitement de l'URL
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = explode('/', $url);

// Définition du contrôleur et de l'action
$controller = !empty($url[0]) ? $url[0] : 'home';
$action = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

// Formatage du nom du contrôleur
$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = ROOT . '/../app/controllers/' . $controllerClass . '.php';

try {
    if (!file_exists($controllerFile)) {
        throw new Exception("Contrôleur '$controllerClass' non trouvé");
    }

    // Chargement du contrôleur
    require_once $controllerFile;

    if (!class_exists($controllerClass)) {
        throw new Exception("La classe '$controllerClass' n'existe pas");
    }

    $controller = new $controllerClass();

    if (!method_exists($controller, $action)) {
        throw new Exception("Action '$action' non trouvée");
    }

    // Exécution de l'action avec les paramètres
    call_user_func_array([$controller, $action], $params);
} catch (Exception $e) {
    // En développement, afficher l'erreur
    echo 'Err : ' . $e->getMessage();

    // En production, vous pourriez vouloir rediriger vers une page d'erreur 404
    // header("HTTP/1.0 404 Not Found");
    // include(ROOT . '/../app/views/errors/404.twig');
}