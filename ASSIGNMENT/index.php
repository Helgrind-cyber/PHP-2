<?php
session_start();
$url = isset($_GET['url']) == true ? $_GET['url'] : '/';

require_once "./vendor/autoload.php";
require_once "./commons/database-config.php";
require_once "./commons/ultil.php";

use App\Routes\CustomRoute;

CustomRoute::init($url);

// switch ($url) {
//     case '/':
//         $ctr = new HomeController();
//         $ctr->index();
//         break;
//     case 'login':
//         $ctr = new HomeController();
//         $ctr->login();
//         break;
//     case 'post-login':
//         $ctr = new HomeController();
//         $ctr->postLogin();
//         break;
//     case 'logout':
//         $ctr = new HomeController();
//         $ctr->logout();
//         break;


//     case 'product':
//         $ctr = new ProductController();
//         $ctr->index();
//         break;
//     case 'product/remove':
//         $ctr = new ProductController();
//         $ctr->remove();
//         break;
//     case 'product/create':
//         $ctr = new ProductController();
//         $ctr->create();
//         break;
//     case 'product/save-create':
//         $ctr = new ProductController();
//         $ctr->saveCreate();
//         break;
//     case 'product/edit':
//         $ctr = new ProductController();
//         $ctr->edit();
//         break;
//     case 'product/save-edit':
//         $ctr = new ProductController();
//         $ctr->saveEdit();
//         break;
//         // End product routes

//     case 'category':
//         $ctr = new CategoryController();
//         $ctr->index();
//         break;
//     case 'category/remove':
//         $ctr = new CategoryController();
//         $ctr->remove();
//         break;
//     case 'category/create':
//         $ctr = new CategoryController();
//         $ctr->create();
//         break;
//     case 'category/save-create':
//         $ctr = new CategoryController();
//         $ctr->saveCreate();
//         break;
//     case 'category/edit':
//         $ctr = new CategoryController();
//         $ctr->edit();
//         break;
//     case 'category/save-edit':
//         $ctr = new CategoryController();
//         $ctr->saveEdit();
//         break;
//         // End Category routes

//     case 'invoice':
//         $ctr = new InvoiceController();
//         $ctr->index();
//         break;
//     case 'invoice/remove':
//         $ctr = new InvoiceController();
//         $ctr->remove();
//         break;
//     case 'invoice/create':
//         $ctr = new InvoiceController();
//         $ctr->create();
//         break;
//     case 'invoice/save-create':
//         $ctr = new InvoiceController();
//         $ctr->saveCreate();
//         break;
//     case 'invoice/edit':
//         $ctr = new InvoiceController();
//         $ctr->edit();
//         break;
//     case 'invoice/save-edit':
//         $ctr = new InvoiceController();
//         $ctr->saveEdit();
//         break;
//         // End Invoice routes

//     case 'invoice-detail':
//         $ctr = new InvoiceDetailController();
//         $ctr->index();
//         break;
//     case 'invoice-detail/remove':
//         $ctr = new InvoiceDetailController();
//         $ctr->remove();
//         break;
//     case 'invoice-detail/create':
//         $ctr = new InvoiceDetailController();
//         $ctr->create();
//         break;
//     case 'invoice-detail/save-create':
//         $ctr = new InvoiceDetailController();
//         $ctr->saveCreate();
//         break;
//     case 'invoice-detail/edit':
//         $ctr = new InvoiceDetailController();
//         $ctr->edit();
//         break;
//     case 'invoice-detail/save-edit':
//         $ctr = new InvoiceDetailController();
//         $ctr->saveEdit();
//         break;

    // default:
    //     $ctr = new NotFoundController();
    //     $ctr->index();
    //     break;
// }
