<?php
require_once 'models/Model.php';

class Feedback extends Model
{
    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM feedbacks ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }
}