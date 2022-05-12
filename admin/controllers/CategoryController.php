<?php
require_once "controllers/Controller.php";
require_once "models/Category.php";


class CategoryController extends Controller
{
    public function index(){

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->title="Quản lý danh mục";
        $this->content = $this->render('views/categories/index.php', [
            'categories' => $categories,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create()
    {

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            //check validate
            if (empty($name)) {
                $this->error = 'Cần nhập tên';
            } //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh


            //nếu ko có lỗi thì tiến hành lưu dữ liệu và upload ảnh nếu có
            $avatar = '';
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có

                //lưu vào csdl
                //gọi model để thực  hiện lưu
                $category_model = new Category();
                //gán các giá trị từ form cho các thuộc tính của category
                $category_model->name = $name;
               // $filename="http://localhost/DoAn/publish/avatar_category/".$avatar;
              //  $category_model->avatar = $filename;
                $category_model->description = $description;
                $category_model->status = $status;

//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $category_model->status);
//                echo "</pre>";
//                die();

                //gọi phương thức insert
                $is_insert = $category_model->insert();



                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }

        }
        $this->title="Thêm danh mục mới";
        //lấy nội dung view create.php
        $this->content = $this->render('views/categories/create.php');
        //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';
    }

    public function edit()
    {
        //về cơ bản update sẽ khá giống create
        //lấy category theo id bắt đươc
        //check validate nếu id không tồn tại thì báo lỗi
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID category không hợp lệ';
            header('Location: index.php?controller=category&action=index');
            exit();
        }

        $id = $_GET['id'];
        $category_model = new Category();
        $category = $category_model->getCategoryById($id);

        //submit form
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            //check validate
            if (empty($name)) {
                $this->error = 'Cần nhập tên';
            } //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh


            //nếu ko có lỗi thì tiến hành lưu dữ liệu và upload ảnh nếu có
            $avatar = $category['avatar'];
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có

                //lưu vào csdl
                //gọi model để thực  hiện lưu
                $category_model = new Category();
                //gán các giá trị từ form cho các thuộc tính của category
                $category_model->name = $name;
                $category_model->avatar = $avatar;
                $category_model->description = $description;
                $category_model->status = $status;
                $category_model->updated_at = date('Y-m-d H:i:s');
                //gọi phương thức update theo id
                $is_update = $category_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thành công';
                } else {
                    $_SESSION['error'] = 'Update thất bại';
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }

        }

        //lấy nội dung view create.php
        $this->content = $this->render('views/categories/edit.php', ['category' => $category]);
        //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $is_delete = $category_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location: index.php?controller=category&action=index');
        exit();
    }
}