<?php

class Users
{
    public $table = "users";
    private $host = "127.0.0.1";
    private $dbname = "duan1_db";
    private $dbuser = "root";
    private $dbpass = "";

    function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->dbuser, $this->dbpass);
    }

    function getAll()
    {
        $sql = "select * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    static function where($col, $condition, $value)
    {
        $model = new static();
        $model->queryBuilder = "select * from $model->table
                                where $col $condition '$value'";
        return $model;
    }

    public function get()
    {
        $stmt = $this->conn->prepare($this->queryBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    static function find($id)
    {
        $model = new static();
        $model->queryBuilder = "select * from $model->table where id = $id";
        $result = $model->get();
        return count($result) > 0 ? $result[0] : null;
    }
}

$allUsers = Users::where('name', 'like', '%a%')->get();
$anUser = Users::find(5);
echo "<pre>";
var_dump($allUsers);
echo "<hr>";
var_dump($anUser);
