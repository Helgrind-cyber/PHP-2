<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends BaseController
{
    public function index()
    {
        if (!isset($_GET['cate']) || $_GET['cate'] == "") {
            $getAllProduct = Product::all();
        } else {
            $getAllProduct = Product::where('cate_id', $_GET['cate'])->get();
        }
        $categories = Category::all();
        // // san pham o trang
        // $total_product_one_page = 8;
        // // lay so page hien tai
        // $page = isset($_GET['page']) ? $_GET['page'] : 1;
        // // offset
        // $offset = ($page - 1) * $total_product_one_page;

        // $total_rows = count($getAllProduct);
        // $total_page = ceil($total_rows / $total_product_one_page);

        // $range = 11;
        // $middle = ceil($range / 2);

        // if ($total_page < $range) {
        //     $min  = 1;
        //     $max = $total_page;
        // } else {
        //     $min = $page - $middle + 1;
        //     $max = $page + $middle + 1;

        //     if ($min < 1) {
        //         $min = 1;
        //         $max = $range;
        //     } else if ($max > $total_page) {
        //         $max = $total_page;
        //         $min = $total_page - $range + 1;
        //     }
        // }

        // $products = Product::skip($offset)->take($total_product_one_page)->get();

        return $this->render('products.index', [
            'products' => $getAllProduct,
            // 'total_page' => $total_page,
            // 'min' => $min,
            // 'max' => $max,
            // 'page' => $page,
            'categories' => $categories
        ]);
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        Product::destroy($id);
        header("Location: " . BASE_URL . 'product?msg=Xóa sản phẩm thành công!');
    }

    public function create()
    {
        $categories = Category::all();

        return $this->render('products.create', [
            'categories' => $categories
        ]);
    }

    public function saveCreate()
    {
        $data = $_POST;
        $model = new Product();
        $file = $_FILES['image'];

        if (strlen($data['name']) <= 0) {
            $nameerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['cate_id']) <= 0) {
            $cate_iderr = "Hãy chọn danh mục sản phẩm";
        }
        if (strlen($data['price']) <= 0) {
            $priceerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['star']) <= 0) {
            $starerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['views']) <= 0) {
            $viewserr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['short_desc']) <= 0) {
            $short_descerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['detail']) <= 0) {
            $detailerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($file['name']) <= 0) {
            $imageerr = "Hãy chọn ảnh đại diện cho sản phẩm";
        }

        if ($nameerr . $cate_iderr . $priceerr . $starerr . $viewserr . $short_descerr . $detailerr . $imageerr != "") {
            header("Location: " . BASE_URL . "product/create?nameerr=$nameerr&cate_iderr=$cate_iderr&priceerr=$priceerr&starerr=$starerr&viewserr=$viewserr&short_descerr=$short_descerr&detailerr=$detailerr&imageerr=$imageerr");
            die;
        }

        $model->image = uploadImage($file, 'public/uploads/products');
        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'product');
        die;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        $product = Product::find($id);
        $categories = Category::all();

        return $this->render('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Product::find($id);

        if ($model == null) {
            head("Location:" . BASE_URL . 'product');
        }

        $data = $_POST;
        $newImage = uploadImage($_FILES['image'], "public/uploads/products");
        if ($newImage != null) {
            $model->image = $newImage;
        }

        if (strlen($data['name']) <= 0) {
            $nameerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['cate_id']) <= 0) {
            $cate_iderr = "Hãy chọn danh mục sản phẩm";
        }
        if (strlen($data['price']) <= 0) {
            $priceerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['star']) <= 0) {
            $starerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['views']) <= 0) {
            $viewserr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['short_desc']) <= 0) {
            $short_descerr = "Độ dài tối thiếu phải lớn hơn 0";
        }
        if (strlen($data['detail']) <= 0) {
            $detailerr = "Độ dài tối thiếu phải lớn hơn 0";
        }

        if ($nameerr . $cate_iderr . $priceerr . $starerr . $viewserr . $short_descerr . $detailerr != "") {
            header("Location: " . BASE_URL . "product/create?nameerr=$nameerr&cate_iderr=$cate_iderr&priceerr=$priceerr&starerr=$starerr&viewserr=$viewserr&short_descerr=$short_descerr&detailerr=$detailerr");
            die;
        }

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'product');
        die;
    }
}
