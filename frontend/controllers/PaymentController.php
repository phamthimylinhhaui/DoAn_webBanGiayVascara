<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
//require_once 'libraries/PHPMailer/src/PHPMailer.php';
//require_once 'libraries/PHPMailer/src/SMTP.php';
//require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function __construct()
    {
        // nếu user chưa đăng nhập thì không cho phép truy cập và các chức năng đăng nhập r mới dc vào
        $controller=$_GET['controller'];
        if (!isset($_SESSION['user']) && $controller != 'auth'){
            $_SESSION['error']="Bạn chưa đăng nhập";
            $_SESSION['alert']="Nếu chưa có tài khoản, vui lòng đăng ký";
            echo "<script>alert('hello world')</script>";
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
    }

        //Array
        //(
            //[13] => Array
            //(
            //[id] => 13
            //[name] => GIÀY SLINGBACK BÍT MŨI NHỌN GÓT NHỌN
            //[price] => 897000.00
            //[avatar] => http://localhost/DoAn/publish/avatar_product/1651724555-product-tt11.jpg
            //[quantity] => 2
            //)
        //
            //[10] => Array
            //(
            //[id] => 10
            //[name] => GIÀY SNEAKER VIỀN CHỈ NỔI PHỐI METALLIC
            //[price] => 222000.00
            //[avatar] => http://localhost/DoAn/publish/avatar_product/1651724526-product-tt5.jpg
            //'amount' => $product['amount'],
             //[quantity] => 1
            //)
        //)

    public function index(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "<pre>";
//        die();

        $this->content=$this->render('views/payments/index.php');
        $this->title="Trang thanh toán";

        require_once "views/layouts/main.php";
    }
    public function payment(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "<pre>";
//        die();
        if (isset($_POST['submit'])){
            $full_name=$_POST['fullname'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $note=$_POST['note'];

            if (empty($full_name) ){
                $this->error="không được để trống tên người nhận";
            }elseif (empty($address) || empty($phone)){
                $this->error="Không được để trống địa chỉ, số điện thoại";
            }elseif (!is_numeric($phone)){
                $this->error="Nhập đúng định dạng số điện thoại";
            }elseif (strlen($phone)!=10){
                $this->error="Nhập đúng định dạng số điện thoại (10 số)";
            }


            if (empty($this->error)){
                //lưu vào csdl
                //gọi model để thực  hiện lưu
                $order_model = new Order();
                $order_model->full_name = $full_name;
                $order_model->address = $address;
                $order_model->phone = $phone;
                $order_model->note = $note;

//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $category_model->status);
//                echo "</pre>";
//                die();

                //gọi phương thức insert
                $is_insert = $order_model->insert();

                    $_SESSION['success'] = 'Đặt hàng thành công';
                    header("Location: index.php?controller=payment&action=thanks");
                    exit();

            }



        }
        $this->content=$this->render('views/payments/index.php');
        $this->title="Thanh toán";

        require_once "views/layouts/main.php";
    }
    public function thanks(){
        $this->content=$this->render('views/payments/mail_template_order.php');
        $this->title="Cảm ơn";

        require_once "views/layouts/main.php";
    }

    public function list_order(){
        $id=$_SESSION['user']['id'];
        $order_model = new Order();
        $orders = $order_model->getAllByUser($id);

        $this->title="Quản lý hóa đơn";
        $this->content = $this->render('views/payments/list_order.php', [
            'orders' => $orders,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){

        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getById($id);

        $orderDetail_model = new Orderdetail();
        $orderdetails=$orderDetail_model->getByIdOrder($id);

//        echo "<pre>";
//        print_r($orderdetails);
//        echo "</pre>";
//        die();

        $this->title="chi tiết đơn hàng";
        $this->content = $this->render('views/payments/detail_order.php',  [
            'order' => $order,
            'orderdetails' => $orderdetails,
        ]);
        require_once 'views/layouts/main.php';
    }
}