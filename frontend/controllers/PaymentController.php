<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function __construct()
    {
        // nếu user chưa đăng nhập thì không cho phép truy cập và các chức năng đăng nhập r mới dc vào
        $controller=$_GET['controller'];
        if (!isset($_SESSION['user']) && $controller != 'auth'){
            $_SESSION['error']="Bạn chưa đăng nhập";
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
    }

    public function index(){
        $this->content=$this->render('views/payments/index.php');
        $this->title="Trang thanh toán";

        require_once "views/layouts/main.php";
    }
    public function payment(){
        $this->content=$this->render('views/payments/mail_template_order.php');
        $this->title="Thanh toán thành công";

        require_once "views/layouts/main.php";
    }
}