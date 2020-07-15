<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:37:"template/platform/Goods/addGoods.html";i:1591330107;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
<!--tab栏切换-->
<ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
    <li role="presentation" class="active"><a href="#goods_info" aria-controls="goods_info" role="tab" data-toggle="tab" class="flex-auto-center">基本信息</a></li>
    <li role="presentation" class="hovers pay_content"><a href="#pay_content" aria-controls="pay_content" role="tab" data-toggle="tab" class="flex-auto-center pay_content">付费内容</a></li>
    <li role="presentation" class="spec_attribute"><a href="#goods_attribute" aria-controls="goods_attribute" role="tab" data-toggle="tab" class="flex-auto-center">规格/属性</a></li>
    <li role="presentation"><a href="#goods_detail" aria-controls="goods_detail" role="tab" data-toggle="tab" class="flex-auto-center">商品详情</a></li>
    <?php if($distributionExist==1 || $globalExist==1 || $areaExist==1 || $teamExist==1): ?>
    <li role="presentation"><a href="#distribution_bonus" aria-controls="distribution_bonus" role="tab" data-toggle="tab" class="flex-auto-center">分销分红</a></li>
    <?php endif; ?>
    <li role="presentation" class="hovers timing_rule"><a href="#timing_rule" aria-controls="timing_rule" role="tab" data-toggle="tab" class="flex-auto-center">计时/次规则</a></li>
    <li role="presentation" class="hovers wechat_card"><a href="#wechat_card" aria-controls="wechat_card" role="tab" data-toggle="tab" class="flex-auto-center">微信卡券</a></li>
    <li role="presentation"><a href="#integral_rule" aria-controls="integral_rule" role="tab" data-toggle="tab" class="flex-auto-center">营销抵扣</a></li>
    <li role="presentation"><a href="#discount_rule" aria-controls="discount_rule" role="tab" data-toggle="tab" class="flex-auto-center">权限折扣</a></li>
    <?php if($store == '1'): ?>
    <li role="presentation" class="cancel_store"><a href="#cancel_store" aria-controls="cancel_store" role="tab" data-toggle="tab" class="flex-auto-center">核销门店</a></li>
    <?php endif; ?>
    <li role="presentation" class="cancel_store"><a href="#goods_poster" aria-controls="cancel_store" role="tab" data-toggle="tab" class="flex-auto-center">商品海报</a></li>
    
