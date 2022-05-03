<?php

require_once 'models/Model.php';
class Product extends Model
{
    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM products ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}