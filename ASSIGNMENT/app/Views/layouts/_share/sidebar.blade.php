<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{getClientUrl('')}}" class="brand-link">
        <img src="{{getAssetUrl('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{getAssetUrl('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">@if(isset($_SESSION['user']))
                    {{$_SESSION['user']['name']}}
                    @else
                    Chưa đăng nhập
                    @endif</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{getClientUrl('')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-friends nav-icon"></i>
                        <p>
                            Người dùng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{getClientUrl('user')}}" class="nav-link">
                                <i class="fas fa-stream nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{getClientUrl('user/create')}}" class="nav-link">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-gifts nav-icon"></i>
                        <p>
                            Sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{getClientUrl('product')}}" class="nav-link">
                                <i class="fas fa-stream nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{getClientUrl('product/create')}}" class="nav-link">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Danh mục sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{getClientUrl('category')}}" class="nav-link">
                                <i class="fas fa-stream nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{getClientUrl('category/create')}}" class="nav-link">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice-dollar nav-icon"></i>
                        <p>
                            Hóa đơn
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{getClientUrl('invoice')}}" class="nav-link">
                                <i class="fas fa-stream nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{getClientUrl('invoice/create')}}" class="nav-link">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-invoice nav-icon"></i>
                        <p>
                            Chi tiết hóa đơn
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{getClientUrl('invoice-detail')}}" class="nav-link">
                                <i class="fas fa-stream nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{getClientUrl('invoice-detail/create')}}" class="nav-link">
                                <i class="fas fa-plus-square nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <div style="border-bottom: 1px solid #4f5962;"></div>
                <li class="nav-item">
                    <a href="{{getClientUrl('logout')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
