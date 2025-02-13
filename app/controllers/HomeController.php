<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home.twig');
    }

    public function error404()
    {
        echo 'Mostafa Not Found';
    }
}