<?php

namespace App\Models;
use App\Database\Database;


    class User {

        private $conn;

        public function __construct()
        {   
            $conn = new Database;
            $this->conn = $conn->connect();
        }
        public function index() {
            
        }
    }

?>