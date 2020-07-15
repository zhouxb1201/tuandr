<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:34:"template/platform/Login/login.html";i:1591330109;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面 - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/bootstrap.min.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/common.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/jquery.slider.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/login.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS//indexDecorate/css/layer.css">
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/bootstrap.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.slider.min.js"></script>
    <script src="PLATFORM_NEW_JS/indexDecorate/layer.js"></script>
    <style>
        /*以下css仅针对本页面*/

        html,
        body {
            height: 100%;
        }

        body {
            background: url("PLATFORM_STATIC/login_register/loginBG.jpg") top center no-repeat;
            background-size: cover;
            position: relative;
            background-color: #fff;
        }
        #slider1{
            margin-left: 50px;
            margin-bottom: 20px;
        }
        .login-msg{
            width: 280px;
            margin: 2px 0 16px 50px;
            border: 1px solid #ffb4a8;
            line-height: 16px;
            padding: 6px 10px;
            overflow: hidden;
            background: #fef2f2;
            color: #6C6C6C;
        }
        .login-msg p {
            white-space: normal;
            word-wrap: break-word;
            width: 240px;
        }
    </style>
    <script>
    var PLATFORM_NAME = "<?php echo $title_name; ?>";
    var PLATFORMIMG = "PLATFORM_IMG";//后台图片请求路径
    var PLATFORMMAIN = "PLATFORM_MAIN";//后台请求路径
    var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
    var APPMAIN = "APP_MAIN";//手机端请求路径
    var UPLOAD = "__UPLOAD__";//上传文件根目录
    var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
    var ROOT = "__ROOT__";//根目录
    var ADDONS = "__ADDONS__";
    var STATIC = "__STATIC__";
    var MAIN = "PLATFORM_MAIN";//装修请求路径
    var PASSMAIN = "PLATFORM_MAIN";
    var ADDONSMAIN = "ADDONS_MAIN";

</script>
    <input type="hidden" id="vslai_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="vslai_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="vslai_admin_model" value="<?php echo admin_model(); ?>">
<input type="hidden" id="vslai_platform_model" value="<?php echo platform_model(); ?>">
<input type="hidden" id="url_realm_ip" value="<?php echo $web_info['realm_ip']; ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#vslai_admin_model"));
	url = url.replace('PLATFORM_MAIN', $("#vslai_platform_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN'+'?website_id=<?php echo $website_id; ?>';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		// if($("#vslai_rewrite_model").val()==1 || $("#vslai_rewrite_model").val()==true){
		// 	return 'SHOP_MAIN/'+url;
		// }
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		var url_model = $("#vslai_url_model").val();
		if(url_model==1 || url_model==true){
			var base_url = 'SHOP_MAIN/'+action_array[0];
			var tag = '?';
		}else{
			var base_url = 'SHOP_MAIN?s=/'+ action_array[0];
			var tag = '&';
		}
                var url = base_url;
                for(var i=1;i<action_array.length;i++){
                    if(action_array[i] != '' && action_array[i] != null){
                        url+=tag + action_array[i];
                    }else{
                        url+=tag;
                    }
                }

		return url;

	}
}
function __URLS(url){
    if( $("#vslai_rewrite_model").val()){
        url = url.replace("/index.php","");
    }
    var index = url.lastIndexOf("//");
    str = url.substring(index+2,url.length);
    var index1 =  str.indexOf("/");
    str0 = url.substring(0,index+2);
    str1 = str.substring(0,index1);
    str2 = str.substring(index1,url.length);
    var realm_ip = $("#url_realm_ip").val();
    if(realm_ip){
        urls = str0+realm_ip+str2;
    }
    var str=urls.substring(0, 1);
    if(str=='/' || str=="\\"){
        urls=urls.substring(1, urls.length);
    }
    var action_array = urls.split('?');
        //检测是否是pathinfo模式
    var url_model = $("#vslai_url_model").val();
    if(url_model==1 || url_model==true){
        var base_url = action_array[0];
        var tag = '?';
    }else{
        var base_url =  action_array[0];
        var tag = '&';
    }
    var urls = base_url;

    return urls;
}
//处理图片路径
function __IMG(img_path){
	var path = "";
	if(img_path != undefined && img_path != ""){
		if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
                    var url = document.domain;
                    var ishttps = 'https:' == document.location.protocol ? true: false;
                    if(ishttps){
                        url = 'https://' + url;
                   }else{
                        url = 'http://' + url;
                   }
                    
		    if(img_path.substr(0,1)=='/'){
                path = url + UPLOAD+img_path;
            }else{
                path = url + UPLOAD+"\/"+img_path;
            }
		}else{
			path = img_path;
		}
	}
	return path;
}
</script>
</head>

