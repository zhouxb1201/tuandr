<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"template/platform/Wchat/replayConfig.html";i:1583811746;s:31:"template/platform/new_base.html";i:1587970146;s:44:"template/platform/controlCommonVariable.html";i:1583811744;s:31:"template/platform/urlModel.html";i:1583811744;}*/ ?>
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

                <ul class="nav nav-tabs v-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#follow" aria-controls="follow" role="tab" data-toggle="tab" class="flex-auto-center">关注时回复</a></li>
                    <li role="presentation"><a href="#keyword" data-id='2' aria-controls="keyword" role="tab" data-toggle="tab" class="flex-auto-center">关键字回复</a></li>
                    <li role="presentation" ><a href="#default" aria-controls="default" role="tab" data-toggle="tab" class="flex-auto-center">默认回复</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active FollowReply" id="follow">
                        <?php if(!(empty($info) || (($info instanceof \think\Collection || $info instanceof \think\Paginator ) && $info->isEmpty()))): if($info['media_info']['type'] == 'text'): ?>
                               <div class="textNew1" id="textNew">
                                    <textarea name="" id="newArea" class="form-control resize_none" cols="60" rows="5"><?php echo $info['media_info']['attachment']; ?></textarea>
                                    <div class="text_border1">
                                        <a href="javascript:void(0);" class="text_select_emoji"><i class="icon icon-emoji"></i></a>
                                        <a href="javascript:void(0);" class="link_dia"><i class="icon icon-link-l"></i></a>
                                    </div>
                                    <div class="mt-10 text-left">
                                         <a href="javascript:void(0);" class="flex-1 btn btn-default delFollow" data-id="1">删除</a>
                                    </div>
                                </div>
                        <?php endif; if($info['media_info']['type'] == 'image'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15">
                                <div class="item-head">
                                    <img src="<?php echo $info['media_info']['attachment']; ?>" class="max-w-auto" />
                                    <p class="line-1-ellipsis"><?php echo $info['media_info']['filename']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateFollow" data-id="<?php echo $info['id']; ?>" >修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn delFollow" data-id="1">删除</a>
                            </div>
                        </div>
                        <?php endif; if($info['media_info']['type'] == 'voice'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15 imageText">
                                <div class="item-head">
                                    <div class="icon audio-player-play" data-attach="<?php echo $info['media_info']['filename']; ?>"><span><i class="fa fa-play"></i></span></div>
                                    <p class="line-1-ellipsis"><?php echo $info['media_info']['filename']; ?></p>
                                    <p class="line-1-ellipsis">创建时间：<?php echo $info['media_info']['createtime']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateFollow" data-id="<?php echo $info['id']; ?>">修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delFollow" data-id="1" >删除</a>
                            </div>
                        </div>
                        <?php endif; if($info['media_info']['type'] == 'video'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15 imageText">
                                <div class="item-head">
                                    <img src="PLATFORM_STATIC//images/banner-bg.png" class="max-w-auto" />
                                    <p class="line-1-ellipsis">标题：<?php echo $info['media_info']['tag']['title']; ?></p>
                                    <p class="line-1-ellipsis">描述：<?php echo $info['media_info']['tag']['description']; ?></p>
                                    <p class="line-1-ellipsis">创建时间：<?php echo $info['media_info']['createtime']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateFollow" data-id="<?php echo $info['id']; ?>">修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delFollow" data-id="1" >删除</a>
                            </div>
                        </div>
                        <?php endif; if($info['media_info']['type'] == 'news'): ?>
                        <div class="w-300 border-default ">
                            <?php if(is_array($info['media_info']['items']['data']) || $info['media_info']['items']['data'] instanceof \think\Collection || $info['media_info']['items']['data'] instanceof \think\Paginator): if( count($info['media_info']['items']['data'])==0 ) : echo "" ;else: foreach($info['media_info']['items']['data'] as $k=>$v): ?>
                            <div class="padding-15 imagesTexts">
                                <?php if($k == '0'): ?>
                                <div class="item-head">
                                    <img src="<?php echo $v['thumb_url']; ?>" class="max-w-auto" />
                                    <p class="line-1-ellipsis"><?php echo $v['title']; ?></p>
                                </div>
                                <?php endif; if($k > '0'): ?>
                                <div class="item">
                                    <p class="line-2-ellipsis"><?php echo $v['title']; ?></p>
                                    <img src="<?php echo $v['thumb_url']; ?>" >
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateFollow" data-id="<?php echo $info['id']; ?>"  >修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn delFollow" data-id="1" >删除</a>
                            </div>

                        </div>
                        <?php endif; endif; if($info==''): ?>
                        <div class="flex-auto-center h-300 empty-box">
                                <div class="media_cover1 selectMedia materialEvent">
                                        <span class="create_access">
                                        <a class="add_gray_wrp jsMsgSenderPopBt" href="javascript:void(0);">
                                            <i class="icon icon-add"></i>
                                            <strong>从素材库中选择</strong>
                                        </a>
                                        </span>
                                </div>
                                <div class="media_cover1 selectText">
                                        <span class="create_access">
                                        <a class="add_gray_wrp jsMsgSenderPopBt" href="javascript:void(0);">
                                            <i class="icon icon-add"></i>
                                            <strong>文本消息</strong>
                                        </a>
                                        </span>
                                </div>

                                <div class="textNew1" id="textNew" style="display: none">
                                    <textarea name="" id="follow_content_text" class="form-control resize_none" cols="60" rows="5"></textarea>
                                    <div class="text_border1">
                                        <a href="javascript:void(0);" class="text_select_emoji" data-areaid="follow_content_text"><i class="icon icon-emoji"></i></a>
                                        <a href="javascript:void(0);" class="link_dia" data-areaId="follow_content_text"><i class="icon icon-link-l"></i></a>
                                    </div>
                                    <div class="mt-10 text-left">
                                            <a class="btn btn-primary materialEvent1" href="javascript:void(0);">保存</a>
                                            <a class="btn btn-default" href="<?php echo __URL('PLATFORM_MAIN/wchat/replayConfig'); ?>">返回</a>
                                    </div>
                                </div>

                        </div>



                        <?php endif; ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="keyword">
                        <div class="mb-10">
                            <a class="btn btn-primary addKeyReply"><i class="icon icon-add1"></i> 添加关键字回复</a>
                        </div>
                        <table class="table v-table table-auto-center">
                            <thead>
                                <tr>
                                    <th>规则名称</th>
                                    <th>匹配类型</th>
                                    <th>关键字</th>
                                    <th class="col-md-2 pr-14 operationLeft">操作</th>
                                </tr>
                            </thead>
                            <tbody id="list">

                            </tbody>

                        </table>
                        <input type="hidden" id="page_index">
                        <nav aria-label="Page navigation" class="clearfix">
                            <ul id="page" class="pagination pull-right"></ul>
                        </nav>
                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="default">
                        <?php if(!(empty($default_info) || (($default_info instanceof \think\Collection || $default_info instanceof \think\Paginator ) && $default_info->isEmpty()))): if($default_info['media_info']['type'] == 'text'): ?>
                               <div class="textNew1" id="textNew">
                                    <textarea name="" id="newArea" class="form-control resize_none" cols="60" rows="5"><?php echo $default_info['media_info']['attachment']; ?></textarea>
                                    <div class="text_border1">
                                        <a href="javascript:void(0);" class="text_select_emoji"><i class="icon icon-emoji"></i></a>
                                        <a href="javascript:void(0);" class="link_dia"><i class="icon icon-link-l"></i></a>
                                    </div>
                                    <div class="mt-10 text-left">
                                         <a href="javascript:void(0);" class="flex-1 btn btn-default delDefault" data-id="3">删除</a>
                                    </div>
                                </div>
                        <?php endif; if($default_info['media_info']['type'] == 'image'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15">
                                <div class="item-head">
                                    <img src="<?php echo $default_info['media_info']['attachment']; ?>" class="max-w-auto" />
                                    <p class="line-1-ellipsis"><?php echo $default_info['media_info']['filename']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateDefault" data-id="<?php echo $default_info['id']; ?>" >修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delDefault" data-id="3">删除</a>
                            </div>
                        </div>
                        <?php endif; if($default_info['media_info']['type'] == 'voice'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15 imageText">
                                <div class="item-head">
                                    <div class="icon audio-player-play" data-attach="<?php echo $info['media_info']['filename']; ?>"><span><i class="fa fa-play"></i></span></div>
                                    <p class="line-1-ellipsis"><?php echo $default_info['media_info']['filename']; ?></p>
                                    <p class="line-1-ellipsis">创建时间：<?php echo $default_info['media_info']['createtime']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateDefault" data-id="<?php echo $default_info['id']; ?>">修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delDefault" data-id="3" >删除</a>
                            </div>
                        </div>
                        <?php endif; if($default_info['media_info']['type'] == 'video'): ?>
                        <div class="w-300 border-default">
                            <div class="padding-15 imageText">
                                <div class="item-head">
                                    <img src="PLATFORM_STATIC//images/banner-bg.png" class="max-w-auto" />
                                    <p class="line-1-ellipsis">标题：<?php echo $default_info['media_info']['tag']['title']; ?></p>
                                    <p class="line-1-ellipsis">描述：<?php echo $default_info['media_info']['tag']['description']; ?></p>
                                    <p class="line-1-ellipsis">创建时间：<?php echo $default_info['media_info']['createtime']; ?></p>
                                </div>
                            </div>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateDefault" data-id="<?php echo $default_info['id']; ?>">修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delDefault" data-id="3" >删除</a>
                            </div>
                        </div>
                        <?php endif; if($default_info['media_info']['type'] == 'news'): ?>
                        <div class="w-300 border-default ">
                            <?php if(is_array($default_info['media_info']['items']['data']) || $default_info['media_info']['items']['data'] instanceof \think\Collection || $default_info['media_info']['items']['data'] instanceof \think\Paginator): if( count($default_info['media_info']['items']['data'])==0 ) : echo "" ;else: foreach($default_info['media_info']['items']['data'] as $k=>$v): ?>
                            <div class="padding-15 imagesTexts">
                                <?php if($k == '0'): ?>
                                <div class="item-head">
                                    <img src="<?php echo $v['thumb_url']; ?>" class="max-w-auto" />
                                    <p class="line-1-ellipsis"><?php echo $v['title']; ?></p>
                                </div>
                                <?php endif; if($k > '0'): ?>
                                <div class="item">
                                    <p class="line-2-ellipsis"><?php echo $v['title']; ?></p>
                                    <img src="<?php echo $v['thumb_url']; ?>" >
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="border-top flex-auto-center text-center">
                                <!--<a href="javascript:void(0);" class="flex-1 btn text-primary border-right updateDefault" data-id="<?php echo $default_info['id']; ?>"  >修改</a>-->
                                <a href="javascript:void(0);" class="flex-1 btn btn-default delDefault" data-id="3" >删除</a>
                            </div>

                        </div>
                        <?php endif; endif; if($default_info==''): ?>
                        <div class="flex-auto-center h-300 empty-box"><div class="media_cover1 selectMedia updateFollow">
                                        <span class="create_access">
                                        <a class="add_gray_wrp jsMsgSenderPopBt" href="javascript:void(0);">
                                            <i class="icon icon-add"></i>
                                            <strong>从素材库中选择</strong>
                                        </a>
                                        </span>
                                </div>
                                <div class="media_cover1 selectText">
                                        <span class="create_access">
                                        <a class="add_gray_wrp jsMsgSenderPopBt" href="javascript:void(0);">
                                            <i class="icon icon-add"></i>
                                            <strong>文本消息</strong>
                                        </a>
                                        </span>
                                </div>

                                <div class="textNew1" id="textNew" style="display: none">
                                    <textarea name="" id="default_content_text" class="form-control resize_none" cols="60" rows="5"></textarea>
                                    <div class="text_border1">
                                        <a href="javascript:void(0);" class="text_select_emoji" data-areaid="default_content_text"><i class="icon icon-emoji"></i></a>
                                        <a href="javascript:void(0);" class="link_dia" data-areaId="default_content_text"><i class="icon icon-link-l"></i></a>
                                    </div>
                                    <div class="mt-10 text-left">
                                            <a class="btn btn-primary updateFollow1" href="javascript:void(0);">保存</a>
                                            <a class="btn btn-default" href="<?php echo __URL('PLATFORM_MAIN/wchat/replayConfig'); ?>">返回</a>
                                    </div>
                                </div></div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- page end -->
        
        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){

    $('.nav-tabs a').on('click',function(){
        var type = $(this).data('id');
        if(type==2){
            util.initPage(getList);
        }
    });
    function getList(page_index){
        $("#page_index").val(page_index);
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/wchat/keyReplayList'); ?>",
            async : true,
            data : {
                "page_index" : page_index
            },
            success : function(data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        html += '<td>' + data["data"][i]["rule_name"] + '</td>';
                        if(data["data"][i]["match_type"] == 1){
                            html += '<td>模糊匹配</td>';
                        }else{
                            html += '<td>全部匹配</td>';
                        }
                        html += '<td>' + data["data"][i]["key"] + '</td>';
                        if(data['data'][i]['replay_type'] == 0){
                            html += '<td class="fs-0 operationLeft"><a href="javascript:void(0);" class="btn-operation updateKeyReply" data-id="' + data["data"][i]["id"] +'">编辑</a>';
                            html += '<a href="javascript:void(0);" class="btn-operation text-red1 delKeyReply" data-id="' + data["data"][i]["id"] + '">删除</a></td>';
                        }else{
                            html += '<td><span class="btn-operation text-red1">超级海报关键字不能操作</span></td>';
                        }

                        html += '</tr>';
                    }
                } else {
                    html += '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                }
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
                $("#list").html(html);delKeyReply();updateKeyReply();
                util.tips();
            }
        });
    }
    /**
     * 修改关键字回复
     */
    function updateKeyReply() {
        $('.updateKeyReply').on('click', function () {
            var id = $(this).data('id');
            var url = __URL('PLATFORM_MAIN/wchat/addOrUpdateKeyReplay') + '&id=' + id;
            util.confirm('修改关键字回复', 'url:' + url, function () {
                var replay_id = this.$content.find('#replay_id').val();
                var last_media_id = this.$content.find('#last_media_id').val();
                var id = this.$content.find('#id').val();
                var key = this.$content.find('#key').val();
                var rule_name = this.$content.find('#rule_name').val();
                var content_text = this.$content.find('#replay_content_text').val();
                if (replay_id) {
                    var media_id = replay_id;
                } else {
                    media_id = last_media_id;
                }
                var match_type = this.$content.find('input[name="match_type"]:checked').val();
                $.ajax({
                    url: __URL(PLATFORMMAIN + "/Wchat/addOrUpdateKeyReplay"),
                    type: "post",
                    data: {
                        "id": id,
                        "media_id": media_id,
                        "content_text": content_text,
                        "rule_name": rule_name,
                        "key": key,
                        "match_type": match_type
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', getList($("page_index").val()));
                        } else if(data["code"] ==-2){
                            util.message('修改失败，相关关键字已存在', 'danger');
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                })
            },'xlarge')
        })
    }

    /**
     * 添加关键字回复
     */
    $('.addKeyReply').on('click',function(){
            var url = __URL('PLATFORM_MAIN/wchat/addOrUpdateKeyReplay');
            util.confirm('添加关键字回复', 'url:'+url,function(){
                var  replay_id = this.$content.find('#replay_id').val();
                var  key = this.$content.find('#key').val();
                var  rule_name = this.$content.find('#rule_name ').val();
                var  match_type = this.$content.find('input[name="match_type"]:checked').val();
                var content_text = this.$content.find('#replay_content_text').val();
                $.ajax({
                    url: __URL(PLATFORMMAIN + "/Wchat/addOrUpdateKeyReplay"),
                    type: "post",
                    data: { "media_id": replay_id,"id":0,"content_text": content_text,"rule_name": rule_name, "key": key,"match_type": match_type },
                    success: function (data) {
                        if (data["code"]  > 0) {
                            util.message(data["message"],'success',getList($("page_index").val()));
                        }else if(data["code"] ==-2){
                            util.message('添加失败，相关关键字已存在', 'danger');
                        } else {
                            util.message(data["message"],'danger');
                        }
                    }
                })
            },'xlarge')
        })
    /**
     * 修改关键字回复
     */
    // function updateKeyReply(){
    //     $('.updateKeyReply').on('click',function(){
    //         var id = $(this).data('id');
    //         var url = __URL('PLATFORM_MAIN/wchat/addOrUpdateKeyReplay')+'&id='+id;
    //         util.confirm('修改关键字回复', 'url:'+url,function(){
    //             var  replay_id = this.$content.find('#replay_id').val();
    //             var  last_media_id = this.$content.find('#last_media_id').val();
    //             var  id = this.$content.find('#id').val();
    //             var  key = this.$content.find('#key').val();
    //             if(replay_id){
    //                 var media_id = replay_id;
    //             }else{
    //                 media_id = last_media_id;
    //             }
    //             var  match_type = this.$content.find('input[name="match_type"]:checked').val();
    //             $.ajax({
    //                 url: __URL(PLATFORMMAIN + "/Wchat/addOrUpdateKeyReplay"),
    //                 type: "post",
    //                 data: {"id": id, "media_id": media_id, "key": key,"match_type": match_type },
    //                 success: function (data) {
    //                     if (data["code"]  > 0) {
    //                         util.message(data["message"],'success',getList($("page_index").val()));
    //                     } else {
    //                         util.message(data["message"],'danger');
    //                     }
    //                 }
    //             })
    //         })
    //     })
    // }
    // 删除关键字回复
    function delKeyReply(){
        $('.delKeyReply').on('click',function(){
            var id = $(this).data('id');
            util.alert('是否删除？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/wchat/delKeyReply'); ?>",
                    async : true,
                    data : {
                        "id" : id
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getList($("page_index").val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    }
    //关注时回复设置（选择素材）
    $('.materialEvent').click(function(){
        var url = __URL('PLATFORM_MAIN/wchat/onLoadMaterial');
        util.confirm('选取素材', 'url:'+url,function(){
            var  media_id = this.$content.find('#replay_key_id').val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateFollowReply'); ?>",
                async: true,
                data: {
                    "media_id":media_id,"id":0
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        },'large')
    });
    //关注时回复设置（选择文本）
    $('.materialEvent1').click(function(){
        var content_text = $('#follow_content_text').val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateFollowReply'); ?>",
            async: true,
            data: {
                "id":0,"content_text":content_text
            },
            success: function (data) {
                if (data["code"] > 0) {
                    util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
                }else{
                    util.message(data["message"],'danger');
                }
            }
        });
    });
    //默认时回复设置(选择素材)
    $('.updateFollow').on('click',function(){
        var url = __URL('PLATFORM_MAIN/wchat/onLoadMaterial');
        util.confirm('选取素材', 'url:'+url,function(){
            var  media_id = this.$content.find('#replay_key_id').val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateDefaultReply'); ?>",
                async: true,
                data: {
                    "media_id":media_id,"id":0
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        },'large')
    })
    //默认时回复设置(选择文本)
    $('.updateFollow1').click(function(){
        var url = __URL('PLATFORM_MAIN/wchat/onLoadText');
            var  content_text = $('#default_content_text').val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateDefaultReply'); ?>",
                async: true,
                data: {
                    "content_text":content_text,"id":0
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
    });
    // //修改关注时回复
    // $('.updateFollow').on('click',function(){
    //     var url = __URL('PLATFORM_MAIN/wchat/onLoadMaterial');
    //     var id = $(this).data('id');
    //     util.confirm('选取素材', 'url:'+url,function(){
    //         var  media_id = this.$content.find('#replay_key_id').val();
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateFollowReply'); ?>",
    //             async: true,
    //             data: {
    //                 "media_id":media_id,"id":id
    //             },
    //             success: function (data) {
    //                 if (data["code"] > 0) {
    //                     util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
    //                 }else{
    //                     util.message(data["message"],'danger');
    //                 }
    //             }
    //         });
    //     },'large')
    // });
    //修改默认时回复
    // $('.updateDefault').on('click',function(){
    //     var url = __URL('PLATFORM_MAIN/wchat/onLoadMaterial');
    //     var id = $(this).data('id');
    //     util.confirm('选取素材', 'url:'+url,function(){
    //         var  media_id = this.$content.find('#replay_key_id').val();
    //         $.ajax({
    //             type: "post",
    //             url: "<?php echo __URL('PLATFORM_MAIN/wchat/addOrUpdateDefaultReply'); ?>",
    //             async: true,
    //             data: {
    //                 "media_id":media_id,"id":id
    //             },
    //             success: function (data) {
    //                 if (data["code"] > 0) {
    //                     util.message(data["message"],'success',__URL('PLATFORM_MAIN/wchat/replayConfig'));
    //                 }else{
    //                     util.message(data["message"],'danger');
    //                 }
    //             }
    //         });
    //     },'large')
    // });
    //删除关注时回复
    $('.delFollow').on('click',function(){
        var  type = $(this).data('id');
        util.alert('是否删除？',function() {
            $.ajax({
                type: "post",
                url: __URL(PLATFORMMAIN + "/wchat/delReply"),
                async: true,
                data: {
                    "type": type
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', __URL('PLATFORM_MAIN/wchat/replayConfig'));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            })
        })
    });
    //删除默认时回复
    $('.delDefault').on('click',function(){
        var  type = $(this).data('id');
        util.alert('是否删除？',function() {
            $.ajax({
                type: "post",
                url: __URL(PLATFORMMAIN + "/wchat/delReply"),
                async: true,
                data: {
                    "type": type
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', __URL('PLATFORM_MAIN/wchat/replayConfig'));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            })
        });
    });

    // 点击文本消息
    $('.selectText').on('click',function(){
        $(this).hide();
        $(this).siblings('.selectMedia').hide();
        $(this).siblings('#textNew').show();
    });

    //点解链接带文案
    $('.tab-content').on('click','.link_dia',function(){
        var id=$(this).attr('data-areaId');
        var areaVal=$(this).parents('.textNew1').find('#'+id);
        var em=areaVal.val();
        var html='';
        html +='<form class="form-horizontal padding-15 linktext" id="">';
        html +='<div class="form-group"><label class="col-md-2 control-label">链接文案</label><div class="col-md-8"><input type="text" class="form-control" id="linkCopy" value=""></div></div>';
        html +='<div class="form-group"><label class="col-md-2 control-label">跳转链接</label><div class="col-md-8">'
        html +='<div class="input-group item"><input type="text" class="form-control item" id="wap_jump"><span class="input-group-btn"><a href="javascript:void(0);" class="btn btn-default link_set">选择链接</a></span>';
		html +='</div></div></div>';
        html +='</form>';
        util.confirm('链接地址',html,function(){
            var copy=this.$content.find('#linkCopy').val();
            var link=this.$content.find('#wap_jump').val();
                if(!copy){
                    util.message('文案不能为空','danger')
                    return false;
                }
                if(!link){
                    util.message('链接不能为空','danger')
                    return false;
                }

            var href='<a href="'+link+'">'+copy+'</a>';
            areaVal.val(em+href);

        },'large');
    });

    // 文本信息跳转链接
    $('body').on('click','.linktext .link_set',function(){
        var url = __URL(PLATFORMMAIN + "/config/selectWapUrl");
        util.confirm('选择链接','url:'+url, function () {
            var data = this.$content.find('#selectedData').val();
            $("#wap_jump").val(data);
            // var obj = getCurrentMenu();
            // updateWeixinMenuUrl(obj.attr("data-menuid"),data);
        },'large');
    });

    // 点击表情添加到文本域
    $('.tab-content').on('click','.text_select_emoji',function(){
        var id=$(this).attr('data-areaId');
        var areaVal=$(this).parents('.textNew1').find('#'+id);
        var em=areaVal.val();
        util.emojiDialog(function(data){
            areaVal.val(em+data.emoji);
        })
    })

    $('body').on('click','.linktext2 .link_set',function(){
        // console.log("linktext2");
        var url = __URL(PLATFORMMAIN + "/config/selectWapUrl");
        util.confirm('选择链接','url:'+url, function () {
            var data = this.$content.find('#selectedData').val();
            $("#wap_jump2").val(data);
            // var obj = getCurrentMenu();
            // updateWeixinMenuUrl(obj.attr("data-menuid"),data);
        },'large');
    });

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

