<?php

class Router
{
    private $routes = [];

    public function add($path, $controller, $method = 'GET')
    {
        $this->routes[] = [
            'path' => $path,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        // Retire le chemin de base de l'URL
        $uri = str_replace('/Eventbrite/public', '', $uri);
        $uri = strtok($uri, '?');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['path'] === $uri && $route['method'] === $method) {
                list($controller, $action) = explode('@', $route['controller']);
                $controllerName = $controller . 'Controller';
                $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    require_once __DIR__ . '/Controller.php';  // Assurez-vous que le Controller parent est chargé
                    $controllerInstance = new $controllerName();
                    return $controllerInstance->$action();
                }
            }
        }

        // Si aucune route ne correspond, on renvoie vers la page 404
        require_once __DIR__ . '/../app/controllers/HomeController.php';
        require_once __DIR__ . '/Controller.php';  // Assurez-vous que le Controller parent est chargé
        $controller = new HomeController();
        return $controller->notFound();
    }
}
