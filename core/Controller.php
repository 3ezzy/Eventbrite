<?php
// core/Controller.php

require_once __DIR__ . '/../vendor/autoload.php';

abstract class Controller {
    protected $twig;

    public function __construct() {
        // Définir les chemins absolus
        $viewsPath = [
            __DIR__ . '/../app/views',
            __DIR__ . '/../app/views/layouts'  // Ajout explicite du dossier layouts
        ];

        // Vérifier que les chemins existent
        foreach ($viewsPath as $path) {
            if (!is_dir($path)) {
                throw new Exception('Dossier introuvable : ' . $path);
            }
        }

        $loader = new \Twig\Loader\FilesystemLoader($viewsPath);

        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => true
        ]);

        $this->twig->addFunction(new \Twig\TwigFunction('path', function($route) {
            return '/Eventbrite/public/index.php/' . $route;
        }));
    }

    protected function render($template, $data = []) {
        echo $this->twig->render($template, $data);
    }
}
