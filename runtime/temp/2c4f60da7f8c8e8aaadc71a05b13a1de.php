<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"template/platform/Member/memberDetail.html";i:1591330110;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            
                <div class="screen-title">
                    <span class="text">基本信息</span>
					<input type="hidden" id="uid" value="<?php echo $list[0]['uid']; ?>">
                </div>
                <div class="row panel-detail">   
                	<div class="col-md-6">
                        <div class="item">
                            <div class="media">
							  <div class="media-left">
							    <img src="<?php if($list[0]['user_headimg']): ?><?php echo __IMG($list[0]['user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="160px" height="160px" >
							  </div>
							  <div class="media-body">
							    <p class="p">ID：<?php echo $list[0]['uid']; if($list[0]['user_status']!=1): ?> <a href="javascript:void(0);" class="text-primary ml-15 delBlackList" data-id ="<?php echo $list[0]['uid']; ?>">移除黑名单</a><?php else: ?><a href="javascript:void(0);" class="text-primary ml-15 joinBlackList" data-id ="<?php echo $list[0]['uid']; ?>">加入黑名单</a><?php endif; ?></p>
							    <p class="p">昵称：<?php if($list[0]['user_name']): ?><?php echo $list[0]['user_name']; elseif($list[0]['nick_name']): ?><?php echo $list[0]['nick_name']; else: ?>未设置昵称<?php endif; ?></p>
							    <p class="p">手机号码：<?php echo $list[0]['user_tel']; ?></p>
								  <p class="p">会员等级:
									  <select id="level" class="form-control select-form-control inline-block">
										  <?php if(is_array($level_list['data']) || $level_list['data'] instanceof \think\Collection || $level_list['data'] instanceof \think\Paginator): if( count($level_list['data'])==0 ) : echo "" ;else: foreach($level_list['data'] as $key=>$value): ?>
										  <option value="<?php echo $value['level_id']; ?>" <?php if($value['level_id']==$list[0]['member_level']): ?>selected<?php endif; ?>><?php echo $value['level_name']; ?></option>
										  <?php endforeach; endif; else: echo "" ;endif; ?>
									  </select></p>
							  </div>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <div class="media-body">
								<p class="p flex flex-pack-justify">余额：<span class="default_balance"><?php echo $list[0]['balance']; ?></span>元 <a href="javascript:void(0);" class="text-primary ml-15 adjustBalance" data-id ="<?php echo $list[0]['uid']; ?>">调整余额</a></p>
								<p class="p flex flex-pack-justify">积分：<span class="default_point"><?php echo $list[0]['point']; ?></span> <a href="javascript:void(0);" class="text-primary ml-15 adjustPoint" data-id ="<?php echo $list[0]['uid']; ?>">调整积分</a></p>
								<p class="p">成长值：<?php echo $list[0]['growth_num']; ?></p>
								<p class="p">订单数：<?php echo $list[0]['order_num']; ?></p>
							    <p class="p">消费金额：<?php echo $list[0]['order_money']; ?>元</p>
							    <p class="p">注册时间：<?php echo $list[0]['reg_time']; ?></p>
							</div>
                        </div>
                    </div>
                </div>
                
                <div class="screen-title">
                    <span class="text">流水明细</span>
                </div>
                <ul class="nav nav-tabs v-nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#balanceLog" aria-controls="balanceLog" role="tab" data-toggle="tab" class="flex-auto-center">余额明细</a></li>
                    <li role="presentation"><a href="#pointLog" aria-controls="pointLog" role="tab" data-toggle="tab" class="flex-auto-center">积分明细</a></li>
                    <li role="presentation"><a href="<?php echo __URL('PLATFORM_MAIN/Order/selfOrderList'); ?>&member_id=<?php echo $list[0]['uid']; ?>" class="flex-auto-center">成交订单</a></li>
                </ul>
                <div class="tab-content">
	                <div role="tabpanel" class="tab-pane fade in active" id="balanceLog">
		                <table class="table v-table table-auto-center">
		                    <thead>
		                        <tr>
									<th>流水号</th>
									<th>变动类型</th>
									<th>变动金额</th>
									<th>备注</th>
									<th>变动时间</th>
		                        </tr>
		                    </thead>
		                    <tbody class="list">

		                    </tbody>
		                </table>
						<nav aria-label="Page navigation" class="clearfix">
							<ul id="page"  class="pagination pull-right"></ul>
						</nav>
	                </div>
	                <div role="tabpanel" class="tab-pane fade " id="pointLog">
		                <table class="table v-table table-auto-center">
		                    <thead>
		                        <tr>
									<th>流水号</th>
									<th>变动类型</th>
									<th>变动数目</th>
									<th>备注</th>
									<th>变动时间</th>
		                        </tr>
		                    </thead>
		                    <tbody class="list1">

		                        
		                    </tbody>
		                </table>
						<nav aria-label="Page navigation" class="clearfix">
							<ul id="page1" class="pagination pull-right"></ul>
						</nav>
	                </div>
				</div>
                <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
