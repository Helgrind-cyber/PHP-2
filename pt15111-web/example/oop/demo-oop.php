<?php
// class MayTinh{
//     var $name;
//     var $price;
//     var $color;
//     var $company;
//     var $sceen;

//     function getInfo() {
//         return "My tinh nay co ten la $this->name
//                 <br>Gia $this->price $
//                 <br>Mau la $this->color
//                 <br>San xuat tai $this->company
//                 <br>Man hinh rong $this->screen inch";
//     }
// };


// $myLaptop = new MayTinh();

// $myLaptop->name = "Inprision 15";
// $myLaptop->price = 1000;
// $myLaptop->color = "den";
// $myLaptop->company = "Dell company";
// $myLaptop->size = "15.6";

// var_dump($myLaptop->getInfo());

// class GiaoVien {
//     var $name;
//     var $gender;
//     var $dateOfBirth;
//     var $chuyenMon;
//     var $danToc;
//     var $loaiGiaoVien;
//     var $ngoaiNgu;
//     var $trinhDoChuyenMon;

// };

class ConNguoi {
    var $name;
    var $age;
    var $gender;
    var $address;
    const soChan = 2;

    function noi($cauNoi) {
        return $this->name = $cauNoi;
    }
}

$quan = new ConNguoi();

$quan->name = "Quan";
$talk = $quan->noi('Hello Everybody!');
var_dump($talk);

?>
