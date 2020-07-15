<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"template/platform/Goods/selfGoodsList.html";i:1591330109;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            
<style>
    .label-danger a{padding-top:5px;}
    #editIcon-pa{
        position: absolute;
        right: 0;
        top: 10px;
        width: 18px;
        height: 18px;
        display: none;
    }
    .editChange{position: relative;cursor: pointer;}
    .editChange:hover #editIcon-pa {
        display: block;
    }
</style>
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">商品分类</label>
                    <div class="v__controls">
                        <input type="text" id="select_cname" name="select_cname" class="v__control_input J-selectCategory" placeholder="请选择分类" autocomplete="off">
                    </div>
                    <input type="hidden" id="category_id_1" name="category_id_1" autocomplete="off">
                    <input type="hidden" id="category_id_2" name="category_id_2" autocomplete="off">
                    <input type="hidden" id="category_id_3" name="category_id_3" autocomplete="off">
                    <input type="hidden" id="select_name_hidden" name="select_name_hidden" autocomplete="off">
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品名称</label>
                    <div class="v__controls">
                        <input type="text" id="goods_name" class="v__control_input" placeholder="请输入商品名称" autocomplete="off">
                    </div>
                </div>
                <?php if(($distributionStatus==1)): ?>
                <div class="v__control-group">
                    <label class="v__control-label">分销信息</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="is_distribution">
                            <option value="">全部</option>
                            <option value="1">参与分销</option>
                            <option value="2">不参与分销</option>
                            <option value="3">参与分销并设置商品独立规则</option>
                        </select>
                    </div>
                </div>
                <?php endif; if(($globalStatus==1 || $areaStatus==1 || $teamStatus==1)): ?>
                <div class="v__control-group">
                    <label class="v__control-label">分红信息</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="is_bonus">
                            <option value="">全部</option>
                            <option value="1">参与分红</option>
                            <option value="2">不参与分红</option>
                            <option value="3">参与分红并设置商品独立规则</option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
                <div class="v__control-group">
                    <label class="v__control-label">商品标签</label>
                    <div class="v__controls">
                    	<div class="checkbox_three" style="margin-top: 6px;">
                            <label class="checkbox-inline"><input type="checkbox" name="label_list" value="1">推荐</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="2">新品</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="3">热卖</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="4">促销</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="5">包邮</label>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary search"><i class="icon icon-search"></i>搜索</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- page -->
<ul class="nav nav-tabs v-nav-tabs fs-12">
    <li role="presentation" <?php if(!$type): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist'); ?>" class="flex-auto-center">全部<br><span class="J-all"></span></a></li>
    <li role="presentation" <?php if($type == 1): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist','type=1'); ?>" class="flex-auto-center">出售中<br><span class="J-online"></span></a></li>
    <li role="presentation" <?php if($type == 2): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist','type=2'); ?>" class="flex-auto-center">仓库中<br><span class="J-offline"></span></a></li>
    <li role="presentation" <?php if($type == 3): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist','type=3'); ?>" class="flex-auto-center">已售聲<br><span class="J-soldout"></span></a></li>
    <li role="presentation" <?php if($type == 4): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist','type=4'); ?>" class="flex-auto-center">库存预警<br><span class="J-alarm"></span></a></li>
</ul>
<div class="mb-10 flex flex-pack-justify">
    <div class="">
        <a href="<?php echo __URL('PLATFORM_MAIN/goods/addgoods'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 发布商品</a>
        <!--<a class="btn btn-default" href="javascript:void(0);">
            <label class="checkbox-inline">
                <input type="checkbox" id="checkAll">全选
            </label>
        </a>-->
        <?php if(($goodhelperStatus==1)): ?>
        <a href="<?php echo __URL('PLATFORM_MAIN/addonslist/menu_addonslist?addons=goodImportHelper'); ?>" class="btn btn-success" target="_blank">商品助手导入</a>
        <?php endif; ?>
        <a class="btn btn-default online" href="javascript:void(0);">上架</a>
        <a class="btn btn-default outline" href="javascript:void(0);">下架</a>
        <a class="btn btn-default deleteGood" href="javascript:void(0);">删除</a>
    </div>
