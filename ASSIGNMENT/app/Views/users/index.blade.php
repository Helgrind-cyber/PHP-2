@extends('layouts.main')

@section('title', 'Product')
@section('page', 'Danh sách sản phẩm')

@section('main-content')
<div class="card">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">AVATAR</th>
                <th scope="col">
                    <a href="{{getClientUrl('user/create')}}" class="btn btn-sm btn-info">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td class="">{{$user->name}}</td>
                <td class="">{{$user->email}}</td>

                <td>
                    @if($user->avatar == null || $user->avatar == '')
                    <span class="text-danger">NULL</span>
                    @else
                    <img src="{{$user->avatar}}" class="img-thumbnail" width="150">
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-start align-items-center">
                        <a href="{{getClientUrl('user/edit', ['id' => $user->id])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit!">
                            <i class="fas fa-pencil-alt"></i>
                        </a>&nbsp;
                        <a href="{{getClientUrl('user/remove', ['id' => $user->id])}}" class="btn btn-danger btn-sm btn-remove" data-toggle="tooltip" title="Remove!">
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
                text: "Bạn có chắc chắn muốn xóa người dùng này ?",
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
