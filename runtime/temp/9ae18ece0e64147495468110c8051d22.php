<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"template/platform/System/accountSystem.html";i:1583811744;s:31:"template/platform/new_base.html";i:1587970146;s:44:"template/platform/controlCommonVariable.html";i:1583811744;s:31:"template/platform/urlModel.html";i:1583811744;}*/ ?>
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
<!--账号体系模板-->
<div class="editor1-main-tips mt-10 mb-20" style="min-height: 0">
	<p class="mb-10">会员登录不同渠道商城时，根据账号体系判断会员身份是否为同一会员或新会员。</p>
	<p class="text-red">账号体系与商城今后发展密切相关，设置后不可更改，请谨慎设置。</p>
</div>
<form class="form-horizontal form-validate">
<div class="account-system">
	<div class="as-box flex mb-20">
		<div class="as-box-item" data-account_type='1'>
			<div class="sel-pic"></div>
			<div class="as-title">
				<img src="/public/platform/images/accountSystem/as1.png" alt="" class="as-title-img">
				<div class="fs-14">全渠道同一账号体系</div>
				<div class="fs-14">（手机号）</div>
			</div>
			<p class="mb-10 mh-56">以手机号码为主账号，可支持一个账号登录公众号、小程序、H5、APP、PC等所有不同渠道的商城。</p>
			<ul class="nav nav-tabs v-nav-tabs as-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" class="flex-auto-center">优点</a></li>
				<li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" class="flex-auto-center">缺点</a></li>
				<li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" class="flex-auto-center">准备工作</a></li>
			</ul>
			<div class="tab-content pt-10">
				<div role="tabpanel" class="tab-pane fade in active" id="tab1">该账号体系可支持多端、商家只需要配置短信即可，搭建成本低。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab2">前端会员体验差，在使用支持微信联合登录下的端口（公众号、小程序、APP、PC）<span class="text-orange">各端均需要</span>绑定一次手机号码账号数据才能互通。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab3">开启并配置 <a href="javascript:void(0);" class="text-primary" target="_blank">短信</a> 功能。</div>
			</div>
		</div>

		<div class="as-box-item" data-account_type='2'><!--unSel 为不能选中-->
			<div class="sel-pic"></div>
			<div class="as-title">
				<img src="/public/platform/images/accountSystem/as2.png" alt="" class="as-title-img">
				<div class="fs-14">全渠道同一账号体系</div>
				<div class="fs-14">
					（手机号 + 微信开放平台）<div class="v-tooltip inline-block">
						<span class="tips-box"><i class="icon icon-index-guide"></i></span>
						<div class="v-tooltip-box">
							<div class="v-tooltip-box-arrow">
								微信开放平台需要每年给腾讯300元年费。
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="mb-10 mh-56">以微信账号与手机号码组成的账号，可支持一个账号登录公众号、小程序、H5、APP、PC等所有不同渠道的商城。<span class="text-orange">多端商城推荐使用</span>。</p>
			<ul class="nav nav-tabs v-nav-tabs as-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab" class="flex-auto-center">优点</a></li>
				<li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab" class="flex-auto-center">缺点</a></li>
				<li role="presentation"><a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab" class="flex-auto-center">准备工作</a></li>
			</ul>
			<div class="tab-content pt-10">
				<div role="tabpanel" class="tab-pane fade in active" id="tab4">前端会员体验较好，在使用支持微信联合登录下的端口（公众号、小程序、APP、PC）<span class="text-orange">只需要在任意一端</span>绑定一次手机号码账号数据即可互通。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab5">除了需要配置 <a href="javascript:void(0);" class="text-primary" target="_blank">短信</a> 之外还要申请 <a href="javascript:void(0);" class="text-primary" target="_blank">微信开放平台</a> 账号。最后根据商城使用的端口把相关信息填写至开放平台（例：关联公众号、关联小程序、添加APP应用、添加网站应用）。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab6">申请 <a href="javascript:void(0);" class="text-primary" target="_blank">微信开放平台</a> 并关联需要微信联合登录端口的应用（例：关联公众号、关联小程序、添加APP应用、添加网站应用），并开启配置 <a href="javascript:void(0);" class="text-primary" target="_blank">短信</a>。</div>
			</div>
		</div>

		<div class="as-box-item" data-account_type='3'>
			<div class="sel-pic"></div>
			<div class="as-title">
				<img src="/public/platform/images/accountSystem/as3.png" alt="" class="as-title-img">
				<div class="fs-14">单一渠道账号体系</div>
				<div class="sel-pic"></div>
				<div class="switch-inline J-is_bind_phone hide">
					<p class="bind-phone">绑定手机</p>
					<p class="check-box">
						<input type="checkbox" id="is_bind_phone">
						<label for="is_bind_phone" class=""></label>
					</p>
				</div>
			</div>
			<p class="mb-10 mh-56">以微信账号或手机账号为主账号，一个微信账号在公众号、小程序、APP、PC等端口数据不互通，H5端只支持使用手机号码注册及登录。不推荐使用</p>
			<ul class="nav nav-tabs v-nav-tabs as-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab" class="flex-auto-center">优点</a></li>
				<li role="presentation"><a href="#tab8" aria-controls="tab8" role="tab" data-toggle="tab" class="flex-auto-center">缺点</a></li>
				<li role="presentation"><a href="#tab9" aria-controls="tab9" role="tab" data-toggle="tab" class="flex-auto-center">准备工作</a></li>
			</ul>
			<div class="tab-content pt-10">
				<div role="tabpanel" class="tab-pane fade in active" id="tab7">只做单渠道商城的商家搭建成本低，在微信、小程序端口可不开通短信功能。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab8">微信账号会员数据在各渠道商城中各不互通，无法合并。不适合做多渠道商城。</div>
				<div role="tabpanel" class="tab-pane fade" id="tab9">如只考虑做公众号、小程序端口的商家只需要对接好公众号或小程序即可，如需做H5、PC端、APP端则需要开启并配置 <a href="javascript:void(0);" class="text-primary" target="_blank">短信</a> 功能。</div>
			</div>
		</div>

	</div>
	<!-- 第一种账号体系 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius:5px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">提示</h4>
			</div>
			<div class="modal-body">
				<p class="padding-alert">当前选中 <span class="color-alert">全渠道同一账号体系（手机号）</span></p>
				<p class="padding-alert">1、<span class="color-alert">帐号体系一旦保存将无法更改，请为商城今后发展谨慎考虑。</span></p>
				<p class="padding-alert">2、请确定已开通并配置<span class="color-alert">短信</span>，否则商城前端将会有部分功能受限。</p>
				<p class="padding-alert"><input type="checkbox" name="select_account_type1" data-type="1" class="J-select-account">&nbsp;确认选择体系并已开通配置好相关功能</p>
			</div>
			<div class="modal-footer">
				<button  class="btn btn-primary J-account1" disabled type="submit">确定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
	<!-- 第二种账号体系 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content" style="border-radius:5px">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel2">提示</h4>
				</div>
				<div class="modal-body">
					<p class="padding-alert">当前选中 <span class="color-alert">全渠道同一账号体系（手机号 + 微信开放平台）</span></p>
					<p class="padding-alert">1、<span class="color-alert">帐号体系一旦保存将无法更改，请为商城今后发展谨慎考虑。</span></p>
					<p class="padding-alert">2、请确定已开通并配置<span class="color-alert">短信</span>，否则商城前端将会有部分功能受限。</p>
					<p class="padding-alert">3、请确定已开通并配置<span class="color-alert">微信开放平台</span>，否则微信联合登录信息无法得到同步。</p>
					<p class="padding-alert"><input type="checkbox" name="select_account_type2" data-type="2" class="J-select-account">&nbsp;确认选择体系并已开通配置好相关功能</p>
				</div>
				<div class="modal-footer">
					<button  class="btn btn-primary J-account2" disabled type="submit">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal -->
	</div>
	<!-- 第三种账号体系 -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content" style="border-radius:5px">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel3">提示</h4>
				</div>
				<div class="modal-body">
					<p class="padding-alert">当前选中 <span class="color-alert">单一渠道账号体系</span></p>
					<p class="padding-alert">1、<span class="color-alert">帐号体系一旦保存将无法更改，请为商城今后发展谨慎考虑。</span></p>
					<p class="padding-alert">2、当前体系不建议使用多渠道的商城，请谨慎考虑。</p>
					<p class="padding-alert">3、请确定已开通并配置<span class="color-alert">短信</span>，否则商城前端将会有部分功能受限。</p>
					<p><p class="padding-alert"><input type="checkbox" name="select_account_type3" data-type="3" class="J-select-account">&nbsp;确认选择体系并已开通配置好相关功能</p></p>
				</div>
				<div class="modal-footer">
					<button  class="btn btn-primary J-account3" disabled type="submit">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal -->
	</div>
	<div class="as-box flex">
		<button class="btn btn-primary hide add" type="button">保存</button>
		<!--<a href="javascript:void(0);" class="btn btn-primary">保存</a>-->
	</div>
