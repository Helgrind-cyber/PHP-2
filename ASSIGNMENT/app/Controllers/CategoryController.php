<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        $users = User::all();

        return $this->render('categories.index', [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $products = Product::where('cate_id', $id)->delete();
        Category::destroy($id);

        header("Location: " . BASE_URL . 'category?msg=Xóa danh mục thành công!');
    }

    public function create()
    {
        $users = User::all();
        return $this->render('categories.create', [
            'users' => $users
        ]);
    }

    public function saveCreate()
    {
        $data = $_POST;

        if (strlen($data['cate_name']) <= 0) {
            $cate_nameerr = "Độ dài tên danh mục phải lớn hơn 0";
        }

        if (strlen($data['show_menu']) <= 0) {
            $show_menuerr = "Độ dài show menu phải lớn hơn 0";
        }

        if ($data['created_by'] == null) {
            $created_byerr = "Hãy chọn tác giả";
        }

        if ($cate_nameerr . $show_menuerr . $created_byerr != "") {
            header("Location: "
                . BASE_URL . "category/create?cate_nameerr=$cate_nameerr&show_menuerr=$show_menuerr&created_byerr=$created_byerr");
            die;
        }

        $model = new Category();

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'category');
        die;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        $category = Category::find($id);
        $users = User::all();

        return $this->render('categories.edit', [
            'category' => $category,
            'users' => $users
        ]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Category::find($id);

        if ($model == null) {
            head("Location:" . BASE_URL . 'category');
        }

        $data = $_POST;

        if (strlen($data['cate_name']) <= 0) {
            $cate_nameerr = "Độ dài tên danh mục phải lớn hơn 0";
        }

        if (strlen($data['show_menu']) <= 0) {
            $show_menuerr = "Độ dài show menu phải lớn hơn 0";
        }

        if ($data['created_by'] == null) {
            $created_byerr = "Hãy chọn tác giả";
        }

        if ($cate_nameerr . $show_menuerr . $created_byerr != "") {
            header("Location: "
                . BASE_URL . "category/edit?cate_nameerr=$cate_nameerr&show_menuerr=$show_menuerr&created_byerr=$created_byerr");
            die;
        }

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'category');
        die;
    }
}
