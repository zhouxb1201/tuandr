<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:34:"template/admin/Goods/addGoods.html";i:1583811760;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="__STATIC__/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/css/common.css?t=1.1">
    <link rel="stylesheet" href="__STATIC__/lib/drag/layer.css">
    <link rel="stylesheet" href="ADMIN_CSS/shop.css?t=1.1">
    <link rel="shortcut icon" href="ADMIN_IMG/logo.png" type="image/x-icon" />

    <!--引入require-->
    <script>
        var PLATFORMJS = "PLATFORM_NEW_JS";
    </script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/jquery.min.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_LIB/require.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/config.js"></script>
</head>
<body>
<script>
	var PLATFORM_NAME = "<?php echo $title_name; ?>";
	var ADMINIMG = "ADMIN_IMG";//后台图片请求路径
	var ADMINMAIN = "ADMIN_MAIN";//后台请求路径
	var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
	var APPMAIN = "APP_MAIN";//手机端请求路径
	var UPLOAD = "__UPLOAD__";//上传文件根目录
	var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
	var ROOT = "__ROOT__";//根目录
	var ADDONS = "__ADDONS__";
	var STATIC = "__STATIC__";
    var MAIN = "ADMIN_MAIN";//装修请求路径
    var PASSMAIN = "ADMIN_MAIN";
    var ADDONSADMINMAIN = "ADDONS_ADMIN_MAIN";
</script>

<!--<link rel="stylesheet" href="__STATIC__/lib/spectrum/spectrum.css">-->

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
<input id='page_index' type="hidden">
<input id='showNumber' type="hidden" value='<?php echo $pagesize; ?>'>
<div class="v-layout  <?php if(!$second_menu_list): ?> nosubnav <?php endif; ?>">
    <div class="v-sidebar">
        <div class="v-nav">
            
            <ul class="v-nav-list">
                <?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if($per['icon_class']=='icon-application-color'): ?>
                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>" class="item<?php if(strtoupper($per['module_id'])
                    == $headid): ?> active<?php endif; ?>" title=""><span class="icon-application-color"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>&nbsp; <?php echo $per['module_name']; ?></a></li>
                    <?php else: ?>

                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>" class="item<?php if(strtoupper($per['module_id'])
                    == $headid): ?> active<?php endif; ?>" title=""><i class="icon <?php if($per['icon_class']): ?><?php echo $per['icon_class']; else: ?> icon-shop <?php endif; ?>"></i> <?php echo $per['module_name']; ?></a></li>
                     <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            
        </div>
        
        <div class="v-subnav">
            <!--<div class="v-subnav-title"><?php echo $frist_menu['module_name']; ?></div>-->
            <ul class="v-subnav-list">
                <?php if(is_array($leftlist) || $leftlist instanceof \think\Collection || $leftlist instanceof \think\Paginator): if( count($leftlist)==0 ) : echo "" ;else: foreach($leftlist as $key=>$leftitem): ?>
                <li><a href="<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>" class="item<?php if(strtoupper($leftitem['module_id'])
                    == $second_menu_id): ?> active<?php endif; ?>"><?php echo $leftitem['module_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        
    </div>
    
        <?php if($no_menu == '1'): else: ?>
        <div class="v-header">
            <div class="v-header-box">            
                <div class="v-header-title">
                     <span class="v-header-word"><?php echo $web_info['mall_name']; ?></span>
                </div>
                <div class="v-header-account">
                    <div class="user-menu fs-12">
                        <div class="inline-block">
                        <a href="<?php echo __URL('ADMIN_MAIN/index/preview'); ?>" class="previewIndex" target="_blank">预览</a>
                        </div>
                        <div class="inline-block newsTips shortcutBar">
                            <a href="javascript:void(0);" id="news-tips" class="dker clear-cache" style="position: relative;" >
                                <span><i class="icon icon-message3"></i></span> 
                                <span class="badge pa tip0"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="news-tips">
                                <ul class="newsTips_ul">
                                    <li class="no_count hide">暂无待办信息</li>
                                    <li class="dai_count hide"><a href="<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>?order_status=1" class="flex flex-pack-justify"><div>待发货订单</div><div class="text-red tip2"></div></a></li>
                                    <li class="after_count hide"><a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist'); ?>" class="flex flex-pack-justify"><div>售后订单</div><div class="text-red tip3"></div></a></li>
                                </ul>

                            </div>

                        </div>

                        <div class="layout-user inline-block">
                            <div class="ivu-dropdown">
                                <div class="ivu-dropdown-rel">
                                    <a href="javascript:void(0)" class="text-primary"><img src="/public/platform/images/index/22.png" class="avatar">
                                        <?php if($user_info['user_name']): ?><?php echo $user_info['user_name']; else: ?><?php echo $user_info['user_tel']; endif; ?>
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
                                                    <p class="names"><?php if($user_info['user_name']): ?><?php echo $user_info['user_name']; else: ?><?php echo $user_info['user_tel']; endif; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="operations flex">
                                            <a href="javascript:void(0)" target="_blank"><i class="icon icon-list mr-10"></i>工单管理</a>
                                            <a href="javascript:void(0);" class="updatePass" data-toggle="modal" data-target="#password_modal"><i class="icon icon-password3 mr-10"></i>修改密码</a>
                                        </div>
                                        <div class="operations flex">
                                            <a href="javascript:void(0);" class="delcache"><i class="icon icon-clear mr-10"></i>清除缓存</a>
                                            <a href="<?php echo __URL('ADMIN_MAIN/login/logout'); ?>?website_id=<?php echo $website_id; ?>"><i class="icon icon-logout-l mr-10"></i>退出登录</a>
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
            <?php if($second_menu['desc']): ?>
            <div class="alert alert-tips alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <?php echo $second_menu['desc']; if($second_menu['jump']): ?>&nbsp;&nbsp;<a href="<?php echo $second_menu['jump']; ?>" class="checkDes">查看详情</a><?php endif; ?>
            </div>
            <?php endif; ?>
            
