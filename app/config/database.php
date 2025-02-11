// app/config/Database.php
<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require 'database.php';
        $this->pdo = new PDO(
            "pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}",
            $config['user'],
            $config['password']
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}