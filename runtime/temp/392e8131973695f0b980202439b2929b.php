<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:31:"template/admin/Index/index.html";i:1591320262;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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

<!--<script src="ADMIN_JS/jquery.timers.js"></script>
<script src="__STATIC__/lib/Echarts/echarts.js"></script>
<script src="__STATIC__/lib/Echarts/walden.js"></script>
<script src="ADMIN_JS/index.js"></script>-->
<!-- ********************【脚本统一写在index.js中】******************** -->
  <style>
	.jconfirm-buttons{
		float: none !important;
		text-align: center !important;
	}
	.v-container{
		background-color: #f5f5f5;
		padding:10px;
		margin-bottom:0px;
        padding-bottom: 0;
	}
    .copyrights{
        margin-top: 0;
    }
</style>

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

    <div class="">

        <!--商城助手-->
        <div class="v-card-body" id="mallGuide">
            <div class="newbie mb-20 flex flex-pack-justify">
                <div class="bold">商城助手</div>
                <div class="pr remove-pr">
                    <a href="javascript:void(0);"><i class="icon icon-set"></i></a>
                    <div class="remove-pos">
                        <div class="remove-arrow">
                            <a href="javascript:void(0)" id="remove">永久关闭</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="process">
                <div class="procedure">
                    <div class="step-number">
                        <img src="/public/platform/images/index/1.png" alt="">
                        <div class="select">
                            <div class="flex">
                                <div class="choose">店铺基本配置</div>
                                <div class="v-tooltip">									
                                    <span class="tips-box"><i class="icon icon-index-guide"></i></span>
                                    <div class="v-tooltip-box">
                                        <div class="v-tooltip-box-arrow">
                                            <ul class="tooltip-box-ul">
                                                <li><i class="icon <?php if($basic_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>店铺信息</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php if($basic_set): ?>
                                <span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
                                <?php else: ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/shop/shopconfig'); ?>" class="v-btn-set">前往设置</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="procedure">
                    <div class="step-number">
                        <img src="/public/platform/images/index/2.png" alt="">
                        <div class="select">
                            <div class="flex">
                                <div class="choose">配置物流信息</div>
                                <div class="v-tooltip">
                                    <span class="tips-box"><i class="icon icon-index-guide"></i></span>
                                    <div class="v-tooltip-box">
                                        <div class="v-tooltip-box-arrow">
                                            <ul class="tooltip-box-ul">
                                                <li><i class="icon <?php if($express_company_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>物流公司</li>
                                                <li><i class="icon <?php if($shipping_fee_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>运费模板</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php if($express_company_set && $shipping_fee_set): ?>
                                <span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
                                <?php elseif($express_company_set): ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/express/freighttemplatelist'); ?>" class="v-btn-set">前往设置</a>
                                <?php elseif($shipping_fee_set): ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/express/expresscompany'); ?>" class="v-btn-set">前往设置</a>
                                <?php else: ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/express/expresscompany'); ?>" class="v-btn-set">前往设置</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="procedure">
                    <div class="step-number">
                        <img src="/public/platform/images/index/4.png" alt="">
                        <div class="select">
                            <div class="flex">
                                <div class="choose">发布商品</div>
                                <div class="v-tooltip">
                                    <span class="tips-box"><i class="icon icon-index-guide"></i></span>
                                    <div class="v-tooltip-box">
                                        <div class="v-tooltip-box-arrow">
                                            <ul class="tooltip-box-ul">
                                                <li><i class="icon <?php if($goods_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>发布商品</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php if($goods_set): ?>
                                <span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
                                <?php else: ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/goods/goodslist'); ?>" class="v-btn-set">前往设置</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="procedure">
                    <div class="step-number">
                        <img src="/public/platform/images/index/5.png" alt="">
                        <div class="select">
                            <div class="flex">
                                <div class="choose">店铺装修</div>
                                <div class="v-tooltip">
                                    <span class="tips-box"><i class="icon icon-index-guide"></i></span>
                                    <div class="v-tooltip-box">
                                        <div class="v-tooltip-box-arrow">
                                            <ul class="tooltip-box-ul">
                                                <li><i class="icon <?php if($custom_shop_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>店铺首页</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <?php if($custom_shop_set): ?>
                                <span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
                                <?php else: ?>
                                <a href="<?php echo __URL('ADMIN_MAIN/config/customtemplatelist'); ?>" class="v-btn-set">前往设置</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--商城助手-->
        <!--运营状况-->
        <div class="v-card-body">
            <div class="newbie mb-20 flex flex-pack-justify">
                <div class="bold">运营概况</div>
            </div>
            <div class="engage">
                <div class="payment">
                    <div class="payment-one">
                        <div class="pay-img"><img src="/public/platform/images/index/6.png" alt=""></div>
                        <div class="string"></div>
                        <div class="figures">
                            <div class="figure">
                                <div class="pay-mange">待发货订单</div>
                                <div class="pay-num"><a href="<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>?order_status=1" class="index-order-red"><?php echo $order_data['daifahuo']; ?></a></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">售后订单</div>
                                <div class="pay-num"><a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist'); ?>" class="index-order-red"><?php echo $order_data['tuikuanzhong']; ?></a></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">本月成交订单</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $order_data['complete']; ?></a></div>
                                <div class="pay-day">上月：<?php echo $order_data['complete1']; ?></div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="payment">
                    <div class="payment-one">
                        <div class="pay-img"><img src="/public/platform/images/index/7.png" alt=""></div>
                        <div class="string"></div>
                        <div class="figures">
                            <div class="figure">
                                <div class="pay-mange">今日营业额</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_money_day1']; ?></a></div>
                                <div class="pay-day">昨日：<?php echo $sale_data['sale_money_day2']; ?></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">今日支付订单</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_num_day1']; ?></a></div>
                                <div class="pay-day">昨日：<?php echo $sale_data['sale_num_day2']; ?></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">支付人数</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_member_day1']; ?></a></div>
                                <div class="pay-day">昨日：<?php echo $sale_data['sale_member_day2']; ?></div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="payment">
                    <div class="payment-one">
                        <div class="pay-img"><img src="/public/platform/images/index/8.png" alt=""></div>
                        <div class="string"></div>
                        <div class="figures">
                            <div class="figure">
                                <div class="pay-mange">出售中商品</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $goods_data['sale']; ?></a></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">仓库中商品</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $goods_data['store']; ?></a></div>
                            </div>
                            <div class="figure">
                                <div class="pay-mange">库存预警</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $goods_data['warning']; ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment">
                    <div class="payment-one">
                        <div class="pay-img"><img src="/public/platform/images/index/9.png" alt=""></div>
                        <div class="string"></div>
                        <div class="figures">
                            <div class="figure">
                                <div class="pay-mange">待处理提现</div>
                                <div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $withdraws_data['withdraw']; ?></a></div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!--运营状况-->
        <!--快捷入口-->
        <div class="v-card-body">
            <div class="newbie mb-20 flex flex-pack-justify">
                <div class="bold">快捷入口</div>
            </div>
            <div class="succession">
                <div class="balance">
                    <a href="<?php echo __URL('ADMIN_MAIN/goods/addgoods'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/12.png" alt="">
                        <div class="ml-10">发布商品</div>
                    </a>
                    <a href="<?php echo __URL('ADMIN_MAIN/config/customtemplatelist'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/13.png" alt="">
                        <div class="ml-10">店铺装修</div>
                    </a>
                    <a href="<?php echo __URL('ADMIN_MAIN/financial/shopaccount'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/14.png" alt="">
                        <div class="ml-10">店铺收入</div>
                    </a>
                    <a href="<?php echo __URL('ADMIN_MAIN/order/orderlist'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/15.png" alt="">
                        <div class="ml-10">订单管理</div>
                    </a>
                    <a href="<?php echo __URL('ADMIN_MAIN/Statistics/ordersAnalysis'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/16.png" alt="">
                        <div class="ml-10">订单分析</div>
                    </a>
                    <a href="<?php echo __URL('ADMIN_MAIN/shop/shopconfig'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/17.png" alt="">
                        <div class="ml-10">店铺信息</div>
                    </a>
                    <a href="<?php echo __URL('ADDONS_ADMIN_MAINformList'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/18.png" alt="">
                        <div class="ml-10">发货助手</div>
                    </a>
                    <a href="<?php echo __URL('ADDONS_ADMIN_MAINgoodImportHelper'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/19.png" alt="">
                        <div class="ml-10">商品助手</div>
                    </a>
                    <a href="<?php echo __URL('ADDONS_ADMIN_MAINcouponTypeList'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/20.png" alt="">
                        <div class="ml-10">优惠券</div>
                    </a>
                    <a href="<?php echo __URL('ADDONS_ADMIN_MAINfullCutList'); ?>" class="balanceOperation">
                        <img src="/public/platform/images/index/21.png" alt="">
                        <div class="ml-10">满减送</div>
                    </a>
                </div>
            </div>
        </div>
        <!--快捷入口-->
        <div class="row">
            <div class="col-sm-6 pr-10">
                <div class="v-card-body">
                    <div class="newbie mb-20 flex flex-pack-justify">
                        <div class="bold">订单概况</div>
                    </div>
                    <div class="tab-content mb" style="margin-bottom: 5px">
                        <div role="tabpanel" class="tab-pane fade in active" id="website_create" style="height: 300px;"></div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 tradeState pl-10">
                <div class="v-card-body">
                    <div class="newbie mb-20 flex flex-pack-justify">
                        <div class="bold">转化概况</div>
                    </div>

                    <div class="panel-body pr panel-paddings">
                        <div class="left ">
                            <div class="left-data">
                                <div class="ts-item" style="background-color: #f2f6fd">
                                    <ul class="ts-item-ul clearfix">
                                        <li>
                                        <p>访客人数</p>
                                        <p id="visitor_num" class="index-order-red"></p>
                                        </li>
                                    </ul>

                                </div>
                                <div class="ts-item" style="background-color: #eff8f0">
                                    <ul class="ts-item-ul clearfix">
                                        <li>
                                        <p>下单买家数</p>
                                        <p id="order_num" class="index-order-red"></p>
                                        </li>
                                        <li>
                                        <p>下单金额</p>
                                        <p id="order_money" class="index-order-red"></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ts-item" style="background-color: #fdf7ed">
                                    <ul class="ts-item-ul clearfix">
                                        <li>
                                        <p>支付买家数</p>
                                        <p id="pay_num" class="index-order-red"></p>
                                        </li>
                                        <li>
                                        <p>支付金额</p>
                                        <p id="pay_money" class="index-order-red"></p>
                                        </li>
                                        <li>
                                        <p>客单价</p>
                                        <p id="unit_price" class="index-order-red"></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="left-chart">
                                <div class="pr">
                                    <div class="rate-item1">
                                        <p>转化率</p>
                                        <p id="order_conversion" class="index-order-red"></p>
                                    </div>
                                    <div class="rate-item2">
                                        <p>转化率</p>
                                        <p id="orderpay_conversion" class="index-order-red"></p>
                                    </div>
                                    <div class="rate-item3">
                                        <p>转化率</p>
                                        <p id="pay_conversion" class="index-order-red"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







