<?php

class Ticket {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        try {
            $query = "INSERT INTO tickets (event_id, capacity, ticket_status) 
                      VALUES (:event_id, :capacity, :ticket_status)";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':event_id' => $data['event_id'],
                ':capacity' => $data['capacity'],
                ':ticket_status' => $data['ticket_status']
               
            ]);
        } catch (PDOException $e) {
            throw new Exception("Error creating ticket: " . $e->getMessage());
        }
    }

    public function getByEventId($eventId) {
        try {
            $query = "SELECT * FROM tickets WHERE event_id = :event_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':event_id' => $eventId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching tickets: " . $e->getMessage());
        }
    }

    // public function validateData($data) {
    //     $errors = [];
        
    //     if (empty($data['event_id'])) $errors[] = "Event ID is required";
    //     if (!isset($data['capacity']) || $data['capacity'] < 1) $errors[] = "Valid capacity is required";
    //     if (!isset($data['price']) || $data['price'] < 0) $errors[] = "Valid price is required";
    //     if (empty($data['type'])) $errors[] = "Ticket type is required";
    //     if (empty($data['sales_start'])) $errors[] = "Sales start date is required";
    //     if (empty($data['sales_end'])) $errors[] = "Sales end date is required";
        
    //     return $errors;
    // }
}
