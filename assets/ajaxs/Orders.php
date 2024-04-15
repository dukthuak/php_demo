<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");

    if(isset($_POST['id']))
    {
        $id = check_string($_POST['id']);
        if(empty($_SESSION['username']))
        {
            msg_error2("Vui lòng đăng nhập để thanh toán !");
        }
        $row = $CMSNT->get_row(" SELECT * FROM `accounts` WHERE `id` = '$id'  ");
        if(!$row)
        {
            msg_error2("Tài khoản không tồn tại trong hệ thống.");
        }
        if($row['username'] != NULL)
        {
            msg_error2("Tài khoản này đã bán, vui lòng tìm tài khoản khác.");
        }
        if($row['money'] > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm.");
        }
        $isMoney = $CMSNT->tru("users", "money", $row['money'], " `username` = '".$getUser['username']."' ");
        if($isMoney)
        {
            /* GHI LOG DÒNG TIỀN */
            $CMSNT->insert("dongtien", array(
                'sotientruoc'   => $getUser['money'] + $row['money'],
                'sotienthaydoi' => $row['money'],
                'sotiensau'     => $getUser['money'],
                'thoigian'      => gettime(),
                'noidung'       => 'Mua tài khoản (#'.$row['id'].')',
                'username'      => $getUser['username']
            ));

            $CMSNT->update("accounts", [
                'username'      => $getUser['username'],
                'updatedate'    => gettime(),
                'time'          => time()
            ], " `id` = '".$row['id']."' ");

            /* CỘNG TIỀN NGƯỜI BÁN */
            $isCongTien= $CMSNT->cong("users", "money", $row['money'], " `username` = '".$row['receiver']."' ");
            if($isCongTien)
            {
                /* GHI LOG DÒNG TIỀN */
                $CMSNT->insert("dongtien", array(
                    'sotientruoc'   => getUser($row['receiver'], 'money') - $row['money'],
                    'sotienthaydoi' => $row['money'],
                    'sotiensau'     => getUser($row['receiver'], 'money'),
                    'thoigian'      => gettime(),
                    'noidung'       => 'Bán tài khoản (#'.$row['id'].')',
                    'username'      => $row['receiver']
                ));
            }
            msg_success("Thanh toán thành công!", BASE_URL("History"), 1000);
        }
    }