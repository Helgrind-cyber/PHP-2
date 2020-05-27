<?php

/**
 * Chay ngay lap tuc khi 1 contance moi duoc tao ra
 */

class Animal {
    function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }
}

$vit = new Animal("Donald", 23, "Male");
echo "<pre>";
var_dump($vit);
?>
