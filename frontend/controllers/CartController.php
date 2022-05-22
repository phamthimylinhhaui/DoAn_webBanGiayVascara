<?php
require_once "controllers/Controller.php";
require_once "models/Order.php";

class CartController extends Controller
{
//        $product_cart = [
    //        'name' => $product['name'],
    //        'price' => $product['price'],
    //        'avatar' => $product['avatar'],
    //          'amount' => $product['amount'],
    //        'quantity' => 1
//        ];
    public function index(){
        if (!isset($_SESSION['cart']) || $_SESSION['cart']==[]){
            header('Location: index.php');
            exit();
        }

//        if (isset($_POST['submit'])){
//            echo "<pre>";
//            print_r($_SESSION['cart']);
//            echo "<pre>";
//        }

        $this->content=$this->render('views/carts/index.php');
        $this->title="giỏ hàng";

        require_once "views/layouts/main.php";
    }

    public function update(){
//        echo "<pre>";
//        print_r($_SESSION['cart']);
//        echo "<pre>";
//        die();
        foreach($_SESSION["cart"] as $product){
            $name = "product_".$product["id"]."_";
            $number = $_POST[$name];
            //check số lượng đặt so với số lượng hàng có trong kho
            $check=$product['amount']-$number;
//            echo "<pre>";
//            print_r( $check);
//            echo "<pre>";
//            die();

            if ($check<0){
                $_SESSION['error']="Số lượng bạn đặt vượt quá số lượng sản phẩm còn trong kho!!!";
            }else{
                $id=$product["id"];
//            echo "<pre>";
//            print_r( $_SESSION['cart'][$id]['quantity']);
//            echo "<pre>";
//            die();

                if($number==0){
                    //xóa sp ra khỏi giỏ hàng
                    unset($_SESSION['cart'][$id]);
                } else {
                    $_SESSION['cart'][$id]['quantity'] = $number;
                }
            }
        }
        header("location:index.php?controller=cart&action=index");
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] <= 0) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=cart');
            exit();
        }
        $id=$_GET['id'];
        unset($_SESSION['cart'][$id]);
        header("location:index.php?controller=cart");
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
            'id'=>$product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'amount' => $product['amount'],
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