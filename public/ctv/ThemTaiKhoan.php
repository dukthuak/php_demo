<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login-ctv.php");
    $title = 'THÊM TÀI KHOẢN | '.$CMSNT->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php
if(isset($_POST['ThemTaiKhoan']) && $getUser['ctv'] == 1 && isset($_GET['group']))
{

    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
    if(check_img('img') == true)
    {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/account_".$rand.".png";
        move_uploaded_file($tmp_name, $uploads_dir.$url_img);
    }
    $listimg = '';
   
    foreach($_FILES['listimg']['name'] as $name => $value)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['listimg']['tmp_name'][$name];
        $url_listimg = "/account_".$rand.".png";
        move_uploaded_file($tmp_name, $uploads_dir.$url_listimg);
        $listimg = $listimg.PHP_EOL.'assets/storage/images'.$url_listimg;
    }
    $listacc = explode(PHP_EOL, check_string($_POST['listacc']));
    foreach($listacc as $data)
    {
        $CMSNT->insert("accounts", array(
        'img'           => 'assets/storage/images'.$url_img,
        'chitiet'       => check_string($_POST['chitiet']),
        'listimg'       => $listimg,
        'account'       => $data,
        'groups'        => check_string($_GET['group']),
        'money'         => check_string($_POST['money']),
        'createdate'    => gettime(),
        'receiver'      => $getUser['username']
        ));
    }
    
    admin_msg_success("Thêm tài khoản thành công", '', 500);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THÊM TÀI KHOẢN</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <?php if(isset($_GET['category'])) { ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">CHỌN NHÓM TÀI KHOẢN</h3>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH</th>
                                        <th>TÊN NHÓM</th>
                                        <th>TÀI KHOẢN CỦA BẠN</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `groups` WHERE `category` = '".check_string($_GET['category'])."' AND `display` = 'SHOW'  ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td width="10%"><img width="100%" src="<?=BASE_URL($row['img']);?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=format_cash($CMSNT->num_rows(" SELECT * FROM `accounts` WHERE `groups` = '".$row['id']."' AND `receiver` = '".$getUser['username']."' "));?>
                                        </td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a type="button"
                                                href="<?=BASE_URL('public/ctv/ThemTaiKhoan.php?group=');?><?=$row['id'];?>"
                                                class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>THÊM TÀI KHOẢN</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else ?>
            <?php if(isset($_GET['group'])) { ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">THÊM TÀI KHOẢN</h3>
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
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile" name="img"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">List tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea rows="5" name="listacc"
                                            placeholder="Định dạng: Tài khoản | Mật khẩu (1 dòng 1 nick nếu cần nhập nhiều nick 1 lần)"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chi tiết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" rows="5" class="form-control" placeholder="Quân Huy:306
Tướng:20
Skin:30"></textarea>
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
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá bán</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="money" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="ThemTaiKhoan" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH TÀI KHOẢN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ẢNH</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>THỜI GIAN ĐĂNG</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `accounts` WHERE `groups` = '".check_string($_GET['group'])."' AND `receiver` = '".$getUser['username']."'  ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td width="5%">#<?=$row['id'];?></td>
                                        <td width="8%"><img width="100%" src="<?=BASE_URL($row['img']);?>" /></td>
                                        <td><?=explode("|", $row['account'])[0];?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td><?=$row['username'] != NULL ? '<b style="color:red;">Đã bán</b>' : '<b style="color:green;">Đang bán</b>';?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('public/ctv/EditAccount.php?id='.$row['id']);?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>

                                            <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['account'];?>"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></button>


                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if(!isset($_GET['category']) && !isset($_GET['group'])){ ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">CHỌN LOẠI GAME</h3>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH</th>
                                        <th>TÊN CHUYÊN MỤC</th>
                                        <th>NHÓM</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNT->get_list(" SELECT * FROM `category` WHERE `display` = 'SHOW'  ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td width="10%"><img width="100%" src="<?=BASE_URL($row['img']);?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=number_format($CMSNT->num_rows("SELECT * FROM `groups` WHERE `category` = '".$row['id']."' "));?>
                                        </td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a type="button"
                                                href="<?=BASE_URL('public/ctv/ThemTaiKhoan.php?category=');?><?=$row['id'];?>"
                                                class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>XEM NHÓM</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Tài Khoản",
        message: "Bạn có chắc chắn xóa tài khoản (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/ctv/delete-account.php");?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: $(this).data('id')
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 3000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
});
</script>
<script>
$(function() {
    $("#datatable1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<?php 
    require_once(__DIR__."/Footer.php");
?>