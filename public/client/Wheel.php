<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'VÒNG QUAY | ' . $CMSNT->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");
?>
<?php
if (isset($_GET['id'])) {
    $row = $CMSNT->get_row(" SELECT * FROM `mini_game` WHERE `id` = '" . check_string($_GET['id']) . "'  ");
    if (!$row) {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
} else {
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
$id = intval($_GET['id']);
?>

<body style="
background: url('/assets/img/background.png') 0 / cover fixed;
background-repeat: no-repeat;
">
    <link rel="stylesheet" href="/template/theme/assets/frontend/css/wheel.css">
    <script src="/template/js/rotate.js"></script>
    <div class="mt-12 relative w-full max-w-6xl mx-auto text-gray-800 pb-8 px-2 md:px-0 ">
        <div class="mb-4 py-4 md:p-4 nguyenall-mac-app">
            <div class="nguyenall-header">
                <div class="nguyenall-circle"></div>
            </div>
            <div class="v-theme">
    
    <div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold zivhd-font " style="
    padding: unset;
    margin: unset;
"> 
        <?=mini_game($id, 'name');?>
</div>
<div class="mb-2" style="
    padding: 5px;
"><span class="mx-auto block w-40 gradient-border" style="
    width: 260px;
"></span></div> 

 <div class="akaxzivhd col-span-12 color-grant darkshizivhd-box font-bold gap-2 grid grid-cols-10 px-2 py-2 select-none text-xl fontdanhmuc" style="margin-bottom: 20px;">
        <div class="col-span-12 md:col-span-12 text-center ">1 LƯỢT QUAY: <b><?= number_format(mini_game($id, 'price')); ?></b>đ
      </div>
    </div>
            <br>
           
            <div class="v-account-detail p-2 md:px-0 mt-5">
                <div class="v-infomations ">
                    <div class="py-3 px-5">
                        <div class="w-full lg:flex justify-center items-center">
                            <div class="w-full">
                                <div class="w-full">
                                    <div class="flex items-center relative">
                                        <div class="w-full">
                                            <div class="v-luckywheel flex justify-center relative">
                                                <div class="wheel-wrapper">
                                                    <a class="wheel-pointer cursor-pointer opacity-75 hover:opacity-100" id="start"></a>
                                                    <img alt="Play" src="<?=$row['image']; ?>" id="rotate" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 w-full rounded">
                                <h3 id="modal-headline" class="text-2xl font-bold">
                                    <p class="col-span-12 md:col-span-12">LƯỢT CHƠI GẦN ĐÂY</p>
                                </h3> <br>
                                <div class="py-1 overflow-y-auto scrolling-touch max-h-400">
                                    <div class="scrolling-touch min-h-650">
                                        <table class="table-auto w-full">
                                            <thead>
                                                <tr class="v-border-hr select-none border-b-2 border-gray-300">

                                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                                        TÀI KHOẢN
                                                    </th>
                                                    <!-- <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                                        GIẢI THƯỞNG TRÚNG
                                                    </th> -->
                                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                                        THỜI GIAN
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm font-semibold">

                                            <?php foreach ($CMSNT->get_list("SELECT * FROM `dongtien`ORDER BY `id` DESC LIMIT 0, 20") as $row) { ?>
                                                <tr>         
                                                    <td class="text-sm text-gray-100 text-left px-1 py-1 border-b"><?php echo substr($row['username'], 0,3).'*****';?> </td>
                                                    <td class="text-sm text-gray-100 text-left px-1 py-1 border-b"><?=$row['thoigian'];?><td>                         
                                                </tr>
                                            <?php } ?>
                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            var bRotate = false;

            function rotateFn(angles, txt, type) {
                bRotate = !bRotate;
                $('#rotate').stopRotate();
                $('#rotate').rotate({
                    angle: 0,
                    animateTo: angles + 1800,
                    duration: 4000,
                    callback: function() {
                        var awar = txt;
                        Swal.fire('Thành công !', awar, 'success')
                        document.getElementById('modalMinigame').classList.add(isVisible);
                        bRotate = !bRotate;
                    }
                })
            }
            $('#start').click(function() {
                console.log('Click button');

                if (bRotate);

                $.ajax({
                    type: 'post',
                    dataType: "JSON",
                    url: '/assets/ajaxs/Quay.php',
                    data: {
                        id_vongquay: <?= $id; ?>
                    },
                    success: function(json) {
                        if (json.status == 3) {
                            Swal.fire('Oops !', 'Vui lòng đăng nhập !', 'error')
                        } else if (json.status == 4) {
                            Swal.fire('Oops !', 'Bạn không đủ tiền để quay !', 'error')
                        } else if (json.status == 1) {
                            if (json.item > 0 && json.item < 9) {
                                rotateFn(json.location, json.msg, "success");
                            } else {
                                Swal.fire('Oops !', 'Đã có lỗi xảy ra !', 'error')
                            }
                        } else {
                            Swal.fire('Oops !', 'Hệ thống đang bảo trì !', 'error')
                        }
                    }
                });

            });

        });
    </script>
    <?php
    require_once("../../public/client/Footer.php");
    ?>