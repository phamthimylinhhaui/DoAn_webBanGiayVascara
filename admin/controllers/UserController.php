<?php
require_once "controllers/Controller.php";
require_once "models/User.php";
require_once 'models/Pagination.php';

class UserController extends Controller
{
    public function create(){

        $user_model = new User();

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $fullname = $_POST['fullname'];
            $password = $_POST['password'];
            $role  = $_POST['role'];
            $email  = $_POST['email'];
            $phone  = $_POST['phone'];
            $date_of_birth  = $_POST['date_of_birth'];
            //$avatar_files = $_FILES['avatar'];

            //check validate
            if (empty($username)) {
                $this->error = 'Cần nhập tên tài khoản';
            }
            else if (empty($fullname)) {
                $this->error = 'Cần nhập họ và tên của bạn';
            }
            else if (empty($password)) {
                $this->error = 'Cần nhập mật khẩu';
            }
            else if (empty($email)) {
                $this->error = 'Cần nhập mail';
            }
            else if (!empty($username)) {
                //kiếm tra xem username đã tồn tại trong DB hay chưa, nếu tồn tại sẽ báo lỗi
                $count_user = $user_model->getUserByUsername($username);
                if ($count_user) {
                    $this->error = 'Username này đã tồn tại trong CSDL';
                }
            }

            //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh
            else if ($_FILES['avatar']['error'] == 0) {
                $extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
                $extension = pathinfo($_FILES['avatar']['error'], PATHINFO_EXTENSION);

                $extension = strtolower($extension);
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $extension_arr)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb >= 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            //nếu ko có lỗi thì tiến hành lưu dữ liệu và upload ảnh nếu có
            $filename = '';
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = '../publish/avatar_user';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
//                echo "<pre>";
//                print_r($filename);
//                echo "</pre>";
//                die();

                //lưu vào csdl
                //gọi model để thực  hiện lưu
                //gán các giá trị từ form cho các thuộc tính của category
                $user_model->username = $username;
                $user_model->password = $password;
                $user_model->role = $role;
                $user_model->date_of_birth = $date_of_birth;
                $user_model->name = $fullname;
                $user_model->email = $email;

                $avatar="http://localhost/DoAn/publish/avatar_user/".$filename;
                $user_model->avatar = $avatar;

                $user_model->phone = $phone;


                //gọi phương thức insert
                $is_insert = $user_model->insert();


                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=user&action=index');
                exit();
            }

        }
        $this->title="Thêm người dùng mới";
        //lấy nội dung view create.php
        $this->content = $this->render('views/users/create.php');
        //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';

    }
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