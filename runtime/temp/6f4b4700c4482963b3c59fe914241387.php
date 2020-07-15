<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:38:"template/admin/Goods/goodsComment.html";i:1583811760;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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

<!--<link rel="stylesheet" href="__STATIC__/lib/bootstrap-daterangepicker-master/daterangepicker.css">-->

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
            

<div class="row evalbox">
    <div class="col-sm-4">
        <div class="item">
            <div class="num"><?php echo $evaluate_count['praise_count']; ?></div>
            <div class="evaluation">好评</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="item">
            <div class="num"><?php echo $evaluate_count['center_count']; ?></div>
            <div class="evaluation">中评</div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="item">
            <div class="num"><?php echo $evaluate_count['bad_count']; ?></div>
            <div class="evaluation">差评</div>
        </div>
    </div>
</div>

<!--<div class="evalNav">
    <span>评价时间：</span>
    <span class="pr">
        <input type="text" id="startDate" name="startDate" placeholder="开始时间" style="width: 150px;display: inline-block" class="form-control">
        <label for="startDate"><i class="fa icon-calendar"></i></label>
    </span>
    <span>~</span>
    <span class="pr">
        <input type="text" id="endDate" name="endDate" placeholder="结束时间" style="width: 150px;display: inline-block" class="form-control">
        <label for="endDate"><i class="fa icon-calendar"></i></label>
    </span>
    <span class="pr10">评价用户：</span>
    <span><input type="text" placeholder="用户名称" id="member_name" class="form-control" style="display: inline-block;vertical-align: middle;width: 150px"></span>
    <span class="pr10">评价类型：</span>
    <span>
        <select id="explain_type" class="form-control" style="display: inline-block;vertical-align: middle;width: 150px">
            <option value="0">全部</option>
            <option value="1">好评</option>
            <option value="2">中评</option>
            <option value="3">差评</option>
        </select>
    </span>
    <span class="btn btn-primary search_to">搜索</span>
</div>-->
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">

                <div class="v__control-group">
                    <label class="v__control-label">评价时间</label>
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
                    <label class="v__control-label">评价用户</label>
                    <div class="v__controls">
                        <input type="text" id="member_name" class="v__control_input" placeholder="用户名称" autocomplete="off">
                    </div>
                </div>

                <div class="v__control-group">
                    <label class="v__control-label">评价类型</label>
                    <div class="v__controls">
                        <select class="v__control_input" id="explain_type">
                            <option value="">全部</option>
                            <option value="5">好评</option>
                            <option value="3">中评</option>
                            <option value="1">差评</option>
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
                        <a class="btn btn-primary search_to"><i class="icon icon-search"></i> 搜索</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--表格-->
<table class="table v-table evalTable">
    <thead>
        <tr>
            <th style='width:15%;'>评价信息</th>
            <th style='width:30%'>评论</th>
            <th style='width:10%'>评价人</th>
            <th style='width:30%;'>商品信息</th>
        </tr>
    </thead>
    <tbody id='productTbody'>

    </tbody>
</table>
<div class="page clearfix">
    <div class="M-box3 m-style fr">
    </div>
</div>
<input type="hidden" id="type">
<input type="hidden" id="replyType">
<!-- 回复模态框（Modal） -->
<div class="modal fade" id="evaluate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">回复评价</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label" id="myModaltype">评价内容</label>
                        <div class="col-sm-6">
                            <p class="form-control-static" id="evaluate_content"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label for="evaluate_reply" class="col-sm-3 control-label">回复内容</label>
                        <div class="col-sm-6">
                            <textarea id="evaluate_reply" class="form-control ta_resize" rows="4"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="evaluate_id">
                <button type="button" class="btn btn-primary add1">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>

    </div>
