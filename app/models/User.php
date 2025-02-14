<?php 

namespace App\Models;
use App\Database\Database;
class  User{
    private $avatar;
    private $name;
    private $email;
    private $password;
    private $role;
    private $user_status;
    private $conn; 

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
        $this->password = password_hash($password, PASSWORD_BCRYPT);
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

    public function createUser() {

            // Prepare SQL statement
            $sql = "INSERT INTO users (avatar, name, email, password, role, user_status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);

            // Bind parameters
            $stmt->bindValue(1, $this->avatar);
            $stmt->bindValue(2, $this->name);
            $stmt->bindValue(3, $this->email);
            $stmt->bindValue(4, $this->password);
            $stmt->bindValue(5, $this->role);
            $stmt->bindValue(6, $this->user_status);
            return $stmt->execute();
    }

}