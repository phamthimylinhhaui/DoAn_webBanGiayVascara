<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/News.php";


class NewController extends Controller
{
    public function detail_logo(){
        $this->content=$this->render('views/news/introduce.php');
        $this->title="giới thiệu về Vascara";

        require_once "views/layouts/main.php";

    }

    public function index(){
        $new_model = new News();
        $news = $new_model->getAll();

        $this->content=$this->render('views/news/index.php',[
            'news' =>$news,
        ]);
        $this->title="Tin tức";

        require_once "views/layouts/main.php";

    }

    public function detail(){

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);

        $this->content=$this->render('views/news/detail.php',['new'=>$new]);
        $this->title="chi tiết tin tức";

        require_once "views/layouts/main.php";

    }

}