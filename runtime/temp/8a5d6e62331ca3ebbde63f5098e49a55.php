<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:37:"template/admin/Order/orderDetail.html";i:1587970148;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
<link rel="stylesheet" href="__STATIC__/lib/bootstrap-daterangepicker-master/daterangepicker.css">-->

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
            
<input type="hidden" id="order_id" value="<?php echo $order['order_id']; ?>">
<div class="row detailInfo">
    <div class="col-sm-4 orderInfo" style="border-right: 1px solid #ccc;">
        <h4>订单信息</h4>
        <span>订单类型：<?php echo $order['order_type_name']; ?></span>
        <span>订单编号：<?php echo $order['order_no']; ?></span>
        <?php if($order["order_status"] == 0 && $order["presell_id"] == 0): ?><span>订单状态：买家付款</span><?php elseif($order['order_status']=='0' && $order['presell_id']>0 && $order['money_type']==0): ?>
        <span>订单状态：待付定金</span>
        <?php elseif($order['order_status']=='0' && $order['money_type']==1): ?><span >订单状态：待付尾款</span>
        <?php else: ?>
        <span>订单状态：<?php echo $order['status_name']; ?></span>
        <?php endif; ?>
        <span>下单时间：<?php echo date('Y-m-d H:i:s',$order['create_time']); ?></span>
        <span>配送方式：<?php echo $order['shipping_type_name']; ?></span>
        <span>买家留言：<?php echo $order['buyer_message']; ?></span>
    </div>
    <?php if($order['goods_type'] != 3): if($order['shipping_type']==1): ?>
    <div class="col-sm-4 orderInfo">
        <h4>收货人信息</h4>
        <span>收货人：<?php echo $order['receiver_name']; ?></span>
        <span>手机号码：<?php echo $order['receiver_mobile']; ?></span>
        <span>地址：<?php echo $order['address']; ?></span>
        <a href="#editInfo" class="edit" data-toggle="modal">编辑信息</a>
    </div>
    <?php else: ?>
    <div class="col-md-4 orderInfo">
        <h4><?php if(($order['card_store_id']>0)): ?>核销<?php else: ?>提货<?php endif; ?>人信息</h4>
        <span>手机号码：<?php echo $order['order_pickup']['user_tel']; ?></span>
        <span><?php if(($order['card_store_id']>0)): ?>核销<?php else: ?>提货<?php endif; ?>地址：<?php echo $order['order_pickup']['province_name']; ?><?php echo $order['order_pickup']['city_name']; ?><?php echo $order['order_pickup']['dictrict_name']; ?><?php echo $order['order_pickup']['address']; ?></span>
    </div>
    <?php endif; endif; ?>
    
    <div style="border-left: 1px solid #ccc;" class="col-sm-4 orderInfo">
        <h4>付款信息</h4>
        <span>支付方式：
            <?php if($order['presell_id']): ?>
                <?php echo $order['payment_type_name']; if($order['offline_pay_presell']==2): ?>(后台支付)<?php endif; ?>
            + <?php echo $order['payment_type_presell_name']; if($order['offline_pay']==2): ?>(后台支付)<?php endif; else: ?>
                 <?php echo $order['payment_type_name']; if($order['offline_pay']==2): ?>(后台支付)<?php endif; endif; ?>
        </span>

        <span>商品总额：
            <?php if($order['presell_id']): ?>
                    定金：￥<?php echo $order['first_money']; ?>
                    + 尾款：￥<?php echo $order['final_money']; elseif($order['order_type'] == 10): if($order['goods_money']==0): ?><?php echo $order['point']; ?>积分<?php else: ?><?php echo $order['point']; ?>积分 + ￥<?php echo $order['goods_money']; endif; else: ?>
                ￥<?php echo $order['goods_money']; endif; ?>
        </span>
     	<?php if(($order['deduction_money']>0)): ?>
		<span>积分抵扣：￥<?php echo $order['deduction_money']; ?></span>
		<?php endif; ?>
        <span>优惠：￥<?php echo $order['order_promotion_money']; ?></span>
        <span>价格调整：￥<?php if($order['order_adjust_money'] > 0): ?>+<?php endif; ?><?php echo $order['order_adjust_money']; ?></span>
        <span>运费：￥<?php echo $order['shipping_money'] - $order['promotion_free_shipping']; if($order['promotion_free_shipping'] != 0): ?>(已减<?php echo $order['promotion_free_shipping']; ?>)<?php endif; ?></span>
        <?php if($order['invoice_tax'] > 0): ?>
        <p class="p">税费：￥<?php echo $order['invoice_tax']; ?></p>
        <?php endif; ?>
        <span>实收金额：<?php echo $order['order_money']; ?></span>
    </div>
