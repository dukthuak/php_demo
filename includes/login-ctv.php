<?php
/**
 * CMSNT.CO - TỐI ƯU HÓA QUY TRÌNH KIẾM TIỀN ONLINE CỦA BẠN
 * WEBSITE: https://www.cmsnt.co/
 * PATH: includes\login-ctv.php
 */


if(isset($_SESSION['username']))
{
    $getUser = $CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' AND `ctv` = 1 ");
    if(!$getUser)
    {
        header("location: ".BASE_URL('Auth/Logout'));
        exit();
    }
    if($getUser['banned'] != 0)
    {
        echo 'Tài khoản của bạn đã bị khóa bởi quản trị viên !';
        //header("location:".BASE_URL('banned.php'));
        exit();
    }
}
else
{
    header("location: ".BASE_URL('Auth/Login'));
    exit();
}