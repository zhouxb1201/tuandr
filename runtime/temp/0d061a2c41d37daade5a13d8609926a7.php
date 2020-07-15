<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/platform/Member/memberList.html";i:1591330111;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">会员ID</label>
                    <div class="v__controls">
                        <input type="text" id="member_id" class="v__control_input" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员信息</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="user" placeholder="用户名/昵称/手机号码" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员等级</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="member_level">
                            <option value="">请选择</option>
                            <?php if(is_array($level_list['data']) || $level_list['data'] instanceof \think\Collection || $level_list['data'] instanceof \think\Paginator): if( count($level_list['data'])==0 ) : echo "" ;else: foreach($level_list['data'] as $key=>$vo): ?>
                            <option value="<?php echo $vo['level_id']; ?>"><?php echo $vo['level_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员标签</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="user_group">
                            <option value="">请选择</option>
                            <?php if(is_array($label_list['data']) || $label_list['data'] instanceof \think\Collection || $label_list['data'] instanceof \think\Paginator): if( count($label_list['data'])==0 ) : echo "" ;else: foreach($label_list['data'] as $key=>$vo): ?>
                            <option value="<?php echo $vo['group_id']; ?>" <?php if($member_group_id==$vo['group_id']): ?>selected<?php endif; ?> ><?php echo $vo['group_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">会员状态</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="member_status">
                            <option value="">全部</option>
                            <option value="0">黑名单</option>
                            <option value="1">普通会员</option>
                        </select>
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">注册时间</label>
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
                        <a class="btn btn-success ml-15 dataExcel">导出EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                <div class="screen-title">
                    <span class="text">信息列表</span>
                </div>
                <div class="flex-auto-center mb-20 bg-info text-center border-info">
                    <div class="flex-1 padding-15">
                        <h3 class="strong">会员数</h3>
                        <p><?php echo $user_count_num; ?></p>
                    </div>
                    <div class="flex-1 padding-15">
                        <h3 class="strong">可用余额</h3>
                        <p id="user_balance"><?php echo $user_balance_num; ?></p>
                    </div>
                    <div class="flex-1 padding-15">
                        <h3 class="strong">黑名单</h3>
                        <p id="user_black"><?php echo $user_black_num; ?></p>
                    </div>
                    <div class="flex-1 padding-15">
                        <h3 class="strong">可用积分</h3>
                        <p id="user_point"><?php echo $user_point_num; ?></p>
                    </div>
                </div>
<div class="mb-10 flex flex-pack-justify">
    <div class="">
        <a class="btn btn-primary addUsers" href="javascript:void(0);">添加会员</a>
        <a class="btn btn-default updateLevel" href="javascript:void(0);">修改等级</a>
        <a class="btn btn-default updateGroup" href="javascript:void(0);" data-uid="0">修改标签</a>
        <a class="btn btn-default joinBlackLists" href="javascript:void(0);">加入黑名单</a>
        <a class="btn btn-default delBlackLists" href="javascript:void(0);">移除黑名单</a>
    </div>
</div>
                <table class="table v-table table-auto-center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>ID</th>
                            <th>推荐人</th>
                            <th>会员信息</th>
                            <th>等级/标签</th>
                            <th>余额/积分</th>
                            <th>成交</th>
                            <th>注册时间</th>
                            <th class="col-md-2 pr-14 operationLeft">操作</th>
                        </tr>
                    </thead> 
                    <tbody id="list">

                    </tbody>
                </table>
                <input type="hidden" id="page_index">
                <nav aria-label="Page navigation" class="clearfix">
                    <ul id="page" class="pagination pull-right"></ul>
                </nav>
                <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    util.initPage(getMemberList);
    // util.layDate('#orderStartDate');
    // util.layDate('#orderEndDate');
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
    function getMemberList(page_index){
        $("#page_index").val(page_index);
        var user = $("#user").val();
        var member_id = $("#member_id").val();
        var user_group = $("#user_group").val();
        var member_status = $("#member_status").val();
        var member_level = $("#member_level").val();
        var start_create_date = $("#orderStartDate").val();
        var end_create_date = $("#orderEndDate").val();
        $.ajax({
            type : "post",
            url : "<?php echo __URL('PLATFORM_MAIN/member/memberList'); ?>",
            async : true,
            data : {
                "page_index" : page_index,
                "start_create_date":start_create_date,
                "end_create_date":end_create_date,
                "search_text" : user,
                "member_level" : member_level,
                "user_group" : user_group,
                "member_status" : member_status,
                "member_id" : member_id
            },
            success : function(data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        var referee_name = '';
                        if(data["data"][i]["referee_user_name"]){
                            referee_name = data["data"][i]["referee_user_name"];
                        }else if(data["data"][i]["referee_nick_name"]){
                            referee_name = data["data"][i]["referee_nick_name"];
                        }else if (data["data"][i]["referee_user_tel"]) {
                            referee_name = data["data"][i]["referee_user_tel"];
                        }
                        html += '<tr>';
                        html +='<td><input type="checkbox" name="check_uid" value='+ data["data"][i]["uid"]+'></td>';
                        html += '<td>'+ data["data"][i]["uid"]+'</td>';
                        html += '<td>';
                        if(data["data"][i]["referee_id"]>0){
                            // html +='<div class="media">';
                            // html +='<div class="media-left">';
                            if(data["data"][i]["referee_user_headimg"]){
                                html +='<img src="'+__IMG(data["data"][i]["referee_user_headimg"])+'" height="30" width="30" alt="">';
                            }else{
                                html +='<img src="/public/static/images/headimg.png" height="30" width="30" alt="">';
                            }
                            // html +='</div>';
                            // html +='<div class="media-body text-left">';
                            if(data["data"][i]["referee_user_name"]){
                                html +='<div class="line-1-ellipsis">'+data["data"][i]["referee_user_name"] +'</div>';
                            }else if(data["data"][i]["referee_nick_name"]){
                                html +='<div class="line-1-ellipsis">'+data["data"][i]["referee_nick_name"] +'</div>';
                            }else if (data["data"][i]["referee_user_tel"]) {
                                html +='<div class="line-1-ellipsis">'+data["data"][i]["referee_user_tel"] +'</div>';
                            }else {
                                html +='<div class="line-1-ellipsis">未设置昵称</div>';
                            }
                            if (data["data"][i]["referee_user_tel"]) {
                                html +='<div>'+data["data"][i]["referee_user_tel"] +'</div>';
                            } 
                            // html +='</div>';
                            // html +='</div>';
                            html +='</td>';
                        }else{
                        	html += '<p class="p"><span class="label label-success">总店</span></p>';
                        }
                        html += '<td>';
                        if(data["data"][i]["user_headimg"]){
                            html +='<img src="'+__IMG(data["data"][i]["user_headimg"])+'" height="30" width="30" alt="">';
                        }else{
                            html +='<img src="/public/static/images/headimg.png" height="30" width="30" alt="">';
                        }

                        if(data["data"][i]["user_name"]){
                            html +='<div class="line-1-ellipsis">'+data["data"][i]["user_name"] +'</div>';
                        }else if(data["data"][i]["nick_name"]){
                            html +='<div class="line-1-ellipsis">'+data["data"][i]["nick_name"] +'</div>';
                        }else{
                            html +='<div class="line-1-ellipsis">未设置昵称</div>';
                        }
                        if(data["data"][i]["user_status"] == 0) {
                            html += '<p class="p"><span class="label label-default">黑名单</span></p>';
                        }
                        html +='<div>'+data["data"][i]["user_tel"] +'</div>';
                        // html +='</div>';
                        // html +='</div>';
                        html +='</td>';
                        html +='<td>';
                        html +='<p class="p"><span class="label label-danger">等级:'+ data["data"][i]["level_name"] +'</span></p>';
                        if(data["data"][i]["group_name"]){
                            html +='<span class="label label-success">标签:' + data["data"][i]["group_name"] + '</span>';
                        }else{
                            html +='<span class="label label-success">标签:未设置标签</span>';
                        }
                        html +='</td>';
                        html +='<td>';
                        html +='<p class="p"><span class="label label-danger">可用余额:'+ data["data"][i]["balance"] +'</span></p>';
                        html +='<span class="label label-success">可用积分:' + data["data"][i]["point"] + '</span>';

                        html +='</td>';
                        html +='<td>';
                        html +='<p class="p"><span class="label label-danger">订单:'+ data["data"][i]["order_num"] +'</span></p>';
                        html +='<span class="label label-success">金额:'+ data["data"][i]["order_money"] +'</span>';
                        html +='</td>';
                        html += '<td >'+ data["data"][i]["reg_time"] +'</td>';
                        html +='<td class="operationLeft fs-0">';
                        html +='<a href="' +  __URL('PLATFORM_MAIN/Member/memberDetail?member_id='+ data['data'][i]['uid']) +'"  class="btn-operation">详情</a>';
                        html +='<a href="javascript:void(0);" class="btn-operation updateGroup" data-uid="'+ data['data'][i]['uid'] +'">修改标签</a>';
                        if("<?php echo $distributionStatus; ?>"==1 && data["data"][i]["isdistributor"]!=2){
                            html +='<a href="javascript:void(0);" class="btn-operation becomeDis" data-id ='+ data['data'][i]['uid']+' >设为分销商</a>';
                        }
                        if("<?php echo $distributionStatus; ?>"==1){
                            html +='<a href="javascript:void(0);" class="btn-operation updateDis" data-id ='+ data['data'][i]['uid']+' data-name='+referee_name+'>修改推荐人</a>';
                        }
                        html +='<a href="' +  __URL('PLATFORM_MAIN/Order/selfOrderList?member_id='+ data['data'][i]['uid']) +'" class="btn-operation">订单</a>';
                        if(data["data"][i]["user_status"] == 0) {
                            html += '<a href="javascript:void(0);" class="btn-operation delBlackList" data-id ='+ data['data'][i]['uid']+' >移除黑名单</a>';
                        }else{
                            html += '<a href="javascript:void(0);" class="btn-operation joinBlackList" data-id ='+ data['data'][i]['uid']+'>加入黑名单</a>';
                        }

                        html +='</td>';
                        html += '</tr>';
                    }

                } else {
                    html += '<tr align="center"><td colspan="9" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
                $("#list").html(html);
                util.tips();
                joinBlackList();delBlackList();becomeDis();
            }
        });
    }
    $('.search').on('click',function(){
        util.initPage(getMemberList);
    });
    // 设为分销商
    function becomeDis(){
        $('.becomeDis').on('click',function(){
            $(".tooltip.fade.top.in").remove();
            var uid = $(this).data('id');
            util.alert('确定把该会员设为分销商？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Member/becomeDis'); ?>",
                    async : true,
                    data : {
                        "uid" : uid
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getMemberList($("#page_index").val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    }
    // 修改推荐人
    $('body').on('click','.updateDis',function(){
        var uid = $(this).data('id');
        var name = $(this).data('name');
        if(name ==null){
            name = '总店';
        }
        var url= __URL(PLATFORMMAIN + '/system/updateReferee?uid='+uid+'&name='+name);
        util.confirm('修改所属上级','url:'+url,function(){
            var uid = this.$content.find('#uid').val();
            var referee_id = this.$content.find('#referee_id').val();
            var urls = __URL(PLATFORMMAIN + '/member/updateRefereeDistributor');
            $.ajax({
                type : "post",
                url : urls,
                data : {
                    'uid':uid,
                    'referee_id' :referee_id
                },
                success : function(data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', getMemberList($("#page_index").val()));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        },'large')
    })
        // 加入黑名单
       function joinBlackList(){
        $('.joinBlackList').on('click',function(){
            $(".tooltip.fade.top.in").remove();
            var uid = $(this).data('id');
            util.alert('是否加入该会员至黑名单？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Member/memberLock'); ?>",
                    async : true,
                    data : {
                        "id" : uid
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getMemberList($("#page_index").val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    }

        // 移除黑名单
       function delBlackList(){
        $('.delBlackList').on('click',function(){
            var uid = $(this).data('id');
            $(".tooltip.fade.top.in").remove();
            util.alert('是否移除黑名单？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Member/memberUnlock'); ?>",
                    async : true,
                    data : {
                        "id" : uid
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',getMemberList($("#page_index").val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
       }

    /**
     * 会员数据导出
     */
    $('.dataExcel').on('click',function(){
		var search_text = $("#user").val();
		var member_id = $("#member_id").val();
        var user_group = $("#user_group").val();
		var start_create_date = $("#orderStartDate").val();
		var end_create_date = $("#orderEndDate").val();
        var member_status = $("#member_status").val();
        var member_level = $("#member_level").val();
		window.location.href = __URL("PLATFORM_MAIN/member/memberDataExcel" +
		    "?search_text=" + search_text +
		    "&member_id=" + member_id +
		    "&member_level=" + member_level +
            "&user_group=" + user_group +
            "&member_status=" + member_status +
		    "&start_create_date=" + start_create_date +
		    "&end_create_date=" + end_create_date
		);
    })
    //    点击全选
    $("#checkAll").on('click',function(){
        $(".v-table input[type = 'checkbox']").prop("checked", this.checked);
    })
    $('.joinBlackLists').on('click',function(){
        var check_uid = $("input:checkbox[name='check_uid']:checked").map(function (index, elem) {
            return $(elem).val();
        }).get().join(',');
        if(check_uid==''){
            util.message('请先选择用户','danger');
            return false;
        }
        util.alert('是否加入该会员至黑名单？',function(){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Member/memberLock'); ?>",
                async : true,
                data : {
                    "id" : check_uid
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',getMemberList($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        })
    });
    $('.delBlackLists').on('click',function(){
        var check_uid = $("input:checkbox[name='check_uid']:checked").map(function (index, elem) {
            return $(elem).val();
        }).get().join(',');
        if(check_uid==''){
            util.message('请先选择用户','danger');
            return false;
        }
        util.alert('是否移除黑名单？',function(){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Member/memberUnlock'); ?>",
                async : true,
                data : {
                    "id" : check_uid
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',getMemberList($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        })
    });
    $('body').on('click','.updateGroup',function(){
        var check_uid = $("input:checkbox[name='check_uid']:checked").map(function (index, elem) {
            return $(elem).val();
        }).get().join(',');
        var default_uid='';
        var data_uid = $(this).attr('data-uid');
        if(check_uid=='' && data_uid==0){
            util.message('请先选择用户','danger');
            return false;
        }else if(data_uid!=0){
            default_uid = data_uid;
            check_uid = data_uid;
        }else if($("input:checkbox[name='check_uid']:checked").length==1){
            default_uid = $("input:checkbox[name='check_uid']:checked").val();
            check_uid = default_uid ;
        }
        var url = "<?php echo __URL('PLATFORM_MAIN/member/memberGroupLists'); ?>&default_uid="+default_uid;
        util.confirm('修改标签','url:'+url,function(){
            var group_id = this.$content.find('#group_id').val();
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/member/updateMemberGroup'); ?>",
                data : {
                    "group_id" : group_id,
                    "check_uid" : check_uid,
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',getMemberList($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        })
    });
    //添加会员
    $('.addUsers').on('click',function(){
        var url = "<?php echo __URL('PLATFORM_MAIN/member/addUsers'); ?>"
        window.location.href=url
    })
    $('.updateLevel').on('click',function(){
        var check_uid = $("input:checkbox[name='check_uid']:checked").map(function (index, elem) {
            return $(elem).val();
        }).get().join(',');
        if(check_uid==''){
            util.message('请先选择用户','danger');
            return false;
        }
        var url = "<?php echo __URL('PLATFORM_MAIN/member/memberLevelLists'); ?>";
        util.confirm('修改等级','url:'+url,function(){
            var level_id = this.$content.find('#level_id').val();
            if(level_id ==''){
                util.message('请选择等级','danger');
                return false;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/member/adjustMemberLevel'); ?>",
                data : {
                    "level_id" : level_id,
                    "uid" : check_uid,
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',getMemberList($('#page_index').val()));
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
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

