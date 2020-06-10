<?php
namespace App\Models;
use PDO;

class ProductModel extends BaseModel
{
    protected $table = "products";

    public function getCateName()
    {
        $sql = "select * from categories where id=" . $this->cate_id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Categories");

        if (count($result) > 0) {
            return $result[0]->cate_name;
        }
    }
}
