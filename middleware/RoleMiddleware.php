<?php

class RoleMiddleware {
    public static function admin() {
        self::checkRole(['Admin']);
    }

    public static function organizer() {
        self::checkRole(['Organizer']);
    }

    private static function checkRole($allowedRoles) {
        if (!isset($_SESSION['user']['role']) || !in_array($_SESSION['user']['role'], $allowedRoles)) {
            header("Location: error?error=unauthorized");
            exit();
        }
    }
}
