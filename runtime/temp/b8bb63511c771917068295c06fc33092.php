<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"template/platform/Member/selfOrderList.html";i:1591330111;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
                    <label class="v__control-label">商品名称</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="请输入商品名称" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">快递单号</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="express_no" placeholder="请输入快递单号" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">支付方式</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="payment_type">
                            <option value="">全部</option>
                            <option value="1">微信</option>
                            <option value="2">支付宝</option>
                            <option value="5">余额支付</option>
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
                        <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                        <a class="btn btn-success ml-15 dataExcel">导出EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

        <div class="screen-title">
            <span class="text">订单列表</span>
        </div>
        <ul class="nav nav-tabs v-nav-tabs fs-12">
            <li role="presentation" <?php if($status=='9'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','&member_id='); ?><?php echo $member_id; ?>" class="flex-auto-center">全部<br><span
                class='order-count J-all'>()</span></a></li>
            <li role="presentation" <?php if($status=='0'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=0&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">待付款<br><span class='order-count J-nopay'>()</span></a></li>
            <li role="presentation" <?php if($status=='1'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=1&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">待发货<br><span class='order-count J-pay'>()</span></a></li>
            <li role="presentation" <?php if($status=='2'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=2&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">待收货<br><span class='order-count J-forgoods'>()</span></a></li>
            <li role="presentation" <?php if($status=='3'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=3&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">已收货<br><span class='order-count J-havegoods'>()</span></a></li>
            <li role="presentation" <?php if($status=='4'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=4&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">已完成<br><span class='order-count J-finish'>()</span></a></li>
            <li role="presentation" <?php if($status=='5'): ?> class="active" <?php endif; ?>><a href="<?php echo __URL('PLATFORM_MAIN/order/selfOrderlist','order_status=5&member_id='); ?><?php echo $member_id; ?>"
                    class="flex-auto-center">已关闭<br><span class='order-count J-close'>()</span></a></li>
        </ul>
        <table class="table v-table table-auto-center mb-10">
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
        <div class="tables" id="list">

        </div>
        <input type="hidden" id="page_index">
        <nav aria-label="Page navigation" class="clearfix">
            <ul id="page" class="pagination pull-right"></ul>
        </nav>
        <!-- page end -->
<input type="hidden" id="member_id" value="<?php echo $member_id; ?>">
<input type="hidden" id="merchant_expire" value="<?php echo $merchant_expire; ?>">
</div>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script type="text/javascript">
    require(['util'], function (util) {
        var merchant_expire= $("#merchant_expire").val();
        util.initPage(LoadingInfo);
        // util.layDate('#orderStartDate');
        // util.layDate('#orderEndDate');
        // util.layDate('#payStartDate');
        // util.layDate('#payEndDate');
        // util.layDate('#sendStartDate');
        // util.layDate('#sendEndDate');
        // util.layDate('#finishStartDate');
        // util.layDate('#finishEndDate');
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


        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var order_no = $("#order_no").val();
            var start_create_date = $("#orderStartDate").val();
            var end_create_date = $("#orderEndDate").val();
            var start_pay_date = $("#payStartDate").val();
            var end_pay_date = $("#payEndDate").val();
            var start_send_date = $("#sendStartDate").val();
            var end_send_date = $("#sendEndDate").val();
            var start_finish_date = $("#finishStartDate").val();
            var end_finish_date = $("#finishEndDate").val();
            var user = $("#user").val();
            var express_no = $("#express_no").val();
            var goods_name = $("#goods_name").val();
            if (<?php echo $status; ?> != null && <?php echo $status; ?> != '9') {
                var order_status = <?php echo $status; ?>;
            } else {
                var order_status = $("#order_status").val();
            }
            var payment_type = $("#payment_type").val();
            var order_type = $("#order_type").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/selforderlist'); ?>",
                async: true,
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "order_no": order_no,
                    "order_status": order_status,
                    "start_create_date": start_create_date,
                    "end_create_date": end_create_date,
                    "start_pay_date": start_pay_date,
                    "end_pay_date": end_pay_date,
                    "start_send_date": start_send_date,
                    "end_send_date": end_send_date,
                    "start_finish_date": start_finish_date,
                    "end_finish_date": end_finish_date,
                    "user": user,
                    "express_no": express_no,
                    "goods_name": goods_name,
                    "payment_type": payment_type,
                    "order_type": order_type,
                    "member_id": $("#member_id").val()
                },
                success: function (data) {
                    var html = '';
                    if (data['data'] == undefined || data['data'].length == 0) {
                        html += '<table class="table v-table table-auto-center mb-10"><tbody><tr align="center"><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr></tbody></table>';
                        $("#list").html(html);
                        return true;
                    }

                    $.each(data['data'], function (k_order, v_order) {
                        var order_id = v_order['order_id'];//订单id
                        var order_no = v_order['order_no'];//订单编号
                        var create_time = timeStampTurnTime(v_order['create_time']);//下单时间
                        var shipping_type_name = v_order['shipping_type_name'];//配送方式
                        var order_type_name = v_order['order_type_name'];//订单类型
                        var order_type_color = v_order['order_type_color'];//订单类型颜色
                        var order_money = v_order['order_money'];//订单金
                        var shipping_money = v_order['shipping_money'] - v_order['promotion_free_shipping'];//运费
                        var order_status = v_order['order_status'];
                        var status_name = v_order['status_name'];
                        var operation = v_order['operation'];
                        var receiver_name = v_order['receiver_name']; //买家姓名
                        var receiver_mobile = v_order['receiver_mobile']; //买家电话
                        var promotion_status = v_order['promotion_status'];// 标识售后订单是否整单进行售后
                        var microshop = v_order['shopkeeper_id'];//微店订单
                        html += '<table class="table v-table table-auto-center mb-10"><tbody><tr>';
                        html += '<td colspan="7" class="text-left bg-f9">';
                        html += '<span class="mr-15-oList">订单号：' + order_no + '</span>';
                        html += '<span class="mr-15-oList">下单时间：' + create_time + '</span>';
                        if (shipping_type_name) {
                            html += '<span class="mr-15-oList">配送方式：' + shipping_type_name + ' </span>';
                        }
                        if (order_type_name) {
                            html += '<span class="mr-15-oList">订单类型：<span class="label" style="background:'+order_type_color+'">' + order_type_name + ' </span></span>';
                        }
                        if(microshop>0 && v_order['order_type']!=2 && v_order['order_type']!=3 && v_order['order_type']!=4){
                            html += '<span class="label" style="background:#fb6638">微店订单</span>';
                        }
                        html += '</td>';

                        var buyer_info = false;
                        var row = v_order["order_item_list"].length;
                        var refund_require_money = 0;
                        var refund_deduction_point = 0;
                        $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                            refund_require_money = refund_require_money + Number(v_order_goods['refund_require_money']);//总退款金额
                            refund_deduction_point = refund_deduction_point + Number(v_order_goods['deduction_point']);//总退款积分
                        })
                        $.each(v_order['order_item_list'], function (k_order_goods, v_order_goods) {
                            var order_goods_id = v_order_goods['order_goods_id'];
                            var pic_cover_micro = v_order_goods['picture']['pic_cover_micro'];//商品图
                            var goods_id = v_order_goods['goods_id'];//商品id
                            var goods_name = v_order_goods['goods_name'];
                            var price = v_order_goods['price'];//商品价格
                            var num = v_order_goods['num'];//购买数量
                            var spec_info = v_order_goods['spec'];
                            var refund_status = v_order_goods['refund_status'];
                            var new_refund_operation = v_order_goods['new_refund_operation'];

                            html += '<tr><td class="col-md-3">';
                            html += '<div class="media text-left">';
                            html += '<div class="media-left"><img src="' + __IMG(pic_cover_micro) + '" width="60" height="60"></div>';
                            html += '<div class="media-body break-word">';
                            html += '<div class="line-2-ellipsis">';
                            html += '<a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + goods_id) + '" target="_blank">' + goods_name + '</a>';
                            html += '</div>';
                            html += '<div class="small-muted line-2-ellipsis">';
                            $.each(spec_info, function (spec_k, spec_v) {
                                html += spec_v['spec_name'] + ':' + spec_v['spec_value_name'] + ' ';
                            })
                            html += '</div>';
                            html += '<div>';
                            if (refund_status != 0 && promotion_status != 1) {
                                //售后
                                $.each(new_refund_operation, function (k_op, v_op) {
                                    html += '<a href="javascript:void(0);" data-order-id="' + order_id + '" data-order-goods-id="' + order_goods_id + '" data-refund_require_money="' + v_order_goods['refund_require_money'] + '" data-refund_deduction_point="' + v_order_goods['deduction_point'] + '" class="text-primary block ' + v_op["no"] + '">' + v_op['name'] + '</a>';
                                })
                            }
                            html += '</div>';
                            html += '</div>';
                            html += '</div></td>';
                            html += '<td class="col-md-1">￥' + price + '</td>';
                            html += '<td class="col-md-1">' + num + '</td>';
                            if (buyer_info == false) {
                                if (row > 1) {
                                    html += '<td  rowspan="' + row + '" class="border-left col-md-2">';
                                } else {
                                    html += '<td  rowspan="' + row + '" class="col-md-2">';
                                }
                                if(v_order['shipping_type'] == '2'){
                                    html += '<a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + v_order['buyer_id']) + '" class="text-primary block mt-04" target="_blank">' + v_order['buyer_name'] + '</a>' + v_order['user_name'] + '<br>' + v_order['user_tel'] + '';
                                }else{
                                    html += '<a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + v_order['buyer_id']) + '" class="text-primary block mt-04" target="_blank">' + v_order['buyer_name'] + '</a>' + receiver_name + '<br>' + receiver_mobile + '';
                                }
                                html += '</td>';

                                html += '<td rowspan="' + row + '" class="col-md-1">';
                                // if (order_status == '3' || order_status == '4') {
                                //     html += '<span class="label label-success">' + status_name + '</span>';
                                // } else {
                                //     html += '<span class="label label-grey">' + status_name + '</span>';
                                // }
                                if(order_status == '0'){
                                    html += '<span class="label label-red">' + status_name + '</span>';
                                }else if(order_status == '1'){
                                    html += '<span class="label label-skyBlue">' + status_name + '</span>';
                                }else if(order_status == '2'){
                                    html += '<span class="label label-orange">' + status_name + '</span>';
                                }else if(order_status == '3' || order_status == '4'){
                                    html += '<span class="label label-green">' + status_name + '</span>';
                                }else if(order_status == '5'){
                                    html += '<span class="label label-grey">' + status_name + '</span>';
                                }else{
                                    html += '<span class="label label-orange2">' + status_name + '</span>';
                                }

                                html += '<a href="' + __URL('PLATFORM_MAIN/order/orderdetail?order_id=' + order_id) + '" class="text-primary block mt-04" target="_blank">订单详情</a>';
                                html += '</td>';

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
                               		html += '运费：￥' + shipping_money + '';
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

                                if(merchant_expire==1){
                                    html += '<td rowspan="' + row + '" class="col-md-2">';
                                    html += '无权操作';
                                    html += '</td>';
                                }else{
                                    html += '<td rowspan="' + row + '" class="col-md-2 fs-0 operationLeft">';
                                    $.each(operation, function (k_status, v_status) {
                                        if(v_order['money_type']==1 && v_status['no']=='delivery'){

                                        }else{
                                        	if(v_status['no']=='judge_refund'){
                                                html += '<a href="javascript:void(0);" data-order-id="' + order_id + '" class="btn-operation ' + v_status['no'] + '" data-refund_require_money="' + refund_require_money + '" data-refund_deduction_point="' + refund_deduction_point + '" >' + v_status['name'] + '</a>';
                                        	}else{
                                        		html += '<a href="javascript:void(0);" data-order-id="' + order_id + '" class="btn-operation ' + v_status['no'] + '" >' + v_status['name'] + '</a>';
                                        	}
                                        }
                                    })
                                    html += '</td>';
                                }

                                html += '</tr>';


                                buyer_info = true;
                            } // end if buyer_info
                        })// end order_goods each
                        if(v_order['commissionA_id']|| v_order['commissionB_id'] || v_order['commissionC_id'] || v_order['global_bonus'] || v_order['area_bonus'] || v_order['team_bonus'] || v_order['profitA_id']|| v_order['profitB_id'] || v_order['profitC_id']){
                            html += '<tr class="title-tr">';
                            html += '<td colspan="7" class="text-left">';
                            if (v_order['commissionA_id']) {
                                html += '<span class="label label-soft mr-15-oList">一级佣金：' + v_order['commissionA'] + '元</span>';
                                html += '<span class="label label-soft mr-15-oList">一级积分：' + v_order['pointA'] + '积分</span>';
                            }
                            if (v_order['commissionB_id']) {
                                html += '<span class="label label-soft mr-15-oList">二级佣金：' + v_order['commissionB'] + '元</span>';
                                html += '<span class="label label-soft mr-15-oList">二级积分：' + v_order['pointB'] + '积分</span>';
                            }
                            if (v_order['commissionC_id']) {
                                html += '<span class="label label-soft mr-15-oList">三级佣金：' + v_order['commissionC'] + '元</span>';
                                html += '<span class="label label-soft mr-15-oList">三级积分：' + v_order['pointC'] + '积分</span>';
                            }
                            if (v_order['global_bonus']) {
                                html += '<span class="label label-success mr-15-oList">全球分红：' + v_order['global_bonus'] + '元</span>';
                            }
                            if (v_order['area_bonus']) {
                                html += '<span class="label label-success mr-15-oList">区域分红：' + v_order['area_bonus'] + '元</span>';
                            }
                            if (v_order['team_bonus']) {
                                html += '<span class="label label-success mr-15-oList">团队分红：' + v_order['team_bonus'] + '元</span>';
                            }
                            if (v_order['profitA_id']) {
                                html += '<span class="label label-soft mr-15-oList">一级收益：' + v_order['profitA'] + '元</span>';
                            }
                            if (v_order['profitB_id']) {
                                html += '<span class="label label-soft mr-15-oList">二级收益：' + v_order['profitB'] + '元</span>';
                            }
                            if (v_order['profitC_id']) {
                                html += '<span class="label label-soft mr-15-oList">三级收益：' + v_order['profitC'] + '元</span>';
                            }
                            html += '</td>';
                            html += '</tr>';
                        }
                        // if(v_order['profitA_id']|| v_order['profitB_id'] || v_order['profitC_id']){
                        //     html += '<tr class="title-tr">';
                        //     html += '<td colspan="7" class="text-left">';
                        //     if (v_order['profitA_id']) {
                        //         html += '<span class="label label-soft">一级收益：' + v_order['profitA'] + '元</span> &nbsp;&nbsp;';
                        //     }
                        //     if (v_order['profitB_id']) {
                        //         html += '<span class="label label-soft">二级收益：' + v_order['profitB'] + '元</span> &nbsp;&nbsp;';
                        //     }
                        //     if (v_order['profitC_id']) {
                        //         html += '<span class="label label-soft">三级收益：' + v_order['profitC'] + '元</span> &nbsp;&nbsp;';
                        //     }
                        //     html += '</td>';
                        //     html += '</tr>';
                        // }
                        html +='</tbody></table>';
                    })// end data.data each

                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                    util.tips();
                }
            });
        }

        $('.search').on('click', function () {
            util.initPage(LoadingInfo);
        });

        $("#search_text").keypress(function (e) {
            if (e.keyCode == 13) {
                LoadingInfo(1);
            }
        });


        getordercount();

        //获取商品各种状态的数量
        function getordercount() {
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/getOrderCount'); ?>",
                data: {
                    "buyer_id": $("#member_id").val(),
                },
                success: function (data) {
                    $('.J-all').html('(' + data.all + ')');
                    $('.J-nopay').html('(' + data.daifukuan + ')');
                    $('.J-pay').html('(' + data.daifahuo + ')');
                    $('.J-forgoods').html('(' + data.yifahuo + ')');
                    $('.J-havegoods').html('(' + data.yishouhuo + ')');
                    $('.J-finish').html('(' + data.yiwancheng + ')');
                    $('.J-close').html('(' + data.yiguanbi + ')');
                }
            });
        }

        //同意退款操作
        function agreeRefund(order_id, order_goods_id,return_id=0) {
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/Order/orderGoodsRefundAgree'); ?>",
                async: true,
                data: {'order_id': order_id, "order_goods_id": order_goods_id,"return_id":return_id},
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"]);
                    }
                }
            });
        }

        // 拒绝退款操作
        function refuseRefundType(order_id, order_goods_id, reason, type) {
            if (type == 1) {
                var refund_url = "<?php echo __URL('PLATFORM_MAIN/order/ordergoodsrefuseonce'); ?>";
            } else {
                var refund_url = "<?php echo __URL('PLATFORM_MAIN/order/ordergoodsrefuseforever'); ?>";
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
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"]);
                    }
                }
            });
        }

        // 卖家确认签收买家寄回商品
        function agreeReturn(order_id, order_goods_id) {
            $.ajax({
                type: "post",
                url: "<?php echo __URL('PLATFORM_MAIN/order/ordergoodsconfirmreceive'); ?>",
                data: {'order_id': order_id, "order_goods_id": order_goods_id},
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"]);
                    }
                }
            });
        }

        //确认退款
        function orderGoodsConfirmRefund(order_id, order_goods_id) {
            $.ajax({
                type: "post",
                url: __URL(PLATFORMMAIN + "/order/ordergoodsconfirmrefund"),
                data: {
                    'order_id': order_id,
                    "order_goods_id": order_goods_id,
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"]);
                    }
                }
            });
        }

        function click(obj) {
            obj.find('input:radio[name=result]').on('click', function () {
                if ($(this).val() == 0) {
                    obj.find('.reason').addClass('hide');
                    obj.find('.address').removeClass('hide');
                } else {
                    obj.find('.reason').removeClass('hide');
                    obj.find('.address').addClass('hide');
                }
            })
        }

        // 获取物流信息
        function getLogisticsInfo(no) {
            // console.log(no);
            $.ajax({
                url: "<?php echo __URL('PLATFORM_MAIN/order/logisticsInfo'); ?>",
                data: {"no": no},
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

        //弹窗

        $(function () {

            //付款
            $("#list").on('click', '.pay', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">支付方式</label><div class="col-md-8"><select class="form-control" id="modal_payment_type"><option value="">请选择</option><option value="1">微信</option><option value="2">支付宝</option></select></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">备注</label><div class="col-md-8"><textarea class="form-control" id="pay_seller_memo" rows="4" placeholder="输入备注的内容"></textarea></div></div>';
                html += '</form>';
                var order_id = $(this).attr('data-order-id');
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
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                            }
                        }
                    });
                })
            })

            //修改价格
            $("#list").on('click', '.adjust_price', function () {
                var order_id = $(this).attr('data-order-id');
                util.confirm('修改价格', 'url:' + __URL(PLATFORMMAIN + '/order/getAdjustPriceModal?order_id=' + order_id), function () {
                    // 执行确认后的逻辑
                    var order_goods_id_adjust_array = '';
                    var shipping_fee = $("#adjust_shipping_fee_modal").val();
                    var memo = $("#modal_memo").val();
                    $("input[class = 'form-control number-form-control addsubPrice']").each(function (i) {
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
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                            }
                        }
                    });
                }, 'large')
            })

            //备注
            $('#list').on('click', '.seller_memo', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">备注</label><div class="col-md-8"><textarea id="note" class="form-control" rows="4" placeholder="输入备注的内容"></textarea></div></div>';
                html += '</form>';
                var order_id = $(this).attr('data-order-id');
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
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                            }
                        }
                    })
                })
            })

            //发货
            $('#list').on('click', '.delivery', function () {
                var order_id = $(this).attr('data-order-id');
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
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger');
                            }
                        }
                    });
                }, 'large')
            })

            // 显示物流信息
            $('#list').on('click', '.logistics', function () {
                getLogisticsInfo($(this).attr('data-express-code'));
            })

            //修改物流信息
            $('#list').on('click', '.update_shipping', function () {
                var order_id = $(this).attr('data-order-id');
                util.confirm('订单发货','url:' + __URL(PLATFORMMAIN + '/order/orderUpdateShippingModal?order_id=' + order_id) , function () {
                    var id = this.$content.find(".flex-auto-center").find(".active").attr('data-id');
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
                                util.message(data["message"], 'success', LoadingInfo($("#page_index").val()));
                            } else {
                                util.message(data["message"],'danger');
                            }
                        }
                    });
                }, 'large')
            })

            //收货
            $('#list').on('click', '.getdelivery', function () {
                var order_id = $(this).attr('data-order-id');
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
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                            }
                        }
                    })
                })
            })

            //修改收货人地址
            $('#list').on('click', '.update_address', function () {
                var order_id = $(this).attr('data-order-id');
                util.confirm('收货人地址', 'url:' + __URL(PLATFORMMAIN + '/order/OrderReceiverAddressModal?order_id=' + order_id) ,function () {
                    var receiver_name = $("#receiver_name").val();
                    var receiver_mobile = $("#receiver_mobile").val();
                    var receiver_province = $("#receiver_province").val();
                    var receiver_city = $("#receiver_city").val();
                    var receiver_district = $("#receiver_district").val();
                    var address_detail = $("#receiver_address").val();
                    var order_id = this.$content.find("#hidden_address_order_id").val();
                    if (receiver_name == '') {
                        util.message("请填写收货人姓名", {time: 1000});
                        $("#receiver_name").focus();
                        return false;
                    }
                    if (!(/^1(3|4|5|7|8)\d{9}$/.test(receiver_mobile))) {
                        util.message("请填写正确格式的手机号", {time: 1000});
                        $("#receiver_mobile").focus();
                        return false;
                    }
                    if (receiver_province <= 0) {
                        util.message("请选择省", {time: 1000});
                        return false;
                    }
                    if (receiver_city <= 0) {
                        util.message("请选择市", {time: 1000});
                        return false;
                    }

                    if ($("#seleAreaFouth option").length > 1) {
                        if (receiver_district <= 0) {
                            util.message("请选择区/县", {time: 1000});
                            return false;
                        }
                    }
                    if (address_detail == '') {
                        util.message("请填写详细收货地址", {time: 1000});
                        $("#receiver_address").focus();
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
                            if (data > 0) {
                                util.message.msg("修改收货地址成功", {time: 1000}, LoadingInfo($('#page_index').val()));
                            } else {
                                util.message.msg("修改收货地址失败", {time: 1000});
                            }
                        }
                    });
                })
            })

            //处理退款申请
            $('#list').on('click', '.judge_refund', function () {
            	var refund_require_money = $(this).data('refund_require_money');
            	var refund_deduction_point = $(this).data('refund_deduction_point');
                var html = '<form class="form-horizontal padding-15">';
                html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退款</p></div></div>';
                if(refund_require_money>0){
                	html += '<div class="form-group"><label class="col-md-3 control-label">退款金额</label><div class="col-md-8"><p class="form-control-static">￥'+ refund_require_money +'</p></div></div>';
                }
                if(refund_deduction_point>0){
                    html += '<div class="form-group"><label class="col-md-3 control-label">退款积分</label><div class="col-md-8"><p class="form-control-static">'+ refund_deduction_point +'</p></div></div>';
                }
                html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意退款</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒接退款</label></div></div>';
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
            $('#list').on('click', '.judge_return', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">售后类型</label><div class="col-md-8"><p class="form-control-static">退货</p></div></div>';
                html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 同意退货</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒接退货</label></div></div>';
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
            $('#list').on('click', '.confirm_receipt', function () {
                var html = '<form class="form-horizontal padding-15" id="">';
                html += '<div class="form-group"><label class="col-md-3 control-label">处理结果</label><div class="col-md-8"><label class="radio-inline"><input type="radio" name="result" value="0" /> 确认签收</label><label class="radio-inline"><input type="radio" name="result" value="1" /> 拒接签收</label></div></div>';
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
            $('#list').on('click', '.confirm_refund', function () {
                var order_id = $(this).attr('data-order-id');
                var order_goods_id = $(this).attr('data-order-goods-id');
                util.alert('确认此订单已退款给用户？', function () {
                    // 执行确认
                    orderGoodsConfirmRefund(order_id, order_goods_id);
                })
            })

            //删除订单
            $('#list').on('click', '.delete_order', function () {
                var order_id = $(this).attr('data-order-id');
                util.alert('确认删除此订单吗 ？', function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/order/deleteOrder'); ?>",
                        async: true,
                        data: {
                            "order_id": order_id,
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                            } else {
                                util.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                            }
                        }
                    })
                })
            })

            //数据导出
            $('.dataExcel').on('click', function () {
                var url='url:'+__URL(PLATFORMMAIN + '/order/dataExcel');
                util.confirm('订单导出',url,function(){
                	var ids = '';
		        	$(".excel-list .field-item").each(function(){
		            	var id = $(this).data('id');
		            	ids += id + ',';
		        	});
	                var member_id =$("#member_id").val();
	                var order_no = $("#order_no").val();
	                var start_create_date = $("#orderStartDate").val();
	                var end_create_date = $("#orderEndDate").val();
	                var start_pay_date = $("#payStartDate").val();
	                var end_pay_date = $("#payEndDate").val();
	                var start_send_date = $("#sendStartDate").val();
	                var end_send_date = $("#sendEndDate").val();
	                var start_finish_date = $("#finishStartDate").val();
	                var end_finish_date = $("#finishEndDate").val();
	                var express_no = $("#express_no").val();
	                var goods_name = $("#goods_name").val();
	                if (<?php echo $status; ?> != null && <?php echo $status; ?> != '9') {
	                    var order_status = <?php echo $status; ?>;
	                } else {
	                    var order_status = $("#order_status").val();
	                    order_status = order_status ? order_status : 9;
	                }
	                var payment_type = $("#payment_type").val();
	                var order_type = $("#order_type").val();
					if(ids.length==0){
						util.message('请添加模板字段');
						return false;
					}
	                window.location.href = __URL("PLATFORM_MAIN/order/orderDataExcel" +
	                    "?member_id=" + member_id +
	                    "&order_no=" + order_no +
	                    "&start_create_date=" + start_create_date +
	                    "&end_create_date=" + end_create_date +
	                    "&start_pay_date=" + start_pay_date +
	                    "&end_pay_date=" + end_pay_date +
	                    "&start_send_date=" + start_send_date +
	                    "&end_send_date=" + end_send_date +
	                    "&start_finish_date=" + start_finish_date +
	                    "&end_finish_date=" + end_finish_date +
	                    "&express_no=" + express_no +
	                    "&goods_name=" + goods_name +
	                    "&order_status=" + order_status +
	                    "&payment_type=" + payment_type +
	                    "&order_type=" + order_type +
	                    "&type=" + 4 +
	                    "&ids=" + ids
	                );
                },'xlarge');
            })
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

