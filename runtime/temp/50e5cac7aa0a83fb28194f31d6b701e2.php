<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:35:"template/platform/Wchat/config.html";i:1591330114;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
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
               <!-- <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">-->
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                </span>
            </div>
            <?php else: ?>
            <div class="v-header-title">
                <!-- <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">-->
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
            
           <div class="part1" <?php if($wchat_config['appid']): ?>style="display: none"<?php endif; ?>>
                <table class="table table-bordered text-center mini-program-manage">
                    <tbody>
                    <tr>
                        <td style="width: 50%">
                            <div class="box">
                                <div class="qr">
                                    <div><i class="icon icon-public1" style="color: #00c700"></i></div>
                                </div>
                                <div>我已经注册公众号</div>
                                <div class="smule-word">需要已认证的服务号</div>
                                <div>
                                    <button class="btn btn-primary" id="authorize">立即授权</button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="box">
                                <div class="qr">
                                    <div><i class="icon icon-public2" style="color: #C2CFE0"></i></div>
                                </div>
                                <div>我还没有注册公众号</div>
                                <div class="smule-word"><a href="http://kf.qq.com/faq/120911VrYVrA151013MfYvYV.html" target="_blank" class="text-primary">不懂如何申请公众号？</a></div>
                                <div>
                                    <a class="btn btn-success" id="" href="https://mp.weixin.qq.com/cgi-bin/registermidpage?action=index&lang=zh_CN&token=" target="_blank">去微信公众平台申请</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="panel panel-default fs-12">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><span>授权说明:</span></div>
                    <div class="panel-body">
                        <p>1、 建议使用“<span class="text-red">已认证的服务号</span>”进行授权绑定。</p>
                        <p>2、开通“<span class="text-red">微信支付商户号</span>”才能使用微信支付交易</p>
                        <p>3、请认真填写对应信息，信息填写错误将直接影响微信登录及微信支付。</p>
                    </div>
                </div>
            </div>
                <!-- page -->
            <div class="part2" <?php if($wchat_config['appid']): ?>style="display: block"<?php else: ?>style="display: none"<?php endif; ?>>
                <form class="form-horizontal widthFixedForm">
                    <div class="form-heading">公众号开发信息</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">公众号名称</label>
                        <div class="col-md-8">
                           <p class="form-control-static"><?php echo $wchat_config['public_name']; ?> <a href="javascript:void(0);" class="text-primary ml10 editInfo">修改开发信息</a> <a href="javascript:void(0);" class="text-primary ml10 bindOther">绑定其他公众号</a></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">AppID</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $wchat_config['appid']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">AppSecret</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $wchat_config['appsecret']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">EncodingAESKey</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $wchat_config['encodingAESKey']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">IP白名单</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control resize_none" id="textarea1" readonly><?php echo $ip; ?></textarea>
                            <p class="help-block">复制“IP白名单”到公众号=>开发=>基本配置=>IP白名单</p>
                        </div>
                    </div>
                    <div class="form-heading">服务器配置信息</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">服务器地址（URL）</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="URL"  value="<?php echo $call_back_url1; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_back_url1; ?>">复制</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">令牌（Token）</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Token" name="empowerToken"  value="<?php if($wchat_config['token']): ?><?php echo $wchat_config['token']; endif; ?>" disabled>
                                <span class="input-group-btn">
                                     <a href="javascript:void(0);"  class="btn btn-default copy"  data-clipboard-text="<?php if($wchat_config['token']): ?><?php echo $wchat_config['token']; endif; ?>">复制</a>
                                    <!--<a href="javascript:void(0);" class="btn btn-default tokenGen ">生成token</a>-->
                                </span>
                            </div>
                            <p class="help-block">将以上服务器地址（URL）、令牌（Token）复制到公众号=>开发=>基本配置=>服务器配置，对应的输入框里</p>
                        </div>
                    </div>
                    <div class="form-heading">功能设置信息</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">业务域名</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <?php if($realm_ip): ?>
                                <input type="text" class="form-control" placeholder="业务域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                <?php else: ?>
                                <input type="text" class="form-control" placeholder="业务域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">JS接口安全域名</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <?php if($realm_ip): ?>
                                <input type="text" class="form-control" placeholder="JS接口安全域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                <?php else: ?>
                                <input type="text" class="form-control" placeholder="JS接口安全域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">网页授权域名</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <?php if($realm_ip): ?>
                                <input type="text" class="form-control" placeholder="网页授权域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                <?php else: ?>
                                <input type="text" class="form-control" placeholder="网页授权域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                <?php endif; ?>
                            </div>
                            <p class="help-block">将以上业务域名、JS接口安全域名、网页授权域名链接填入公众号设置=>功能设置，对应的输入框里。</p>
                        </div>
                    </div>

                    <!--<div class="form-heading">微信支付授权目录</div>-->
                    <!--<?php if($call_payback_url1): ?>-->
                    <!--<div class="form-group">-->
                        <!--<label class="col-md-2 control-label">支付授权目录</label>-->
                        <!--<div class="col-md-8">-->
                            <!--<div class="input-group">-->
                                <!--<input type="text" class="form-control" placeholder="支付授权目录" id="" value="<?php echo $call_payback_url1; ?>"  disabled>-->
                                <!--<span class="input-group-btn">-->
                                    <!--<a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_payback_url1; ?>">复制</a>-->
                                <!--</span>-->
                            <!--</div>-->
                            <!--<p class="help-block">将以上“支付授权目录”链接，粘贴到到商户平台 产品中心=>开发配置=>支付配置=>公众号支付=>添加支付授权目录里。</p>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<?php else: ?>-->
                    <!--<div class="form-group">-->
                        <!--<label class="col-md-2 control-label">支付授权目录</label>-->
                        <!--<div class="col-md-8">-->
                            <!--<div class="input-group">-->
                                <!--<input type="text" class="form-control" placeholder="支付授权目录" id="" value="<?php echo $call_payback_url2; ?>"  disabled>-->
                                <!--<span class="input-group-btn">-->
                                    <!--<a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_payback_url2; ?>">复制</a>-->
                                <!--</span>-->
                            <!--</div>-->
                            <!--<p class="help-block">将以上“支付授权目录”链接，粘贴到到商户平台 产品中心=>开发配置=>支付配置=>公众号支付=>添加支付授权目录里。</p>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<?php endif; ?>-->
                    <!--<div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-8">
                            <a class="btn btn-primary SAVE" type="submit">保存</a>
                        </div>
                    </div>-->
                </form>
                </div>

            <div class="part3" style="display: none">
                   <div class="stepItems">
                       <ul class="part3-steps">
                        <li class="part3-step current ">1 填写公众号信息</li>
                        <li class="part3-step">2 前往微信平台配置信息</li>
                       </ul>
                    </div>
                    <form class="form-horizontal widthFixedForm">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> 公众号名称</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="wxAccount_name" autocomplete="off" id="wxAccount_name" placeholder="请输入公众号名称">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> AppID</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="AppID" autocomplete="off" id="AppID" placeholder="请输入AppID">
                                <p class="help-block mb-0">请到微信公众号=>基本配置=>公众号开发信息=>开发者ID（AppID）获取。</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> AppSecret</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="AppSecret" autocomplete="off" id="AppSecret" placeholder="请输入APPSecret">
                                <p class="help-block mb-0">请到微信公众号=>基本配置=>公众号开发信息=>开发者密码（AppSecret）中获取。</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">粉丝同步</label>
                            <div class="col-md-8">
                                <label class="radio-inline">
                                    <input type="radio" name="synchronous" class="" value="1"> 开启
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="synchronous" class="" value="2"> 关闭
                                </label>
                                <div class="help-block mb-0">开启后，授权完成将会自动同步粉丝列表</div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-8">
                                <a href="javascript:void(0);"  class="btn btn-default mr-10 cancel_config">取消</a>
                                <a class="btn btn-primary part3_jump" type="submit">下一步</a>
                            </div>
                        </div>
                        <div class="panel panel-default fs-12">
                            <!-- Default panel contents -->
                            <div class="panel-heading"><span>授权说明:</span></div>
                            <div class="panel-body">
                                <p>1、登录微信公众平台，点击左侧菜单 开发=>基本配置。在公众号上复制开发者ID（AppID）、开发者密码（AppSecret）。</p>
                                <p>2、如果您未成为开放者，请勾选页面上的同意协议，再点击【成为开放者】按钮。点击查看详细文档</p>
                            </div>
                        </div>
                    </form>
                </div>

            <div class="part4" style="display: none" >
                   <div class="stepItems">
                       <ul class="part3-steps">
                        <li class="part3-step current ">1 填写公众号信息</li>
                        <li class="part3-step current">2 前往微信平台配置信息</li>
                       </ul>
                    </div>
                    <form class="form-horizontal widthFixedForm">
                        <div class="panel panel-default">
                          <div class="panel-heading"><span>第一步 登录微信公众平台 ，左侧菜单 开发 > 基本配置 ，配置IP白名单、URL、Token</span></div>
                          <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-2 control-label">IP白名单</label>
                            <div class="col-md-8">
                                <textarea type="text" class="form-control resize_none" readonly id="textarea2"><?php echo $ip; ?></textarea>
                                <p class="help-block">复制“IP白名单”到公众号=>开发=>基本配置=>IP白名单</p>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">服务器地址（URL）</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="URL" id="empowerUrl" value="<?php echo $call_back_url1; ?>"  disabled>
                                <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_back_url1; ?>">复制</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">令牌（Token）</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Token" name="empowerToken" id="empowerToken" value="" disabled>
                                <span class="input-group-btn">
                                     <a href="javascript:void(0);" id="clipboard-text" class="btn btn-default copy"  data-clipboard-text="">复制</a>
                                </span>
                            </div>
                            <p class="help-block">将以上服务器地址（URL）、令牌（Token）复制到公众号=>开发=>基本配置=>服务器配置，对应的输入框里</p>
                        </div>
                    </div>
                     <div class="form-group">
                         <label class="col-md-2 control-label"><span class="text-bright">*</span> EncodingAESKey</label>
                         <div class="col-md-8">
                             <input type="text" class="form-control" placeholder="请输入EncodingAESKey" id="encodingAESKey" >
                             <p class="help-block mb-0">在公众号=>开发=>基本配置=>服务器配置=>EncodingAESKey，点击“随机生成”。</p>
                         </div>
                     </div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="editor1-main-tips">
                                <p class="mb-10">第一步 登录<a href="https://mp.weixin.qq.com/" class="text-primary" target="_blank">微信公众平台</a>  ，左侧菜单 开发 => 基本配置 ，配置IP白名单、URL、Token</p>
                                <p class="mb-10">（1）若服务器配置未开启请点击右边绿色“启用”按钮开启，若已启用则点击右侧“修改配置”重新填写新的配置参数保存即可。</p>
                                <p class="mb-10">（2）在系统后台复制“IP白名单”，粘贴到公众号=>开发=>基本配置=>IP白名单里；</p>
                                <p class="mb-10">（3）请将系统后台以下URL、Token链接填入公众号=>开发=>基本配置=>服务器配置，对应的输入框里；</p>
                                <p class="mb-10">（4）在公众号=>开发=>基本配置=>服务器配置=>EncodingAESKey，点击“随机生成”；</p>
                                <p class="mb-10">（5）在公众号=>开发=>基本配置=>服务器配置=>消息加解密方式，请选择安全模式。</p>
                            </div>
                        </div>
                    </div>
                    <!--<div class="mt-10">
                        <img src="/public/platform/images/wxMenu/wxAccount1.png" alt="">
                    </div>
                    <div class="mt-10 mb-10">
                        <img src="/public/platform/images/wxMenu/wxAccount2.png" alt="">
                    </div>-->

                          </div>
                        </div>


                    <div class="panel panel-default">
                        <div class="panel-heading"><span>第二步 登录微信公众平台 ，左侧菜单 公众号设置 > 功能设置 ，配置业务域名、JS接口安全域名、网页授权域名</span></div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-2 control-label">业务域名</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <?php if($realm_ip): ?>
                                        <input type="text" class="form-control" placeholder="业务域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                        <?php else: ?>
                                        <input type="text" class="form-control" placeholder="业务域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">JS接口安全域名</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <?php if($realm_ip): ?>
                                        <input type="text" class="form-control" placeholder="JS接口安全域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                        <?php else: ?>
                                        <input type="text" class="form-control" placeholder="JS接口安全域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">网页授权域名</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <?php if($realm_ip): ?>
                                        <input type="text" class="form-control" placeholder="网页授权域名" id="" value="<?php echo $domain_name1; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name1; ?>">复制</a>
                                </span>
                                        <?php else: ?>
                                        <input type="text" class="form-control" placeholder="网页授权域名" id="" value="<?php echo $domain_name2; ?>"  disabled>
                                        <span class="input-group-btn">
                                    <a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $domain_name2; ?>">复制</a>
                                </span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="help-block">将以上业务域名、JS接口安全域名、网页授权域名链接填入公众号设置=>功能设置，对应的输入框里。</p>
                                </div>
                            </div>

                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="editor1-main-tips">
                                <p class="mb-10">第二步 登录<a href="https://mp.weixin.qq.com/" class="text-primary" target="_blank">微信公众平台</a>，点击左侧菜单 公众号设置 => 功能设置，配置业务域名、JS接口安全域名、网页授权域名。</p>
                                <p class="mb-10">请将以上内容填入业务域名、JS接口安全域名、网页授权域名链接对应的输入框里。</p>
                            </div>
                        </div>
                    </div>

                            <!--<div class="mt-10">
                                <img src="/public/platform/images/wxMenu/wxAccount3.png" alt="">
                            </div>
                            <div class="mt-10 mb-10">
                                <img src="/public/platform/images/wxMenu/wxAccount4.png" alt="">
                            </div>-->

                        </div>
                    </div>

                    <!--<div class="panel panel-default">-->
                        <!--<div class="panel-heading"><span>第三步 登录微信商户平台 ，顶部菜单 产品中心 > 开发配置 ，配置公众号支付授权目录</span></div>-->
                        <!--<div class="panel-body">-->

                            <!--<div class="form-group">-->
                                <!--<label class="col-md-2 control-label">支付授权目录</label>-->
                                <!--<div class="col-md-8">-->
                                    <!--<div class="input-group">-->
                                        <!--<?php if($call_payback_url1): ?>-->
                                        <!--<input type="text" class="form-control" placeholder="支付授权目录" id="" value="<?php echo $call_payback_url1; ?>"  disabled>-->
                                        <!--<span class="input-group-btn">-->
                                            <!--<a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_payback_url1; ?>">复制</a>-->
                                        <!--</span>-->
                                        <!--<?php else: ?>-->
                                        <!--<input type="text" class="form-control" placeholder="支付授权目录" id="" value="<?php echo $call_payback_url2; ?>"  disabled>-->
                                        <!--<span class="input-group-btn">-->
                                            <!--<a href="javascript:void(0);" class="btn btn-default copy" data-clipboard-text="<?php echo $call_payback_url2; ?>">复制</a>-->
                                        <!--</span>-->
                                        <!--<?php endif; ?>-->
                                    <!--</div>-->
                                    <!--<p class="help-block">将以上“支付授权目录”链接，粘贴到到商户平台 产品中心=>开发配置=>支付配置=>公众号支付=>添加支付授权目录里。</p>-->
                                <!--</div>-->
                            <!--</div>-->

                        <!--<div class="form-group">-->
                            <!--<div class="col-md-2"></div>-->
                            <!--<div class="col-md-8">-->
                                <!--<div class="editor1-main-tips">-->
                                    <!--<p class="mb-10">第三步 登录<a href="https://pay.weixin.qq.com/index.php/core/home/login?return_url=%2F" class="text-primary" target="_blank">微信商户平台</a>，点击上方 产品中心=>开放配置=>支付配置=>公众号支付，配置公众号授权目录。</p>-->
                                    <!--<p class="mb-10">在系统后台复制“支付授权目录”链接，粘贴到产品中心=>开放配置=>支付配置=>公众号支付=>添加支付授权目录里。</p>-->
                                    <!--<p class="mb-10">*电脑首次登录微信商户平台，需在 账户中心=>个人设置=>操作证书里，安装安全控件以及下载证书，才能进行操作。</p>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->

                            <!--&lt;!&ndash;<div class="mt-10">-->
                                <!--<img src="/public/platform/images/wxMenu/wxAccount5.png" alt="">-->
                            <!--</div>-->
                            <!--<div class="mt-10">-->
                                <!--<img src="/public/platform/images/wxMenu/wxAccount6.png" alt="">-->
                            <!--</div>&ndash;&gt;-->

                        <!--</div>-->
                    <!--</div>-->

                        <div class="form-group">
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-8">
                                <a href="javascript:void(0);"  class="btn btn-default mr-10 cancel_config">取消</a>
                                <a href="javascript:void(0);"  class="btn btn-default mr-10 part4-jump">上一步</a>
                                <a class="btn btn-primary SAVE" type="submit">保存</a>
                            </div>
                        </div>
                    </form>
                </div>

            <div class="part5" style="display: none">
                    <form class="form-horizontal widthFixedForm">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> 公众号名称</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="请输入公众号名称" id="wx_name1"  value="<?php echo $wchat_config['public_name']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> AppID</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="请输入AppID" id="appid1" value="<?php echo $wchat_config['appid']; ?>">
                                <p class="help-block mb-0">请到微信公众号=>基本配置=>公众号开发信息=>开发者ID（AppID）获取。</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> AppSecret</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="请输入APPSecret" id="appsecret1" value="<?php echo $wchat_config['appsecret']; ?>">
                                <p class="help-block mb-0">请到微信公众号=>基本配置=>公众号开发信息=>开发者密码（AppSecret）中获取。</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><span class="text-bright">*</span> EncodingAESKey</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="请输入EncodingAESKey" id="encodingAESKey1" value="<?php echo $wchat_config['encodingAESKey']; ?>">
                                <p class="help-block mb-0">请到微信公众号=>开发=>基本配置=>服务器配置=>EncodingAESKey，点击“随机生成”。</p>
                            </div>
                        </div>
                        <input type="hidden" id="token1" value="<?php echo $wchat_config['token']; ?>">
                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-8">
                            <a class="btn btn-default mr-10 cancel_config">取消</a>
                            <a class="btn btn-primary SAVE1" type="submit">保存</a>
                        </div>
                    </div>

                    </form>
                </div>
                <!-- page end -->
