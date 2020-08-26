@extends('layouts.main')

@section('title', 'Edit Category')
@section('page', 'Sửa danh mục')
@section('short_desc', '*: Không được để trống')

@section('main-content')
<div class="container">
    <form action="{{getClientUrl('category/save-edit')}}" method="post" id="editCate">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group">
                    <label for="cate_name">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="cate_name" class="form-control" name="cate_name" placeholder="Nhập tên danh mục" value="{{$category->cate_name}}">
                    @if (isset($_GET['cate_nameerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['cate_nameerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" class="form-control" name="slug" placeholder="Nhập slug" value="{{$category->slug}}">
                    @if (isset($_GET['slugerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['slugerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="show_menu">Show menu<span class="text-danger">*</span></label>
                    <input type="text" id="show_menu" class="form-control" name="show_menu" placeholder="Nhập show menu" value="{{$category->show_menu}}">
                    @if (isset($_GET['show_menuerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['show_menuerr']}}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc">Mô tả</label>
                    <textarea name="desc" id="desc" class="form-control" cols="30" rows="5" placeholder="Nhập mô tả">{{$category->desc}}</textarea>
                    @if (isset($_GET['descerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['descerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="created_by">Tạo bởi<span class="text-danger">*</span></label>
                    <select name="created_by" id="created_by" class="form-control">
                        <option value="">Chọn người tạo</option>
                        @foreach ($users as $user)
                        <option class="text-capitalize" value="{{$user->id}}"
                                @if($category->created_by == $user->id)
                                selected
                                @endif>
                            {{$user->name}}
                        </option>
                        @endforeach
                    </select>
                    @if (isset($_GET['created_byerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['created_byerr']}}</div>
                    @endif
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button type="submit" class="btn btn-outline-primary">Sửa danh mục</button>&nbsp;
                    <a href="{{BASE_URL . 'category'}}" class="btn btn-outline-danger">Hủy</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $('#editCate').validate({
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
