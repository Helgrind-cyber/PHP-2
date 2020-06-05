<?php
require_once './app/models/Product.php';

class HomeController
{
    function index()
    {
        $products = Product::all();


        $name = "Quan";
        $address = "Nam Dinh";
        include_once "./app/views/home/trang-chu.php";
    }
}