</div>
<!-- /.modal -->
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
        LoadingInfo(1);
    });
    function LoadingInfo(page_index) {
        $('#page_index').val(page_index ? page_index : '1');
	var member_name = $("#member_name").val();
	var start_date = $("#startDate").val();
	var end_date = $("#endDate").val();
	var explain_type = $("#explain_type").val();
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/goodscomment'); ?>",
		data : {
			"page_index" : page_index,
			'page_size' : $("#showNumber").val(),
			"start_date":start_date,
			"end_date":end_date,
			"member_name" : member_name,
			"explain_type" : explain_type
		},
		success : function(data) {
			var html = '';
			if (data["data"].length > 0) {
				for (var i = 0; i < data["data"].length; i++) {
                                    html += '<tr>';
                                    html += '<td>';
                                    switch(data["data"][i]["explain_type"]){
                                        case 1:
                                                html += '用户评价： 好评<br>';
                                                break;
                                                case 2:
                                                html += '用户评价： 中评<br>';
                                                break;
                                                case 3:
                                                html += '用户评价： 差评<br>';
                                        break;
                                    }
                                    html += '用户评分： '+ data["data"][i]["explain_type"]+'分';
                                    html +='</td>';
                                    html += ' <td class="comments">';
                                    html += '<div>';
                                    if(data['data'][i]['content'].length > 0){
                                            html +='<p class="evaluate_content">'+data['data'][i]['content']+'</p>';
                                            if(data['data'][i]['image']!= ''){
                                                var imgs_arr=data['data'][i]['image'].split(',');
                                                html += '<p><span class="evaluate_content" style="margin-left: 50px;">';
                                                for(var key in imgs_arr){
                                                        html += '<img src="'+__IMG(imgs_arr[key])+'" alt="" style="max-height:60px;margin-right:10px;">';
                                                }
                                                html += '</span></p>';
                                            }
                                            html += ' <p class="time">'+ utilAdmin.timeStampTurnTime(data["data"][i]["addtime"])+'</p>';
                                    }else{
                                            html += '<span class="evaluate_content"></span><br></p>';
                                    }
                                    html += '</div>';
                                    if(data['data'][i]['explain_first'].length > 0){
                                        html += '<div class="replys">[卖家回复]<p class="sellerReply">'+data['data'][i]['explain_first']+'</p><p class="time">'+ utilAdmin.timeStampTurnTime(data["data"][i]["explain_time"]);
                                        if(data['data'][i]['again_content'].length<=0){
                                            html += '<a data-id="'+data['data'][i]['id'] +'" class="pull-right add2 text-primary" href="javascript:void(0)">修改回复</a>';
                                        }                
                                        html += '</p></div>';
                                    }else{
                                        html += '<a data-id="'+data['data'][i]['id'] +'" class="pull-right add2 text-primary" href="javascript:void(0)">回复</a>';
                                    }
                                    if(data['data'][i]['again_content'].length > 0){
                                        html += '<p class="guestReply">[买家回复]'+data['data'][i]['again_content']+'</p>';
                                        if(data['data'][i]['again_image'].length > 0){
                                                var imgs_arr=data['data'][i]['again_image'].split(',');
                                                html += '<p><span class="evaluate_content" style="margin-left: 50px;">';
                                                for(var key in imgs_arr){
                                                        html += '<img src="'+__IMG(imgs_arr[key])+'" alt="" style="max-height:60px;margin-right:10px;">';
                                                }
                                                html += '</span></p>';
                                                html += '<p class="time">'+ utilAdmin.timeStampTurnTime(data["data"][i]["again_addtime"])+'</p> ';
                                        }
                                        if (data['data'][i]['again_explain'].length > 0) {
                                                html += '<div class="replys">[卖家回复]<p class="sellerReplyAgain">'+data['data'][i]['again_explain']+'</p><p class="time">'+ utilAdmin.timeStampTurnTime(data["data"][i]["again_explain_time"])+'<a data-id="'+data['data'][i]['id'] +'" class="pull-right add3" href="javascript:void(0)">修改追评回复</a></p></div>';
                                        }else{
                                                html += '<a data-id="'+data['data'][i]['id'] +'" class="pull-right add3 text-primary" href="javascript:void(0)">追评回复</a>';
                                        }
                                    }
                                    html += '</div>';
                                    html += '</td>';
                                    html += '<td>'+ data["data"][i]["member_name"]+'</td>';
                                    // html += '<td class="picword_td"><div class="col-sm-3 pic_td"><img src="'+ __IMG(data["data"][i]["goods_image"])+'" alt=""></div><div class="col-sm-9 word_td"><p class="tdTitles">'+ data["data"][i]["goods_name"]+'</p><p><span class="red">'+ data["data"][i]["goods_price"]+'</span>元</p></div></td>';
                                    html += '<td class="picword_td">';

                                    html += '<div class="media text-left">';
                                    html += '<div class="media-left"><p><img src="'+ __IMG(data["data"][i]["goods_image"])+'" style="width:60px;height:60px;"></p></div>';
                                    html += '<div class="media-body max-w-300"><div class="line-2-ellipsis"><a href="javascript:;">'+ data["data"][i]["goods_name"]+'</a></div>';

                                    html += '<div class="small-muted line-2-ellipsis">'+ data["data"][i]["goods_price"]+'元</div>';

                                    
                                    html += '</div></div>';
                                    html += '</td>';
                                    html += '</tr>';
				}
			}else {
				html += '<tr align="center"><td colspan="4" class="h-200">暂无符合条件的数据记录</td></tr>';
			}
			$("#productTbody").html(html);
                        utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
		}
	});
}


