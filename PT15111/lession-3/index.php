<?php
class BaseModel
{
    var $table = "users";
    var $host = "127.0.0.1";
    var $dbname = "duan1_db";
    var $dbuser = "root";
    var $dbpass = "";

    public function __construct()
    {
        return $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->dbuser, $this->dbpass);
    }

    static function all()
    {
        $model = new static();
        $sql = "select * from $model->table";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}

class Products extends BaseModel {
    var $table = "products";
}

class Category extends BaseModel {
    var $table = "products";
}

$product = Products::all();
$category = Category::all();

echo "<pre>";
var_dump($product);
