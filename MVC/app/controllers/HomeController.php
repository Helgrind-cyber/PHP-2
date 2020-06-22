<?php
namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    public function index()
    {
        // $products = Product::skip(3)->take(3)->get();
        $products = Product::skip(3)->take(3)->get();
        echo $products;
        dd($products);
        require_once "./app/views/home/trang-chu.php";
    }
}
