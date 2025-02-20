<?php
// core/Controller.php
namespace Core;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use Twig\TwigFunction;

abstract class Controller {
    protected $twig;

    public function __construct() {
        // Define absolute paths
        $viewsPath = [
            __DIR__ . '/../app/views',
            __DIR__ . '/../app/views/layouts'
        ];

        // Ensure paths exist
        foreach ($viewsPath as $path) {
            if (!is_dir($path)) {
                throw new Exception('Dossier introuvable : ' . $path);
            }
        }

        $loader = new FilesystemLoader($viewsPath);
        $this->twig = new Environment($loader, [
            'cache' => false,
            'debug' => true // Enable debugging
        ]);

        // Add Debug Extension
        $this->twig->addExtension(new DebugExtension());
        
        $this->twig->addGlobal('session', $_SESSION);

        // Add custom path function
        $this->twig->addFunction(new TwigFunction('path', function($route) {
            return '/Eventbrite/' . $route;
        }));
    }

    protected function render($template, $data = []) {
        echo $this->twig->render($template, $data);
    }
}
