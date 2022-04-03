<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class HomeController extends Controller
{
    public function index(){
        $amount_user=(new User())->countUser();
        $this->content=$this->render('views/home.php',['amount_user'=>$amount_user]);
        $this->title="trang chủ";

        require_once "views/layouts/main.php";
    }
}