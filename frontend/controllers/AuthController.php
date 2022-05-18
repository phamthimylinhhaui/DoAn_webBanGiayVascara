<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class AuthController extends Controller
{

    public function login(){
        // xử lý submit form
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";

        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->error = "Phải nhập username hoặc password";
            }elseif (strlen($username)<4){
                $this->error="Tên đăng nhập phải có >=4 ký tự";
            }elseif (strlen($password)<6){
                $this->error="Mật khẩu phải >= 6 ký tự";
            }

            if (empty($this->error)){
                // lấy ra mật khẩu đã mã hóa trong csdl tương ứng với username đăng nhập
                $user_model= new User();
                $user=$user_model->getUserByUsername($username);
                if (empty($user)){
                    $this->error="username $username không tồn tại";
                }else{
                    // lấy ra mật khẩu đã mã hóa
                    $password_hash=$user['password'];
                    // so sánh mật khẩu đã mã hóa với mk từ form theo cơ chế của php cung cấp
                    $is_login=password_verify($password,$password_hash);
                   // var_dump($is_login);

                    if ($is_login){
                        $_SESSION['success']=" Đăng nhập thành công";
                        // tạo session lưu thông tin user hiện tại
                        $_SESSION['user']=$user;
                        header("Location: index.php?controller=home&action=index");
                        exit();
                    }
                    $this->error="Sai tài khoản hoặc mật khẩu";
                }
            }

        }



        $this->content=$this->render('views/auth/login.php');
        $this->title="Đăng nhập";

        require_once "views/layouts/main.php";
    }

    public function register(){

        // xử lý submit
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if (isset($_POST['submit'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $date_of_birth = $_POST['date_of_birth'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (empty($username) || empty($password)){
                $this->error="Phải nhập username hoặc password";
            }elseif ($password != $password_confirm){
                $this->error="Nhập lại password chưa đúng";
            }elseif (strlen($username)<4){
                $this->error="Tên đăng nhập phải có >=4 ký tự";
            }elseif (strlen($password)<6){
                $this->error="Mật khẩu phải >= 6 ký tự";
            }

            // đăng ký user
            if (empty($this->error)){


                //gọi model
                $user_model= new User();

                // cần check trùng username
                $user = $user_model->getUserByUsername($username);
                if (!empty($user)) {
                    $_SESSION['error'] = "Username $username đã tồn tại, không thể đăng ký";
                    header("Location: index.php?controller=auth&action=register");
                    exit();
                }

                $user_model->username = $username;
                $user_model->date_of_birth = $date_of_birth;
                $user_model->name = $name;
                $user_model->email = $email;

                //luôn luôn cần mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
                $password=password_hash($password, PASSWORD_BCRYPT);
                $user_model->password = $password;

                $is_insert=$user_model->registerUser();

//                echo "<pre>";
//                print_r($is_insert);
//                echo "</pre>";
                if ($is_insert){
                    $_SESSION['success']="Đăng ký thành công";
                    header("Location:index.php?controller=auth&action=login");
                    exit();
                }
                $this->error="Đăng ký thất bại";
            }
        }

        $this->content=$this->render('views/auth/register.php');
        $this->title="Đăng ký";

        require_once "views/layouts/main.php";
    }

    public function logout(){
        unset($_SESSION['user']);
        $_SESSION['success']="Đăng xuất thành công";
        header("Location: index.php?controller=auth&action=login");
        exit();
    }



}