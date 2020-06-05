<?php
require_once './app/models/UserModel.php';

class UserController
{
    function index()
    {
        $users = UserModel::all();

        include_once "./app/views/users/index.php";
    }
}
