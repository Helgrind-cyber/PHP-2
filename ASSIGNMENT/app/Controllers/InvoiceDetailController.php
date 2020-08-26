<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class InvoiceDetailController extends BaseController
{
    public function index()
    {
        if (isset($_GET['invoice_id'])) {
            $invoice_id = isset($_GET['invoice_id']) ? $_GET['invoice_id'] : -1;
            $getInvoiceDetail = InvoiceDetail::where('invoice_id', $invoice_id)->get();
            $getInvoice = Invoice::where('id', $invoice_id)->first();
        }else {
            $getInvoiceDetail = InvoiceDetail::all();
        }
        $getAllProducts = Product::all();

        return $this->render('invoice_detail.index', [
            'invoice_details' => $getInvoiceDetail,
            'invoice' => $getInvoice,
            'products' => $getAllProducts
        ]);
    }

    public function remove()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : -1;

        InvoiceDetail::destroy($id);
        header("Location: " . BASE_URL . 'invoice-detail?msg=Xóa chi tiết thành công!');
    }

    public function create()
    {
        $invoiceDetails = InvoiceDetail::all();

        return $this->render('invoice_detail.create', [
            'invoiceDetails' => $invoiceDetails
        ]);
    }

    public function saveCreate()
    {
        $data = $_POST;

        dd($data);
    }

    public function edit()
    {
        $id = isset($_GET['invoice_id']) ? $_GET['invoice_id'] : -1;
        $invoice_detail = InvoiceDetail::where('invoice_id', $id)->get();
        dd($invoice_detail);
        return $this->render('invoice_detail.edit', [
            'invoice_detail' => $invoice_detail
        ]);
    }

    public function saveEdit()
    {
        # code...
    }
}
