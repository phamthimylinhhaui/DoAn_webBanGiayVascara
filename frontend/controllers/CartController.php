<?php
require_once "controllers/Controller.php";

class CartController extends Controller
{
    public function index(){
        $this->content=$this->render('views/carts/index.php');
        $this->title="giỏ hàng";

        require_once "views/layouts/main.php";
    }
}