</div>
</form>
<!--账号体系模板-->
<!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></div>
    </div>

</div>
    
<script>
	// 账号体系模板
	require(['util'], function (util) {
	    init();
		$('.as-box-item').on('click',function(){
			if(!$(this).hasClass('unSel')){
				$(this).addClass('sel').siblings().removeClass('sel');
			}

			if($(this).data('account_type') == 3 && $(this).hasClass('sel')){
                $('.J-is_bind_phone').removeClass('hide');
                $('.J-is_bind_phone').addClass('show');
			}else{
                if(!$(this).hasClass('unSel')){
                    $('.J-is_bind_phone').removeClass('show');
                    $('.J-is_bind_phone').addClass('hide');
				}
			}
			
		})
		$.each($('.as-box-item'), function(i, v){
            if($(this).hasClass('sel')){
                $('.J-is_bind_phone').removeClass('hide');
                $('.J-is_bind_phone').addClass('show');
            }
		})
		$('.J-select-account').change(function(){
		    var type = $(this).data('type');
		    if($(this).is(':checked')){
		        $('.J-account'+type).attr('disabled', false);
			}else{
                $('.J-account'+type).attr('disabled', true);
			}
		})
		//点击弹出类型提示框
		$('.add').click(function(){
			var height = window.innerHeight;
			var item_height = 200;
			var top = (height - item_height) / 2;
			if(top < 0){
			    top = 0;
			}
            var account_type = $('.sel').data('account_type');
            console.log('#myModal'+account_type);
            $('#myModal'+account_type).css('top', top+'px');
            $('#myModal'+account_type).modal('show');
		});
        util.validate($('.form-validate'),function(form){
            //获取到当前选中的框框类型
			var account_type = $('.sel').data('account_type');
			//如果现在是第三种，则获取是否设置了绑定手机
			if(account_type == 3){
                var is_bind_phone;
			    if($('#is_bind_phone').is(':checked')){
                    is_bind_phone = 1;
				}else{
                    is_bind_phone = 0;
				}
			}
			$.ajax({
				'url':"<?php echo __URL('PLATFORM_MAIN/system/saveAccountType'); ?>",
				'type':'post',
				'data':{'account_type':account_type, 'is_bind_phone':is_bind_phone},
				success:function(data){
				    if(data['code'] > 0){
                        util.message(data['message'], 'success', "<?php echo __URL('PLATFORM_MAIN/system/accountSystem'); ?>");
                        $('#myModal'+account_type).modal('hide');
					}else{
                        util.message(data['message'], 'danger');
					}
				}
			})
		})
		function init(){
		    $.ajax({
				'url':"<?php echo __URL('PLATFORM_MAIN/system/getAccountType'); ?>",
				'type':'post',
				'data':{},
				success:function(data){
				    var account_type = data.account_type;
				    var is_bind_phone = data.is_bind_phone;
				    if(account_type != 0){
                        $('.as-box-item').each(function(i,v){
                            if(account_type == $(v).data('account_type')){
                                $(v).addClass('sel');
                                if(account_type == 3){
                                    $('.J-is_bind_phone').removeClass('hide');
                                    $('.J-is_bind_phone').addClass('show');
                                    if(is_bind_phone != 0){
                                        $('#is_bind_phone').attr('checked', true);
                                    }
								}
                            }else{
                                $(v).removeClass('sel');
                                $(v).addClass('unSel');
                            }
                        })

					}else{
                        $('.add').removeClass('hide').addClass('show');
                        $('.as-box-item').eq(0).addClass('sel');
                    }
				}
			})
		}
		$('#is_bind_phone').change(function(){
            //获取到当前选中的框框类型
            var account_type = $('.sel').data('account_type');
            //如果现在是第三种，则获取是否设置了绑定手机
            if(account_type == 3){
                var is_bind_phone;
                if($('#is_bind_phone').is(':checked')){
                    is_bind_phone = 1;
                }else{
                    is_bind_phone = 0;
                }
            }
            $.ajax({
                'url':"<?php echo __URL('PLATFORM_MAIN/system/setBindPhone'); ?>",
                'type':'post',
                'data':{'is_bind_phone' : is_bind_phone},
                success:function(data){
                }
            })
		})
	})
	// 账号体系模板
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

