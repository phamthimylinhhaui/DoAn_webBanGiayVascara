<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
require_once 'models/Pagination.php';

class UserController extends Controller
{
    public function __construct()
    {
        $controller=$_GET['controller'];
        if (!isset($_SESSION['user']) && $controller != 'auth'){
            $_SESSION['error']="Bạn chưa đăng nhập";
            header("Location: index.php?controller=auth&action=login");
            exit();
        }
    }


    public function edit(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getById($id);



        //xử lý submit form
        if (isset($_POST['submit'])) {
            //$username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $role  = $_POST['role'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $date_of_birth  = $_POST['date_of_birth'];
            //$avatar = $_FILES['avatar'];




            //xử lý validate
            if (empty($fullname)) {
                $this->error = 'Không được để trống title';
            }
            else if (empty($email)) {
                $this->error = 'Cần nhập email của bạn';
            }
            else if (empty($phone)) {
                $this->error = 'Cần nhập SĐT của bạn';
            }
            else if (empty($date_of_birth)) {
                $this->error = 'Cần nhập ngày sinh của bạn';
            }

            else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = $user['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = '../publish/avatar_user';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $user_model->email= $email;
                $user_model->phone = $phone;
                $user_model->role = $role;

                $avatar="http://localhost/DoAn/publish/avatar_user/".$filename;
                $user_model->avatar = $avatar;

                $user_model->name = $fullname;
                $user_model->date_of_birth = $date_of_birth;

                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=user&action=index');
                exit();
            }
        }


        $this->title="Sửa tài khoản";
        //lấy nội dung view create.php
        $this->content = $this->render('views/users/edit.php',[
            'user'=>$user,
        ]);
        //gọi layout để nhúng nội dung view create vừa lấy đc
        //require_once 'views/users/create.php';
        require_once 'views/layouts/main.php';
    }

    public function list_order(){

    }

    public function profile(){
        $id = $_SESSION['user']['id'];
        $user_model = new User();
        $user = $user_model->getById($id);



        //xử lý submit form
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $date_of_birth  = $_POST['date_of_birth'];

            //pass thay đổi
         //   $password_new= $_POST['password_new'];

//            //pass đã mã hóa trong csdl
//            $password = $_SESSION['user']['password'];
//            //pass cũ nhập vào
//            $password_old= $_POST['password_old'];
//            $is_login=password_verify($password_old,$password);

            //xử lý validate
//            if(!$is_login ){
//                $this->error = 'Nhập mật khẩu cũ sai';
//            }
             if (empty($name)) {
                $this->error = 'Không được để trống title';
            }
            else if (empty($email)) {
                $this->error = 'Cần nhập email của bạn';
            }
            else if (empty($phone)) {
                $this->error = 'Cần nhập SĐT của bạn';
            }
            else if (empty($date_of_birth)) {
                $this->error = 'Cần nhập ngày sinh của bạn';
            }

            else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = $user['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = '../publish/avatar_user';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $user_model->email= $email;
               // $user_model->password= $password_new;
                $user_model->phone = $phone;

                $avatar="http://localhost/DoAn/publish/avatar_user/".$filename;
                $user_model->avatar = $avatar;

                $user_model->name = $name;
                $user_model->date_of_birth = $date_of_birth;

                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                    $_SESSION['user']= $user_model->getById($id);
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=home&action=index');
                exit();

            }
        }


        $this->content=$this->render('views/auth/profile.php');
        $this->title="Sửa đổi thông tin cá nhân";

        require_once "views/layouts/main.php";
    }

}