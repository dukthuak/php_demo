<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA TÀI KHOẢN | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/../../includes/login-ctv.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php
/* BẢN QUYỀN THUỘC VỀ CMSNT.CO | NTTHANH LEADER NT TEAM */
if(isset($_GET['id']) && $getUser['ctv'] == 1)
{
    $row = $CMSNT->get_row(" SELECT * FROM `accounts` WHERE `id` = '".check_string($_GET['id'])."' AND `receiver` = '".$getUser['username']."' ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
if(isset($_POST['LuuTaiKhoan']) && $getUser['ctv'] == 1 )
{
    if(check_img('img') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/account_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $CMSNT->update("accounts", array(
            'img'       => 'assets/storage/images'.$url_img
        ), " `id` = '".$row['id']."' ");
    }
    $listimg = '';
    foreach($_FILES['listimg']['name'] as $name => $value)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['listimg']['tmp_name'][$name];
        $url_listimg = "/account_".$rand.".png";
        $isUpload = move_uploaded_file($tmp_name, $uploads_dir.$url_listimg);
        $listimg = $listimg.PHP_EOL.'assets/storage/images'.$url_listimg;
        if($isUpload)
        {
            $CMSNT->update("accounts", array(
            'listimg' => $listimg
            ), " `id` = '".$row['id']."' ");
        }
        
    }
    $CMSNT->update("accounts", array(
        'chitiet'       => check_string($_POST['chitiet']),
        'account'       => check_string($_POST['listacc']),
        'money'         => check_string($_POST['money'])
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu tài khoản thành công", '', 500);
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa tài khoản</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CHỈNH SỬA TÀI KHOẢN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Người mua</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['username'];?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thời gian mua</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['updatedate'];?>" class="form-control"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile"
                                                    name="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">List tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea rows="1" name="listacc" class="form-control"><?=$row['account'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chi tiết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" rows="6" class="form-control" placeholder="Quân Huy:306
Tướng:20
Skin:30"
                                            ><?=$row['chitiet'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">List ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile"
                                                    name="listimg[]" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <?php
                                    if(!empty($row['listimg']))
                                    {
                                        $a = explode(PHP_EOL, $row['listimg']);
                                        foreach($a as $b)
                                        { 
                                            if(!empty($b))
                                            { 
                                                echo '<img src="'.BASE_URL($b).'" width="100px" />';
                                            } 
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá bán</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="money" value="<?=$row['money'];?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="LuuTaiKhoan" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    require_once(__DIR__."/Footer.php");
?>