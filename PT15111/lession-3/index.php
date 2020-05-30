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
        return $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->dbuser, $this->dbpass);
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

class Services extends BaseModel
{
    var $table = "services";
}

$services = Services::all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>4</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?= $service['id'] ?></td>
                    <td><?= $service['name'] ?></td>
                    <td><?= $service['introduce'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
