<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Category.php";


class NewController extends Controller
{
    public function detail_logo(){
        $this->content=$this->render('views/news/introduce.php');
        $this->title="giới thiệu về Vascara";

        require_once "views/layouts/main.php";

    }

    public function index(){
        $this->content=$this->render('views/news/index.php');
        $this->title="Tin tức";

        require_once "views/layouts/main.php";

    }

}