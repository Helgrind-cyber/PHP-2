@extends('layouts.main')

@section('title', 'Dashboard')
@section('page', 'Dash Board')

@section('main-content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{count($users)}}</h3>

                <p>Người dùng</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <a href="{{getClientUrl('user')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{count($products)}}</h3>

                <p>Sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{getClientUrl('product')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{count($categories)}}</h3>

                <p>Danh mục sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{getClientUrl('category')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{count($invoices)}}</h3>

                <p>Hóa đơn</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="{{getClientUrl('invoice')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

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
                timer: 2000
            });
        <?php endif; ?>
    })
</script>
@endsection
