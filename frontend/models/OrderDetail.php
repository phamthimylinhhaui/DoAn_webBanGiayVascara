<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
    public function getByIdOrder($order_id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT order_detail.* , products.name AS product_name, products.avatar AS product_image,products.price AS product_price FROM order_detail  
                INNER JOIN products ON order_detail.product_id = products.id
                WHERE order_detail.order_id = $order_id");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}