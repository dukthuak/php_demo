<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'DANH MỤC | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<?php
if(isset($_GET['id']))
{
    $row = $CMSNT->get_row(" SELECT * FROM `category` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
?>

<div class="v-theme">
    <div class="pb-10">
        <div class="v-card w-full max-w-6xl mx-auto">
            <div class="md:mx-0">
                <div class="py-6">
                    <div class="mb-16">
                        <div class="mb-4 py-4 md:p-4 bg-box-dark">
                            <div
                                class="fade-in mb-2 py-2 md:mb-4 block uppercase md:py-4 text-center text-yellow-400 md:text-3xl text-2xl font-extrabold text-fill ">
                                Danh Mục <?=$row['title'];?>
                            </div>
                            <div class="mb-6"><span class="mx-auto block w-40 border-2 border-red-500 "></span>
                            </div>
                            <?php if($CMSNT->num_rows(" SELECT * FROM `groups` WHERE `display` = 'SHOW' AND `category` = '".check_string($_GET['id'])."' ") == 0) {?>
                            <div class="text-white text-center text-2xl">Danh mục này đang trống </div>
                            <?php }?>
                            <div class="fade-in grid grid-cols-8 gap-2 px-2 md:px-0">
                                <?php foreach($CMSNT->get_list("SELECT * FROM `groups` WHERE `display` = 'SHOW' AND `category` = '".check_string($_GET['id'])."'  ") as $group) { ?>
                                <div class="hover:shadow-lg col-span-4 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 relative rounded border border-gray-300"
                                    style="padding: 1px; padding: 1px;border: 3px solid white;">
                                    <!---->
                                    <a href="<?=BASE_URL('Accounts/'.$group['id']);?>">
                                        <img data-src="<?=$group['img'];?>"
                                            class="rounded-t h-28 md:h-48 w-full object-fill object-center lazyLoad" />
                                        <div class="py-1">
                                            <div class="py-1 font-bold text-md px-1 truncate text-center uppercase"
                                                style="color: rgb(247, 176, 60);">
                                                <?=$group['title'];?>
                                            </div>
                                            <ul
                                                class="px-2 flex items-center justify-center font-medium rounded-sm w-full font-medium text-white">
                                                <span>
                                                    Số tài khoản:
                                                    <b><?=format_cash($CMSNT->num_rows("SELECT * FROM `accounts` WHERE `groups` = '".$group['id']."' AND `username` IS NULL "));?>
                                                    </b>
                                                </span>
                                                <!---->
                                            </ul>
                                            <div class="flex px-2 mt-2 justify-center">
                                                <!---->
                                                <!---->
                                            </div>
                                            <div class="mt-2 mb-2 px-2 py-1 flex items-center justify-center mt-9">
                                                <a class="focus:outline-none acc-lien-minh-tu-chon-bb2716012b"
                                                    href="<?=BASE_URL('Accounts/'.$group['id']);?>">
                                                    <div>
                                                        <style scoped="">
                                                        .acc-lien-minh-tu-chon-bb2716012b:hover {
                                                            filter: brightness(130%);
                                                        }
                                                        </style>
                                                    </div> <img src="<?=BASE_URL('assets/img/btnMuaNgay.png');?>"
                                                        class="lazyLoad isLoaded">
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php 
    require_once("../../public/client/Footer.php");
?>