<?php
require_once ("../../config/config.php");
require_once ("../../config/function.php");
$title = 'DASHBROAD | ' . $CMSNT->site('tenweb');
require_once ("../../public/ctvacc/Header.php");
require_once ("../../public/ctvacc/Sidebar.php");
require_once (__DIR__ . "/../../includes/checkLicense.php");
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





            <div class="col-lg-4 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NULL AND `receiver` = '" . $getUser['username'] . "' ")); ?>
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
                        <h3><?= format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '" . $getUser['username'] . "' ")); ?>
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
                        <h3><?= format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '" . $getUser['username'] . "' ")['SUM(`money`)']); ?>đ
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
                            <?= format_cash($CMSNT->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '" . $getUser['username'] . "' ")['SUM(`money`)']); ?>
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
                            <?= format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '" . $getUser['username'] . "' ")); ?>
                            <small>nick</small>
                        </span>
                    </div>
                </div>
            </div>




        </div>
</div>
</div>
</div>

</div>
</section>
<!-- /.content -->
</div>





<script>
    $(function () {
        $("#datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

<?php
require_once ("../../public/ctv/Footer.php");
?>