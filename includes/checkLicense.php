<?php


function CMSNT_check_license($licensekey, $localkey='') {
    global $config;
    $whmcsurl = 'https://client.cmsnt.co/';
    $licensing_secret_key = $config['project'];
    $localkeydays = 15;
    $allowcheckfaildays = 5;
    $check_token = time() . md5(mt_rand(100000000, mt_getrandmax()) . $licensekey);
    $checkdate = date("Ymd");
    $domain = $_SERVER['SERVER_NAME'];
    $usersip = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
    $dirpath = dirname(__FILE__);
    $verifyfilepath = 'modules/servers/licensing/verify.php';
    $localkeyvalid = true;
    if ($localkey) {
        $localkey = str_replace("\n", '', $localkey); # Remove the line breaks
        $localdata = substr($localkey, 0, strlen($localkey) - 32); # Extract License Data
        $md5hash = substr($localkey, strlen($localkey) - 32); # Extract MD5 Hash
        if ($md5hash == md5($localdata . $licensing_secret_key)) {
            $localdata = strrev($localdata); # Reverse the string
            $md5hash = substr($localdata, 0, 32); # Extract MD5 Hash
            $localdata = substr($localdata, 32); # Extract License Data
            $localdata = base64_decode($localdata);
            $localkeyresults = json_decode($localdata, true);
            $originalcheckdate = $localkeyresults['checkdate'];
            if ($md5hash == md5($originalcheckdate . $licensing_secret_key)) {
                $localexpiry = date("Ymd", mktime(0, 0, 0, date("m"), date("d") - $localkeydays, date("Y")));
                if ($originalcheckdate > $localexpiry) {
                    $localkeyvalid = true;
                    $results = $localkeyresults;
                    $validdomains = explode(',', $results['validdomain']);
                    if (!in_array($_SERVER['SERVER_NAME'], $validdomains)) {
                        $localkeyvalid = true;
                        $localkeyresults['status'] = "Invalid";
                        $results = array();
                    }
                    $validips = explode(',', $results['validip']);
                    if (!in_array($usersip, $validips)) {
                        $localkeyvalid = true;
                        $localkeyresults['status'] = "Invalid";
                        $results = array();
                    }
                    $validdirs = explode(',', $results['validdirectory']);
                    if (!in_array($dirpath, $validdirs)) {
                        $localkeyvalid = true;
                        $localkeyresults['status'] = "Invalid";
                        $results = array();
                    }
                }
            }
        }
    }
    if (!$localkeyvalid) {
        $responseCode = 0;
        $postfields = array(
            'licensekey' => $licensekey,
            'domain' => $domain,
            'ip' => $usersip,
            'dir' => $dirpath,
        );
        if ($check_token) $postfields['check_token'] = $check_token;
        $query_string = '';
        foreach ($postfields AS $k=>$v) {
            $query_string .= $k.'='.urlencode($v).'&';
        }
        if (function_exists('curl_exec')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $whmcsurl . $verifyfilepath);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
        } else {
            $responseCodePattern = '/^HTTP\/\d+\.\d+\s+(\d+)/';
            $fp = @fsockopen($whmcsurl, 80, $errno, $errstr, 5);
            if ($fp) {
                $newlinefeed = "\r\n";
                $header = "POST ".$whmcsurl . $verifyfilepath . " HTTP/1.0" . $newlinefeed;
                $header .= "Host: ".$whmcsurl . $newlinefeed;
                $header .= "Content-type: application/x-www-form-urlencoded" . $newlinefeed;
                $header .= "Content-length: ".@strlen($query_string) . $newlinefeed;
                $header .= "Connection: close" . $newlinefeed . $newlinefeed;
                $header .= $query_string;
                $data = $line = '';
                @stream_set_timeout($fp, 20);
                @fputs($fp, $header);
                $status = @socket_get_status($fp);
                while (!@feof($fp)&&$status) {
                    $line = @fgets($fp, 1024);
                    $patternMatches = array();
                    if (!$responseCode
                        && preg_match($responseCodePattern, trim($line), $patternMatches)
                    ) {
                        $responseCode = (empty($patternMatches[1])) ? 0 : $patternMatches[1];
                    }
                    $data .= $line;
                    $status = @socket_get_status($fp);
                }
                @fclose ($fp);
            }
        }
        if ($responseCode != 200) {
            $localexpiry = date("Ymd", mktime(0, 0, 0, date("m"), date("d") - ($localkeydays + $allowcheckfaildays), date("Y")));
            if ($originalcheckdate > $localexpiry) {
                $results = $localkeyresults;
            } else {
                $results = array();
                $results['status'] = "Invalid";
                $results['description'] = "Remote Check Failed";
                return $results;
            }
        } else {
            preg_match_all('/<(.*?)>([^<]+)<\/\\1>/i', $data, $matches);
            $results = array();
            foreach ($matches[1] AS $k=>$v) {
                $results[$v] = $matches[2][$k];
            }
        }
        if (!is_array($results)) {
            die("Invalid License Server Response");
        }
        if (isset($results['md5hash'])) {
            if ($results['md5hash'] != md5($licensing_secret_key . $check_token)) {
                $results['status'] = "Invalid";
                $results['description'] = "MD5 Checksum Verification Failed";
                return $results;
            }
        }
        if ($results['status'] == "Active") {
            $results['checkdate'] = $checkdate;
            $data_encoded = json_encode($results);
            $data_encoded = base64_encode($data_encoded);
            $data_encoded = md5($checkdate . $licensing_secret_key) . $data_encoded;
            $data_encoded = strrev($data_encoded);
            $data_encoded = $data_encoded . md5($data_encoded . $licensing_secret_key);
            $data_encoded = wordwrap($data_encoded, 80, "\n", true);
            $results['localkey'] = $data_encoded;
        }
        $results['remotecheck'] = true;
    }
    unset($postfields,$data,$matches,$whmcsurl,$licensing_secret_key,$checkdate,$usersip,$localkeydays,$allowcheckfaildays,$md5hash);
    return $results;
}
function checkLicenseKey($licensekey){
    $results = CMSNT_check_license($licensekey, '');
    if($results['status'] == "Active"){   
        $results['msg'] = "Giấy phép hợp lệ";
        $results['status'] = true;
        return $results;
    }
    if($results['status'] == "Invalid"){   
        $results['msg'] = "Giấy phép kích hoạt không hợp lệ";
        $results['status'] = true;
        return $results;
    }
    if($results['status'] == "Expired"){   
        $results['msg'] = "Giấy phép mã nguồn đã hết hạn, vui lòng gia hạn ngay";
        $results['status'] = true;
        return $results;
    }
    if($results['status'] == "Suspended"){   
        $results['msg'] = "Giấy phép của bạn đã bị tạm ngưng";
        $results['status'] = true;
        return $results;
    }
    $results['msg'] = "Không tìm thấy giấy phép này trong hệ thống";
    $results['status'] = true;
    return $results;
}


