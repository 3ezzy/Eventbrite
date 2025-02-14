<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User;
    }

    public function login_page()
    {
        return $this->render('login.twig');
    }


    public function register_page()
    {
        return $this->render('register.twig');
    }

    public function register()
    {
        $this->userModel->setName($_POST['name']);
        $this->userModel->setEmail($_POST['email']);
        $this->userModel->setPassword($_POST['password']);
        $this->userModel->setRole($_POST['role']);
        if($this->userModel->createUser()) {
            header('location: login');
        }
    }
}