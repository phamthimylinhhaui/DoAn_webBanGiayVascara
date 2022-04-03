<?php
require_once 'models/Model.php';

class User extends Model
{
    public function countUser(){
       $users= $this->getAll();
        return count($users);
    }

    public function getAll($param=[]){
        echo"<pre>";
        print_r($param);
        echo"</pre>";

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

        // tạo câu truy vấn
        // gán chuỗi search nếu có thêm câu truy vấn
        $sql_select_all="SELECT * FROM users $str_search";

        // chuẩn bị đối tượng truy vấn
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $users=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
}