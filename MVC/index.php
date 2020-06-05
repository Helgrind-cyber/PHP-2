<?php
$url = isset($_GET['url']) ? $_GET['url'] : '/';
require_once "./app/controllers/HomeController.php";
require_once "./app/controllers/ProductController.php";
require_once "./app/controllers/ProfileController.php";

switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'chi-tiet-san-pham':
        $ctr = new ProductController();
        $ctr->chitiet();
        break;
    case 'them-gio-hang':
        $ctr = new ProductController();
        $ctr->giohang();
        break;
    case 'profile':
        $ctr = new ProfileController();
        $ctr->getProfile();
        break;

    default:
        echo "Duong dan khong ton tai !!!";
        break;
}
