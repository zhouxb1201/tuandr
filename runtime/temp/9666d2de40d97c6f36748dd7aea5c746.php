<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"template/platform/Goods/addGoodsAttribute.html";i:1591330107;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
<form class="form-horizontal form-validate pt-15 widthFixedForm">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>品类名称</label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="attr_name" name="attr_name" required>
            <div class="mb-0 help-block">品类用于给不同商品类型制定规格、品牌、属性模版，如：衣服、裤子、鞋子等。品类最终需要与分类进行关联绑定使用。</div>
        </div>
    </div>
    <!--关联分类-->
    <div class="form-group">
        <label class="col-md-2 control-label">关联分类</label>
        <div class="col-md-5" style="width: 740px">
            <div class="transfer-box">

                <div class="item" style="width: 664px">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis flex flex-pack-justify">
                            <div>分类列表</div>
                            <div>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" checked disabled>当前品类已关联</label>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" class="bgcccc" checked disabled>其他品类已关联</label>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" disabled>未关联品类</label>
                            </div>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入分类名称" id="category_txt_selected">
                            <i class="icon icon-custom-search"></i>
                        </div>
                    </div>
                    <div id="category_id" class="heights tree-checkbox-group">
                        <?php if($goodsCategoryList): if(is_array($goodsCategoryList) || $goodsCategoryList instanceof \think\Collection || $goodsCategoryList instanceof \think\Paginator): if( count($goodsCategoryList)==0 ) : echo "" ;else: foreach($goodsCategoryList as $key=>$v): ?>
                        <div class="item_chek">
                            <div class="checkbox checkbox_first">
                                <i class="icon icon-drop-down mr-04"></i><label for="<?php echo $v['category_id']; ?>"> <input type="checkbox" value="<?php echo $v['category_id']; ?>" id="<?php echo $v['category_id']; ?>" name="module_chek" class="checkOne <?php if($v['attr_id'] > 0): ?>bgccc<?php endif; ?>" data-name="<?php echo $v['category_name']; ?>"><?php echo $v['category_name']; ?></label>
                            </div>
                            <?php if($v['child_list'] != ''): if(is_array($v['child_list']) || $v['child_list'] instanceof \think\Collection || $v['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                            <div class="checkbox_seconds">
                                <!--复选框二级选框-->
                                 <i class="icon icon-drop-down checkbox_seconds_icon"></i><label for="<?php echo $two['category_id']; ?>" class="checkbox-inline"><input type="checkbox" id="<?php echo $two['category_id']; ?>" value="<?php echo $two['category_id']; ?>" name="module_chek" class="checkTwo <?php if($two['attr_id'] > 0): ?>bgccc<?php endif; ?>" data-name="<?php echo $two['category_name']; ?>"><?php echo $two['category_name']; ?></label>
                                 <div class="checkbox_three item_content">
                                <?php if($two['child_list'] != ''): if(is_array($two['child_list']) || $two['child_list'] instanceof \think\Collection || $two['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $two['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?>
                                    <label for="<?php echo $three['category_id']; ?>" class="checkbox-inline"><input type="checkbox" name="module_chek" id="<?php echo $three['category_id']; ?>" value="<?php echo $three['category_id']; ?>" class="checkThree <?php if($three['attr_id'] > 0): ?>bgccc<?php endif; ?>" data-name="<?php echo $three['category_name']; ?>"><?php echo $three['category_name']; ?></label>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                 </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                    </div>
                </div>

            </div>
            <div class="mb-0 help-block">品类需要关联分类使用，发布商品选择分类后自动获取所关联品类的“规格、品牌、属性”等。</div>
        </div>
    </div>

    <!--规格-->
    <div class="form-group">
        <label class="col-md-2 control-label">关联规格</label>
        <div class="col-md-8" style="width: 740px">
            <div class="transfer-box">
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            <label><input type="checkbox" name="specificationAllCheck" value="">未选规格</label>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入规格名称" id="spec_txt">
                            <i class="icon icon-custom-search search_button" id="search_button"></i>
                        </div>
                    </div>
                    <div id="unspec_id" class="heights">
                        <?php if($goodsguige['data']): if(is_array($goodsguige['data']) || $goodsguige['data'] instanceof \think\Collection || $goodsguige['data'] instanceof \think\Paginator): if( count($goodsguige['data'])==0 ) : echo "" ;else: foreach($goodsguige['data'] as $key=>$v): ?>
                        <div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_specid" value="<?php echo $v['spec_id']; ?>" data_name="<?php echo $v['spec_name']; ?>"><?php echo $v['spec_name']; ?></label></div>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <p class="help-block">没有规格?去<a href="<?php echo __URL('PLATFORM_MAIN/Goods/addGoodsSpec'); ?>" target="_blank" class="text-primary">新建</a>，新建完点
                            <a href="" class="text-primary">刷新</a> 重新加载数据</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            已选规格
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入规格名称" id="spec_txt2">
                            <i class="icon icon-custom-search"></i>
                        </div>
                    </div>
                    <div id="spec_id" class="heights">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--品牌-->
    <div class="form-group">
        <label class="col-md-2 control-label">关联品牌</label>
        <div class="col-md-8" style="width: 740px">
            <div class="transfer-box">
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            <label><input type="checkbox" name="brandAllCheck" value="">未选品牌</label>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入品牌名称" id="brand_txt">
                            <i class="icon icon-custom-search search_button" id="brand_search"></i>
                        </div>
                    </div>
                    <div id="unbrand_id" class="heights">
                        <?php if($brand_list['data']): if(is_array($brand_list['data']) || $brand_list['data'] instanceof \think\Collection || $brand_list['data'] instanceof \think\Paginator): if( count($brand_list['data'])==0 ) : echo "" ;else: foreach($brand_list['data'] as $key=>$v): ?>
                        <div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="<?php echo $v['brand_id']; ?>" data_name="<?php echo $v['brand_name']; ?>"><?php echo $v['brand_name']; ?></label></div>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <p class="help-block">没有品牌?去<a href="<?php echo __URL('PLATFORM_MAIN/goods/addGoodsBrand'); ?>" target="_blank" class="text-primary">新建</a>，新建完点
                            <a href="" class="text-primary">刷新</a> 重新加载数据</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="item">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis">
                            已选品牌
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入品牌名称" id="brand_txt_selected">
                            <i class="icon icon-custom-search search_button_selected"></i>
                        </div>
                    </div>
                    <div id="brand_id" class="heights">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--商品属性-->
    <div class="form-group">
        <label class="col-md-2 control-label">商品属性</label>
        <div class="col-md-9" style="width: 695px;">
            <table class="table v-table table-auto-center" id="attributeItemList">
                <thead>
                    <tr>
                        <th class="col-sm-2">排序</th>
                        <th class="col-sm-2">属性名称</th>
                        <th class="col-sm-4 break-word">属性值</th>
                        <th class="col-sm-2">输入类型</th>
                        <th class="col-md-2 pr-14 operationLeft">操作</th>
                    </tr>
                </thead>
                <tbody>

                    <!--<tr class="attributeItem value_data" curr_num="0">
                        <td>1</td>
                        <td>生产日期</td>
                        <td>纯棉,尼龙</td>
                        <td>单选框</td>
                        <td class="operationLeft fs-0">
                            <a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="1" data-name="生产日期" data-value="纯棉,尼龙" data-type="1" >编辑</a>
                            <a href="javascript:void(0);" class="btn-operation text-red1">删除</a>
                        </td>
                    </tr>-->

                    <tr>
                        <td colspan="5" class="text-left"><a href="javascript:void(0);" class="text-primary" id="addAttributeItem" data-title="add"> +添加属性</a></td>
                    </tr>
                </tbody>


            </table>

        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">排序</label>
        <div class="col-md-5">
            <input type="number" class="form-control w-100" id="sort" name="sort">
            <p class="help-block">品类排序，数字越大越靠前。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>是否启用</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input id="is_visible" type="checkbox">
                <label for="is_visible" class=""></label>
            </div>
            <p class="help-block">关闭后，商品分类无法关联该品类。</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary submit" type="submit">添加</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>

</form>
<div style="display: none;" id="attributeDialog">
    <form class="form-horizontal padding-15" id="">
        <div class="form-group">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>属性名称</label>
            <div class="col-md-8"><input type="text" class="form-control" id="attributeName" value=""></div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>输入类型</label>
            <div class="col-md-8">
                <label class="radio-inline"><input type="radio" name="push_type" id="" value="1" checked> 输入框</label>
                <label class="radio-inline"><input type="radio" name="push_type" id="" value="2"> 单选框</label>
                <label class="radio-inline"><input type="radio" name="push_type" id="" value="3"> 复选框</label>
            </div>
        </div>
        <div class="form-group attributeType" style="display: none">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>
            <div class="col-md-8">
                <textarea name="content" id="content" rows="6" class="form-control"></textarea>
                <div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">排序</label>
            <div class="col-md-8"><input type="number" class="form-control" id="edit_sort" value=""></div>
        </div>

    </form>
</div>

<!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'], function (util) {
        var specSelected = []; //已选规格的集合
        var specSelect = []; //未选规格的集合
        var brandSelect = []; //未选品牌的集合
        var brandSelected = []; //已选品牌的集合
        // 获取未选规格数组
        $("input[name='un_specid']").each(function () {
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var obj = {};
            obj.value = val;
            obj.name = name;
            specSelect.push(obj);
        });
        // 获取未选品牌数组
        $("input[name='un_brandid']").each(function () {
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var obj = {};
            obj.value = val;
            obj.name = name;
            brandSelect.push(obj);
        })
        // 添加属性
        $("#addAttributeItem").on('click', function () {
            var html = $("#attributeDialog").html();
            var _this = $(this);
            util.confirm('添加属性', html, function () {
                var attributeName = this.$content.find('#attributeName').val();
                var push_type = this.$content.find('input[name="push_type"]:checked').val();
                if(push_type==2 || push_type==3){
                    var arr = this.$content.find("#content").val().split(/[(\r\n)\r\n]+/);
                    var contents = '';
                    for(var i = 0; i < arr.length; i++){
                        if(arr[i]){
                            contents += ',' + arr[i];
                        }
                    }
                    contents = contents.substr(1);
                }else{
                    var contents ='-';
                }
                var edit_sort = this.$content.find("#edit_sort").val();

                // 增加验证
                if(attributeName==''){
                    util.message('请输入属性名称','danger');
                    return false;
                }
                if(push_type==2 || push_type==3){
                    if(contents==''){
                        util.message('请输入属性值','danger');
                        return false;
                    }
                }
                var data_obj = $(".value_data");
                var data_obj_arr = [];

                data_obj.each(function (i) {
                    if (data_obj.eq(i) != '') {
                        data_obj_arr.push($(this).find('.editAttributeItem').data('name').toString());
                    }
                });
                if($.inArray(attributeName,data_obj_arr) != '-1'){
                    util.message('属性名称重复，请重新填写','danger');
                    return false;
                }
                 if(push_type==1){
                     var push_type_text = '输入框';
                 }else if(push_type==2){
                     var push_type_text = '单选框';
                 }else{
                     var push_type_text = '复选框';
                 }
                
                var tpl = '';

                tpl += '<tr class="attributeItem value_data">';
                tpl += '<td>'+edit_sort+'</td>';
                tpl += '<td>'+attributeName+'</td>';
                tpl += '<td class="break-word">'+contents+'</td>';
                tpl += '<td>'+push_type_text+'</td>';
                tpl += '<td class="operationLeft fs-0"><a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="'+edit_sort+'" data-name="'+attributeName+'" data-value="'+contents+'" data-type="'+push_type+'" data-type-text="'+push_type_text+'">编辑</a><a href="javascript:void(0);" class="btn-operation text-red1">删除</a></td>';
                tpl += '</tr>';
                _this.parents('tr').before(tpl);
                $('.attributeType').hide();
            }, 'large');
        });
        // 编辑属性
        $('body').on('click','.editAttributeItem',function(){
            var _this=$(this);
            var sort=_this.attr('data-sort');
            var name=_this.attr('data-name');
            var value=_this.attr('data-value');
            value = value.replace(/,/g,"\n");
            var type=_this.attr('data-type');
            var html='';
            html+='<form class="form-horizontal padding-15" id="">';
            html+='<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性名称</label><div class="col-md-8"><input type="text" class="form-control" id="attributeName" value="'+name+'"></div></div>';
            html+='<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>输入类型</label>';
            if(type==1){
                html+='<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1" checked> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2"> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3"> 复选框</label></div>';
            }else if(type==2){
                html+='<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1"> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2" checked> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3"> 复选框</label></div>';
            }else{
                html+='<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1"> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2"> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3" checked> 复选框</label></div>';
            }
            html+='</div>';
            if(type==1){
                html+='<div class="form-group attributeType" style="display: none"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>';
                html+='<div class="col-md-8"><textarea name="content" id="content" rows="6" class="form-control"></textarea><div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div></div>';
                html+='</div>';
            }else{
                html+='<div class="form-group attributeType"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>';
                html+='<div class="col-md-8"><textarea name="content" id="content" rows="6" class="form-control">'+value+'</textarea><div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div></div>';
                html+='</div>'; 
            }
            html+='<div class="form-group"><label class="col-md-3 control-label">排序</label><div class="col-md-8"><input type="number" class="form-control" id="edit_sort" value="'+sort+'"></div></div>';
            html+='</form>';

            util.confirm('编辑属性', html, function () {
                var attributeName = this.$content.find('#attributeName').val();
                var push_type = this.$content.find('input[name="push_type"]:checked').val();
                if(push_type==2 || push_type==3){
                    var arr = this.$content.find("#content").val().split(/[(\r\n)\r\n]+/);
                    var contents = '';
                    for(var i = 0; i < arr.length; i++){
                        if(arr[i]){
                            contents += ',' + arr[i];
                        }
                    }
                    contents = contents.substr(1);
                }else{
                    var contents ='-';
                }
                var edit_sort = this.$content.find("#edit_sort").val();

                // 增加验证
                if(attributeName==''){
                    util.message('请输入属性名称','danger');
                    return false;
                }
                if(push_type==2 || push_type==3){
                    if(contents==''){
                        util.message('请输入属性值','danger');
                        return false;
                    }
                }
                var data_obj = $(".value_data");
                var data_obj_arr = [];

                data_obj.each(function (i) {
                    if (data_obj.eq(i) != '') {
                        data_obj_arr.push($(this).find('.editAttributeItem').data('name').toString());
                    }
                });

                for(var i=0;i<data_obj_arr.length;i++){
                    if(data_obj_arr[i]==name){
                        data_obj_arr.splice(i, 1);
                    }
                }

                if($.inArray(attributeName,data_obj_arr) != '-1'){
                    util.message('属性名称重复，请重新填写','danger');
                    return false;
                }
                 if(push_type==1){
                     var push_type_text = '输入框';
                 }else if(push_type==2){
                     var push_type_text = '单选框';
                 }else{
                     var push_type_text = '复选框';
                 }
                
                var tpl = '';
                tpl += '<td>'+edit_sort+'</td>';
                tpl += '<td>'+attributeName+'</td>';
                tpl += '<td>'+contents+'</td>';
                tpl += '<td>'+push_type_text+'</td>';
                tpl += '<td class="operationLeft fs-0"><a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="'+edit_sort+'" data-name="'+attributeName+'" data-value="'+contents+'" data-type="'+push_type+'" data-type-text="'+push_type_text+'">编辑</a><a href="javascript:void(0);" class="btn-operation text-red1">删除</a></td>';

                _this.parents('tr').html(tpl);
                $('.attributeType').hide();
            }, 'large')
        })
        // 删除属性
        $('body').on('click','.text-red1',function(){
            var _this=$(this);
            util.alert('确定删除该属性吗？',function(){
                _this.parents('tr').remove();
            })
        })

        $('body').on('change', 'input[name="push_type"]', function () {
            var val = $(this).val();
            if (val == 1) {
                $('.attributeType').hide();
            } else {
                $('.attributeType').show();
            }
        })

        //规格添加移除效果
        //选择
        $("body").on("click", "input[name='un_specid']", function () {
            $(this).parent().parent().remove(); //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html =
                '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_specid[]" value="' +
                val + '" data_name="' + name + '" checked>' + name + '</label></div>';
            $("#spec_id").append(html); //添加到右边
            // 已选规格数组增加
            var obj = {};
            obj.value = val;
            obj.name = name;
            specSelected.push(obj);
            //未选规格数组减少
            for (var i = 0; i < specSelect.length; i++) {
                if (val == specSelect[i].value) {
                    specSelect.splice(i, 1);
                }
            }

        });
        //取消
        $("body").on('click', "input[name='select_specid[]']", function () {
            $(this).parent().parent().remove(); //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html =
                '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_specid" value="' +
                val + '" data_name="' + name + '">' + name + '</label></div>';
            $("#unspec_id").append(html); //添加到右边
            //已选规格数组减少
            for (var i = 0; i < specSelected.length; i++) {
                if (val == specSelected[i].value) {
                    specSelected.splice(i, 1);
                }
            }
            // 未选规格数组增加
            var obj = {};
            obj.value = val;
            obj.name = name;
            specSelect.push(obj);


        });
        // 规格全选
        $('input[name="specificationAllCheck"]').on('change', function () {
            if ($(this).is(':checked')) {
                $('input[name="un_specid"]').each(function () {
                    $(this).parent().parent().remove(); //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html =
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_specid[]" value="' +
                        val + '" data_name="' + name + '" checked>' + name + '</label></div>';
                    $("#spec_id").append(html); //添加到右边
                    // 已选规格数组增加
                    var obj = {};
                    obj.value = val;
                    obj.name = name;
                    specSelected.push(obj);
                    //未选规格数组减少
                    for (var i = 0; i < specSelect.length; i++) {
                        if (val == specSelect[i].value) {
                            specSelect.splice(i, 1);
                        }
                    }
                })
            } else {
                $('input[name="select_specid[]"]').each(function () {
                    $(this).parent().parent().remove(); //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html =
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_specid" value="' +
                        val + '" data_name="' + name + '">' + name + '</label></div>';
                    $("#unspec_id").append(html); //添加到右边
                    //已选规格数组减少
                    for (var i = 0; i < specSelected.length; i++) {
                        if (val == specSelected[i].value) {
                            specSelected.splice(i, 1);
                        }
                    }
                    // 未选规格数组增加
                    var obj = {};
                    obj.value = val;
                    obj.name = name;
                    specSelect.push(obj);

                })
            }
        })

        //  已选规格搜索
        $("#spec_txt2").on('keyup', function () {
            var val = $(this).val();
            var html = '';
            for (var i = 0; i < specSelected.length; i++) {
                var names = specSelected[i].name;
                if (names.indexOf(val) != -1) {
                    html +=
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_specid[]" value="' +
                        specSelected[i].value + '" data_name="' + specSelected[i].name + '" checked>' +
                        specSelected[i].name + '</label></div>';
                }
            }
            //  if(html==''){
            //      html='搜索不到规格值';
            //  }
            $("#spec_id").html(html);
        });
        //  未选规格搜索
        $("#spec_txt").on('keyup', function () {
            var val = $(this).val();
            var html = '';
            for (var i = 0; i < specSelect.length; i++) {
                var names = specSelect[i].name;
                if (names.indexOf(val) != -1) {
                    html +=
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_specid" value="' +
                        specSelect[i].value + '" data_name="' + specSelect[i].name + '">' + specSelect[
                            i].name + '</label></div>';
                }
            }
            //  if(html==''){
            //      html='搜索不到规格值';
            //  }
            $("#unspec_id").html(html);
            if (specSelect.length > 0) {
                $("input[name='specificationAllCheck']").attr('checked', false);
            } else {
                $("input[name='specificationAllCheck']").attr('checked', true);
            }
        })

        //  未选品牌搜索
        $("#brand_txt").on('keyup', function () {
            var val = $(this).val();
            var html = '';
            for (var i = 0; i < brandSelect.length; i++) {
                var names = brandSelect[i].name;
                if (names.indexOf(val) != -1) {
                    html +=
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="' +
                        brandSelect[i].value + '" data_name="' + brandSelect[i].name + '">' +
                        brandSelect[i].name + '</label></div>';
                }
            }
            //  if(html==''){
            //      html='搜索不到品牌';
            //  }
            $("#unbrand_id").html(html);
            if (brandSelect.length > 0) {
                $("input[name='brandAllCheck']").attr('checked', false);
            } else {
                $("input[name='brandAllCheck']").attr('checked', true);
            }
        })
        //  已选品牌搜索
        $("#brand_txt_selected").on('keyup', function () {
            var val = $(this).val();
            var html = '';
            for (var i = 0; i < brandSelected.length; i++) {
                var names = brandSelected[i].name;
                if (names.indexOf(val) != -1) {
                    html +=
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="' +
                        brandSelected[i].value + '" data_name="' + brandSelected[i].name + '" checked>' +
                        brandSelected[i].name + '</label></div>';
                }
            }
            //  if(html==''){
            //      html='搜索不到品牌';
            //  }
            $("#brand_id").html(html);
        })




        //品牌
        $("body").on("click", "input[name='un_brandid']", function () {
            $(this).parent().parent().remove(); //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html =
                '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="' +
                val + '" data_name="' + name + '" checked>' + name + '</label></div>';
            $("#brand_id").append(html); //添加到右边
            // 已选品牌数组增加
            var obj = {};
            obj.value = val;
            obj.name = name;
            brandSelected.push(obj);
            //未选品牌数组减少
            for (var i = 0; i < brandSelect.length; i++) {
                if (val == brandSelect[i].value) {
                    brandSelect.splice(i, 1);
                }
            }
        });
        //取消
        $("body").on('click', "input[name='select_brand[]']", function () {
            $(this).parent().parent().remove(); //移动左边
            var val = $(this).val();
            var name = $(this).attr('data_name');
            var html =
                '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="' +
                val + '" data_name="' + name + '">' + name + '</label></div>';
            $("#unbrand_id").append(html); //添加到右边
            //已选品牌数组减少
            for (var i = 0; i < brandSelected.length; i++) {
                if (val == brandSelected[i].value) {
                    brandSelected.splice(i, 1);
                }
            }
            // 未选品牌数组增加
            var obj = {};
            obj.value = val;
            obj.name = name;
            brandSelect.push(obj);
        });
        // 品牌全选
        $('input[name="brandAllCheck"]').on('change', function () {
            if ($(this).is(':checked')) {
                $('input[name="un_brandid"]').each(function () {
                    $(this).parent().parent().remove(); //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html =
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="select_brand[]" value="' +
                        val + '" data_name="' + name + '" checked>' + name + '</label></div>';
                    $("#brand_id").append(html); //添加到右边
                    // 已选品牌数组增加
                    var obj = {};
                    obj.value = val;
                    obj.name = name;
                    brandSelected.push(obj);
                    //未选品牌数组减少
                    for (var i = 0; i < brandSelect.length; i++) {
                        if (val == brandSelect[i].value) {
                            brandSelect.splice(i, 1);
                        }
                    }

                })
            } else {
                $('input[name="select_brand[]"]').each(function () {
                    $(this).parent().parent().remove(); //移动左边
                    var val = $(this).val();
                    var name = $(this).attr('data_name');
                    var html =
                        '<div class="checkbox line-1-ellipsis"><label><input type="checkbox" name="un_brandid" value="' +
                        val + '" data_name="' + name + '">' + name + '</label></div>';
                    $("#unbrand_id").append(html); //添加到右边
                    //已选品牌数组减少
                    for (var i = 0; i < brandSelected.length; i++) {
                        if (val == brandSelected[i].value) {
                            brandSelected.splice(i, 1);
                        }
                    }
                    // 未选品牌数组增加
                    var obj = {};
                    obj.value = val;
                    obj.name = name;
                    brandSelect.push(obj);

                })
            }
        });

        // 分类名称搜索
        $("#category_txt_selected").on('keyup', function () {
            var val = $(this).val();
            if(val==''){
                $('.item_chek').removeClass('hide');
                $('.checkbox_first').removeClass('hide');
                $('.checkbox_seconds').removeClass('hide');
                $('.checkbox_three').removeClass('hide');
            }else{
                $('.item_chek').addClass('hide');
                $('.checkbox_first').addClass('hide');
                $('.checkbox_seconds').addClass('hide');
                $('.checkbox_three').addClass('hide');
                $('.checkOne').each(function(i,e){
                    var name0 = $(this).data('name')+ '';
                    if (name0.indexOf(val) != -1) {
                        $(e).parents('.item_chek').removeClass('hide');
                        $(e).parents('.checkbox_first').removeClass('hide');
                    }
                });
                $('.checkTwo').each(function(i,e){
                    var name1 = $(this).data('name')+ '';
                    if (name1.indexOf(val) != -1) {
                        $(e).parents('.item_chek').removeClass('hide');
                        $(e).parents('.checkbox_seconds').removeClass('hide');
                        $(e).parents('.checkbox_seconds').siblings('.checkbox_first').removeClass('hide');
                    }
                });
                $('.checkThree').each(function(i,e){
                    var name2 = $(this).data('name')+ '';
                    if (name2.indexOf(val) != -1) {
                        $(e).parents('.item_chek').removeClass('hide');
                        $(e).parents('.checkbox_three').removeClass('hide');
                        $(e).parents('.checkbox_seconds').removeClass('hide');
                        $(e).parents('.checkbox_seconds').siblings('.checkbox_first').removeClass('hide');
                    }
                });
            }

        })


        var flag = false; //防止重复提交
        util.validate($('.form-validate'), function (form) {
            var attr_name = $.trim($("#attr_name").val());
            var sort = $("#sort").val();
            if ($("#is_visible").prop("checked")) {
                var is_visible = 1;
            } else {
                var is_visible = 0;
            }

            //获取品牌ID
            var brand_id_arr = [];
            for (var i = 0; i < brandSelected.length; i++) {
                brand_id_arr.push(brandSelected[i].value);
            }
            var brand_id = brand_id_arr.join(",");

            var spec_id_arr = [];
            for (var i = 0; i < specSelected.length; i++) {
                spec_id_arr.push(specSelected[i].value);
            }
            var spec_id = spec_id_arr.join(",");


            var data_obj = $(".value_data");
            var data_obj_str = '';

            data_obj.each(function (i) {
                if (data_obj.eq(i) != '') {
                    var value_sort = $(this).find('.editAttributeItem').data('sort');
                    var value_name = $(this).find('.editAttributeItem').data('name');
                    var type = $(this).find('.editAttributeItem').data('type');
                    var value = $(this).find('.editAttributeItem').data('value');
                    if (type > 1) {
                        if (value == '') {
                            $(this).find('.editAttributeItem').focus();
                            util.message("类型为单选框或复选框时，属性值不能为空");
                            return false;
                        }
                    }
                    var new_str = '';
                    new_str = value_name + '|' + type + '|' + value_sort + '|1|' + value;
                    data_obj_str = data_obj_str + ';' + new_str;
                }
            });
            data_obj_str = data_obj_str.substr(1);
            var data_obj_arr = data_obj_str.split('|');
            if (data_obj_arr[0] == '') {
                util.message("商品品类属性名称或属性值不能为空！");
                return false;
            }
            var cate_obj = $('input[name=module_chek]:checked');
            var cate_obj_arr = [];
            cate_obj.each(function(i){
                cate_obj_arr.push($(this).val());
            });
            if (flag) {
                return false;
            }
            flag = true;
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/addattributeservice'); ?>",
                data: {
                    'attr_name': attr_name,
                    'sort': sort,
                    'is_visible': is_visible,
                    'spec_id': spec_id,
                    "brand_id": brand_id,
                    'data_obj_str': data_obj_str,
                    'cate_obj_arr': cate_obj_arr
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message("添加成功", 'success',
                            "<?php echo __URL('PLATFORM_MAIN/goods/attributelist'); ?>");
                    } else {
                        util.message(data['message'], 'danger');
                        flag = false;
                    }
                }
            });
        })
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

