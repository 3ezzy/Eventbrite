<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Event;
use App\Models\Ticket;

 class EventController extends Controller {
    private $eventModel;
    private $ticketModel;

    public function __construct()
    {
        parent::__construct();
        $this->eventModel = new Event();
        $this->ticketModel = new Ticket();
    }

    public function getAllEvents() {
        $events = $this->eventModel->index();
        return $this->render('events.twig', ['events' => $events]);
    }

    public function eventDetails($event_id) {
        $this->eventModel->setEventId($event_id);
        $event = $this->eventModel->getById();

        $this->ticketModel->setEvent($event_id);
        $tickets = $this->ticketModel->index();
        
        return $this->render('eventDetails.twig', ['event' => $event, 'tickets' => $tickets]);
    }
 }

?>