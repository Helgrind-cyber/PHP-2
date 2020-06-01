<?php

class Animal
{
    function __construct()
    {
        echo "asdas";
    }
    public function tiengKeu()
    {
        echo "ec ec - ut it";
    }
}

class Duck extends Animal
{
    public function tiengKeu()
    {
        echo "Cac Cac";
    }
    public function getParent()
    {
        # code...
        echo parent::tiengKeu();
    }
}

$donald = new Duck();
echo "<pre>";
$donald->tiengKeu();
$donald->getParent();
