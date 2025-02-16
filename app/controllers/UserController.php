<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Organizer;
use App\Models\Participant;
use App\Models\User;

class UserController extends Controller
{
    private $organizerModel;
    private $participantModel;
    private $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->organizerModel = new Organizer();
        $this->participantModel = new Participant();
        $this->userModel = new User();

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
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        if($_POST['role'] === 'Organizer') {
            $this->organizerModel->setName($_POST['name']);
            $this->organizerModel->setEmail($_POST['email']);
            $this->organizerModel->setPassword($password_hash);
            $this->organizerModel->setRole($_POST['role']);
            $this->organizerModel->createUser();
        } else {
            $this->participantModel->setName($_POST['name']);
            $this->participantModel->setEmail($_POST['email']);
            $this->participantModel->setPassword($password_hash);
            $this->participantModel->setRole($_POST['role']);
            $this->participantModel->createUser();
        }
        header('location: login');
    }

    public function login()
    {
        
        $this->userModel->setEmail($_POST['email']);
        $this->userModel->setPassword($_POST['password']);
        $user = $this->userModel->findUser();
        
        if(isset($user)) {
            
            if($user['email'] == $this->userModel->getEmail() && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                if($user['role'] == 'Admin') {
                    header('location: admin/dashboard');
                } else if($user['role'] == 'Organizer') {
                    header('location: organizer/dashboard');
                } else {
                    header('location: home');
                }
            } else {
                header('location: login');
            }
        } else {
            header('location: login');
        }
    }

    public function logout() {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('location: login');
        }
    }   
}