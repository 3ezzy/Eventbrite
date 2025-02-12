<?php

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('auth/login.html.twig');
    }

    public function register()
    {
        return $this->render('auth/register.html.twig');
    }
}