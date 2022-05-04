<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class AuthController extends Controller
{
    public function login(){
        //login/ logout admin
        $this->title="Đăng nhập";
        require_once "views/auths/login.php";
    }

}