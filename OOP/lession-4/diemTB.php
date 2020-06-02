<?php
class PhuHuynh{
    var $name;
    var $toan;
    var $van;
    var $tienganh;

    function __construct($name, $toan, $van, $tienganh)
    {
        $this->name = $name;
        $this->toan = $toan;
        $this->van = $van;
        $this->tienganh = $tienganh;
    }

    // public function cachTinh($hesotoan, $hesovan, $hesoanh)
    // {
    //     $tongHS = $hesotoan + $hesovan + $hesoanh;
    //     $trungBinh = ($this->toan * $hesotoan + $this->van * $hesovan + $this->anh * $hesoanh) / $tongHS;
    //     return $trungBinh;
    // }

    function diemTB() {
        echo "Phu huynh ". $this->name . " co diem trung binh la " . ($this->toan + $this->van + $this->tienganh) / 3 . "<br>";
    }
}

class HocSinh extends PhuHuynh{
    function diemTB() {
        echo "Hoc sinh ". $this->name . " co diem trung binh la " . ((2 * $this->toan) + (3 * $this->van) + (1 * $this->tienganh)) / 6 . "<br>";
    }
}
echo "<pre>";

$phuHuynh = new PhuHuynh("QUan", 5, 5, 5);
$phuHuynh ->diemTB();

$quan = new HocSinh("QUan", 5, 5, 5);
$quan->diemTB();
?>
