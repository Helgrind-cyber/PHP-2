<?php
class LopCha {
    private $taisan = 50;
    protected $tienluong = 20;

    public function getTaisan() {
        return $this->taisan;
    }
    public function setTaisan($tsMoi) {
        $this->taisan = $tsMoi;
    }
}

class LopCon extends LopCha {
    function tieuVat() {
        echo $this->tienluong * 0.2;
    }
}

$abc = new LopCha();

echo "<pre>";
echo $abc->getTaisan();
echo "--------";
echo $abc->setTaisan(35);
echo "--------";
echo $abc->getTaisan();

$abs = new LopCon();
echo "--------";
echo $abs->tieuVat();
