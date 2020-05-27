<?php

class Users
{
    var $table = "users";
    var $host = "127.0.0.1";
    var $dbname = "duan1_db";
    var $dbuser = "root";
    var $dbpass = "";

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

    function find($id)
    {
        $sql = "select * from $this->table where id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
}

$listUser = new Users();
echo "<pre>";
var_dump($listUser->getAll());
echo "=======================";
var_dump($listUser->find(1));
