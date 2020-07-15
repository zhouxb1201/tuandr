<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:36:"template/admin/Login/versionLow.html";i:1591322839;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>浏览器版本太低</title>
    <input type="hidden" id="vslai_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="vslai_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="vslai_admin_model" value="<?php echo admin_model(); ?>">
<input type="hidden" id="realm_ip" value="<?php echo $web_info['realm_ip']; ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#vslai_admin_model"));
	if(url == ''|| url == null){
		return 'SHOP_MAIN';
	}else{
		var str=url.substring(0, 1);
		if(str=='/' || str=="\\"){
			url=url.substring(1, url.length);
		}
		if($("#vslai_rewrite_model").val()==1 || $("#vslai_rewrite_model").val()==true){
			return 'SHOP_MAIN/'+url;
		}
		var action_array = url.split('?');
		//检测是否是pathinfo模式
		url_model = $("#vslai_url_model").val();
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
                url+=tag + action_array[i]+'&website_id=<?php echo $website_id; ?>';
            }else{
                url+=tag+'website_id=<?php echo $website_id; ?>';
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
    var realm_ip = $("#realm_ip").val();
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
    }
    return path;
}
</script>
    <script type="text/javascript" src="__STATIC__/lib/jquery/jquery.min.js"></script>
    <style>
        body,
        div,
        dl,
        dt,
        dd,
        ul,
        ol,
        li,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        pre,
        code,
        form,
        fieldset,
        legend,
        input,
        button,
        textarea,
        p,
        blockquote,
        th,
        td {
            margin: 0;
            padding: 0;
        }
        body {
            background: #eaf3ee;
            color: #555;
            font-size: 12px;
            font-family: "Microsoft yahei";
            min-width: 1200px;
        }
        .w1200{
            width: 1200px;
            margin: 0 auto;
        }
        .logo{
            margin-top: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .content{
            text-align: center;
            background:url('/public/static/images/version/background.png') no-repeat;
        }
        .content .content_title{
            font-size: 30px;
            margin-top:10px;
            margin-bottom: 30px;
            padding-top: 200px;
        }
        .inline-block{
            display: inline-block;
        }
        .flex {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
        .box .item{
                width: 25%;
                justify-content: center;
        }
        .btn {
            display: inline-block;
            margin-bottom: 0;
            font-weight: normal;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .btn-google {
            color: #fff;
            background-color: #61bd5c;
        }
        .btn-firefox {
            color: #fff;
            background-color: #e67526;
        }
        .btn-360 {
            color: #fff;
            background-color: #69c804;
        }
        .btn-baidu {
            color: #fff;
            background-color: #00a1e9;
        }
        a {
            text-decoration: none;
        }
        .content_tips{
            margin-bottom: 50px;
        }
        .mtb-20{
            margin-top: 20px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <input type="hidden" id="website_id" value="<?php echo $website_id; ?>">
    <div class="logo">
        <div class="w1200">
            <img src="/public/static/images/version/logo.png" alt="">
        </div>
    </div>
    <div class="content w1200">
            <h4 class="content_title">
                <div class="inline-block" style="vertical-align: middle;"><img src="/public/static/images/version/alert.png" alt=""></div>
                <div class="inline-block">浏览器版本太低</div>
            </h4>
            <div class="content_tips">很抱歉，您正在使用的浏览器版本过低，为了给您展现更好的内容，请使用以下浏览器进行访问</div>
            <div class="box flex">
                <div class="item">
                    <img src="/public/static/images/version/google.png" alt="">
                    <div class="mtb-20">推荐选择</div>
                    <a href="https://www.google.cn/intl/zh-CN/chrome/" class="btn btn-google" target="_blank">谷歌浏览器</a>
                </div>
                <div class="item">
                    <img src="/public/static/images/version/firefox.png" alt="">
                    <div class="mtb-20">推荐选择</div>
                    <a href="http://www.firefox.com.cn/" class="btn btn-firefox" target="_blank">火狐浏览器</a>
                </div>
                <div class="item">
                    <img src="/public/static/images/version/360.png" alt="">
                    <div class="mtb-20">推荐选择</div>
                    <a href="http://browser.360.cn/" class="btn btn-360" target="_blank">360浏览器(极速模式)</a>
                </div>
                <div class="item">
                    <img src="/public/static/images/version/baidu.png" alt="">
                    <div class="mtb-20">推荐选择</div>
                    <a href="https://liulanqi.baidu.com/" class="btn btn-baidu" target="_blank">百度浏览器</a>
                </div>
            </div>
    </div>
<script>
    function isIE() {
    if (!!window.ActiveXObject || "ActiveXObject" in window){
        
    }else{
        location.href = "<?php echo __URL('ADMIN_MAIN/login/index'); ?>&website_id="+$('#website_id').val();
    }
}
isIE();
</script>
</body>
</html>