<?php

require_once "controllers/Controller.php";
require_once "models/News.php";
class NewController extends Controller
{
    public function create()
    {

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $username = $_POST['username'];
            $avatar_files = $_FILES['image'];

            //check validate
            if (empty($title)) {
                $this->error = 'Cần nhập tiêu đề tin tức';
            } //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh
            else if ($avatar_files['error'] == 0) {
                $extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
                $extension = pathinfo($avatar_files['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $file_size_mb = $avatar_files['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $extension_arr)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb >= 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            //nếu ko có lỗi thì tiến hành lưu dữ liệu và upload ảnh nếu có
            $avatar = '';
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có
                if ($avatar_files['error'] == 0) {
                    $dir_uploads = '../publish/avatar_new';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_files['name'];
                    move_uploaded_file($avatar_files['tmp_name'], $dir_uploads . '/' . $avatar);
                }
                //lưu vào csdl
                //gọi model để thực  hiện lưu
                $new_model = new News();

                $new_model->title = $title;
                $filename="http://localhost/DoAn/publish/avatar_new/".$avatar;

                $new_model->image = $filename;
                $new_model->description = $description;
                $new_model->username = $username;

//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $category_model->status);
//                echo "</pre>";
//                die();

                //gọi phương thức insert
                $is_insert = $new_model->insert();



                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=new&action=index');
                exit();
            }

        }
        $this->title="Thêm tin tức mới";
        //lấy nội dung view create.php
        $this->content = $this->render('views/news/create.php');
        //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';
    }

    public function edit(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            //$avatar = $_FILES['avatar'];
            $description= $_POST['description'];
            $username = $_POST['username'];

            //xử lý validate
            if (empty($title)) {
                $this->error = 'Không được để trống tiêu đề';
            }elseif (empty($description)){
                $this->error = 'Không được để trống mô tả';
            }
            else if ($_FILES['image']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['image']['size'] / 1024 / 1024;
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
                $filename = $new['image'];
                //xử lý upload file nếu có
                if ($_FILES['image']['error'] == 0) {
                    $dir_uploads = '../publish/avatar_new';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $new_model->title = $title;

                $avatar="http://localhost/DoAn/publish/avatar_new/".$filename;
                $new_model->image = $avatar;

                $new_model->description = $description;
                $new_model->username = $username;

                $is_update = $new_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=new');
                exit();
            }
        }

        $this->title="sửa tin tức";
        $this->content = $this->render('views/news/edit.php', [
            'new' => $new,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function index(){
        $new_model = new News();
        $news = $new_model->getAll();

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search

        $this->title="Quản lý tin tức";
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
        ]);
        require_once 'views/layouts/main.php';
    }

    public  function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);

        $this->content=$this->render('views/news/detail.php',['new'=>$new]);
        $this->title="chi tiết tin tức";

        require_once "views/layouts/main.php";
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new News();
        $is_delete = $new_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=new');
        exit();
    }
}