</ul>
<form class="form-horizontal form-validate widthFixedForm">
    <div id="myTabContent" class="tab-content">

        <div class="tab-pane fade tab-1 active in" id="goods_info">
            <div class="screen-title2" data-id="t2">
                <span class="text">商品类型</span>
                <span class="text1">商品类型，商品保存后无法修改，请谨慎选择。</span>
            </div>

            <ul class="mb-20 type-select-radio clearfix goods-ts-radio">
                <li class="goodType1 active">
                    <div class="radio-label-div">
                        <div class="">
                            <div>实物商品</div>
                            <p class="p1">(物流发货/线下自提)</p>
                        </div>
                        <!--<img src="/public/platform/images/goodType6.png" alt="" class="">-->
                    </div>
                    <span class="icon-success-sel"><img src="/public/platform/images/goodTypeSel.png" alt=""></span>
                </li>
                <?php if($store == '1'): ?>
                <li class="goodType2">
                    <div class="radio-label-div">
                        <div class="">
                            <div>计时/次商品</div>
                            <p class="p1">(线下消费核销码)</p>
                        </div>
                    </div>
                    <span class="icon-success-sel"><img src="/public/platform/images/goodTypeSel.png" alt=""></span>
                </li>
                <?php endif; ?>

                <li class="goodType3">
                    <div class="radio-label-div">
                        <div class="">
                            <div>虚拟商品</div>
                            <p class="p1">(无需物流)</p>
                        </div>
                    </div>
                    <span class="icon-success-sel"><img src="/public/platform/images/goodTypeSel.png" alt=""></span>
                </li>

                <?php if($have_knowledgepayment == '1'): ?>
                <li class="goodType4">
                    <div class="radio-label-div">
                        <div class="">
                            <div>知识付费</div>
                            <p class="p1">(无需物流)</p>
                        </div>
                    </div>
                    <span class="icon-success-sel"><img src="/public/platform/images/goodTypeSel.png" alt=""></span>
                </li>
                <?php endif; ?>

            </ul>

            <div class="screen-title2" data-id="t2">
                <span class="text">基本信息</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 商品分类</label>
                <div class="col-md-5">
                    <input type="text" id="select_cname" name="select_cname" class="form-control J-selectCategory" placeholder="请选择分类" required>

                </div>
                <div class="col-sm-8" id="tbcNameCategory" data-flag="category" data-goods-id="0" cid="" data-attr-id="" cname="">
                    <input type="hidden" id="category_id_1" name="category_id_1">
                    <input type="hidden" id="category_id_2" name="category_id_2">
                    <input type="hidden" id="category_id_3" name="category_id_3">
                    <input type="hidden" id="select_name_hidden" name="select_name_hidden">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">其他分类</label>
                <div class="col-md-5">
                    <div class="other-category clearfix">
                        <!--<div class="field-item field-item-remove">订单类型<span><i class="fa fa-remove icon-danger icon"></i></span></div>-->
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 商品名称</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="title" required id="txtProductTitle" autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 销售价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" min="0" value="" step="0.01" name="txtProductSalePrice" id="txtProductSalePrice" required>
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后销售价需要在相应规格设置，商城将以该价格销售。</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 市场价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" min="0" value="" step="0.01" name="txtProductMarketPrice" id="txtProductMarketPrice" required>
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后市场价需要在相应规格设置，商城将以该价格划线展示突出与售价的差价。</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">成本价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" min="0" value="" step="0.01" id="txtProductCostPrice" name="txtProductCostPrice">
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后成本价需要在相应规格设置，该价格用于计算利润，请如实填写。</div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 总库存</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" min="0" name="txtProductCount" id="txtProductCount" required>
                        <span class="input-group-addon">件</span>
                    </div>
                    <div class="help-block mb-0">启用规格后总库存将自动统计规格所填写的库存</div>
                </div>
            </div>
            <div class="fold-btn mb-20"><i class="icon icon-drop-down mr-04 rotate"></i><span class="text-primary set-more">更多设置</span></div>
            <div class="fold-field hide">
                <div class="form-group">
                    <label class="col-md-2 control-label">商品品牌</label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="0">请选择商品品牌</option>
                           
                        </select>
                        <div class="help-block mb-0">商品品牌需要先关联商品品类，请先把商品品类与商品分类进行关联，即可选择相关联的品牌。</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label"><span class="text-bright"></span> 商品编号</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="txtProductCodeA" id="txtProductCodeA" autocomplete="off" notChinese="true">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">商品货号</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="item_no" id="item_no">
                        <div class="help-block mb-0">启用规格后不能设置</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">虚拟销量</label>
                    <div class="col-md-8">
                        <div class="input-group w-200">
                            <input type="number" class="form-control" min="0" value="" step="1" name="BasicSales" id="BasicSales">
                            <span class="input-group-addon">件</span>
                        </div>
                        <div class="help-block mb-0">前端显示销量 = 虚拟销量 + 实际销量</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">商品排序</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control w-200" min="0" name="sort" id="goodsSort">
                        <div class="help-block mb-0">商品排序只会影响店铺商品列表的排序，不会影响商城商品列表排序，越大越靠前。</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">库存预警</label>
                    <div class="col-md-8">
                        <div class="input-group w-200">
                            <span class="input-group-addon">低于</span>
                            <input type="number" class="form-control" min="0" value="" id="txtMinStockLaram" name="txtMinStockLaram">
                            <span class="input-group-addon">件</span>
                        </div>       
                        <div class="help-block mb-0">商品库存预警数量。可在后台“首页”、“商品=>自营商品=>库存预警”进行查看</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">商品标签</label>
                    <div class="col-md-8">
                        <div class="checkbox_three">
                            <label class="checkbox-inline"><input type="checkbox" name="goods_labels" id="is_recommend">推荐</label>
                            <label class="checkbox-inline"><input type="checkbox" name="goods_labels" id="is_new">新品</label>
                            <label class="checkbox-inline"><input type="checkbox" name="goods_labels" id="is_hot">热卖</label>
                            <label class="checkbox-inline"><input type="checkbox" name="goods_labels" id="is_promotion">促销</label>
                            <label class="checkbox-inline"><input type="checkbox" name="goods_labels" id="is_shipping_free">包邮</label>
                        </div>
                    </div>
                </div>
            </div>     
            <!-- 信息 end -->
            <div class="screen-title2" data-id="t4">
                <span class="text">商品图片</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>商品图片</label>
                <div class="col-md-8">
                    <div class="">
                        <div class="">
                            <div class="picture-list" id="J-goodspic">
                                <a href="javascript:void(0);" class="plus-box" data-toggle="multiPicture"><i class="icon icon-plus"></i></a>
                            </div>
                        </div>
                        <p class="small-muted">第一张为主图，最多上传5张，支持同时上传多张，建议700*700，支持JPG\GIF\PNG格式，最大不超过1M</p>
                    </div>
                    <input type="text" class="visibility" id="visibility1" name="picture" required data-visi-type="multiPicture">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">主图视频</label>
                <div class="col-md-8">
                    <div class="picture-list" id="pc_video_adv"><a href="javascript:void(0);" class="plus-box" data-toggle="singleVideo"><i class="icon icon-plus"></i></a></div>
                    <p class="help-block">建议尺寸为1:1，最好控制在10-30秒以内，视频不能超过5M</p>
                </div>
            </div>
            <!-- 图片 end -->

            <div class="screen-title2" data-id="t7">
                <span class="text" id="shipping_fee_title">物流/其他</span>
            </div>
            <div class="isgoods_type_1" id="shipping_fee_data">
                <div class="form-group">
                    <label class="col-md-2 control-label"><span class="text-bright">*</span>运费设置</label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_fee_type" value="0" <?php if($goods_info['shipping_fee_type']  == 0): ?> checked <?php endif; ?>> 包邮
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_fee_type" value="1" <?php if($goods_info['shipping_fee_type']  == 1): ?> checked <?php endif; ?>> 统一邮费
                            </label>
                            <div class="inline-block ml-10 w15">
                                <input type="number" class="form-control number-form-control w-200" id="shipping_fee" name="shipping_fee" min="0" step="0.01" placeholder="￥" <?php if($goods_info['shipping_fee_type']  == !1): ?> disabled <?php endif; ?> data-visi-type="prices_1">
                            </div>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_fee_type" value="2" <?php if($goods_info['shipping_fee_type']  == 2): ?> checked <?php endif; ?>> 运费模板
                            </label>
                            <div class="inline-block ml-10">
                                <select class="form-control select-form-control" id="shipping_fee_id" name="shipping_fee_id" <?php if($goods_info['shipping_fee_type']  == !2): ?> disabled <?php endif; ?>>
                                    <?php if(is_array($shipping_list) || $shipping_list instanceof \think\Collection || $shipping_list instanceof \think\Paginator): if( count($shipping_list)==0 ) : echo "" ;else: foreach($shipping_list as $key=>$vo): ?>
                                    <option value="<?php echo $vo['shipping_fee_id']; ?>" type="<?php echo $vo['calculate_type']; ?>" ><?php echo $vo['shipping_fee_name']; if($vo['is_default'] == 1): ?>【默认】 <?php endif; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="help-block mb-0"> 没有运费模板？去<a href="<?php echo __URL('PLATFORM_MAIN/express/freighttemplatelist'); ?>" target="_blank" class="text-primary ">新建</a>，新建完点 <a href="javascript:void(0);" class="text-primary J-refresh">刷新</a> 重新加载数据</div>
                        </div>
                    </div>
                </div>
                <div class="form-group is_shipping_fee_id hidden">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">
                        <div class="input-group w-200">
                            <div class="input-group-addon">商品重量</div>
                            <input type="number" class="form-control" name="goods_weight" id="goods_weight" min="0" step="0.1" value="0">
                            <div class="input-group-addon">kg</div>
                        </div>
                    </div>
                </div>
                <div class="form-group is_shipping_fee_id_volume hidden">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8"> 
                        <div class="input-group w-200">
                            <div class="input-group-addon">商品体积</div>
                            <input type="number" class="form-control" name="goods_volume" id="goods_volume" min="0" step="0.1" value="0">
                            <div class="input-group-addon">m²</div>
                        </div>
                    </div>
                </div>

                <div class="form-group is_shipping_fee_id_num hidden">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">
                        <div class="input-group w-200">
                            <div class="input-group-addon">商品数量</div>
                            <input type="number" class="form-control" name="goods_count" id="goods_count" min="0" step="1" value="0">
                            <div class="input-group-addon">件</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">是否上架</label>
                <div class="col-md-8">
                    <div class="radio">
                        <label>
                            <input type="radio" name="state" value="1" checked> 立即上架
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="state" value="0" > 放入仓库
                        </label>
                    </div>
                </div>
            </div><!-- 物流/其他 end -->

        </div>

        <div class="tab-pane fade tab-2" id="goods_attribute">

            <div class="isgoods_type_0 hidden">
                <div class="form-group">
                    <label class="col-md-2 control-label">下单留言</label>
                    <div class="col-md-5">
                        <div class="messageBox">
                            <input type="text" class="form-control" name="message" placeholder="留言字段名" >
                        </div>
                        <a href="javascript:void(0);" class="text text-primary block mt-15" id="addMessage">增加一个</a>
                    </div>
                    <div class="col-md-5 help-block">
                        下单时候填写的留言信息
                    </div>
                </div>
            </div>
            <div class="isgoods_type_1">
                    <input type="hidden" name="goods_attribute_id" id="goods_attribute_id" value="0">
