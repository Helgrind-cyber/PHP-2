@extends('layouts.main')

@section('title', 'Category')
@section('page', 'Danh mục sản phẩm')

@section('main-content')
<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">SLUG</th>
                <th scope="col">SHOW MENU</th>
                <th scope="col">DESC</th>
                <th scope="col">CREATED BY</th>
                <th scope="col">
                    <a href="{{getClientUrl('category/create')}}" class="btn btn-sm btn-info">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cate)
            <tr>
                <th scope="row">{{$cate->id}}</th>
                <td class="text-capitalize">{{isNull($cate->cate_name)}}</td>
                <td class="text-capitalize">{{isNull($cate->slug)}}</td>
                <td class="text-capitalize">{{isNull($cate->show_menu)}}</td>
                <td class="text-capitalize">{{isNull($cate->desc)}}</td>
                <td class="text-capitalize">
                    @foreach($users as $user)
                        @if($user->id == $cate->created_by)
                        {{isNull($user->name, -1)}}
                        @endif
                    @endforeach
                </td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{getClientUrl('category/edit', ['id' => $cate->id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit!">
                            <i class="fas fa-pencil-alt"></i>
                        </a>&nbsp;
                        <a href="{{getClientUrl('category/remove', ['id' => $cate->id])}}" class="btn btn-danger btn-sm btn-remove" data-toggle="tooltip" title="Remove!">
                            <i class="fas fa-minus"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
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
                html:
                    'Bạn có chắc chắn muốn xóa danh mục này<br>' +
                    '<b style="text-transform: capitalize;color: red;">xóa danh mục sẽ xóa tất cả sản phẩm có trong danh mục này ?</b>',
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
