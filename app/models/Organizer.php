<?php

namespace App\Models;

use App\Models\User;

class Organizer extends User {

    private $bio;

    public function __construct($name = "", $email = "", $password = "", $role = "", $avatar = "", $user_status = 'active', $bio = "")
    {
        parent::__construct($name, $email, $password, $role, $avatar, $user_status);
        $this->bio = $bio;
    }

    public function getBio() {
        return $this->bio;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function createUser() {

        // Prepare SQL statement
        $sql = "INSERT INTO organizers (name, email, password, role, user_status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->password);
        $stmt->bindValue(4, $this->role);
        $stmt->bindValue(5, $this->user_status);
        return $stmt->execute();
}
}

?>