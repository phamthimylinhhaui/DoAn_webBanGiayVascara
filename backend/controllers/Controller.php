<?php


class Controller
{
    public $content;
    public $title;
    public $error;

    public function __construct()
    {
        // nếu user chưa đăng nhập thì không cho phép truy cập và các chức năng đăng nhập r mới dc vào
        $controller=$_GET['controller'];
        if (!isset($_SESSION['user1']) && $controller != 'auth1'){
            $_SESSION['error']="Bạn chưa đăng nhập";
            header("Location: index.php?controller=auth1&action=login");
            exit();
        }
    }

    public function render($file,$variables = array()){
        //giải nén biến
        extract($variables);

        // bắt đầu ghi nhớ nội dung
        ob_start();
        require_once $file;

        $render_view=ob_get_clean();
        return $render_view;
    }

}