<body onkeydown="keyLogin();">
    <div class="v-layout-login">
        <div class="v-head-full">
            <div class="v-head w1200 clearfix">
                <div class="logo-left clearfix">
                    <a href="javascript:void(0);" class="fl" style="width:151px; height:150px; overflow: hidden;"><img  src="<?php if($logo_config['platform_logo']): ?><?php echo $logo_config['platform_logo']; else: ?>PLATFORM_STATIC/login_register/logo3.png<?php endif; ?>" alt=""></a>
                    <i class="shu fl"></i>
                    <span class="title fl"><?php if($logo_config['platform_word']): ?><?php echo $logo_config['platform_word']; else: ?>让更多的人帮你卖货<?php endif; ?></span>
                </div>
            </div>
        </div>
        <div class="v-login clearfix w1200 v-login-position">
            <!--<div class="imgHref fl"><a href="javascript:void(0);"></a></div>-->
            <div class="login-box ">
                <form action="">
                    <h3 class="title">欢迎登录<?php if($logo_config['login_mall_name']): ?><?php echo $logo_config['login_mall_name']; else: ?>团大人<?php endif; ?></h3>
                    <div class="login-msg" style="display: none">
                        <p class="error hint" >账户名错误</p>
                    </div>
                    <dl class="clearfix">
                        <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/L-account.png" alt=""></dt>
                        <dd class="userName-ipt fl"><input type="text" class="inputs" id="username" placeholder="请输入手机号码"></dd>
                    </dl>

                    <dl class="clearfix">
                        <dt class="userName fl"><img src="PLATFORM_STATIC/login_register/L-pwd.png" alt=""></dt>
                        <dd class="userName-ipt fl"><input type="password" class="inputs" id="password" placeholder="请输入密码"></dd>
                    </dl>

                    <div id="slider1"></div>

                    <div class="submits">
                        <input type="button" class="submit" disabled="disabled" value="登录" onclick="login()">
                    </div>
                    <div class="tips clearfix">
                        <div class="fr"><a href="<?php echo __URL('PLATFORM_MAIN/login/retrievePwd'); ?>" class="blue">忘记密码</a></div>
                    </div>
                    

                </form>
            </div>
        </div>

        <div class="v-footer">
            <p><?php if($logo_config['login_copyright']): ?><?php echo $logo_config['login_copyright']; else: ?> 团大人<?php endif; ?></p>
        </div>
    </div>
	<div style="display:none;">
		<div class="functions_canvas btn-group"><div class="btn_canvas active" data-function="sin(sqrt(x^2+z^2))"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">sin（sqrt（x ^ 2 + z ^ 2））</font></font></div><div class="btn_canvas" data-function="cos(x)*sin(z)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cos（x）* sin（z）</font></font></div></div>
		<div class="rotate btn-group">
		  <div class="btn_canvas rotatex" data-rotate="x"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">旋转x</font></font></div>
		  <div class="btn_canvas rotatey active" data-rotate="y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">旋转地</font></font></div>
		  <div class="btn_canvas rotatez" data-rotate="z"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">旋转</font></font></div>
		</div>
	</div>
	<canvas width="2560" height="1000" style="min-width: 1000px; width: 100%; position: fixed; left: 50%; top: 55%; transform: translate(-50%, -50%);z-index:-1"></canvas>
	<script src="PLATFORM_NEW_JS/jwmeyy.js"></script>
	<script src="PLATFORM_NEW_JS/jwmeyy_func.js"></script>

    <script>

    // pc端移动端判断
    (function () {
        var url = location.href;
        // replace www.test.com with your domain
        if (navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)) {
            location.href = "<?php echo __URL('PLATFORM_MAIN/login/loginMobile'); ?>";
        }
    })();

          // ie浏览器判断
    function isIE() {
        if (!!window.ActiveXObject || "ActiveXObject" in window){
            location.href=__URL(PLATFORMMAIN+'/login/versionLow');
        }else{
             
        }
     }
     isIE();
        $("#slider1").slider({
            width: 300, // width
            height: 40, // height
            fontSize: 14,
            callback: function (result) {
                if(result){
                    $(".submit").addClass("okSubmit").removeAttr("disabled");
                }
            }
        });


        function keyLogin(){
            if (event.keyCode==13 && $('.submit').hasClass('okSubmit')){
                //回车键的键值为13
                $(".submit").click(); //调用登录按钮的登录事件
            }   
        }

        function login() {
            var userName = $("#username").val();
            var password = $("#password").val();
            if( userName == "" || userName == undefined || userName == null ) {
                $(".hint").html('请输入用户名');
                $(".login-msg").css("display", "block");
                $("#txtName").focus();
                return false;
            }else if (password == "") {
                $(".hint").html('请输入密码');
                $(".login-msg").css("display", "block");
                $("#txtPWD").focus();
                return false;
            }else{
                $(".login-msg").css("display", "none");
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/login/login'); ?>",
                data : {
                    'username' : userName,
                    'password' : password
                },
                success : function(data) {
                    if(data["code"]>0){
                        location.href = __URL(PLATFORMMAIN+'/'+data['data']['url']);
                    }else{
                        layer.msg(data['message'], {time: 1000});
                    }
                }
            });
        }

    </script>
</body>

</html>