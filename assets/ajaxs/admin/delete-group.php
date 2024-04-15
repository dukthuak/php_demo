<?php 
    /**
     * CMSNT.CO - TỐI ƯU HÓA QUY TRÌNH KIẾM TIỀN ONLINE CỦA BẠN
     * WEBSITE: https://www.cmsnt.co/
     * PATH: assets\ajaxs\admin\delete-group.php
     */
    require_once __DIR__.'/../../../config/config.php';
    require_once __DIR__.'/../../../config/function.php';
    require_once __DIR__.'/../../../includes/login-admin.php';

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        $user = $CMSNT->get_row("SELECT * FROM `groups` WHERE `id` = '$id' ");
        if(!$user)
        {
            $data = json_encode([
                'status'    => 'error',
                'msg'       => 'Nhóm này không tồn tại trong hệ thống.'
            ]);
            die($data);
        }
        $isRemove = $CMSNT->remove("groups", " `id` = '$id' ");
        if($isRemove)
        {
            unlink(check_string('../../..'.$row['img']));
            $data = json_encode([
                'status'    => 'success',
                'msg'       => 'Xóa nhóm thành công.'
            ]);
            die($data);
        }
    }
    else
    {
        $data = json_encode([
            'status'    => 'error',
            'msg'       => 'Xóa nhóm thất bại.'
        ]);
        die($data);
    }