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
    public function index()
    {
        $data = $this->userModel->index();
        return $this->render('EventPage.twig', ['data' => $data]);
    }

    public function register()
    {
        echo $this->userModel->index();
    }
}