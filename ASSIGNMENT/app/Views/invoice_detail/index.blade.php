@extends('layouts.main')

@section('title', 'Product')
@section('page', 'Danh sách sản phẩm')

@section('main-content')
<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">CUSTOMER</th>
                <th scope="col">PRODUCT</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">PRICE</th>
                <th scope="col">
                    <a href="{{getClientUrl('invoice-deatail/create')}}" class="btn btn-sm btn-info">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice_details as $detail)
            <tr>
                <td>{{$invoice->customer_name}}</td>
                @foreach($products as $product)
                @if($product->id == $detail->product_id)
                <td>{{$product->name}}</td>
                @endif
                @endforeach
                <td>{{$detail->quantity}}</td>
                <td>{{$detail->unit_price}}</td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{getClientUrl('invoice-detail/edit', ['invoice_id' => $detail->invoice_id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Sửa!">
                            <i class="fas fa-pencil-alt"></i>
                        </a>&nbsp;
                        <a href="{{getClientUrl('invoice-detail/remove', ['invoice_id' => $detail->invoice_id])}}" class="btn btn-danger btn-sm btn-remove" data-toggle="tooltip" title="Xóa!">
                            <i class="fas fa-minus"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            <tr>
                <th colspan="3">TỔNG CỘNG:</th>
                <th>{{$invoice->total_price}}</th>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    $(document).ready(() => {
        <?php if (isset($_GET['msg'])) : ?>
            Swal.fire({
                position: 'bottom-end',
                icon: 'success',
                title: "<?= $_GET['msg']; ?>",
                showConfirmButton: false,
                timer: 1500
            });
        <?php endif; ?>


        $('.btn-remove').click(function() {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc chắn muốn xóa sản phẩm này ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            })
            return false;
        });
    })
</script>
@endsection
