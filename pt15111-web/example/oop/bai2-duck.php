<?php

class Duck
{
    var $name;
    var $color;
    var $children = [];

    function sinhCon($name, $color)
    {
        $newDuck = new Duck();
        $newDuck->name = $name;
        $newDuck->color = $color;
        $this->children[] = $newDuck;
    }
}

$mother = new Duck();
$mother->name = "Mother of Vịt";
$mother->color = "yellow";

$mother->sinhCon("Child 1", "red");
$mother->sinhCon("Child 2", "green");

echo "<pre>";
var_dump($mother);
