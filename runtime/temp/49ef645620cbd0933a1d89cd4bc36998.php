<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"template/platform/register/retrievePwd.html";i:1583811744;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>重置密码 - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>微商来 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="__TEMP__/shop/new/public/css/common.css">
    <link rel="stylesheet" href="__TEMP__/shop/new/public/css/shop.css">
    <script src="__TEMP__/shop/new/public/scripts/lib/require.js" data-main="__TEMP__/shop/new/public/scripts/app/main"></script>
</head>

<body>
    <div class="v-layout-login">
        <div class="v-head-full retrieve">
            <div class="v-head w1200 clearfix">
                <div class="logo-left clearfix">
                    <a href="javascript:void(0);" class="fl"><img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_STATIC/login_register/LOGO2.png<?php endif; ?>" alt=""></a>
                    <i class="shu fl"></i>
                    <span class="title fl">忘记密码?</span>
                </div>
            </div>
        </div>

        <div class="retrieve-content">
            <div class="w1200">
                <div class="edit-content">
                    <div class="step step1 clearfix">
                        <span>验证身份</span>
                        <span style="width: 500px">重置密码</span>
                        <span>完成</span>
                    </div>

                    <!--第1步-->
                    <div class="validation-form validation-step1">
                        <div class="fp-box">
                            <div class="login-box">
                                <div class="login-msg" style="display: none">
                                    <p class="error hint">账户名错误</p>
                                </div>
                                <dl class="clearfix">
                                    <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/phoneIcon.png" alt=""></dt>
                                    <dd class="userName-ipt fl"><input type="number" id="mobile" class="inputs"  placeholder="请输入手机号码"  value=""></dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/code.png" alt=""></dt>
                                    <dd class="userName-ipt fl pr">
                                        <input type="text" class="inputs" id="mobile-code" placeholder="请输入验证码">
                                        <button type="button" class="obtain-code sendcode">获取验证码</button>
                                    </dd>
                                </dl>
                                <div class="submits">
                                    <input type="button" class="submit okSubmit next1" value="下一步">
                                </div>
                                </div>
                                </div>
                    </div>

                    <!--第2步-->
                    <div class="validation-form validation-step2" style="display: none">
                        <div class="fp-box">
                            <div class="login-box">
                        <form action="">
                            <div class="login-msg login-msg1" style="display: none">
                                <p class="error hint hint1">账户名错误</p>
                            </div>
                            <dl class="clearfix">
                                <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/L-pwd.png" alt=""></dt>
                                <dd class="userName-ipt fl"><input type="password" id="mobile-pass" class="inputs" placeholder="请输入新密码"></dd>
                            </dl>

                            <dl class="clearfix">
                                <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/确认密码.png" alt=""></dt>
                                <dd class="userName-ipt fl"><input type="password" class="inputs" id="mobile-new-pass" placeholder="请输入确认密码"></dd>
                            </dl>
                            <div class="submits">
                                <input type="button" class="submit okSubmit next2" value="提交">
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>

                    <!--第三步-->
                    <div class="validation-step3 tc" style="display: none">
                        <p>恭喜您，修改密码成功！</p>
                        <p><a href="<?php echo __URL('PLATFORM_MAIN/login'); ?>" class="blue">重新登录</a></p>
                    </div>
                </div>


            </div>
        </div>

        <div class="v-footer">
            <p><?php if($logo_config['login_copyright']): ?><?php echo $logo_config['login_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></p>
        </div>
    </div>


<input type="hidden" id="default_mobile" value="">
</body>
<script>
    require(['dialog'],function(dialog){
        loading();
        function loading(){
            $(".rights").css("display","none");
        }
        var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;

        var wait=120;
        function time() {
            if (wait == 0) {
                $(".sendcode").removeAttr("disabled");
                $(".sendcode").html("获取验证码");
                $(".obtain-code").removeClass("ccc");
                wait = 120;
            } else {
                $(".sendcode").attr("disabled", 'disabled');
                $(".sendcode").html(wait+"s");
                $(".obtain-code").addClass("ccc");
                wait--;
                setTimeout(function() {
                        time()
                    },
                    1000);
            }
        }
        //检测手机手机是否已注册
        $("#mobile").change(function(){
            var mobile = $("#mobile").val();
            if(!myreg.test(mobile)){
                $(".hint").html('请输入正确的手机格式');
                $(".login-msg").css("display", "block");
                $("#mobile").focus();
                return false;
            }
            $.ajax({
                type: "GET",
                url: "<?php echo __URL('PLATFORM_MAIN/login/retrievePwd'); ?>",
                data: {"username":mobile},
                success: function(data){
                    if(data==0){
                        $(".hint").html('该手机号未注册');
                        $(".login-msg").css("display", "block");
                        $("#mobile").focus();
                        return false;
                    }else{
                        $("#default_mobile").val(mobile);
                        $(".login-msg").css("display", "none");
                    }
                }
            });
        });
        //发送手机验证码
        $(".sendcode").click(function(){
            var mobile = $("#mobile").val();
            var type ="sms";
            if(mobile){
                //验证手机号邮箱是否已经注册
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/login/forgotValidation'); ?>",
                    data: {"type":type,"send_param":mobile},
                    async: false,
                    success: function(data){
                        if (data['code'] >0) {
                            $(".hint").html('发送成功');
                            $(".login-msg").css("display", "block");
                            time();
                        }else{
                            $(".hint").html(data['message']);
                            $(".login-msg").css("display", "block");
                            return false;
                            time();
                        }
                    }
                });
            }else{
                $(".hint").html('请填写手机号');
                $(".login-msg").css("display", "block");
                $("#mobile").focus();
                return false;
            }
        });

        function keyLogin(){
            if (event.keyCode==13 && $('.next1').hasClass('okSubmit')){
                //回车键的键值为13
                $(".next1").click(); //调用登录按钮的登录事件
            }   
        }
        $('.validation-step1').on('keydown',function(){
            keyLogin();
        })
        //点击下一步
        $(".next1").click(function(){
            var mobile_code = $("#mobile-code").val();
            var mobile = $("#mobile").val();
            if(mobile && mobile_code ){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/login/check_find_password_code'); ?>",
                    async : false,
                    data : {"send_param" : mobile_code},
                    success : function(data){
                        if(data['code']>0){
                            $(".login-msg").css("display", "none");
                            $(".validation-step1").hide();
                            $(".validation-step2").show();
                            $('.step').addClass('step2')
                        }else{
                            $(".hint").html('手机验证码不正确');
                            $(".login-msg").css("display", "block");
                            $("#mobile-code").focus();
                            return false;
                        }
                    }
                })
            }else if(mobile==""){
                $(".hint").html('请填写手机号');
                $(".login-msg").css("display", "block");
                $("#mobile").focus();
                return false;
            }else if(mobile_code==""){
                $(".hint").html('请填写手机验证码');
                $(".login-msg").css("display", "block");
                $("#mobile-code").focus();
                return false;
            }
        })
        //点击确认
        $(".next2").click(function(){
            var mobile = $("#default_mobile").val();
            var mobile_pass = $("#mobile-pass").val();
            var mobile_new_pass = $("#mobile-new-pass").val();
            if(mobile_pass.length<6){
                $(".hint").html('登录密码不能少于 6 个字符');
                $(".login-msg").css("display", "block");
                $("#mobile-pass").focus();
                return false;
            }
            if(mobile_new_pass != mobile_pass){
                $(".hint").html('两次输入的密码不一致');
                $(".login-msg").css("display", "block");
                $("#mobile-new-pass").focus();
                return false;
            }
            if(mobile_pass==''){
                $(".hint").html('请填写新密码');
                $(".login-msg").css("display", "block");
                $("#mobile-pass").focus();
                return false;
            }
            if(mobile_new_pass==''){
                $(".hint").html('请填写确认新密码');
                $(".login-msg").css("display", "block");
                $("#mobile-new-pass").focus();
                return false;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/login/setNewPassword'); ?>",
                data : {"userInfo":mobile,"password":mobile_pass},
                success : function(data){
                    if(data['code'] >0){
                        $(".validation-step2").hide();
                        $(".validation-step3").show();
                        $('.step').addClass('step3')
                    }else{
                        $(".hint").html(data['message']);
                        $(".login-msg").css("display", "block");
                        setTimeout(function(){
                            location.reload()
                        },2000);
                    }
                }
            })
        });
    })
</script>
</html>