<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=BASE_URL('');?>" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?=BASE_URL('Admin/Home');?>" class="brand-link">
                <center><img src="<?=$CMSNT->site('logo');?>" width="50%"></center>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                 

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?=BASE_URL('Admin/Home');?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">ĐƠN HÀNG</li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('public/admin/DonHangCayThue.php');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Tất cả đơn hàng <span class="badge badge-info right"><?=$CMSNT->num_rows("SELECT * FROM `orders_caythue`  ");?></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('public/admin/DonHangXuLy.php');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Đơn chờ xử lý <span class="badge badge-info right"><?=$CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'xuly' ");?></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('public/admin/DonHangBiHuy.php');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Đơn bị hủy <span class="badge badge-danger right"><?=$CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'huy' ");?></span>
                                </p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="<?=BASE_URL('public/admin/DonHangHoanTat.php');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Đơn hoàn tất <span class="badge badge-success right"><?=$CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'hoantat' ");?></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('public/admin/WithDraw.php');?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    Rút vật phẩm <span class="badge badge-info right"><?=$CMSNT->num_rows("SELECT * FROM `orders_withdraw` WHERE `status` = 'xuly' ");?></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Account-Sold');?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Tài khoản đã bán
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">QUẢN LÝ</li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Users');?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Thành viên
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Category');?>" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Chuyên mục game
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Category/Cay-thue/');?>" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Chuyên mục cày thuê
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Storage');?>" class="nav-link">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Lưu trữ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Mini-game');?>" class="nav-link">
                                <i class="nav-icon fa fa-gamepad"></i>
                                <p>
                                    Vòng quay may mắn
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">NẠP TIỀN</li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Cards');?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Nạp thẻ cào
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Bank');?>" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Ngân hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">CÀI ĐẶT</li>
                        <li class="nav-item">
                            <a href="<?=BASE_URL('Admin/Setting');?>" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cấu hình
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>