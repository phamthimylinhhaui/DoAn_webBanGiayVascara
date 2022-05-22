<?php

require_once 'models/Model.php';
class Order extends Model
{
    public $id;
    public $status;

    public function update($order_id){
        $query='';

        $obj_update = $this->connection
            ->prepare("UPDATE orders SET status=$this->status, updated_at=CURRENT_TIMESTAMP() WHERE id = $order_id");

        // xử lý logic với trạng thái hủy đơn
       if ($this->status==3){
//            //update lại số lượng có trong bảng sản phẩm
//                //lấy ra các bản ghi trong bảng chi tiết sản phẩm
//            $obj_select = $this->connection
//                ->prepare("SELECT product_id AS PRODUCT_ID, quantity FROM  order_detail
//          INNER JOIN orders ON order_detail.order_id = orders.id WHERE  orders.id = $id");
//            $obj_select->execute();
//            $arr_product_update = $obj_select->fetchAll(PDO::FETCH_ASSOC);
//            echo "<pre>";
//            print_r($arr_product_update);
//            echo "</pre>";
//            die();
//            return $products;

//           Array
//           (
//               [0] => Array
//               (
//                   [PRODUCT_ID] => 12
//                   [PRODUCT_quantity] => 2
//                )
//
//              [1] => Array
//              (
//                   [PRODUCT_ID] => 16
//                  [PRODUCT_quantity] => 3
//              )
//          )

           // update lại số lượng sp nếu đơn hàng bị hủy
                // lấy ra order_detail của đơn hàng
           $update_product=$this->get_order_detail($order_id);
           foreach ($update_product AS $product){
               $product_id=$product['PRODUCT_ID'];
               $product_quantity=$product['PRODUCT_quantity'];
               $obj_update_product = $this->connection->prepare("UPDATE products SET amount=amount+ $product_quantity, `updated_at` = CURRENT_TIMESTAMP() 
                 WHERE id = $product_id");
               $obj_update_product->execute();
           }

      }

        return $obj_update->execute();
    }

    public function get_order_detail($id){
        //lấy ra các bản ghi trong bảng chi tiết sản phẩm
            $obj_select = $this->connection
                ->prepare("SELECT product_id AS PRODUCT_ID, quantity AS PRODUCT_quantity FROM  order_detail
          INNER JOIN orders ON order_detail.order_id = orders.id WHERE  orders.id = $id");

            $obj_select->execute();

//        echo "<pre>";
//            print_r($obj_select->fetchAll(PDO::FETCH_ASSOC));
//            echo "</pre>";
//            die();
            return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStatus($id){
        $obj_select = $this->connection
                ->prepare("SELECT status FROM  orders WHERE  orders.id = $id");

            $obj_select->execute();
           return $obj_select->fetch(PDO::FETCH_ASSOC);

//        echo "<pre>";
//            print_r($arr_product_update);
//            echo "</pre>";
//            die();
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM orders ORDER BY id DESC ");

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