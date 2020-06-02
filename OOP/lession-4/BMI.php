<?php

class Animal {
    var $height;
    var $weight;


    function __construct($height, $weight)
    {
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getBIM()
    {
        $result = round($this->weight / ($this->height / 100 * 2));
        return $result;
    }
}

class Human extends Animal {
    public function getBIM()
    {
        $bmi = parent::getBIM();

        if($bmi < 18) {
            echo "gay" . $bmi;
        }else if($bmi > 20) {
            echo "beo" . $bmi;
        }else {
            echo "binh thuong" . $bmi;
        }
    }

}


// $ran = new Animal(24, 25);
// echo "<pre>";
// var_dump($ran->getBIM());

$quan = new Human(165, 80);
$quan->getBIM();

?>
