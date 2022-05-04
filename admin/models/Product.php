<?php

require_once 'models/Model.php';
class Product extends Model
{
    //khai báo các thuộc tính cho model trùng với các trường của bảng categories
    public $id;
    public $category_id;
    public $name;
    public $avatar;
    public $price;
    public $amount;
    public $height='';
    public $type='';
    public $description;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    //insert dữ liệu vào bảng categories
    public function insert() {
        $sql_insert =
            "INSERT INTO products(`category_id`,`name`, `avatar`, `price`,  `amount`,  `height`,  `type`,  `description`)
VALUES (:category_id, :name, :avatar,:price,:amount,:height,:type, :description)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':category_id' => $this->category_id,
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':height' => $this->height,
            ':type' => $this->type,
            ':description' => $this->description,
        ];
                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
                print_r( $arr_insert);
                echo "</pre>";
                die();

        return $obj_insert->execute($arr_insert);
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM products ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}