<?php
    require_once("../config/config.php");
    require_once("../config/function.php");

    // /* HTCD */
    // if($CMSNT->site('status_cron_momo') != 'ON')
    // {
    //     die('Chức năng đang tắt.');
    // }
    // if($CMSNT->site('api_momo') == '')
    // {
    //     die('Thiếu API');
    // }
    // $CMSNT->update("options", [
    //     'value' => time()
    // ], " `name` = 'check_time_cron' ");

    // curl_get(BASE_URL("cron/cron.php"));
    // curl_get(BASE_URL("cron/deleteorders.php"));
    
    $token = $CMSNT->site('api_momo');
    
    $curl = curl_init();
$dataPost = array(
    "type" => "history",
    "token" =>"$token",
);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.hethongcode.com/api/historymomo',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$dataPost,
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
 $result = json_decode($response, true);
    foreach($result['momoMsg']['tranList'] as $data)
    {
        $partnerId      = $data['partnerId'];               // SỐ ĐIỆN THOẠI CHUYỂN
        $comment        = $data['comment'];                 // NỘI DUNG CHUYỂN TIỀN
        $tranId         = $data['tranId'];                  // MÃ GIAO DỊCH
        $partnerName    = $data['partnerName'];             // TÊN CHỦ VÍ
        $id_momo        = parse_order_id($comment);         // TÁCH NỘI DUNG CHUYỂN TIỀN
        $amount         = $data['amount'];

        // if($amount < $CMSNT->site('recharge_min'))
        // {
        //     continue;
        // }
        $file = @fopen('LogMOMO.txt', 'a');
        if ($file)
        {
            $data = "partnerId => $partnerId comment => $comment ($id_momo) amount => $amount partnerName => $partnerName".PHP_EOL;
            fwrite($file, $data);
        }

        if ($id_momo)
        {
            $row = $CMSNT->get_row(" SELECT * FROM `users` WHERE `id` = '$id_momo' ");
            if($row['id'])
            {
                    if($CMSNT->num_rows(" SELECT * FROM `momo` WHERE `tranId` = '$tranId' ") == 0)
                {
                    $create = $CMSNT->insert("momo", array(
                        'tranId'        => $tranId,
                        'username'      => $row['username'],
                        'comment'       => $comment,
                        'time'          => gettime(),
                        'partnerId'     => $partnerId,
                        'amount'        => $amount,
                        'partnerName'   => $partnerName
                    ));
                    if ($create)
                    {
                        $real_amount = $amount;
                        $isCheckMoney = $CMSNT->cong("users", "money", $real_amount, " `username` = '".$row['username']."' ");

                        if($isCheckMoney)
                        {
                            $CMSNT->cong("users", "total_money", $real_amount, " `username` = '".$row['username']."' ");
                            $CMSNT->insert("dongtien", array(
                                'sotientruoc'   => $row['money'],
                                'sotienthaydoi' => $real_amount,
                                'sotiensau'     => $row['money'] + $real_amount,
                                'thoigian'      => gettime(),
                                'noidung'       => 'Nạp tiền tự động qua ví MOMO ('.$tranId.')',
                                'username'      => $row['username']
                            ));
                        }
                    }
                }
            }
        }         
    }
 