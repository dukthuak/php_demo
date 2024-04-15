<?php 
    /**
     * CMSNT.CO - TỐI ƯU HÓA QUY TRÌNH KIẾM TIỀN ONLINE CỦA BẠN
     * WEBSITE: https://www.cmsnt.co/
     * PATH: assets\ajaxs\ctv\delete-account.php
     */
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-ctv.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $user = $CMSNT->get_row("SELECT * FROM `accounts` WHERE `id` = '$id' AND `receiver` = '".$getUser['username']."' ");
        if(!$user)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Tài khoản này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNT->remove("accounts", " `id` = '$id' ");
        if($isRemove)
        {
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa tài khoản thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa tài khoản thất bại.'
        ]);
        die($data);
    }