@extends('layouts.main')

@section('title', 'Create Product')
@section('page', 'Thêm sản phẩm')
@section('short_desc', '*: Không được để trống')

@section('main-content')
<div class="container">
    <form action="{{getClientUrl('product/save-create')}}" method="post" enctype="multipart/form-data" id="createProduct">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên sản phẩm<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                    @if (isset($_GET['nameerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['nameerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cate">Danh mục<span class="text-danger">*</span></label>
                    <select name="cate_id" id="cate" class="form-control">
                        <option value="" class="text-capitalize" selected>Danh Mục Sản Phẩm</option>
                        @foreach ($categories as $cate)
                        <option class="text-capitalize" value="{{$cate->id}}">{{$cate->cate_name}}</option>
                        @endforeach
                    </select>
                    @if (isset($_GET['cate_iderr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['cate_iderr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Giá sản phẩm<span class="text-danger">*</span></label>
                    <input type="text" id="price" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
                    @if (isset($_GET['priceerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['priceerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Số sao<span class="text-danger">*</span></label>
                    <input type="text" id="star" class="form-control" name="star" placeholder="Nhập số sao">
                    @if (isset($_GET['starerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['starerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Lượt xem<span class="text-danger">*</span></label>
                    <input type="text" id="views" class="form-control" name="views" placeholder="Nhập lượt xem sản phẩm">
                    @if (isset($_GET['viewserr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['viewserr']}}</div>
                    @endif
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Mô tả ngắn<span class="text-danger">*</span></label>
                    <textarea name="short_desc" id="" cols="30" rows="4" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
                    @if (isset($_GET['short_descerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['short_descerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Chi tiết<span class="text-danger">*</span></label>
                    <textarea name="detail" id="" cols="30" rows="6" class="form-control" placeholder="Nhập chi tiết sản phẩm"></textarea>
                    @if (isset($_GET['detailerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['detailerr']}}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-5 form-group">
                        <img src="{{DEFAULT_IMG}}" id="preview-img" height="70%" class="img-thumbnail">
                    </div>
                    <div class="col-7 form-group">
                        <label for="image">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" id="image" placeholder="Nhập tên sản phẩm" name="image" onchange="encodeImageFileAsURL(this)">
                    </div>
                    <div class="col-12">
                        @if (isset($_GET['imageerr']))
                        <div class="alert alert-danger" role="alert">{{$_GET['imageerr']}}</div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button type="submit" class="btn btn-outline-primary">Thêm sản phẩm</button>&nbsp;
                    <a href="{{BASE_URL . 'product'}}" class="btn btn-outline-danger">Hủy</a>
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
            $('#preview-img').attr('src', "<?= DEFAULT_IMG ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $('#preview-img').attr('src', reader.result)
        }
        reader.readAsDataURL(file);
    }
    $('#createProduct').validate({
        rules: {
            name: {
                required: true,
                maxlength: 191
            },
            price: {
                required: true,
                number: true,
                min: 0
            },
            star: {
                required: true,
                number: true,
                max: 5,
                min: 0
            },
            views: {
                required: true,
                number: true,
                min: 0
            },
            short_desc: {
                required: true
            },
            detail: {
                required: true
            },
            cate_id: {
                required: true
            },
            image: {
                required: true,
                extension: "png|jpg|jpeg|gif"
            }
        },
        messages: {
            name: {
                required: "Không được để trống tên sản phẩm",
                maxlength: "Độ dài tên sản phẩm không thể vượt quá 191 ký tự"
            },
            price: {
                required: "Không được để trống giá sản phẩm",
                number: "Giá sản phẩm phải nhập bằng số",
                min: "Giá sản phẩm phải lớn hơn 0"
            },
            star: {
                required: "Không được để trống",
                number: "Số sao phải nhập bằng số",
                max: "Số sao tối đa là 5",
                min: "Số sao tối thiểu là 0"
            },
            views: {
                required: "Không được để trống lượt xem",
                number: "Số lượt xem phải nhập bằng số",
                min: "Số lượt xem tối thiểu là 0"
            },
            short_desc: {
                required: "Không được để trống mô tả ngắn"
            },
            detail: {
                required: "Không được để trống chi tiết"
            },
            cate_id: {
                required: "Hãy chọn danh mục sản phẩm"
            },
            image: {
                required: "Không được để trống",
                extension: "png|jpg|jpeg|gif"
            }
        }
    });
</script>
@endsection
