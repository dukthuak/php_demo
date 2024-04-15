<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA CATEGORY CÀY THUÊ | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
/* BẢN QUYỀN THUỘC VỀ CMSNT.CO | NTTHANH LEADER NT TEAM */
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNT->get_row(" SELECT * FROM `category_caythue` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['LuuChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($CMSNT->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    if(check_img('img') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/category_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $CMSNT->update("category_caythue", array(
            'img'       => '/assets/storage/images'.$url_img
        ), " `id` = '".check_string($_POST['id'])."' ");
    }
    $CMSNT->update("category_caythue", array(
        'title' => check_string($_POST['title']),
        'luuy' => $_POST['luuy'],
        'display' => check_string($_POST['display'])
    ), " `id` = '".check_string($row['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa category <?=$row['title'];?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EDIT CHUYÊN MỤC CÀY THUÊ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tên chuyên mục</label>
                                    <div class="col-sm-8">
                                        <div class="form-line">
                                            <input type="text" name="title" id="title" value="<?=$row['title'];?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lưu ý</label>
                                    <div class="col-sm-8">
                                        <div class="form-line">
                                            <textarea class="textarea" name="luuy"
                                                rows="6"><?=$row['luuy'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Ảnh mô tả</label>
                                    <div class="col-sm-8">
                                        <div class="form-line">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="exampleInputFile"
                                                        name="img">
                                                </div>
                                            </div>
                                            <img width="100%" src="<?=BASE_URL($row['img']);?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Hiển thị</label>
                                    <div class="col-sm-8">
                                        <select class="form-control show-tick" id="display" name="display" required>
                                            <option <?=$row['display'] == 'SHOW' ? 'selected' : '';?> value="SHOW">SHOW
                                            </option>
                                            <option <?=$row['display'] == 'HIDE' ? 'selected' : '';?> value="HIDE">HIDE
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <button type="submit" name="LuuChuyenMuc" class="btn btn-danger">LƯU NGAY</button>
                                <a type="button" class="btn btn-secondary"
                                    href="<?=BASE_URL('Admin/Category/Cay-thue/');?>">QUAY LẠI</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>




<?php 
    require_once(__DIR__."/Footer.php");
?>