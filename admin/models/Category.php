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
            "INSERT INTO categories(`name`, `avatar`, `description`, `status`)
VALUES (:name, :avatar, :description, :status)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status
        ];

        return $obj_insert->execute($arr_insert);
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM categories ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}