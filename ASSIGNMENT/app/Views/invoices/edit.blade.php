@extends('layouts.main')

@section('title', 'Hóa đơn')
@section('page', 'Hóa đơn')
@section('short_desc', '*: Không được để trống')

@section('main-content')
<div class="container">
    <form action="{{getClientUrl('invoice/save-edit')}}" method="post" id="editInvoice">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="{{$invoice->id}}">
                <div class="form-group">
                    <label for="customer_name">Tên khách hàng<span class="text-danger">*</span></label>
                    <input type="text" id="customer_name" class="form-control" name="customer_name" placeholder="Nhập tên khách hàng" value="{{$invoice->customer_name}}">
                    @if (isset($_GET['customer_nameerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['customer_nameerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="customer_phone_number">Số điện thoại khách hàng<span class="text-danger">*</span></label>
                    <input type="text" id="customer_phone_number" class="form-control" name="customer_phone_number" placeholder="Nhập số điện thoại khách hàng" value="{{$invoice->customer_phone_number}}">
                    @if (isset($_GET['customer_phone_numbererr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['customer_phone_numbererr']}}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="customer_email">Email khách hàng<span class="text-danger">*</span></label>
                    <input type="text" id="customer_email" class="form-control" name="customer_email" placeholder="Nhập Email khách hàng" value="{{$invoice->customer_email}}">
                    @if (isset($_GET['customer_emailerr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['customer_emailerr']}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="customer_address">Địa chỉ khách hàng<span class="text-danger">*</span></label>
                    <input type="text" id="customer_address" class="form-control" name="customer_address" placeholder="Nhập địa chỉ khách hàng" value="{{$invoice->customer_address}}">
                    @if (isset($_GET['customer_addresserr']))
                    <div class="alert alert-danger" role="alert">{{$_GET['customer_addresserr']}}</div>
                    @endif
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button type="submit" class="btn btn-outline-primary">Sửa hóa đơn</button>&nbsp;
                    <a href="{{BASE_URL . 'invoice'}}" class="btn btn-outline-danger">Hủy</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<!-- <script>
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
</script> -->
@endsection
