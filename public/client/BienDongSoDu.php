<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'BIẾN ĐỘNG SỐ DƯ | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4">
        <?php require_once('Sidebar.php');?>
        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="v-bg w-full mb-2 px-2">
                <h2
                    class="v-title border-l-4 border-gray-800 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                    BIẾN ĐỘNG SỐ DƯ
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                        <table id="datatable" class="table-auto w-full scrolling-touch min-w-850">
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        STT
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                    SỐ TIỀN TRƯỚC
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                    SỐ TIỀN THAY ĐỔI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                    SỐ TIỀN HIỆN TẠI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                    THỜI GIAN
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                       NỘI DUNG
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
                                <?php $i = 0; foreach($CMSNT->get_list(" SELECT * FROM `dongtien` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){ ?>
                                <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++;?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=format_cash($row['sotientruoc']);?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=format_cash($row['sotienthaydoi']);?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=format_cash($row['sotiensau']);?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="badge badge-dark"><?=$row['thoigian'];?></span></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['noidung'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="v-table-note mt-1 py-1 font-semibold text-gray-800 text-sm">
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
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php 
    require_once("../../public/client/Footer.php");
?>