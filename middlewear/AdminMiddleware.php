<?php
require_once 'AuthMiddleware.php';

class AdminMiddleware {
    public static function checkAdmin() {
        AuthMiddleware::checkAuth(); // Vérifie que l'utilisateur est connecté
        
        if ($_SESSION['role'] !== 'admin') {
            // Redirige vers la page d'accueil ou un accès refusé
            header("Location: /public/index.php?error=unauthorized");
            exit();
        }
    }
}
?>
