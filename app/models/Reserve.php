<?php

namespace App\Models;

use App\Database\Database;
use PDO;

    class Reserve {
        private $reserve_id;
        private $participant;
        private $event;
        private $conn;

        public function __construct($reserve_id = 0, $participant = 0, $event = 0)
        {
            $db = new Database;
            $this->conn = $db->connect();
            $this->reserve_id = $reserve_id;
            $this->participant = $participant;
            $this->event = $event;
        }

        public function getReserve_id() {
            return $this->reserve_id;
        }

        public function setReserve_id($reserve_id) {
            $this->reserve_id = $reserve_id;
        }

        public function getParticipant() {
            return $this->participant;
        }

        public function setParticipant($participant) {
            $this->participant = $participant;
        }

        public function getEvent() {
            return $this->event;
        }

        public function setEvent($event) {
            $this->event = $event;
        }

        public function store() {
            $sql = "INSERT INTO reserves(participant_id, event_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1, $this->participant, PDO::PARAM_INT);
            $stmt->bindValue(2, $this->event, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

?>