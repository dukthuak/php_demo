<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'NẠP THẺ CÀO | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 bg-box-dark">
        <?php require_once('Sidebar.php');?>
        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-2">
                <div class="rounded w-full">
                    <span>
                        <form method="POST" class="w-full">
                            <h2
                                class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                                KHU NẠP THẺ
                            </h2>
                            <div class="py-3 px-5">
                                <span class="mb-2 block">
                                    <div class="flex items-center relative">
                                        <select id="action"
                                            class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                            <option value="NULL">Chọn Gói Kim Cương Muốn Rút</option>
                                            <option value="50">50 KC</option>
                                            <option value="100">100 KC</option>
                                            <option value="200">200 KC</option>
                                            <option value="300">300 KC</option>
                                            <option value="500">500 KC</option>
                                            <option value="600">600 KC</option>
                                            <option value="700">700 KC</option>
                                            <option value="800">800 KC</option>
                                            <option value="900">900 KC</option>
                                            <option value="1000">1000 KC</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                class="fill-current h-4 w-4">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><input type="text" id="id_game"
                                            placeholder="Nhập ID GAME"
                                            class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" />
                                    </div>
                                </span>
                                <div class="mt-4 text-center">
                                    <button type="button" id="RutVatPham"
                                        class="uppercase flex w-40 font-semibold rounded items-center justify-center h-10 text-white text-xl rounded-none focus:outline-none px-4 text-center bg-red-500 hover:bg-red-600">
                                        Rút ngay
                                    </button>
                                </div>
                                <div class="mt-2 text-red-500 font-semibold text-sm">
                                </div>
                            </div>
                        </form>
                    </span>
                    <!---->
                </div>
            </div>
            <div class="v-bg w-full mb-2 px-2">
                <h2
                    class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    LỊCH SỬ RÚT KIM CƯƠNG
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                        <table id="datatable" class="table-auto w-full scrolling-touch min-w-850">
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                     <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        STT
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        ID GAME
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        SỐ LƯỢNG
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        TRẠNG THÁI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        RÚT LÚC
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
                            <?php $i = 0;
                                foreach ($CMSNT->get_list("SELECT * FROM `orders_withdraw` WHERE `username` = '" . $getUser['username'] . "' ORDER BY id DESC") as $rows) { ?>
                                    <tr>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?= $i++; ?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?= $rows['id_game']; ?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?= format_cash($rows['action']); ?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=status($rows['status']);?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?= date('d/m/Y - H:i', $rows['time']); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="v-table-note mt-1 py-1 font-semibold text-white text-sm">
                        Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i
                            class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $("#RutVatPham").on("click", function() {
        $('#RutVatPham').html('ĐANG XỬ LÝ').prop('disabled',
            true);
        $.ajax({
            url: "<?= BASE_URL("assets/ajaxs/Withdraw.php"); ?>",
            method: "POST",
            data: {
                type: 'RUTKIMCUONG',
                action: $("#action").val(),
                id_game: $("#id_game").val()
            },
            success: function(response) {
                $("#thongbao").html(response);
                $('#RutVatPham').html('RÚT NGAY').prop('disabled', false);
            }
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});

$(document).ready(function() {
    setTimeout(e => {
        GetCard24()
    }, 0)
});

function GetCard24() {
    $.ajax({
        url: "<?=BASE_URL('api/loaithe.php');?>",
        method: "GET",
        success: function(response) {
            $("#loaithe").html(response);
        }
    });
    $.ajax({
        url: "<?=BASE_URL('api/menhgia.php');?>",
        method: "GET",
        success: function(response) {
            $("#menhgia").html(response);
        }
    });

}
</script>
<?php 
    require_once("../../public/client/Footer.php");
?>