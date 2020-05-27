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

class ConNguoi
{
    //khai báo thuộc tính động
    public $name;
    public $mat;
    public $mui;
    //khai báo constant
    const SOCHAN = 2;

    //khai báo phương thức
    public function an()
    {
        //code
    }

    public function noi($caunoi)
    {
        //gọi phương thức trong class
        return $this->getSoChan();
    }

    public function di()
    {
        //code
    }

    public function getName()
    {
        //gọi thuộc tính động trong class
        return $this->name;
    }

    public function getSoChan()
    {
        //gọi thuộc tính constant trong class
        return self::SOCHAN;
    }
}

//khởi tạo class
$connguoi = new ConNguoi();
//gọi thuộc tính ngoài class và đồng thười gán giá trị mới cho thuộc tính
$connguoi->name = 'Nguyen Hong Quan';
//gọi lại thuộc tính để xem thay đổi
echo $connguoi->name;
echo "<br>";
//gọi phương thức
echo $connguoi->noi('Vũ Thanh Tài');
?>
