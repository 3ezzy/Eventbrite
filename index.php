<?php
// index.php

// Définir le chemin racine de l'application
define('ROOT', dirname(__FILE__));

// Activer l'affichage des erreurs en développement
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Récupérer l'URL demandée
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = explode('/', $url);

// Router basique
$controller = !empty($url[0]) ? $url[0] : 'home';
$action = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

// Construire le nom de la classe du contrôleur
$controllerClass = ucfirst($controller) . 'Controller';
$controllerFile = ROOT . '/controllers/' . $controllerClass . '.php';

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
    echo "ffffffffffffff";
} catch (Exception $e) {

    echo 'Erreur : ' . $e->getMessage();
}