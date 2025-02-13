<?php

class TicketController {
    private $ticketModel;
    private $eventModel;

    public function __construct($db) {
        $this->ticketModel = new Ticket($db);
        // $this->eventModel = new Event($db); // Assuming you have an Event model
    }

    public function showCreateForm($eventId) {
        try {
            // Check if event exists and user has permission
            $event = $this->eventModel->getById($eventId);
            if (!$event) {
                throw new Exception("Event not found");
            }

            if (!$this->checkPermission($event['organizer_id'])) {
                throw new Exception("Permission denied");
            }

            // Load the create ticket view
            require_once 'Views/tickets/create.php';
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: /events');
            exit();
        }
    }

    public function create() {
        // try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method");
            }

            // Gather form data
            $ticketData = [
                'capacity' => $_POST['capacity'],
                'ticket_status' => $_POST['ticket_status'],
                'event_id' => 1,
                
            ];

            // Validate data
            // $errors = $this->ticketModel->validateData($ticketData);
            // if (!empty($errors)) {
            //     $_SESSION['errors'] = $errors;
            //     $_SESSION['form_data'] = $ticketData;
            //     header('Location: /tickets/create/' . $ticketData['event_id']);
            //     exit();
            // }

            // Create ticket
            $this->ticketModel->create($ticketData);
            
        //     $_SESSION['success'] = "Ticket created successfully";
        //     header('Location: /events/view/' . $ticketData['event_id']);
        //     exit();

        // } catch (Exception $e) {
        //     $_SESSION['error'] = $e->getMessage();
        //     header('Location: /tickets/create/' . $_POST['event_id']);
        //     exit();
        // }
    }

    private function checkPermission($organizerId) {
        // Check if current user is the organizer or an admin
        return ($_SESSION['user_id'] == $organizerId || $_SESSION['user_role'] == 'admin');
    }
}