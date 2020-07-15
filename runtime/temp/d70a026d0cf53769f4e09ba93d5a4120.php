<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:51:"template/platform/Member/memberWithdrawalApply.html";i:1591330111;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
                                    <label class="v__control-label">会员信息</label>
                                    <div class="v__controls">
                                        <input type="text" id="userName" class="v__control_input" placeholder="手机号码/会员ID/用户名/昵称" autocomplete="off">
                                    </div>
                                </div>

                                <div class="v__control-group">
                                    <label class="v__control-label">流水单号</label>
                                    <div class="v__controls">
                                        <input type="text" id="withdraw_no" class="v__control_input" autocomplete="off">
                                    </div>
                                </div>

                                <div class="v__control-group">
                                    <label class="v__control-label">申请时间</label>
                                    <div class="v__controls v-date-input-control">
                                        <label for="orderTime">
                                            <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                                            <i class="icon icon-calendar"></i>
                                            <input type="hidden" id="orderStartDate">
                                            <input type="hidden" id="orderEndDate">
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
                                        <a class="btn btn-success ml-15 dataExcel">导出明细表</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="screen-title">
                    <span class="text">提现列表</span>
                </div>
                <ul class="nav nav-tabs v-nav-tabs fs-12">
                    <li role="presentation" class="active"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="9">全部<br><span class='order-count J-all'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="1">待审核<br><span class='order-count J-waitcheck'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="2">待打款<br><span class='order-count J-waitmake'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="3">已打款<br><span class='order-count J-make'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="5">打款失败<br><span class='order-count J-makefail'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="4">已拒绝<br><span class='order-count J-nomake'>(0)</span></a></li>
                    <li role="presentation"><a href="javascript:void(0);" class="flex-auto-center withdrawal_list" data-status="-1">审核不通过<br><span class='order-count J-nocheck'>(0)</span></a></li>
                </ul>
                <div class="mb-10 flex flex-pack-justify">
                    <div class="select_type" style="display: none">
                        <a class="btn btn-default" href="javascript:void(0);">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="checkAll">全选
                            </label>
                        </a>
                        <span class="updatetype">

                        </span>

                    </div>
                </div>
                <table class="table v-table table-auto-center">
                    <thead>
                        <tr>
                            <th></th>
                            <th>流水号</th>
                            <th>会员信息</th>
                            <th>提现类型</th>
                            <th>提现金额</th>
                            <th>手续费</th>
                            <th>申请时间</th>
                            <th>状态</th>
                            <th class="col-md-2 operationLeft pr-14">操作</th>
                        </tr>
                    </thead>
                    <tbody id="list">

                    </tbody>
                </table>
                <input type="hidden" id="page_index">
                <nav aria-label="Page navigation" class="clearfix">
                    <ul id="page" class="pagination pull-right"></ul>
                </nav>