<!--                <div class="form-group">
                    <label class="col-md-2 control-label">商品品类</label>
                    <div class="col-md-5">
                        <select class="form-control" name="goods_attribute_id" id="goods_attribute_id" disabled="disabled">
                            <option value="0">请选择</option>
                            <?php if(is_array($goods_attribute_list) || $goods_attribute_list instanceof \think\Collection || $goods_attribute_list instanceof \think\Paginator): if( count($goods_attribute_list)==0 ) : echo "" ;else: foreach($goods_attribute_list as $key=>$v2): ?>
                            <option value="<?php echo $v2['attr_id']; ?>"><?php echo $v2['attr_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>-->
                <div id="isgoods_attribute">
                    <!--规格新模板 start-->
                    <div class="screen-title2">
                        <span class="text">商品规格</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"></label>
                        <div class="col-md-10">
                            <div class="flex spec-tips">
                                <div style="width: 70px">规格须知：</div>
                                <div>
                                    <p>1、若当前商品没有可选的“规格”与“属性”，请先前往“<a href="javascript:void(0);" class="text-primary">商品品类</a>”进行关联绑定，商品品类最后需要关联到“<a href="javascript:void(0);" class="text-primary">商品分类</a>”才能触发使用。</p>
                                    <p>2、商品发布成功后，若通过“<span class="text-red">商品规格</span>”栏目修改规格名或规格值，该商品规格值还是会保留发布时的规格名与规格值不会变化。</p>
                                    <p>3、如需修改该商品的规格名与规格值，只需双击对应规格名或规格值的文字即可编辑，保存后只会影响该商品。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"></label>
                        <div class="col-md-10">
                            <table class="table v-table table-auto-center table-bordered" id="spec_list">
                                <thead>
                                <th class="w-120">规格名</th>
                                <th class="w-120">展示方式</th>
                                <th>规格项</th>
                                </thead>
                                <tbody>
                                    <tr class="last-tr">
                                        <td colspan="3" class="text-left">
                                            <a href="javascript:void(0);" class="goods-value-add" data-show-type="10"><i class="icon icon-add1 mr-04"></i>添加规格</a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <table class="table table-bordered table-auto-center v-table" id="stock_table" style="display: none;" >
                                <thead></thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="10" class="text-left">
                                            批量修改：
                                            <a href="javascript:void(0);" class="text-primary batchSet" data-batch_type="sku_price">销售价</a>
                                            <a href="javascript:void(0);" class="text-primary batchSet" data-batch_type="market_price">市场价</a>
                                            <a href="javascript:void(0);" class="text-primary batchSet" data-batch_type="cost_price">成本价</a>
                                            <a href="javascript:void(0);" class="text-primary batchSet" data-batch_type="stock_num">库存</a>
                                            <a href="javascript:void(0);" class="text-primary batchSet" data-batch_type="code">商品货号</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="screen-title2">
                        <span class="text">商品属性</span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label"></label>
                        <div class="col-md-10">
                            <table class="table v-table table-auto-center table-bordered" id="attribute_list">
                                <thead>
                                <th class="w-120">属性名</th>
                                <th>属性值</th>
                                </thead>
                                <tbody>
                                    <tr class="last-tr">
                                        <td colspan="2" class="text-left">
                                            <a href="javascript:void(0);" class="goods-value-add" data-show-type="11"><i class="icon icon-add1 mr-04"></i>添加属性</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--规格新模板 end-->

                </div><!-- 规格/属性 end -->
            </div>

        </div>

        <div class="tab-pane fade tab-3" id="goods_detail">
            <div class="screen-title2" data-id="t5">
                <span class="text">详情描述</span>
            </div>
            <div class="form-group" >
                <label class="col-md-2 control-label"><span class="text-bright">*</span>商品详情</label>
                <div class="col-md-9" >
                    <div class="UE-box">
                        <div id="UE-detail" data-content=''></div>
                    </div>
                    <!-- <input type="text" class="visibility" name="UE-detail" required data-visi-type="UE"> -->
                </div>
            </div><!-- 商品详情 end -->
        </div>
        <?php if($distributionExist==1 || $globalExist==1 || $areaExist==1 || $teamExist==1): ?>
        <div class="tab-pane fade tab-4" id="distribution_bonus">
            <?php if($distributionExist==1): ?>
            <div class="screen-title2" data-id="t3">
                <span class="text">分销</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与分销</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="is_distribution" class="is_distribution"  value="1" <?php if($distributionStatus==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_distribution" class="is_distribution" value="2"  <?php if($distributionStatus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="help-block mb-0">
                        开启分销后该商品默认开启参与分销。关闭则不参与分销，该商品不产生分销佣金。
                    </div>
                </div>

            </div>
            <div class="form-group distribution_rules <?php if($distributionStatus==0): ?>hide<?php endif; ?>">
                <label class="col-md-2 control-label">独立分销佣金规则</label>
                <input type="hidden" id="d_rule" value="<?php echo $goods_info['distribution_rule']; ?>" name="d_rule">
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="distribution_rule" id="distribution_rule">
                        <label for="distribution_rule" class=""></label>
                    </div>
                    <div class="mb-0 help-block">
                        不开启则使用默认佣金设置规则；开启则该商品使用独立佣金比例规则，不受分销商等级比例限制。
                    </div>
                </div>
            </div>
            <div class="form-group hide" id="level_rules">
                <label class="col-md-2 control-label">开启等级返佣</label>
                <input type="hidden" id="l_rule" value="<?php echo $goods_info['level_rule']; ?>" name="l_rule">
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="level_rule" id="level_rule">
                        <label for="level_rule" class=""></label>
                    </div>
                    <div class="mb-0 help-block">
                        不开启则使用默认佣金设置规则；开启则该商品使用独立等级返佣规则，不受分销商等级返佣限制。
                    </div>
                </div>
            </div>
            <div class="form-group hide" id="recommend_type">
                <label class="col-md-2 control-label">返佣类型</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type"  value="1"> 比例返佣
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" value="2"  > 固定返佣
                    </label>
                </div>
            </div>
            <div class="form-group hide" id="distribution_input">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣</div>
                        <input type="number" name="first_rebate" id="first_rebate" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返佣</div>
                        <input type="number" name="second_rebate" id="second_rebate" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返佣</div>
                        <input type="number" name="third_rebate" id="third_rebate" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point" id="first_point" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返积分</div>
                        <input type="number" name="second_point" id="second_point" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返积分</div>
                        <input type="number" name="third_point" id="third_point" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group hide" id="distribution_input1">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣金</div>
                        <input type="number" name="first_rebate1" id="first_rebate1" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                        <div class="input-group-addon">元,二级返佣金</div>
                        <input type="number" name="second_rebate1" id="second_rebate1" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                        <div class="input-group-addon">元,三级返佣金</div>
                        <input type="number" name="third_rebate1" id="third_rebate1" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                        <div class="input-group-addon">元</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point1" id="first_point1" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                        <div class="input-group-addon">积分,二级返积分</div>
                        <input type="number" name="second_point1" id="second_point1" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                        <div class="input-group-addon">积分,三级返积分</div>
                        <input type="number" name="third_point1" id="third_point1" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                        <div class="input-group-addon">积分</div>
                    </div>
                </div>
            </div>
            <div class="hide" id="distribution_input2">
                <?php if($level_list): foreach($level_list as $k=>$v): ?>
                <div class="form-group">
                    <label class="col-md-2"></label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返佣</div>
                            <input type="number" name="level_first_rebate_<?php echo $v['id']; ?>" id="level_first_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                            <div class="input-group-addon">%,<?php echo $v['level_name']; ?>二级返佣</div>
                            <input type="number" name="level_second_rebate_<?php echo $v['id']; ?>" id="level_second_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                            <div class="input-group-addon">%,<?php echo $v['level_name']; ?>三级返佣</div>
                            <input type="number" name="level_third_rebate_<?php echo $v['id']; ?>" id="level_third_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                            <div class="input-group-addon">%</div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返积分</div>
                            <input type="number" name="level_first_point_<?php echo $v['id']; ?>" id="level_first_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                            <div class="input-group-addon">%,<?php echo $v['level_name']; ?>二级返积分</div>
                            <input type="number" name="level_second_point_<?php echo $v['id']; ?>" id="level_second_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                            <div class="input-group-addon">%,<?php echo $v['level_name']; ?>三级返积分</div>
                            <input type="number" name="level_third_point_<?php echo $v['id']; ?>" id="level_third_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <div class="hide" id="distribution_input3">
                <?php if($level_list): foreach($level_list as $k=>$v): ?>
                <div class="form-group">
                    <label class="col-md-2"></label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返佣金</div>
                            <input type="number" name="level_first_rebate1_<?php echo $v['id']; ?>" id="level_first_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                            <div class="input-group-addon">元,<?php echo $v['level_name']; ?>二级返佣金</div>
                            <input type="number" name="level_second_rebate1_<?php echo $v['id']; ?>" id="level_second_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                            <div class="input-group-addon">元,<?php echo $v['level_name']; ?>三级返佣金</div>
                            <input type="number" name="level_third_rebate1_<?php echo $v['id']; ?>" id="level_third_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                            <div class="input-group-addon">元</div>
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返积分</div>
                            <input type="number" name="level_first_point1_<?php echo $v['id']; ?>" id="level_first_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                            <div class="input-group-addon">积分,<?php echo $v['level_name']; ?>二级返积分</div>
                            <input type="number" name="level_second_point1_<?php echo $v['id']; ?>" id="level_second_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                            <div class="input-group-addon">积分,<?php echo $v['level_name']; ?>三级返积分</div>
                            <input type="number" name="level_third_point1_<?php echo $v['id']; ?>" id="level_third_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                            <div class="input-group-addon">积分</div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
            <!-- 复购设置 -->
            <div id="buyagain_rules">
                <div class="form-group " >
                    <label class="col-md-2 control-label">复购返佣</label>
                    <div class="col-md-5">
                        <div class="switch-inline">
                            <input type="checkbox" id="buyagain-switch" value="1" name="buyagain">
                            <label for="buyagain-switch"></label>
                        </div>
                        <div class="mb-0 help-block">开启后分销商下线再次购买商城商品时则按照复购返佣规则计算佣金</div>
                    </div>
                </div>
                <div class="buyagain_commission" style="display: none">
                    <div class="form-group " id="buyagain_level_rules">
                        <label class="col-md-2 control-label">开启等级返佣</label>
                        <input type="hidden" id="buyagain_l_rule"  name="buyagain_l_rule">
                        <div class="col-md-8" >
                            <div class="switch-inline">
                                <input type="checkbox" name="buyagain_level_rule" id="buyagain_level_rule">
                                <label for="buyagain_level_rule" class=""></label>
                            </div>
                            <div class="mb-0 help-block">
                                不开启则使用默认佣金设置规则；开启则该商品使用独立等级返佣规则，不受分销商等级返佣限制。
                            </div>
                        </div>
                    </div>
                    <div class="form-group " id="buyagain_recommend_type">
                        <label class="col-md-2 control-label">返佣类型</label>
                        <div class="col-md-8" >
                            <label class="radio-inline">
                                <input type="radio" name="buyagain_recommend_type" checked  class="buyagain_recommend_type"  value="1"> 比例返佣
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="buyagain_recommend_type" class="buyagain_recommend_type" value="2"  > 固定返佣
                            </label>
                        </div>
                    </div>
    
                    <div class="form-group " id="buyagain_distribution_input">
                        <label class="col-md-2"></label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">一级返佣</div>
                                <input type="number" name="buyagain_first_rebate" id="buyagain_first_rebate" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                <div class="input-group-addon">%,二级返佣</div>
                                <input type="number" name="buyagain_second_rebate" id="buyagain_second_rebate" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                <div class="input-group-addon">%,三级返佣</div>
                                <input type="number" name="buyagain_third_rebate" id="buyagain_third_rebate" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                <div class="input-group-addon">%</div>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-addon">一级返积分</div>
                                <input type="number" name="buyagain_first_point" id="buyagain_first_point" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                <div class="input-group-addon">%,二级返积分</div>
                                <input type="number" name="buyagain_second_point" id="buyagain_second_point" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                <div class="input-group-addon">%,三级返积分</div>
                                <input type="number" name="buyagain_third_point" id="buyagain_third_point" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group hide" id="buyagain_distribution_input1">
                        <label class="col-md-2"></label>
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-addon">一级返佣金</div>
                                <input type="number" name="buyagain_first_rebate1" id="buyagain_first_rebate1" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                <div class="input-group-addon">元,二级返佣金</div>
                                <input type="number" name="buyagain_second_rebate1" id="buyagain_second_rebate1" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                <div class="input-group-addon">元,三级返佣金</div>
                                <input type="number" name="buyagain_third_rebate1" id="buyagain_third_rebate1" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                <div class="input-group-addon">元</div>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-addon">一级返积分</div>
                                <input type="number" name="buyagain_first_point1" id="buyagain_first_point1" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                <div class="input-group-addon">积分,二级返积分</div>
                                <input type="number" name="buyagain_second_point1" id="buyagain_second_point1" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                <div class="input-group-addon">积分,三级返积分</div>
                                <input type="number" name="buyagain_third_point1" id="buyagain_third_point1" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                <div class="input-group-addon">积分</div>
                            </div>
                        </div>
                    </div>
                    <div class="hide" id="buyagain_distribution_input2">
                        <?php if($level_list): foreach($level_list as $k=>$v): ?>
                        <div class="form-group">
                            <label class="col-md-2"></label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返佣</div>
                                    <input type="number" name="buyagain_level_first_rebate_<?php echo $v['id']; ?>" id="buyagain_level_first_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                    <div class="input-group-addon">%,<?php echo $v['level_name']; ?>二级返佣</div>
                                    <input type="number" name="buyagain_level_second_rebate_<?php echo $v['id']; ?>" id="buyagain_level_second_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                    <div class="input-group-addon">%,<?php echo $v['level_name']; ?>三级返佣</div>
                                    <input type="number" name="buyagain_level_third_rebate_<?php echo $v['id']; ?>" id="buyagain_level_third_rebate_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                    <div class="input-group-addon">%</div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返积分</div>
                                    <input type="number" name="buyagain_level_first_point_<?php echo $v['id']; ?>" id="buyagain_level_first_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                    <div class="input-group-addon">%,<?php echo $v['level_name']; ?>二级返积分</div>
                                    <input type="number" name="buyagain_level_second_point_<?php echo $v['id']; ?>" id="buyagain_buyagain_level_second_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                    <div class="input-group-addon">%,<?php echo $v['level_name']; ?>三级返积分</div>
                                    <input type="number" name="buyagain_level_third_point_<?php echo $v['id']; ?>" id="buyagain_level_third_point_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                    <div class="hide" id="buyagain_distribution_input3">
                        <?php if($level_list): foreach($level_list as $k=>$v): ?>
                        <div class="form-group">
                            <label class="col-md-2"></label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返佣金</div>
                                    <input type="number" name="buyagain_level_first_rebate1_<?php echo $v['id']; ?>" id="buyagain_level_first_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                    <div class="input-group-addon">元,<?php echo $v['level_name']; ?>二级返佣金</div>
                                    <input type="number" name="buyagain_level_second_rebate1_<?php echo $v['id']; ?>" id="buyagain_level_second_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                    <div class="input-group-addon">元,<?php echo $v['level_name']; ?>三级返佣金</div>
                                    <input type="number" name="buyagain_level_third_rebate1_<?php echo $v['id']; ?>" id="buyagain_level_third_rebate1_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                    <div class="input-group-addon">元</div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo $v['level_name']; ?>一级返积分</div>
                                    <input type="number" name="buyagain_level_first_point1_<?php echo $v['id']; ?>" id="buyagain_level_first_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"  value="0"  style="min-width: 74px">
                                    <div class="input-group-addon">积分,<?php echo $v['level_name']; ?>二级返积分</div>
                                    <input type="number" name="buyagain_level_second_point1_<?php echo $v['id']; ?>" id="buyagain_level_second_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0"   value="0" style="min-width: 74px">
                                    <div class="input-group-addon">积分,<?php echo $v['level_name']; ?>三级返积分</div>
                                    <input type="number" name="buyagain_level_third_point1_<?php echo $v['id']; ?>" id="buyagain_level_third_point1_<?php echo $v['id']; ?>" class="form-control rebate" min="0" value="0" style="min-width: 74px">
                                    <div class="input-group-addon">积分</div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
            
            <?php endif; if($globalExist==1 || $areaExist==1 || $teamExist==1): ?>
            <div class="screen-title2" data-id="t3">
                <span class="text">分红</span>
            </div>
            <?php if($globalExist==1): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与全球分红</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_global" class="is_bonus_global"  value="1"  <?php if($globalStatus==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_global" class="is_bonus_global" value="2"  <?php if($globalStatus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="mb-0 help-block">
                        开启全球分红后该商品默认开启参与分红。关闭则不参与分红，该商品不产生分红奖金。
                    </div>
                </div>

            </div>
            <?php endif; if($areaExist==1): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与区域分红</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_area" class="is_bonus_area"  value="1" <?php if($areaStatus==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_area" class="is_bonus_area" value="2" <?php if($areaStatus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="mb-0 help-block">
                        开启区域分红后该商品默认开启参与分红。关闭则不参与分红，该商品不产生分红奖金。
                    </div>
                </div>

            </div>
            <?php endif; if($teamExist==1): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与团队分红</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_team" class="is_bonus_team"  value="1" <?php if($teamStatus==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_bonus_team" class="is_bonus_team" value="2" <?php if($teamStatus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="mb-0 help-block">
                        开启团队分红后该商品默认开启参与分红。关闭则不参与分红，该商品不产生分红奖金。
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-group <?php if($globalStatus==0 && $areaStatus==0 && $teamStatus==0): ?>hide<?php endif; ?>" id="bounsRules">
                <label class="col-md-2 control-label">独立分红规则</label>
                <input type="hidden" id="b_rule" value="<?php echo $goods_info['bonus_rule']; ?>" name="b_rule">
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="bonus_rule" id="bonus_rule">
                        <label for="bonus_rule" class=""></label>
                    </div>

                    <div class="mb-0 help-block">
                        不开启则使用默认分红设置格则；开启则该商品使用独立分红比例规则，不受分红全球股东/区域代理/团队队长等级比例限制。
                    </div>
                </div>

            </div>
            <div class="form-group hide" id="bonus_input">
                <label class="col-md-2"></label>
                <div class="col-md-8">
                    <table class="table v-table table-auto-center table-bordered">
                        <thead>
                            <tr>
                            	<?php if($globalExist==1): ?>
                                <th class="w-200 bonus-td1 <?php if($globalStatus==0): ?>hide<?php endif; ?>">全球分红</th>
                                <?php endif; if($areaExist==1): ?>
                                <th class="w-600 bonus-td2 <?php if($areaStatus==0): ?>hide<?php endif; ?>">区域分红</th>
                                <?php endif; if($teamExist==1): ?>
                                <th class="w-200 bonus-td3 <?php if($teamStatus==0): ?>hide<?php endif; ?>">团队分红</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            	<?php if($globalExist==1): ?>
                                <td class="bonus-td1 <?php if($globalStatus==0): ?>hide<?php endif; ?>">
                                    <div class="input-group">
                                        <input type="number"  name="global_bonus" id="global_bonus" class="form-control global_bonus" min="0"  value="" style="min-width: 74px">
                                        <div class="input-group-addon">%</div>
                                    </div>
                                </td>
                                <?php endif; if($areaExist==1): ?>
                                <td class="bonus-td2 <?php if($areaStatus==0): ?>hide<?php endif; ?>">
                                    <div class="input-group">
                                        <div class="input-group-addon">省级</div>
                                        <input type="number" name="province_bonus" value="" id="province_bonus" class="form-control area_bonus" min="0" style="min-width: 74px"  >
                                        <div class="input-group-addon">%,市级</div>
                                        <input type="number" name="city_bonus"  id="city_bonus" class="form-control area_bonus" min="0" value="" style="min-width: 74px" >
                                        <div class="input-group-addon">%,区级</div>
                                        <input type="number" name="district_bonus"  id="district_bonus" class="form-control area_bonus" value="" min="0" style="min-width: 74px" >
                                        <div class="input-group-addon">%</div>
                                    </div>
                                </td>
                                <?php endif; if($teamExist==1): ?>
                                <td class="bonus-td3 <?php if($teamStatus==0): ?>hide<?php endif; ?>">
                                    <div class="input-group">
                                        <input type="number" name="team_bonus"  id="team_bonus" class="form-control team_bonus" min="0"  value="" style="min-width: 74px">
                                        <div class="input-group-addon">%</div>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!--营销抵扣-->
        <div class="tab-pane fade tab-5" id="integral_rule">
            <div class="screen-title2" data-id="t3">
                <span class="text">积分业务</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">购物返积分</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" class="form-control number-form-control" name="point_return_max" id="point_return_max" value="" min="0">
                        <div class="input-group-addon">%</div>
                    </div>
                    <p class="help-block mb-0 w-800">购买该商品返多少积分，0则该商品不参与赠送，不填则按商城设置>交易设置规则赠送，设置赠送优先级 “商品 > 商城配置”</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">积分最大抵扣</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" class="form-control number-form-control" name="point_deduction_max" id="point_deduction_max" value="" min="0" max="100">
                        <div class="input-group-addon">%</div>
                    </div>
                    <p class="help-block mb-0 w-800">该商品最多抵扣多少积分，0则该商品不参与抵扣，不填则按商城设置>交易设置规则抵扣，设置抵扣优先级 “商品 > 商城配置”</p>
                </div>
            </div>
        </div>

        <div class="tab-pane fade tab-7" id="discount_rule">
            <div class="screen-title2" data-id="t3">
                <span class="text">浏览权限</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">会员等级</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="member_level_all" id="member_level_all" value="0" checked> 全部</label>
                        <?php if(is_array($member_level) || $member_level instanceof \think\Collection || $member_level instanceof \think\Paginator): $i = 0; $__LIST__ = $member_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline member_level">
                            <input type="checkbox" name="member_level_id"  value="<?php echo $v1['level_id']; ?>" checked><?php echo $v1['level_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">分销商等级</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="distributor_level_all" id="distributor_level_all" value="0" checked> 全部</label>
                        <?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): $i = 0; $__LIST__ = $distributor_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline distributor_level">
                            <input type="checkbox" name="distributor_level_id"  value="<?php echo $v2['id']; ?>" checked><?php echo $v2['level_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">会员标签</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="user_group_level_all" id="user_group_level_all" value="0" checked> 全部</label>
                        <?php if(is_array($user_group_level) || $user_group_level instanceof \think\Collection || $user_group_level instanceof \think\Paginator): $i = 0; $__LIST__ = $user_group_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline user_group_level">
                            <input type="checkbox" name="user_group_level_id"  value="<?php echo $v3['group_id']; ?>" checked><?php echo $v3['group_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="screen-title2" data-id="t3">
                <span class="text">购买权限</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">会员等级</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="member_level_all2" id="member_level_all2" value="0" checked> 全部</label>
                        <?php if(is_array($member_level) || $member_level instanceof \think\Collection || $member_level instanceof \think\Paginator): $i = 0; $__LIST__ = $member_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$w1): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline member_level2">
                            <input type="checkbox" name="member_level_id2"  value="<?php echo $w1['level_id']; ?>" checked><?php echo $w1['level_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">分销商等级</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="distributor_level_all2" id="distributor_level_all2" value="0" checked> 全部</label>
                        <?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): $i = 0; $__LIST__ = $distributor_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$w2): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline distributor_level2">
                            <input type="checkbox" name="distributor_level_id2" value="<?php echo $w2['id']; ?>" checked><?php echo $w2['level_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">会员标签</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="user_group_level_all2" id="user_group_level_all2" value="0" checked> 全部</label>
                        <?php if(is_array($user_group_level) || $user_group_level instanceof \think\Collection || $user_group_level instanceof \think\Paginator): $i = 0; $__LIST__ = $user_group_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$w3): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline user_group_level2">
                            <input type="checkbox" name="user_group_level_id2"  value="<?php echo $w3['group_id']; ?>" checked><?php echo $w3['group_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="screen-title2" data-id="t3">
                <span class="text">独立折扣</span>
            </div>
            <div class="form-group distribution_rules">
                <label class="col-md-2 control-label">会员折扣</label>
                <input type="hidden" id="user_discount" value="" name="user_discount">
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="is_member_discount" id="is_member_discount" checked>
                        <label for="is_member_discount" class=""></label>
                    </div>
                    <div class="mb-0 help-block">
                        关闭后该商品不参与会员等级折扣优惠
                    </div>
                </div>
            </div>
            <!-- 会员独立折扣 -->
            <div class="form-group" id="user_independents" >
                <label class="col-md-2 control-label">会员独立折扣</label>
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="user_independent" id="user_independent" >
                        <label for="user_independent" class=""></label>
                    </div>
                    <div class="mb-0 help-block">
                        开启后会员折扣将优先按独立折扣计算价格，若未开启则按照会员等级设置的折扣计算。
                    </div>
                </div>
            </div>
            <div class="form-group hide" id="user_discount_choices">
                <label class="col-md-2 control-label">折扣方式</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="user_discount_choice" class="user_discount_choice"  value="1" checked> 打折
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="user_discount_choice" class="user_discount_choice" value="2"> 固定金额
                    </label>
                </div>
            </div>
            <div class="form-group hide" id="user_independent_levels">
                <label class="col-md-2 control-label">会员等级</label>
                <div class="col-md-8">
                    <?php if(is_array($member_level) || $member_level instanceof \think\Collection || $member_level instanceof \think\Paginator): $i = 0; $__LIST__ = $member_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k1): $mod = ($i % 2 );++$i;?>
                    <div class="input-group w-300">
                        <span class="input-group-addon"><?php echo $k1['level_name']; ?></span>
                        <input type="number" class="form-control"min="0.01" max="10" name="user_independent_level" value="<?php echo $k1['goods_discount']; ?>" data-uid="<?php echo $k1['level_id']; ?>" data-uname="<?php echo $k1['level_name']; ?>">
                        <span class="input-group-addon">折</span>
                    </div>
                    <br>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="mb-0 help-block"> 数值越大，优惠折扣越小, 推荐1-9.9之间的数字,10不打折</div>
                </div>
            </div>
            <div class="form-group hide hide" id="user_independent_levels2">
                <label class="col-md-2 control-label">会员等级</label>
                <div class="col-md-8">
                    <?php if(is_array($member_level) || $member_level instanceof \think\Collection || $member_level instanceof \think\Paginator): $i = 0; $__LIST__ = $member_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k1): $mod = ($i % 2 );++$i;?>
                    <div class="input-group w-300">
                        <span class="input-group-addon"><?php echo $k1['level_name']; ?></span>
                        <input type="number" class="form-control" min="0" name="user_independent_level2" value="" data-uid="<?php echo $k1['level_id']; ?>" data-uname="<?php echo $k1['level_name']; ?>" >
                        <span class="input-group-addon">元</span>
                    </div>
                    <br>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="form-group hide" id="user_independent_switchs">
                <label class="col-md-2 control-label">小数取整</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" id="user_independent_switch" name="is_label_user">
                        <label for="user_independent_switch"></label>
                    </div>
                    <div class="help-block mb-0" >折扣后价格小数四舍五入取整，例：198.55取整后199.00，198.46取整后198.00</div>
                </div>
            </div>
            <!-- 分销商独立折扣 -->
            <div class="form-group" id="distributor_independents">
                <label class="col-md-2 control-label">分销商独立折扣</label>
                <div class="col-md-8" >
                    <div class="switch-inline">
                        <input type="checkbox" name="distributor_independent" id="distributor_independent" >
                        <label for="distributor_independent" class=""></label>
                    </div>
                    <div class="mb-0 help-block">
                        开启后商品折扣优先以分销商折扣计算，若会员不是分销商则按会员折扣计算
                    </div>
                </div>
            </div>
            <div class="form-group hide" id="distributor_discount_choices">
                <label class="col-md-2 control-label">折扣方式</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="distributor_discount_choice" class="distributor_discount_choice"  value="1" checked> 打折
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="distributor_discount_choice" class="distributor_discount_choice" value="2"  > 固定金额
                    </label>
                </div>
            </div>
            <div class="form-group hide" id="distributor_independent_levels">
                <label class="col-md-2 control-label">分销商等级</label>
                <div class="col-md-8">
                    <?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): $i = 0; $__LIST__ = $distributor_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k2): $mod = ($i % 2 );++$i;?>
                    <div class="input-group w-300">
                        <span class="input-group-addon"><?php echo $k2['level_name']; ?></span>
                        <input type="number" class="form-control" min="0.01" max="10" name="distributor_independent_level"  value="" data-uid="<?php echo $k2['id']; ?>" data-uname="<?php echo $k2['level_name']; ?>">
                        <span class="input-group-addon">折</span>
                    </div>
                    <br>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="mb-0 help-block"> 数值越大，优惠折扣越小, 推荐1-9.9之间的数字,10不打折</div>
                </div>
            </div>
            <div class="form-group hide" id="distributor_independent_levels2">
                <label class="col-md-2 control-label">分销商等级</label>
                <div class="col-md-8">
                    <?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): $i = 0; $__LIST__ = $distributor_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k2): $mod = ($i % 2 );++$i;?>
                    <div class="input-group w-300">
                        <span class="input-group-addon"><?php echo $k2['level_name']; ?></span>
                        <input type="number" class="form-control" min="0" name="distributor_independent_level2"  value="" data-uid="<?php echo $k2['id']; ?>" data-uname="<?php echo $k2['level_name']; ?>">
                        <span class="input-group-addon">元</span>
                    </div>
                    <br>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="form-group hide" id="distributor_independent_switchs">
                <label class="col-md-2 control-label">小数取整</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" id="distributor_independent_switch"  name="is_label_distributor">
                        <label for="distributor_independent_switch"></label>
                    </div>
                    <div class="help-block mb-0" >折扣后价格小数四舍五入取整，例：198.55取整后199.00，198.46取整后198.00</div>
                </div>
            </div>
            <?php if($channel_level_list): ?>
            <div class="screen-title2" data-id="t3">
                <span class="text">渠道商权限</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">渠道商采购等级</label>
                <div class="col-md-5">
                    <div class="checkbox_three">
                        <label class="checkbox-inline"><input type="checkbox" name="channel_level_all" id="channel_level_all" value="0" checked> 全部</label>
                        <?php if(is_array($channel_level_list) || $channel_level_list instanceof \think\Collection || $channel_level_list instanceof \think\Paginator): $i = 0; $__LIST__ = $channel_level_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c1): $mod = ($i % 2 );++$i;?>
                        <label class="checkbox-inline channel_level">
                            <input type="checkbox" name="channel_level_id"  value="<?php echo $c1['channel_grade_id']; ?>" checked><?php echo $c1['channel_grade_name']; ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!--计时/次规则-->
        <div class="tab-pane fade tab-5" id="timing_rule">
            <div class="screen-title2" data-id="t3">
                <span class="text">计时/次规则</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 单个商品核销次数</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" min="0" name="verification_num" id="verification_num">
                    <div class="mb-0 help-block">0代表不限次数</div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 卡包模式</label>
                <div class="col-md-5">
                    <label class="radio-inline"><input type="radio" name="card_models" id="card_models1" value="1" checked> 单卡模式</label>
                    <label class="radio-inline"><input type="radio" name="card_models" id="card_models2" value="2" > 多卡模式</label>
                    <div class="mb-0 help-block">购买多件商品时，生成卡券的数量，每张卡券核销次数 = 有单个商品核销次数</div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 有效类型</label>
                <div class="col-md-4">
                    <label class="radio-inline"><input type="radio" name="effective_type" id="fixed_day" value="1" checked> 固定天数</label>
                    <label class="radio-inline"><input type="radio" name="effective_type" id="overdue_day" value="2"> 指定过期日期</label>
                    <div class="mb-0 help-block">商品创建后，不能再选择，请谨慎选择</div>
                </div>
            </div>
            <div class="form-group effectiveTime">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 有效时间</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="number" name="effective_day" id="effective_day" class="form-control" min="1" value="">
                        <div class="input-group-addon">天</div>
                    </div>
                </div>
            </div>
            <div class="form-group expirationTime hovers">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 过期时间</label>
                <div class="col-md-3">
                    <div class="date-input-control" style="width: 100%">
                        <input type="text" class="form-control" name="expiration_time" readonly id="expiration_time" placeholder="过期时间" data-mindate="<?php echo date('Y-m-d',time()) ?>"><i class="icon icon-calendar"></i>
                    </div>
                </div>
            </div>

        </div>

        <!--微信卡券-->
        <div class="tab-pane fade tab-6" id="wechat_card">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 是否开启</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline"><input type="radio" name="card_switch" id="card_model1" value="1"> 开启</label>
                    <label class="radio-inline"><input type="radio" name="card_switch" id="card_model2" value="2" checked> 关闭</label>-->
                    <div class="switch-inline">
                        <input type="checkbox" id="card_switch" name="card_switch">
                        <label for="card_switch" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启后,用户可以领取微信核销卡券,商品创建后此选项则无法修改。<br><span class="red">注意：需要在公众号后台开启微信卡券</span></div>
                </div>

            </div>
            <div class="wxCard-container flex flex-pack-center mb-20 hovers">
                <div class="wxCard-view">
                    <div class="wxCard-bg"></div>
                    <div class="view-main">
                        <div class="view-main-logo" >
                            <img src="/public/platform/images/wx_logo.png" alt="">
                        </div>
                        <div class="padding-15 flex flex-pack-justify word_white mb-20" >
                            <div></div>
                            <div>...</div>
                        </div>
                        <div class="view-main-content">
                            <div class="wxCard_company">广州领客信息科技股份有限公司</div>
                            <div class="wxCard_title line-1-ellipsis">卡券标题</div>
                            <div class="wxCard_used"><a href="javascript:;" class="btn">立即使用</a></div>
                            <div class="wxCard_tips">使用条件：<span>满100使用</span></div>
                            <div class="wxCard_tips">可用时间：<span>周一至周日</span></div>
                            <div class="padding-15 wxCard_imagesTexts">
                                <div class="item-head">
                                    <img src="http://iph.href.lu/850x350" class="max-w-auto">
                                    <p class="line-1-ellipsis wxCard_describe">详情简述</p>
                                </div>
                            </div>
                            <div class="wxCard_items clearfix">公众号<span class="pull-right" style="padding-top: 2px"><i class="icon icon-right-arrow"></i></span></div>
                            <div class="wxCard_items clearfix">核销情况<span class="pull-right" style="padding-top: 2px"><i class="icon icon-right-arrow"></i></span></div>
                        </div>
                    </div>
                </div>
                <div class="wxCard-editor">
                    <div class="editor-main">

                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>卡券标题</div>
                            <div class="col-sm-9">
                                <input class="form-control input-sm diy-bind" id="wxCard_setTitle" name="wxCard_setTitle" value="" maxlength="9" placeholder="请输入卡券标题">
                                <p class="help-block mb-0">卡券标题长度不超过9个字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>卡券库存</div>
                            <div class="col-sm-9">
                                <input class="form-control input-sm diy-bind" id="wxCard_stock" value="" disabled name="card_stock">
                                <p class="help-block mb-0">同步商品库存</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>卡券颜色</div>
                            <div class="col-sm-9">
                                <div class="date-input-control" style="width: 100%">
                                    <input class="form-control input-sm diy-bind cart_color" id="cart_color" readonly name="cart_color">
                                    <i class="icon icon-bottom"></i>
                                    <div class="wx_colorBox">
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color010" data-colorNmme="#63b359"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color020" data-colorNmme="#2c9f67"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color030" data-colorNmme="#509fc9"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color040" data-colorNmme="#5885cf"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color050" data-colorNmme="#9062c0"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color060" data-colorNmme="#d09a45"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color070" data-colorNmme="#e4b138"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color080" data-colorNmme="#ee903c"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color081" data-colorNmme="#f08500"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color082" data-colorNmme="#a9d92d"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color090" data-colorNmme="#dd6549"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color100" data-colorNmme="#cc463d"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color101" data-colorNmme="#cf3e36"></a>
                                        <a href="javascript:void(0);" class="wx_colorBox_item" data-color="Color102" data-colorNmme="#5E6671"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>详情封面</div>
                            <div class="col-sm-9">
                                <div class="picture-list" id="wx_des_pic">
                                    <a href="javascript:void(0);" class="plus-box" data-toggle="wxCard_singlePicture"><i class="icon icon-plus"></i></a>
                                    <input type="text" id="picture-wx_des_pic" class="visibility" data-visi-type="singlePicture" name="picture-wx_des_pic">
                                </div>
                                <p class="help-block mb-0">图片建议尺寸：850像素*350像素，大小不超过2M。</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>详情简述</div>
                            <div class="col-sm-9">
                                <input class="form-control input-sm diy-bind" id="wxCard_des" name="wxCard_des" value="" maxlength="12" placeholder="请输入详情简述">
                                <p class="help-block mb-0">封面简介长度不超过12个字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">商户服务</div>
                            <div class="col-sm-10">
                                <div class="checkbox_three">
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" id="" value="BIZ_SERVICE_FREE_WIFI">免费wifi</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" id="" value="BIZ_SERVICE_WITH_PET">可带宠物</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" id="" value="BIZ_SERVICE_FREE_PARK">免费停车</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" id="" value="BIZ_SERVICE_DELIVER">可外卖</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>操作提示</div>
                            <div class="col-sm-9">
                                <input class="form-control input-sm diy-bind" id="op_tips" name="op_tips" value="" maxlength="16">
                                <p class="help-block mb-0">建议引导用户到店出示卡券，由店员完成核销操作，长度不超过16个字</p>
                            </div>
                        </div>
                        <div class="form-group hide">
                            <div class="col-sm-2 control-label">转赠设置</div>
                            <div class="col-sm-8">
                                <div>
                                    <label class="radio-inline"><input type="radio" name="make_money" value="1"> 开启</label>
                                    <label class="radio-inline"><input type="radio" name="make_money" value="2" checked> 关闭</label>
                                </div>
                                <p class="help-block mb-0">开启后，卡券可以转赠给好友</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--核销门店-->
        <div class="tab-pane fade tab-5" id="cancel_store">
            <div class="screen-title2" data-id="t3">
                <span class="text">核销门店</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">核销门店</label>
                <div class="col-md-8" style="width: 740px;">
                    <div class="transfer-box">
                        <div class="item">
                            <div class="transfer-title">
                                <div class="checkbox line-1-ellipsis">
                                    <label><input type="checkbox" name="store_unselect_all" value="">未选中门店</label>
                                </div>
                            </div>
                            <div class="transfer-search">
                                <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                                    <input type="text" name="store_unselect_search" class="form-control" placeholder="请选择门店" id="store_unselect_search">
                                    <i class="icon icon-custom-search search_button"></i>
                                </div>
                            </div>
                            <div id="store_unselect" class="heights"></div>
                        </div>
                        <div class="item">
                            <div class="transfer-title">
                                <div class="checkbox line-1-ellipsis">已选中门店</div>
                            </div>
                            <div class="transfer-search">
                                <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                                    <input type="text" name="store_select_search" class="form-control" placeholder="请选择门店" id="store_select_search">
                                    <i class="icon icon-custom-search search_button"></i>
                                </div>
                            </div>
                            <div id="store_select" class="heights"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--商品海报-->
        <div class="tab-pane fade tab-5" id="goods_poster">
            <div class="screen-title2" data-id="t3">
                <span class="text">商品海报</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">是否开启</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" id="is_goods_poster_open" name="is_goods_poster_open">
                        <label for="is_goods_poster_open" class=""></label>
                    </div>
                    <p class="help-block">开启后该商品将按下方设置的内容生成海报</p>
                </div>


                    <div class="template-list tab-content">
                        <div class="tab-pane fade active in" id="poster_design">
                            <ul class="template-list-ul clearfix">
                                <table style="width:80%;margin-left:130px;">
                                    <tbody><tr>
                                        <td style="width:320px;" valign="top">
                                            <div id="poster">
                                                <img src="" class="bg">
                                            </div>
                                        </td>
                                        <td valign="top">
                                            <div class="panel panel-default" style="min-height: 504px">
                                                <div class="panel-body">
                                                    <div class="form-group" id="pxselect">
                                                        <label class="col-sm-2 control-label">分辨率</label>
                                                        <label class="radio-inline" style="padding-left:38px;">
                                                            <input type="radio" name="pxselect" value="1" checked=""> 640 * 1008
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="pxselect" value="2"> 1080 * 1920
                                                        </label>
                                                    </div>
                                                    <div class="form-group" id="bgset">
                                                        <label class="col-sm-2 control-label">背景图片</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group ">
                                                                <input type="text" name="bg" value="" class="form-control goods-pic" autocomplete="off" readonly="">
                                                                <span class="input-group-btn">
                                                        <a href="javascript:void(0);" id="" class="btn btn-primary mr-04" data-toggle="editPosterPicture">选择图片</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary clearPic">清除图片</a>
			                                        </span>
                                                            </div>
                                                            <!--<p class="help-block mb-0">背景图片建议尺寸640 * 1008</p>-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">海报元素</label>
                                                        <div class="col-sm-8">
                                                            <button class="btn btn-default btn-com" type="button" data-type="head">
                                                                头像
                                                            </button>
                                                            <button class="btn btn-default btn-com" type="button" data-type="nickname">昵称
                                                            </button>
                                                            <button class="btn btn-default btn-com" type="button" data-type="qr">
                                                                二维码
                                                            </button>
                                                            <button class="btn btn-default btn-com" type="button" data-type="img">
                                                                图片
                                                            </button>
                                                            <span id="goodsparams" class="">
                                                                <button class="btn btn-default btn-com" type="button" data-type="title">商品名称</button>
                                                                <button class="btn btn-default btn-com" type="button" data-type="goods-img">商品图片</button>
                                                                <button class="btn btn-default btn-com" type="button" data-type="marketprice">商品现价</button>
                                                                <button class="btn btn-default btn-com" type="button" data-type="productprice">商品原价</button>
                                                            </span>
                                                            <button class="btn btn-default btn-com" type="button" data-type="words">
                                                                文字</button>
                                                        </div>
                                                    </div>
                                                    <div id="wordset" style="display:none">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">字体颜色</label>
                                                            <div class="col-sm-8 wid100">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="color" placeholder="请选择颜色" value="">
                                                                    <span class="input-group-addon" style="width:35px;border-left:none;background-color:"></span>
                                                                    <span class="input-group-btn">
										                    <button class="btn btn-default colorpicker" type="button">选择颜色 ▼</button>
                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">字体大小</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group wid100">
                                                                    <input type="number" name="namesize" id="namesize1" class="form-control namesize" placeholder="例如: 14,16">
                                                                    <div class="input-group-addon">px</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">文字内容</label>
                                                            <div class="col-sm-8">
                                                                <div class="flex">
                                                                    <textarea class="form-control bbrr0" rows="8" name="wordContent" id="wordContent">文字内容111</textarea>
                                                                    <div class="variate-choice">
                                                                        <p>添加变量</p>
                                                                        <div class="variate-choice-item">
                                                                            <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[昵称]">昵称</a>
                                                                            <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[等级]">等级</a>
                                                                            <a class="text-primary block variate-choice-code" href="javascript:void(0);" data-code="[手机号]">手机号</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div id="nameset" style="display:none">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">昵称颜色</label>
                                                            <div class="col-sm-8 wid100">
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" name="color" placeholder="请选择颜色" value="">
                                                                    <span class="input-group-addon" style="width:35px;border-left:none;background-color:"></span>
                                                                    <span class="input-group-btn">
										                    <button class="btn btn-default colorpicker" type="button">选择颜色 ▼</button>
                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">昵称大小</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group wid100">
                                                                    <input type="number" name="namesize" id="namesize" class="form-control namesize" placeholder="例如: 14,16">
                                                                    <div class="input-group-addon">px</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="imgset" style="display:none">
                                                        <label class="col-sm-2 control-label">图片设置</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group ">
                                                                <input type="text" name="img" value="" class="form-control goods-pic" autocomplete="off" readonly="">
                                                                <span class="input-group-btn">
									                    <a class="btn btn-primary mr-04" data-toggle="editPosterPicture1">选择图片</a>
                                                                    <!--<a href="javascript:void(0);" class="btn btn-primary clearPic1">清除图片</a>-->
								                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>
        <!--知识付费-->
        <div class="tab-pane fade tab-8" id="pay_content">
            <div class="screen-title2">
                <span class="text">付费内容</span>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label"></label>
                <div class="col-md-10">
                    <a href="javascript:void(0);" class="btn btn-primary" id="" data-toggle="singlePicVideo">从素材空间选择内容</a>
                    <a href="javascript:void(0);" class="btn btn-primary cloudDisk">从网络云盘选择内容</a>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label"></label>
                <div class="col-md-10 addgoods-sortable">

                    <div class="divTable goodsTable">
                        <div class="divThead">
                            <div class="divTh">内容名称</div>
                            <div class="divTh">内容</div>
                            <div class="divTh">类型</div>
                            <div class="divTh">试学</div>
                            <div class="divTh">操作</div>
                        </div>
                        <div class="divTbody ui-sortable" id="curr-list"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary" type="submit" id="submitsData">添加</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>
