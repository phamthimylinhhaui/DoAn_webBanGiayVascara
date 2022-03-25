<?php
require_once "controllers/Controller.php";

class UserController extends Controller
{
    public function index(){

        $this->content=$this->render('views/users/index.php');
        $this->title="trang quản lý tài khoản";

        require_once "views/layouts/main.php";

    }

    public function create(){
        $this->title="Form thêm mới người dùng";
        $this->content=$this->render('views/users/create.php');

        require_once "views/layouts/main.php";
    }
}