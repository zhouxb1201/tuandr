<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"template/platform/Login/loginMobile.html";i:1591330110;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎登录 - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <meta name="description" content="团大人,微信三级分销系统,微信分销系统,登录">
    <meta name="keywords" content="登录,团大人">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="layoutmode" content="standard">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="renderer" content="webkit">
    <meta name="applicable-device" content="mobile">
    <meta name="wap-font-scale" content="no">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="Pragma" content="no-cache">

    <link rel="stylesheet" href="PLATFORM_NEW_CSS/loginMobile.css">

    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
</head>
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
<body>
    <header class="head">
        <div class="top flex_box jc_sb">
            <div class="h_logo "><img src="<?php if($logo_config['platform_logo']): ?><?php echo $logo_config['platform_logo']; else: ?>http://m.vslai.com/statics/images/mobile/common/h_logo.png<?php endif; ?>" onerror=""></div>
        </div>
    </header>
    <div class="res_page">
            <h1>欢迎登录<?php if($logo_config['login_mall_name']): ?><?php echo $logo_config['login_mall_name']; else: ?>团大人<?php endif; ?></h1>
            <form>
                <div class="register_box">
                    <div class="register_center">
                        <div class="register_infor">
                            <span class="left_tt" style="letter-spacing: 4px;">登录账号</span>
                            <input class="input" type="text" name="mobile" id="mobile" placeholder="请输入手机号码">
                        </div>
                        <div class="register_infor">
                            <span class="left_tt password_bp">密 码</span>
                            <input type="password" class="input" id="password" name="password" placeholder="请输入密码" autocomplete="new-password">
                        </div>

                        <div class="stage">
                            <div class="slider" id="slider">
                                <div class="label">向右滑动验证</div>
                                <div class="track" id="track">
                                    <div class="bg-green" style="color: #fff">验证成功</div>
                                </div>
                                <div class="button" id="btn">
                                    <div class="icon" id="icon"></div>
                                    <div class="spinner" id="spinner"></div>
                                </div>
                            </div>
                        </div>

                        <div class="register_but"><a href="javascript:;" id="submit" class="disaleds" disabled="disabled" onclick="login()">登录</a></div>
                     </div>
                </div>
            </form>
            <footer class="res_copyright">
                <?php if($logo_config['login_copyright']): ?><?php echo $logo_config['login_copyright']; else: ?>
                <p>All Right Reserved ©2017 版权所有</p>
                <p>广州领客信息科技股份有限公司</p>
                <?php endif; ?>
                
            </footer>
    </div>

<script type="text/javascript" src="PLATFORM_NEW_JS/slider.js"></script>
<script>

    // pc端移动端判断
    (function () {
        var url = location.href;
        // replace www.test.com with your domain
        if (!navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)) {
            // location.href = "<?php echo __URL('PLATFORM_MAIN/login/registermobile'); ?>";
            location.href = "<?php echo __URL('PLATFORM_MAIN/login/index'); ?>";
        }
    })();

// alert提示语优化
function showMsg(text,position){
	var show	=	$('.show_msg').length
	if(show>0){
		
	}else{
		var	div		=	 $('<div></div>');
			div.addClass('show_msg');
		var span	=	$('<span></span>');
			span.addClass('show_span');
			span.appendTo(div);
			span.text(text);
		$('body').append(div);
	}
	$(".show_span").text(text);
	if(position=='bottom'){
		$(".show_msg").css('bottom','5%');
	}else if(position=='center'){
		$(".show_msg").css('top','');
		$(".show_msg").css('bottom','50%');
	}else{
		$(".show_msg").css('bottom','95%');
	}
	$('.show_msg').hide();
	$('.show_msg').fadeIn(2000);
	$('.show_msg').fadeOut(1000);
}

        //昵称,真实姓名,QQ号
        function checkExtendfields() {
            if ($.trim($("#mobile").val()).length <= 0) {
                showMsg("请填写手机号码！账户出现问题时及时联系您","center");
                return false;
            }
            if ($.trim($("#realname").val()).length <= 0) {
                showMsg("请填写真实姓名方便我们技术人员联系您","center");
                return false;
            }
            return true;
        }
        //检查密码
        function checkPassword() {
            var value = $('#password').val();
            var strRegex = /^[0-9a-zA-Z_]{1,}$/;
            if (value.length >= 6 && value.length <= 20) {
                if (strRegex.test(value)) {
                    return true;
                }
            } else {
                showMsg('请输入密码，密码长度为6-20个字符',"center");
                return false;
            }
        }
        //检查用户名
        function checkUsername() {
            var value = $('#realname').val();
            var strRegex = /^[\u4e00-\u9fa5_a-zA-Z0-9]+$/;

            if (value.length >= 2 && value.length <= 16) {
                if (strRegex.test(value)) {
                    return true;
                }
            } else {
                showMsg("真实姓名请输入2~16个字符，可使用字母、数字、下划线","center");
                return false;
            }
        }

    (function(doc, win) {
        var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function() {
                var clientWidth = docEl.clientWidth;
                if (!clientWidth) return;
                clientWidth = clientWidth > 640 ? 640 : clientWidth;
                docEl.style.fontSize = 40 * (clientWidth / 640) + 'px';
            };
        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
        var head=$('.head').height();
        var aa=docEl.clientHeight-"80";
        $('.res_page').height(aa);
    })(document, window);

    function login() {
        var userName = $("#mobile").val();
        var password = $("#password").val();
        if(userName.trim()==''){
            showMsg('请输入用户名','center');
            return false;
        }
        if(password.trim()==''){
            showMsg('请输入密码','center');
            return false;
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
                    showMsg(data['message'],'center');
                }
            }
        });
    }

</script>
</body>

</html>