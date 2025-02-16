<?php

namespace Middleware;
class RoleMiddleware {
    public static function admin() {
        self::checkRole(['Admin']);
    }

    public static function organizer() {
        self::checkRole(['Organizer']);
    }

    public static function participant() {
        self::checkRole(['Participant']);
    }

    private static function checkRole($allowedRoles) {
        if (!isset($_SESSION['user']['role']) || !in_array($_SESSION['user']['role'], $allowedRoles)) {
            header("Location: error?error=unauthorized");
            exit();
        }
    }
}
