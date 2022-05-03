<?php
require_once 'models/Model.php';

class User extends Model
{


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
        $sql_select_all="SELECT * FROM users $str_search";

        // chuẩn bị đối tượng truy vấn
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $users=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getAllPagination($params = []){
        $limit=$params['limit'];
        $page=$params['page'];
        //bản ghi bắt đầu
        $start=($page-1)* $limit;
        $obj_select=$this->connection->prepare("SELECT * FROM users LIMIT $start,$limit");
        //do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
        //$obj_select->bindParam(':limit',$limit,PDO::PARAM_INT);
        //$obj_select->bindParam(':start',$start,PDO::PARAM_INT);
        $obj_select->execute();
        $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}