<?php
require_once './app/models/ProductModel.php';

class HomeController
{
    function index()
    {
        $products = ProductModel::all();

        include_once "./app/views/home/trang-chu.php";
    }
}
