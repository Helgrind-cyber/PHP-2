<?php

class Car {
    var $loai;
    var $color;
    var $price;
}

class ConNguoi {
    var $name;
    var $age;
    var $address;
    var $car = [];

    function MuaXe($type, $color, $price) {
        $newCar = new Car();
        $newCar->loai = $type;
        $newCar->color = $color;
        $newCar->price = $price;
        return array_push($this->car, $newCar);
    }
}

$Quan = new ConNguoi();
$Quan->name = "Nguyen Hong Quan";
$Quan->age = 24;
$Quan->address = "My dinh";

$Quan->MuaXe('Ferari', 'Red', 10000000000000);

echo "<pre>";
var_dump($Quan);
?>
