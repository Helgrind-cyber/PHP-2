<?php
class ConKhi {
    var $mat;
    var $mui;
    var $mieng;
}

class ConNguoi extends Conkhi {

}

var_dump($quan= new ConNguoi());

class A
{
    //class A
    function getClassName() {
        return 'Parent Class';
    }
}

class B extends A
{
    var $name = 'Child class';

    function getClass() {
        return $this->name ;
    }

    function getMethod() {
        echo "Day la phuong thuc cua class" . $this->getClass();
    }

    function getMethodParent() {
        echo "ABC" . parent::getClassName();
    }
}

$class = new B();
echo $class->getMethod();
echo "<br>";
echo $class->getMethodParent();
?>
