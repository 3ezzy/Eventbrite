<?php 

namespace App\Models;

use PDO;
use App\Database\Database;
class  Ticket {
    protected $ticket_id;
    protected $capacity;
    protected $ticket_status;
    protected $event;
    protected $conn; 

    public function __construct($ticket_id = 0, $capacity = "", $ticket_status = "", $event = 0) {
        $this->ticket_id = $ticket_id;
        $this->capacity = $capacity;
        $this->ticket_status = $ticket_status;
        $this->event = $event;
        $db = new Database;
        $this->conn = $db->connect();
    }

    public function getTicket_id() {
        return $this->ticket_id;
    }

    public function setTicket_id($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getTicket_status() {
        return $this->ticket_status;
    }

    public function setTicket_status($ticket_status) {
        $this->ticket_status = $ticket_status;
    }

    public function getEvent() {
        return $this->event;
    }

    public function setEvent($event) {
        $this->event = $event;
    }

    public function index() {

        $sql = "SELECT * FROM tickets WHERE event_id = ? ORDER BY ticket_id ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->event, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById() {

        $sql = "SELECT * FROM tickets WHERE ticket_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->ticket_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $sql = "UPDATE tickets SET capacity = ? WHERE ticket_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->capacity, PDO::PARAM_INT);
        $stmt->bindValue(2, $this->ticket_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}