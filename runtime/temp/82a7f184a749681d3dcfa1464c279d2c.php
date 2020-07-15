<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:47:"template/platform/Statistics/orderAnalysis.html";i:1591330113;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
                <!--<form action="" class="form">
                    <div class="v-form-inline">
                        <div class="form-group">
                            <label class="control-label">店铺类型</label>
                            <select class="form-control" id="shop_type">
                                <option value="">全部</option>
                                <option value="1">自营店</option>
                                <?php if($shopStatus): ?>
                                <option value="2">入驻店</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group date-form-group">
                            <label class="control-label">下单时间</label>
                            <div class="date-input-group" >
                                <div class="date-input-control">
                                    <input type="text" class="form-control" id="startDate" placeholder="开始时间" value="<?php echo $start_date; ?>"><i class="icon icon-calendar"></i>
                                </div>
                                <span class="date-input-group-addon">~</span>
                                <div class="date-input-control">
                                    <input type="text" class="form-control" id="endDate" placeholder="结束时间" value="<?php echo $end_date; ?>"><i class="icon icon-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="v-form-inline">
                        <div class="form-group">
                            <label class="control-label">地区</label>
                            <select class="form-control"  name="province" id="seleAreaNext" style="margin-right: 10px;">
                                <option value="">省级</option>
                            </select>
                            <select class="form-control"  name="city" id="seleAreaThird" >
                                <option value="">市级</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                        </div>
                    </div>
                </form>-->
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">店铺类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="shop_type">
                            <option value="">全部</option>
                            <option value="1">自营店</option>
                            <option value="2">入驻店</option>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">下单时间</label>
                    <div class="v__controls v-date-input-control">
                        <label for="orderTime">
                            <input type="text" class="v__control_input pr-30" id="orderTime" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                            <i class="icon icon-calendar"></i>
                            <input type="hidden" id="startDate">
                            <input type="hidden" id="endDate">
                        </label>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">地区</label>
                    <div class="v__controls">
                        <select class="v__control_input"  name="province" id="seleAreaNext" style="margin-right: 10px;display: inline-block">
                            <option value="">省级</option>
                        </select>
                        <select class="v__control_input"  name="city" id="seleAreaThird" style="display: inline-block">
                            <option value="">市级</option>
                        </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                <div class="screen-title">
                    <span class="text">订单情况</span>
                </div>
                <div class="h-500 pt-15" id="situation"></div>
                <div class="screen-title"><span class="text">端口分布</span></div>
                <div class="index_tables row">
                    <div class="col-sm-6">
                        <div id="port_distribution" style="height: 400px"></div>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-hover v-table table-auto-center">
                            <thead>
                                <tr>
                                    <th>端口</th>
                                    <th>成交订单（笔）</th>
                                    <th>成交金额（元）</th>
                                    <th>成交会员（人）</th>
                                </tr>
                            </thead>
                            <tbody id="port_list">

                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="screen-title">
                    <span class="text">地区分布</span>
                </div>
                <div class="h-500 pt-15" id="order"></div>
                <div class="area-table">
                    <table class="table table-hover v-table table-auto-center">
                        <thead>
                            <tr>
                                <th>地区</th>
                                <th>成交订单（笔）</th>
                                <th>成交金额（元）</th>
                                <th>成交会员（人）</th>
                            </tr>
                        </thead>
                        <tbody id="area_list">

                        </tbody>
                    </table>
                </div>
                <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    $(function(){
        // echart模板
        showCharts();
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
            $('#startDate').val(date1);
            $('#endDate').val(date2);
        }
        else{
            $('#startDate').val('');
            $('#endDate').val('');
        }

    });
        var selCity = $("#seleAreaNext")[0];
        for (var i = selCity.length - 1; i >= 0; i--) {
            selCity.options[i] = null;
        }
        var opt = new Option("省级", "");
        selCity.options.add(opt);
        //alert(selCity);
        // 添加省
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/order/getProvince'); ?>",
            dataType: "json",
            success: function (data) {
                if (data != null && data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = new Option(data[i].province_name,
                            data[i].province_id);
                        selCity.options.add(opt);
                    }
                    if (typeof ($("#provinceid").val()) != 'undefined') {
                        $("#seleAreaNext").val($("#provinceid").val());
                        GetProvince();
                        $("#provinceid").val('');
                    }
                }
            }
        });
    });
    function showCharts() {
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/statistics/orderDistribution'); ?>",
            async : true,
            data:{"start_date":$("#startDate").val(),"end_date":$("#endDate").val(),"shop_type":$("#shop_type").val(),"province":$("#seleAreaNext").val(),"city":$("#seleAreaThird").val()},
            success : function(dataInfo) {
                var option1 = {
                    title : {
                        text: '订单来源',
                        x:'center'
                    },
                    tooltip : {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                    },
                    legend: {
                        orient: 'vertical',
                        left: 'left',
                        data: ['PC端','wap端','app端','微信端']
                    },
                    series : [
                        {
                            name: '订单来源',
                            type: 'pie',
                            radius : '55%',
                            center: ['50%', '60%'],
                            data:[
                                {value:dataInfo['order_from3'], name:'PC端'},
                                {value:dataInfo['order_from2'], name:'wap端'},
                                {value:dataInfo['order_from5'], name:'app端'},
                                {value:dataInfo['order_from1'], name:'微信端'},
                                // {value:dataInfo['order_from6'], name:'小程序端'}
                            ],
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }
                    ]
                };
                util.chart('port_distribution',option1)
                var html = '';
                html += '<tr>';
                html += '<td>pc端</td>';
                html += '<td>'+dataInfo['order_from3']+'</td>';
                html += '<td>'+dataInfo['order_from3_money']+'</td>';
                html += '<td>'+dataInfo['order_from3_member']+'</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>app端</td>';
                html += '<td>'+dataInfo['order_from5']+'</td>';
                html += '<td>'+dataInfo['order_from5_money']+'</td>';
                html += '<td>'+dataInfo['order_from5_member']+'</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>wap端</td>';
                html += '<td>'+dataInfo['order_from2']+'</td>';
                html += '<td>'+dataInfo['order_from2_money']+'</td>';
                html += '<td>'+dataInfo['order_from2_member']+'</td>';
                html += '</tr>';
                html += '<tr>';
                html += '<td>微信端</td>';
                html += '<td>'+dataInfo['order_from1']+'</td>';
                html += '<td>'+dataInfo['order_from1_money']+'</td>';
                html += '<td>'+dataInfo['order_from1_member']+'</td>';
                html += '</tr>';
                // html += '<tr>';
                // html += '<td>小程序端</td>';
                // html += '<td>'+dataInfo['order_from6']+'</td>';
                // html += '<td>'+dataInfo['order_from6_money']+'</td>';
                // html += '<td>'+dataInfo['order_from6_member']+'</td>';
                // html += '</tr>';
                $("#port_list").html(html);
                if(dataInfo["area_info"]){
                    var option = {
                        // xAxis: {
                        //     type: 'category',
                        //     data: dataInfo["area_info"]["areas"]
                        // },
                        // yAxis: {
                        //     type: 'value',
                        //     name:'数量'
                        // },
                        // series: [{
                        //     data: dataInfo["area_info"]["counts"],
                        //     type: 'bar',
                        // }]
                        tooltip : {
                            trigger: 'axis',
                            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                            }
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        xAxis : [
                            {
                                type : 'category',
                                data : dataInfo["area_info"]["areas"],
                                axisTick: {
                                    alignWithLabel: true
                                }
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value',
                                name:'数量'
                            }
                        ],
                        series : [
                            {   
                                name:'数量',
                                type:'bar',
                                barWidth: '60%',
                                data:dataInfo["area_info"]["counts"]
                            }
                        ]
                    };
                    util.chart('order',option)
                    var html1='';
                    for (var i = 0; i < dataInfo["area_info"]['areas'].length; i++) {
                        html1 += '<tr>';
                        html1 += '<td>' + dataInfo["area_info"]['areas'][i] + '</td>';
                        html1 += '<td>' + dataInfo["area_info"]['counts'][i]+ '</div></td>';
                        html1 += '<td>' + dataInfo["area_info"]['order_from_money'][i] + '</td>';
                        html1 += '<td>' + dataInfo["area_info"]['order_from_member'][i] + '</td>';
                        html1 += '</tr>';
                    }
                    $("#area_list").html(html1);
                }else{
                    var city_name = '';
                    var pro_name = '';
                    if($("#seleAreaThird").val()>0){
                        city_name = $("#seleAreaThird option:selected").text();
                    }
                    if($("#seleAreaNext").val()>0) {
                        pro_name = $("#seleAreaNext option:selected").text();
                    }
                    var name = [];
                    if(city_name){
                        name = [city_name];
                    }else{
                        name = [pro_name];
                    }
                    var option = option = {
                        xAxis: {
                            type: 'category',
                            data: name
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [{
                            data: [0],
                            type: 'bar'
                        }]
                    };
                    util.chart('order',option)
                    var html2='';
                    html2 += '<tr><td colspan="6" class="h-200">暂无符合条件的数据记录</td></tr>';
                    $("#area_list").html(html2);
                }

            }
        });


    }
    loading();
    function loading(){
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/statistics/orderProfile'); ?>",
            async : true,
            data:{"start_date":$("#startDate").val(),"end_date":$("#endDate").val(),"shop_type":$("#shop_type").val(),"province":$("#seleAreaNext").val(),"city":$("#seleAreaThird").val()},
            success : function(data) {
                var option2 = {
                    title: {
                        text: ''
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['订单量','付款订单','售后订单']
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },

                    xAxis: {
                        type: 'category',
                        boundaryGap: false,
                        data: data[0]
                    },
                    yAxis: {
                        type: 'value',
                        name:'数量',
                    },
                    series: [
                        {
                            name:'订单量',
                            type:'line',
                            // stack: '总量',
                            data:data[1][0]['data']
                        },
                        {
                            name:'付款订单',
                            type:'line',
                            // stack: '总量',
                            data:data[1][1]['data']
                        },
                        {
                            name:'售后订单',
                            type:'line',
                            // stack: '总量',
                            data:data[1][2]['data']
                        }
                    ]
                };
                util.chart('situation',option2)
            }
        });
    }
    //选择省份弹出市区
    $('#seleAreaNext').on('change',function(){
        var id = $("#seleAreaNext").find("option:selected").val();
        var selCity = $("#seleAreaThird")[0];
        for (var i = selCity.length - 1; i >= 0; i--) {
            selCity.options[i] = null;
        }
        var opt = new Option("市级", "");
        selCity.options.add(opt);
        $.ajax({
            type: "post",
            url: "<?php echo __URL('PLATFORM_MAIN/order/getCity'); ?>",
            dataType: "json",
            data: {
                "province_id": id
            },
            success: function (data) {
                if (data != null && data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var opt = new Option(data[i].city_name, data[i].city_id);
                        selCity.options.add(opt);
                    }
                    if (typeof ($("#cityid").val()) != 'undefined') {
                        $("#seleAreaThird").val($("#cityid").val());
                        getSelCity();
                        $("#cityid").val('');
                    }
                }
            }
        });
    })
    $('.search').on('click',function(){
        showCharts();
        loading();
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