</div>

<div class="screen-title"><span class="text">订单商品</span></div>

<!--表格-->
<table class="table table-hover v-table">
    <thead>
    <tr>
        <th>商品</th>
        <th>单价</th>
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
        <td>￥<?php echo round($goods['order_goods_promotion_money'],2); ?></td>
        <?php if($goods['invoice_tax'] > 0): ?>
        <td>￥<?php echo $goods['invoice_tax']; ?></td>
        <?php endif; ?>
        <td>￥<?php if($goods['adjust_money'] > 0): ?>+<?php endif; ?><?php echo round($goods['adjust_money'] * $goods['num'],2); ?></td>
        <td>￥<?php echo $goods['real_money'] + $goods['invoice_tax']; ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; endif; if($order['goods_packet_list']): if(is_array($order['goods_packet_list']) || $order['goods_packet_list'] instanceof \think\Collection || $order['goods_packet_list'] instanceof \think\Paginator): if( count($order['goods_packet_list'])==0 ) : echo "" ;else: foreach($order['goods_packet_list'] as $key=>$list): if(!$order['store_id']): ?>
    <tr><td colspan="6" class="tr_1st">
        <span><?php echo $list['packet_name']; ?></span>
        <span style="padding-right: 30px"><?php echo $list['express_name']; ?></span>
        <span style="padding-right: 30px">单号:<?php echo $list['express_code']; ?></span>
        <span style="padding-right: 30px">
            <a href="javascript:void(0);" data-id="<?php echo $list['express_code']; ?>" data-com="<?php echo $list['express_company_id']; ?>" class="text-primary add1" data-toggle="modal" data-target="#modal_logistics_info">物流跟踪</a>
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
<?php if($order['order_status'] == 0): ?>
<div class="editPrice row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4 fr">
        <a href="#orderEdit" class="add2" data-toggle="modal">修改价格</a>
    </div>
</div>
<?php endif; ?>

<div class="screen-title"><span class="text">操作日志</span></div>

<div class="infoTab">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#note" data-toggle="tab" class="infoSingle">订单备注</a></li>
        <li><a href="#log" data-toggle="tab" class="infoSingle">订单日志</a></li>
        <li><a href="#refund" data-toggle="tab" class="infoSingle">退款日志</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="note">
            <!--表格-->
            <table class="table table-hover v-table">
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
        <div class="tab-pane fade" id="log">
            <!--表格-->
            <table class="table table-hover v-table">
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
        <div class="tab-pane fade" id="refund">
            <!--表格-->
            <table class="table table-hover v-table">
                <thead>
                <tr>
                   	<th>商品名称</th>
                    <th>操作类型</th>
                    <th>操作人</th>
                    <th>操作时间</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(is_array($order['order_refund']) || $order['order_refund'] instanceof \think\Collection || $order['order_refund'] instanceof \think\Paginator): if( count($order['order_refund'])==0 ) : echo "" ;else: foreach($order['order_refund'] as $key=>$goods): if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): if( count($goods)==0 ) : echo "" ;else: foreach($goods as $key=>$refund): ?>
	                    <tr>
	                    	<td><?php echo $refund['goods_name']; ?></td>
	                        <td><?php echo $refund['action']; if(($refund['refund_status']==-3 && $refund['reason'])): ?>(<?php echo $refund['reason']; ?>)<?php endif; ?></td>
	                        <td><?php echo $refund['user_name']; ?></td>
	                        <td><?php echo date('Y-m-d H:i:s', $refund['action_time']); ?></td>
	                    </tr>
	                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="sure_back">
            <?php if(is_array($order['operation']) || $order['operation'] instanceof \think\Collection || $order['operation'] instanceof \think\Paginator): if( count($order['operation'])==0 ) : echo "" ;else: foreach($order['operation'] as $key=>$op): if($op['no'] != 'update_address'): ?>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#<?php echo $op['no']; ?>"><?php echo $op['name']; ?></a>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <a href="<?php echo $pre_url; ?>" class="back">返回</a>
        </div>
    </div>
