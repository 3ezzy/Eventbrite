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
        $config = require __DIR__ . '/../../env.php';

        $this->servername = $config['servername'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function connect() {
        $conn = new PDO("pgsql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        return $conn;
    }
}