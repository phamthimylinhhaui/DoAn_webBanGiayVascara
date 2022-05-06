<?php

require_once 'models/Model.php';
class News extends Model
{
    //khai báo các thuộc tính cho model trùng với các trường của bảng categories
    public $id;
    public $title;
    public $image;
    public $description;
    public $username;
    public $created_at;
    public $updated_at;

    //insert dữ liệu vào bảng categories
    public function insert() {
        $sql_insert =
            "INSERT INTO news (`title`, `image`, `description`, `username`,`created_at`)
VALUES (:title, :image, :description, :username,CURRENT_TIMESTAMP)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':title' => $this->title,
            ':image' => $this->image,
            ':description' => $this->description,
            ':username' => $this->username
        ];

        return $obj_insert->execute($arr_insert);
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM news ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function getById($id){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM news WHERE id=$id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}