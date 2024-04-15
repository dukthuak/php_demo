<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'GIAO DIỆN | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Theme</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('public/admin/Home.php');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Theme</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php
    if(isset($_POST['SaveSettings']))
    {
        if($CMSNT->site('status_demo') == 'ON')
        {
            admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
        }
        if(check_img('logo') == true)
        {
            $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
            $uploads_dir = '../../assets/storage/theme/logo.png';
            $tmp_name = $_FILES['logo']['tmp_name'];
            $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
            if($addlogo)
            {
                $CMSNT->update('options', [
                    'value'  => 'assets/storage/theme/logo.png'
                ], " `name` = 'logo' ");
            }
        }
        if(check_img('logo_dark') == true)
        {
            $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
            $uploads_dir = '../../assets/storage/theme/logo_dark.png';
            $tmp_name = $_FILES['logo_dark']['tmp_name'];
            $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
            if($addlogo)
            {
                $CMSNT->update('options', [
                    'value'  => 'assets/storage/theme/logo_dark.png'
                ], " `name` = 'logo_dark' ");
            }
        }
        if(check_img('favicon') == true)
        {
            $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
            $uploads_dir = '../../assets/storage/theme/favicon.png';
            $tmp_name = $_FILES['favicon']['tmp_name'];
            $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
            if($addlogo)
            {
                $CMSNT->update('options', [
                    'value'  => 'assets/storage/theme/favicon.png'
                ], " `name` = 'favicon' ");
            }
        }
        if(check_img('anhbia') == true)
        {
            $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
            $uploads_dir = '../../assets/storage/theme/anhbia.png';
            $tmp_name = $_FILES['anhbia']['tmp_name'];
            $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
            if($addlogo)
            {
                $CMSNT->update('options', [
                    'value'  => 'assets/storage/theme/anhbia.png'
                ], " `name` = 'anhbia' ");
            }
        }
        if(check_img('background') == true)
        {
            $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
            $uploads_dir = '../../assets/storage/theme/background.png';
            $tmp_name = $_FILES['background']['tmp_name'];
            $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
            if($addlogo)
            {
                $CMSNT->update('options', [
                    'value'  => 'assets/storage/theme/background.png'
                ], " `name` = 'background' ");
            }
        }
       die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
    } ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image mr-1"></i>
                                THAY ĐỔI GIAO DIỆN WEBSITE
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Logo Light</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="logo">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="500px" src="<?=BASE_URL($CMSNT->site('logo'));?>"/><hr>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Logo Dark</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="logo_dark">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="500px" src="<?=BASE_URL($CMSNT->site('logo_dark'));?>"/><hr>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Favicon</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="favicon">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="100px" src="<?=BASE_URL($CMSNT->site('favicon'));?>"/><hr>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Ảnh bìa</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="anhbia">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="500px" src="<?=BASE_URL($CMSNT->site('anhbia'));?>"/><hr>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Background</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="background">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img width="500px" src="<?=BASE_URL($CMSNT->site('background'));?>"/><hr>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i
                                        class="fas fa-save mr-1"></i>Lưu Ngay</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
 
<!-- bs-custom-file-input -->
<script src="<?=BASE_URL('template/AdminLTE3/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>  
<?php 
    require_once("../../public/admin/Footer.php");
?>