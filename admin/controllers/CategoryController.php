<?php
require_once "controllers/Controller.php";
require_once "models/Category.php";


class CategoryController extends Controller
{
    public function index(){

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->title="Quản lý danh mục";
        $this->content = $this->render('views/categories/index.php', [
            'categories' => $categories,
        ]);
        require_once 'views/layouts/main.php';
    }
}