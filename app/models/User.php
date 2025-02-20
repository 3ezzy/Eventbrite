<?php 

namespace App\Models;

use PDO;
use App\Database\Database;
class  User{
    protected $avatar;
    protected $name;
    protected $email;
    protected $password;
    protected $role;
    protected $user_status;
    protected $conn; 

    public function __construct($name = "", $email = "", $password = "", $role = "", $avatar = "", $user_status = 'active') {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->avatar = $avatar;
        $this->user_status = $user_status;
        $db = new Database;
        $this->conn = $db->connect();
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getUserStatus() {
        return $this->user_status;
    }

    public function setUserStatus($user_status) {
        $this->user_status = $user_status;
    }

    public function findUser() {

        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bindValue(1, $this->email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
}

}