<?php

namespace App\Controllers;

use Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login.twig');
    }

    public function register()
    {
        return $this->render('register.twig');
    }
}