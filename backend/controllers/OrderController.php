<?php

require_once "controllers/Controller.php";
require_once "models/Order.php";
require_once "models/Orderdetail.php";
class OrderController extends Controller
{

    public function index(){
        $order_model = new Order();
        $orders = $order_model->getAll();

        $this->title="Quản lý hóa đơn";
        $this->content = $this->render('views/orders/index.php', [
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

        $this->title="chi tiết sản phẩm";
        $this->content = $this->render('views/orders/detail.php',  [
            'order' => $order,
            'orderdetails' => $orderdetails,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function edit(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getById($id);

        if (isset($_POST['submit'])) {

            $status = $_POST['status'];


            //save dữ liệu vào bảng products
            $order_model->status = $status;


            $is_update = $order_model->update($id);
            if ($is_update) {
                $_SESSION['success'] = 'Update dữ liệu thành công';
            } else {
                $_SESSION['error'] = 'Update dữ liệu thất bại';
            }
            header('Location: index.php?controller=order');
            exit();

        }

//        echo "<pre>";
//        print_r($order);
//        echo "</pre>";
//        die();

        $this->title="sửa trạng thái đơn hàng";
        $this->content = $this->render('views/orders/edit.php',  [
            'order' => $order,
        ]);
        require_once 'views/layouts/main.php';
    }
}