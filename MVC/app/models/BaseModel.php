<?php
class BaseModel
{
    function __construct()
    {
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=demo_mvc;charset=utf8", "root", "");
    }

    public static function all()
    {
        $model = new static();
        $query = "select * from " . $model->table;
        $stmt = $model->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
    }
}