</div>

<!-- page end -->



<!-- 订单改价模态框（Modal） -->
<div class="modal fade" id="orderEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ePriceModel">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">订单改价</h4>
            </div>
            <div class="modal-body">
                <!--表格-->
                <table class="table table-hover v-table">
                    <thead>
                    <tr>
                        <th>商品</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th>涨/降价</th>
                    </tr>
                    </thead>
                    <tbody id="adjust_price_modal">
                    </tbody>
                </table>
                <p class="pb10">运费：<span><input type="text" id="adjust_shipping_fee_modal" class="J-edit-freight"></span><a
                        href="#" class="blue add3">免运费</a></p>
                <p class="pb10" id="adjust_order_amount"></p>
                <p class="pb10 gray">订单实收 = (单价 + 涨/降价) * 数目 + 运费</p>
                <p><textarea class="form-control ta_resize" rows="8" id="modal_memo" placeholder="备注"></textarea></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add4">确定改价</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal -->

<!-- 编辑信息模态框（Modal） -->
<div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_delivery"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_delivery">收货人信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="receiver_name" class="col-sm-3 control-label">收货人</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_mobile" class="col-sm-3 control-label">手机号码</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_province" class="col-sm-3 control-label">省</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_province"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_city" class="col-sm-3 control-label">市</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_city"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_district" class="col-sm-3 control-label">区</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="receiver_district"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_address" class="col-sm-3 control-label">收货地址</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="receiver_address">
                        </div>
                    </div>
                </form>
            </div>
            <input type="hidden" id="province_id">
            <input type="hidden" id="city_id">
            <input type="hidden" id="district_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add5">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 确定付款模态框（Modal） -->
<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_confirm"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_confirm">确定付款</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label for="modal_payment_type" class="col-sm-3 control-label">支付方式</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="modal_payment_type">
                                <!--<option value="">全部</option>-->
                                <option value="1">微信</option>
                                <option value="2">支付宝</option>
                                <option value="10">线下支付</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="8" id="pay_seller_memo"
                                      placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add6">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- 备注模态框（Modal） -->
<div class="modal fade" id="seller_memo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_memo"
     aria-hidden="true">
    <div class="modal-dialog" style="width:500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_memo">订单备注</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label for="memo" class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="8" id="memo" placeholder="备注"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add7">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 查看物流信息模态框（Modal） -->
