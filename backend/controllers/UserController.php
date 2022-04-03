<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class UserController extends Controller
{
    public function index(){
        $user_model= new User();
        $users= $user_model->getAll();
//        echo "<pre>";
//        print_r($users);
//        echo "</pre>";
        $this->content=$this->render('views/users/index.php',['users' =>$users]);
        $this->title="trang quản lý tài khoản";

        require_once "views/layouts/main.php";

    }

    public function create(){
        $this->title="Form thêm mới người dùng";
        $this->content=$this->render('views/users/create.php');

        require_once "views/layouts/main.php";
    }
}