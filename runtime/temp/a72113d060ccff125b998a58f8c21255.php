<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/admin/Order/afterOrderList.html";i:1587970148;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            
<input type="hidden" id="order_id"/>
<input type="hidden" id="order_goods_id"/>
<input type="hidden" id="order_status" value="<?php echo $status; ?>"/>
<input type="hidden" id="refund_status" value="<?php echo $refund_status; ?>"/>

<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">订单编号</label>
                    <div class="v__controls">
                        <input type="text" id="order_no" class="v__control_input" placeholder="请输入订单编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="商品名称/商品编号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">快递单号</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="express_no" placeholder="请输入快递单号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="user_info" autocomplete="off" placeholder="手机号码/会员ID/用户名/昵称">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">支付方式</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="payment_type">
                            <option value="">全部</option>
                            <option value="1">微信</option>
                            <option value="2">支付宝</option>
                            <option value="3">银行卡</option>
                            <option value="5">余额支付</option>
                            <option value="16">eth支付</option>
                            <option value="17">eos支付</option>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">订单类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="order_type">
                            <option value="">全部</option>
                            <?php if(is_array($orderTypeList) || $orderTypeList instanceof \think\Collection || $orderTypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $orderTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ot): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $ot['type_id']; ?>"><?php echo $ot['type_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">下单时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="orderTime">
                            <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="orderStartDate">
                            <input type="hidden" id="orderEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">付款时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="payTime">
                            <input type="text" class="v__control_input pr-30" id="payTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="payStartDate">
                            <input type="hidden" id="payEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">发货时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="deliveryTime">
                            <input type="text" class="v__control_input pr-30" id="deliveryTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="sendStartDate">
                            <input type="hidden" id="sendEndDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">完成时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="completeTime">
                            <input type="text" class="v__control_input pr-30" id="completeTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="finishStartDate">
                            <input type="hidden" id="finishEndDate">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary" id="search_button"><i class="icon icon-search"></i> 搜索</a>
                        <a class="btn btn-success ml-15" id="export_button">导出EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="screen-title"><span class="text">订单列表</span></div>

<div class="infoTab">
    <ul id="myTab" class="nav nav-tabs v-nav-tabs">
        <li class="<?php if($refund_status == 9): ?>active<?php endif; ?>">
            <a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist?refund_status=9'); ?>">
                <p>全部</p>
                <p id="all_refund"></p>
            </a>
        </li>
        <li class="<?php if($refund_status == 0): ?>active<?php endif; ?>">
            <a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist?refund_status=0'); ?>">
                <p>待买家操作</p>
                <p id="waiting_buyer_operation"></p>
            </a>
        </li>
        <li class="<?php if($refund_status == 1): ?>active<?php endif; ?>">
            <a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist?refund_status=1'); ?>">
                <p>待卖家操作</p>
                <p id="waiting_seller_operation"></p>
            </a>
        </li>
        <li class="<?php if($refund_status == 2): ?>active<?php endif; ?>">
            <a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist?refund_status=2'); ?>">
                <p>已退款</p>
                <p id="have_refunded"></p>
            </a>
        </li>
        <li class="<?php if($refund_status == 3): ?>active<?php endif; ?>">
            <a href="<?php echo __URL('ADMIN_MAIN/order/afterorderlist?refund_status=3'); ?>">
                <p>已拒绝</p>
                <p id="have_refused"></p>
            </a>
        </li>
    </ul>

            <!--表格-->
            <table class="table table-hover v-table mb-10">
                <thead>
                <tr>
                    <th class="col-md-3">商品</th>
                    <th class="col-md-1">单价</th>
                    <th class="col-md-1">数量</th>
                    <th class="col-md-2">买家/收货人</th>
                    <th class="col-md-1">订单状态</th>
                    <th class="col-md-2 operationLeft">实收</th>
                    <th class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
                </thead>
            </table>
            <div class="tables ol_tbody" id="list">

            </div>
            <div class="page clearfix">
                <div class="M-box3 m-style fr">
                </div>
            </div>
</div>
<!-- page end -->

<!-- 处理回寄模态框（Modal） -->
<div class="modal fade" id="confirm_receipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabelReceipt"
     aria-hidden="true">
    <div class="modal-dialog" style="width:550px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelReceipt">订单备注</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">处理结果</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="dealResult" id="confirm" value="0" checked> 确认签收
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="dealResult" id="refuse" value="1"> 拒绝签收
                            </label>
                        </div>
                    </div>

                    <div class="form-group isBlock hide">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">拒绝原因</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="4" id="refuse_receipt_reason"
                                      placeholder="原因"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add1" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 处理退款申请模态框（Modal） -->
