<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'QUẢN LÝ VÒNG QUAY | ' . $CMSNT->site('tenweb');
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");

if (isset($_POST['ThemVongQuay']) && $getUser['level'] == 'admin') {
    if ($CMSNT->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $sql = $CMSNT->insert('mini_game', array(
        'name' => check_string($_POST['tenvongquay']),
        'price' => check_string($_POST['price']),
        'sudung' => 0,
        'thumb' => $_POST['thumb'],
        'image' => $_POST['image'],
        'status' => check_string($_POST['status']),
        'time' => time()
    ));
    if ($sql) {
        $last_id = $CMSNT->get_row("SELECT * FROM `mini_game` order by `id` desc limit 1");
        $item = 'text_';
        $kimcuong = 'kimcuong_';
        $tyle = 'tyle_';
        for ($i = 1; $i <= 8; $i++) {
            $data[] = array(
                'text' => $_POST[$item . $i],
                'kimcuong' => $_POST[$kimcuong . $i],
                'tyle' => $_POST[$tyle . $i]
            );
        }
        // INSERT GIFT
        $CMSNT->insert('mini_game_gift', array(
            'id_vongquay' => $last_id['id'],
            'item_1' => json_encode($data[0]),
            'item_2' => json_encode($data[1]),
            'item_3' => json_encode($data[2]),
            'item_4' => json_encode($data[3]),
            'item_5' => json_encode($data[4]),
            'item_6' => json_encode($data[5]),
            'item_7' => json_encode($data[6]),
            'item_8' => json_encode($data[7])
        ));
        admin_msg_success("Thêm vòng quay thành công!", '', 1000);
    } else {
        admin_msg_error("Lỗi truy vấn!", '', 500);
    }
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vòng quay may mắn</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÊM VÒNG QUAY</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên vòng quay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenvongquay" class="form-control" placeholder="Nhập tên vòng quay" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="price" class="form-control" placeholder="Nhập giá tiền" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh thumb</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="url" name="thumb" class="form-control" placeholder="Ảnh thumb" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh vòng quay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="url" name="image" class="form-control" placeholder="Ảnh mô tả" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="true">HIỂN THỊ</option>
                                        <option value="false">ẨN</option>
                                    </select>
                                </div>
                            </div>
                            <?php for ($x = 1; $x <= 8; $x++) { ?>
                                <div class="card-body">
                                    <b>Thông tin phần quà số <?php echo $x; ?></b>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" id="text_<?php echo $x; ?>" name="text_<?php echo $x; ?>" class="form-control" placeholder="Text Hiện Khi Quay Trúng">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="kimcuong_<?php echo $x; ?>" name="kimcuong_<?php echo $x; ?>" min="0" class="form-control" placeholder="Kim Cương Trúng" required="">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="tyle_<?php echo $x; ?>" name="tyle_<?php echo $x; ?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng(%)" required="">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" name="ThemVongQuay" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH VÒNG QUAY</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ẢNH THUMB</th>
                            <th>ẢNH MÔ TẢ</th>
                            <th>TÊN</th>
                            <th>GIÁ TIỀN</th>
                            <th>SỬ DỤNG</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($CMSNT->get_list(" SELECT * FROM `mini_game` ORDER BY id DESC ") as $row) {
                        ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td width="10%"><img width="100%" src="<?= $row['thumb']; ?>" /></td>
                                <td width="10%"><img width="100%" src="<?= $row['image']; ?>" /></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= number_format($row['price']); ?></td>
                                <td><?= number_format($row['sudung']); ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_vq" value="<?= $row['id']; ?>">
                                        <a href="/Admin/EditVQ/<?= $row['id']; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <?php if ($getUser['level'] == 'admin') { ?>
                                            <button type="submit" name="Remove" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        <?php } ?>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Remove']) && $getUser['level'] == 'admin') {
    $id_vq_to_remove = $_POST['id_vq'];
    $CMSNT->remove('mini_game', " `id` = '$id_vq_to_remove' ");
    echo admin_msg_success('Xóa thành công!', '', 500);
}

require_once(__DIR__ . "/Footer.php");
?>
