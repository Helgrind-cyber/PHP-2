@extends('layouts.main')

@section('title', 'Create User')
@section('page', 'Thêm người dùng')
@section('short_desc', '*: Không được để trống')

@section('main-content')
<div class="container">
    <form action="{{getClientUrl('user/save-create')}}" method="post" enctype="multipart/form-data" id="createUser">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên người dùng<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Nhập tên người dùng">
                    @if (isset($_GET['nameerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['nameerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="role">Quyền<span class="text-danger">*</span></label>
                    <select name="role" id="role" class="form-control">
                        <option value="" class="text-capitalize">Quyền hạn</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="200">200</option>
                        <option value="700">700</option>
                    </select>
                    @if (isset($_GET['roleerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['roleerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="Nhập email người dùng">
                    @if (isset($_GET['emailerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['emailerr']}}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password<span class="text-danger">*</span></label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="re_password">Nhập lại password<span class="text-danger">*</span></label>
                    <input type="password" id="re_password" name="cfpassword" class="form-control">
                    @if (isset($_GET['passworderr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['passworderr']}}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-5 form-group">
                        <img src="{{DEFAULT_IMG}}" id="preview-img" height="70%" class="img-thumbnail">
                    </div>
                    <div class="col-7 form-group">
                        <label for="avatar">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" id="avatar" placeholder="Nhập tên sản phẩm" name="avatar" onchange="encodeImageFileAsURL(this)">
                    </div>
                    <div class="col-12">
                        @if (isset($_GET['avatarerr']))
                        <div class="alert alert-danger" role="alert">{{$_GET['avatarerr']}}</div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button type="submit" class="btn btn-outline-primary">Thêm người dùng</button>&nbsp;
                    <a href="{{getClientUrl('user')}}" class="btn btn-outline-danger">Hủy</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if (file === undefined) {
            $('#preview-img').attr('src', "{{DEFAULT_IMG}}");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
</script>
@endsection
