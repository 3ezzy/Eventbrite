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
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $this->userModel->setPassword($password_hash);
        $this->userModel->setRole($_POST['role']);
        if($this->userModel->createUser()) {
            header('location: login');
        }
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
        } else {
            echo "not found";
        }
    }   
}