<input type="hidden" id="status" value="9">

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    var status = 9;
    util.initPage(getWithdrawList);
    // util.layDate('#startDate');
    // util.layDate('#endDate');
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
    
    //点击全选
    $("#checkAll").on('click',function(){
        $(".v-table input[type = 'checkbox']").prop("checked", this.checked);
    })
    function getWithdrawList(page_index){
        $("#page_index").val(page_index);
        var user_name = $("#userName").val();
        var end_date = $("#orderEndDate").val();
        var start_date = $("#orderStartDate").val();
        var withdraw_no = $("#withdraw_no").val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/member/getWithdrawCount'); ?>",
            success: function (data) {
                $('.J-all').html('(' + data.countall + ')');
                $('.J-waitcheck').html('(' + data.waitcheck + ')');
                $('.J-waitmake').html('(' + data.waitmake + ')');
                $('.J-make').html('(' + data.make + ')');
                $('.J-makefail').html('(' + data.makefail + ')');
                $('.J-nomake').html('(' + data.nomake + ')');
                $('.J-nocheck').html('(' + data.nocheck + ')');
            }
        });
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/member/userCommissionWithdrawList'); ?>",
            async : true,
            data : {
                "withdraw_no":withdraw_no,
                "page_index" : page_index,
                "user_name":user_name,
                "start_date":start_date,
                "end_date":end_date,
                "status" : status
            },
            success : function(data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        if(data["data"][i]["type"] == 1 || data["data"][i]["type"] == 4){
                            type = "银行卡";
                        }else if(data["data"][i]["type"] == 2){
                            type = "微信";
                        }else if(data["data"][i]["type"] == 3){
                            type = "支付宝";
                        }
                        html += '<tr>';
                        html +='<td><input type="checkbox" name="check_id" value='+ data["data"][i]["id"]+'></td>';
                        html += '<td>' + data["data"][i]["withdraw_no"] + '</td>';
                        html += '<td><a href="' + __URL('PLATFORM_MAIN/member/memberDetail?member_id=' + data["data"][i]["uid"]) + '" class="text-primary block mt-04">' + data["data"][i]["user_info"]+ '</a></td>';
                        html += '<td>' + type + '</td>';
                        html += '<td>' + data["data"][i]["cash"] + '</td>';
                        html += '<td>' + data["data"][i]["charge"] + '</td>';
                        html += '<td>' + data["data"][i]["ask_for_date"] + '</td>';
                        html += '<td>';
                        if(data["data"][i]["status"] == 1){
                            html += '<span class="label label-danger">待审核</span>';
                        }else if(data["data"][i]["status"] == 2){
                            html += '<span class="label label-danger">待打款</span>';
                        }else if(data["data"][i]["status"] == -1){
                            html += '<span class="label label-danger">审核不通过</span>';
                        }else if(data["data"][i]["status"] == 3){
                            html += '<span class="label label-success">已打款</span>';
                        }else if(data["data"][i]["status"] == 4){
                            html += '<span class="label label-danger">拒绝打款</span>';
                        }else if(data["data"][i]["status"] == 5){
                            html += '<span class="label label-danger">打款失败</span>';
                        }
                        html += '</td>';
                        html += '<td class="operationLeft">';
                        if(data["data"][i]["status"] == 1){
                            html += '<a href="javascript:void(0);" class="btn-operation audit" data-id="' + data["data"][i]["id"]+ '">审核通过</a>';
                            html += '<a href="javascript:void(0);" class="btn-operation refuse" data-id="' + data["data"][i]["id"]+ '">审核不通过</a>';
                        }else if(data["data"][i]["status"] == 2){
                            html += '<a href="javascript:void(0);" class="btn-operation make_money" data-id="' + data["data"][i]["id"]+ '">同意打款</a>';
                            html += '<a href="javascript:void(0);" class="btn-operation refuse_money" data-id="' + data["data"][i]["id"]+ '">拒绝打款</a>';
                        }else if(data["data"][i]["status"] == 5){
                            html += '<a href="javascript:void(0);" class="btn-operation reason" data-id="' + data["data"][i]["id"]+ '">原因</a>';
                            html += '<a href="javascript:void(0);" class="btn-operation make_money" data-id="' + data["data"][i]["id"]+ '">重新打款</a>';
                            html += '<a href="javascript:void(0);" class="btn-operation refuse_money" data-id="' + data["data"][i]["id"]+ '">拒绝打款</a>';
                        }else{
                            html += '<a href="javascript:void(0);" class="btn-operation details" data-id="' + data["data"][i]["id"]+ '">详情</a>';
                        }
                        html += '</td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr><td colspan="8" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
                $("#list").html(html);
                util.tips();
                details();audit();refuse();make_money();refuse_money();
            }
        });
    }
    $('.withdrawal_list').on('click',function(){
        status = $(this).data('status');
        if(status!=9){
            $('.select_type').show();
        }else{
            $('.select_type').hide();
        }
        if(status==1){
               var str= "<a class=\"btn btn-default check_all\" href=\"javascript:void(0);\" data-status=\"1\">审核通过</a> ";
                   str += "<a class=\"btn btn-default check_all\" href=\"javascript:void(0);\" data-status=\"-1\">审核不通过</a>";
               $(".updatetype").html(str);
        }
        if(status==2){
            var str1= "<a class=\"btn btn-default check_all\" href=\"javascript:void(0);\" data-status=\"3\">同意打款</a> ";
                str1 += "<a class=\"btn btn-default check_all\" href=\"javascript:void(0);\" data-status=\"4\">拒绝打款</a>";
            $(".updatetype").html(str1);
        }
        if(status==5){
            var str2= "<a class=\"btn btn-default check_all\" href=\"javascript:void(0);\" data-status=\"3\">重新打款</a> ";
            $(".updatetype").html(str2);
        }
        if(status==4 || status==3 || status==-1){
            $('.select_type').hide();
        }
        $('#status').val(status);
        $(this).parent('li').addClass('active').siblings().removeClass('active');
        util.initPage(getWithdrawList);
    });
    $('.search').on('click',function(){
        status = $('.nav-tabs').find('li.active').find('a').data('status');
        util.initPage(getWithdrawList);
    });
    $('body').on('click','.check_all',function(){
        var check_id = $("input:checkbox[name='check_id']:checked").map(function (index, elem) {
            return $(elem).val();
        }).get().join(',');
        if(check_id==''){
            util.message('请先选择用户','danger');
            return false;
        }
        status = $(this).data('status');
        if(status==1 || status==-1){
            if(status==1){
                var title = '确认全部审核通过吗？';
                var memo = '后台审核通过';
            }
            if(status==-1){
                var title = '确认审核不通过吗？';
                var memo = '后台审核不通过';
            }
            util.alert(title, function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/member/userCommissionWithdraw'); ?>",
                    data: {
                        "id": check_id,
                        "status": status,
                        "memo":memo
                    },
                    success: function (data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', getWithdrawList($('#page_index').val()));
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            })
        }
        if(status==3 || status==4){
            if(status==3){
                var title = '确认全部同意打款吗？';
                var memo = '后台同意打款';
            }
            if(status==4){
                var title = '确认全部拒绝打款吗？';
                var memo = '后台拒绝打款';
            }
            util.alert(title, function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/member/userWithdrawMake'); ?>",
                    async: true,
                    data: {
                        "id": check_id,
                        "status": status,
                        "memo": memo
                    },
                    success: function (data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', getWithdrawList($('#page_index').val()));
                        } else  if (data["code"] == -9000){
                            util.message(data["data"], 'danger');
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                })
            })
        }
    });
    /**
     * 提现流水详情
     */
    function details(){
        $('.details').on('click',function(){
            var id = $(this).data('id');
            var url = __URL('PLATFORM_MAIN/Member/getWithdrawalsInfo')+'&id='+id;
            util.confirm('流水详情', 'url:'+url,function(){

            })
        });
    }
    /**
     * 通过提现申请
     */
    function audit(){
        $('.audit').on('click',function(){
            var status = $('.nav-tabs').find('li.active').find('a').data('status');
            var id = $(this).data('id');
            var url = __URL('PLATFORM_MAIN/Member/withdrawAudit')+'&id='+id;
            util.confirm('审核通过', 'url:'+url,function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/userCommissionWithdraw'); ?>",
                    async : true,
                    data : {
                        "id" : id,
                        "status":1
                    },
                    success : function(data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getWithdrawList($('#page_index').val()));
                        }else  if (data["code"] == -9000){
                            util.message(data["data"], 'danger',getWithdrawList($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger',getWithdrawList($('#page_index').val()));
                        }
                    }
                })
            })
        });
    }
    /**
     * 拒绝提现申请
     */
    function refuse(){
        $('.refuse').on('click',function(){
            var id = $(this).data('id');
            var status = $('.nav-tabs').find('li.active').find('a').data('status');
            var html = "<div class='form-group'>" ;
                html +="<label class='col-md-3 control-label'>备注</label>";
                html +="<div class='col-md-8'>";
                html +="<textarea class='form-control' id='refuse_memo' rows='4' placeholder='输入备注的内容'></textarea>";
                html +="</div></div>";
            util.confirm('审核不通过', html,function(){
                var memo = this.$content.find('#refuse_memo').val();
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/userCommissionWithdraw'); ?>",
                    async : true,
                    data : {
                        "id" : id,
                        "status":-1,
                        "memo":memo
                    },
                    success : function(data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getWithdrawList($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger',getWithdrawList($('#page_index').val()));
                        }
                    }
                })
            })
        });
    }
    /**
     * 同意打款
     */
    function make_money(){
        $('.make_money').on('click',function(){
            // var status = $('.nav-tabs').find('li.active').find('a').data('status');
            var id = $(this).data('id');
            var url = __URL('PLATFORM_MAIN/Member/withdrawMakeMoney')+'&id='+id;
            util.confirm('确认打款', 'url:'+url,function(){
                var memo = this.$content.find('#make_money_memo').val();
                var withdraw_method = $('input[name=withdraw_method]:checked').val();
                var status;
                if(withdraw_method == '1'){
                    status = 3;
                }else{
                    status = 5;//手动线下转账
                }
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/userWithdrawMake'); ?>",
                    async : true,
                    data : {
                        "id" : id,
                        "status":status,
                        "memo":memo
                    },
                    success : function(data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getWithdrawList($('#page_index').val()));
                        }else  if (data["code"] == -9000){
                            util.message(data["data"], 'danger',getWithdrawList($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger',getWithdrawList($('#page_index').val()));
                        }
                    }
                })
            })
        });
    }
    //展示原因
    $('body').on('click','.reason', function(){
        var id = $(this).data('id');
        var url = __URL('PLATFORM_MAIN/Member/withdrawFailReason')+'&id='+id;
        util.confirm('原因', 'url:'+url,function(){
        })
    });
    /**
     * 拒绝打款
     */
    function refuse_money(){
        $('.refuse_money').on('click',function(){
            var status = $('.nav-tabs').find('li.active').find('a').data('status');
            var id = $(this).data('id');
            var html = "<div class='form-group'>" ;
                html +="<label class='col-md-3 control-label'>备注</label>";
                html +="<div class='col-md-8'>";
                html +="<textarea id='refuse_money_memo' class='form-control' rows='4' placeholder='输入备注的内容'></textarea>";
                html +="</div></div>";
            util.confirm('拒绝打款', html,function(){
                var memo = this.$content.find('#refuse_money_memo').val();
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/userWithdrawMake'); ?>",
                    async : true,
                    data : {
                        "id" : id,
                        "status":4,
                        "memo":memo
                    },
                    success : function(data) {
                        status = $('#status').val();
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getWithdrawList($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger',getWithdrawList($('#page_index').val()));
                        }
                    }
                })
            })
        });
    }

    /**
     * 提现流水数据导出
     */
    $('.dataExcel').on('click',function(){
        var withdraw_no = $("#withdraw_no").val();
        var user_name = $("#userName").val();
        status = $("#status").val();
        var end_date = $("#orderEndDate").val();
        var start_date = $("#orderStartDate").val();
        window.location.href=__URL("PLATFORM_MAIN/member/userCommissionWithdrawListDataExcel?status="+status+"&start_date="+start_date+"&end_date="+end_date+"&user_name="+user_name+"&withdraw_no="+withdraw_no);
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

