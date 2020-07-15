<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"template/platform/Goods/goodsCategoryList.html";i:1591330108;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            
            <!-- page -->
            <div class="mb-20">
                <a href="<?php echo __URL('PLATFORM_MAIN/Goods/addGoodsCategory'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加分类</a>
            </div>
            <table class="table v-table table-auto-center tree" >
                <thead>
                <tr>
                    <th class="text-left"><i class="treegrid-expander icon icon-minus toggle_tree"></i></th>
                    <th>排序</th>
                    <th>商品分类</th>
                    <th>关联品类</th>
                    <th>是否显示</th>
                    <th  class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
                </thead>
                <tbody >
                    <?php if($category_list): if(is_array($category_list) || $category_list instanceof \think\Collection || $category_list instanceof \think\Paginator): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr class="treegrid-<?php echo $v['category_id']; ?>">
                    <td class="text-left"></td>
                    <td>
                        <input type="text" data-category_id="<?php echo $v['category_id']; ?>" class="form-control sort-form-control" value="<?php echo $v['sort']; ?>">
                    </td>
                    <td>
                        <div><input type="text" data-category_id="<?php echo $v['category_id']; ?>" class="form-control change_category_name" value="<?php echo $v['short_name']; ?>"></div>
                    </td>
                    
                    <td>
                        <?php echo $v['attr_name']; ?>
                    </td>
                    <td>
                        <?php if($v['is_visible'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <?php endif; ?>
                        <input type="hidden" name="category_id" value="<?php echo $v['category_id']; ?>">
                        <input type="hidden" name="test" value="">
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="category_id" value="<?php echo $v['category_id']; ?>">
                        <a href="<?php echo __URL('PLATFORM_MAIN/Goods/addGoodsCategory?category_id='.$v['category_id']); ?>" class="btn-operation">添加子分类</a>
                        <a href="<?php echo __URL('PLATFORM_MAIN/goods/updategoodscategory?category_id='.$v['category_id']); ?>" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_category text-red1">删除</a>
                        
                    </td>
                </tr>

                <!--二级菜单-->
                <?php if($v['child_list'] != '' and $v['is_parent'] == '1'): if(is_array($v['child_list']) || $v['child_list'] instanceof \think\Collection || $v['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                <tr class="treegrid-<?php echo $two['category_id']; ?> treegrid-parent-<?php echo $two['pid']; ?>">
                    <td class="text-left"></td>
                    <td>
                        <input type="text" data-category_id="<?php echo $two['category_id']; ?>" class="form-control sort-form-control" value="<?php echo $two['sort']; ?>">
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon">|——</span>
                            <input type="text" data-category_id="<?php echo $two['category_id']; ?>" class="form-control change_category_name" value="<?php echo $two['short_name']; ?>">
                        </div>
                    </td>
                    
                    <td>
                        <?php echo $two['attr_name']; ?>
                    </td>
                    <td>
                        <?php if($two['is_visible'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <?php endif; ?>
                        <input type="hidden" name="category_id" value="<?php echo $two['category_id']; ?>">
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="category_id" value="<?php echo $two['category_id']; ?>">
                        <a href="<?php echo __URL('PLATFORM_MAIN/Goods/addGoodsCategory?category_id='.$two['category_id']); ?>" class="btn-operation">添加子分类</a>
                        <a href="<?php echo __URL('PLATFORM_MAIN/goods/updategoodscategory?category_id='.$two['category_id']); ?>" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_category text-red1">删除</a>
                        
                    </td>
                </tr>

                <!--三级菜单-->
                <?php if($two['child_list'] != ''): if(is_array($two['child_list']) || $two['child_list'] instanceof \think\Collection || $two['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $two['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?>
                <tr class="treegrid-<?php echo $three['category_id']; ?> treegrid-parent-<?php echo $three['pid']; ?>">
                    <td class="text-left"></td>
                    <td>
                        <input type="text" data-category_id="<?php echo $three['category_id']; ?>" class="form-control sort-form-control" value="<?php echo $three['sort']; ?>">
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon">|—————</span>
                            <input type="text" data-category_id="<?php echo $three['category_id']; ?>" class="form-control change_category_name" value="<?php echo $three['short_name']; ?>">
                        </div>
                        <div class="pl-30"></div>
                    </td>
                    <td>
                        <?php echo $three['attr_name']; ?>
                    </td>
                    <td>
                        <?php if($three['is_visible'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <?php endif; ?>
                        <input type="hidden" name="category_id" value="<?php echo $three['category_id']; ?>">
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="category_id" value="<?php echo $three['category_id']; ?>">
                        <a href="<?php echo __URL('PLATFORM_MAIN/goods/updategoodscategory?category_id='.$three['category_id']); ?>" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_category text-red1">删除</a>
                        
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                <!--二级分类，无三级菜单-->
                <?php if($v['is_parent'] != '1'): if(is_array($v['child_list']) || $v['child_list'] instanceof \think\Collection || $v['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                <tr class="treegrid-<?php echo $two['category_id']; ?> treegrid-parent-<?php echo $two['pid']; ?>">
                    <td class="text-left"></td>
                    <td>
                        <input type="text" data-category_id="<?php echo $two['category_id']; ?>" class="form-control sort-form-control" value="<?php echo $two['sort']; ?>">
                    </td>
                    <td>
                        <div class="pl-15"><input type="text" data-category_id="<?php echo $two['category_id']; ?>" class="form-control change_category_name" value="<?php echo $two['short_name']; ?>"></div>
                    </td>
                    <td>
                        <?php echo $two['attr_name']; ?>
                    </td>
                    <td>
                        <?php if($two['is_visible'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <input type="hidden" name="category_id" value="<?php echo $two['category_id']; ?>">
                        <?php endif; ?>
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="category_id" value="<?php echo $two['category_id']; ?>">
                        <a href="javascript:void(0);" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_category text-red1">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; else: ?>
                <tr align="center"><td colspan="6">暂无符合条件的数据记录</td></tr>
                <?php endif; ?>
                </tbody>
            </table>

            <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'],function(util){
        util.treegrid('.tree');
        $(".toggle_tree").toggle(function(){
            $(".tree").treegrid("collapseAll");
            $(this).removeClass("icon-minus").addClass("icon-plus");
        },function(){
            $(".tree").treegrid("expandAll");
            $(this).removeClass("icon-plus").addClass("icon-minus");
        })
        util.tips();

        //删除分类
        $('.delete_category').on('click', function () {
            var category_id = $(this).siblings("input[name='category_id']").val();
            util.alert('确认删除此分类吗 ？', function () {
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Goods/deleteGoodsCategory'); ?>",
                    async : true,
                    data : {
                        "category_id" : category_id,
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                })
            })
        })
        //排序
        $('.sort-form-control').change(function(){
            var category_id = $(this).data('category_id');
            var sort_val = $(this).val();
            // console.log(category_id);return;
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategorySort'); ?>",
                async : true,
                data : {category_id : category_id, sort_val : sort_val},
                success : function(data) {
                    // console.log(data);return;
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            })
        })
        //修改分类名
        $('.change_category_name').change(function(){
            var category_id = $(this).data('category_id');
            var category_name = $(this).val();
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategoryName'); ?>",
                async : true,
                data : {category_id : category_id, category_name : category_name},
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            })
        })

       
        //是否显示
        $('.is_show').click(function(){
            test = 'test';
            $(this).removeClass('is_show');
            var status = $(this).data('is_show');
            is_show(this, status);
        })
        function is_show(obj, status){
            var category_id = $(obj).next().val();
            //0不显示
            if(status == 0){
                var is_visible = 0;
                $msg = '是否更改为不显示？';
            }else{
                var is_visible = 1;
                $msg = '是否更改为显示？';
            }
            util.alert($msg,function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategoryShow'); ?>",
                    async : true,
                    data : {category_id : category_id, is_visible : is_visible},
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
                        }else{
                            util.message(data["message"],'danger');
                        }
                        $(this).addClass('is_show');
                    }
                })
            })

        }
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