</div>
<table class="table v-table table-auto-center" id="selfGoodsList">
    <thead>
    <tr>
        <th><input type="checkbox" id="checkAll"></th>
        <th>ID</th>
        <th class="col-md-4">商品</th>
        <th>售价</th>
        <th>原价</th>
        <th>库存</th>
        <th>状态</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody id="goods_list">

    </tbody>
</table>
<input type="hidden" id="pageIndex">
<input type="hidden" id="type" value="<?php echo $type; ?>">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>
<!-- page end  -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util','sotr-selector'],function(util){
        //全选
        util.initPage(LoadingInfo);
        function LoadingInfo(page_index) {
            var start_date = $("#startDate").val();
            var end_date = $("#endDate").val();
//      var state = $("#state").val();
            var goods_name = $("#goods_name").val();
            var category_id_1 = $("#category_id_1").val();
            var category_id_2 = $("#category_id_2").val();
            var category_id_3 = $("#category_id_3").val();
            var type = $("#type").val();
            var selectGoodsLabelId = $("#selectGoodsLabelId").val();
            var supplier_id = $("#supplier_id").val();
            var is_distribution = $("#is_distribution").val();
            var is_bonus = $("#is_bonus").val();
            var label_list = '';
            $("input[name ='label_list']:checked").each(function(){
            	label_list += $(this).val()+',';
            });
            $("#pageIndex").val(page_index);
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist'); ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "start_date": start_date,
                    "end_date": end_date,
//              "state": state,
                    "goods_name": goods_name,
                    "category_id_1": category_id_1,
                    "category_id_2": category_id_2,
                    "category_id_3": category_id_3,
                    "selectGoodsLabelId": selectGoodsLabelId,
                    "supplier_id": supplier_id,
                    "is_distribution": is_distribution,
                    "is_bonus": is_bonus,
                    "label_list": label_list,
                    "type":type
                },
                success: function (data) {
                    getgoodscount();
                    var html = '';
                    var distributionStatus = <?php echo json_encode($distributionStatus); ?>;
                    var globalStatus = <?php echo json_encode($globalStatus); ?>;
                    var areaStatus = <?php echo json_encode($areaStatus); ?>;
                    var teamStatus = <?php echo json_encode($teamStatus); ?>;
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<tr data-goodsid="'+data["data"][i]["goods_id"]+'">';
                            }else{
                                html += '<tr data-goodsid="'+data["data"][i]["goods_id"]+'" title="规格商品暂不支持快速编辑价格">';
                            }
                            html += '<td>';
                            // html += '<input type="checkbox" value="\' + data["data"][i]["goods_id"] + \'" name="sub" data-state="\' + data["data"][i]["state"] + \'" type="checkbox">';
                            html += '<input value="' + data["data"][i]["goods_id"] + '" data-promotion_type="' + data["data"][i]["promotion_type"] + '" name="sub" data-state="' + data["data"][i]["state"] + '" type="checkbox">';
                            html += '</td>';
                            html += '<td>' + data["data"][i]["goods_id"] + '</td>';
                            html += '<td class="picword_td show_goodsname editChange">';
                            html += '<div class="media text-left ">';
                            html += '<div class="editIcon-pa" id="editIcon-pa">';
                            html += '<i class="icon icon-edit" data-name="'+data["data"][i]["goods_name"]+'"></i>';
                            
                            html += '</div>';
                            html += '<div class="media-left"><p><img src="' + __IMG(data["data"][i]["pic_cover"]) + '" style="width:60px;height:60px;"></p></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis line-title">';
                            html += '<a class="a-goods-title" href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '" target="_blank">' + data["data"][i]["goods_name"] + '</a>';
                            html += '<textarea class="editTextarea edit_goods_name" value="'+data["data"][i]  ["goods_name"]+'" style="height:40px;width: 300px;display: none">'+data["data"][i]["goods_name"]+'</textarea>';
                            html += '</div>';
                            html += '<div class="small-muted line-2-ellipsis"> </div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</td>';
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<td class="goodsEdit">';
                            }else{
                                html += '<td>';
                            }
                            html += '<span class="editSpan">￥' + data["data"][i]["price"] + '</span>';
                            html += '<input type="text" class="edit_price  editInput3" value="' + data["data"][i]["price"] + '" style="width: 30%;display: none">';
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<span class="editIcon show_promotion_price"><i class="icon icon-edit"></i></span>';
                            }
                            else{
                                html += '<span class="editIcon1"><i class="icon icon-edit"></i></span>';
                            }
                            html += '</td>';

                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<td class="goodsEdit">';
                            }else{
                                html += '<td>';
                            }
                            html += '<span class="editSpan">￥' + data["data"][i]["market_price"] + '</span>';
                            html += '<input type="text" class="edit_market_price editInput3" value="' + data["data"][i]["market_price"] + '" style="width: 30%;display: none">';
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<span class="editIcon show_price"><i class="icon icon-edit"></i></span>';
                            }
                            else{
                                html += '<span class="editIcon1"><i class="icon icon-edit"></i></span>';
                            }

                            html += '</td>';
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<td class="goodsEdit">';
                            }else{
                                html += '<td>';
                            }
                            html += '<span class="editSpan">' + data["data"][i]["stock"] + '</span>';
                            html += '<input type="text" class="edit_stock editInput3" value="' + data["data"][i]["stock"] + '" style="width: 30%;display: none">';
                            if(data["data"][i]["goods_spec_format"].length<10){
                                html += '<span class="editIcon show_stock"><i class="icon icon-edit"></i></span>';
                            }
                            else{
                                html += '<span class="editIcon1"><i class="icon icon-edit"></i></span>';
                            }
                            html += '</td>';
                            html += '<td>';
                            if (data["data"][i]["state"] == 1) {
                                html += '<a class="label label-success outline" data-id="'+data["data"][i]["goods_id"]+'" href="javascript:void(0);" >上架</a>';
                            }else{
                                html += '<a class="label label-danger online" data-id="'+data["data"][i]["goods_id"]+'" href="javascript:void(0);" >下架</a>';
                            }
                            html += '</td>';

                            html += '<td class="operationLeft fs-0">';
                            html += '<a class="btn-operation" href="javascript:;" data-promotion_type="' + data["data"][i]["promotion_type"] + '" data-promotion_name="' + data["data"][i]["promotion_name"] + '" data-goods_id="'+data["data"][i]["goods_id"]+'" id="goods_edit">编辑</a>';
                            // html +='<a class="btn-operation copy" href="javascript:void(0);"  data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '">复制链接</a>';
                            html +='<a class="btn-operation link-pr" data-wplatform="' + data["data"][i]["wplatForm"] + '" data-wurl="' + data["data"][i]["wurl"] + '" data-goods_id="' + data["data"][i]["goods_id"] + '" href="javascript:void(0);" > <span>链接</span> <div class="link-pos"> </div> </a>';
                            html +='<a class="btn-operation deleteGood text-red1" data-id="' + data["data"][i]["goods_id"] + '" data-promotion_type="' + data["data"][i]["promotion_type"] + '" data-promotion_name="' + data["data"][i]["promotion_name"] + '" href="javascript:void(0)">删除</a>';

                            util.copy();
                            html += '</td>';
                            html += '</tr>';
							html += '<tr class="title-tr"><td colspan="8" class="text-right" style="border-top:0;">';
                            if(data["data"][i]["wplatForm"]){
								html += '<span class="label " style="background-color:#ff8d1a;">'+data["data"][i]["wplatForm"]+'采集</span>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_distribution"]==1 && data["data"][i]["distribution_rule"]!=1 && distributionStatus==1){
								html += '<span class="label label-skyBlue">参与分销</span>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_distribution"]==1 && data["data"][i]["distribution_rule"]==1 && distributionStatus==1){
								html += '<span class="label label-skyBlue">参与分销并设置商品独立规则</span>&nbsp;-&nbsp;';
							}
							if(((data["data"][i]["is_bonus_global"]==1 && globalStatus==1) || (data["data"][i]["is_bonus_area"]==1 && areaStatus==1) || (data["data"][i]["is_bonus_team"]==1 && teamStatus==1)) && data["data"][i]["bonus_rule"]!=1){
								html += '<span class="label label-skyBlue">参与分红</span>&nbsp;-&nbsp;';
							}
							if(((data["data"][i]["is_bonus_global"]==1 && globalStatus==1) || (data["data"][i]["is_bonus_area"]==1 && areaStatus==1) || (data["data"][i]["is_bonus_team"]==1 && teamStatus==1)) && data["data"][i]["bonus_rule"]==1){
								html += '<span class="label label-skyBlue">参与分红并设置商品独立规则</span>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_recommend"]==1){
								html += '<a href="javascript:void(0);" class="label label-red labels" data-label="recommend" data-id="'+data["data"][i]["goods_id"]+'">推荐</a>&nbsp;-&nbsp;';
							}else{
								html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="recommend" data-id="'+data["data"][i]["goods_id"]+'">推荐</a>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_new"]==1){
								html += '<a href="javascript:void(0);" class="label label-red labels" data-label="new" data-id="'+data["data"][i]["goods_id"]+'">新品</a>&nbsp;-&nbsp;';
							}else{
								html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="new" data-id="'+data["data"][i]["goods_id"]+'">新品</a>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_hot"]==1){
								html += '<a href="javascript:void(0);" class="label label-red labels" data-label="hot" data-id="'+data["data"][i]["goods_id"]+'">热卖</a>&nbsp;-&nbsp;';
							}else{
								html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="hot" data-id="'+data["data"][i]["goods_id"]+'">热卖</a>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_promotion"]==1){
								html += '<a href="javascript:void(0);" class="label label-red labels" data-label="promotion" data-id="'+data["data"][i]["goods_id"]+'">促销</a>&nbsp;-&nbsp;';
							}else{
								html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="promotion" data-id="'+data["data"][i]["goods_id"]+'">促销</a>&nbsp;-&nbsp;';
							}
							if(data["data"][i]["is_shipping_free"]==1){
								html += '<a href="javascript:void(0);" class="label label-red labels" data-label="shipping_free" data-id="'+data["data"][i]["goods_id"]+'">包邮</a>';
							}else{
								html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="shipping_free" data-id="'+data["data"][i]["goods_id"]+'">包邮</a>';
							}
							html += '</td></tr>';
                        }
                    } else {
                        html += '<tr align="center"><td colspan="8" class="h-200">暂无符合条件的数据记录</td></tr>';
                    }
                    $("#goods_list").html(html);
                    util.tips();
                    var totalpage = $("#page_count").val();
                    if (totalpage == 1) {
                        changeClass("all");
                    }
                        $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#pageNumber").append(html);
                    goodListEdit();
                }
            });
        }
        $("#checkAll").on('click',function(){
            $("#selfGoodsList input[type = 'checkbox']").prop("checked", this.checked);
        })

        //搜索
        $('.search').on('click',function(){
            util.initPage(LoadingInfo);
        });
        //分类
        $('body').on('click','.J-selectCategory', function () {
            setCategory();
        });
        function setCategory(){
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectcategory'); ?>";
            util.confirm('选择分类','url:'+url, function () {
                var cid1 = this.$content.find('#selected_c1').val();
                var cid2 = this.$content.find('#selected_c2').val();
                var cid3 = this.$content.find('#selected_c3').val();
                var cname = this.$content.find('#selected_cn').val();
                $("#category_id_1").val(cid1);
                $("#category_id_2").val(cid2);
                $("#category_id_3").val(cid3);
                $("#select_cname").val(cname);
                $("#select_name_hidden").val(cname);
            },'large');
        }
        $('body').on('click','#goods_edit',function(){
            var promotion_type = $(this).data('promotion_type');
            var promotion_name = $(this).data('promotion_name');
            if(promotion_name === ''){
                promotion_name = '活动';
            }
            var goods_id = $(this).data('goods_id');
            // if(!promotion_type){
            //     window.location.href = __URL('PLATFORM_MAIN/goods/addgoods?goods_id='+goods_id);
            // }else{
            //     util.message('该商品参加了' + promotion_name + '，不能编辑',"danger");
            // }
            // by sgw 这个不判断，进入里面判断
            window.location.href = __URL('PLATFORM_MAIN/goods/addgoods?goods_id='+goods_id);
            //'+__URL('PLATFORM_MAIN/goods/addgoods?goods_id='+data["data"][i]["goods_id"])+'
        })
        //删除商品02081650907

        $("body").on('click','.deleteGood',function(){
            var goodsId = [];
            if($(this).data('id')&&!isNaN($(this).data('id'))){
                var promotion_type = $(this).data('promotion_type');
                var promotion_name = $(this).data('promotion_name');
                if(promotion_name === ''){
                    promotion_name = '活动';
                }
                if(promotion_type){
                    util.message('该商品参加了' + promotion_name + '，不能删除',"danger");
                    return false;
                }
                goodsId.push($(this).data('id'));
            }else{
                var has_promote = false;
                $("#selfGoodsList input[type = 'checkbox']:checked").each(function(){
                    if(!$(this).data('promotion_type')){
                        if (!isNaN($(this).val())) {
                            goodsId.push($(this).val());
                        }
                    }else{
                        $(this).attr('checked',false);
                        has_promote = true;
                    }
                });
            }
            
            if(goodsId.length==0){
                util.message('请选择需要删除的商品','danger');
                return false;
            }
            util.alert('是否删除此商品？',function(){
                //util.message('删除的商品id='+goodsId)
                $('#checkAll').prop('checked',false);
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/goods/deletegoods'); ?>",
                    data: {"goods_ids": goodsId.toString()},
                    dataType: "json",
                    async : true,
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                        }else{
                            util.message(data["message"],'danger',LoadingInfo($('#pageIndex').val()));
                        }
                    }
                })

            })

        })


        //快速编辑
        function goodListEdit(){

            //售价
            $(".goodsEdit").on("click",".show_promotion_price",function(){
                $(this).siblings(".editSpan").hide();
                $(this).siblings(".edit_price").show();
                $(this).siblings(".edit_price").focus();
                //  $(this).addClass("visible");
            });
            $(".goodsEdit").on("blur",".edit_price",function(){
                var id = $(this).parent().parent().attr("data-goodsid");
                var price = Number($(this).val());
                var value = $(this).prev();
                $(this).siblings(".editSpan").show();
                $(this).hide();
                $(this).siblings(".editIcon").removeClass("visible");
                $.ajax({
                    type: "post",
                    data:{
                        "id":id,
                        "price":price,
                        "market_price":0,
                        "stock":0

                    },
                    url: "<?php echo __URL('PLATFORM_MAIN/goods/quikly_edit'); ?>",
                    success: function (data) {
                        if(data['code']){
                            util.message(data['message'],'danger');
                        }else{
                            value.html("￥"+price+".00");
                        }
                    }
                })
            })

            //市场价
            $(".goodsEdit").on("click",".show_price",function(){
                $(this).siblings(".editSpan").hide();
                $(this).siblings(".edit_market_price").show();
                $(this).siblings(".edit_market_price").focus();
                //  $(this).addClass("visible");
            });
            $(".goodsEdit").on("blur",".edit_market_price",function(){
                var id = $(this).parent().parent().attr("data-goodsid");
                var market_price = Number($(this).val());
                var value = $(this).prev();
                $(this).siblings(".editSpan").show();
                $(this).hide();
                $(this).siblings(".editIcon").removeClass("visible");
                $.ajax({
                    type: "post",
                    data:{
                        "id":id,
                        "price":0,
                        "market_price":market_price,
                        "stock":0
                    },
                    url: "<?php echo __URL('PLATFORM_MAIN/goods/quikly_edit'); ?>",
                    success: function (data) {
                        if(data['code']){
                            util.message(data['message'],'danger');
                        }else{
                            value.html(market_price);
                        }
                    }
                })
            })

            //库存
            $(".goodsEdit").on("click",".show_stock",function(){
                $(this).siblings(".editSpan").hide();
                $(this).siblings(".edit_stock").show();
                $(this).siblings(".edit_stock").focus();
                //  $(this).addClass("visible");
            });
            $(".goodsEdit").on("blur",".edit_stock",function(){
                var id = $(this).parent().parent().attr("data-goodsid");
                var stock = Number($(this).val());
                var value = $(this).prev();
                $(this).siblings(".editSpan").show();
                $(this).hide();
                $(this).siblings(".editIcon").removeClass("visible");
                $.ajax({
                    type: "post",
                    data:{
                        "id":id,
                        "price":0,
                        "market_price":0,
                        "stock":stock
                    },
                    url: "<?php echo __URL('PLATFORM_MAIN/goods/quikly_edit'); ?>",
                    success: function (data) {
                        if(data['code']){
                            util.message(data['message'],'danger');
                        }else{
                            value.html(stock);
                        }
                    }
                })
            })


            //商品名
            $(".editChange").on("click",function(){
                $(this).children(".media").find(".line-title").children("a").hide().siblings(".edit_goods_name").show();
                $(this).children(".media").find(".line-title").children("a").hide().siblings(".edit_goods_name").focus();
                //  $(this).addClass("visible");
            });
            $(".editChange").on("blur",".edit_goods_name",function(){
                var id = $(this).parent().parent().parent().parent().parent().attr("data-goodsid");
                var name = $(this).val();
                $(this).hide();
                $(this).parents(".media").find(".line-title").children("a").show();
                $.ajax({
                    type: "post",
                    data:{
                        "id":id,
                        "goods_name":name,
                    },
                    url: "<?php echo __URL('PLATFORM_MAIN/goods/quikly_edit'); ?>",
                    success: function () {
                    }
                })
                $(this).prev().html(name);
            })
        }

        // 上架

        $("body").on('click', '.online', function(){
            var goodsId = [];
            if($(this).data('id')&&!isNaN($(this).data('id'))){
                goodsId.push($(this).data('id'));
            }else{
                $("#selfGoodsList input[type = 'checkbox']:checked").each(function(){
                    if (!isNaN($(this).val())) {
                        goodsId.push($(this).val());
                    }
                })
            }
            if(goodsId.length==0){
                util.message('请选择需要上架的商品','danger');
                return false;
            }
            $('#checkAll').prop('checked',false);
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/ModifyGoodsOnline'); ?>",
                data: {"goods_ids": goodsId.toString()},
                dataType: "json",
                async : true,
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                    }else{
                        util.message(data["message"],'danger',LoadingInfo($('#pageIndex').val()));
                    }
                }
            })
        })


        // 下架
        $('body').on('click', '.outline', function(){
            var goodsId = [];
            if($(this).data('id')&&!isNaN($(this).data('id'))){
                goodsId.push($(this).data('id'));
            }else{
                $("#selfGoodsList input[type = 'checkbox']:checked").each(function(){
                    if (!isNaN($(this).val())) {
                        goodsId.push($(this).val());
                    }
                })
            }
            
            if(goodsId.length==0){
                util.message('请选择需要下架的商品','danger');
                return false;
            }
            $('#checkAll').prop('checked',false);
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/ModifyGoodsOffline'); ?>",
                data: {"goods_ids": goodsId.toString()},
                dataType: "json",
                async : true,
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                    }else{
                        util.message(data["message"],'danger',LoadingInfo($('#pageIndex').val()));
                    }
                }
            })

        })

        
        //获取商品各种状态的数量
        function getgoodscount(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/getgoodscount'); ?>",
                success: function (data) {
                    $('.J-all').html('('+data.all+')');
                    $('.J-online').html('('+data.sale+')');
                    $('.J-offline').html('('+data.shelf+')');
                    $('.J-soldout').html('('+data.soldout+')');
                    $('.J-alarm').html('('+data.alarm+')');
                }
            })
        }
		//修改标签
        $('body').on('click', '.labels', function(){
            var label =  $(this).data('label');
            var id =  $(this).data('id');
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/goods/editLabel'); ?>",
                data: {"label": label,"goods_id":id},
                dataType: "json",
                async : true,
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',LoadingInfo($('#pageIndex').val()));
                    }else{
                        util.message(data["message"],'danger',LoadingInfo($('#pageIndex').val()));
                    }
                }
            })
        })
        //当经过链接的时候再加载二维码
        $('body').on('mouseover', '.link-pr', function(){
            if($(this).attr('mark')){
                return;
            }
            var goods_id = $(this).data('goods_id');
            var wurl = $(this).data('wurl');
            var wplatform = $(this).data('wplatform');
            var html = '<div class="link-arrow">' +
            ' <form class="form-horizontal"> ';
            if('<?php echo $wap_status; ?>' == 1){
                html += '<div class="form-group"> <label class="col-md-2 control-label">手机端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/wap/goods/detail/' + goods_id) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/wap/goods/detail/' + goods_id) + '">复制链接</span> </div> </div> </div>';
            }

            if('<?php echo $is_pc_use; ?>' == 1){
                html += ' <div class="form-group"> <label class="col-md-2 control-label">电脑端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '">复制链接</span> </div> </div> </div> ';
            }
            if('<?php echo $is_minipro; ?>' == 1){
                html += ' <div class="form-group"> <label class="col-md-2 control-label">小程序端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + 'pages/goods/detail/index?goodsId=' + goods_id + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + 'pages/goods/detail/index?goodsId=' + goods_id + '">复制链接</span> </div> </div> </div> ';
            }
            if(wurl && wplatform){
                html += ' <div class="form-group"> <label class="col-md-2 control-label">'+wplatform+'</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' +wurl + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' +wurl+'">复制链接</span> </div> </div> </div> ';
            }
            if('<?php echo $wap_status; ?>' == 1) {
                html += '</form> ' +
                    '<div class="flex link-flex"> ' +
                    '<div class="flex-1"> <div class="mb-04"><img src="' + __URL(PLATFORMMAIN + '/goods/getGoodsDetailQr') + '?goods_id=' + goods_id + '&qr_type=1&wap_path=/wap/goods/detail/" style="width: 100px;height: 100px"></div> <p>(手机端二维码)</p> </div> ';
            }
            if('<?php echo $is_minipro; ?>' == 1){
                html += '<div class="flex-1"> <div class="mb-04"><img src="'+ __URL(PLATFORMMAIN + '/goods/getGoodsDetailQr') +'?goods_id='+ goods_id +'&qr_type=2&mp_path=pages/goods/detail/index" style="width: 100px;height: 100px"></div> <p>(小程序二维码)</p> </div>';
            }
            html += ' </div> </div>';
            $(this).find('.link-pos').html(html);
            $(this).attr('mark', true);
            mark = true;
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