<div class="modal fade" id="judge_refund" tabindex="-1" role="dialog" aria-labelledby="myModalLabelJudgeRefund"
     aria-hidden="true">
    <div class="modal-dialog" style="width:550px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelJudgeRefund">处理退款申请</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">售后类型</label>
                        <div class="col-sm-6">
                            <p class="form-control-static">退款</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">处理结果</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input type="radio" name="goodsRefund" id="refund_agree" value="1" checked> 同意退款
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="goodsRefund" id="refund_disagree" value="0"> 拒绝退款
                            </label>
                        </div>
                    </div>

                    <div class="form-group reason hide">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">拒绝原因</label>
                        <div class="col-sm-6">
                            <textarea class="form-control ta_resize" rows="4" name="reason" id="judge_refund_reason"
                                      placeholder="原因"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add2" data-dismiss="modal">确定
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->

<!-- 处理退货申请模态框（Modal） -->
<div class="modal fade" id="judge_return" tabindex="-1" role="dialog" aria-labelledby="myModalLabelJudgeReturn"
     aria-hidden="true">
    <div class="modal-dialog" style="width:550px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabelJudgeReturn">处理退货申请</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">售后类型</label>
                        <div class="col-sm-7">
                            <p class="form-control-static">退款</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">处理结果</label>
                        <div class="col-sm-7">
                            <label class="radio-inline">
                                <input type="radio" name="goodsReturn" id="return_agree" value="1" checked> 同意退货
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="goodsReturn" id="return_disagree" value="0"> 拒绝退货
                            </label>
                        </div>
                    </div>

                    <div class="form-group returnAddress">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">退货地址</label>
                        <div class="col-sm-7" style="padding-top: 8px">
							<select class="form-control" id="address_return"><option value="0">请选择地址</option></select>
							<p class="help-block">没有退货地址？前往系统》商城配置》商家地址添加</p>
                        </div>
                    </div>

                    <div class="form-group reason hide">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">拒绝原因</label>
                        <div class="col-sm-7">
                            <textarea class="form-control ta_resize" rows="4" id="reject_return_reason"
                                      placeholder="原因"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add3" data-dismiss="modal">确定</button>
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
    var allow_refund_status = [];
    switch (<?php echo $refund_status; ?>) {
        case 0:
            // 待买家操作tab 显示待买家操作order_goods
            allow_refund_status = [2, -3];
            break;
        case 1:
            // 待卖家操作tab 显示待卖家操作order_goods
            allow_refund_status = [1, 3, 4];
            break;
        case 2:
            // 已退款tab 显示已经退款的order_goods
            allow_refund_status = [5];
            break;
        case 3:
            // 已拒绝tab 显示拒绝的order_goods
            allow_refund_status = [-1, -3];
            break;
        default :
            // 全部tab 显示需要操作的order_goods
            allow_refund_status = [1, 2, 3, 4, 5, -1, -3];
            break;
    }


    $(function () {
        util.layDate('#orderTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;

            if(value){
                $('#orderStartDate').val(date1);
                $('#orderEndDate').val(date2);
            }
            else{
                $('#orderStartDate').val('');
                $('#orderEndDate').val('');
            }

        });
        util.layDate('#payTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#payStartDate').val(date1);
                $('#payEndDate').val(date2);
            }
            else{
                $('#payStartDate').val('');
                $('#payEndDate').val('');
            }

        });
        util.layDate('#deliveryTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#sendStartDate').val(date1);
                $('#sendEndDate').val(date2);
            }
            else{
                $('#sendStartDate').val('');
                $('#sendEndDate').val('');
            }
            
        });
        util.layDate('#completeTime',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#finishStartDate').val(date1);
                $('#finishEndDate').val(date2);
            }
            else{
                $('#finishStartDate').val('');
                $('#finishEndDate').val('');
            }
        });
        getOrderGoodsCount();
        LoadingInfo(1);

        //点击modal
        $("body").on('click', "a[data-target]", function () {
            var order_id = $(this).attr('data-order-id');
            var order_goods_id = $(this).attr('data-order-goods-id');
            $("#order_id").val(order_id);
            $("#order_goods_id").val(order_goods_id);
            var data_target = $(this).attr('data-target');

            if (data_target == '#judge_return') {
                getShopReturnSet();
            }
            if (data_target == '#logistics') {
                var obj = $(this);
                obj.removeAttr('data-target');
                util.confirm('物流跟踪', 'url:' + __URL(ADMINMAIN + '/order/logisticsModal?order_id=' + order_id + '&order_goods_id=' + order_goods_id, function () {}));
                obj.attr('data-target', '#logistics');
            }
        })

        //退款申请modal
        $("#judge_refund input[name=goodsRefund]").on('change', function () {
            if ($("#refund_agree").prop('checked')) {
                $(".reason").addClass('hide');
            } else {
                $(".reason").removeClass('hide');
            }
        })

        //退货申请modal
        $("#judge_return input[name=goodsReturn]").on('change', function () {
            if ($("#return_agree").prop('checked')) {
                $(".returnAddress").removeClass('hide');
                $(".reason").addClass('hide');
            } else {
                $(".returnAddress").addClass('hide');
                $(".reason").removeClass('hide');
            }
        })

        //处理回寄modal
        $("#confirm_receipt input[name=dealResult]").on('change', function () {
            if ($("#confirm").prop('checked')) {
                $(".isBlock").addClass('hide');
            } else {
                $(".isBlock").removeClass('hide');
            }
        })
    })

    //获取店铺退货地址
    function getShopReturnSet() {
        $.ajax({
            type: "POST",
            url: "<?php echo __URL('ADMIN_MAIN/config/getShopReturnList'); ?>",
            success: function (data) {
                var html = '';
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="'+ data[i].return_id +'" >'+ data[i].consigner +' '+ data[i].province_name+data[i].city_name+data[i].dictrict_name +' '+ data[i].address +'</option>';
                    }
                    $("#address_return").html(html);
                }
            }
        });
    }

    //获取售后订单数量
    function getOrderGoodsCount() {
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/getordergoodscount'); ?>",
            success: function (data) {
                $('#all_refund').html('(' + data.all + ')');
                $('#waiting_buyer_operation').html('(' + data.waiting_buyer_operation + ')');
                $('#waiting_seller_operation').html('(' + data.waiting_seller_operation + ')');
                $('#have_refunded').html('(' + data.have_refunded + ')');
                $('#have_refused').html('(' + data.have_refused + ')');
            }
        });
    }

    function isRefundStatus(refund_status) {
        if ($.inArray(refund_status, allow_refund_status) != -1  || <?php echo $refund_status; ?> == '9') {
            // 全部的tab <?php echo $refund_status; ?> == '9'
            return true;
        }
        return false;
    }

    function LoadingInfo(page_index) {
        $("#page_index").val(page_index);
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/afterorderlist'); ?>",
            data: {
                "page_index": page_index,
                "page_size": $("#showNumber").val(),
                "start_date": $("#orderStartDate").val(),
                "end_date": $("#orderEndDate").val(),
                "pay_start_date": $("#payStartDate").val(),
                "pay_end_date": $("#payEndDate").val(),
                "consign_start_date": $("#sendStartDate").val(),
                "consign_end_data": $("#sendEndTime").val(),
                "finish_start_date": $("#finishStartDate").val(),
                "finish_end_date": $("#finishEndDate").val(),
                "user_info": $("#user_info").val(),
                "order_no": $("#order_no").val(),
                "order_status": $("#order_status").val(),
                "refund_status": $("#refund_status").val(),
                "payment_type": $("#payment_type").val(),
                "express_no": $("#express_no").val(),
                "goods_name": $("#goods_name").val()
            },
            success: function (data) {
                //alert(JSON.stringify(data["data"][1]['order_item_list']));
                var html = '';
                if (data["data"].length == 0) {
                    html += '<table class="table v-table table-auto-center mb-10"><tbody><tr align="center"><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr></tbody></table>';
                    $(".ol_tbody").html(html);
                    return true;
                }

                $.each(data["data"], function (k_order, v_order) {
                    var order_id = v_order["order_id"];//订单id
                    var order_no = v_order["order_no"];//订单编号
                    var receiver_name = v_order['receiver_name']; //买家姓名
                    var receiver_mobile = v_order['receiver_mobile']; //买家电话
                    var create_time = utilAdmin.timeStampTurnTime(v_order["create_time"]);//下单时间
                    //var shipping_type_name = v_order["shipping_type_name"];//配送方式
                    var bonus = v_order["bonus"];
                    var commission = v_order["commission"];
                    var order_money = v_order["order_money"];//订单金额
                    var shipping_money = v_order['shipping_money'] - v_order['promotion_free_shipping'];//运费
                    var order_status = v_order['order_status'];
                    var status_name = v_order['status_name'];
                    var promotion_status = v_order['promotion_status'];// 标识售后订单是否整单进行售后
                    var operation = v_order['operation'];
                    var coin_after = v_order['coin_after'];
                    var shop_after = v_order['shop_after'];
                    var row = 0;
                    $.each(v_order['order_item_list'], function (list_k, list_v) {
                        if (isRefundStatus(list_v['refund_status'])) {
                            row++;
                        }
                    })

                    html += '<table class="table v-table table-auto-center mb-10"><tbody><tr>';
                    html += '<td colspan="7" class="tr_1st">';
                    html += '<span style="padding-right: 30px">订单编号：' + order_no + '</span><span style="padding-right: 30px">下单时间：' + create_time + '</span><span style="padding-right: 30px">配送方式：' + '快递' + '</span>';
                    // if (commission) {
                    //     html += '<span style="padding-right: 30px">分销佣金：' + commission + '元</span> &nbsp;&nbsp;';
                    // }
                    // if (bonus) {
                    //     html += '<span style="padding-right: 30px">分红：' + bonus + '元</span>';
                    // }
                    html += '</td></tr>';

                    var buyer_info = false;
                    var refund_require_money = 0;
                    var refund_deduction_point = 0;
                    $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                        refund_require_money = refund_require_money + Number(v_order_goods['refund_require_money']);//总退款金额
                     	//总退款积分
                        if((v_order['shipping_status']==1 || v_order['shipping_status']==2 || v_order['shipping_status']==3) && v_order_goods['deduction_freight_point']>0){
                            refund_deduction_point = refund_deduction_point + Number(v_order_goods['deduction_point']) - Number(v_order_goods['deduction_freight_point']);
                        }else{
                            refund_deduction_point = refund_deduction_point + Number(v_order_goods['deduction_point']);
                        }
                    })
                    var refund_status=[];
                    $.each(v_order['order_item_list'], function (k_order_goods1, v_order_goods1) {
                        if(v_order_goods1["refund_status"]==5){
                            refund_status.push(1);
                        }
                    })
                    $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                        var pic_cover_micro = v_order_goods["picture"]['pic_cover_mid'];//商品图
                        var goods_id = v_order_goods["goods_id"];//商品id
                        var order_goods_id = v_order_goods["order_goods_id"];
                        var goods_name = v_order_goods["goods_name"];
                        var price = v_order_goods["price"];//商品价格
                        var num = v_order_goods["num"];//购买数量
                        var order_goods_refund_status = v_order_goods["refund_status"];
                        var spec_info = v_order_goods["spec"];
                        var new_refund_operation = v_order_goods["new_refund_operation"];
                        var refund_status_name = v_order_goods["status_name"];
                        if(shop_after==1 || coin_after==1){
                            refund_status_name = '商家处理中';
                            status_name = '商家处理中';
                        }
                        if((v_order['shipping_status']==1 || v_order['shipping_status']==2 || v_order['shipping_status']==3) && v_order_goods['deduction_freight_point']>0){
                        	var deduction_point = v_order_goods['deduction_point'] - v_order_goods['deduction_freight_point'];
                        }else{
                        	var deduction_point = v_order_goods['deduction_point'];
                        }
                        if (isRefundStatus(order_goods_refund_status)) {
                            html += '<tr><td class="col-md-3">';
                            html += '<div class="media text-left">';
                            html += '<div class="media-left">';
                            html += '<p><img src="' + __IMG(pic_cover_micro) + '" style="width:60px;height:60px;"></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis">';
                            html += '<a class="tdTitles" href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '&website_id=<?php echo $website_id; ?>" target="_blank">' + goods_name + '</a>';
                            html += '</div>';
                            html += '<div class="small-muted line-2-ellipsis">';
                            $.each(spec_info, function (spec_k, spec_v) {
                                html += spec_v['spec_name'] + ':' + spec_v['spec_value_name'] + ' ';
                            })
                            html += '</div>';
                            html += '<div>';
                                //售后
                                if (order_goods_refund_status != 0 && promotion_status != 1 && v_order['order_item_list'].length > 1) {
                                //售后
                                    $.each(new_refund_operation, function (k_op, v_op) {
                                        html += '<a href="javascript:void(0);" data-order-id="' + order_id + '" data-order-goods-id="' + order_goods_id + '" data-refund_require_money="' + v_order_goods['refund_require_money'] + '" data-refund_deduction_point="' + deduction_point + '" class="text-primary block ' + v_op["no"] + '">' + v_op['name'] + '</a>';
                                    })
                                }
                            html += '</div>';
                            html += '</div></div></td>';
                            html += '<td class="col-md-1">￥' + price + '</td>';
                            html += '<td class="col-md-1">' + num + '件</td>';
                            if (buyer_info == false) {
                                if (row > 1) {
                                    html += '<td rowspan="' + row + '" class="border-left col-md-2">';
                                } else {
                                    html += '<td rowspan="' + row + '" class="col-md-2">';
                                }
                                if (v_order['shipping_type'] == '2') {
                                    html += '' + v_order['buyer_name'] + '<br>' + v_order['user_name'] + '<br>' + v_order['user_tel'] + '';
                                } else {
                                    html += '' + v_order['buyer_name'] + '<br>' + receiver_name + '<br>' + receiver_mobile + '';
                                }
                                html += '</td>';
                                // if (order_status == '3' || order_status == '4') {
                                //     html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-success">' + status_name + '</span></p>';
                                // } else {
                                //     html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-danger">' + status_name + '</span></p>';
                                // }
                                if($("#refund_status").val()==2 && refund_status.length<v_order['order_item_list'].length){
                                    html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-grey">' + refund_status_name + '</span></p>';
                                }else{
                                    if(order_status == '0'){
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-red">' + status_name + '</span></p>';
                                    }else if(order_status == '1'){
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-skyBlue">' + status_name + '</span></p>';
                                    }else if(order_status == '2'){
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-orange">' + status_name + '</span></p>';
                                    }else if(order_status == '3' || order_status == '4'){
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-green">' + status_name + '</span></p>';
                                    }else if(order_status == '5'){
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-grey">' + status_name + '</span></p>';
                                    }else{
                                        html += '<td rowspan="' + row + '" class="col-md-1"><p class="mb-04"><span class="label label-orange2">' + status_name + '</span></p>';
                                    }
                                }


                                html += '<p><a href="' + __URL('ADMIN_MAIN/order/orderdetail?order_id=' + order_id) + '">订单详情</a></p></td>';
                                html += '<td class="text-right col-md-2" rowspan="' + row + '">';
                                if(v_order['presell_id']){
                                	html += '定金：￥' + v_order['first_money'] + '<br> 尾款：￥' + v_order['final_money'] + '<br>';
                                }else{
                                	html += '商品总额：￥' + v_order['goods_money'] + '<br>';
                                }
                                if(v_order['deduction_money']>0){
                                	html += '积分抵扣：￥' + v_order['deduction_money'] + '<br>';
                                }
                                	html += '优惠：￥' + v_order['order_promotion_money'] + '<br>';
                               		html += '运费：￥' + shipping_money + '<br>';
                                if (v_order['invoice_tax'] > 0) {
                                    html += '税费：￥' + v_order['invoice_tax'] + '';
                                }
                                if(v_order['presell_id']){
                                	if(v_order['money_type']==1){
                                		html += '<br>实收金额：￥' + v_order['pay_money'] + '<br>';
                                	}else if(v_order['money_type']==2){
                                		html += '<br>实收金额：￥' + order_money + '<br>';
                                	}
                                }else{
                                	html += '<br>实收金额：￥' + order_money + '<br>';
                                }
                                html += '</td>';
                                html += '<td rowspan="' + row + '" class="col-md-2 fs-0 operationLeft">';
                                if (promotion_status == 1 && operation) {
                                    $.each(operation, function (k_status, v_status) {
                                        var data_goods = '';
                                        if(v_status["no"] == 'logistics'){
                                            data_goods = 'data-order-goods-id=' + order_goods_id;
                                        }
                                        if(v_order['order_status']==5 && v_status["no"]=='delete_order'){
                                            //html += '<a class="btn-operation text-red1" href="javascript:void(0);" data-order-id="' + order_id + '" '+data_goods+'  data-toggle="modal" data-target="#' + v_status["no"] + '">' + v_status['name'] + '</a>';
                                         }
                                            // else if(v_status['no']=='judge_refund'){
                                        //             html += '<a href="javascript:void(0);" data-order-id="'+order_id+'" class="text-primary block ' + v_status["no"] + '" data-refund_require_money="' + refund_require_money + '" data-refund_deduction_point="' + refund_deduction_point + '" data-payment-type="' + v_order['payment_type'] + '">' + v_status['name'] + '</a>';
                                        //     	}
                                        else{
                                            html += '<a class="btn-operation" href="javascript:void(0);" data-order-id="' + order_id + '" '+data_goods+' data-toggle="modal" data-target="#' + v_status["no"] + '">' + v_status['name'] + '</a>';
                                        }
                                    })
                                }
                                if (promotion_status != 1 && new_refund_operation  && v_order['order_item_list'].length == 1) {
                                    $.each(new_refund_operation, function (k_op, v_op) {
                                        html += '<a class="btn-operation" href="javascript:void(0);" data-order-id="' + order_id + '" data-order-goods-id="' + order_goods_id + '" data-toggle="modal" data-target="#' + v_op["no"] + '">' + v_op['name'] + '</a>';
                                    })
                                }
                                html += '</td>';
                                html += '</tr>';
                                buyer_info = true;
                            }
                        }
                    })
                    html += '</tbody></table>';
                })
                $(".ol_tbody").html(html);
                utilAdmin.tips();
                all_statues();
                utilAdmin.page('.M-box3', data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }

    //订单数据导出
    function dataExcel() {
        var url='url:'+__URL('ADMIN_MAIN/order/dataExcel');
        util.confirm('订单导出',url,function(){
        	var ids = '';
        	$(".excel-list .field-item").each(function(){
            	var id = $(this).data('id');
            	ids += id + ',';
        	});
            var start_date = $("#orderEndDate").val();
            var end_date = $("#orderStartDate").val();
            var pay_start_date = $("#payStartDate").val();
            var pay_end_date = $("#orderEndDate").val();
            var consign_start_date = $("#payEndDate").val();
            var consign_end_date = $("#sendStartDate").val();
            var finish_start_date = $("#finishStartDate").val();
            var finish_end_date = $("#finishEndDate").val();
            var user_info = $("#user_info").val();
            var order_no = $("#order_no").val();
            var order_status = $("#order_status").val();
            var payment_type = $("#payment_type").val();
            var refund_status = $("#refund_status").val();
            var express_no = $("#express_no").val();
            var goods_name =  $("#goods_name").val()
			if(ids.length==0){
				util.message('请添加模板字段');
				return false;
			}
            window.location.href = __URL("ADMIN_MAIN/order/orderDataExcel" +
                "?start_date=" + start_date +
                "&end_date=" + end_date +
                "&pay_start_date=" + pay_start_date +
                "&pay_end_date=" + pay_end_date +
                "&consign_start_date=" + consign_start_date +
                "&consign_end_date=" + consign_end_date +
                "&finish_start_date=" + finish_start_date +
                "&finish_end_date=" + finish_end_date +
                "&user_info=" + user_info +
                "&order_no=" + order_no +
                "&order_status=" + order_status +
                "&payment_type=" + payment_type +
                "&refund_status=" + refund_status +
                "&express_no=" + express_no +
                "&goods_name=" + goods_name +
                "&ids=" + ids + 
                "&type=3"
            );
        },'xlarge');
    }

    //退款申请操作
    function judgeRefund() {
        var order_id = $("#order_id").val();
        var order_goods_id = $("#order_goods_id").val();
        if ($("#refund_agree").prop('checked')) {
            agreeRefund(order_id, order_goods_id);
        } else {
            var reason = $("#judge_refund_reason").val();
            refuseRefundType(order_id, order_goods_id, reason, 1)
        }
    }

    //同意退款操作
    function agreeRefund(order_id, order_goods_id,return_id=0) {
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/Order/orderGoodsRefundAgree'); ?>",
            async: true,
            data: {'order_id': order_id, "order_goods_id": order_goods_id,"return_id":return_id},
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message(data['message'],"success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"],"danger");
                }
            }
        });
    }

    // 拒绝退款操作
    function refuseRefundType(order_id, order_goods_id, reason, type) {
        if (type == 1) {
            var refund_url = "<?php echo __URL('ADMIN_MAIN/order/ordergoodsrefuseonce'); ?>";
        } else {
            var refund_url = "<?php echo __URL('ADMIN_MAIN/order/ordergoodsrefuseforever'); ?>";
        }
        $.ajax({
            type: "post",
            url: refund_url,
            data: {
                'order_id': order_id,
                'order_goods_id': order_goods_id,
                'reason': reason
            },
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message("已拒绝","success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"],"danger");
                }
            }
        });
    }

    //退货申请操作(和退款申请一样的处理)
    function judgeReturn() {
        var order_id = $("#order_id").val();
        var order_goods_id = $("#order_goods_id").val();
        if ($("#return_agree").prop('checked')) {
        	var return_id = $("#address_return").val();
        	if(return_id==0){
				util.message('请选择退货地址');
				return false;
        	}
            agreeRefund(order_id, order_goods_id,return_id);
        } else {
            var reason = $("#reject_return_reason").val();
            refuseRefundType(order_id, order_goods_id, reason, 1)
        }
    }

    function judgeReceipt() {
        var order_id = $("#order_id").val();
        var order_goods_id = $("#order_goods_id").val();
        if ($("#confirm").prop('checked')) {
            agreeReturn(order_id, order_goods_id);
        } else {
            var reason = $("#refuse_receipt_reason").val();
            refuseRefundType(order_id, order_goods_id, reason, 1);
        }
    }

    // 确认签收
    function agreeReturn(order_id, order_goods_id) {
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/order/ordergoodsconfirmreceive'); ?>",
            data: {'order_id': order_id, "order_goods_id": order_goods_id},
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message("已签收", "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data["message"],"danger");
                }
            }
        });
    }
    function confirm_refundClick(obj) {
            obj.find('input:radio[name=result]').on('click', function () {
                if ($(this).val() == 0) {
                    obj.find('.reason').addClass('hide');
                    obj.find('.address').removeClass('hide');
                    obj.find('.password').removeClass('hide');
                } else {
                    obj.find('.reason').removeClass('hide');
                    obj.find('.address').addClass('hide');
                    obj.find('.password').addClass('hide');
                }
            })
        }

    //确认退款
    function orderGoodsConfirmRefund(order_id, order_goods_id,password) {
        
        $.ajax({
            type: "post",
            url: __URL(ADMINMAIN + "/order/ordergoodsconfirmrefund"),
            data: {
                    'order_id': order_id,
                    'password': password,
                    "order_goods_id": order_goods_id,
                },
            success: function (data) {
                if (data['code'] > 0) {
                    utilAdmin.message("退款已成功，请注意查看", "success", function () {
                        LoadingInfo($("#page_index").val());
                    });
                } else {
                    utilAdmin.message(data['message'], "danger");
                }
            }
        });
    }

