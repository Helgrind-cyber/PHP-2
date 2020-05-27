<?php
class ConBo
{
    var $ten;
    var $ma;
    var $canNang;
    var $gioiTinh;
    var $sung;

    function getInfo()
    {
        return "<p>
                    Name: <strong>$this->name</strong> co ma <strong>$this->ma</strong>.<br>
                    Can nang: <strong>$this->canNang</strong> kg<br>
                    Gioi tinh: <strong>$this->gioiTinh</strong><br>
                    So sung: <strong>$this->sung</strong> sung
                </p>";
    }

    function setSung($soSungMoi)
    {
        $this->sung = $soSungMoi;
    }

    function anCo($kgThucAn)
    {
        return $this->canNang += $kgThucAn;
    }

    function diVsinh()
    {
        if ($this->canNang > 100) {
            return $this->canNang -= 5;
        } else if ($this->canNang < 100) {
            return $this->canNang -= 2;
        }
    }
}

// Bo 1
$ngheA = new ConBo();

$ngheA->name = "Nghe non";
$ngheA->ma = "a21";
$ngheA->canNang = 100;
$ngheA->gioiTinh = "Duc";
$ngheA->sung = 100;
echo "Ban dau";
echo $ngheA->getInfo();

$ngheA->setSung(3);
echo "Them sung";
echo $ngheA->getInfo();

$ngheA->anCo(15);
echo "An co";
echo $ngheA->getInfo();

$ngheA->diVsinh();
echo "Di vsinh";
echo $ngheA->getInfo();

echo "=================================";
// Bo 1
$ngheB = new ConBo();

$ngheB->name = "Nghe xinh gai";
$ngheB->ma = "b24";
$ngheB->canNang = 80;
$ngheB->gioiTinh = "Cai";
$ngheB->sung = 2;

echo $ngheB->getInfo();

$ngheB->setSung(3);
echo $ngheB->getInfo();

$ngheB->anCo(15);
echo $ngheB->getInfo();

$ngheB->diVsinh();
echo $ngheB->getInfo();