<!-- page -->

<!--tab栏切换-->
<ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
    <li role="presentation" class="active"><a href="#goods_info" aria-controls="goods_info" role="tab" data-toggle="tab" class="flex-auto-center">基本信息</a></li>
    <li role="presentation" class="hovers pay_content"><a href="#pay_content" aria-controls="pay_content" role="tab" data-toggle="tab" class="flex-auto-center pay_content">付费内容</a></li>
    <li role="presentation" class="spec_attribute"><a href="#goods_attribute" aria-controls="goods_attribute" role="tab" data-toggle="tab" class="flex-auto-center">规格/属性</a></li>
    <li role="presentation"><a href="#goods_detail" aria-controls="goods_detail" role="tab" data-toggle="tab" class="flex-auto-center">商品详情</a></li>
    <li role="presentation" class="hovers timing_rule"><a href="#timing_rule" aria-controls="timing_rule" role="tab" data-toggle="tab" class="flex-auto-center">计时/次规则</a></li>
    <li role="presentation" class="hovers wechat_card"><a href="#wechat_card" aria-controls="wechat_card" role="tab" data-toggle="tab" class="flex-auto-center">微信卡券</a></li>
    <li role="presentation"><a href="#discount_rule" aria-controls="discount_rule" role="tab" data-toggle="tab" class="flex-auto-center">权限折扣</a></li>
    <?php if($store == '1'): ?>
    <li role="presentation" class="cancel_store"><a href="#cancel_store" aria-controls="cancel_store" role="tab" data-toggle="tab" class="flex-auto-center">核销门店</a></li>
    <?php endif; if($distributionStatus==1): ?>
    <li role="presentation"><a href="#distribution_bonus" aria-controls="distribution_bonus" role="tab" data-toggle="tab" class="flex-auto-center">分销分红</a></li>
    <?php endif; ?>
