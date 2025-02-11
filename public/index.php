<?php

define('ROOT', dirname(__FILE__));

ini_set('display_errors', 1);
error_reporting(E_ALL);


$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = explode('/', $url);


$controller = !empty($url[0]) ? $url[0] : 'home';
$action = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);


$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = ROOT . '/../app/controllers/' . $controllerClass . '.php';

try {
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        $controller = new $controllerClass();

        if (method_exists($controller, $action)) {
            call_user_func_array([$controller, $action], $params);
        } else {
            throw new Exception("Action '$action' non trouvée");
        }
    } else {
        throw new Exception("Contrôleur '$controllerClass' non trouvé");
    }
} catch (Exception $e) {

    echo 'Err : ' . $e->getMessage();
}