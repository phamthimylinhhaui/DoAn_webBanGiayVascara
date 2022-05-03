<?php
require_once 'models/Model.php';

class Category extends Model
{
    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM categories ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}