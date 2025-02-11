<?php
class AuthMiddleware {
    public static function checkAuth() {
        session_start();

        
        if (!isset($_SESSION['user_id'])) {
           
            header("Location: /public/auth/login.php");
            exit();
        }
    }
}
?>
