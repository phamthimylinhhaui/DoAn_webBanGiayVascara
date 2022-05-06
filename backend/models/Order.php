<?php

require_once 'models/Model.php';
class Order extends Model
{
    public $id;
    public $status;

    public function update($id){
        $obj_update = $this->connection
            ->prepare("UPDATE orders SET status=:status, updated_at=CURRENT_TIMESTAMP() WHERE id = $id");
        $arr_update = [
            ':status' => $this->status,
        ];


        return $obj_update->execute($arr_update);
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