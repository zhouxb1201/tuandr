<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:47:"template/platform/Wchat/materialManagement.html";i:1583811746;s:31:"template/platform/new_base.html";i:1587970146;s:44:"template/platform/controlCommonVariable.html";i:1583811744;s:31:"template/platform/urlModel.html";i:1583811744;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>微商来 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="PLATFORM_NEW_LIB/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="PLATFORM_STATIC/css/common.css?t=1.2">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/platform.css?t=1.1">
    <link rel="shortcut icon" href="PLATFORM_IMG/logo.png" type="image/x-icon" />
    <script>
        var PLATFORMJS = "PLATFORM_NEW_JS";
    </script>
    <script type="text/javascript" src="PLATFORM_NEW_LIB/require.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/time_common.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/common.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/config.js"></script>
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
    
<style>
    .panel .btn-group{width:100%}
    .panel-image .btn-group .btn{width:33.333%}
    .panel-voice .btn-group .btn{width:33.333%}
    .panel-video .btn-group .btn{width:25%}
    .panel-news .btn-group .btn{width:33.333%}

    .panel .panel-body .content{position: relative; margin-bottom: 10px}
    .panel .panel-body .content span{overflow:hidden; display:block; width:100%; padding-right:10px; position:absolute; bottom:0; left:0; line-height:25px; background:rgba(0,0,0,0.5); color:#fff; text-align:right;}

    .panel .panel-body .audio-msg{position:relative; padding-left:65px; height:70px;}
    .panel .panel-body .audio-msg .icon span{position:absolute; left:0; top:0; background:#ccc; width:60px; height:60px; line-height:60px; vertical-align:middle; display:inline-block; cursor:pointer; font-size: 25px; text-align: center;}
    .panel .panel-body .audio-msg .audio-content .audio-title{ width:100%; margin-bottom:10px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}

    .panel .panel-body .video-content{margin-bottom:10px;}
    .panel .panel-body .video-content .title,.panel .panel-body .video-content .abstract{white-space:nowrap; word-break:break-all; overflow:hidden; text-overflow:ellipsis;}
    .panel .panel-body .video-content img{max-width:100%; height:140px;}
    .panel .panel-body .video-content .video{position:relative; margin:10px 0;}
    .panel .panel-body .video-content .video .video-length{display:block; width:100%; padding-right:10px; position:absolute; bottom:0; left:0; line-height:25px; background:rgba(0,0,0,0.5); color:#fff; text-align:right;}
    .reply .panel-group {
        clear: both;
        margin-bottom: 20px;
        position: relative;
    }
    .reply .panel-group .panel:first-child {
        margin: 0;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .reply .panel-group .panel:first-child .img {
        overflow: hidden;
        position: relative;
        height: 160px;
        background-color: #ececec;
        color: #c0c0c0;
        text-align: center;
        line-height: 132px;
    }
    .reply .panel-group .panel-body .default {
        font-style: normal;
        font-size: 16px;
    }
    .reply .panel-group .panel:first-child .img span {
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        height: 28px;
        line-height: 28px;
        width: 100%;
        background: rgba(0,0,0,0.7);
        color: #fff;
        padding: 0 10px;
    }
    .reply .panel-group .panel+.panel {
        border-radius: 0;
        margin-top: 0;
        border-top: 0;
    }
    .reply .panel-group .panel+.panel .panel-body {
        height: 104px;
        padding-right: 105px;
        position: relative;
        overflow: hidden;
    }
    .reply .panel-group .panel+.panel .img {
        float: right;
        position: absolute;
        right: 15px;
        top: 12px;
        height: 80px;
        width: 80px;
        background-color: #ececec;
        color: #c0c0c0;
        line-height: 80px;
        text-align: center;
        overflow: hidden;
    }
    .reply .panel-group img {
        position: absolute;
        left: 0;
        top: 0;
        display: inline-block;
        width: 100%;
        height: 100%;
    }
    .reply .panel-group .panel+.panel .img img {
        max-width: 80px;
        max-height: 80px;
        vertical-align: middle;
        border: 0;
    }
    .reply .panel-group .panel:last-child {
        margin-bottom: 0px;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    .reply .panel-group .panel:last-child .panel-body {
        padding: 7px 15px 40px 15px;
        height: 20px;
    }
    .panel .btn-group {
        width: 100%;
    }
</style>

    <!--[if IE]>
	<script src='https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv-printshiv.min.js'></script><script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	< ![endif]-->
</head>
<body>
<div class="v-layout <?php if(!$second_menu_list): ?> nosubnav <?php endif; ?>">
    <div class="v-sidebar">
        <!--导航-->
        <div class="v-nav">
            <!--<a class="v-logo" href="/" title=""><img src="PLATFORM_STATIC/images/logo.png"></a>-->
            <ul class="v-nav-list">
                <?php if($nav_list): if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['data']['icon_class']=='icon-application-color' && !in_array($vo['data']['module_id'],$addons_sign_module)): ?>
                <li><a href="<?php echo __URL('PLATFORM_MAIN/'.$vo['data']['url']); ?>" class='item  <?php if($vo['data']['module_id'] == $headid): ?>active<?php endif; ?>' title=""><span class="icon-application-color"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>&nbsp;<?php echo $vo['data']['module_name']; ?></a></li>
                <?php else: ?>
                <li ><a href="<?php echo __URL('PLATFORM_MAIN/'.$vo['data']['url']); ?>" class='item <?php if($vo['data']['is_menu'] == 0): ?>hide<?php endif; if($vo['data']['module_id'] == $headid): ?> active <?php endif; ?>' title=""><i class="icon <?php if($vo['data']['icon_class']): ?><?php echo $vo['data']['icon_class']; else: ?> icon-home <?php endif; ?>"></i>&nbsp;<?php echo $vo['data']['module_name']; ?></a></li>
                 <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
        
        <?php if($second_menu_list): ?>
        <div class="v-subnav">

            <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(!in_array($vo['data']['module_id'],$addons_sign_module)): if(!(empty($vo['sub_menu']) || (($vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator ) && $vo['sub_menu']->isEmpty()))): ?>
            <ul class="v-subnav-list <?php if($vo['data']['module_id'] == $headid): ?>block<?php else: ?>hide<?php endif; ?>" id="menu_<?php echo $vo['data']['module_id']; ?>" >
            <?php if(is_array($vo['sub_menu']) || $vo['sub_menu'] instanceof \think\Collection || $vo['sub_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sub_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;if(!in_array($v1['module_id'],$addons_sign_module)): ?>
            <li>
                <a href="<?php echo __URL('PLATFORM_MAIN/'.$v1['url']); ?>"  <?php if(strtoupper($v1['method']) == strtoupper($action) || $v1['module_id'] == $pid): ?> class="item active"<?php else: ?> class="item"<?php endif; ?>> <?php echo $v1['module_name']; ?></a>
            </li>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php endif; ?>
        
    </div>
    
<?php if($no_menu == '1'): else: ?>
<div class="v-header">
        <div class="v-header-box">
            <?php if($second_menu['module_name']=='首页'): ?>
            <div class="v-header-title">
                <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                </span>
            </div>
            <?php else: ?>
            <div class="v-header-title">
                <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                 </span> 
                </div>
            <?php endif; ?>
            <div class="v-header-account">

                <div class="user-menu fs-12">



                    <div class="inline-block">
                        <a href="<?php echo __URL('PLATFORM_MAIN/index/preview'); ?>" class="previewIndex" target="_blank">预览</a>
                    </div>

                    <div class="inline-block newsTips shortcutBar">
                        <a href="javascript:void(0);" id="news-tips" class="dker clear-cache" style="position: relative">
                            <span><i class="icon icon-message3"></i></span> 
                            <span class="badge pa tip0"></span>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="news-tips">
                            <ul class="newsTips_ul">
                                <li class="no_count hide">暂无待办信息</li>
                                <li class="dai_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/order/orderlist'); ?>?order_status=1" class="flex flex-pack-justify"><div>待发货订单</div><div class="text-red tip2"></div></a></li>
                                <li class="after_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/order/afterorderlist'); ?>" class="flex flex-pack-justify"><div>售后订单</div><div class="text-red tip3"></div></a></li>
                                <li class="mail_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/Mail/mailList'); ?>" class="flex flex-pack-justify"><div>站内信</div><div class="text-red tip4"></div></a></li>
                                <li class="cms_count hide"><a href="<?php echo __URL('PLATFORM_MAIN/Mail/cmsList'); ?>" class="flex flex-pack-justify"><div>公告</div><div class="text-red tip5"></div></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="layout-user inline-block">
                        <div class="ivu-dropdown">
                            <div class="ivu-dropdown-rel">
                                <a href="javascript:void(0)" class="text-primary"><img src="/public/platform/images/index/22.png" class="avatar">
                                    <?php if($username): ?><?php echo $username; else: ?><?php echo $web_info['user_tel']; endif; ?>
                                    <span class="caret"></span>
                                </a>
                            </div>
                            <div class="dropdown-menu qqqq">
                                <div class="ivu-dropdown-menu user-dropdown">
                                    <div class="infos">
                                        <div class="row">
                                            <div class="col-md-3">
                                               <a class="avatar"><img src="/public/platform/images/index/22.png"></a>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="names"><?php if($username): ?><?php echo $username; else: ?><?php echo $web_info['user_tel']; endif; ?></p>
                                                <p class="names updateUser"><span id="updateUser"><?php if($web_info['title']): ?><?php echo $web_info['title']; else: ?>未设置公司名称<?php endif; ?></span> <a href="javascript:void(0);" class="text-primary" style="margin-left: 6px">修改</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="operations flex">
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Addonslist/incrementOrderList'); ?>" target="_blank"><i class="icon icon-order1 mr-10"></i>订购列表</a>
                                        <?php if($auth_status): ?>
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Auth/userlist'); ?>"><i class="icon icon-account3 mr-10"></i>子账号列表</a>
                                        <?php endif; ?>
                                        <a href="http://bbs.vslai.com.cn/plugin.php?id=workorder" target="_blank"><i class="icon icon-list mr-10"></i>工单管理</a>
                                        <a href="javascript:void(0);" class="updatePass"><i class="icon icon-password3 mr-10"></i>修改密码</a>
                                    </div>
                                    <div class="operations flex">
                                        <a href="javascript:void(0);" class="delcache"><i class="icon icon-clear mr-10"></i>清除缓存</a>
                                        <a href="<?php echo __URL('PLATFORM_MAIN/Login/logout'); ?>"><i class="icon icon-logout-l mr-10"></i>退出登录</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <div class="v-main">
        <div class="v-container">
            <?php if($second_menu['desc'] != ''): ?>
            <div class="alert alert-tips alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $second_menu['desc']; if($second_menu['jump'] != ''): ?>
                <a href="<?php echo $second_menu['jump']; ?>" class="alert-link" target="_blank">&nbsp;查看详情</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- page -->
            <ul class="nav nav-tabs v-nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#news" aria-controls="news" data-type="news" role="tab" data-toggle="tab" class="flex-auto-center material">图文</a></li>
                <li role="presentation"><a href="#image" aria-controls="image" data-type="image" role="tab" data-toggle="tab" class="flex-auto-center material">图片</a></li>
                <li role="presentation"><a href="#voice" aria-controls="voice" data-type="voice" role="tab" data-toggle="tab" class="flex-auto-center material">语音</a></li>
                <li role="presentation"><a href="#video" aria-controls="video" data-type="video" role="tab" data-toggle="tab" class="flex-auto-center material">视频</a></li>
                <!--<li role="presentation"><a href="#text" aria-controls="text" data-type="text" role="tab" id="add_text" data-toggle="tab" class="flex-auto-center">文本</a></li>-->
            </ul>
            <div class="flex mb-10 PAmaterial" id="mat_type1">
                <a href="javascript:void(0)"; class="btn btn-primary uploadMaterial">同步微信素材</a>
            </div>
            <!--<div class="flex mb-10 PAmaterial" id="mat_type2" style="display: none">-->
                <!--<a href="javascript:void(0)"; class="btn btn-primary addText">添加文本消息</a>-->
            <!--</div>-->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="news">
                    <div class="panel panel-default clearfix">
                        <div class="panel-body">
                            <div class="reply"  style="position: relative" id="list">

                            </div>
                        </div>
                        <nav aria-label="Page navigation" class="clearfix">
                            <ul id="page" class="pagination pull-right"></ul>
                        </nav>
                    </div>
                </div>
                <div class="tab-pane fade" id="image">
                    <div class="panel panel-default clearfix">
                        <div class="panel-body" id="list1">

                        </div>
                    </div>
                    <nav aria-label="Page navigation" class="clearfix">
                        <ul id="page1" class="pagination pull-right"></ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="voice">

                    <div class="panel panel-default">
                        <div class="panel-body" id="list2">

                        </div>
                    </div>
                    <nav aria-label="Page navigation" class="clearfix">
                        <ul id="page2" class="pagination pull-right"></ul>
                    </nav>

                </div>
                <div class="tab-pane fade" id="video">

                    <div class="panel panel-default">
                        <div class="panel-body" id="list3">

                        </div>
                    </div>
                    <nav aria-label="Page navigation" class="clearfix">
                        <ul id="page3" class="pagination pull-right"></ul>
                    </nav>
                </div>
                <!--<div class="tab-pane fade" id="text">-->

                    <!--<div class="panel panel-default">-->
                        <!--<div class="panel-body" id="list4">-->

                        <!--</div>-->
                    <!--</div>-->
                    <!--<nav aria-label="Page navigation" class="clearfix">-->
                        <!--<ul id="page4" class="pagination pull-right"></ul>-->
                    <!--</nav>-->
                <!--</div>-->
            </div>
            <!-- page end -->
<input type="hidden" id="mater_type" value="news">
<input type="hidden" id="page_index1" value="">
<input type="hidden" id="page_index2" value="">
<input type="hidden" id="page_index3" value="">
<input type="hidden" id="page_index4" value="">
<input type="hidden" id="page_index5" value="">
<div id="saveTips" style="display: none">
    <div class="saving"></div>
    <div class="saveing-box">
        <div><img src="/public/platform/images/loading.svg" alt="" style="width: 80px;height: 80px"></div>
        <p>同步微信公众号平台素材中</p>
    </div>
</div>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'],function(util){
        $("#add_text").on('click',function(){
            $("#mat_type1").hide();
            $("#mat_type2").show();
        });
        $(".material").on('click',function(){
            $("#mat_type1").show();
            $("#mat_type2").hide();
        });
        util.initPage(getList,"page");
        util.initPage(getList1,"page1");
        util.initPage(getList2,"page2");
        util.initPage(getList3,"page3");
        // util.initPage(getList4,"page4");
        function getList(page_index){
            $("#page_index1").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/wchat/materialManagement'); ?>",
                async : true,
                data : {
                    "page_index" : page_index,"type":'news'
                },
                success : function(data) {
                       var html = '';
                        if (data["data"].length > 0) {
                            for (var i = 0; i < data["data"].length; i++) {
                                if (data["data"][i]['items']['data'].length != 0) {
                                    html += '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 water">';
                                    html += '<div class="panel-group">';
                                    for (var j = 0; j < data["data"][i]['items']['data'].length; j++) {
                                            if (j == 0) {
                                                html += '<div class="panel panel-default">';
                                                html += '<div class="panel-body">';
                                                html += '<div class="img">';
                                                html += '<i class="default"></i>';
                                                html += '<a href="' + data['data'][i]['items']['data'][j]['url'] + '" target="_blank"><img src="' + data["data"][i]['items']['data'][j]['thumb_url'] + '"></a>';
                                                html += '<span class="text-left">' + data['data'][i]['items']['data'][j]['title'] + '</span>';
                                                html += '</div></div></div>';
                                            } else {
                                                html += '<div class="panel panel-default">';
                                                html += '<div class="panel-body">';
                                                html += '<a href="' + data['data'][i]['items']['data'][j]['url'] + '" target="_blank">';
                                                html += '<div class="text">';
                                                html += '<h4>' + data['data'][i]['items']['data'][j]['title'] + '</h4>';
                                                html += '</div>';
                                                html += '<div class="img">';
                                                html += '<img src="' + data["data"][i]['items']['data'][j]['thumb_url'] + '">';
                                                html += '<i class="default">缩略图</i>';
                                                html += '</div>';
                                                html += '</a>';
                                                html += '</div>';
                                                html += '</div>';
                                            }
                                    }
                                    html += '<div class="panel panel-default">';
                                    html += '<div class="panel-body" style="height:20px; padding-bottom:40px; padding-top:7px">';
                                    html += '<div class="btn-group">';
                                    html += '<a href="javascript:;" class="btn btn-default btn-sm btn-send" data-mediaid="' + data["data"][i]['media_id'] + '" data-type="news">群发</a>';
                                    html += '<a href="javascript:;" class="btn btn-default btn-sm btn-view" data-mediaid="' + data["data"][i]['media_id'] + '" data-type="news">预览</a>';
                                    html += '<a href="javascript:;" class="btn btn-default btn-sm btn-del" data-id="' + data["data"][i]['id'] + '" data-type="news">删除</a>';
                                    html += '</div></div></div>';
                                    html += '</div>';
                                    html += '</div>';
                                }
                            }
                        }else{
                        html += '<div class="flex-auto-center h-300 empty-box">暂无微信素材，可以点击同步微信素材</div>';
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                        $("#list").html(html);
                    }
                });
        }
        function getList1(page_index){
            $("#page_index2").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/wchat/materialManagement'); ?>",
                async : true,
                data : {
                    "page_index" : page_index,"type":'image'
                },
                success : function(data) {

                    var html = '';
                    if (data["data"].length > 0) {
                            for (var i = 0; i < data["data"].length; i++) {
                                html += '<div class="col-md-3">';
                                html += '<div class="panel panel-default panel-image">';
                                html += '<div class="panel-body">';
                                html += '<div class="content">';
                                html += '<img src="'+data["data"][i]['attachment']+'" width="100%" height="160" alt="'+data["data"][i]['filename']+'">';
                                html += '<span>'+data["data"][i]['filename']+'</span>';
                                html += '</div>';
                                html += '<div class="btn-group">';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-send" data-mediaid="'+data["data"][i]['media_id']+'" data-type="image">群发</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-view" data-mediaid="'+data["data"][i]['media_id']+'" data-type="image">预览</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-del" data-id="'+data["data"][i]['id']+'" data-type="image">删除</a>';
                                html += '</div></div></div></div>';
                            }
                        }else{
                        html += '<div class="flex-auto-center h-300 empty-box">暂无微信素材，可以点击同步微信素材</div>';
                    }
                    $('#page1').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list1").html(html);
                }
            });
        }
        function getList2(page_index){
            $("#page_index3").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/wchat/materialManagement'); ?>",
                async : true,
                data : {
                    "page_index" : page_index,"type":'voice'
                },
                success : function(data) {
                        var html = '';
                        if (data["data"].length > 0) {
                            for (var i = 0; i < data["data"].length; i++) {
                                html += '<div class="col-md-3">';
                                html += '<div class="panel panel-default panel-voice">';
                                html += '<div class="panel-body">';
                                html += '<div class="audio-msg">';
                                html += '<div class="icon audio-player-play" data-attach="'+data["data"][i]['attachment']+'"><span><i class="fa fa-play"></i></span></div>';
                                html += '<div class="audio-content">';
                                html += '<div class="audio-title">'+data["data"][i]['filename']+'</div>';
                                html += '<div class="audio-date text-muted">创建于：'+data["data"][i]['createtime']+'</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="btn-group">';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-send" data-mediaid="'+data["data"][i]['media_id']+'" data-type="voice">群发</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-view" data-mediaid="'+data["data"][i]['media_id']+'" data-type="voice">预览</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-del" data-id="'+data["data"][i]['id']+'" data-type="voice">删除</a>';
                                html += '</div></div></div></div>';
                            }
                        }else{
                            html += '<div class="flex-auto-center h-300 empty-box">暂无微信素材，可以点击同步微信素材</div>';
                        }
                        $('#page2').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                        $("#list2").html(html);
                }
            });
        }
        function getList3(page_index){
            $("#page_index4").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/wchat/materialManagement'); ?>",
                async : true,
                data : {
                    "page_index" : page_index,"type":'video'
                },
                success : function(data) {
                        var html = '';
                        if (data["data"].length > 0) {
                            for (var i = 0; i < data["data"].length; i++) {
                                html += '<div class="col-md-3">';
                                html += ' <div class="panel panel-default panel-video">';
                                html += '<div class="panel-body">';
                                html += '<div class="video-content">';
                                html += '<h4 class="title text-muted">'+data["data"][i]['tag']['title']+'</h4>';
                                html += '<div class="date text-muted">创建于：'+data["data"][i]['createtime']+'</div>';
                                html += '<div class="video">';
                                html += '<img src="PLATFORM_STATIC//images/banner-bg.png" alt="" />';
                                html += '</div>';
                                html += ' <div class="abstract text-muted" style="overflow:hidden">'+data["data"][i]['tag']['description']+'</div></div>';
                                html += '<div class="btn-group">';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-send" data-mediaid="'+data["data"][i]['media_id']+'" data-type="video">群发</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-view" data-mediaid="'+data["data"][i]['media_id']+'" data-type="video">预览</a>';
                                html += '<a href="javascript:;" class="btn btn-default btn-sm btn-del" data-id="'+data["data"][i]['id']+'" data-type="video">删除</a>';
                                html += '</div></div></div></div>';
                            }
                        }else{
                            html += '<div class="flex-auto-center h-300 empty-box">暂无微信素材，可以点击同步微信素材</div>';
                        }
                        $('#page3').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                        $("#list3").html(html);
                }
            });
        }
        // function getList4(page_index){
        //     $("#page_index5").val(page_index);
        //     $.ajax({
        //         type : "post",
        //         url : "<?php echo __URL('PLATFORM_MAIN/wchat/materialManagements'); ?>",
        //         async : true,
        //         data : {
        //             "page_index" : page_index,"type":'text'
        //         },
        //         success : function(data) {
        //
        //             var html = '';
        //             if (data["data"].length > 0) {
        //                 for (var i = 0; i < data["data"].length; i++) {
        //                     html += '<div class="col-md-3">';
        //                     html += '<div class="panel panel-default panel-image">';
        //                     html += '<div class="panel-body">';
        //                     html += '<div class="content">'+data["data"][i]['attachment']+'</div>';
        //                     html += '<div class="btn-group">';
        //                     html += '<a href="javascript:;" class="btn btn-default btn-sm btn-views" data-mediaid="'+data["data"][i]['id']+'" data-type="text"  >修改</a>';
        //                     html += '<a href="javascript:;" class="btn btn-default btn-sm btn-dels" data-id="'+data["data"][i]['id']+'" data-type="text">删除</a>';
        //                     html += '</div></div></div></div>';
        //                 }
        //             }else{
        //                 html += '<div class="flex-auto-center h-300 empty-box">暂无文本消息</div>';
        //             }
        //             $('#page4').paginator('option', {
        //                 totalCounts: data['total_count']  // 动态修改总数
        //             });
        //             $("#list4").html(html);
        //         }
        //     });
        // }
        $('.nav-tabs a').on('click',function(){
            var type = $(this).data('type');
            $("#mater_type").val(type)
        })
        /**
         * 预览
         */
        $('body').on('click','.btn-view',function(){
                var url = __URL('PLATFORM_MAIN/wchat/purview');
                var id = $(this).data('mediaid');
                var type = $(this).data('type');
                util.confirm('预览', 'url:'+url,function(){
                    var  wxname = this.$content.find('#wxname').val();
                    if(wxname==''){
                        util.message('微信号不能为空','danger');
                        return false;
                    }
                    $.ajax({
                        url: __URL(PLATFORMMAIN + "/Wchat/purview"),
                        type: "post",
                        data: {  "media_id": id,"type":type, "wxname": wxname},
                        success: function (data) {
                            if (data["errcode"]  == 0) {
                                if(type=='news'){
                                    util.message('发送成功','success',getList($("#page_index1").val()));
                                }
                                if(type=='image'){
                                    util.message('发送成功','success',getList1($("#page_index2").val()));
                                }
                                if(type=='voice'){
                                    util.message('发送成功','success',getList2($("#page_index3").val()));
                                }
                                if(type=='video') {
                                    util.message('发送成功', 'success', getList3($("#page_index4").val()));
                                }
                            } else {
                                util.message(data["errmsg"],'danger');
                            }
                        }
                    })
                })
            })
        /**
         * 群发
         */
        $('body').on('click','.btn-send',function(){
            var url = __URL('PLATFORM_MAIN/Wchat/groupList');
            var id = $(this).data('mediaid');
            var type = $(this).data('type');
            util.confirm('选择分组', 'url:'+url,function(){
                var  group_id = this.$content.find('#select_group_id').val();
                var  group_from = this.$content.find('#select_group_from').val();
                $.ajax({
                    url: __URL(PLATFORMMAIN + "/Wchat/sendAll"),
                    type: "post",
                    data: { "media_id": id, "groupid": group_id ,"group_from":group_from},
                    success: function (data) {
                        if (data["errcode"]  == 0) {
                            if(type=='news'){
                                util.message('发送成功','success',getList($("#page_index1").val()));
                            }
                            if(type=='image'){
                                util.message('发送成功','success',getList1($("#page_index2").val()));
                            }
                            if(type=='voice'){
                                util.message('发送成功','success',getList2($("#page_index3").val()));
                            }
                            if(type=='video') {
                                util.message('发送成功', 'success', getList3($("#page_index4").val()));
                            }
                        } else {
                            util.message(data["errmsg"],'danger');
                        }
                    }
                })
            })
        })
        // 删除
        $('body').on('click','.btn-del',function(){
                var id = $(this).data('id');
                var type = $(this).data('type');
                util.alert('确定删除？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo __URL('PLATFORM_MAIN/wchat/deleteWeixinMedia'); ?>",
                        async : true,
                        data : {
                            "media_id" : id,"type":type
                        },
                        success : function(data) {
                            if (data["code"] > 0) {
                                if(type=='news'){
                                    util.message('删除成功','success',getList($("#page_index1").val()));
                                }
                                if(type=='image'){
                                    util.message('删除成功','success',getList1($("#page_index2").val()));
                                }
                                if(type=='voice'){
                                    util.message('删除成功','success',getList2($("#page_index3").val()));
                                }
                                if(type=='video'){
                                    util.message('删除成功','success',getList3($("#page_index4").val()));
                                }
                            }else{
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                })
            })

        //同步
        $('.uploadMaterial').on('click',function(){
           var type = $("#mater_type").val();
            var page_index = 1;
            if(type=='news'){
                  page_index = $("#page_index1").val();
            }
            if(type=='image'){
                  page_index =  $("#page_index2").val();
            }
            if(type=='voice'){
                  page_index = $("#page_index3").val();
            }
            if(type=='video'){
                  page_index = $("#page_index4").val();
            }
            $(this).attr({disabled: "disabled"}).html('获取中...');
            $('#saveTips').show();
            $.ajax({
                type: "post",
                url: __URL(PLATFORMMAIN + "/wchat/getMaterial"),
                async: true,
                data: {
                    "type":type,'page_index':page_index
                },
                success: function (data) {
                    if (data["fail"]['message'] && data["fail"]['code']!=3) {
                        if(type=='image'){
                            util.message(data["fail"]['message'],'danger',getList1(page_index));
                        }else if(type=='voice'){
                            util.message(data["fail"]['message'],'danger',getList2(page_index));
                        }else if(type=='video'){
                            util.message(data["fail"]['message'],'danger',getList3(page_index));
                        }else{
                            util.message(data["fail"]['message'],'danger')
                        }
                    }else if(data["fail"]['message'] && data["fail"]['code']==3){
                        $('#saveTips').hide();
                        $('.uploadMaterial').removeAttr('disabled').html('同步微信素材');
                        util.message(data["fail"]['message'],'success');
                    }else{
                        $('#saveTips').hide();
                        $('.uploadMaterial').removeAttr('disabled').html('同步微信素材');
                        if(type=='news'){
                            util.message('同步素材成功','success',getList(page_index));
                        }
                        if(type=='image'){
                            util.message('同步素材成功','success',getList1(page_index));
                        }
                        if(type=='voice'){
                            util.message('同步素材成功','success',getList2(page_index));
                        }
                        if(type=='video'){
                            util.message('同步素材成功','success',getList3(page_index));
                        }
                    }
                }
            })
        });
        //添加文本
        // $('body').on('click','.addText',function(){
        //     var html = '<form class="form-horizontal padding-15" id="">';
        //     html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>文本内容：</label><div class="col-md-8"><textarea  class="form-control" id="content_text"></textarea></div></div>';
        //     html += '<div class="form-group"><label class="col-md-3 control-label">表情Emoji：</label><div class="col-md-8"><a class="select_emoji btn btn-primary search">选择表情</a></div></div>';
        //     html += '</form>';
        //     util.confirm('添加文本',html,function(){
        //         var content = this.$content.find('#content_text').val();
        //         if(content==''){
        //             util.message('请填写文本内容','danger');
        //             this.$content.find('#content_text').focus();
        //             return false;
        //         }
        //         $.ajax({
        //             type : "post",
        //             url : "<?php echo __URL('PLATFORM_MAIN/wchat/addText'); ?>",
        //             async : true,
        //             data : {
        //                 "content" : content
        //             },
        //             success : function(data) {
        //                 if (data["code"] > 0) {
        //                     util.message('添加成功','success',getList4());
        //
        //                 }else{
        //                     util.message(data["message"],'danger');
        //                 }
        //             }
        //         });
        //     })
        // })
        //修改文本
        // $('body').on('click','.btn-views',function() {
        //     var id = $(this).data('mediaid');
        //     var html = '<form class="form-horizontal padding-15" id="">';
        //     html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>文本内容：</label><div class="col-md-8"><textarea  class="form-control" id="content_text"></textarea></div></div>';
        //     html += '<div class="form-group"><label class="col-md-3 control-label">表情Emoji：</label><div class="col-md-8"><a class="select_emoji btn btn-primary search">选择表情</a></div></div>';
        //     html += '</form>';
        //     $.ajax({
        //         type: "post",
        //         url: "<?php echo __URL('PLATFORM_MAIN/wchat/getText'); ?>",
        //         async: true,
        //         data: {
        //             "id": id
        //         },
        //         success: function (data) {
        //             $("#content_text").val(data.attachment);
        //         }
        //     });
        //     util.confirm('修改文本', html, function () {
        //         $.ajax({
        //             type: "post",
        //             url: "<?php echo __URL('PLATFORM_MAIN/wchat/updateText'); ?>",
        //             async: true,
        //             data: {
        //                 "id": id,
        //                 "content":$("#content_text").val()
        //             },
        //             success: function (data) {
        //                 if (data["code"] > 0) {
        //                     util.message('修改成功', 'success', getList4($("#page_index5").val()));
        //                 } else {
        //                     util.message(data["message"], 'danger');
        //                 }
        //             }
        //         });
        //     })
        // });
        //删除文本
        // $('body').on('click','.btn-dels',function(){
        //     var id = $(this).data('id');
        //     util.alert('确定删除？',function(){
        //         $.ajax({
        //             type : "post",
        //             url : "<?php echo __URL('PLATFORM_MAIN/wchat/delText'); ?>",
        //             async : true,
        //             data : {
        //                 "id" : id
        //             },
        //             success : function(data) {
        //                 if (data["code"] > 0) {
        //                     util.message('删除成功','success',getList4($("#page_index5").val()));
        //
        //                 }else{
        //                     util.message(data["message"],'danger');
        //                 }
        //             }
        //         });
        //     })
        // })
        //选择表情
        // $('body').on('click','.select_emoji',function(){
        //     var em=$("#content_text").val();
        //     util.emojiDialog(function(data){
        //         $("#content_text").val(em+data.emoji);
        //     })
        // })
    })
