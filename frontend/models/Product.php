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
            "INSERT INTO products(`category_id`,`name`, `avatar`, `price`,  `amount`,  `height`,  `type`,  `description`,`created_at`)
VALUES (:category_id, :name, :avatar,:price,:amount,:height,:type, :description,CURRENT_TIMESTAMP)";

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
//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $arr_insert);
//                echo "</pre>";
//                die();

        return $obj_insert->execute($arr_insert);
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE products SET category_id=:category_id, name=:name, avatar=:avatar, price=:price,amount=:amount,
            height=:height, type=:type, description=:description, updated_at=CURRENT_TIMESTAMP() WHERE id = $id
");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':amount' => $this->amount,
            ':height' => $this->height,
            ':type' => $this->type,
            ':description' => $this->description,
        ];
        return $obj_update->execute($arr_update);
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id = $id");
        return $obj_delete->execute();
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM products where amount > 0 AND deleted_at IS NULL ORDER BY created_at DESC LIMIT 8");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function getByCategory($category_id){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE category_id=$category_id and products.deleted_at IS NULL");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function findByName($name){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE products.name LIKE '%".$name."%'    ");

        $arr_select = [];
        $obj_select->execute($arr_select);


        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}