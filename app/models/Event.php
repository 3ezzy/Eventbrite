<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class Event {
    private $event_id;
    private $title;
    private $description;
    private $category;
    private $organizer;
    private $event_status;
    private $conn;

    public function __construct($event_id = "", $title = "", $description = "", $category = "", $organizer = "", $event_status = "")
    {
        $db = new Database;
        $this->conn = $db->connect();

        $this->event_id = $event_id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->organizer = $organizer;
        $this->event_status = $event_status;
    }

    // Getters
    public function getEventId()
    {
        return $this->event_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getOrganizer()
    {
        return $this->organizer;
    }

    public function getEventStatus()
    {
        return $this->event_status;
    }

    // Setters
    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }

    public function setEventStatus($event_status)
    {
        $this->event_status = $event_status;
    }

    public function index() {
        $sql = "SELECT * FROM events
                JOIN categories ON categories.category_id = events.category_id
                JOIN organizers ON organizers.user_id = events.organizer_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById() {
        $sql = "SELECT * FROM events
                JOIN categories ON categories.category_id = events.category_id
                JOIN organizers ON organizers.user_id = events.organizer_id
                WHERE event_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $this->event_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}