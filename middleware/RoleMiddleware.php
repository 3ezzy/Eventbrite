<?php

class RoleMiddleware {
    public static function admin() {
        self::checkRole(['admin']);
    }

    public static function editor() {
        self::checkRole(['editor']);
    }

    private static function checkRole($allowedRoles) {
        session_start();
        if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowedRoles)) {
            header("Location: error?error=unauthorized");
            exit();
        }
    }
}
