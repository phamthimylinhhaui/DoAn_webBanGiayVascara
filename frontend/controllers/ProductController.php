<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Category.php";


class ProductController extends Controller
{
    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);

        $this->content=$this->render('views/products/detail.php',['product'=>$product]);
        $this->title="chi tiết sản phẩm";

        require_once "views/layouts/main.php";
    }

    public function get_products_by_category(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }

        $category_id = $_GET['id'];
        $product_model = new Product();
        $products = $product_model->getByCategory($category_id);


        $category_model = new Category();
        $category = $category_model->getCategoryById($category_id);

        $this->content=$this->render('views/products/products_by_category.php',
            [
                'products'=>$products,
                'category'=>$category,

            ]);
        $this->title="list sản phẩm theo danh mục";

        require_once "views/layouts/main.php";
    }

    public function findByName(){

        $keyword = $_POST['keyword'];

        $product_model = new Product();
        $products = $product_model->findByName($keyword);



        $this->content=$this->render('views/products/find.php',[
            'products'=>$products
        ]);
        $this->title="sản phẩm tìm kiếm";

        require_once "views/layouts/main.php";
    }
}