if($CMSNT->site('license_key') == '' || checkLicenseKey($CMSNT->site('license_key'))['status'] != true){

    if(isset($_POST['btnSaveLicense']) && $getUser['level'] == 'admin')
    {
        if($CMSNT->site('status_demo') == 'ON')
        {
            admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
        }
        foreach ($_POST as $key => $value)
        {
            if(!$CMSNT->get_row("SELECT * FROM `options` WHERE `name` = '$key' "))
            {
                $CMSNT->insert("options", [
                    'name'  => $key,
                    'value' => $value
                ]);
            }
            $CMSNT->update("options", array(
                'value' => $value
            ), " `name` = '$key' ");
        }
        $checkKey = checkLicenseKey($CMSNT->site('license_key'));
        if($checkKey['status'] != true)
        {
            admin_msg_error($checkKey['msg'], '', 2000);
        }
        admin_msg_success('Lưu thành công', '', 500);
    }

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cấu hình thông tin bản quyền</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÔNG TIN BẢN QUYỀN CODE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mã bản quyền (license key)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="license_key" value="<?=$CMSNT->site('license_key');?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveLicense" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">HƯỚNG DẪN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Quý khách có thể lấy License key tại đây: <a target="_blank" href="https://client.cmsnt.co/clientarea.php?action=products&module=licensing">https://client.cmsnt.co/clientarea.php?action=products&module=licensing</a></p>
                        <p>Nếu quý khách mua hàng tại CMSNT.CO mà chưa có License key, vui lòng liên hệ Zalo <b>0947838128</b> để được cấp.</p>
                        <p>Chỉ áp dúng cho những ai mua code, không hỗ trợ những trường hợp sử dụng lậu mã nguồn.</p>
                        <p>Nếu bạn chưa mua code tại CMSNT.CO, bạn có thể mua giấy phép tại đây: <a target="_blank" href="https://client.cmsnt.co/index.php?rp=/store/license-source-code">CLIENT CMSNT</a></p>
                        <img src="https://i.imgur.com/VzDVIx0.png" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
    require_once(__DIR__."/../public/admin/Footer.php");
?>
<?php die(); }?>