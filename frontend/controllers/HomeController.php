<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Category.php";


class HomeController extends Controller
{
    public function index(){
        $products_model = new Product();
        $products = $products_model->getAll();

        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content=$this->render('views/home.php',[
            'products' =>$products,
            'categories' =>$categories,
            ]);
        $this->title="trang chủ";

        require_once "views/layouts/main.php";
    }
}