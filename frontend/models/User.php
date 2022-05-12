<?php
require_once 'models/Model.php';

class User extends Model
{
    public $id;
    public $username;
    public $name;
    public $password;
    public $avatar;
    public $role;
    public $email;
    public $phone='';
    public $date_of_birth='';
    public $created_at;
    public $updated_at;
    public $deleted_at;

    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET  date_of_birth=:date_of_birth, name=:name, email=:email, avatar=:avatar, phone=:phone,
            updated_at=CURRENT_TIMESTAMP() WHERE id = $id");
        $arr_update = [
            ':date_of_birth' => $this->date_of_birth,
            ':name' => $this->name,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':phone' => $this->phone
        ];

//        echo "<pre>";
//        print_r($arr_update);
//        echo "</pre>";
//        die();

        return $obj_update->execute($arr_update);
    }

    public function updateProfile($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE users SET password=:password, date_of_birth=:date_of_birth, name=:name, email=:email, avatar=:avatar, phone=:phone,
            updated_at=CURRENT_TIMESTAMP() WHERE id = $id");
        $arr_update = [
            ':password' => $this->password,
            ':date_of_birth' => $this->date_of_birth,
            ':name' => $this->name,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':phone' => $this->phone
        ];

//        echo "<pre>";
//        print_r($arr_update);
//        echo "</pre>";
//        die();

        return $obj_update->execute($arr_update);
    }

    public function registerUser(){
        $sql_insert =
            "INSERT INTO users(`username`, `password`, `date_of_birth`, `name`, `email`)
VALUES (:username, :password, :date_of_birth, :name, :email)";

        //cbi đối tượng truy vấn
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        //gán giá trị thật cho các placeholder
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':date_of_birth' => $this->date_of_birth,
            ':name' => $this->name,
            ':email' => $this->email,
        ];

        return $obj_insert->execute($arr_insert);
    }

    public function getUserByUsername($username) {
        $sql_select_one = "SELECT * FROM users WHERE username = :username";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects = [
            ':username' => $username
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getById($id){
        $sql_select="SELECT * FROM users WHERE id=$id";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}