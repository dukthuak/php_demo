<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");

    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);

    if(empty($_SESSION['username']))
    {
        msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
    }
    if(empty($loaithe))
    {
        msg_error2("Vui lòng chọn loại thẻ");
    }
    if(empty($menhgia))
    {
        msg_error2("Vui lòng chọn mệnh giá");
    }
    if(empty($seri))
    {
        msg_error2("Vui lòng nhập seri thẻ");
    }
    if(empty($pin))
    {
        msg_error2("Vui lòng nhập mã thẻ");
    }
    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
        msg_error2("Mã thẻ hoặc seri không đúng định dạng!");
    }
    $code = rand(11111111,999999999);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_CONNECTTIMEOUT => 0,
        CURLOPT_TIMEOUT => 16,
      CURLOPT_URL => 'https://gachthe1s.com/chargingws/v2',
        CURLOPT_USERAGENT => 'TUANORI CURL',
        CURLOPT_POST => 1,
        CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
        CURLOPT_POSTFIELDS => http_build_query(array(
            'sign' => md5($CMSNT->site('partner_key').$pin.$seri),
            'telco' => $loaithe,
            'code' => $pin,
            'serial' => $seri,
            'amount' => $menhgia,
            'request_id' => $code,
            'partner_id' => $CMSNT->site('partner_id'),
            'command'   => 'charging'
        ))
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    $jsonData = json_decode($resp, true);
    if (isset($jsonData['status']))
    {
        if($jsonData['status'] == 99)
        {
            $CMSNT->insert("cards", array(
                'code' => $code,
                'seri' => $seri,
                'pin'  => $pin,
                'loaithe' => $loaithe,
                'menhgia' => $menhgia,
                'thucnhan' => '0',
                'username' => $getUser['username'],
                'status' => 'xuly',
                'note' => '',
                'createdate' => gettime()
            ));
            msg_success("Gửi thẻ thành công, vui lòng đợi kết quả", "", 2000);
        }
        else
        {
            msg_error2($jsonData['message']);
        }
    }
    else
    {
        msg_error2("Không thể nhập dữ liệu vào API");
    }