</script>

    <script>
        require(['util','kefu'],function(util,kefu){
          // ie浏览器判断
            function isIE() {
                if (!!window.ActiveXObject || "ActiveXObject" in window){
                    location.href=__URL(PLATFORMMAIN+'/login/versionLow');
                }else{
                    
                }
            }
            isIE();

            $(".newsTips").hover(function(){
                $(this).addClass("open");
            },function(){
                $(this).removeClass("open");
            });


            // 修改密码
            $('.updatePass').on('click',function(){
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>原密码</label><div class="col-md-8"><input type="password" id="pass" class="form-control"  /></div></div>';
                    html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>新密码</label><div class="col-md-8"><input type="password" id="pass_new" class="form-control"  /></div></div>';
                    html +='<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>确认密码</label><div class="col-md-8"><input type="password" id="pass_new_real" class="form-control"  /></div></div>';
                    html += '</form>';
                    util.confirm('修改密码',html,function(){
                        var pass = this.$content.find('#pass').val();
                        var pass_new = this.$content.find('#pass_new').val();
                        var pass_new_real = this.$content.find('#pass_new_real').val();
                        if(pass==''){
                            util.message('原密码不能为空','danger');
                            this.$content.find('#pass').focus();
                            return false;
                        }
                        if(pass_new==''){
                            util.message('新密码不能为空','danger');
                            this.$content.find('#pass_new').focus();
                            return false;
                        }
                        if(pass_new_real==''){
                            util.message('确认密码不能为空','danger');
                            this.$content.find('#pass_new_real').focus();
                            return false;
                        }
                        if(pass_new!=pass_new_real){
                            util.message('新密码和确认密码不一致','danger');
                            this.$content.find('#pass_new_real').focus();
                            return false;
                        }
                        $.ajax({
                            type : "post",
                            url : "<?php echo __URL('PLATFORM_MAIN/Auth/resetUserPassword'); ?>",
                            data : {
                                "pass" : pass,
                                "pass_new" : pass_new
                            },
                            success : function(data) {
                                if (data["code"] > 0) {
                                    util.message(data["message"],'success');
                                }else{
                                    util.message(data["message"],'danger');
                                }
                            }
                        });
                    })
                })
            // 个人信息
            $('.updateUser').on('click',function(){
                var html = '<form class="form-horizontal padding-15" id="">';
                if("<?php echo $user_info['is_system']; ?>" == "1"){
                    html += '<div class="form-group"><label class="col-md-3 control-label">公司名称</label><div class="col-md-8"><input type="text" id="user_name" class="form-control" value="<?php echo $web_info['title']; ?>" /></div></div>';
                }else{
                    html += '<div class="form-group"><label class="col-md-3 control-label">公司名称</label><div class="col-md-8"><?php echo $web_info['title']; ?></div></div>';
                }
                html += '</form>';
                util.confirm('账号信息',html,function(){
                        var user_name = this.$content.find('#user_name').val();
                        if(user_name==''){
                            util.message('公司名称不能为空','danger');
                            this.$content.find('#user_name').focus();
                            return false;
                        }
                        $.ajax({
                            type : "post",
                            url : "<?php echo __URL('PLATFORM_MAIN/Auth/modifyUserName'); ?>",
                            data : {
                                "user_name" : user_name
                            },
                            success : function(data) {
                                if (data["code"] > 0) {
                                    $('#updateUser').html(user_name);
                                    util.message(data["message"],'success');
                                }else{
                                    util.message(data["message"],'danger');
                                }
                            }
                        });
                })
            })
            $('.delcache').click(function (e) {
                $.ajax({
                    url : __URL(PLATFORMMAIN+"/System/deleteCache"),
                    type : "post",
                    data : {},
                    success : function(data) {
                        if (data) {
                            util.message('缓存更新成功', 'success',location.reload());
                        } else {
                            util.message('缓存更新失败', 'danger');
                        }
                    }
                });
            })
        })
        function loading(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/index/tipCount'); ?>",
                async: true,
                success: function (data) {
                    var total_tips=data['total_tips']>100?"99+":data['total_tips'];
                    $(".tip0").html(total_tips);
                    if(data['total_tips']>0){
                        $(".no_count").addClass('hide');
                    }else{
                        $(".no_count").removeClass('hide');
                    }
                    if(data['daifahuo']>0){
                        $(".dai_count").removeClass('hide');
                        $(".tip2").html(data['daifahuo']);
                    }
                    if(data['tuikuanzhong']>0){
                        $(".after_count").removeClass('hide');
                        $(".tip3").html(data['tuikuanzhong']);
                    }
                    if(data['unread']>0){
                        $(".mail_count").removeClass('hide');
                        $(".tip4").html(data['unread']);
                    }
                    if(data['uncms']){
                        $(".cms_count").removeClass('hide');
                        $(".tip5").html(data['uncms']);
                    }
                }
            });
        }
        loading();
    </script>
    

</body>
</html>