<input type="hidden" id="entry_ids" value="<?php echo $entry_ids; ?>">
<!--<div class="index_tables">
    <div id="website_create" style="height: 400px"></div>
</div>-->
<!-- page end -->

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
      require(['utilAdmin','util'], function (utilAdmin,util) {
$(function () {
    getOrderMovementCharts();
    getGoodsList(-1);
    getTransactionStatus(1);

    var type_module =  $("#entry_ids").val();
    if(type_module){
        var type_module_array = type_module.split(',');
        for (var i = 0; i < type_module_array.length; i++) {
            $('input[type="checkbox"][value="' + type_module_array[i] + '"]').prop("checked", true);
        }
    }
});
function getOrderMovementCharts() {
    $.ajax({
        type: "post",
        url: __URL(ADMINMAIN + '/index/getordermovementschartcount'),
        async: true,
        success: function (datas) {
            var data = eval(datas);

            // 指定图表的配置项和数据
            var option = {
                title: {
                    subtext:'近7日自营订单走势',
                    left: 'center',
                    top:'20'
                },
                // tooltip: {
                //     trigger: 'item',
                //     formatter: '{a} <br/>{b} : {c}'
                // },
                  tooltip: {
                      trigger: 'axis'
                  },
                legend: {
                    left: 'center',
                    // top: '30px',
                    data: data.ordertype,
                },
                xAxis: {
                    type: 'category',
                    data: data.day,
                    boundaryGap: false,
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                yAxis: {
                    type: 'value',
                    name:'数量',
                },
                series: data.all
            };

            util.chart('website_create',option);
        }
    });
}

function getGoodsList(time){
    $.ajax({
        type:"post",
        url : __URL(ADMINMAIN+'/index/goodsAnalysis'),
        async : true,
        data :{'times':time},
        success : function(data) {
            var html = '';
            if (data['data']['data'].length >=7) {
                for (var g = 0; g < data['data']["data"].length; g++) {
                    if(g<=6){
                        html +='<ul class="ranking-table-tr flex">';
                        html +='<li>'+(g+1)+'</li>';
                        html +='<li class="line1-1">'+data["data"]['data'][g]["goods_name"]+'</li>';
                        html +='<li> '+ data["data"]['data'][g]['sumCount'] +' </li>';
                        html +='<li class="orange">'+ data["data"]['data'][g]['sumMoney'] +'</li>';
                        html +='</ul>';
                    }
                }
            }else if( data['data']['data'].length < 7 && data['data']['data'].length > 0 ){
                for (var i = 0; i < data["data"]['data'].length; i++) {
                    html += '<ul class="ranking-table-tr flex">';
                    html += '<li>' + (i + 1) + '</li>';
                    html += '<li class="line1-1">' + data["data"]['data'][i]["goods_name"] + '</li>';
                    html += '<li> ' + data["data"]['data'][i]['sumCount'] + ' </li>';
                    html += '<li class="orange">' + data["data"]['data'][i]['sumMoney'] + '</li>';
                    html += '</ul>';
                }
                var real_length = 7 - data['data']['data'].length;
                if(data["data1"]['data'].length>0){
                    for (var j = 0; j < data["data1"]['data'].length; j++) {
                        if(j<real_length){
                            html += '<ul class="ranking-table-tr flex">';
                            html += '<li>' + (data['data']['data'].length+j + 1) + '</li>';
                            html += '<li class="line1-1">' + data["data1"]['data'][j]["goods_name"] + '</li>';
                            html += '<li> 0 </li>';
                            html += '<li class="orange"> 0 </li>';
                            html += '</ul>';
                        }
                    }
                }
            }else if(data["data"]['data'].length==0 && data["data1"]['data'].length>0){
                for (var k = 0; k < data["data1"]['data'].length; k++) {
                    if(k<=6){
                        html += '<ul class="ranking-table-tr flex">';
                        html += '<li>' + (k + 1) + '</li>';
                        html += '<li class="line1-1">' + data["data1"]['data'][k]["goods_name"] + '</li>';
                        html += '<li> 0 </li>';
                        html += '<li class="orange"> 0 </li>';
                        html += '</ul>';
                    }
                }
            }else{
                html += '<ul class="ranking-table-tr flex"><li style="width:100%">暂无商品售出</li><ul>';
            }
            $("#goods_list").html(html);
        }
    });
}
function getTransactionStatus(time) {
    $.ajax({
        type:"post",
        url : __URL(ADMINMAIN+'/index/getTransactionStatus'),
        async : true,
        data :{'times':time},
        success : function(data) {
            $("#vistor").html(data['visitor_num']);
            $("#visitor_num").html(data['visitor_num']);
            $("#order_num").html(data['order_num']);
            $("#order_money").html(data['order_money']);
            $("#pay_num").html(data['pay_num']);
            $("#pay_money").html(data['pay_money']);
            $("#unit_price").html(data['unit_price']);
            $("#order_conversion").html(data['order_conversion']);
            $("#orderpay_conversion").html(data['orderpay_conversion']);
            $("#pay_conversion").html(data['pay_conversion']);
        }
    });
}
//定时器
// function everyTimePut(tag_name, num) {
//     if (num > 0) {
//         var number = 1;
//         $('body').everyTime('0.01s', 'B', function () {
//             $(tag_name).text(number);
//             number++;
//             if (number > 100) {
//                 $(tag_name).text(num);
//                 return false;
//             }
//         }, parseInt(num));
//     } else {
//         $(tag_name).text(0);
//     }
// }

		// 永久移除点击事件
		$("#remove").on("click",function(){
			util.alert("移除模块后，商家后台首页将不会再呈现商城助手。",function(){
				$("#mallGuide").fadeOut();
			})
		})

      })
</script>

</body>
</html>