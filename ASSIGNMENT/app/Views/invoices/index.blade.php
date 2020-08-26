@extends('layouts.main')

@section('title', 'Hóa đơn')
@section('page', 'Hóa đơn')

@section('main-content')
<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PHONE NUMBER</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TOTAL PRICE</th>
                <th scope="col">INVOICE DETAIL</th>

                <th scope="col">
                    <a href="{{getClientUrl('invoice/create')}}" class="btn btn-sm btn-info">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <th>{{$invoice->id}}</th>
                <td>{{$invoice->customer_name}}</td>
                <td>{{$invoice->customer_phone_number}}</td>
                <td>{{$invoice->customer_email}}</td>
                <td>{{$invoice->total_price}}</td>
                <td><a href="{{getClientUrl('invoice-detail?invoice_id='. $invoice->id)}}" class="btn btn-outline-danger">Invoice detail</a></td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{getClientUrl('invoice/edit', ['id' => $invoice->id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Sửa!">
                            <i class="fas fa-pencil-alt"></i>
                        </a>&nbsp;
                        <a href="{{getClientUrl('invoice/remove', ['id' => $invoice->id])}}" class="btn btn-danger btn-sm btn-remove" data-toggle="tooltip" title="Xóa!">
                            <i class="fas fa-minus"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- @if($total_page > 1)
    <nav aria-label=" Page navigation example">
        <ul class="pagination d-flex justify-content-center">
            @if($page > 1 && $total_page > 1)
            <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=1'}}">First page</a></li>
            <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=' . ($page - 1)}}">Previous</a></li>
            @endif
            @for($i = $min; $i <= $max; $i++)
                @if($page == $i)
                <li class="page-item active"><a class="page-link" href="{{BASE_URL . 'product?page=' . $i}}">{{$i}}</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=' . $i}}">{{$i}}</a></li>
                @endif
            @endfor
            @if($page < $total_page && $total_page > 1)
            <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=' . ($page + 1)}}">Next</a></li>
            <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=' . $total_page}}">Last page</a></li>
            @endif
        </ul>
    </nav>
@endif -->
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
