<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";


class ProductController extends Controller
{
    public function index(){
        $product_model = new Product();
        $products = $product_model->getAll();

        $this->title="Quản lý sản phẩm";
        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
        ]);
        require_once 'views/layouts/main.php';
    }
}