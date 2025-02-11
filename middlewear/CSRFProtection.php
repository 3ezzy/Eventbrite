<?php
class CSRFProtection {
    public static function generateToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public static function validateToken($token) {
        if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
            die("CSRF Token invalide !");
        }
    }
}
?>
