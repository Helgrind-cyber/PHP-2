<?php
namespace App\Controllers;
use App\Models\User;

class UserController
{
    function index()
    {
        // $users = User::all();

        include_once "./app/views/users/index.php";
    }
}
