<?php
require_once 'models/Model.php';

class Category extends Model
{
    //khai báo các thuộc tính cho model trùng với các trường của bảng categories
    public $id;
    public $name;
    public $avatar;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    //insert dữ liệu vào bảng categories
    public function insert() {
        $sql_insert =
            "INSERT INTO categories(`name`, `description`, `status`,`created_at`)
VALUES (:name, :description, :status,CURRENT_TIMESTAMP)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':status' => $this->status
        ];

        return $obj_insert->execute($arr_insert);
    }

    public function getCategoryById($id){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM categories WHERE id = $id");
        $obj_select->execute();
        $category = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE categories SET `name` = :name, `description` = :description, `status` = :status, `updated_at` = CURRENT_TIMESTAMP() 
         WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':status' => $this->status,
           // ':updated_at' => $this->updated_at,
        ];

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        //để đảm bảo toàn vẹn dữ liệu, xóa các sản đơn hàng có sp này
//        $obj_delete_order = $this->connection
//            ->prepare("DELETE FROM order_detail WHERE product_id = $id");
//        $obj_delete_order->execute();

        //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
        $obj_delete_product = $this->connection
            ->prepare("UPDATE products SET deleted_at=CURRENT_TIMESTAMP() WHERE category_id = $id");
        $obj_delete_product->execute();

        $obj_delete = $this->connection
            ->prepare("UPDATE categories SET deleted_at=CURRENT_TIMESTAMP() WHERE id = $id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM categories WHERE deleted_at IS NULL AND status=1 ORDER BY id DESC  ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function countCategory(){
        $category= $this->getAll();
        return count($category);
    }
}