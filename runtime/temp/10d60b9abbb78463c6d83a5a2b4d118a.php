<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/platform/Order/orderDetail.html";i:1591330112;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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

        <div class="screen-title">
            <span class="text">详情信息</span>
        </div>
        <div class="row panel-detail">
            <div class="col-md-4">
                <div class="item border-right" style="height: auto;">
                    <h3 class="strong">订单详情</h3>

                    <p class="p">订单类型：<?php echo $order['order_type_name']; ?></p>
                    <p class="p">订单编号：<?php echo $order['order_no']; ?></p>
                    <?php if($order["presell_id"] == '0'): ?>
                    <p class="p">外部交易号：<?php echo $order['out_trade_no']; ?></p>
                    <?php else: ?>
                    <p class="p">外部交易号（定金）：<?php echo $order['out_trade_no']; ?></p>
                    <p class="p">外部交易号（尾款）：<?php echo $order['out_trade_no_presell']; ?></p>
                    <?php endif; if($order["order_status"] == 0 && $order["presell_id"] == 0): ?>
                    <p class="p">订单状态：买家付款</p>
                    <?php elseif($order['order_status']=='0' && $order['presell_id']>0 && $order['money_type']==0): ?>
                    <p class="p">订单状态：待付定金</p>
                    <?php elseif($order['order_status']=='0' && $order['money_type']==1): ?>
                    <p class="p">订单状态：待付尾款</p>
                    <?php endif; if($order["order_status"] == 1): ?><p class="p">订单状态：<?php if($order['shipping_type']==2): ?>待提货<?php else: ?>待发货<?php endif; ?></p><?php endif; if($order["order_status"] == 2): ?><p class="p">订单状态：待收货</p><?php endif; if($order["order_status"] == 3): ?><p class="p">订单状态：已收货</p><?php endif; if($order["order_status"] == 4): ?><p class="p">订单状态：交易完成</p><?php endif; ?>
                    <p class="p">下单时间：<?php echo date('Y-m-d H:i:s',$order['create_time']); ?></p>
                    <p class="p">配送方式：<?php echo $order['shipping_type_name']; ?></p>
                    <p class="p">买家留言：<?php echo $order['buyer_message']; ?></p>
                </div>
            </div>
            <?php if($order['goods_type'] != 3 && $order['goods_type'] != 4): if($order['shipping_type']==1): ?>
            <div class="col-md-4">
                <div class="item border-right">
                    <h3 class="strong">收货人信息</h3>

                    <p class="p">收货人：<?php echo $order['receiver_name']; ?></p>
                    <p class="p">手机号码：<?php echo $order['receiver_mobile']; ?></p>
                    <p class="p">地址：<?php echo $order['address']; ?></p>
                    <?php if($shop_id == $order['shop_id']): ?>
                    <p class="p">
                        <button class="btn btn-primary editInfo">编辑信息</button>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php else: ?>
            <div class="col-md-4">
                <div class="item border-right">
                    <h3 class="strong"><?php if(($order['card_store_id']>0)): ?>核销<?php else: ?>提货<?php endif; ?>人信息</h3>
                    <p class="p">手机号码：<?php echo $order['order_pickup']['user_tel']; ?></p>
                    <p class="p"><?php if(($order['card_store_id']>0)): ?>核销<?php else: ?>提货<?php endif; ?>地址：<?php echo $order['order_pickup']['province_name']; ?><?php echo $order['order_pickup']['city_name']; ?><?php echo $order['order_pickup']['dictrict_name']; ?><?php echo $order['order_pickup']['address']; ?></p>
                </div>
            </div>
            <?php endif; endif; ?>
            <div class="col-md-4">
                <div class="item">
                    <h3 class="strong">订单详情</h3>
                    <?php if($order['presell_id']): ?>
                        <p class="p">支付方式：<?php echo $order['payment_type_name']; if($order['offline_pay_presell']==2): ?>(后台支付)<?php endif; ?> + <?php echo $order['payment_type_presell_name']; if($order['offline_pay']==2): ?>(后台支付)<?php endif; ?></p>
                    <?php else: ?>
                        <p class="p">支付方式：<?php echo $order['payment_type_name']; if($order['offline_pay']==2): ?>(后台支付)<?php endif; ?></p>
                    <?php endif; if($order['presell_id']): ?>
                    <p class="p">
                        商品总额：
                            定金：￥<?php echo $order['first_money']; ?>
                            + 尾款：￥<?php echo $order['final_money']; ?>
                    </p>
                    <?php elseif($order['order_type'] == 10): ?>
                    <p class="p">商品总额：<?php if($order['goods_money']==0): ?><?php echo $order['point']; ?>积分<?php else: ?><?php echo $order['point']; ?>积分 + ￥<?php echo $order['goods_money']; endif; ?></p>
                    <?php else: ?>
                        <p class="p">商品总额：￥<?php echo $order['goods_money']; ?></p>
                    <?php endif; if(($order['deduction_money']>0)): ?>
					<p class="p">积分抵扣：￥<?php echo $order['deduction_money']; ?></p>
					<?php endif; ?>
                    <p class="p">优惠：￥<?php echo $order['order_promotion_money']; ?></p>
                    <p class="p">价格调整：￥<?php if($order['order_adjust_money'] > 0): ?>+<?php endif; ?><?php echo $order['order_adjust_money']; ?></p>
                    <p class="p">运费：￥<?php echo $order['shipping_money'] - $order['promotion_free_shipping']; if($order['promotion_free_shipping'] != 0): ?>(已减<?php echo $order['promotion_free_shipping']; ?>)<?php endif; ?></p>
                    <?php if($order['invoice_tax'] > 0): ?>
                    <p class="p">税费：￥<?php echo $order['invoice_tax']; ?></p>
                    <?php endif; if($order['presell_id']): ?>
                    <p class="p">
                        实收金额：
                        <?php if($order['money_type'] == 1): ?>
                        <?php echo $order['pay_money']; elseif($order['money_type'] == 2): ?>
                        <?php echo $order['order_money']; endif; ?>

                    </p>
                    <?php elseif($order['order_type'] == 10): ?>
                    <p class="p">实收金额：<?php if($order['order_money']==0): ?><?php echo $order['point']; ?>积分<?php else: ?><?php echo $order['point']; ?>积分 + ￥<?php echo $order['order_money']; endif; ?></p>
                    <?php else: ?>
                    <p class="p">实收金额：<?php echo $order['order_money']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if($order['commissionA_id'] || $order['commissionB_id'] || $order['commissionC_id']): ?>
        <div class="screen-title">
            <span class="text">分销商信息</span>
        </div>
        <table class="table v-table table-bordered table-auto-center">
            <tbody>
            <tr>
                <?php if($order['commissionA_id']): ?>
                <td>
                    <img src="<?php if($order['commissionA_user_headimg']): ?><?php echo __IMG($order['commissionA_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['commissionA_name']; ?></span>
                    <p class="strong">一级佣金：<?php echo $order['commissionA']; ?>元</p>
                    <p class="strong">一级积分：<?php echo $order['pointA']; ?>积分</p>
                </td>
                <?php endif; if($order['commissionB_id']): ?>
                <td>
                    <img src="<?php if($order['commissionB_user_headimg']): ?><?php echo __IMG($order['commissionB_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['commissionB_name']; ?></span>
                    <p class="strong">二级佣金：<?php echo $order['commissionB']; ?>元</p>
                    <p class="strong">二级积分：<?php echo $order['pointB']; ?>积分</p>
                </td>
                <?php endif; if($order['commissionC_id']): ?>
                <td>
                    <img src="<?php if($order['commissionC_user_headimg']): ?><?php echo __IMG($order['commissionC_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['commissionC_name']; ?></span>
                    <p class="strong">三级佣金：<?php echo $order['commissionC']; ?>元</p>
                    <p class="strong">三级积分：<?php echo $order['pointC']; ?>积分</p>
                </td>
                <?php endif; ?>
            </tr>
            </tbody>
        </table>
        <?php endif; if($order['global_bonus'] || $order['area_bonus'] || $order['team_bonus']): ?>
        <div class="screen-title">
            <span class="text">代理商信息</span>
        </div>
        <table class="table v-table table-bordered table-auto-center">
            <tbody>
            <tr>
                <?php if($order['global_bonus']): ?>
                <td>
                    <p class="strong">全球分红：<?php echo $order['global_bonus']; ?>元  <a href="javacript:void(0);" class="btn btn-primary bonusDetail" data-type="1" data-id="<?php echo $order['order_id']; ?>">分红明细</a></p>
                </td>
                <?php endif; if($order['area_bonus']): ?>
                <td>
                    <p class="strong">区域分红：<?php echo $order['area_bonus']; ?>元  <a href="javacript:void(0);" class="btn btn-primary bonusDetail" data-type="2" data-id="<?php echo $order['order_id']; ?>">分红明细</a></p>
                </td>
                <?php endif; if($order['team_bonus']): ?>
                <td>
                    <p class="strong">团队分红：<?php echo $order['team_bonus']; ?>元  <a href="javacript:void(0);" class="btn btn-primary bonusDetail" data-type="3" data-id="<?php echo $order['order_id']; ?>">分红明细</a></p>
                </td>
                <?php endif; ?>
            </tr>
            </tbody>
        </table>
        <?php endif; if($order['profitA_id'] || $order['profitB_id'] || $order['profitC_id']): ?>
        <div class="screen-title">
            <span class="text">微店店主信息</span>
        </div>
        <table class="table v-table table-bordered table-auto-center">
            <tbody>
            <tr>
                <?php if($order['profitA_id']): ?>
                <td>
                    <img src="<?php if($order['profitA_user_headimg']): ?><?php echo __IMG($order['profitA_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['profitA_name']; ?></span>
                    <p class="strong">一级收益：<?php echo $order['profitA']; ?>元</p>
                </td>
                <?php endif; if($order['profitB_id']): ?>
                <td>
                    <img src="<?php if($order['profitB_user_headimg']): ?><?php echo __IMG($order['profitB_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['profitB_name']; ?></span>
                    <p class="strong">二级收益：<?php echo $order['profitB']; ?>元</p>
                </td>
                <?php endif; if($order['profitC_id']): ?>
                <td>
                    <img src="<?php if($order['profitC_user_headimg']): ?><?php echo __IMG($order['profitC_user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="50px" height="50px">
                    <span class="block"><?php echo $order['profitC_name']; ?></span>
                    <p class="strong">三级收益：<?php echo $order['profitC']; ?>元</p>
                </td>
                <?php endif; ?>
            </tr>
            </tbody>
        </table>
        <?php endif; ?>
        <div class="screen-title">
            <span class="text">订单商品</span>
        </div>
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>商品</th>
                <?php if($order['order_type'] == 10): ?>
                <th>兑换价</th>
                <?php else: ?>
                <th>单价</th>
                <?php endif; ?>
                <th>数量</th>
                <th>优惠</th>
                <?php if($order['invoice_tax']>0): ?>
                <th>税费</th>
                <?php endif; ?>
                <th>价格调整</th>
                <th>合计</th>
            </tr>
            </thead>
            <tbody>
            <?php if($order['order_goods_no_delive']): if(is_array($order['order_goods_no_delive']) || $order['order_goods_no_delive'] instanceof \think\Collection || $order['order_goods_no_delive'] instanceof \think\Paginator): if( count($order['order_goods_no_delive'])==0 ) : echo "" ;else: foreach($order['order_goods_no_delive'] as $key=>$goods): ?>
            <tr>
                <td>
                    <div class="media text-left">
                        <div class="media-left" style="width:60px;height:60px;">
                            <img src="<?php echo __IMG($goods['picture_info']['pic_cover_mid']); ?>" alt="" width="60" height="60">
                        </div>
                        <div class="media-body max-w-300">
                            <div class="line-2-ellipsis"><?php echo $goods['goods_name']; ?></div>
                            <div class="small-muted line-2-ellipsis">
                                <?php if(is_array($goods['spec']) || $goods['spec'] instanceof \think\Collection || $goods['spec'] instanceof \think\Paginator): if( count($goods['spec'])==0 ) : echo "" ;else: foreach($goods['spec'] as $key=>$spec_info): ?>
                                <span><?php echo $spec_info['spec_name'] . ' : ' . $spec_info['spec_value_name']; ?></span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                </td>
                <?php if($goods['order_type'] == 10): ?>
                <td><?php echo $goods['goods_point']; ?>积分 + ￥<?php echo $goods['price']; ?></td>
                <?php else: ?>
                <td>￥<?php echo $goods['price']; ?></td>
                <?php endif; ?>
                <td><?php echo $goods['num']; ?></td>
                <td>￥<?php echo round($goods['order_goods_promotion_money'],2); ?></td>
                <?php if($goods['invoice_tax'] > 0): ?>
                <td>￥<?php echo $goods['invoice_tax']; ?></td>
                <?php endif; ?>
                <td>￥<?php if($goods['adjust_money'] > 0): ?>+<?php endif; ?><?php echo round($goods['adjust_money'] * $goods['num'],2); ?></td>
                <td>￥<?php echo $goods['real_money'] + $goods['invoice_tax']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; if($order['goods_packet_list']): if(is_array($order['goods_packet_list']) || $order['goods_packet_list'] instanceof \think\Collection || $order['goods_packet_list'] instanceof \think\Paginator): if( count($order['goods_packet_list'])==0 ) : echo "" ;else: foreach($order['goods_packet_list'] as $key=>$list): if(!$order['store_id'] && $order['goods_type'] != '3'): ?>
            <tr><td colspan="6" class="text-left bg-f9">
                <span><?php echo $list['packet_name']; ?></span>
                <span style="padding-right: 30px"><?php echo $list['express_name']; ?></span>
                <span style="padding-right: 30px">单号:<?php echo $list['express_code']; ?></span>
                <span style="padding-right: 30px">
            <a href="javascript:void(0);" data-express-code="<?php echo $list['express_code']; ?>" data-com="<?php echo $list['express_company_id']; ?>" class="text-primary J-logistics-info">物流跟踪</a>
            </span>
            </td></tr>
            <?php endif; if(is_array($list['order_goods_list']) || $list['order_goods_list'] instanceof \think\Collection || $list['order_goods_list'] instanceof \think\Paginator): if( count($list['order_goods_list'])==0 ) : echo "" ;else: foreach($list['order_goods_list'] as $key=>$goods): ?>
            <tr>
                <td class="picword_td">
                    <div class="media text-left">
                        <div class="media-left">
                            <p>
                                <img src="<?php echo __IMG($goods['picture_info']['pic_cover_mid']); ?>" style="width:60px;height:60px;">
                            </p>
                        </div>
                        <div class="media-body max-w-300">
                            <div class="line-2-ellipsis">
                                <a href="javascript:;" target="_blank"><?php echo $goods['goods_name']; ?> </a>
                            </div>
                            <div class="small-muted line-2-ellipsis">
                                <?php if(is_array($goods['spec']) || $goods['spec'] instanceof \think\Collection || $goods['spec'] instanceof \think\Paginator): if( count($goods['spec'])==0 ) : echo "" ;else: foreach($goods['spec'] as $key=>$spec_info): ?>
                                <span><?php echo $spec_info['spec_name'] . ' : ' . $spec_info['spec_value_name']; ?></span>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td>￥<?php echo $goods['price']; ?></td>
                <td><?php echo $goods['num']; ?></td>
                <td>￥<?php echo $goods['order_goods_promotion_money']; ?></td>
                <td>￥<?php if($goods['adjust_money'] > 0): ?>+<?php endif; ?><?php echo round($goods['adjust_money'] * $goods['num'],2); ?></td>
                <td>￥<?php echo $goods['actual_price'] * $goods['num']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
        <?php if($order['order_status'] == 0 && $shop_id == $order['shop_id'] && $order['order_type'] != 7): ?>
        <div class="mb-20 clearfix">
            <a href="javascript:void(0);" class="text-primary pull-right edit">修改价格</a>
        </div>
        <?php endif; ?>

        <div class="screen-title">
            <span class="text">操作信息</span>
        </div>
        <ul class="nav nav-tabs v-nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#orderNote" aria-controls="orderNote" role="tab"
                                                      data-toggle="tab" class="flex-auto-center">订单备注</a></li>
            <li role="presentation"><a href="#orderLog" aria-controls="orderLog" role="tab" data-toggle="tab"
                                       class="flex-auto-center">订单日志</a></li>
            <li role="presentation"><a href="#orderRefund" aria-controls="orderRefund" role="tab" data-toggle="tab"
                                       class="flex-auto-center">退款日志</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="orderNote">
                <table class="table v-table table-auto-center">
                    <thead>
                    <tr>
                        <th>备注内容</th>
                        <th>操作人</th>
                        <th>操作时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($order['memo_lists']): if(is_array($order['memo_lists']) || $order['memo_lists'] instanceof \think\Collection || $order['memo_lists'] instanceof \think\Paginator): if( count($order['memo_lists'])==0 ) : echo "" ;else: foreach($order['memo_lists'] as $key=>$list): ?>
                    <tr>
                        <td><?php echo $list['memo']; ?></td>
                        <td><?php echo $list['user_name']; ?></td>
                        <td><?php echo $list['create_date']; ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                    <tr>
                        <td colspan="3">暂时没有数据</td>
                    </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="orderLog">
                <table class="table v-table table-auto-center">
                    <thead>
                    <tr>
                        <th>操作类型</th>
                        <th>操作人</th>
                        <th>操作时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($order['order_action']) || $order['order_action'] instanceof \think\Collection || $order['order_action'] instanceof \think\Paginator): if( count($order['order_action'])==0 ) : echo "" ;else: foreach($order['order_action'] as $key=>$action): ?>
                    <tr>
                        <td><?php echo $action['action']; ?></td>
                        <td><?php echo $action['user_name']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', $action['action_time']); ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="orderRefund">
                <table class="table v-table table-auto-center">
                    <thead>
                    <tr>
                    	<th>商品名称</th>
                        <th>操作类型</th>
                        <th>操作人</th>
                        <th>操作时间</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if($order['order_refund']): if(is_array($order['order_refund']) || $order['order_refund'] instanceof \think\Collection || $order['order_refund'] instanceof \think\Paginator): if( count($order['order_refund'])==0 ) : echo "" ;else: foreach($order['order_refund'] as $key=>$goods): if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): if( count($goods)==0 ) : echo "" ;else: foreach($goods as $key=>$refund): ?>
	                    <tr>
	                    	<td><?php echo $refund['goods_name']; ?></td>
	                        <td><?php echo $refund['action']; if(($refund['refund_status']==-3 && $refund['reason'])): ?>(<?php echo $refund['reason']; ?>)<?php endif; ?></td>
	                        <td><?php echo $refund['user_name']; ?></td>
	                        <td><?php echo date('Y-m-d H:i:s', $refund['action_time']); ?></td>
	                    </tr>
	                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-20">
            <?php if($shop_id == $order['shop_id']): if(is_array($order['operation']) || $order['operation'] instanceof \think\Collection || $order['operation'] instanceof \think\Paginator): if( count($order['operation'])==0 ) : echo "" ;else: foreach($order['operation'] as $key=>$op): if($op['no'] != 'update_address'): ?>
            <button class="btn btn-primary <?php echo $op['no']; ?>"><?php echo $op['name']; ?></button>
            <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            <a href="<?php echo $pre_url; ?>" class="btn btn-default">返回</a>
        </div>

        <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'], function (util) {
        $(function () {
            $('.editInfo').on('click', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">收货人</label><div class="col-md-8"><input id="receiver_name" type="text" class="form-control"></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">手机号码</label><div class="col-md-8"><input id="receiver_mobile" type="text" class="form-control"></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">省</label><div class="col-md-8"><select id="receiver_province" class="form-control"></select></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">市</label><div class="col-md-8"><select id="receiver_city" class="form-control"></select></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">区</label><div class="col-md-8"><select id="receiver_district" class="form-control"></select></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">收货地址</label><div class="col-md-8"><input id="receiver_address" type="text" class="form-control"></div></div>';
                html += '</form>';
                util.confirm('收货人信息', html, function () {
                    updateAddressSubmit();
                })
                getReceiverAddress(<?php echo $order['order_id']; ?>);
            })

            $('.pay').on('click', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">支付方式</label><div class="col-md-8"><select class="form-control" id="modal_payment_type"><option value="">请选择</option><option value="1">微信</option><option value="2">支付宝</option></select></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">备注</label><div class="col-md-8"><textarea class="form-control" id="pay_seller_memo" rows="4" placeholder="输入备注的内容"></textarea></div></div>';
                html += '</form>';
                var order_id = <?php echo $order['order_id']; ?>;
                util.confirm('确认付款', html, function () {
                    //执行确认后的逻辑
                    var payment_type = $("#modal_payment_type").val();
                    var seller_memo = $("#pay_seller_memo").val();
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/orderofflinepay'); ?>",
                        data: {
                            'order_id': order_id,
                            'payment_type': payment_type,
                            'seller_memo': seller_memo
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success');
                                location.href = location.href;
                            } else {
                                util.message(data["message"], 'error');
                            }
                        }
                    });
                })
            })

            $('.J-logistics-info').on('click', function () {
                var com=$(this).attr('data-com');
                getLogisticsInfo($(this).attr('data-express-code'),com);
            })

            $('.getdelivery').on('click', function () {
                var order_id = <?php echo $order['order_id']; ?>;
                util.alert('确认此订单已收货吗？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/orderTakeDelivery'); ?>",
                        async: true,
                        data: {
                            "order_id": order_id,
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success', location.reload());
                            } else {
                                util.message(data["message"], 'error');
                            }
                        }
                    })
                })
            })

            $('.seller_memo').on('click', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">备注</label><div class="col-md-8"><textarea id="note" class="form-control" rows="4" placeholder="输入备注的内容"></textarea></div></div>';
                html += '</form>';
                var order_id = <?php echo $order['order_id']; ?>;
                util.confirm('订单备注', html, function () {
                    var memo = $("#note").val();
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/addMemo'); ?>",
                        async: true,
                        data: {
                            "order_id": order_id,
                            "memo": memo
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success');
                            } else {
                                util.message(data["message"], 'error');
                            }
                        }
                    })
                })
            })

            //修改价格
            $('.edit').on('click', function () {
                var order_id = <?php echo $order['order_id']; ?>;
                util.confirm('修改价格', 'url:' + __URL(PLATFORMMAIN + '/order/getAdjustPriceModal?order_id=' + order_id), function () {
                    // 执行确认后的逻辑
                    var order_goods_id_adjust_array = '';
                    var shipping_fee = $("#adjust_shipping_fee_modal").val();
                    var memo = $("#modal_memo").val();
                    $(".J-edit-price").each(function (i) {
                        if (0 == i) {
                            order_goods_id_adjust_array = $(this).attr('id') + ',' + $(this).val();
                        } else {
                            order_goods_id_adjust_array += ';' + $(this).attr('id') + ',' + $(this).val();
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/orderadjustmoney'); ?>",
                        data: {
                            "order_id": order_id,
                            "order_goods_id_adjust_array": order_goods_id_adjust_array,
                            "shipping_fee": shipping_fee,
                            "memo": memo
                        },
                        dataType: "json",
                        async: false,
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success',__URL(PLATFORMMAIN + '/order/orderdetail?order_id=' + order_id));
                                location.reload();
                            } else {
                                util.message(data["message"], 'error');
                            }
                        }
                    });
                }, 'large')
            })

            $('.delivery').on('click', function () {
                var order_id = <?php echo $order['order_id']; ?>;
                util.confirm('订单发货', 'url:' + __URL(PLATFORMMAIN + '/order/orderDeliveryModal?order_id=' + order_id), function () {
                    var order_goods_id_array = '';
                    this.$content.find("tbody input[name = 'select_goods'][value = 0]:checked").each(function (i) {
                        if (0 == i) {
                            order_goods_id_array = $(this).attr('id');
                        } else {
                            order_goods_id_array += ("," + $(this).attr('id'));
                        }
                    });
                    if (order_goods_id_array == '') {
                        util.message("至少选择一个商品");
                        return false;
                    }
                    var express_name = $("#delivery_express_company").find("option:selected").text();
                    var shipping_type = 1;//有物流公司
                    var express_company_id = $("#delivery_express_company").val();
                    var express_no = $("#delivery_express_no").val();
                    if (shipping_type == 1) {
                        if (express_company_id == "0") {
                            util.message("请选择物流公司");
                            return false;
                        }
                        if (express_no == "") {
                            util.message("请填写快递单号");
                            $("#delivery_express_no").focus();
                            return false;
                        }
                        var reg = /^[0-9a-zA-Z]+$/
                        if (!reg.test(express_no)) {
                            util.message("物流单号只能为数字字母组合");
                            return false;
                        }
                    }

                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/orderdelivery'); ?>",
                        data: {
                            'order_id': order_id,
                            "order_goods_id_array": order_goods_id_array,
                            "express_name": express_name,
                            "shipping_type": shipping_type,
                            "express_company_id": express_company_id,
                            "express_no": express_no,
                            'seller_memo': $("#delivery_seller_memo").val()
                        },
                        success: function (data) {
                            if (data['code'] > 0) {
                                util.message(data["message"], 'success', location.reload());
                            } else {
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                }, 'large')
            })

            //修改物流信息
            $('.update_shipping').on('click', function () {
                var order_id = <?php echo $order['order_id']; ?>;
                util.confirm('订单发货','url:' + __URL(PLATFORMMAIN + '/order/orderUpdateShippingModal?order_id=' + order_id) , function () {
                    var id = this.$content.find("li.active").attr('data-id');
                    var express_name = $("#shipping_express_company").find("option:selected").text();
                    var express_company = $("#shipping_express_company").find("option:selected").text();
                    var express_company_id = $("#shipping_express_company").val();
                    var express_no = $("#update_shipping_express_no").val();

                    if (express_company_id == "0") {
                        util.message("请选择物流公司");
                        return false;
                    }
                    if (express_no == "") {
                        util.message("请填写快递单号");
                        $("#delivery_express_no").focus();
                        return false;
                    }

                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/updateOrderDelivery'); ?>",
                        data: {
                            'order_id': order_id,
                            'id': id,
                            'express_name': express_name,
                            'express_company': express_company,
                            'express_company_id': express_company_id,
                            'express_no': express_no,
                            'seller_memo': $("#update_shipping_seller_memo").val()
                        },
                        success: function (data) {
                            $("#update_shipping").modal('hide');
                            if (data['code'] > 0) {
                                util.message(data["message"], 'success', location.reload());
                            } else {
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                }, 'large')
            })


            $("body").on('change','#receiver_province', function () {
                $("#receiver_city option").remove();
                $("#receiver_district option").remove();
                getCity($(this).val());
            })

            $("body").on('change', '#receiver_city',function () {
                $("#receiver_district option").remove();
                getDistrict($(this).val());
            })
        })

        //获取订单收货地址
        function getReceiverAddress(order_id) {
            $.ajax({
                type: 'post',
                url: "<?php echo __URL('PLATFORM_MAIN/order/getOrderUpdateAddress'); ?>",
                data: {"order_id": order_id},
                success: function (data) {
                    $("#receiver_name").val(data['receiver_name']);
                    $("#receiver_mobile").val(data['receiver_mobile']);
                    $("#receiver_address").val(data['receiver_address']);
                    $("#receiver_zip").val(data['receiver_zip']);
                    var province_id = data['receiver_province'] > 0 ? data['receiver_province'] : -1;
                    var city_id = data['receiver_city'] > 0 ? data['receiver_city'] : -1;
                    var district_id = data['receiver_district'] > 0 ? data['receiver_district'] : -1;

                    if ($("#receiver_province option").length == 0) {
                        //$("#receiver_province option").remove();
                        getProvince(province_id);
                    }
                    if ($("#receiver_city option").length == 0) {
                        getCity(province_id, city_id);
                    }
                    if ($("#receiver_district option").length == 0) {
                        getDistrict(city_id, district_id);
                    }

                    $("#province_id").val(province_id);
                    $("#city_id").val(city_id);
                    $("#district_id").val(district_id);
                }
            });
        }

        //获取省份信息
        function getProvince(select_province_id) {
            var province_obj = $("#receiver_province")[0];
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/getProvince'); ?>",
                dataType: "json",
                success: function (data) {
                    if (data != null && data.length > 0) {
                        $.each(data, function (k, v) {
                            if (select_province_id == v.province_id) {
                                var opt = new Option(v.province_name, v.province_id, false, true);
                            } else {
                                var opt = new Option(v.province_name, v.province_id);
                            }
                            province_obj.options.add(opt);
                        })
                    }
                }
            });
        }

        //获取城市信息
        function getCity(province_id, select_city_id) {
            var city_obj = $("#receiver_city")[0];
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/getCity'); ?>",
                data: {'province_id': province_id},
                dataType: "json",
                success: function (data) {
                    if (data != null && data.length > 0) {
                        $.each(data, function (k, v) {
                            if (select_city_id == v.city_id) {
                                var opt = new Option(v.city_name, v.city_id, false, true);
                            } else {
                                var opt = new Option(v.city_name, v.city_id);
                            }
                            city_obj.options.add(opt);
                        })
                    }
                }
            });
        }

        //获取地区信息
        function getDistrict(city_id, select_district_id) {
            var district_obj = $("#receiver_district")[0];
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/getDistrict'); ?>",
                data: {'city_id': city_id},
                dataType: "json",
                success: function (data) {
                    if (data != null && data.length > 0) {
                        $.each(data, function (k, v) {
                            if (select_district_id == v.district_id) {
                                var opt = new Option(v.district_name, v.district_id, false, true);
                            } else {
                                var opt = new Option(v.district_name, v.district_id);
                            }
                            district_obj.options.add(opt);
                        })
                    }
                }
            });
        }

        //提交修改的收货地址
        function updateAddressSubmit() {
            var receiver_name = $("#receiver_name").val();
            var receiver_mobile = $("#receiver_mobile").val();
            var receiver_province = $("#receiver_province").val();
            var receiver_city = $("#receiver_city").val();
            var receiver_district = $("#receiver_district").val();
            var address_detail = $("#receiver_address").val();
            var order_id = <?php echo $order['order_id']; ?>;
            if (receiver_name == '') {
                util.message("请填写收货人姓名", 'error');
                $("#receiver_name").focus();
                return false;
            }
            if (!(/^1(3|4|5|7|8)\d{9}$/.test(receiver_mobile))) {
                util.message("请填写正确格式的手机号", 'error');
                $("#receiver_mobile").focus();
                return false;
            }
            if (receiver_province <= 0) {
                util.message("请选择省", 'error');
                return false;
            }
            if (receiver_city <= 0) {
                util.message("请选择市", 'error');
                return false;
            }

            if ($("#seleAreaFouth option").length > 1) {
                if (receiver_district <= 0) {
                    util.message("请选择区/县", 'error');
                    return false;
                }
            }
            if (address_detail == '') {
                util.message("请填写详细收货地址", 'error');
                return false;
            }

            $.ajax({
                type: 'post',
                url: "<?php echo __URL('PLATFORM_MAIN/order/updateOrderAddress'); ?>",
                data: {
                    "order_id": order_id,
                    "receiver_name": receiver_name,
                    "receiver_mobile": receiver_mobile,
                    "seleAreaNext": receiver_province,
                    "seleAreaThird": receiver_city,
                    "seleAreaFouth": receiver_district,
                    "address_detail": address_detail
                },
                success: function (data) {
                    if (data.code > 0) {
                        util.message(data["message"], 'success');
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        }

        // 获取物流信息
        function getLogisticsInfo(no, com) {
            // console.log(no);
            $.ajax({
                url: "<?php echo __URL('PLATFORM_MAIN/order/logisticsInfo'); ?>",
                data: {"no": no, "com": com},
                type: "post",
                success: function (data) {
                    if (data["code"] > 0) {
                        var html = '<div class="modal_logistics_info"><ul>';
                        $.each(data.data.data, function (k_ex, v_ex) {
                            html +='<li><p class="line-1-ellipsis logistic_state">'+v_ex.context+'</p><p class="time">'+v_ex.time+'</li>';
                        });
                        html +='</ul></div>';
                        util.confirm('物流跟踪', html, function () {})
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        }

        /**
         * 分红明细
         */
            $('.bonusDetail').on('click',function(){
                var id = $(this).data('id');
                var type = $(this).data('type');
                var url = __URL('PLATFORM_MAIN/order/bonusMember')+'&order_id='+id+'&type='+type;
                util.confirm('分红明细', 'url:'+url,function(){

                })
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