</ul>
<form class="form-horizontal releaseForm widthFixedForm" role="form" id="form1">
    <input type="hidden" id="goodsId" value="<?php echo $goods_id; ?>" name="goodsId"/>
    <input type="hidden" id="shop_type" value="<?php echo $shop_type; ?>" name="shop_type"/>
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

            <div class="screen-title2" data-id="t2"><span class="text">基本信息</span></div>
            <!--商品分类-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>商品分类</label>
                <div class="col-sm-8" id="tbcNameCategory" data-flag="category" data-goods-id="0" cid="" data-attr-id="" cname="">
                    <input type="hidden" id="category_id_1" name="category_id_1">
                    <input type="hidden" id="category_id_2" name="category_id_2">
                    <input type="hidden" id="category_id_3" name="category_id_3">
                    <input type="hidden" id="select_name_hidden" name="select_name_hidden">
                    <input type="text" id="select_cname" name="select_cname" class="form-control J-selectCategory" placeholder="请选择分类" required>
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
            <!--商品名称-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>商品名称</label>
                <div class="col-md-8">
                    <input type="text" autocomplete="off" class="form-control" id="txtProductTitle" name="txtProductTitle" required>
                </div>
            </div>
            <!--销售价-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>销售价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" min="0" class="form-control" id="txtProductSalePrice" value="" name="txtProductSalePrice" required>
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后销售价需要在相应规格设置，商城将以该价格销售。</div>
                </div>

            </div>
            <!--市场价-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>市场价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" min="0" class="form-control" id="txtProductMarketPrice" value="" name="txtProductMarketPrice" required>
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后市场价需要在相应规格设置，商城将以该价格划线展示突出与售价的差价。</div>
                </div>

            </div>
            <!--成本价-->
            <div class="form-group">
                <label class="col-md-2 control-label">成本价</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input type="number" min="0" class="form-control" id="txtProductCostPrice" value="" name="txtProductCostPrice">
                        <span class="input-group-addon">元</span>
                    </div>
                    <div class="help-block mb-0">启用规格后成本价需要在相应规格设置，该价格用于计算利润，请如实填写。</div>
                </div>
            </div>
            <!--总库存-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>总库存</label>
                <div class="col-sm-8">
                    <div class="input-group w-200">
                        <input type="number" min="0" class="form-control" value="" id="txtProductCount" name="txtProductCount" required>
                        <span class="input-group-addon">件</span>
                    </div>
                    
                    <div class="help-block mb-0">启用规格后不能设置</div>
                </div>
            </div>

            <div class="fold-btn mb-20" data-status="0"><i class="icon icon-drop-down mr-04 rotate"></i><span class="text-primary set-more">更多设置</span></div>
            <div class="fold-field hide">
                <!--商品品牌-->
                <div class="form-group">
                    <label for="brand_id" class="col-md-2 control-label">商品品牌</label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option value="0">请选择商品品牌</option>
                        </select>
                        <div class="help-block mb-0">商品品牌需要先关联商品品类，请先把商品品类与商品分类进行关联，即可选择相关联的品牌。</div>
                    </div>
                </div>

                <!--商品编号-->
                <div class="form-group">
                    <label class="col-md-2 control-label">商品编号</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="off" class="form-control" id="txtProductCodeA" name="txtProductCodeA" notChinese="true">
                    </div>
                </div>
                <!--商品货号-->
                <div class="form-group">
                    <label class="col-md-2 control-label">商品货号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="item_no" name="item_no">
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

                <!--商品排序-->
                <div class="form-group">
                    <label for="goodsSort" class="col-md-2 control-label">商品排序</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control w-200" id="goodsSort" name="goodsSort" value="">
                        <div class="help-block mb-0">商品排序只会影响店铺商品列表的排序，不会影响商城商品列表排序，越大越靠前。</div>
                    </div>

                </div>
                <!--库存预警-->
                <div class="form-group">
                    <label for="inventoryAlert" class="col-md-2 control-label">库存预警</label>
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
                            <label class="checkbox-inline"><input class="decorate" type="checkbox" name="goods_labels" id="is_recommend" value="">推荐</label>
                            <label class="checkbox-inline"><input class="decorate" type="checkbox" name="goods_labels" id="is_new" value="">新品</label>
                            <label class="checkbox-inline"><input class="decorate" type="checkbox" name="goods_labels" id="is_hot" value="">热卖</label>
                            <label class="checkbox-inline"><input class="decorate" type="checkbox" name="goods_labels" id="is_promotion" value="">促销</label>
                            <label class="checkbox-inline"><input class="decorate" type="checkbox" name="goods_labels" id="is_shipping_free" value="">包邮</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="screen-title2" data-id="t4"><span class="text">商品图片</span></div>

            <!--商品图片-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>商品图片</label>

                <div class="col-md-8">
                    <div class="">
                        <div class="">
                            <div class="picture-list" id="J-goodspic">
                                <a href="javascript:void(0);" class="plus-box plus-box1" data-toggle="multiPicture"><i class="icon icon-plus"></i></a>
                            </div>
                        </div>
                        <p class="small-muted">第一张为主图，最多上传5张，支持同时上传多张，建议700*700，支持JPG\GIF\PNG格式，最大不超过1M</p>
                    </div>
                    <input type="text" class="visibility" id="visibility1" name="picture" data-visi-type="multiPicture" aria-required="true" required="required">
                </div>

            </div>
            <!--主图视频-->
            <div class="form-group">
                <label class="col-md-2 control-label">主图视频</label>
                <div class="col-md-8">
                    <div class="picture-list" id="pc_video_adv"><a href="javascript:void(0);" class="plus-box" data-toggle="singleVideo"><i class="icon icon-plus"></i></a></div>
                    <p class="help-block">建议尺寸为1:1，最好控制在10-30秒以内，视频不能超过5M</p>
                </div>
            </div>

            <div class="screen-title2" data-id="t7"><span class="text">其他信息</span></div>
            <!--运费设置-->
            <div id="shipping_fee_data">
                <div class="form-group J-shipping_fee">
                    <label class="col-md-2 control-label"><span class="red">*</span>运费设置</label>
                    <div class="col-sm-8">
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_fee_type" id="shipping_fee_type" value="0" <?php if($goods_info['shipping_fee_type']  == 0): ?> checked <?php endif; ?>> 包邮
                            </label>
                        </div>
                        <div class="radio w15">
                            <label>
                                <input type="radio" name="shipping_fee_type" id="shipping_fee_type_2" value="1" <?php if($goods_info['shipping_fee_type']  == 1): ?> checked <?php endif; ?>>统一邮费
                            </label>
                            <input type="number" id="shipping_fee" name="shipping_fee" class="form-control number-form-control" min="0" placeholder="￥" disabled data-visi-type="prices_1">
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_fee_type" id="shipping_fee_type_3" value="2" <?php if($goods_info['shipping_fee_type']  == 2): ?> checked <?php endif; ?>>运费模板
                            </label>
                            <div class="inline-block">
                                <select name="shipping_fee_id" id="shipping_fee_id" class="form-control select-form-control " disabled >
                                    <?php if(is_array($shipping_list) || $shipping_list instanceof \think\Collection || $shipping_list instanceof \think\Paginator): if( count($shipping_list)==0 ) : echo "" ;else: foreach($shipping_list as $key=>$vo): ?>
                                    <option value="<?php echo $vo['shipping_fee_id']; ?>" type="<?php echo $vo['calculate_type']; ?>"><?php echo $vo['shipping_fee_name']; if($vo['is_default'] == 1): ?>【默认】 <?php endif; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="help-block mb-0"> 没有运费模板？去<a href="<?php echo __URL('ADMIN_MAIN/express/freighttemplatelist'); ?>" target="_blank" class="text-primary">新建</a>，新建完点 <a href="javascript:void(0)" class="text-primary J-refresh">刷新</a> 重新加载数据</div>
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
            <!--是否上架-->
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="red">*</span>是否上架</label>
                <div class="col-sm-8">
                    <?php if($shop_info['base_info']['shop_audit']): ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="shelves" id="shelves1" value="11" checked> 审核通过后上架
                        </label>
                    </div>
                    <?php else: ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="shelves" id="shelves1" value="1" checked> 立即上架
                        </label>
                    </div>
                    <?php endif; ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="shelves" id="shelves2" value="0">放入仓库
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade tab-2" id="goods_attribute">
            <input type="hidden" name="goods_attribute_id" id="goods_attribute_id" value="0">
            <div class="screen-title2">
                <span class="text">商品规格</span>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label"></label>
                <div class="col-md-10">
                    <div class="flex spec-tips">
                        <div style="width: 70px">规格须知：</div>
                        <div>
                            <p>1、商品发布成功后，若通过“<span class="text-red">商品规格</span>”栏目修改规格名或规格值，该商品规格值还是会保留发布时的规格名与规格值不会变化。</p>
                            <p>2、如需修改该商品的规格名与规格值，只需双击对应规格名或规格值的文字即可编辑，保存后只会影响该商品。</p>
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
                    <table class="table table-bordered table-auto-center" id="stock_table" style="display: none;" >
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

            <!--商品属性-->
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
        </div>
        <div class="tab-pane fade tab-3" id="goods_detail">

            <div class="screen-title2" data-id="t5"><span class="text">详细描述</span></div>
            <!--详细描述-->
            <div class="form-group">
                <label class="col-md-2 control-label">详细描述</label>
                <div class="col-md-9">
                    <!--<script id="editor" name="content" type="text/plain" style="height: 500px;"></script>-->
                    <div class="UE-box">
                        <div id="UE-detail" data-content=''></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <!--<label id="description-error" class="error" style="display:none;">请填写商品描述</label>-->
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
        </div>
        <!-- 分销分红 -->
        <?php if($distributionStatus==1): ?>

        <div class="tab-pane fade tab-4" id="distribution_bonus">

            <?php if($distributionStatus==1): ?>

            <div class="screen-title2" data-id="t3">

                <span class="text">分销</span>

            </div>

            <div class="form-group">

                <label class="col-md-2 control-label">是否参与分销</label>

                <div class="col-md-8" >

                    <label class="radio-inline">

                        <input type="radio" name="is_distribution" class="is_distribution"  value="1" > 参与

                    </label>

                    <label class="radio-inline">

                        <input type="radio" name="is_distribution" class="is_distribution" value="2" checked > 不参与

                    </label>

                    <div class="help-block mb-0">

                        开启分销后该商品默认开启参与分销。关闭则不参与分销，该商品不产生分销佣金。

                    </div>

                </div>



            </div>

            <div class="form-group distribution_rules hide">

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

            <?php endif; ?>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>积分汇率</label>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="number" disabled class="form-control number-form-control"  value="<?php echo $convert_rate; ?>" >
                        <div class="input-group-addon">积分/元</div>
                    </div>
                    <p class="help-block">商城积分需要兑换人民币业务时则按该汇率计算，积分只会以整数扣除，如遇到除不尽的小数则积分向下取整方式扣除</p>
                </div>
            </div>
        </div>
 
        <?php endif; ?>
        <!--计时/次规则-->
        <div class="tab-pane fade tab-4" id="timing_rule">
            <div class="screen-title2" data-id="t3">
                <span class="text">计时/次规则</span>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 单个商品核销次数</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" min="0" name="verification_num" id="verification_num">
                    <div class="mb-0 help-block">0代表不限次数</div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 卡包模式</label>
                <div class="col-md-8">
                    <label class="radio-inline"><input type="radio" name="card_models" id="card_models1" value="1" checked> 单卡模式</label>
                    <label class="radio-inline"><input type="radio" name="card_models" id="card_models2" value="2" > 多卡模式</label>
                    <div class="mb-0 help-block">购买多件时，生成卡券的数量，每张卡券核销次数 = 有单个商品核销次数</div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 有效类型</label>
                <div class="col-md-5">
                    <label class="radio-inline"><input type="radio" name="effective_type" id="fixed_day" value="1" checked> 固定天数</label>
                    <label class="radio-inline"><input type="radio" name="effective_type" id="overdue_day" value="2" > 指定过期日期</label>
                    <div class="mb-0 help-block">商品创建后，不能再选择，请谨慎选择</div>
                </div>
            </div>
            <div class="form-group effectiveTime">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 有效时间</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" name="effective_day" id="effective_day" class="form-control" min="1" value="">
                        <div class="input-group-addon">天</div>
                    </div>
                </div>
            </div>
            <div class="form-group expirationTime hovers">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 过期时间</label>
                <div class="col-md-5">
                    <div class="date-input-control" style="width: 100%">
                        <input type="text" class="form-control" name="expiration_time" readonly id="expiration_time" placeholder="过期时间" data-mindate="<?php echo date('Y-m-d',time()) ?>"><i class="icon icon-calendar"></i>
                    </div>
                </div>
            </div>

        </div>
        <!--微信卡券-->
        <div class="tab-pane fade tab-5" id="wechat_card">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 是否开启</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" id="card_switch" name="card_switch">
                        <label for="card_switch" class=""></label>
                    </div>
                    <div class="help-block mb-0">开启后,用户可以领取微信核销卡券,商品创建后此选项则无法修改</div>
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
                                <input class="form-control input-sm diy-bind" id="wxCard_setTitle" name="wxCard_setTitle" maxlength="9" placeholder="请输入卡券标题">
                                <p class="help-block mb-0">卡券标题长度不超过9个字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label"><span class="text-bright">*</span>卡券库存</div>
                            <div class="col-sm-9">
                                <input class="form-control input-sm diy-bind" id="wxCard_stock" value="" name="card_stock" disabled>
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
                                <input class="form-control input-sm diy-bind" id="wxCard_des" name="wxCard_des"  maxlength="12" placeholder="请输入详情简述">
                                <p class="help-block mb-0">封面简介长度不超过12个字</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2 control-label">商户服务</div>
                            <div class="col-sm-10">
                                <div class="checkbox_three">
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" class="decorate" value="BIZ_SERVICE_FREE_WIFI">免费wifi</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" class="decorate" value="BIZ_SERVICE_WITH_PET">可带宠物</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" class="decorate" value="BIZ_SERVICE_FREE_PARK">免费停车</label>
                                    <label class="checkbox-inline"><input type="checkbox" name="store_service" class="decorate" value="BIZ_SERVICE_DELIVER">可外卖</label>
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
                            <div class="col-sm-9">
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
                        <div class="divTbody ui-sortable" id="curr-list">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="add_back">
                <div>
                    <button type="submit" id="btnSave" class="btn">添加</button>
                    <a href="<?php echo __URL('ADMIN_MAIN/goods/goodslist'); ?>" class="btn back">返回</a>
                </div>
            </div>
        </div>
    </div>

