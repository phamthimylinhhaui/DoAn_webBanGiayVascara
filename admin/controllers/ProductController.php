<?php
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Category.php";


class ProductController extends Controller
{
    public function index(){
        $product_model = new Product();
        $products = $product_model->getAll();

        $this->title="Quản lý sản phẩm";
        $this->content = $this->render('views/products/index.php', [
            'products' => $products,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function edit(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            //$avatar = $_FILES['avatar'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $height = $_POST['height'];
            $type = $_POST['type'];
            $description= $_POST['description'];

            //xử lý validate
            if (empty($name)) {
                $this->error = 'Không được để trống title';
            } else if ($_FILES['avatar']['error'] == 0) {
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
                $filename = $product['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = '../publish/avatar_product';
                    //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $product_model->category_id = $category_id;
                $product_model->name = $name;

                $avatar="http://localhost/DoAn/publish/avatar_product/".$filename;
                $product_model->avatar = $avatar;

                $product_model->price = $price;
                $product_model->amount = $amount;
                $product_model->height = $height;
                $product_model->type = $type;
                $product_model->description = $description;
                //$product_model->updated_at = date('Y-m-d H:i:s');

                $is_update = $product_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=product');
                exit();
            }
        }

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->title="sửa sản phẩm";
        $this->content = $this->render('views/products/edit.php', [
            'categories' => $categories,
            'product' => $product,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getById($id);

        $category_model = new Category();
        $category = $category_model->getCategoryById($product['category_id']);

        $this->title="chi tiết sản phẩm";
        $this->content = $this->render('views/products/detail.php', [
            'product' => $product,
            'category' => $category,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
    }

    public function create()
    {

        $product_model = new Product();

        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $avatar_files = $_FILES['avatar'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $height = $_POST['height'];
            $type = $_POST['type'];
            $description = $_POST['description'];

            //check validate
            if (empty($name)) {
                $this->error = 'Cần nhập tên sản phẩm';
            }
            else if (empty($category_id)) {
                $this->error = 'Cần nhập loại danh mục sản phẩm';
            }
            else if (empty($price)) {
                $this->error = 'Cần nhập giá sản phẩm';
            }

            else if (empty($amount)) {
                $this->error = 'Cần nhập số lượng có của sản phẩm';
            }
            //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh
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
            $filename = '';
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có
                if ($avatar_files['error'] == 0) {
                    $dir_uploads = '../publish/avatar_product';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $filename = time() . '-' . $avatar_files['name'];
                    move_uploaded_file($avatar_files['tmp_name'], $dir_uploads . '/' . $filename);
                }

                //lưu vào csdl
                //gọi model để thực  hiện lưu
                //gán các giá trị từ form cho các thuộc tính của category
                $product_model->category_id = $category_id;
                $product_model->name = $name;
                $avatar="http://localhost/DoAn/publish/avatar_product/".$filename;

                $product_model->avatar = $avatar;
                $product_model->price = $price;
                $product_model->amount = $amount;
                $product_model->height = $height;
                $product_model->type = $type;
                $product_model->description = $description;


//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $category_model->status);
//                echo "</pre>";
//                die();

                //gọi phương thức insert
                $is_insert = $product_model->insert();



                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                } else {
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=product&action=index');
                exit();
            }

        }
        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->title="Thêm sản phẩm mới";
        //lấy nội dung view create.php
        $this->content = $this->render('views/products/create.php',[
        'categories' => $categories ]);
        //gọi layout để nhúng nội dung view create vừa lấy đc
        require_once 'views/layouts/main.php';
    }
}