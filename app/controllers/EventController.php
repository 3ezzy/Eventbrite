<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Event;

 class EventController extends Controller {
    private $eventModel;

    public function __construct()
    {
        parent::__construct();
        $this->eventModel = new Event();
    }

    public function getAllEvents() {
        $events = $this->eventModel->index();
        return $this->render('events.twig', ['events' => $events]);
    }

    public function eventDetails($event_id) {
        $this->eventModel->setEventId($event_id);
        $event = $this->eventModel->getById();
        return $this->render('eventDetails.twig', ['event' => $event]);
    }
 }

?>