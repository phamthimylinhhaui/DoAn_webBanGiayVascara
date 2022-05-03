<?php

require_once "controllers/Controller.php";
require_once "models/News.php";
class NewController extends Controller
{
    public function index(){
        $new_model = new News();
        $news = $new_model->getAll();

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search

        $this->title="Quản lý tin tức";
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
        ]);
        require_once 'views/layouts/main.php';
    }
}