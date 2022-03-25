<?php
require_once "controllers/Controller.php";

class HomeController extends Controller
{
    public function index(){
        $this->content=$this->render('views/home.php');
        $this->title="trang chủ";

        require_once "views/layouts/main.php";
    }
}