<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::all();
        return $this->render('users.index', [
            'users' => $users
        ]);
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        User::destroy($id);
        header("Location: " . BASE_URL . 'user?msg=Xóa người dùng thành công!');
    }

    public function create()
    {
        return $this->render('users.create');
    }

    public function saveCreate()
    {
        $data = $_POST;
        $model = new User();
        $findEmail = User::where('email', $data['email'])->get();

        $error = [];
        if (strlen($data['name']) < 2 || strlen($data['name']) > 191) {
            $error['nameerr'] = "Tên người dùng năm trong khoảng từ 2 - 191 ký tự";
        }
        if (strlen($data['email']) <= 0) {
            $error['emailerr'] = "Không được để trống email";
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error['emailerr'] = "Không đúng định dạng email";
        }
        if (count($findEmail) > 0) {
            $error['emailerr'] = "Email đã tồn tại, xin mời nhập email khác!";
        }
        if(strlen($data['role']) <= 0 || $data['role'] == "") {
            $error['roleerr'] = "Xin mời chọn quyền người dùng";
        }
        if (strlen($data['password']) < 6) {
            $error['passworderr'] = "Mật khẩu cần >= 6 ký tự";
        }
        if ($data['password'] !== $data['cfpassword']) {
            $error['passworderr'] = "Mật khẩu và nhập lại mật khẩu không khớp nhau";
        }
        if (count($error) > 0) {
            header("Location: " . getClientUrl('user/create', $error));
            die;
        }

        $file = $_FILES['avatar'];
        $model->avatar = uploadImage($file, 'public/uploads/users');
        $model->password = password_hash($data['password'], PASSWORD_DEFAULT);

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'user');
        die;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $user = User::find($id);

        return $this->render('users.edit', [
            'user' => $user
        ]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = User::find($id);

        if ($model == null) {
            head("Location:" . BASE_URL . 'user');
        }

        $data = $_POST;

        $findEmail = User::where('email', $data['email'])->get();

        $error = [];
        $error['id'] = $id;
        if (strlen($data['name']) < 2 || strlen($data['name']) > 191) {
            $error['nameerr'] = "Tên người dùng năm trong khoảng từ 2 - 191 ký tự";
        }
        if (strlen($data['email']) <= 0) {
            $error['emailerr'] = "Không được để trống email";
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error['emailerr'] = "Không đúng định dạng email";
        }
        if (count($findEmail) > 1) {
            $error['emailerr'] = "Email đã tồn tại, xin mời nhập email khác!";
        }
        if(strlen($data['role']) <= 0 || $data['role'] == "") {
            $error['roleerr'] = "Xin mời chọn quyền người dùng";
        }
        if (count($error) > 1) {
            header("Location: " . getClientUrl('user/edit', $error));
            die;
        }

        $newImage = uploadImage($_FILES['avatar'], "public/uploads/users");
        if ($newImage !== null) {
            $model->avatar = $newImage;
        }

        $newPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($newPassword !== null || $newPassword !== "") {
            $model->password = $newPassword;
        }

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'user?msg=Sửa thông tin người dùng thành công!');
        die;
    }
}
