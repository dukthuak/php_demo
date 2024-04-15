<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'THAY ĐỔI MẬT KHẨU | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    //require_once("../../public/client/Nav.php");
?>

<header>
    <div class="login-head">
        <a href="<?=BASE_URL('');?>" class="login-logo">
            <img src="<?=$CMSNT->site('logo');?>" alt="" />
        </a>
    </div>
</header>
<section>
    <div class="bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="login-box">
                        <h3 class="clc6 light tac welcome">
                            Thay đổi mật khẩu </h3>
                        <form>
                            <div class="login-cont">
                                <div id="thongbao"></div>
                                <div class="login-col email-cont mb12">
                                    <div class="login-top">
                                        <div class="form-group field-loginform-username required">
                                            <input type="text" id="otp" class="txt"
                                                placeholder="Nhập OTP" autofocus aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="login-col pass-cont">
                                    <div class="email-top">
                                        <div class="form-group field-loginform-password required">
                                            <input type="password" id="password" class="txt" placeholder="Nhập mật khẩu mới"
                                                aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="login-col pass-cont">
                                    <div class="email-top">
                                        <div class="form-group field-loginform-password required">
                                            <input type="password" id="repassword" class="txt" placeholder="Nhập lại mật khẩu mới"
                                                aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="login-col login-btn">
                                    <button type="submit" id="ChangePassword"
                                        class="button button-highlight f16 pt8 pb8 sign-btn sub-btn">XÁC NHẬN</button>
                                    <a class="button button-null tac f16 mt12 pt8 pb8 register"
                                        href="<?=BASE_URL('Auth/Login');?>">
                                        ĐĂNG NHẬP </a>
                                </div>
                                <div class="tac reg-with">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script type="text/javascript">
$("#ChangePassword").on("click", function() {

    $('#ChangePassword').html('ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/Auth.php");?>",
        method: "POST",
        data: {
            type: 'ChangePassword',
            otp: $("#otp").val(),
            password: $("#password").val(),
            repassword: $("#repassword").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#ChangePassword').html(
                    'Đổi mật khẩu')
                .prop('disabled', false);
        }
    });
});
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>