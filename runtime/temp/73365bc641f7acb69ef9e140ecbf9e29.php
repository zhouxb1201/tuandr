<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:33:"template/platform/Wchat/menu.html";i:1583811746;s:31:"template/platform/new_base.html";i:1587970146;s:44:"template/platform/controlCommonVariable.html";i:1583811744;s:31:"template/platform/urlModel.html";i:1583811744;}*/ ?>
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
    
<link rel="stylesheet" href="PLATFORM_NEW_CSS/wx_menu.css">

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
            

<div>
                    <div class="menu_initial_box js_startMenuBox" style="display: none;">
                        <p class="tips_global">你尚未添加任何菜单</p>
                        <a class="btn btn_primary btn_add js_openMenu" href="javascript:void(0);">
                        <i class="icon14_common add_white"></i>添加菜单</a>
                    </div>
<!-- 菜单编辑 -->
<div class="menu_setting_area js_editBox" >
    <div class="menu_preview_area">
        <div class="mobile_menu_preview">
            <div class="mobile_hd tc"><?php echo $mall_name; ?></div>
            <div class="mobile_bd">
                <!-- 菜单 -->
                <ul class="pre_menu_list grid_line" id="menuList">
                                        <!-- 加载菜单 -->
                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): if( count($menu_list)==0 ) : echo "" ;else: foreach($menu_list as $k=>$menu): ?>
                    <li class="pre_menu_item size1of<?php echo $class_index+1; if(($k+1)==$menu_list_count): ?> current<?php endif; ?>" data-menu-index="<?php echo $k+1; ?>">
                    
                        <!-- 一级菜单 -->
                        <a href="javascript:void(0);" ondragstart="return false" class="pre_menu_link jsMenu" data-menuid="<?php echo $menu['menu_id']; ?>" data-pid="0" data-menu-eventurl = "<?php echo $menu['menu_event_url']; ?>" data-menu-type = "<?php echo $menu['menu_event_type']; ?>" data-detault-menu-type = "<?php echo $menu['menu_event_type']; ?>" data-mediaid="<?php echo $menu['media_id']; ?>" data-sort="<?php echo $menu['sort']; ?>">

                            <?php if($menu['child_count'] > 0): ?>                           <!-- 有二级菜单，显示小图标 -->
                            <i class="icon_menu_dot js_icon_menu_dot dn"></i>
                            <?php endif; ?>
                                                        <span><?php echo $menu['menu_name']; ?></span>
                        </a>
                        <!-- 一级菜单 -->
                        
                        
                        <!-- 二级菜单 -->
                        <div class="sub_pre_menu_box" data-submenulist="<?php echo $k+1; ?>" <?php if(($k+1)!=$menu_list_count): ?>style="display: none;"<?php endif; ?> >
                            <ul class="sub_pre_menu_list">
                                <?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): if( count($menu['child'])==0 ) : echo "" ;else: foreach($menu['child'] as $key=>$sub_menu): ?>
                                                            <li class="jsSubMenuInner"  <?php if($sub_menu['menu_event_type']=='2'): ?>data-flag=1<?php endif; if($sub_menu['menu_event_type']==3): ?>data-flag=3<?php endif; if($sub_menu['menu_event_type']=='4'): ?> data-flag=4 <?php endif; if($sub_menu['menu_event_type']=='1'): ?> data-flag=2 <?php endif; ?> >
                                    <a href="javascript:void(0);" ondragstart="return false" data-pid="<?php echo $sub_menu['pid']; ?>" data-menuid="<?php echo $sub_menu['menu_id']; ?>" data-menu-eventurl="<?php echo $sub_menu['menu_event_url']; ?>" data-menu-type = "<?php echo $sub_menu['menu_event_type']; ?>" data-detault-menu-type = "<?php echo $sub_menu['menu_event_type']; ?>" data-mediaid="<?php echo $sub_menu['media_id']; ?>" data-sort="<?php echo $sub_menu['sort']; ?>">
                                        <span class="sub_pre_menu_inner"><?php echo $sub_menu['menu_name']; ?></span>
                                    </a>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <!-- 限制二级菜单数量的添加 -->
                                <li class="jsSubMenu" data-pid="<?php echo $menu['menu_id']; ?>" data-subindex="<?php echo $k+1; ?>" <?php if($menu['child_count'] == $MAX_SUB_MENU_LENGTH): ?>style="display:none;"<?php endif; ?>>
                                    <a href="javascript:void(0);" title="最多添加<?php echo $MAX_SUB_MENU_LENGTH; ?>个子菜单">
                                        <span class="sub_pre_menu_inner">
                                            <i class="icon14_menu_add" style="background-position: 0 0;"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <i class="arrow arrow_out"></i> <i class="arrow arrow_in"></i><!-- 箭头 -->
                        </div>
                        <!-- 二级菜单 -->
                        
                        
                    </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>


                    
                    <!-- 限制一级菜单数量的添加 -->
                    <li class="js-addMenuBtn pre_menu_item size1of<?php echo $class_index+1; ?>"  data-class-index="<?php echo $class_index+1; ?>" <?php if($menu_list_count >= $MAX_MENU_LENGTH): ?> style="display:none;"<?php endif; ?> >
                        <a href="javascript:void(0);" class="pre_menu_link " title="最多添加<?php echo $MAX_MENU_LENGTH; ?>个一级菜单">
                            <i class="icon14_menu_add"></i>
                            <?php if($menu_list_count==0): ?>
                            <span>添加菜单</span>
                            <?php endif; ?>
                                                    </a>
                    </li>
                    
                    
                </ul>
                <!-- 菜单 -->
            </div>
        </div>

        <div class="sort_btn_wrp" <?php if($menu_list_count == 0): ?>style="display:none;"<?php endif; ?>>
            <a id="orderBt" class="<?php if($menu_list_count <2): ?> dn <?php endif; ?>btn btn_default" href="javascript:void(0);">菜单排序</a>
            <span id="orderDis" class="<?php if($menu_list_count >1): ?> dn <?php endif; ?>btn btn_disabled">菜单排序</span>
            <a id="finishBt" href="javascript:void(0);" class="dn btn btn_default">完成</a>
        </div>
        
        
    </div>


    <div class="menu_form_area">
        <!-- 点击左侧菜单进行编辑操作 -->
        <div id="js_none" class="menu_initial_tips tips_global" style="display: none;">请通过拖拽左边的菜单进行排序</div>
        <div id="js_rightBox" class="portable_editor to_left">
            <div class="editor_inner">
                <div class="global_mod float_layout menu_form_hd js_second_title_bar">
                    <h4 class="global_info"><?php echo $default_menu_info['menu_name']; ?></h4>
                    <div class="global_extra">
                        <a href="javascript:void(0);" id="jsDelBt" data-menuid="<?php echo $default_menu_info['menu_id']; ?>" data-menuname="<?php echo $default_menu_info['menu_name']; ?>">删除菜单</a>
                    </div>
                </div>
                <div class="menu_form_bd" id="view">
                    <div id="js_innerNone"  class="msg_sender_tips tips_global" <?php if($default_menu_info['child_count']==0): ?>style="display: none;"<?php endif; ?>>已添加子菜单，仅可设置菜单名称。</div>
                    <div class="frm_control_group js_setNameBox">
                        <label for="menuname" class="frm_label"><strong class="title js_menuTitle">菜单名称</strong></label>
                        <div class="frm_controls">
                            <span class="frm_input_box with_counter counter_in append">
                                <input type="text" id="menuname"  data-switch="menuname" class="frm_input" value="<?php echo $default_menu_info['menu_name']; ?>">
                            </span>
                            <p class="emoji" style="margin-top: -10px;"><a class="select_emoji btn btn-primary">选择表情</a></p>
                            <p class="frm_msg fail js_titleEorTips dn" style="display: none;">字数超过上限</p>
                            <p class="frm_msg fail js_titlenoTips dn" style="display: none;">请输入菜单名称</p>
                            <p class="frm_tips js_titleNolTips">一级菜单不能超过5个字数</p>
                        </div>
                    </div>
                    <div class="frm_control_group js_setGraphic" <?php if($default_menu_info['child_count']>0): ?>style="display:none;"<?php endif; ?>>
                        <label for="" class="frm_label"> <strong class="title js_menuContent">菜单内容</strong></label>
                        <div class="frm_controls frm_vertical_pt">
                            <label class="frm_radio_label js_radio_sendMsg <?php if($default_menu_info['menu_event_type']==2): ?>selected<?php endif; ?>">
                                <i class="icon_radio"></i> <span class="lbl_content">微信素材</span>
                            </label>
                            <label class="frm_radio_label js_radio_url  <?php if($default_menu_info['menu_event_type']==1): ?>selected<?php endif; ?>">
                                <i class="icon_radio"></i> <span class="lbl_content">跳转网页</span>
                            </label>
                            <label class="frm_radio_label js_text <?php if($default_menu_info['menu_event_type']==3): ?>selected<?php endif; ?>">
                                <i class="icon_radio"></i> <span class="lbl_content " >文本消息</span>
                            </label>
                            <label class="frm_radio_label js_miniprogram <?php if($default_menu_info['menu_event_type']==4): ?>selected<?php endif; ?>">
                                <i class="icon_radio"></i> <span class="lbl_content " >小程序</span>
                            </label>
                            <label class="frm_radio_label js_key <?php if($default_menu_info['menu_event_type']==5): ?>selected<?php endif; ?>">
                                <i class="icon_radio"></i> <span class="lbl_content " >触发关键字</span>
                            </label>
                        </div>
                    </div>
                    <div class="menu_content_container js_setGraphic" <?php if($default_menu_info['child_count']>0): ?>style="display:none;"<?php endif; ?>>
                        <!-- 发送消息 -->
                        
                        <div class="menu_content send jsMain" id="edit"  <?php if($default_menu_info['menu_event_type']==2): ?> style="display: block;"<?php else: ?> style="display:none;"<?php endif; ?>>
                            <div class="msg_sender" id="editDiv">
                                <div class="msg_tab">
                                    <div class="tab_navs_panel">
                                        <div class="tab_navs_wrp">

                                        </div>
                                    </div>
                                    <div class="tab_panel">

                                        <div class="tab_content">
                                            <div class="js_appmsgArea inner ">
                                            
                                                
                                                <div class="tab_cont_cover jsMsgSendTab" <?php if($default_menu_info['menu_event_type']==2): ?>style="display:block;"<?php endif; ?> >
                                                    <div class="media_cover">
                                                        <span class="create_access selectMedia">
                                                            <a class="add_gray_wrp jsMsgSenderPopBt" href="javascript:void(0);">
                                                            <i class="icon36_common add_gray"></i> <strong>从素材库中选择</strong>
                                                        </a>
                                                        </span>
                                                    </div>

                                                </div>

                                                <div id="show_media" class=" w-200 fs-12" data-uuu=" <?php echo $default_menu_info['media_list']['type']; ?>" <?php if($default_menu_info['menu_event_type']==2): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
                                                        <?php if($default_menu_info['media_list']['type'] == 'news'): ?>
                                                        <div class="padding-10 imagesTexts">
                                                            <div class="item-head">
                                                                <img src="<?php echo $default_menu_info['media_list']['items']["data"][0]["thumb_url"]; ?>" class="max-w-auto">
                                                                <p class="line-1-ellipsis"><?php echo $default_menu_info['media_list']['items']['data']['0']['title']; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php if($default_menu_info['media_list']['item_list_count'] >1): if(is_array($default_menu_info['media_list']['items']['data']) || $default_menu_info['media_list']['items']['data'] instanceof \think\Collection || $default_menu_info['media_list']['items']['data'] instanceof \think\Paginator): if( count($default_menu_info['media_list']['items']['data'])==0 ) : echo "" ;else: foreach($default_menu_info['media_list']['items']['data'] as $k=>$media): if($k>0): ?>
                                                            <div class="padding-10 imagesTexts">
                                                                <div class="item">
                                                                    <p class="line-2-ellipsis"><?php echo $media['title']; ?></p>
                                                                    <img src="<?php echo $media['thumb_url']; ?>">
                                                                 </div>
                                                            </div>
                                                        <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                                                        <div class="border-top flex-auto-center text-center">
                                                            <a href="javascript:void(0);" class="flex-1 btn jsmsgSenderDelBt link_dele" data-mediaid="<?php echo $default_menu_info['media_id']; ?>">删除</a>
                                                        </div>
                                                        <?php endif; if($default_menu_info['media_list']['type'] == 'image'): ?>
                                                        <div class="padding-10 imagesTexts">
                                                            <div class="item-head">
                                                                <img src="<?php echo $default_menu_info['media_list'].["attachment"]; ?>" class="max-w-auto">
                                                                <p class="line-1-ellipsis">图片：<?php echo $default_menu_info['media_list']['filename']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="border-top flex-auto-center text-center">
                                                            <a href="javascript:void(0);" class="flex-1 btn jsmsgSenderDelBt link_dele" data-mediaid="<?php echo $default_menu_info['media_id']; ?>">删除</a>
                                                        </div>
                                                        <?php endif; if($default_menu_info['media_list']['type'] == 'voice'): ?>
                                                        <div class="padding-10 imagesTexts">
                                                            <div class="item-head">
                                                                <img src="https://mmbiz.qpic.cn/mmbiz/YibJtXWD7LA4VPpxZarEKLHCVq3kVyCbGIPyXFPD9ic1AI7D0zw2IibDmvCoZVHln7eD7ZdcnnLDpbeurkIm6JAQw/0?wx_fmt=jpeg" class="max-w-auto">
                                                                <p class="line-1-ellipsis">语音：<?php echo $default_menu_info['media_list']['filename']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="border-top flex-auto-center text-center">
                                                            <a href="javascript:void(0);" class="flex-1 btn jsmsgSenderDelBt link_dele" data-mediaid="<?php echo $default_menu_info['media_id']; ?>">删除</a>
                                                        </div>
                                                        <?php endif; if($default_menu_info['media_list']['type'] == 'video'): ?>
                                                        <div class="padding-10 imagesTexts">
                                                            <div class="item-head">
                                                                <img src="https://mmbiz.qpic.cn/mmbiz/YibJtXWD7LA4VPpxZarEKLHCVq3kVyCbGIPyXFPD9ic1AI7D0zw2IibDmvCoZVHln7eD7ZdcnnLDpbeurkIm6JAQw/0?wx_fmt=jpeg" class="max-w-auto">
                                                                <p class="line-1-ellipsis">视频：<?php echo $default_menu_info['media_list']['tag']['title']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="border-top flex-auto-center text-center">
                                                            <a href="javascript:void(0);" class="flex-1 btn jsmsgSenderDelBt link_dele" data-mediaid="<?php echo $default_menu_info['media_id']; ?>">删除</a>
                                                        </div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 发送消息 -->
                        
                        <!-- 跳转网页 -->
                        
                        <div class="menu_content url jsMain" id="url"  <?php if($default_menu_info['menu_event_type'] == 1): ?> style="display: block;"<?php else: ?> style="display:none;"<?php endif; ?>>
                                <p class="menu_content_tips tips_global">订阅者点击该子菜单会跳到以下链接</p>
                                <div class="frm_control_group">
                                    <label for="urltext" class="frm_label"><strong class="title">页面地址</strong></label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box" style="width: 210px;">
                                            <input type="text" class="frm_input" id="urltext" data-switch="url" value="<?php echo $default_menu_info['menu_event_url']; ?>" name="urlText" style="border: 0; box-shadow: none; padding: 0;">
                                            
                                        </span>
                                        <a class="select_url btn btn-primary">选择链接</a>
                                    </div>
                                </div>
                        </div>
                        <!--文本消息-->
                         <div class="menu_content textNew jsMain" id="textNew"  <?php if($default_menu_info['menu_event_type'] == 3): ?> style="display: block;"<?php else: ?> style="display:none;"<?php endif; ?>>
                            <p class="menu_content_tips tips_global">客服文本消息，可插入链接。</p>
                            <textarea name="" id="newArea" class="form-control" cols="60" rows="5"><?php echo $default_menu_info['media_list']['attachment']; ?></textarea>
                            <div class="text_border">
                                <a href="javascript:void(0);" class="text_select_emoji"><i class="icon icon-emoji"></i></a>
                                <a href="javascript:void(0);" class="link_dia"><i class="icon icon-link-l"></i></a>
                            </div>
                            <!--<div class="mt-10">-->
                                    <!--<a class="btn btn-primary addText" href="javascript:void(0);">保存</a>-->
                            <!--</div>-->
                         </div>
                        <!--文本消息-->
                        <!--关键字-->
                        <div class="menu_content url jsMain" id="key"  <?php if($default_menu_info['menu_event_type'] == 5): ?> style="display: block;"<?php else: ?> style="display:none;"<?php endif; ?>>
                        <p class="menu_content_tips tips_global">请选择需要触发的关键字，该关键字必须已经在系统中创建。</p>
                        <div class="frm_control_group">
                            <label for="urltext" class="frm_label"><strong class="title">关键字</strong></label>
                            <div class="frm_controls">
                                   <span class="frm_input_box" style="width: 210px;">
                                    <input type="text" class="frm_input" id="keyword" disabled data-switch="key" value="<?php if($default_menu_info['key_name']): ?><?php echo $default_menu_info['key_name']; endif; ?>" name="urlText" style="border: 0; box-shadow: none; padding: 0;">
                                   </span>
                                <a class="select_key btn btn-primary">选择关键字</a>
                            </div>
                        </div>
                        </div>
                        <!--小程序-->
                        <div class="menu_content textNew jsMain" id="miniprogram"  <?php if($default_menu_info['menu_event_type'] == 4): ?> style="display: block;"<?php else: ?> style="display:none;"<?php endif; ?>>
                        <p class="menu_content_tips tips_global">若商城已对接小程序，可直接获取商城小程序AppID与路径。<?php if($miniprogramStatus): ?><a href="<?php echo __URL('ADDONS_MAINminiProgramManage'); ?>" target="_blank">前往对接</a><?php endif; ?></p>
                        <div class="frm_control_group">
                            <label for="miniprogram" class="frm_label"><strong class="title">小程序AppID</strong></label>
                            <div class="frm_controls">
                                     <span class="frm_input_box" style="width: 210px;">
                                     <input type="text" class="frm_input" id="appidminiprogram" data-switch="appid" value="<?php echo $default_menu_info['appid']; ?>" name="appidminiprogram"  style="border: 0; box-shadow: none; padding: 0;">
                                      </span>
                                <?php if($miniprogramStatus): ?>
                                      <a class="getMinConfig btn btn-primary">获取小程序AppID</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="frm_control_group">
                        <label for="miniprogram" class="frm_label"><strong class="title">小程序路径</strong></label>
                        <div class="frm_controls">
                                    <span class="frm_input_box" style="width: 210px;">
                                    <input type="text" class="frm_input" id="urlminiprogram" data-switch="url" value="<?php echo $default_menu_info['menu_event_url']; ?>" name="urlminiprogram" style="border: 0; box-shadow: none; padding: 0;">
                                    </span>
                            <?php if($miniprogramStatus): ?>
                                    <a class="select_min_url btn btn-primary">选择路径</a>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="mt-10">
                            <a class="btn btn-primary addminiprogram" href="javascript:void(0);">保存</a>
                        </div>
                        </div>
                        <!--小程序-->
                        <div id="js_errTips" style="display: none;" class="msg_sender_msg mini_tips warn"></div>
                    </div>
                </div>
            </div>
        
            <input type="hidden" id="authorizer_appid" value="<?php echo $authorizer_appid; ?>">
            <span class="editor_arrow_wrp">
                <i class="editor_arrow editor_arrow_out"></i>
                <i class="editor_arrow editor_arrow_in"></i>
            </span>
            
     
            
        </div>
        <!-- 点击左侧菜单进行编辑操作 -->