//回复 弹出框
function replyevaluate(evaluate_id, event){
	var evaluate_content = $(event).parents('tr').find('.evaluate_content').html();
	var evaluate_reply = $(event).parents('tr').find('.sellerReply').html();
	if(evaluate_reply == undefined){
		evaluate_reply = '';
	}
	$("#replyType").val(1);
	$("#myModalLabel").text("评价回复");
	$("#myModaltype").text("评价内容：");
	$("#evaluate").modal('show');
	$("#evaluate_id").val(evaluate_id);
	$("#evaluate_content").html(evaluate_content);
	$("#evaluate_reply").text(evaluate_reply);
}

function replyevaluateAgain(evaluate_id, event){
	var evaluate_content = $(event).parents('tr').find('.guestReply').html();
	var evaluate_reply = $(event).parents('tr').find('.sellerReplyAgain').html();
	if(evaluate_reply == undefined){
		evaluate_reply = '';
	}
	$("#replyType").val(2);
	$("#myModalLabel").text("追评回复");
	$("#myModaltype").text("追评内容：");
	$("#evaluate").modal('show');
	$("#evaluate_id").val(evaluate_id);
	$("#evaluate_content").html(evaluate_content);
	$("#evaluate_reply").text(evaluate_reply);
}

// 回复提交
function replyevaluateAjax(){
	var evaluate_id = $("#evaluate_id").val();
	var evaluate_reply = $("#evaluate_reply").val();
	var replyType = $("#replyType").val(); //1为评价回复 2为追评回复
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/replyevaluateajax'); ?>",
		data : {
			"evaluate_id" : evaluate_id, 
			"evaluate_reply" : evaluate_reply,
			"replyType" : replyType
		},
		success : function(data) {
			if(data['code'] > 0){
                            location.href = "<?php echo __URL('ADMIN_MAIN/goods/goodscomment'); ?>";
                            utilAdmin.message(data["message"],"success",function(){
                                
                            });
			}else{
                            utilAdmin.message(data["message"], "danger");
			}
		}
	});
}


document.onkeydown = function(e){ 
	var ev = document.all ? window.event : e;
	if(ev.keyCode==13) {
		LoadingInfo(1);
	}
}

$('body').on('click','.search_to',function(){
    LoadingInfo(1);
})
$('body').on('click','.add1',function(){
    replyevaluateAjax();
})
$('body').on('click','.add2',function(){
    var id=$(this).attr('data-id');
    var _this=$(this);
    replyevaluate(id,_this);
})
$('body').on('click','.add3',function(){
    var id=$(this).attr('data-id');
    var _this=$(this);
    replyevaluateAgain(id,_this);
})

})
</script>

</body>
</html>