</form>
<!--<div class="list-group side-catalog"></div>-->
<!-- page end  -->
</div>
</div>
<!--保存中的提示-->
<div id="saveTips" style="display: none">
    <div class="saving"></div>
    <div class="saveing-box">
        <div><img src="/public/platform/images/loading.svg" alt="" style="width: 80px;height: 80px"></div>
        <p>微信卡券创建中</p>
    </div>
</div>
<input id="level_ids" type="hidden" value="<?php echo $level_ids; ?>" name="level_ids">

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
	var storeListUrl = "<?php echo $storeListUrl; ?>";
	var storeStatus =  "<?php echo $store; ?>";
    require(['util', 'poster', 'platformAddgood','sotr-selector'], function (util,poster,platformAddgood) {
        platformAddgood.goodsSkuCreate();
        util.layDate("#expiration_time");
        //点击分辨率，切换宽高 360*640
        $('input[name=pxselect]').change(function(){
            if($(this).val() == '1'){
                //320*504
                $('#poster').attr('style','width:320px;height:504px;')
                var drag = $('.drag');
                drag.each(function(i, v){
                    var width1 = 320;
                    var height1 = 504;
                    var this_top = parseFloat($(this).css('top')) + parseFloat($(this).css('height'));
                    var this_left = parseFloat($(this).css('left')) + parseFloat($(this).css('width'));
                    var last_top = parseFloat($(this).css('top'));
                    var last_left =parseFloat($(this).css('left'));
                    if(this_top > height1){
                        last_top = height1 - parseFloat($(this).css('height'));
                    }
                    if(this_left > width1){
                        last_left = width1 - parseFloat($(this).css('width'));
                    }
                    $(this).css('left', last_left);
                    $(this).css('top', last_top);
                })
            }else{
                //360*640
                $('#poster').attr('style','width:360px;height:640px;')
            }
        })
    });
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

