<?php

require_once "controllers/Controller.php";
require_once "models/Order.php";
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
}