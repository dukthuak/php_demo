<style>
.zivhd-buttons{
         background: #111;
    border-radius: 5px;
    font-family: 'Sriracha', cursive;
    color: white;
    text-align: center;
    width: 100%;
    text-shadow: -1px 1px 6px white;
        padding-left: 70px;
    padding-right: 70px;
    padding-top: 10px;
    padding-bottom: 10px;
    text-transform: uppercase;
}
.darkshizivhd-box {
   box-shadow: -6px 6px 15px #14234e, 7px -9px 15px #202243, 5px 2px 15px #302c64, 0 0 15px #2c3a64;
    border-radius: 6px;
    backdrop-filter: brightness(120%) blur(5px) hue-rotate(354deg);
    background: #20202a;
}
.robuxvn-box{
    box-shadow: 0 0 10px blue;
    border: solid darkblue 2px;
    border-radius: 5px;
    transition: all 1s;
    margin:5px;
}
.robuxvn-box:hover{
    box-shadow: 0px -5px 8px 0px blue;
      border: solid blue 2px;
    transform: translateY(-6px);
    transition: all 1s;
  
}
.robuxvn-buybutton{
    padding: 5px;
    background: #333;
    width: 100px;
    color: white;
    text-transform: uppercase;
    font-family: 'Black Ops One';
    border-radius: 2.5px;
    transition: all 1s;
}
.content-wrapper-header {
  display: flex;
  align-items: center;
  width: 100%;
  justify-content: space-between;
  background-image: url("https://i.imgur.com/7HABgcj.jpg"), linear-gradient(to right, #0f2027, #203a43, #2c5364);
  border-radius: 14px;
  padding: 20px 40px;
}
@media screen and (max-width: 415px) {
  .content-wrapper-header {
    padding: 20px;
  }
}
.content-wrapper.overlay {
  pointer-events: none;
  transition: 0.3s;
  background-color: var(--overlay-bg);
}
.content-wrapper-img {
  width: 186px;
  -o-object-fit: cover;
     object-fit: cover;
  margin-top: -25px;
  -o-object-position: center;
     object-position: center;
}
@media screen and (max-width: 570px) {
  .content-wrapper-img {
    width: 110px;
  }
}
.img-content {
  font-weight: 500;
  font-size: 17px;
  display: flex;
  align-items: center;
  margin: 0;
}
.img-content svg {
  width: 28px;
  margin-right: 14px;
}
.content-text {
  font-weight: 400;
  font-size: 14px;
  margin-top: 16px;
  line-height: 1.7em;
  color: #ebecec;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
      font-family: 'Roboto';
    text-transform: capitalize;
}
.content-button{
    background-color: #3a6df0;
    border: none;
    padding: 8px 26px;
    color: #fff;
    border-radius: 20px;
    margin-top: 16px;
    cursor: pointer;
    transition: 0.3s;
    white-space: nowrap;
}
</style>
    
<style>
    ::-webkit-scrollbar {
            width: 5px;
        }
          
        ::-webkit-scrollbar-track {
            background: blue;
        }
          
        ::-webkit-scrollbar-thumb {
            background: darkblue;
        }
          
        ::-webkit-scrollbar-thumb:hover {
            background: lightblue
        }
    
</style>
<body style="
background: url('https://i.imgur.com/7HABgcj.jpg') 0 / cover fixed;
background-repeat: no-repeat;
">   
<body>
    <div style="height: auto;min-height: 100vh;">
        <div class="sticky top-0 z-100" style="background: rgb(26 26 26);">
            <div class="shadow">
                <header class="mx-auto w-full max-w-6xl px-2 flex flex-wrap items-center py-2"
                    style="background: rgb(26 26 26);color:white;">
                    <div class="flex-1 flex justify-between items-center">
                        <a href="<?=BASE_URL('');?>"><img width="200px" src="<?=$CMSNT->site('logo');?>" class="v-logo"></a>
                    </div>
                    <?php if(empty($_SESSION['username'])) { ?>
                    <a href="<?=BASE_URL('Auth/Login');?>"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-white-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor">
                        Đăng nhập
                    </a>
                    <a href="<?=BASE_URL('Auth/Register');?>"
                        class="lg:hidden flex border mx-2 px-3 h-8 border-white-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor">
                        Đăng ký
                    </a>
                    <?php } else { ?>
                    <a href="<?=BASE_URL('Auth/Profile');?>"
                        class="lg:hidden relative mx-2 flex border px-3 h-8 border-gray-400 rounded items-center text-white-800 font-bold justify-center pointer-cursor nuxt-link-exact-active nuxt-link-active"><span
                            class="block"><i class="fa fa-user" aria-hidden="true"></i>
                            <?=$_SESSION['username'];?> - <?=format_cash($getUser['money']);?></span></a>

                    <?php }?>
                    <label for="menu-toggle" id="toggle" class="pointer-cursor text-white-800 text-2xl lg:hidden block">
                        <span class="h-8 w-8 border border-gray-400 justify-center items-center inline-flex rounded"><i
                                class="bx bx-menu"></i></span>
                    </label>
                    <div class="hidden md:mt-0 lg:flex lg:items-center lg:w-auto w-full" id="menu-toggle">
                        <nav class="font-bold lg:text-lg">
                            <ul class="lg:flex items-center justify-between text-base text-white-700 lg:pt-0">
                                <li><a href="<?=BASE_URL('');?>" class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">TRANG
                                        CHỦ</a></li>
                                <li><a href="<?=BASE_URL('nap-the-cao/');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">NẠP TIỀN</a></li>
                                <li><a href="<?=BASE_URL('bien-dong-so-du/');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">LỊCH SỬ GIAO DỊCH</a></li>
                                <li><a href="<?=BASE_URL('rut-vat-pham/');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">RÚT VẬT PHẨM</a></li>
                                <?php if(isset($_SESSION['username']) && $getUser['level'] == 'admin') { ?>        
                                <li><a href="<?=BASE_URL('admin/');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">QUẢN TRỊ WEBSITE</a></li>
                                    <?php }?>
                                <?php if(isset($_SESSION['username']) && $getUser['ctv'] == 1) { ?>        
                                <li><a href="<?=BASE_URL('public/ctv');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">PANEL CTV</a></li>
                                    <?php }?>    
                                <?php if(isset($_SESSION['username']) && $getUser['ctvacc'] == 1) { ?>        
                                <li><a href="<?=BASE_URL('public/ctvacc');?>"
                                        class="lg:p-3 py-1 lg:py-2 px-2 lg:px-3 block">PANEL CTV BÁN ACC</a></li>
                                    <?php }?>       
                                <?php if(empty($_SESSION['username'])) { ?>
                                <a href="<?=BASE_URL('Auth/Login');?>"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor"><span
                                        class="block"><i class="relative bx bxs-user mr-2"></i>Đăng nhập</span></a>
                                <a href="<?=BASE_URL('Auth/Register');?>"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor"><span
                                        class="block"><i class="relative bx bxs-user-plus mr-2"></i> Đăng ký</span></a>
                                <?php } else { ?>
                                <a href="<?=BASE_URL('Auth/Profile');?>"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor"><span
                                        class="block"><i class="fa fa-user" aria-hidden="true"></i>
                                        <?=$_SESSION['username'];?> - <?=format_cash($getUser['money']);?></span></a>
                                <a href="<?=BASE_URL('Auth/Logout');?>"
                                    class="lg:ml-4 flex border px-3 h-8 border-gray-400 lg:rounded-full items-center text-white-800 font-bold justify-center lg:mb-0 mb-2 pointer-cursor"><span
                                        class="block"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng
                                        xuất</span></a>
                                <?php }?>
                    </div>
                </header>
            </div>
        </div>
        <?php
        