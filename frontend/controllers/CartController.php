<?php
require_once "controllers/Controller.php";

class CartController extends Controller
{
    public function index(){
        if (!isset($_SESSION['cart']) || $_SESSION['cart']==[]){
            header('Location: index.php');
            exit();
        }

        $this->content=$this->render('views/carts/index.php');
        $this->title="giỏ hàng";

        require_once "views/layouts/main.php";
    }
    public function add(){
//        echo "<pre>";
//        print_r($_GET);
//        echo "<pre>";

        $product_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($product_id);

        // - Lưu tên, giá, file ảnh của sản phẩm vào giỏ hàng
        $product_cart = [
            'name' => $product['name'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];

        // - Cơ chế thêm sp vào giỏ hàng: có 2 case
        // + Sp chưa tồn tại trong giỏ: thêm phần tử mảng mới vào session giỏ hàng
        // + sp đã tồn tại trong giỏ: ko thêm phần tử mảng mới, chỉ update số lượng lên 1
        // Nếu giỏ hàng chưa hề tồn tại, thì tạo mới giỏ hàng và thêm sp đầu tiên vào giỏ
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $product_cart;
        } else {
            // Nếu như sp đã tồn tại trong giỏ, thì update quantity
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $product_cart;
            }
        }
        echo "<pre>";
        print_r($_SESSION['cart']);
        echo "</pre>";
    }
}