<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class AuthController extends Controller
{
    public function login(){
        $this->content=$this->render('views/auth/login.php');
        $this->title="Đăng nhập";

        require_once "views/layouts/main.php";
    }

    public function register(){
        $this->content=$this->render('views/auth/register.php');
        $this->title="Đăng ký";

        require_once "views/layouts/main.php";
    }

}