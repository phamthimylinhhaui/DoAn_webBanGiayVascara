<?php

require_once 'models/Model.php';
class Order extends Model
{
    public $id;
    public $user_id;
    public $full_name;
    public $address;
    public $phone;
    public $note;
    public $price_total;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    /**
     * Tổng giá trị giỏ hàng
     */
    public function cartTotal(){
        $total = 0;
        foreach($_SESSION['cart'] as $product){
            $total += ($product['price']) * $product['quantity'];
        }
        return $total;
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT orders.*, users.username AS username FROM orders 
          INNER JOIN users ON orders.user_id = users.id WHERE orders.id = $id");

        $obj_select->execute();

        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function insert() {
        $this->user_id=$_SESSION['user']['id'];

        //lay tong gia cua gio hang
        $this->price_total = $this->cartTotal();
        $_SESSION['price_total']=$this->price_total;

        $sql_insert="INSERT INTO orders (`user_id`,`full_name`, `address`, `phone`,  `note`,  `price_total`,  `created_at`)
                    VALUES (:user_id, :full_name,:address,:phone,:note,:price_total,CURRENT_TIMESTAMP)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':user_id' => $this->user_id,
            ':full_name' => $this->full_name,
            ':address' => $this->address,
            ':phone' => $this->phone,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
        ];


      $flag= $obj_insert->execute($arr_insert);
//        echo "<pre >";
//        print_r($flag);
//        echo "</pre>";
//        die();
       // return $obj_insert->execute($arr_insert);

        //lay id vua moi insert
        $order_id = $this->connection->lastInsertId();
        $_SESSION['order_id']=$order_id;
        //duyet cac ban ghi trong session array de insert vao orderdetails
        foreach($_SESSION["cart"] as $product){
            $query = $this->connection->prepare("insert into order_detail set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity");
            $query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>$product["price"],"quantity"=>$product["quantity"]));

            //cập nhật số lượng sp
            $id_product=$product['id'];
            $sol=$product["amount"]-$product["quantity"];
            $query = $this->connection->prepare("update products set amount=:var_sl where id=$id_product");
            $query->execute(array("var_sl"=>$sol));
        }
        //xoa gio hang
        unset($_SESSION["cart"]);
      //  return $obj_insert->execute($arr_insert);
    }

    public function getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM orders ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }
    public function getAllByUser($id_user){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM orders WHERE user_id=$id_user");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }
}