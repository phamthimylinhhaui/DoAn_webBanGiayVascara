<?php

require_once 'models/Model.php';
class Order extends Model
{
    public $id;
    public $status;

    public function update($id){
        $query='';

        $obj_update = $this->connection
            ->prepare("UPDATE orders SET status=$this->status, updated_at=CURRENT_TIMESTAMP() WHERE id = $id");

//        if ($this->status==2){
//            //update lại số lượng có trong bảng sản phẩm
//                //lấy ra các bản ghi trong bảng chi tiết sản phẩm
//            $obj_select = $this->connection
//                ->prepare("SELECT product_id AS PRODUCT_ID, quantity FROM  order_detail
//          INNER JOIN orders ON order_detail.order_id = orders.id WHERE  orders.id = $id");
//
//            $obj_select->execute();
//
//            //$arr_product_update=[];
//            $arr_product_update = $obj_select->fetchAll(PDO::FETCH_ASSOC);
//            echo "<pre>";
//            print_r($arr_product_update);
//            echo "</pre>";
//            die();
//
//
//
//            return $products;
//        }

        return $obj_update->execute();
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM orders ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT orders.*, users.username AS username FROM orders 
          INNER JOIN users ON orders.user_id = users.id WHERE orders.id = $id");

        $obj_select->execute();

        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function countOrder(){
        $orders= $this->getAll();
        return count($orders);
    }

    public function MonthlyRevenue(){
        $sql_query="select SUM(order_detail.quantity*products.price) from orders INNER JOIN order_detail ON order_detail.order_id=orders.id 
        INNER JOIN products ON products.id=order_detail.product_id WHERE MONTH(orders.created_at)= MONTH(CURRENT_DATE)";

        $obj_select= $this->connection->prepare($sql_query);

        $obj_select->execute();
        $revenue=$obj_select->fetch();


        return $revenue[0];
    }
}