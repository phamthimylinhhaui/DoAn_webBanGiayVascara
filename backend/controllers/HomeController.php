<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
require_once "models/Product.php";
require_once "models/Order.php";

class HomeController extends Controller
{
    public function index(){
        $amount_user=(new User())->countUser();
        $amount_product=(new Product())->countProduct();
        $amount_order=(new Order())->countOrder();
        $revenue=(new Order())->MonthlyRevenue();
       // $amount_category=(new Category())->countCategory();
        //$amount_new=(new News())->countNew();


        $this->content=$this->render('views/home.php',[
            'amount_user'=>$amount_user,
            'amount_product'=>$amount_product,
            'amount_order'=>$amount_order,
           // 'amount_category'=>$amount_category,
            //'amount_new'=>$amount_new,
            'revenue'=>$revenue,
        ]);
        $this->title="trang chủ";

        require_once "views/layouts/main.php";
    }
}