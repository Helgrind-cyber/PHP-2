<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Invoice;

class HomeController extends BaseController
{
    public function index()
    {
        $allUser = User::all();
        $allProducts = Product::all();
        $allCategories = Category::all();
        $allInvoices = Invoice::all();

        return $this->render('home.index', [
            'users' => $allUser,
            'products' => $allProducts,
            'categories' => $allCategories,
            'invoices' => $allInvoices
        ]);
    }

    public function login()
    {
        return $this->render('login.index');
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->first();

        if (password_verify($password, $user->password)) {
            $_SESSION['user'] = [
                'name' => $user->name,
                'email' => $user->email
            ];
            header("Location: " . getClientUrl('', [
                'msg' => 'Đăng nhập thành công!'
            ]));
        } else {
            return header("Location: " . getClientUrl('login?msg=Sai mật khẩu!'));
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . BASE_URL);
        return false;
    }
}
