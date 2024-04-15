<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login-ctv.php");
    $title = 'DASHBROAD | '.$CMSNT->site('tenweb');
    require_once("../../public/ctv/Header.php");
    require_once("../../public/ctv/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>





<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê của bạn</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê đang cày</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê hoàn tất</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền Đơn cày thuê đã hoàn thành</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>




            <div class="col-lg-4 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NULL AND `receiver` = '".$getUser['username']."' "));?>
                        </h3>
                        <p>Tài khoản đang bán</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '".$getUser['username']."' "));?>
                        </h3>
                        <p>Tài khoản đã bán</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '".$getUser['username']."' ")['SUM(`money`)']);?>đ
                        </h3>
                        <p>Tổng tiền đã bán</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Doanh thu bán tài khoản hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '".$getUser['username']."' ")['SUM(`money`)']);?>
                            <small>đ</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-basket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tài khoản đã bán hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '".$getUser['username']."' "));?>
                            <small>nick</small>
                        </span>
                    </div>
                </div>
            </div>



            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">NHẬT KÝ DÒNG TIỀN GẦN ĐÂY</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `dongtien` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC LIMIT 500") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=format_cash($row['sotientruoc']);?></td>
                                        <td><?=format_cash($row['sotienthaydoi']);?></td>
                                        <td><?=format_cash($row['sotiensau']);?></td>
                                        <td><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['noidung'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- /.content -->
</div>





<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>

<?php 
    require_once("../../public/ctv/Footer.php");
?>