</form>

<!--</body>-->
<!--保存中的提示-->
<div id="saveTips" class="hide">
    <div class="saving"></div>
    <div class="saveing-box">
        <div><img src="/public/admin/images/loading.svg" alt="" style="width: 80px;height: 80px"></div>
        <p>微信卡券创建中</p>
    </div>
</div>
<!-- /.modal -->

        </div>
        <div class="copyrights"><a href="http://q.url.cn/s/EPvXzVm" target="_blank" class="text-primary">在线客服</a> | <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>Copyright©2012-2019  All Rights Reserved 网站备案号：粤ICP备14084496号<?php endif; ?></div>
    </div>
</div>

<!--修改密码弹出框 -->
<div id="password_modal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>修改密码</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd0"><span class="red">*</span>原密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd0" placeholder="请输入原密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd1"><span class="red">*</span>新密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd1" placeholder="请输入新密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="pwd2"><span class="red">*</span>再次输入密码</label>
                        <div class="col-sm-5">
                            <input type="password" id="pwd2" placeholder="请输入确认密码" class="form-control"/>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div style="text-align: center; height: 20px;" id="show"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary submitPassword" style="display:inline-block;">保存</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
            </div>
        </div>
    </div>
</div>
<script>
require(['utilAdmin'], function (utilAdmin) {
    function loading(){
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/index/getOrderCount'); ?>",
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
            }
        });
    }
    loading();
    // ie浏览器判断
    function isIE() {
        if (!!window.ActiveXObject || "ActiveXObject" in window){
            location.href="<?php echo __URL('ADMIN_MAIN/login/versionLow'); ?>&website_id="+$('#website_id').val();
        }
     }
     isIE();

    $(".newsTips").hover(function(){
        $(this).addClass("open");
    },function(){
        $(this).removeClass("open");
    });

    /**
     * 清理缓存
     */
    function delcache() {
        $.ajax({
            url: __URL(ADMINMAIN + "/system/deletecache"),
            type: "post",
            data: {},
            dataType: "json",
            success: function (data) {
                if (data) {
                    utilAdmin.message("缓存更新成功！",'success',location.reload());
                } else {
                    utilAdmin.message("更新失败，请检查文件权限！", 'danger');
                }
            }
        });
    }
    /**
     * 修改密码
     */
    function submitPassword() {
        var pwd0 = $("#pwd0").val();
        var pwd1 = $("#pwd1").val();
        var pwd2 = $("#pwd2").val();
        if (pwd0 == '') {
            $("#pwd0").focus();
            // $("#pwd0").siblings("span").html("原密码不能为空");
            utilAdmin.message('原密码不能为空');
            return;
            
        } 
        if (pwd1 == '') {
            $("#pwd1").focus();
            utilAdmin.message("密码不能为空");
            return;
        } else if ($("#pwd1").val().length < 6) {
            $("#pwd1").focus();
            utilAdmin.message("密码不能少于6位数");
            return;
        } else {
            $("#pwd1").siblings("span").html("");
        }
        if (pwd2 == '') {
            $("#pwd2").focus();
            utilAdmin.message("密码不能为空");
            return;
        } else if ($("#pwd2").val().length < 6) {
            $("#pwd2").focus();
            utilAdmin.message("密码不能少于6位数");
            return;
        } else {
            $("#pwd2").siblings("span").html("");
        }
        if (pwd1 != pwd2) {
            $("#pwd2").focus();
            utilAdmin.message("两次密码输入不一样，请重新输入");
            return;
        }
        $.ajax({
            url : __URL(PASSMAIN+"/index/modifypassword"),
            type : "post",
            data : {
                "old_pass" : $("#pwd0").val(),
                "new_pass" : $("#pwd1").val()
            },
            dataType : "json",
            success : function(data) {
                if (data['code'] > 0) {
                                utilAdmin.message("密码修改成功！","success", function () {
                                    location.href= __URL(PASSMAIN+"/login/logout");
                                });
                } else {
                                utilAdmin.message(data['message'],"danger");
                                return false;
                }
            }
        });
    }
    $('body').on('click','.delcache',function(){
        delcache();
    })
    $('body').on('click','.submitPassword',function(){
        submitPassword();
    })