require(['util'],function(util){
    util.initPage(getList);
    function getList(page_index){
        var uid = $("#uid").val();
        $.ajax({
            type : "get",
            url : "<?php echo __URL('PLATFORM_MAIN/member/accountDetail'); ?>",
            async : true,
            data : {
                "member_id" : uid,
                "page_index":page_index
            },
            success : function(data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        html += '<td>' + data["data"][i]["records_no"] + '</td>';
                        html += '<td>' + data["data"][i]["type_name"];
                        html += '<td >' + data["data"][i]["number"] + '</td>';
                        html += '<td >' + data["data"][i]["text"] + '</td>';
                        html += '<td>' + data["data"][i]["create_time"] + '</td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                }
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
                $(".list").html(html);
            }
        });
    }
	util.initPage(getList1,"page1");
	function getList1(page_index){
            var uid = $("#uid").val();
            $.ajax({
                type : "get",
                url : "<?php echo __URL('PLATFORM_MAIN/member/pointDetail'); ?>",
                async : true,
                data : {
                    "member_id" : uid,
                    "page_index":page_index
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]["records_no"] + '</td>';
                            html += '<td>' + data["data"][i]["type_name"];
                            html += '<td >' + data["data"][i]["number"] + '</td>';
                            html += '<td >' + data["data"][i]["text"] + '</td>';
                            html += '<td>' + data["data"][i]["create_time"] + '</td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page1').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $(".list1").html(html);
                }
            });
        }

    // 调整余额
	$('.adjustBalance').on('click',function(){
            var id = $(this).data('id');
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">余额</label><div class="col-md-8"><input type="number" id="adjustBalance" class="form-control" onkeydown="if(event.keyCode==13){event.keyCode=0;event.returnValue=false;}" /><p class="help-block">输入负值时代表减少余额</p></div></div>';
            html += "<div class='form-group'>" ;
            html +="<label class='col-md-3 control-label'>备注</label>";
            html +="<div class='col-md-8'>";
            html +="<textarea class='form-control' id='adjustBalance_memo' rows='4' placeholder='输入备注的内容'></textarea>";
            html +="</div>";
            html += '</form>';
            util.confirm('调整余额',html,function(){
                var default_balance = $(".default_balance").html();
                var num = this.$content.find('#adjustBalance').val();
                if(num==''){
                    util.message('调整余额不能为空','danger');
                    return false;
                }
                var text = this.$content.find('#adjustBalance_memo').val();
                var money = parseFloat(default_balance)+parseFloat(num);
                if(money<0){
                    util.message('余额不能为负数','danger');
                    return false;
                }
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/addMemberAccount'); ?>",
                    data : {
                        "id" : id,
                        "type" : 2,
                        "num" : num,
                        "text" : text
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            $(".default_balance").html(money);
                            util.message(data["message"],'success',getList($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    // 调整积分
	$('.adjustPoint').on('click',function(){
            var id = $(this).data('id');
            var html = '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label">积分</label><div class="col-md-8"><input type="number" id="adjustPoint" class="form-control" onkeydown="if(event.keyCode==13){event.keyCode=0;event.returnValue=false;}"  /><p class="help-block">输入负值时代表减少积分</p></div></div>';
            html += "<div class='form-group'>" ;
            html +="<label class='col-md-3 control-label'>备注</label>";
            html +="<div class='col-md-8'>";
            html +="<textarea class='form-control' id='adjustPoint_memo' rows='4' placeholder='输入备注的内容'></textarea>";
            html +="</div>";
            html += '</form>';
            util.confirm('调整积分',html,function(){
                var default_point = $(".default_point").html();
                var num = this.$content.find('#adjustPoint').val();
                var text = this.$content.find('#adjustPoint_memo').val();
                var check = /^-?\d+$/;
                if(!check.test(num)){
                    util.message('积分调整只能为整数','danger');
                    return false;
				}
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/member/addMemberAccount'); ?>",
                    data : {
                        "id" : id,
                        "type" : 1,
                        "num" : num,
                        "text" : text
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            var point = parseInt(default_point)+parseInt(num);
                            $(".default_point").html(point);
                            util.message(data["message"],'success',getList1($('#page_index').val()));
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    // 修改等级
    $('#level').on('change',function(){
        var level_id = $(this).val();
        var uid = $('#uid').val();
        util.alert('是否修改会员等级？',function(){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/Member/adjustMemberLevel'); ?>",
                async : true,
                data : {
                    "uid" : uid,
					"level_id":level_id
                },
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',location.reload());
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            });
        })
    })
    // 加入黑名单
	$('.joinBlackList').on('click',function(){
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
                            util.message(data["message"],'success',location.reload());
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
            })
        })
    // 移除黑名单
	$('.delBlackList').on('click',function(){
            var uid = $(this).data('id');
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
                            util.message(data["message"],'success',location.reload());
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                });
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