<div class="modal fade" id="view_logistics" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_logistics"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel_view_logistics">物流跟踪</h4>
            </div>
            <div class="modal-body">
                <div class="modal_logistics_info" style="height: 500px;overflow-y: scroll">
                    <ul>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
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
  require(['utilAdmin','util'], function (utilAdmin,util) {
    $(function () {
        $("a[href='#editInfo']").on('click', function () {
            getReceiverAddress($("#order_id").val());
        })

        $("#receiver_province").on('change', function () {
            $("#receiver_city option").remove();
            $("#receiver_district option").remove();
            getCity($(this).val());
        })

        $("#receiver_city").on('change', function () {
            $("#receiver_district option").remove();
            getDistrict($(this).val());
        })

        $("#orderEdit").on('change', ".J-edit-price, .J-edit-freight", function () {
            buildAdjustPriceData($(this));
            showAdjustPrice();
        })

        $('a[data-target="#delivery"]').on('click', function () {
            var order_id = $("#order_id").val();
            util.confirm('订单发货', 'url:' + __URL(ADMINMAIN + '/order/orderDeliveryModal?order_id=' + order_id), function () {
                var order_goods_id_array = '';
                this.$content.find("tbody input[name = 'select_goods'][value = 0]:checked").each(function (i) {
                    if (0 == i) {
                        order_goods_id_array = $(this).attr('id');
                    } else {
                        order_goods_id_array += ("," + $(this).attr('id'));
                    }
                });
                if (order_goods_id_array == '') {
                    utilAdmin.message("至少选择一个商品");
                    return false;
                }
                var express_name = $("#delivery_express_company").find("option:selected").text();
                var shipping_type = 1;//有物流公司
                var express_company_id = $("#delivery_express_company").val();
                var express_no = $("#delivery_express_no").val();
                if (shipping_type == 1) {
                    if (express_company_id == "0") {
                        utilAdmin.message("请选择物流公司");
                        return false;
                    }
                    if (express_no == "") {
                        utilAdmin.message("请填写快递单号");
                        $("#delivery_express_no").focus();
                        return false;
                    }
                    var reg = /^[0-9a-zA-Z]+$/
                    if (!reg.test(express_no)) {
                        utilAdmin.message("物流单号只能为数字字母组合");
                        return false;
                    }
                }

                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('ADMIN_MAIN/order/orderdelivery'); ?>",
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
        $('a[data-target="#update_shipping"]').on('click', function () {
            var order_id = <?php echo $order['order_id']; ?>;
            util.confirm('订单发货','url:' + __URL(ADMINMAIN + '/order/orderUpdateShippingModal?order_id=' + order_id) , function () {
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
                    $("#update_shipping_express_no").focus();
                    return false;
                }

                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('ADMIN_MAIN/order/updateOrderDelivery'); ?>",
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

        $('a[data-target="#getdelivery"]').on('click', function () {
            var order_id = <?php echo $order['order_id']; ?>;
            util.alert('确认此订单已收货吗？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('ADMIN_MAIN/order/orderTakeDelivery'); ?>",
                    async: true,
                    data: {
                        "order_id": order_id,
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', location.reload());
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                })
            })
        })

    })

    //获取订单收货地址
    function getReceiverAddress(order_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo __URL('ADMIN_MAIN/order/getOrderUpdateAddress'); ?>",
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
            url: "<?php echo __URL('ADMIN_MAIN/order/getProvince'); ?>",
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
            url: "<?php echo __URL('ADMIN_MAIN/order/getCity'); ?>",
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
            url: "<?php echo __URL('ADMIN_MAIN/order/getDistrict'); ?>",
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
        var order_id = $("#order_id").val();
        if (receiver_name == '') {
            utilAdmin.message("请填写收货人姓名");
            $("#receiver_name").focus();
            return false;
        }
        if (!(/^1(3|4|5|7|8)\d{9}$/.test(receiver_mobile))) {
            utilAdmin.message("请填写正确格式的手机号");
            $("#receiver_mobile").focus();
            return false;
        }
        if (receiver_province <= 0) {
            utilAdmin.message("请选择省");
            return false;
        }
        if (receiver_city <= 0) {
            utilAdmin.message("请选择市");
            return false;
        }

        if ($("#seleAreaFouth option").length > 1) {
            if (receiver_district <= 0) {
                utilAdmin.message("请选择区/县");
                return false;
            }
        }
        if (address_detail == '') {
            utilAdmin.message("请填写详细收货地址");
            return false;
        }

        $.ajax({
            type: 'post',
            url: "<?php echo __URL('ADMIN_MAIN/order/updateOrderAddress'); ?>",
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
                    utilAdmin.message("修改收货地址成功","success");
                } else {
                    utilAdmin.message("修改收货地址失败","danger");
                }
                $("#editInfo").modal('hide');
            }
        });
    }

    //订单付款
    function orderOffLinePay() {
        var order_id = $("#order_id").val();
        var seller_memo = $("#pay_seller_memo").val();
        var payment_type = $("#modal_payment_type").val();

        utilAdmin.alert('是否确定买家已付款?',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/order/orderofflinepay'); ?>",
                data: {
                    'order_id': order_id,
                    'payment_type': payment_type,
                    'seller_memo': seller_memo
                },
                success: function (data) {
                    utilAdmin.message(data["message"],'success');
                }
            });
            $("#pay").modal('hide');
            window.reload();
        })
    }

    //获取价格信息
    function modifyPrice() {
        window.order_equation_data = {};
        var order_id = $("#order_id").val();
        var str = "";
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getordergoods'); ?>",
            data: {"order_id": order_id},
            dataType: "json",
            async: false,
            success: function (data) {
                var order_info = data[1];
                data = data[0];
                order_equation_data['shipping_money'] = order_info.shipping_money - order_info.promotion_free_shipping;
                order_equation_data['total_amount'] = parseFloat(order_info.pay_money) + parseFloat(order_info.user_platform_money);
                order_equation_data['goods'] = {};
                for (var i = 0; i < data.length; i++) {
                    //订单实收：(<span>1099.00</span> + <span>10.00</span>) * 1 + <span>0.00</span> = <span class="red" id="order_money">2109.00</span>
                    order_equation_data['goods'][data[i].sku_id] = [];
                    order_equation_data['goods'][data[i].sku_id]['actual_price'] = data[i].actual_price;
                    order_equation_data['goods'][data[i].sku_id]['num'] = data[i].num;
                    order_equation_data['goods'][data[i].sku_id]['sign'] = '+'
                    order_equation_data['goods'][data[i].sku_id]['adjust_price'] = 0;

                    str += "<tr data-sku-id=" + data[i].sku_id + ">";
                    str += "<td class='picword_td'>";
                    str += '<div class="media text-left">';
                    str += '<div class="media-left"><p><img src="' + __IMG(data[i]['picture_info']['pic_cover_mid']) + '" style="width:60px;height:60px;"></p></div>';
                    str += '<div class="media-body max-w-300"><div class="line-2-ellipsis"><a href="javascript:;" target="_blank">' + data[i].goods_name + '</a></div>';
                    str += '<div class="small-muted line-2-ellipsis">';
                    $.each(data[i]['spec'],function (k_spec,v_spec) {
                        str += '<span>' + v_spec.spec_name + ':' + v_spec.spec_value_name + '</span> ';
                    })
                    str += '</div></div>';

                    str += "</td>";
                    str += "<td>￥" + data[i].actual_price + "</td>";
                    str += "<td>" + data[i].num + "</td>";
                    str += "<td><input type='text' class='J-edit-price' data-actual-price='" + data[i]['actual_price'] + "' id='"+ data[i]['order_goods_id'] +"'></td></tr>";
                }
                $("#adjust_price_modal").html(str);
                $("#adjust_shipping_fee_modal").val(order_info.shipping_money - order_info.promotion_free_shipping);
                if (order_info.shipping_type == 2) {
                    // 自提不允许修改运费
                    $('.add3').prop('disabled', true)
                    $('#adjust_shipping_fee_modal').prop('disabled', true)
                } else {
                    $('.add3').removeAttr('disabled')
                    $('#adjust_shipping_fee_modal').removeAttr('disabled')
                }
                showAdjustPrice();
            }
        });
    }

    //免运费
    function setFreeShippingFee() {
        $("#adjust_shipping_fee_modal").val(0);
        buildAdjustPriceData($(".J-edit-freight"));
        showAdjustPrice();
    }

    //更新价格数据
      function buildAdjustPriceData(obj) {
          if (obj.hasClass('J-edit-price')) {
              var sku_id = obj.parent().parent().attr('data-sku-id');
              var obj_adjust_price = obj.val();
              var actual_price = obj.data('actual-price');
              if (obj_adjust_price >= 0) {
                  order_equation_data['goods'][sku_id]['sign'] = '+';
                  order_equation_data['goods'][sku_id]['adjust_price'] = Math.abs(obj_adjust_price);
                  //order_equation_data['total_amount'] += (order_equation_data['goods'][sku_id]['adjust_price'] * order_equation_data['goods'][sku_id]['num']);
              } else if (obj_adjust_price < 0) {
                  if (Math.abs(obj_adjust_price) > actual_price){
                      obj.val(-actual_price);
                      obj_adjust_price = actual_price
                  }
                  order_equation_data['goods'][sku_id]['sign'] = '-';
                  order_equation_data['goods'][sku_id]['adjust_price'] = Math.abs(obj_adjust_price);
                  //order_equation_data['total_amount'] -= (order_equation_data['goods'][sku_id]['adjust_price'] * order_equation_data['goods'][sku_id]['num']);
              }
          } else if (obj.hasClass('J-edit-freight')) {
              var old_shipping_money = order_equation_data['shipping_money'];
              if (obj.val() < 0) {
                  obj.val(0);
              }
              if (old_shipping_money >= 0) {
                  order_equation_data['shipping_money'] = obj.val();
                  order_equation_data['total_amount'] += order_equation_data['shipping_money'] - old_shipping_money;
              }
          }
          order_equation_data['total_amount'] = order_equation_data['shipping_money'] * 1;
          $.each(order_equation_data['goods'], function (sku_id, sku) {
              if (sku.sign == '+') {
                  order_equation_data['total_amount'] += sku.actual_price * sku.num + sku.adjust_price * sku.num;
              } else if (sku.sign == '-') {
                  order_equation_data['total_amount'] += sku.actual_price * sku.num - sku.adjust_price * sku.num;
              }
          });
      }

    //显示式子
    function showAdjustPrice() {
        var span_str = '';
        $.each(order_equation_data['goods'], function (sku_id, sku) {
            span_str += "(<span>" + sku.actual_price + "</span>";
            span_str += "<span>" + sku.sign + "</span>";
            span_str += "<span>" + sku.adjust_price + "</span>)";
            span_str += " * " + sku.num;
            span_str += " + ";
        })
        span_str += order_equation_data['shipping_money'];
        span_str += " = " + "<span>" + order_equation_data['total_amount'] + "</span>";
        $("#adjust_order_amount").html(span_str);
    }


    //保存修改的价格
    function updPrice() {
        var order_id = $("#order_id").val();
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
            url: "<?php echo __URL('ADMIN_MAIN/order/orderadjustmoney'); ?>",
            data: {
                "order_id": order_id,
                "order_goods_id_adjust_array": order_goods_id_adjust_array,
                "shipping_fee": shipping_fee,
                "memo":memo
            },
            dataType: "json",
            async: false,
            success: function (data) {
                if (data["code"] > 0) {
                    utilAdmin.message(data["message"],'success', function () {
                        window.location.reload();
                    });
                } else {
                    utilAdmin.message(data["message"],'danger');
                }
            }
        });
    }

    //添加备注
    function addMemoAjax() {
        var order_id = $("#order_id").val();
        var memo = $("#memo").val();
        if (memo == '') {
            $(".error").css("display", "block");
            return false;
        }
        $.ajax({
            url: "<?php echo __URL('ADMIN_MAIN/order/addmemo'); ?>",
            data: {"order_id": order_id, "memo": memo},
            type: "post",
            success: function (data) {
                if (data["code"] > 0) {
                    utilAdmin.message(data["message"],"success");
                } else {
                    utilAdmin.message(data["message"],"danger");
                }
            }
        });
        $("#seller_memo").modal('hide');
    }

    // 获取物流信息
    function getLogisticsInfo(no,com) {
        // console.log(no);
        $.ajax({
            url: "<?php echo __URL('ADMIN_MAIN/order/logisticsInfo'); ?>",
            data: {"no": no, "com" : com},
            type: "post",
            success: function (data) {
                if (data["code"] > 0) {
                    $("#view_logistics").modal('show');
                    var html = '';
                    $.each(data.data.data, function (k_ex, v_ex) {
                        html += '<li><p class="line-1-ellipsis logistic_state">' + v_ex.context + '</p><p class="time">' + v_ex.time + '</p></li>';
                    });
                    //console.log($("#view_logistics").find("ul"))
                    $("#view_logistics").find("ul").html(html);
                } else {
                    utilAdmin.message(data["message"]);
                }
            }
        });
    }

    $('body').on('click','.add1',function(){
        var id=$(this).attr('data-id');
        var com=$(this).attr('data-com');
        getLogisticsInfo(id,com);
    });
    $('body').on('click','.add2',function(){
         modifyPrice();
    });
    $('body').on('click','.add3',function(){
         setFreeShippingFee();
    });
    $('body').on('click','.add4',function(){
         updPrice();
    });
    $('body').on('click','.add5',function(){
         updateAddressSubmit()
    });
    $('body').on('click','.add6',function(){
         orderOffLinePay()
    });
    $('body').on('click','.add7',function(){
        addMemoAjax()
    });

  })
</script>

</body>
</html>