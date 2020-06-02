<?php
// ke thua oop
class Animal {
    var $hairColor = "black";

    public function nhuomLong($color)
    {
        return $this->hairColor = $color;
    }
}

class Duck extends Animal{

}

$donald = new Duck();
echo "<pre>";
var_dump($donald);
var_dump($donald->nhuomLong('orange'));


?>
