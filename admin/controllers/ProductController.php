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

    public function create()
    {

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
            $avatar = '';
            if (empty($this->error)) {
                //xử lý upload ảnh nếu có
                if ($avatar_files['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_files['name'];
                    move_uploaded_file($avatar_files['tmp_name'], $dir_uploads . '/' . $avatar);
                }

                //lưu vào csdl
                //gọi model để thực  hiện lưu
                $product_model = new Product();
                //gán các giá trị từ form cho các thuộc tính của category
                $product_model->category_id = $category_id;
                $product_model->name = $name;
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