//弹窗
        function all_statues() {
            $(function () {
                //处理退款申请
                $('.judge_refund').on('click', function () {
                	var refund_require_money = $(this).data('refund_require_money');
                	var refund_deduction_point = $(this).data('refund_deduction_point');
                	var refund_reason = $(this).data('real_refund_reason');
                    var html = '<form class="form-horizontal padding-15">';
                    html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退款</p></div></div>';
                    if(refund_reason){
                    	html += '<div class="form-group"><label class="col-md-3 control-label">退款原因</label><div class="col-md-8"><p class="form-control-static">'+ refund_reason +'</p></div></div>';
                    }
                    if(refund_require_money>0){
                    	html += '<div class="form-group"><label class="col-md-3 control-label">退款金额</label><div class="col-md-8"><p class="form-control-static">￥'+ refund_require_money +'</p></div></div>';
                    }
                    if(refund_deduction_point>0){
                        html += '<div class="form-group"><label class="col-md-3 control-label">退款积分</label><div class="col-md-8"><p class="form-control-static">'+ refund_deduction_point +'</p></div></div>';
                    }
                    html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意退款</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒绝退款</label></div></div>';
                    html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
                    html += '</form>';
                    var order_id = $(this).attr('data-order-id');
                    var order_goods_id = $(this).attr('data-order-goods-id');
                    util.confirm('处理退款申请', html, function () {
                        if (this.$content.find('input:radio[name=result]').prop('checked')) {
                            agreeRefund(order_id, order_goods_id);
                        } else {
                            var reason = this.$content.find("#reason").val();
                            refuseRefundType(order_id, order_goods_id, reason, 1)
                        }
                    }, function () {
                        click(this.$content)
                    })

                })
                
                function getShopReturnList(){
                    $.ajax({
                        type: "post",
                        url: __URL(PLATFORMMAIN + "/config/getShopReturnList"),
                        success: function (data) {
                            var html = '';
                            if (data.length > 0) {
                                for (var i = 0; i < data.length; i++) {
                                    html += '<option value="'+ data[i].return_id +'">'+ data[i].consigner +' '+ data[i].province_name+data[i].city_name+data[i].dictrict_name +' '+ data[i].address +'</option>';
                                }
                                $("#address_return").html(html);
                            }
                        }
                    });
                }

                //处理退货申请
                $('.judge_return').on('click', function () {
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退货</p></div></div>';
                    html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意退货</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒绝退货</label></div></div>';
                    html += '<div class="form-group address"><label class="col-md-3 control-label">退货地址</label><div class="col-md-8"><select class="form-control" id="address_return"><option value="0">请选择地址</option></select><p class="help-block">没有退货地址？前往系统》商城配置》商家地址添加</p></div></div>';
                    html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
                    html += '</form>';
                    var order_id = $(this).attr('data-order-id');
                    var order_goods_id = $(this).attr('data-order-goods-id');
                    util.confirm('处理退货申请', html, function () {
                        if (this.$content.find('input:radio[name=result]').prop('checked')) {
                        	var return_id = $("#address_return").val();
                        	if(return_id==0){
            					util.message('请选择退货地址');
            					return false;
                        	}
                            agreeRefund(order_id, order_goods_id,return_id);
                        } else {
                            var reason = this.$content.find("#reason").val();
                            refuseRefundType(order_id, order_goods_id, reason, 1)
                        }
                    }, function () {
                    	getShopReturnList();
                        click(this.$content)
                    })
                })
                //处理回寄
                $('.confirm_receipt').on('click', function () {
                    var html = '<form class="form-horizontal padding-15" id="">';
                    html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 确认签收</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒绝签收</label></div></div>';
                    html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
                    html += '</form>';
                    var order_id = $(this).attr('data-order-id');
                    var order_goods_id = $(this).attr('data-order-goods-id');
                    util.confirm('确认回寄', html, function () {
                        if (this.$content.find('input:radio[name=result]').prop('checked')) {
                            agreeReturn(order_id, order_goods_id);
                        } else {
                            var reason = this.$content.find("#reason").val();
                            refuseRefundType(order_id, order_goods_id, reason, 1)
                        }
                    }, function () {
                        click(this.$content)
                    })
                })
                //确认退款
                $('.confirm_refund').on('click', function () {
                    var order_id = $(this).attr('data-order-id');
                    var order_goods_id = $(this).attr('data-order-goods-id');
                    var payment_type = $(this).attr('data-payment-type');
                    var payment_type_presell = $(this).attr('data-payment-type-presell');
                    var refund_require_money = $(this).data('refund_require_money');
                    var refund_deduction_point = $(this).data('refund_deduction_point');
                    var refund_reason = $(this).data('real_refund_reason');
                    var html = '<form class="form-horizontal padding-15">';
                    var payment_state = (payment_type==16 && payment_type_presell==17) || (payment_type==17 && payment_type_presell==16);
                    html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退款</p></div></div>';
                    if(refund_reason){
                        html += '<div class="form-group"><label class="col-md-3 control-label">退款原因</label><div class="col-md-8"><p class="form-control-static">'+ refund_reason +'</p></div></div>';
                    }
                    if(refund_require_money>0){
                        html += '<div class="form-group"><label class="col-md-3 control-label">退款金额</label><div class="col-md-8"><p class="form-control-static">￥'+ refund_require_money +'</p></div></div>';
                    }
                    if(refund_deduction_point>0){
                        html += '<div class="form-group"><label class="col-md-3 control-label">退款积分</label><div class="col-md-8"><p class="form-control-static">'+ refund_deduction_point +'</p></div></div>';
                    }
                    html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意打款</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒绝打款</label></div></div>';
                    if(payment_state){
                        html += '<div class="form-group password hide"><label class="col-md-3 control-label"><span class="text-bright">*</span>ETH交易密码</label><div class="col-md-8"><input type="password" class="form-control" id="ethPassword" value=""></div></div>';
                        html += '<div class="form-group password hide"><label class="col-md-3 control-label"><span class="text-bright">*</span>EOS交易密码</label><div class="col-md-8"><input type="password" class="form-control" id="eosPassword" value=""></div></div>';
                    } else if(payment_type==16 || payment_type==17 || payment_type_presell==16 || payment_type_presell==17){
                        html += '<div class="form-group password hide"><label class="col-md-3 control-label"><span class="text-bright">*</span>交易密码</label><div class="col-md-8"><input type="password" class="form-control" id="password" value=""></div></div>';
                    }
                    html += '<div class="form-group reason hide"><label class="col-md-3 control-label">拒绝理由</label><div class="col-md-8"><textarea id="reason" class="form-control" rows="4"></textarea></div></div>';
                    html += '</form>';


                    util.confirm('确认此订单要退款给用户', html, function () {
                        if (this.$content.find('input:radio[name=result]').prop('checked')) {
                            if (payment_state) {
                                var ethPassword = this.$content.find('#ethPassword').val();
                                var eosPassword = this.$content.find('#eosPassword').val();
                                if(ethPassword=='' || eosPassword==''){
                                    util.message('请填写交易密码','danger');
                                    this.$content.find('#password').focus();
                                    return false;
                                }
                                var password = {
                                    ethPassword: ethPassword,
                                    eosPassword: eosPassword
                                }
                                orderGoodsConfirmRefund(order_id, order_goods_id,password);
                            } else if(payment_type==16 || payment_type==17 || payment_type_presell==16 || payment_type_presell==17){
                                var password = this.$content.find('#password').val();
                                if(password==''){
                                    util.message('请填写交易密码','danger');
                                    this.$content.find('#password').focus();
                                    return false;
                                }
                                orderGoodsConfirmRefund(order_id, order_goods_id,password);
                            }else{
                                util.alert('确认此订单要退款给用户？', function () {
                                    // 执行确认
                                    orderGoodsConfirmRefund(order_id, order_goods_id);
                                })
                            }
                        } else {
                            var reason = this.$content.find("#reason").val();
                            refuseRefundType(order_id, order_goods_id, reason, 1)
                        }
                    }, function () {
                        confirm_refundClick(this.$content)
                    })
                })
                //确认退款
                $('.coin_refund').on('click', function () {
                    var order_id = $(this).attr('data-order-id');
                    var order_goods_id = $(this).attr('data-order-goods-id');
                    var payment_type = $(this).attr('data-payment-type');
                    var payment_type_presell = $(this).attr('data-payment-type-presell');
                    if(payment_type==16 || payment_type==17 || payment_type_presell==16 || payment_type_presell==17){
                        var html = '<form class="form-horizontal padding-15" id="">';
                        html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>交易密码</label><div class="col-md-8"><input type="password" class="form-control" id="password" value=""></div></div>';
                        html += '</form>';
                        util.confirm('确认此订单要退款给用户', html,function(){
                            var password = this.$content.find('#password').val();
                            if(password==''){
                                util.message('请填写交易密码','danger');
                                this.$content.find('#password').focus();
                                return false;
                            }
                            orderGoodsConfirmRefund(order_id, order_goods_id,password);
                        })
                    }else{
                        util.alert('确认此订单要退款给用户？', function () {
                            // 执行确认
                            orderGoodsConfirmRefund(order_id, order_goods_id);
                        })
                    }


                })
            })
        }
      $('body').on('click', '.add1', function () {
          judgeReceipt();
      });
      $('body').on('click', '.add2', function () {
          judgeRefund()
      });
      $('body').on('click', '.add3', function () {
          judgeReturn()
      });
      $('body').on('click', '.add4', function () {
          orderGoodsConfirmRefund()
      });
      $('body').on('click', '#search_button', function () {
          LoadingInfo(1)
      });
      $('body').on('click', '#export_button', function () {
          dataExcel()
      });
  })
</script>

</body>
</html>