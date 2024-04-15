<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'DASHBROAD | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=$CMSNT->num_rows("SELECT * FROM `users` ");?></h3>
                        <p>Tổng thành viên</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `users` ")['SUM(`money`)']);?>đ
                        </h3>
                        <p>Tổng số dư thành viên</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NULL "));?>
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
                        <h3><?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL "));?>
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
                        <h3><?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL ")['SUM(`money`)']);?>đ
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
                            <?=format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)']);?>
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
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            <small>nick</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên đăng ký hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNT->num_rows("SELECT * FROM `users` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            <small>user</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền nạp hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash(
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `deletedate` IS NULL AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'] + 
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `momo` WHERE `deletedate` IS NULL AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'] +
                            $CMSNT->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `deletedate` IS NULL AND `status` = 'thanhcong' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`thucnhan`)']
                            
                            );?>
                            <small>đ</small>
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
                                        <th>USERNAME</th>
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
                                    foreach($CMSNT->get_list(" SELECT * FROM `dongtien` ORDER BY id DESC LIMIT 500") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><a
                                                href="<?=BASE_URL('Admin/User/Edit/'.$CMSNT->getUser($row['username'])['id']);?>"><?=$row['username'];?></a>
                                        </td>
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
                                        <th>USERNAME</th>
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
    require_once("../../public/admin/Footer.php");
?>