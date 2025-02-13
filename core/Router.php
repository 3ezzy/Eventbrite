<?php

namespace Core;

class Router {
    private $routes = [];

    public function add($route, $controller, $method = 'index', $middlewares = []) {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method,
            'middlewares' => (array) $middlewares
        ];
    }

    public function dispatch($url) {
        $url = trim($url, '/');
        $urlParts = explode('/', $url);

        foreach ($this->routes as $route => $target) {
            $routeParts = explode('/', trim($route, '/'));

            if (count($urlParts) === count($routeParts)) {
                $params = [];

                for ($i = 0; $i < count($routeParts); $i++) {
                    if ($routeParts[$i] === $urlParts[$i]) {
                        continue;
                    } elseif (preg_match('/\{(.+?)\}/', $routeParts[$i], $matches)) {
                        $params[$matches[1]] = $urlParts[$i];
                    } else {
                        continue 2;
                    }
                }

                // Execute Middleware(s)
                foreach ($target['middlewares'] as $middleware) {
                    if (strpos($middleware, '::') !== false) {
                        // Handle static method middleware like RoleMiddleware::admin
                        [$class, $method] = explode('::', $middleware);
                        require_once __DIR__ . "/../middleware/$class.php";
                        call_user_func([$class, $method]); // Call static method
                    } else {
                        // Handle normal middleware like AuthMiddleware
                        require_once __DIR__ . "/../middleware/$middleware.php";
                        $middlewareInstance = new $middleware();
                        $middlewareInstance->handle();
                    }
                }

                // Execute Controller
                $controllerName = $target['controller'];
                $method = $target['method'];

                require_once "../app/controllers/$controllerName.php";
                $controllerName = "App\\Controllers\\$controllerName";
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                } else {
                    echo "Method not found!";
                }
                return;
            }
        }
        echo "404 Not Found";
    }
}
