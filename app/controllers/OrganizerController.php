<?php

namespace App\Controllers;

use Core\Controller;

class OrganizerController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        return $this->render('organizer.twig');
    }
}