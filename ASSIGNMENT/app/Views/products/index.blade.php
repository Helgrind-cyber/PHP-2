@extends('layouts.main')

@section('title', 'Product')
@section('page', 'Danh sách sản phẩm')

@section('main-content')
<h3>Lọc sản phẩm</h3>
<form class="form-inline my-3" action="" method="GET">
    <select name="cate" class="form-control mr-sm-2">
        <option value="">Danh mục sản phẩm</option>
        @foreach ($categories as $cate)
        <option value="{{$cate->id}}"
            @if(isset($_GET['cate']))
                @if($_GET['cate'] == $cate->id)
                selected
                @endif
            @endif
            >{{$cate->cate_name}}</option>
        @endforeach
    </select>
    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Lọc sản phẩm</button>
</form>
<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">CATE</th>
                <th scope="col">PRICE</th>
                <th scope="col">STAR</th>
                <th scope="col">VIEW</th>
                <th scope="col">IMAGE</th>
                <th scope="col">
                    <a href="{{getClientUrl('product/create')}}" class="btn btn-sm btn-info">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td class="text-capitalize">{{$product->name}}</td>
                @foreach ($categories as $cate)
                @if ($cate->id == $product->cate_id)
                <td class="text-capitalize">{{isNull($cate->cate_name)}}</td>
                @endif
                @endforeach
                <td class="text-capitalize">{{$product->price}}</td>
                <td class="text-capitalize">{{$product->star}}</td>
                <td class="text-capitalize">{{$product->views}}</td>

                <td>
                    @if($product->image == null || $product->image == '')
                    <span class="text-danger">NULL</span>
                    @else
                    <img src="{{$product->image}}" class="img-thumbnail" width="150">
                    @endif

                </td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{getClientUrl('product/edit', ['id' => $product->id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit!">
                            <i class="fas fa-pencil-alt"></i>
                        </a>&nbsp;
                        <a href="{{getClientUrl('product/remove', ['id' => $product->id])}}" class="btn btn-danger btn-sm btn-remove" data-toggle="tooltip" title="Remove!">
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
        @for($i = $min; $i <= $max; $i++) @if($page==$i) <li class="page-item active"><a class="page-link" href="{{BASE_URL . 'product?page=' . $i}}">{{$i}}</a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{BASE_URL . 'product?page=' . $i}}">{{$i}}</a></li>
            @endif
            @endfor
            @if($page < $total_page && $total_page> 1)
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
