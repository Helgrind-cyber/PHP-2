<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserController
{
    function index()
    {
        $users = UserModel::all();

        include_once "./app/views/users/index.php";
    }
}
