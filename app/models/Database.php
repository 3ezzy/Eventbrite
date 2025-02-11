<?php

namespace models;
class Database
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "pgsql:host=localhost;dbname=event_clone",
                "votre_username",
                "votre_password"
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}   

