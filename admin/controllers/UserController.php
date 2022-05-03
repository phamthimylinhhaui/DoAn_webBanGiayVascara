<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
require_once 'models/Pagination.php';

class UserController extends Controller
{
    public function index(){
        $user_model= new User();
        //do có sử dụng phân trang nên sẽ khai báo mảng các params
        $params=[
            'limit'=>5,
            'query_string'=>'page',
            'controller'=>'user',
            'action'=>'index',
            'full_mode'=>FALSE,
        ];
        //mặc định page hiện tại là 1
        $page=1;
        // nếu có tham số page truyền vào thì gán giá trị vào biến $page
        if (isset($_GET['page'])){
            $page=$_GET['page'];
        }

        // lấy tổng số bản ghi dựa theo các điều kiện có được từ mảng params truyền vào
        $count_total=$user_model->countUser();
        $params['total']=$count_total;

        $params['page']=$page;
        $pagination= new Pagination($params);
        // lấy ra html phân trang
        $pages=$pagination->getPagination();
//        echo"<pre>";
//        print_r($params);
//        echo"</pre>";
        //lấy ra danh sách user sử dụng phân trang
        $users=$user_model->getAllPagination($params);



        $this->content=$this->render('views/users/index.php', [
            //truyền biến $categories ra vew
            'users' => $users,
            //truyền biến phân trang ra view
            'pages' => $pages,
        ]);


        // ở đây nếu khai báo biến deleted_at=1 thì list user sẽ k hiển thị những tài khoản đã bị xóa
       //  $users= $user_model->getAll(['deleted_at',]);
//        echo "<pre>";
//        print_r($users);
//        echo "</pre>";
     //  $this->content=$this->render('views/users/index.php',['users' =>$users]);
        $this->title="trang quản lý tài khoản";

        require_once "views/layouts/main.php";

    }

    public function showFormCreate(){
        $this->title="Form thêm mới tài khoản";
        require_once "views/users/create.php";
    }

    public function showFormEdit(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if (!isset($_POST['user_id']) || !is_numeric($_POST['user_id']) ){
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=users&action=index');
            exit();
        }
        $id=$_POST['user_id'];
        $user_model= new User();
        $users=$user_model->getById($id);
        $this->title="Form sửa tài khoản";
        require_once "views/users/edit.php";
    }

}