//指定要操作的元素的click事件停止传播—定义属性值data-stopPropagation的元素点击时停止传播事件
    $("body").on('click','[data-stopPropagation]',function (e) {
        e.stopPropagation();
    });
    $("#firstpane .menu_body:eq(0)").show();
    $("#firstpane p.menu_head").click(function() {
      if ($(this).hasClass("current")) {
        $(this).removeClass("current");
        $(this)
          .nextAll("div.menu_body")
          .eq(0)
          .slideToggle(300)
          .slideUp("slow");
      } else {
        $(this)
          .addClass("current")
          .next("div.menu_body")
          .slideToggle(300)
          .siblings("div.menu_body")
          .slideUp("slow");
        $(this)
          .siblings()
          .removeClass("current");
      }
    });

})
</script>

<script>
	var storeListUrl = "<?php echo $storeListUrl; ?>";
	var storeStatus =  "<?php echo $store; ?>";
    require(['utilAdmin', 'adminAddgood'], function (utilAdmin, adminAddgood) {

        //显示隐藏更多设置
        $('.fold-btn').click(function () {
            var status = $(this).data('status');
            if (status == 1) {
                $('.fold-field').addClass('hide');
                $(".icon-drop-down").addClass('rotate');
                $(".set-more").text("更多设置");
                $(this).data('status', '0');
            } else {
                $('.fold-field').removeClass('hide');
                $(".icon-drop-down").removeClass('rotate');
                $(".set-more").text("收起更多设置");
                $(this).data('status', '1');
            }

        })
        adminAddgood.goodsSkuCreate();

        utilAdmin.validate("#form1");



        utilAdmin.layDate("#expiration_time");
    })
</script>

</body>
</html>