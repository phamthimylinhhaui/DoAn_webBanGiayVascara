<?php
require_once 'models/Model.php';

class User extends Model
{
    public $id;
    public $username;
    public $name;
    public $password;
    public $avatar;
    public $role;
    public $email;
    public $phone='';
    public $date_of_birth='';
    public $created_at;
    public $updated_at;
    public $deleted_at;

    //insert dữ liệu vào bảng categories
    public function insert() {
        $sql_insert =
            "INSERT INTO users(`username`, `password`, `role`, `date_of_birth`, `name`, `email`, `avatar`, `phone`)
VALUES (:username, :password, :role, :date_of_birth, :name, :email, :avatar, :phone)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':role' => $this->role,
            ':date_of_birth' => $this->date_of_birth,
            ':name' => $this->name,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':phone' => $this->phone
        ];
//                echo "<pre style='margin-top: 150px; margin-left: 300px;'>";
//                print_r( $arr_insert);
//                echo "</pre>";
//                die();
//

        return $obj_insert->execute($arr_insert);
    }

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET role=:role, date_of_birth=:date_of_birth, name=:name, email=:email, avatar=:avatar, phone=:phone,
            updated_at=CURRENT_TIMESTAMP() WHERE id = $id");
        $arr_update = [
            ':role' => $this->role,
            ':date_of_birth' => $this->date_of_birth,
            ':name' => $this->name,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':phone' => $this->phone
        ];

//        echo "<pre>";
//        print_r($arr_update);
//        echo "</pre>";
//        die();

        return $obj_update->execute($arr_update);
    }

    public function getUserByUsernameAdmin($username){
        $sql_select_one = "SELECT * FROM users WHERE username = :username and role =2";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            ':username' => $username
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getUserByUsername($username){
        $obj_select = $this->connection
            ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
        $obj_select->execute();
        return $obj_select->fetchColumn();
    }

    public function delete($id)
    {
//        $id_order=$this->connection->prepare("SELECT ID FROM orders WHERE user_id=$id")->fetchAll(PDO::FETCH_ASSOC);
//        echo "<pre>";
//        print_r($id_order);
//        echo "<pre>";
//        die();
        //để đảm bảo toàn vẹn dữ liệu, xóa các đơn hàng có người dùng này đặt
//        $obj_delete_order = $this->connection
//            ->prepare("DELETE FROM orders WHERE user_id = $id");
//        $obj_delete_order->execute();

        $obj_delete = $this->connection
            ->prepare("UPDATE users SET deleted_at= CURRENT_TIMESTAMP() WHERE id = $id");
        return $obj_delete->execute();
    }

    public function countUser(){
       $users= $this->getAll();
        return count($users);
    }

    public function getById($id){
        $sql_select="SELECT * FROM users WHERE id=$id";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($param=[]){
//        echo"<pre>";
//        print_r($param);
//        echo"</pre>";

        // tạo ra một chuỗi để thêm các điều kiện search
        // dựa vào mảng params truyền vào
        $str_search='WHERE TRUE';
        // check mảng params truyền vào để thay đổi chuỗi search
        if (isset($param['name']) && !empty($param['name'])){
            $name=$param['name'];
            $str_search .=" AND `name` LIKE '%$name%'";
        }
        if (isset($param['status']) && !empty($param['status'])){
            $status=$param['status'];
            $str_search .=" AND `status`=$status";
        }
        if (isset($param['deleted_at']) && !empty($param['deleted_at']) ){
          //  $deleted_at=$param['deleted_at'];
            $str_search .=" AND ISNULL(deleted_at)";
        }

        // tạo câu truy vấn
        // gán chuỗi search nếu có thêm câu truy vấn
        $sql_select_all="SELECT * FROM users WHERE deleted_at IS NULL";

        // chuẩn bị đối tượng truy vấn
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $users=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
    public function getAll1(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM users WHERE deleted_at IS NULL ORDER BY id DESC ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function getAllPagination($params = []){
        $limit=$params['limit'];
        $page=$params['page'];
        //bản ghi bắt đầu
        $start=($page-1)* $limit;
        $obj_select=$this->connection->prepare("SELECT * FROM users ORDER BY id DESC LIMIT $start,$limit ");
        //do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
        //$obj_select->bindParam(':limit',$limit,PDO::PARAM_INT);
        //$obj_select->bindParam(':start',$start,PDO::PARAM_INT);
        $obj_select->execute();
        $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}