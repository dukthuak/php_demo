<?php
require_once (__DIR__ . "/config/config.php");
require_once (__DIR__ . "/config/function.php");
$title = 'HOME | ' . $CMSNT->site('tenweb');
require_once (__DIR__ . "/public/client/Header.php");
require_once (__DIR__ . "/public/client/Nav.php");
?>
<div class="my-6">
    <div class="max-w-6xl mx-auto relative w-full"
        style="padding: 5px;background: linear-gradient(to right, #0f2027, #203a43, #2c5364);border-radius: 5px;box-shadow: -6px 6px 15px #0f2027, 7px -9px 15px #203a43, 5px 2px 15px #2c5364,0 0 15px #2c5364;">
        <div class="flex md:flex-row-reverse flex-wrap">

            <div class="w-full md:w-4/6 pb-0">
                <div class="ml-0 border-trueGray">
                    <iframe src="https://youtube.com/embed/<?= $CMSNT->site('id_video_youtube'); ?>" frameborder="0"
                        width="100%" height="350" allowfullscreen=""></iframe>
                </div>

            </div>
            <div class="w-full md:w-2/6">
                <div class="bg-trueGray-800 w-full" style="min-height: 100%;">
                    <div class="flex color-grant font-bold">
                        <div class="cursor-pointer bg-trueGray-800 tablinks" onclick="Tab('nap')">
                            <h2 class="py-1 px-2 w-32 text-center title-grant text-xl md:text-2xl">
                                NẠP THẺ
                            </h2>
                        </div>
                        <div class="cursor-pointer w-full bg-trueGray-900 tablinks" onclick="Tab('top')">
                            <h2 class="py-1 text-center px-3 title-grant text-xl md:text-2xl">
                                TOP NẠP TIỀN </h2>
                        </div>
                    </div>
                    <span class="tabcontent" id="nap" style="display:block;">
                        <form class="w-full form-header">
                            <div class="py-3 px-5">
                                <span class="mb-2 block">
                                    <div class="flex items-center relative robuxvn-select">
                                        <select id="loaithe"
                                            class=" rounded zivhd-font block w-full bg-trueGray-900 focus:border-yellow-500  text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600">
                                            <option value="">-- Loại Thẻ --</option>
                                            <option value="VIETTEL">> Viettel 🎫</option>
                                            <option value="VINAPHONE">> Vinaphone 🎫</option>
                                            <option value="MOBIFONE">> Mobifone 🎫</option>
                                            <option value="ZING">> Zing 🎫</option>
                                            <option value="VNMB">> Vietnamobile 🎫</option>
                                        </select>
                                        <div class="absolute flex inset-y-0 items-center robuxvn-select-box-right pointer-events-none px-2 right-0 text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-down-circle"></ion-icon>
                                        </div>
                                        <div class="absolute flex inset-y-0 items-center pointer-events-none px-2 robuxvn-select-box-left text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-up-circle"></ion-icon>
                                        </div>
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative robuxvn-select">
                                        <select id="menhgia"
                                            class=" zivhd-font rounded flex items-center relative  block w-full bg-trueGray-900 focus:border-yellow-500  text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600">
                                            <option value="">-- Chọn mệnh giá --</option>
                                            <option value="10000">>10.000 VNĐ</option>
                                            <option value="20000">>20.000 VNĐ</option>
                                            <option value="50000">>50.000 VNĐ</option>
                                            <option value="100000">>100.000 VNĐ</option>
                                            <option value="200000">>200.000 VNĐ</option>
                                            <option value="500000">>500.000 VNĐ</option>
                                        </select>
                                        <div class="absolute flex inset-y-0 items-center robuxvn-select-box-right pointer-events-none px-2 right-0 text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-down-circle"></ion-icon>
                                        </div>
                                        <div class="absolute flex inset-y-0 items-center pointer-events-none px-2 robuxvn-select-box-left text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-up-circle"></ion-icon>
                                        </div>
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative robuxvn-select">
                                        <div class="absolute flex inset-y-0 items-center robuxvn-select-box-right pointer-events-none px-2 right-0 text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-back-circle"></ion-icon>
                                        </div>
                                        <div class="absolute flex inset-y-0 items-center pointer-events-none px-2 robuxvn-select-box-left text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-forward-circle"></ion-icon>
                                        </div>
                                        <input type="text" id="pin" placeholder="Mã số thẻ"
                                            class=" rounded zivhd-font block w-full bg-trueGray-900 focus:border-yellow-500  text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600" />
                                    </div>
                                </span>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative robuxvn-select">
                                        <div class="absolute flex inset-y-0 items-center robuxvn-select-box-right pointer-events-none px-2 right-0 text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-back-circle"></ion-icon>
                                        </div>
                                        <div class="absolute flex inset-y-0 items-center pointer-events-none px-2 robuxvn-select-box-left text-trueGray-700"
                                            style="color: #ffffff78;">
                                            <ion-icon name="chevron-forward-circle"></ion-icon>
                                        </div>
                                        <input type="text" id="seri" placeholder="Số serial"
                                            class=" rounded zivhd-font block w-full bg-trueGray-900 focus:border-yellow-500  text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none border-trueGray-600" />
                                    </div>
                                </span>
                                <div class="mt-4">
                                    <button type="button" id="NapThe"
                                        class="ff-lalezar flex focus:outline-none h-10 homepayin items-center justify-center pt-1 px-4 rounded text-2xl text-center uppercase zivhd-font w-full zivhd-textbox">
                                        💷Nạp Ngay💷
                                    </button>
                                </div>
                                <div class="text-center mt-2 text-white font-semibold text-sm">
                                    🚫Hãy chọn đúng mệnh giá. Sai sẽ mất thẻ🚫

                                </div>

                            </div>
                        </form>

                    </span>
                    <div class="tabcontent" id="top">
                        <div class="v-list-top-card py-1 mt-2 md:py-2 px-1 md:px-3">

                            <?php $i = 0;
                            foreach ($CMSNT->get_list("SELECT * FROM `users` ORDER BY `total_money` DESC LIMIT 6 ") as $top) { ?>
                                <div class="flex items-center justify-between px-2 py-1">
                                    <div class="flex items-center robuxvn-boxtopnap robuxvn-title">
                                        <?= $i++; ?> 💫 <?= $top['username']; ?> </span>
                                    </div>
                                    <div class="font-bold text-lg">
                                        <span class=" w-32 text-white rounded-sm text-center inline-block robuxvn-topnap">
                                            <?= format_cash($top['total_money']); ?> <span
                                                class="text-xs"><small>VND</small></span>
                                        </span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start of Accounts -->
<div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold zivhd-font "
    style="
    padding: unset;
    margin: unset;
">
    Danh Mục Các Game
</div>
<div class="mb-2" style="
    padding: 5px;
"><span class="mx-auto block w-40 gradient-border" style="
    width: 260px;
"></span></div>



<div class="pb-10">
    <div class="v-card w-full max-w-6xl mx-auto">
        <div class="md:mx-0">
            <div class="py-2">
                <div class="mb-16">
                    <div class="mb-4 py-4 md:p-4 darkshizivhd-box">


                        <div class="mb-6">
                        </div>
                        <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                            <?php foreach ($CMSNT->get_list("SELECT * FROM `category` WHERE `display` = 'SHOW' ") as $category) { ?>
                                <div
                                    class=" col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 relative rounded robuxvn-box ">
                                    <!---->
                                    <a href="<?= BASE_URL('Groups/' . $category['id']); ?>">
                                        <img data-src="<?= $category['img']; ?>"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad" />
                                        <div class="py-1 fastdz">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                <?= $category['title']; ?>
                                            </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a class="focus:outline-none acc-lien-minh-tu-chon-bb2716012b"
                                                href="<?= BASE_URL('Groups/' . $category['id']); ?>">
                                                <div>
                                                    <button class="zivhd-buttons">XEM NGAY</button>
                                            </a>
                                        </div>
                                </div>
                                </a>
                            </div>
                        <?php } ?>
                        <!--LIÊN QUÂN-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start of Cày Thuê -->
<div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold zivhd-font "
    style="
    padding: unset;
    margin: unset;
">
    Danh Mục Dịch Vụ
</div>
<div class="mb-2" style="
    padding: 5px;
"><span class="mx-auto block w-40 gradient-border" style="
    width: 260px;
"></span></div>



<div class="pb-10">
    <div class="v-card w-full max-w-6xl mx-auto">
        <div class="md:mx-0">
            <div class="py-2">
                <div class="mb-16">
                    <div class="mb-4 py-4 md:p-4 darkshizivhd-box">


                        <div class="mb-6">
                        </div>
                        <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                            <?php foreach ($CMSNT->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' ") as $category) { ?>
                                <div
                                    class=" col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 relative rounded robuxvn-box ">
                                    <!---->
                                    <a href="<?= BASE_URL('dich-vu/' . $category['id']); ?>">
                                        <img data-src="<?= $category['img']; ?>"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad" />
                                        <div class="py-1 fastdz">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                <?= $category['title']; ?>
                                            </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a class="focus:outline-none acc-lien-minh-tu-chon-bb2716012b"
                                                href="<?= BASE_URL('dich-vu/' . $category['id']); ?>">
                                                <div>
                                                    <button class="zivhd-buttons">ĐẶT NGAY</button>
                                            </a>
                                        </div>
                                </div>
                                </a>
                            </div>
                        <?php } ?>
                        <!--LIÊN QUÂN-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<div class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold zivhd-font "
    style="
    padding: unset;
    margin: unset;
">
    VÒNG QUAY
</div>
<div class="mb-2" style="
    padding: 5px;
"><span class="mx-auto block w-40 gradient-border" style="
    width: 260px;
"></span></div>



<div class="pb-10">
    <div class="v-card w-full max-w-6xl mx-auto">
        <div class="md:mx-0">
            <div class="py-2">
                <div class="mb-16">
                    <div class="mb-4 py-4 md:p-4 darkshizivhd-box">


                        <div class="mb-6">
                        </div>
                        <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                            <?php foreach ($CMSNT->get_list("SELECT * FROM `mini_game` WHERE `status` = 'true' ") as $category) { ?>
                                <div
                                    class=" col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 relative rounded robuxvn-box ">
                                    <!---->
                                    <a href="<?= BASE_URL('Mini-game/' . $category['id']); ?>">
                                        <img data-src="<?= $category['thumb']; ?>"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad" />
                                        <div class="py-1 fastdz">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: #fff;">
                                                <?= $category['title']; ?>
                                            </div>
                                            <div class="flex px-2 mt-2 justify-center">
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                            <a class="focus:outline-none acc-lien-minh-tu-chon-bb2716012b"
                                                href="<?= BASE_URL('Mini-game/' . $category['id']); ?>">
                                                <div>
                                                    <button class="zivhd-buttons">QUAY NGAY</button>
                                            </a>
                                        </div>
                                </div>
                                </a>
                            </div>
                        <?php } ?>
                        <!--LIÊN QUÂN-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
<div class="animated modal fadeIn is-visible fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0"
    style="z-index: 999;" id="indexModal">
    <div class="align-top animated bg-white fadeInDown  fixed flex flex-col h-auto justify-center m-auto max-w-md md:max-w-lg md:shadow-lg pin-b pin-x relative rounded shadow-inner w-full"
        style="
    box-shadow: 0 0 35px #ae00ff;
    backdrop-filter: blur(7px);
    background: #333;
    border-radius: 10px;
    max-width: 900px;
    backdrop-filter: blur(10px);
">
        <div class="modal-header">
            <div class="border-gray-300 font-bold mb-3 neles-font p-3 text-center text-lg text-red-600 uppercase"
                style="padding: 15px;box-shadow: 0px 12px 29px #b200ff;">

                Thông báo
            </div>
            <span class="absolute cursor-pointer text-2xl text-gray-800 pt-3 px-3" onclick="FuncHideModal()"
                style="right: -1px; top: -2px;"><i class="bx bxs-x-square"></i></span>
        </div>
        <div class="modal-content">
            <div class="overflow-auto p-2 md:px-4" style="max-height: 600px;">
                <div class="relative px-2 pb-4 text-gray-900">
                    <div class="md:px-4 overflow-auto p-2" style="max-height:400px">
                        <div class="pb-4 px-2 relative text-gray-900">
                            <?= $CMSNT->site('thongbao'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript">
    $("#NapThe").on("click", function () {
        $('#NapThe').html('ĐANG XỬ LÝ').prop('disabled',
            true);
        $.ajax({
            url: "<?= BASE_URL("assets/ajaxs/NapThe.php"); ?>",
            method: "POST",
            data: {
                loaithe: $("#loaithe").val(),
                menhgia: $("#menhgia").val(),
                seri: $("#seri").val(),
                pin: $("#pin").val()
            },
            success: function (response) {
                $("#thongbao").html(response);
                $('#NapThe').html(
                    'NẠP NGAY')
                    .prop('disabled', false);
            }
        });
    });
</script>

<script type="text/javascript">
    function FuncHideModal() {
        var x = document.getElementById("indexModal");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    $(document).ready(function () {
        setTimeout(e => {
            GetCard24()
        }, 0)
    });
</script>
<?php
require_once (__DIR__ . "/public/client/Footer.php");
?>