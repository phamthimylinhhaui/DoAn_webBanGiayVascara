<?php
require_once "models/Product.php";
require_once "models/Category.php";

class Controller
{
    public $content;
    public $title;
    public $error;

    public function __construct()
    {

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