<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController extends BaseController
{
    public function index()
    {
        $getAllInvoices = Invoice::all();
        return $this->render('invoices.index', [
            'invoices' => $getAllInvoices
        ]);
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        Invoice::destroy($id);
        header("Location: " . BASE_URL . 'invoice?msg=Xóa hóa đơn thành công!');
    }

    public function create()
    {
        return $this->render('invoices.create', []);
    }

    public function saveCreate()
    {
        $data = $_POST;

        if (strlen($data['customer_name']) <= 0) {
            $customer_nameerr = "Không được để trống";
        }
        if (strlen($data['customer_phone_number']) <= 0) {
            $customer_phone_numbererr = "Không được để trống";
        }
        if (strlen($data['customer_email']) <= 0) {
            $customer_emailerr = "Không được để trống";
        }
        if ($data['customer_email'] == "" && !filter_var($data['customer_email'], FILTER_VALIDATE_EMAIL)) {
            $customer_emailerr = "Không đúng định dạng email";
        }
        if (strlen($data['customer_address']) <= 0) {
            $customer_addresserr = "Không được để trống";
        }

        if ($customer_nameerr . $customer_phone_numbererr . $customer_emailerr . $customer_addresserr != "") {
            header("Location: " . BASE_URL . "invoice/create?customer_nameerr=$customer_nameerr&customer_phone_numbererr=$customer_phone_numbererr&customer_emailerr=$customer_emailerr&customer_addresserr=$customer_addresserr");
            die;
        }

        $model = new Invoice();
        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'invoice');
        die;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;
        $invoice = Invoice::find($id);
        return $this->render('invoices.edit', [
            'invoice' => $invoice
        ]);
    }

    public function saveEdit()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : -1;
        $model = Invoice::find($id);

        if ($model == null) {
            head("Location:" . BASE_URL . 'invoice');
        }

        $data = $_POST;

        if (strlen($data['customer_name']) <= 0) {
            $customer_nameerr = "Không được để trống";
        }
        if (strlen($data['customer_phone_number']) <= 0) {
            $customer_phone_numbererr = "Không được để trống";
        }
        if (strlen($data['customer_email']) <= 0) {
            $customer_emailerr = "Không được để trống";
        }
        if ($data['customer_email'] == "" && !filter_var($data['customer_email'], FILTER_VALIDATE_EMAIL)) {
            $customer_emailerr = "Không đúng định dạng email";
        }
        if (strlen($data['customer_address']) <= 0) {
            $customer_addresserr = "Không được để trống";
        }

        if ($customer_nameerr . $customer_phone_numbererr . $customer_emailerr . $customer_addresserr != "") {
            header("Location: " . BASE_URL . "invoice/edit?customer_nameerr=$customer_nameerr&customer_phone_numbererr=$customer_phone_numbererr&customer_emailerr=$customer_emailerr&customer_addresserr=$customer_addresserr");
            die;
        }

        $model->fill($data);
        $model->save();

        header("Location: " . BASE_URL . 'invoice');
        die;
    }
}