<div id="saveTips" style="display: none">
    <div class="saving"></div>
    <div class="saveing-box">
        <div><img src="/public/platform/images/loading.svg" alt="" style="width: 80px;height: 80px"></div>
        <p>公众号粉丝同步中</p>
    </div>
</div>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    $('.part3_jump').on('click',function(){
        if($('#wxAccount_name').val()==''){
            util.message('请输入公众号名称','danger');
            $('#wxAccount_name').focus();
            return false;
        }
        if($('#AppID').val()==''){
            util.message('请输入AppID','danger');
            $('#AppID').focus();
            return false;
        }
        if($('#AppSecret').val()==''){
            util.message('请输入AppSecret','danger');
            $('#AppSecret').focus();
            return false;
        }

        var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        var token = '';
        for(var i = 0; i < 32; i++) {
            var j = parseInt(Math.random() * (31 + 1));
            token += letters[j];
        }
        $(':text[name="empowerToken"]').val(token);
        $('#clipboard-text').attr('data-clipboard-text',token);
        var appid = $("#AppID").val();
        var wxAccount_name = $("#wxAccount_name").val();
        var appsecret = $("#AppSecret").val();
        var token = $("#empowerToken").val();
        $.ajax({
            type : "post",
            url :  "<?php echo __URL('PLATFORM_MAIN/wchat/setInstanceWchatConfig'); ?>",
            async : true,
            data : {
                "appid" : appid,
                "public_name" : wxAccount_name,
                "appsecret" : appsecret,
                "token":token,
            },
            success : function(data) {
                if (data["code"] > 0) {
                    $('.part1').hide();
                    $('.part2').hide();
                    $('.part3').hide();
                    $('.part4').show();
                    $('.part5').hide();
                }else{
                    util.message(data["message"],'danger');
                }
            }
        });
    })
    $('.SAVE').on('click',function(){
        var encodingAESKey = $("#encodingAESKey").val();
        if(encodingAESKey==''){
            util.message('请输入EncodingAESKey','danger');
            $('#encodingAESKey').focus();
            return false;
        }
        var synchronous = $('input[name="synchronous"]:checked').val();
        $.ajax({
            type : "post",
            url :  "<?php echo __URL('PLATFORM_MAIN/wchat/setInstanceWchatConfig'); ?>",
            async : true,
            data : {
                "encodingAESKey":encodingAESKey,
                "type":1,
            },
            success : function(data) {
                if (data["code"] > 0) {
                    if(synchronous==1){
                        $('#saveTips').show();
                        $.ajax({
                            type: "post",
                            url: __URL(PLATFORMMAIN + "/wchat/uploadFans"),
                            async: true,
                            success: function (data) {
                                if(data["code"] > 0){
                                    $('#saveTips').hide();
                                    util.message('保存成功','success',"<?php echo __URL('PLATFORM_MAIN/wchat/config'); ?>");
                                }else{
                                    util.message(data["message"],'danger');
                                }
                            }
                        })
                    }else{
                        util.message('保存成功','success',"<?php echo __URL('PLATFORM_MAIN/wchat/config'); ?>");
                    }
                }else{
                    util.message(data["message"],'danger');
                }
            }
        });
    })
    $('.SAVE1').on('click',function(){
        var appid = $("#appid1").val();
        var wxAccount_name = $("#wx_name1").val();
        var appsecret = $("#appsecret1").val();
        var token = $("#token1").val();
        var encodingAESKey = $("#encodingAESKey1").val();
        if(wxAccount_name == ""){
            util.message('请输入公众号名称','danger');
            $("#wx_name1").focus();
            return false;
        }
        if(appid == ""){
            util.message('请输入AppID','danger');
            $("#appid1").focus();
            return false;
        }
        if(appsecret == ""){
            util.message('请输入AppSecret','danger');
            $("#appsecret1").focus();
            return false;
        }
        if(encodingAESKey == ""){
            util.message('请输入EncodingAESKey','danger');
            $("#encodingAESKey1").focus();
            return false;
        }
        $.ajax({
            type : "post",
            url :  "<?php echo __URL('PLATFORM_MAIN/wchat/setInstanceWchatConfig'); ?>",
            async : true,
            data : {
                "appid" : appid,
                "token" : token,
                "public_name" : wxAccount_name,
                "appsecret" : appsecret,
                "encodingAESKey" : encodingAESKey,
            },
            success : function(data) {
                if (data["code"] > 0) {
                    util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/wchat/config'); ?>");
                }else{
                    util.message(data["message"],'danger');
                }
            }
        });
    })
    // $('.part3_jump').on('click',function(){
    //         var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    //         var token = '';
    //         for(var i = 0; i < 32; i++) {
    //             var j = parseInt(Math.random() * (31 + 1));
    //             token += letters[j];
    //         }
    //         $(':text[name="empowerToken"]').val(token);
    // });
    //上传文件
    // $('.J-btnwxup').on('click',function(){
    //     var wx_public = $("#wx_public").val();
    //     var path = "<?php echo __URL('PLATFORM_MAIN/upload/uploadTxt'); ?>"+'?wx_public='+wx_public;
    //     util.attachmentUpload(path,function (file_url) {
    //         if(file_url.state == '1'){
    //             $(".wx_public").val(file_url.filename)
    //             $("#wx_public").val(file_url.filesrc)
    //         }
    //     })
    // })
    $('#authorize').on('click',function(){
        $('.part1').hide();
        $('.part2').hide();
        $('.part3').show();
        $('.part4').hide();
        $('.part5').hide();
    })
    //绑定其他公众号
    $('.bindOther').on('click',function(){
        util.alert('是否要重新授权绑定到其他公众号？',function(){
            $('.part1').hide();
            $('.part2').hide();
            $('.part3').show();
            $('.part4').hide();
            $('.part5').hide();
        })
    });
    // 下一步跳转
    // $('.part3_jump').on('click',function(){
    //     if($('#wxAccount_name').val()==''){
    //         util.message('请输入公众号名称','danger');
    //         $('#wxAccount_name').focus();
    //         return false;
    //     }
    //     if($('#AppID').val()==''){
    //         util.message('请输入AppID','danger');
    //         $('#AppID').focus();
    //         return false;
    //     }
    //     if($('#AppSecret').val()==''){
    //         util.message('请输入AppSecret','danger');
    //         $('#AppSecret').focus();
    //         return false;
    //     }
    //     var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    //     var token = '';
    //     for(var i = 0; i < 32; i++) {
    //         var j = parseInt(Math.random() * (31 + 1));
    //         token += letters[j];
    //     }
    //     $(':text[name="empowerToken"]').val(token);
    //     $('#clipboard-text').attr('data-clipboard-text',token);
    //     $('.part1').hide();
    //     $('.part2').hide();
    //     $('.part3').hide();
    //     $('.part4').show();
    //     $('.part5').hide();
    // })
    // 上一步跳转
    $('.part4-jump').on('click',function(){
        $('.part1').hide();
        $('.part2').hide();
        $('.part3').show();
        $('.part4').hide();
        $('.part5').hide();
    })
    // 修改开发信息
    $('.editInfo').on('click',function(){
            $('.part1').hide();
            $('.part2').hide();
            $('.part3').hide();
            $('.part4').hide();
            $('.part5').show();
    })
    $('.cancel_config').on('click',function(){
        location.reload();
    })

util.copy2('#textarea1','textarea1');
util.copy2('#textarea2','textarea2');

   




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

