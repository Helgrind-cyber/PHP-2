<?php
$url = isset($_GET['url']) ? $_GET['url'] : '/';

require_once "./commons/ultils.php";
require_once "./vendor/autoload.php";
require_once "./commons/database-config.php";

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ProfileController;
use App\Controllers\UserController;

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
    case 'users':
        $ctr = new UserController();
        $ctr->index();
        break;

    default:
        echo "Duong dan khong ton tai !!!";
        break;
}