<!-- 菜单编辑 -->

<div class="tool_bar tc js_editBtn" >
    <span id="pubBt" class="btn btn_input btn_primary"><button>保存并发布</button></span>
    <a href="javascript:void(0);" class="btn btn_default" id="viewBt" style="display: inline-block;">预览</a>
</div>


<!-- 删除菜单弹出框 -->

<div class="dialog_wrp  ui-draggable" style="display: none;" id="wxDelDialog">
    <div class="dialog">
        <div class="dialog_hd">
            <h3>温馨提示</h3>
            <a href="javascript:void(0);" class="pop_closed">关闭</a>
        </div>
        <div class="dialog_bd">
            <div class="page_msg large simple default ">
                <div class="inner group">
                    <span class="msg_icon_wrapper"><i class="icon_msg warn "></i></span>
                    <div class="msg_content ">
                        <h4>删除确认</h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog_ft">
            <a href="javascript:void(0);" class="btn btn_primary js_btn">确定</a> <a
                href="javascript:void(0);" class="btn btn_default js_btn">取消</a>
        </div>
    </div>
</div>

<!-- 删除菜单弹出框 -->


<!-- 手机预览 -->
<div class="mobile_preview" id="mobileDiv" style="display: none;">
    <div class="mobile_preview_hd">
        <strong class="nickname"><?php echo $wx_name; ?></strong>
    </div>
    <div class="mobile_preview_bd">
        <ul id="viewShow" class="show_list"></ul>
    </div>
    <div class="mobile_preview_ft">
        <ul class="pre_menu_list grid_line" id="viewList">
            <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): if( count($menu_list)==0 ) : echo "" ;else: foreach($menu_list as $k=>$menu): ?>
                        <li class="pre_menu_item grid_item size1of<?php echo $menu_list_count; ?>" data-mobile-menu-index="<?php echo $k+1; ?>">
                <a href="javascript:void(0);" class="jsView pre_menu_link" title="<?php echo $menu['menu_name']; ?>" data-menuid="<?php echo $menu['menu_id']; ?>">
                <i class="icon_menu_dot"></i><?php echo $menu['menu_name']; ?></a>
                <div class="sub_pre_menu_box jsSubViewDiv" data-subIndex="<?php echo $k+1; ?>" style="display: none">
                    <ul class="sub_pre_menu_list">
                        <?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): if( count($menu['child'])==0 ) : echo "" ;else: foreach($menu['child'] as $key=>$sub_menu): ?>
                                                <li>
                            <a href="javascript:void(0);" data-pid="<?php echo $sub_menu['pid']; ?>" data-menuid="<?php echo $sub_menu['menu_id']; ?>" class="jsSubView" title="<?php echo $sub_menu['menu_name']; ?>"><?php echo $sub_menu['menu_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                    <i class="arrow arrow_out"></i><i class="arrow arrow_in"></i>
                </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
    </div>
    <a href="javascript:void(0);" class="mobile_preview_closed btn btn_default" id="viewClose">退出预览</a>
</div>

<!-- 遮罩层 -->
<div class="mask" style="display: none;" id="maskLayer"></div>

<!-- 操作反馈弹出框 erro 失败-->
<div class="JS_TIPS page_tips success" id="wxTips" style="display:none;">
    <div class="inner"></div>
</div>

<input type="hidden" id="hidden_default_sort" />
<input type="hidden" id="hidden_default_sub_sort" />




</div>

                <!-- page end -->
            </div>
        </div>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></div>
    </div>

</div>
    
<script>
   require(['util','wxMenu'],function(util,wxMenu){
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

