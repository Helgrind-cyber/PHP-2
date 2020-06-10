<?php
namespace App\Controllers;
use App\Models\ProductModel;

class HomeController
{
    function index()
    {
        $products = ProductModel::all();
        require_once "./app/views/home/trang-chu.php";
    }
}
