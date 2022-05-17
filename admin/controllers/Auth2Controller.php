<?php
require_once "controllers/Controller.php";
require_once "models/User.php";

class Auth2Controller extends Controller
{
    public function login(){
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
        if (isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->error = "Phải nhập username hoặc password";
            }

            if (empty($this->error)){
                $user_model= new User();
                $user=$user_model->getUserByUsernameAdmin($username);
                if (empty($user)){
                    $this->error="Username $username không tồn tại hoặc người dùng này không phải là admin";
                }else{
                    // lấy ra mật khẩu đã mã hóa
                    $password_hash=$user['password'];
                    // so sánh mật khẩu đã mã hóa với mk từ form theo cơ chế của php cung cấp
                    $is_login=password_verify($password,$password_hash);
                    // var_dump($is_login);

                    if ($is_login){
                        $_SESSION['success']=" Đăng nhập thành công";
                        // tạo session lưu thông tin user hiện tại
                        $_SESSION['user2']=$user;
                        header("Location: index.php?controller=home&action=index");
                        exit();
                    }
                    $this->error="Sai tài khoản hoặc mật khẩu";
                }
            }
        }

        //login/ logout admin
        $this->title="Đăng nhập";
        require_once "views/auths/login.php";
    }

    public function logout(){
        //logout admin
        unset($_SESSION['user2']);
        $_SESSION['success']="Đăng xuất thành công";
        header("Location: index.php?controller=auth2&action=login");
        exit();
    }
}