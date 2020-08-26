@extends('layouts.main')

@section('title', 'Create Category')
@section('page', 'Thêm danh mục')
@section('short_desc', '*: Không được để trống')

@section('main-content')
<div class="container">
    <form action="{{getClientUrl('category/save-create')}}" method="post" id="createCate">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cate_name">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="cate_name" class="form-control" name="cate_name" placeholder="Nhập tên danh mục">
                    @if (isset($_GET['cate_nameerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['cate_nameerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" class="form-control" name="slug" placeholder="Nhập slug">
                    @if (isset($_GET['slugerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['slugerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="show_menu">Show menu<span class="text-danger">*</span></label>
                    <select name="show_menu" id="show_menu" class="form-control">
                        <option value="">Chọn show menu</option>
                        <option value="1">menu 1</option>
                        <option value="1">menu 2</option>
                    </select>
                    @if (isset($_GET['show_menuerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['show_menuerr']}}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc">Mô tả</label>
                    <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Nhập mô tả"></textarea>
                    @if (isset($_GET['descerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['descerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="created_by">Tạo bởi<span class="text-danger">*</span></label>
                    <select name="created_by" id="created_by" class="form-control">
                        <option value="">Chọn người tạo</option>
                        @foreach ($users as $user)
                        <option class="text-capitalize" value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @if (isset($_GET['created_byerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['created_byerr']}}</div>
                    @endif
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button type="submit" class="btn btn-outline-primary">Thêm danh mục</button>&nbsp;
                    <a href="{{BASE_URL . 'category'}}" class="btn btn-outline-danger">Hủy</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $('#createCate').validate({
        rules: {
            cate_name: {
                required: true,
                maxlength: 191
            },
            slug: {
                minlength: 0
            },
            show_menu: {
                required: true,
                number: true,
            },
            desc: {
                minlength: 0
            },
            created_by: {
                required: true
            }
        },
        messages: {
            cate_name: {
                required: "Không được bỏ trống tên danh mục",
                maxlength: "Độ dài tên danh mục tối đa là 191 ký tự"
            },
            slug: {
                minlength: "Độ dài tối thiểu phải lớn hơn 0"
            },
            show_menu: {
                required: "Không được bỏ trống show menu",
                number: "Show menu phải là số"
            },
            desc: {
                minlength: "Độ dài tối thiểu phải lớn hơn 0"
            },
            created_by: {
                required: "Hãy chọn người tạo"
            }
        }
    });
</script>
@endsection
