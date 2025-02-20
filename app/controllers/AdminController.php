<?php

namespace App\Controllers;

use Core\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        return $this->render('AdminDash.twig');
    }
}