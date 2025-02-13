<?php

namespace App\Database;

use PDO;
class Database {

    private $servername;
    private $dbname;
    private $username;
    private $password;

    public function __construct()
    {
        require_once __DIR__ . '/../../env.php';

        $this->servername = $servername;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        $conn = new PDO("pgsql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        return $conn;
    }
}