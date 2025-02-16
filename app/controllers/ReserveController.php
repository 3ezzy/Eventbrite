<?php

namespace App\Controllers;

use App\Models\Reserve;
use App\Models\Ticket;

    class ReserveController {
        private $reserveModel;
        private $ticketModel;

        public function __construct()
        {
            $this->reserveModel = new Reserve();
            $this->ticketModel = new Ticket();
        }

        public function reserve($event_id, $ticket_id) {

            $this->ticketModel->setTicket_id($ticket_id);
            $ticket = $this->ticketModel->getById();
            $capacity = $ticket['capacity'];

            $res = $capacity - 1;
            $this->ticketModel->setCapacity($res);
            $this->ticketModel->update();

            $this->reserveModel->setEvent($event_id);
            $this->reserveModel->setParticipant($_SESSION['user']['user_id']);
            $this->reserveModel->store();

            header('location: /Eventbrite/event/details/'. $event_id);
        }
    }

?>