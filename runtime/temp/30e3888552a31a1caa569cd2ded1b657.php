<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:39:"template/admin/Shop/customTemplate.html";i:1583811760;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;s:43:"template/admin/Shop/customEditTemplate.html";i:1583811760;s:43:"template/admin/Shop/customViewTemplate.html";i:1583811760;}*/ ?>
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
            
<link rel="stylesheet" href="PLATFORM_STATIC/css/wap_iconfont.css?t=20191127">
<div class="custom-header">
    <div class="custom-header-box">
        <div class="custom-header-list flex">
            <div class="v-logo-padding"><a class="v-logo-img" href="javascript:void(0);" title=""><img src="/public/platform/images/logo2.png" style="height: 27px;max-width: 400px;"></a></div>
            <div class="custom-header-list-warp flex-center-justify">
                <i class="icon icon-menu1"></i>
                <span class="name"><?php echo $template_name; ?></span>
                <i class="icon icon-down-arrow"></i>
            </div>
            <div class="custom-header-list-box">
                <div class="box-head flex-center-justify">
                    <span>我的全部页面</span>
                    <div class="">
                        <a href="javascript:void(0);" class="btn btn-default btn-sm addPage">新建页面</a>
                        <a href="<?php echo __URL('ADMIN_MAIN/config/customtemplatelist'); ?>" class="btn btn-default btn-sm">管理页面</a>
                    </div>
                </div>
                <div class="box-main">
                    <div class="box-main-left">
                        <div class="title">基础页</div>
                        <ul class="list">
                            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): if( count($template_list)==0 ) : echo "" ;else: foreach($template_list as $key=>$list): if(in_array($list['type'],[1,2,3,4,5])): ?>
                            <li class="item"><a href="<?php echo __URL('ADMIN_MAIN/config/customtemplate?id='.$list['id']); ?>"><?php echo $list['template_name']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="box-main-right bg-f9">
                        <div class="title">自定义页</div>
                        <ul class="list">
                            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): if( count($template_list)==0 ) : echo "" ;else: foreach($template_list as $key=>$list): if(in_array($list['type'],[6])): ?>
                            <li class="item"><a href="<?php echo __URL('ADMIN_MAIN/config/customtemplate?id='.$list['id']); ?>"><?php echo $list['template_name']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-header-operate">
            <button class="btn btn-save btn-success" data-type="preview">预览</button>
            <button class="btn btn-save btn-info" data-type="recovery">还原</button>
        </div>
    </div>
</div>
<div class="custom-sidebar">
    <div class="custom-sidebar-title">组件</div>
    <div class="custom-component-list" id="navs"></div>
</div>
<div class="custom-container flex flex-pack-center">
    <div class="custom-view">
        <div class="view-title" id="page">Loading...</div>
        <div class="view-main" id="view"></div>
        <div class="view-foot" id="foot">
            <div class="drag fixed nodelete" data-itemid="copyright" id="copyright"></div>
            <div class="drag fixed nodelete" data-itemid="tabbar" id="tabbar"></div>
        </div>
    </div>
    <div class="custom-editor">
        <div class="editor-main" id="editor">
            <div class="editor-arrow"></div>
            <div class="editor-inner"></div>
        </div>
        <div class="editor-foot flex flex-pack-center">
            <button class="btn btn-save btn-primary" data-type="save">保存</button>
        </div>
    </div>
</div>

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

<!-- 编辑 -->
<script type="text/html" id="tpl_navs">
    <%each initnav as nav %>
    <div class="item" data-id="<%nav.id%>">
        <div class="drag <%if nav.type==type%>special<%/if%> remove" data-id="<%nav.id%>">
            <div class="img">
                <img src="/public/platform/images/custom/nav-icon/custom-<%nav.id%>.png">
            </div>
            <div class="text"><%nav.name%></div>
        </div>
    </div>
    <%/each%>
</script>
<script type="text/html" id="edit-del">
    <div class="btn-edit-del">
        <div class="btn-del">删除</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_page">
    <div class="form-editor-title">页面信息设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">页面标题</div>
        <div class="col-sm-10">
            <% if page.readonly %>
            <input class="form-control input-sm diy-bind" data-bind="title" data-placeholder="请输入标题" placeholder="请输入标题" readonly value="<%page.title%>" />
            <%else%>
            <input class="form-control input-sm diy-bind" data-bind="title" data-placeholder="请输入标题" placeholder="请输入标题" value="<%page.title%>" />
            <%/if%>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind="background" value="<%page.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_tabbar">
    <div class="form-editor-title">底部导航设置</div>
    <div class="alert alert-info alert-sm" role="alert">左边图片为默认，右边图片为选中（建议大小80x80）</div>
    <div class="form-items indent" data-min="1" data-max="5">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text singlePicture" data-toggle="selectImg" data-input="#normal-<%itemid%>" data-img="#normal-<%itemid%>">选择图片</div>
                    <img src="<%child.normal%>" class="changePath" id="normal-<%itemid%>">
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="normal" id="normal-<%itemid%>" value="<%child.normal%>">
                </div>
                <div class="item-image square">
                    <div class="text singlePicture" data-toggle="selectImg" data-input="#active-<%itemid%>" data-img="#active-<%itemid%>">选择图片</div>
                    <img src="<%child.active%>" class="changePath" id="active-<%itemid%>">
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="active" id="active-<%itemid%>" value="<%child.active%>">
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="path" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.path%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_copyright">
    <div class="form-editor-title">版权设置</div>
    <%if params.readonly == '1'%>
    <div class="alert alert-info alert-sm" role="alert">默认版本不支持修改相关参数</div>
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">版权内容</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="text" data-placeholder="" placeholder="请填写版权内容" value="<%if params.readonly == '1'%>微商来提供技术支持<%else%><%params.text%><%/if%>" <%if params.readonly == '1'%>readonly<%/if%>/>
            <div class="help-block">版权内容建议40个字符以内</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">启用LOGO</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input <%if params.readonly == '1'%>disabled<%/if%> type="radio" name="showlogo" value="1" class="diy-bind" data-bind-child="params" data-bind="showlogo" data-bind-init="true" <%if params.showlogo=='1'||!params.showlogo%>checked="checked"<%/if%>> 是</label>
            <label class="radio-inline"><input <%if params.readonly == '1'%>disabled<%/if%> type="radio" name="showlogo" value="0" class="diy-bind" data-bind-child="params" data-bind="showlogo" data-bind-init="true" <%if params.showlogo=='0'||!params.showlogo%>checked="checked"<%/if%>> 否</label>
        </div>
    </div>
    <%if params.showlogo=='1' && params.readonly != '1'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">选择样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="0" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='0'||!style.showtype%>checked="checked"<%/if%>> 样式一</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='1'||!style.showtype%>checked="checked"<%/if%>> 样式二</label>
        </div>
    </div>
    <div class="form-items">
        <div class="inner" id="form-items">
            <div class="item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%params.src%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" class="changePath" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm changePath diy-bind" data-bind-child="params" data-bind="src" id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%params.src%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址(可不填)" value="<%params.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_search">
    <div class="form-editor-title">搜索框设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f1f1f2">重置</span>
            </div>
        </div>
        <!-- <div class="col-sm-2 control-label">输入框背景</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="inputbackground" value="<%style.inputbackground%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div> -->
    </div>

    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#999999">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#b4b4b4">重置</span>
            </div>
        </div>
    </div> -->

    <div class="form-group">
        <div class="col-sm-2 control-label">提示文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="placeholder" data-placeholder="" placeholder="请输入提示文字(不填则不显示，最长20字)" value="<%params.placeholder%>" maxlength="20" />
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">文字对齐</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div> -->
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_banner">
    <div class="form-editor-title">图片轮播设置</div>
    <div class="alert alert-info alert-sm" role="alert">宽度建议750px，高度自适应。图片建议保证高度一致。</div>
    <div class="form-items" data-min="1" data-max="8">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>"  class="changePath" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm changePath diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_menu">
    <div class="form-editor-title">按钮组设置</div>
    <div class="alert alert-info alert-sm" role="alert">图标尺寸建议100 * 100</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rownum" value="3" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='3'%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="4" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='4'%>checked="checked"<%/if%>> 4个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="5" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='5'%>checked="checked"<%/if%>> 5个</label>
        </div>
    </div>

    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</div>
                    <img src="<%child.imgurl%>" onerror="this.src='/public/admin/images/custom/nopic.jpg';" class="changePath" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10 colorpicker-input-group">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" placeholder="请选择图片或输入图片地址" value="<%child.text%>" style="width: 55%" />
                        <input class="colorpicker input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="color" value="<%child.color%>" type="color" />
                        <span class="btn btn-default btn-sm btn-reset" data-color="#666666">重置</span>
                    </div>
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_notice">
    <div class="form-editor-title">公告设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#fff7cc">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f60">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">公告内容</div>
        <div class="col-sm-10">
            <textarea class="form-control input-sm diy-bind" rows="3"  data-bind-child="params" data-bind="text" id="curl-<%itemid%>" placeholder="输入公告内容"><%params.text%></textarea>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_picture">
    <div class="form-editor-title">单图设置</div>
    <div class="alert alert-info alert-sm" role="alert">宽度建议750px，高度自适应</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items indent" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>" onerror="this.src='/public/admin/images/custom/nopic.jpg';" id="pimg-<%itemid%>" class="changePath" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_title">
    <div class="form-editor-title">标题栏设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">标题链接</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="link" data-placeholder="" placeholder="" value="<%params.link%>" id="titlelink"/>
                <span data-input="#titlelink" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
            </div>
        </div>
    </div> -->
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control colorpicker diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#666666">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">对齐方向</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字大小</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.fontsize%>" data-min="9" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.fontsize%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="fontsize" value="<%style.fontsize%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_line">
    <div class="form-editor-title">辅助线设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">线条颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#333333">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="linestyle" value="solid" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='solid'%>checked="checked"<%/if%> > 实线</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dashed" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dashed'%>checked="checked"<%/if%>> 虚线(长方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dotted" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dotted'%>checked="checked"<%/if%>> 虚线(正方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="double" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='double'%>checked="checked"<%/if%>> 双实线</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条高度</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="20"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_blank">
    <div class="form-editor-title">辅助线设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">元素高度</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="200"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_picturew">
    <div class="form-editor-title">图片橱窗设置</div>
    <div class="alert alert-info alert-sm" role="alert">建议图片尺寸图一400*400，图二400*200，图三、四200*200</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">布局方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="row" value="1" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='1'%>checked="checked"<%/if%>> 橱窗样式</label>
            <label class="radio-inline"><input type="radio" name="row" value="2" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='2'%>checked="checked"<%/if%>> 堆积两列</label>
            <label class="radio-inline"><input type="radio" name="row" value="3" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='3'%>checked="checked"<%/if%>> 堆积三列</label>
            <label class="radio-inline"><input type="radio" name="row" value="4" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='4'%>checked="checked"<%/if%>> 堆积四列</label>
            <%if params.row==1%>
            <div class="help-block">单组最多显示四个，超出隐藏</div>
            <%/if%>
            <%if params.row>1%>
            <div class="help-block">图片大小不限制，但请确保所有图片的尺寸/比例相同。</div>
            <%/if%>
        </div>
    </div>

    <div class="form-items indent" data-min="2" data-max="20">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>" onerror="this.src='/public/admin/images/custom/nopic.jpg';" id="pimg-<%itemid%>" class="changePath"/>
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_goods">
    <div class="form-editor-title">商品组设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f3f3f3">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">商品范围</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="2" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='2' || params.goodstype=='0'%>checked="checked"<%/if%>> 店铺商品</label>
            <input class="diy-bind input" data-bind-child="params" data-bind="shop_id" value="<%params.shop_id%>" type="hidden" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="recommendtype" value="0" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='0'||!params.recommendtype%>checked="checked"<%/if%>> 自动推荐</label>
            <label class="radio-inline"><input type="radio" name="recommendtype" value="1" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='1'||!params.recommendtype%>checked="checked"<%/if%>> 手动推荐</label>
        </div>
    </div>
    <%if params.recommendtype=='0'||!params.recommendtype%>
    <div class="form-group">
        <div class="col-sm-2 control-label">排序规则</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="goodssort" data-bind-child="params" >
                <option name="goodssort" value="0" <%if params.goodssort=='0'%>selected="selected"<%/if%>>按上架时间升序</option>
                <option name="goodssort" value="1" <%if params.goodssort=='1'%>selected="selected"<%/if%>>按上架时间降序</option>
                <option name="goodssort" value="2" <%if params.goodssort=='2'%>selected="selected"<%/if%>>按销量升序</option>
                <option name="goodssort" value="3" <%if params.goodssort=='3'%>selected="selected"<%/if%>>按销量降序</option>
                <option name="goodssort" value="4" <%if params.goodssort=='4'%>selected="selected"<%/if%>>按收藏数升序</option>
                <option name="goodssort" value="5" <%if params.goodssort=='5'%>selected="selected"<%/if%>>按收藏数降序</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐数量</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%params.recommendnum%>" data-min="2" data-max="30" data-step='2'></div>
                <div class="col-sm-4 control-labe count"><span><%params.recommendnum%></span> 个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="recommendnum" value="<%params.recommendnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.recommendtype=='1'%>
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover_micro%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectGoods"><i class="icon icon-add1"></i> 选择商品</div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_shop">
    <div class="form-editor-title">店铺设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">模块标题</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
            <div class="help-block">标题文字建议8个字以内</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="recommendtype" value="0" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='0'||!params.recommendtype%>checked="checked"<%/if%>> 自动推荐</label>
            <label class="radio-inline"><input type="radio" name="recommendtype" value="1" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='1'||!params.recommendtype%>checked="checked"<%/if%>> 手动推荐</label>
        </div>
    </div>
    <%if params.recommendtype == '0'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐条件</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="recommendcondi" data-bind-child="params" >
                <option name="recommendcondi" value="0" <%if params.recommendcondi=='0'%>selected="selected"<%/if%>>按入驻时间升序</option>
                <option name="recommendcondi" value="1" <%if params.recommendcondi=='1'%>selected="selected"<%/if%>>按入驻时间降序</option>
                <option name="recommendcondi" value="2" <%if params.recommendcondi=='2'%>selected="selected"<%/if%>>按销量额升序</option>
                <option name="recommendcondi" value="3" <%if params.recommendcondi=='3'%>selected="selected"<%/if%>>按销量额降序</option>
                <option name="recommendcondi" value="4" <%if params.recommendcondi=='4'%>selected="selected"<%/if%>>按店铺收藏数升序</option>
                <option name="recommendcondi" value="5" <%if params.recommendcondi=='5'%>selected="selected"<%/if%>>按店铺收藏数降序</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐数量</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%params.recommendnum%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%params.recommendnum%></span> 个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="recommendnum" value="<%params.recommendnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.recommendtype == '1'%>
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.pic_cover%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectShop"><i class="icon icon-add1"></i> 选择店铺</div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_listmenu">
    <div class="form-editor-title">列表导航设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#999999">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#333333">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">提示颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="remarkcolor" value="<%style.remarkcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#888888">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="20">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image square">
                        <span class="btn-del" title="清空图标" onclick="$('#cicon-<%itemid%>').val('').trigger('change')"></span>
                        <div class="icon-main">
                            <i class="v-icon <%child.iconclass%>" id="picon-<%itemid%>"></i>
                        </div>
                        <div class="text" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                        <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" data-bind-init="true">
                    </div>
                    <div class="item-form">
                        <div class="input-group mb-10">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon">提示</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.remark%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="remark" maxlength="6">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_richtext">
    <div class="form-editor-title">自定义设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">边距设置</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.padding%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div id="UE_richtext_<%itemid%>" class="diy-bind" data-bind-child="params" data-bind="content" ></div>
            <textarea id="get_UE_richtext_<%itemid%>" class="hidden form-control diy-bind" data-bind-child="params" data-bind="content"></textarea>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_shop_head">
    <div class="form-editor-title">店招设置</div>
    <div class="alert alert-info alert-sm" role="alert">背景图片宽度建议750px，高度建议200px</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">风格样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="styletype" value="1" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='1'||!params.styletype%>checked="checked"<%/if%>> 风格一</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="2" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='2'%>checked="checked"<%/if%>> 风格二</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="3" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='3'%>checked="checked"<%/if%>> 风格三</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="4" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='4'%>checked="checked"<%/if%>> 风格四</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="5" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='5'%>checked="checked"<%/if%>> 风格五</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="6" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='6'%>checked="checked"<%/if%>> 风格六</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景图片</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="style" data-bind="backgroundimage" data-placeholder="" placeholder="" value="<%style.backgroundimage%>" id="backgroundimage"/>
                <span data-input="#backgroundimage" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_fixed"></script>
<script type="text/html" id="tpl_edit_detail_banner">
    <div class="form-editor-title">商品图片设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">分页器形状</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="shape" value="round" class="diy-bind" data-bind-child="style" data-bind="shape" checked="checked"> 圆形</label>
            <label class="radio-inline"><input type="radio" name="shape" value="square" class="diy-bind" data-bind-child="style" data-bind="shape"> 正方形</label>
            <label class="radio-inline"><input type="radio" name="shape" value="rectangle" class="diy-bind" data-bind-child="style" data-bind="shape"> 长方形</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">分页器位置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="position" value="left" class="diy-bind" data-bind-child="style" data-bind="position"> 居左</label>
            <label class="radio-inline"><input type="radio" name="position" value="center" class="diy-bind" data-bind-child="style" data-bind="position" checked="checked"> 居中</label>
            <label class="radio-inline"><input type="radio" name="position" value="right" class="diy-bind" data-bind-child="style" data-bind="position"> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">分页器颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#1989fa">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_info">
    <div class="form-editor-title">商品信息设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">普通售价</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="pricecolor" value="<%style.pricecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ff454e">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">普通副色调</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="pricelightcolor" value="<%style.pricelightcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">活动售价</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="promotecolor" value="<%style.promotecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">活动副色调</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="promotelightcolor" value="<%style.promotelightcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_promote">
    <div class="form-editor-title">商品促销设置</div>
    <div class="alert alert-info alert-sm" role="alert">商品促销显示情况根据真实数据为准</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="3">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <div class="item-body">
                    <div class="item-form">
                        <div class="input-group">
                            <span class="input-group-addon"><%child.text%></span>
                            <div type="text" class="form-control input-sm diy-bind" value="拖动进行排序" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" readonly>拖动进行排序</div>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_specs">
    <div class="form-editor-title">商品规格设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#606266">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">选中颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="currentcolor" value="<%style.currentcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">未选中颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="nocurrentcolor" value="<%style.nocurrentcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_delivery">
    <div class="form-editor-title">商品配送设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#606266">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">选中颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="currentcolor" value="<%style.currentcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">未选中颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="nocurrentcolor" value="<%style.nocurrentcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_service">
    <div class="form-editor-title">商品服务设置</div>
    <div class="alert alert-info alert-sm" role="alert">图片建议尺寸24x24px(像素)</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">描述颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="desccolor" value="<%style.desccolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#606266">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</div>
                    <img src="<%child.imgurl%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" class="changePath" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10 colorpicker-input-group">
                        <span class="input-group-addon">标题</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="title" placeholder="请选择图片或输入图片地址" value="<%child.title%>"/>
                    </div>
                    <div class="">
                        <textarea class="form-control input-sm diy-bind" rows="3" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="desc" placeholder="请输入描述内容"><%child.desc%></textarea>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_shop">
    <div class="form-editor-title">店铺信息设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">店铺名称</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="namecolor" value="<%style.namecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">星星颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="starcolor" value="<%style.starcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffd21e">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">评分颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="scorecolor" value="<%style.scorecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ff454e">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="btncolor" value="<%style.btncolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ff454e">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">按钮文字</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="btntextcolor" value="<%style.btntextcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_desc">
    <div class="form-editor-title">商品描述设置</div>
    <div class="alert alert-info alert-sm" role="alert">商品描述模块不能编辑，仅能拖动排序</div>
</script>
<!-- 编辑 end -->
<!-- 视图 -->
<script type="text/html" id="tpl_show_search">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-search" style="background: <%style.background%>; padding: <%style.paddingtop||'10'%>px <%style.paddingleft||'10'%>px;">
            <div class="inner left" >
                <div class="search-icon" ><i class="icon icon-search"></i></div>
                <div class="search-input" >
                    <span><%params.placeholder%></span>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_tabbar">
    <div class="vui-tabbar">
        <% each data as item%>
        <div class="vui-tabbar-item">
            <div class="vui-tabbar-item-icon">
                <img src="<%item.normal%>">
            </div>
            <div class="vui-tabbar-item-text">
                <span><%item.text%></span>
            </div>
        </div>
        <%/each%>
    </div>
</script>
<script type="text/html" id="tpl_show_copyright">
    <div class="vui-copyright">
        <%if params.readonly == '1'%>
        <span class="text">微商来提供技术支持</span>
        <%else%>
        <%if params.showlogo == '1'%>
        <img src="<%params.src%>">
        <%if style.showtype == '1'%><br><%/if%>
        <%/if%>
        <span class="text"><%params.text%></span>
        <%/if%>
    </div>
</script>
<script type="text/html" id="tpl_show_banner">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-banner">
            <%each data as item%>
            <img src="<%item.imgurl%>" />
            <%/each%>
            <div class="dots">
                <%each data as item%>
                <span></span>
                <%/each%>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_menu">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-icon-group noborder col-<%style.rownum%>" style="background: <%style.background||'#ffffff'%>">
            <%each data as item%>
            <div class="vui-icon-col">
                <div class="icon"><img src="<%item.imgurl%>"></div>
                <div class="text" style="color: <%item.color%>"><%item.text%></div>
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_notice">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-notice" style="background: <%style.background%>">
            <div class="vui-notice-icon"><img src="/public/admin/images/custom/default/notice-icon.png"></div>
            <div class="vui-notice-wrap">
                <div class="vui-notice-content" style="color: <%style.color%>"><%params.text%></div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_picture">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-picture" style="padding-bottom: <%style.paddingtop%>px; background: <%style.background%>;">
            <%each data as item%>
            <div style="display: block; padding: <%style.paddingtop%>px <%style.paddingleft%>px 0;">
                <img src="<%item.imgurl%>" />
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_title">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-title" style="background: <%style.background||''%>; color: <%style.color||''%>; font-size: <%style.fontsize||'12'%>px; text-align: <%style.textalign||''%>; padding: <%style.paddingtop||'0'%>px <%style.paddingleft||'5'%>px;">
            <%if params.link%>
            <a href="<%params.link%>" style="color: <%style.color||''%>"><%params.title||'请输入标题内容'%></a>
            <%else%>
            <%params.title||'请输入标题内容'%>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_line">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-line" style="background: <%style.background%>; padding: <%style.padding%>px 0;">
            <div class="line" style="border-top: <%style.height||'2'%>px <%style.linestyle||'solid'%> <%style.bordercolor||'#000000'%>"></div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_blank">
    <div class="drag" data-itemid="<%itemid%>">
        <div style="height: <%style.height%>px; background: <%style.background%>"></div>
    </div>
</script>
<script type="text/html" id="tpl_show_picturew">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.row=='1'%>
        <div class="vui-cube" style="background: <%style.background%>; <%if count(data)==1%>padding: <%style.paddingtop%>px <%style.paddingleft%>px;<%/if%>">
            <%if count(data)==1%>
            <img src="<%toArray(data)[0].imgurl%>" />
            <%/if%>
            <%if count(data)>1%>
            <div class="vui-cube-left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                <img src="<%toArray(data)[0].imgurl%>" />
            </div>
            <div class="vui-cube-right" <%if count(data)==2%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
                <%if count(data)==2%>
                <img src="<%toArray(data)[1].imgurl%>" />
                <%/if%>
                <%if count(data)>2%>
                <div class="vui-cube-right1" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-bottom: 0;">
                    <img src="<%toArray(data)[1].imgurl%>" />
                </div>
                <div class="vui-cube-right2" <%if count(data)==3%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
                    <%if count(data)==3%>
                    <img src="<%toArray(data)[2].imgurl%>" />
                    <%/if%>
                    <%if count(data)>3%>
                    <div class="left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                        <img src="<%toArray(data)[2].imgurl%>" />
                    </div>
                    <%/if%>
                    <%if count(data)>=4%>
                    <div class="right" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                        <img src="<%toArray(data)[3].imgurl%>" />
                    </div>
                    <%/if%>
                </div>
                <%/if%>
            </div>
            <%/if%>
        </div>
        <%/if%>
        <%if params.row>1%>
        <div class="vui-picturew row-<%params.row%>" style="padding: <%style.paddingtop%>px; <%style.paddingleft%>px; background: <%style.background%>;">
            <%each data as item%>
            <div class="item" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                <img src="<%item.imgurl%>">
            </div>
            <%/each%>
        </div>
        <%/if%>
    </div>
</script>
<script type="text/html" id="tpl_show_goods">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-goods-group" style="background-color: <%style.background%>">
            <%if params.recommendtype == '0'%>
            <div class="vui-goods-item">
                <div class="image">
                    <img src="/public/admin/images/custom/default/goods-1.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按销量升序<%/if%>
                        <%if params.goodssort=='3'%>按销量降序<%/if%>
                        <%if params.goodssort=='4'%>按收藏数升序<%/if%>
                        <%if params.goodssort=='5'%>按收藏数降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vui-goods-item">
                <div class="image">
                    <img src="/public/admin/images/custom/default/goods-2.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按销量升序<%/if%>
                        <%if params.goodssort=='3'%>按销量降序<%/if%>
                        <%if params.goodssort=='4'%>按收藏数升序<%/if%>
                        <%if params.goodssort=='5'%>按收藏数降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/if%>
            <%if params.recommendtype == '1'%>
            <%each data as item%>
            <div class="vui-goods-item" data-goodsid="<%item.goods_id%>">
                <div class="image">
                    <img src="<%item.pic_cover_mid%>">
                </div>
                <div class="detail">
                    <div class="name"><%item.goods_name%></div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥<%item.price%></span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_shop">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-shop">
            <div class="vui-shop-title">——<span class="text"><%params.title%></span>——</div>
            <%if params.recommendtype == '0'%>
            <div class="vui-shop-list">
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
            </div>
            <%else%>
            <div class="vui-shop-list">
                <%each data as item%>
                <div class="vui-shop-item">
                    <img src="<%item.pic_cover%>">
                </div>
                <%/each%>
            </div>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_listmenu">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-cell-group vui-cell-click" style="margin-top: <%style.margintop%>px; background-color: <%style.background%>;">
            <%each data as item%>
                <div class="vui-cell">
                    <%if item.iconclass%>
                        <div class="vui-cell-icon" style="color: <%style.iconcolor%>;"><i class="v-icon <%item.iconclass%>"></i></div>
                    <%/if%>
                    <div class="vui-cell-text" style="color: <%style.textcolor%>;"><%item.text%></div>
                    <div class="vui-cell-remark" style="color: <%style.remarkcolor%>;"><%item.remark%></div>
                    <div class="vui-cell-right"><i class="icon icon-right-arrow"></i></div>
                </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_richtext">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-richtext" style="padding: <%style.padding%>px;">
            <%if params.content%>
            <%=decode(params.content)%>
            <%else%>
            <p><span style="font-size: 20px;">这里是『富文本』区域</span></p>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_shop_head">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-shop_head">
            <div class="box">
                <i class="icon v-icon-menu1"></i>
                <%if style.backgroundimage%>
                    <img src="<%style.backgroundimage%>" class="bg">
                    <img src="/public/platform/images/custom/shop_head_default_0<%params.styletype%>.png" class="img">
                <%else%>
                    <img src="/public/platform/images/custom/default/shop-head-0<%params.styletype%>.jpg" class="bg">
                    <img src="/public/platform/images/custom/shop_head_default_0<%params.styletype%>.png" class="img">
                <%/if%>
            </div>
            <div class="foot">
                <span class="item"><i class="icon icon-search"></i>搜索</span>
                <span class="item">全部商品</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_fixed">
    <div class="fixed nodelete" data-itemid="<%itemid%>">
        <img src="/public/admin/images/custom/detail_default.png">
    </div>
</script>
<script type="text/html" id="tpl_show_member_fixed">
    <div class="fixed nodelete" data-itemid="<%itemid%>">
        <img src="/public/admin/images/custom/member_default.png">
    </div>
</script>
<script type="text/html" id="tpl_show_commission_fixed">
    <div class="fixed nodelete" data-itemid="<%itemid%>">
        <img src="/public/admin/images/custom/commission_default.png">
    </div>
</script>
<script type="text/html" id="tpl_show_detail_banner">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-banner">
            <div class="img">
                <img src="/public/platform/images/custom/default/goods-3.jpg">
            </div>
            <div class="indicator <%style.shape%> <%style.position%>">
                <span class="active" style="background: <%style.color%>"></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_info">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-info" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <div class="info">
                <div class="price-group">
                    <div class="sale">
                        <span class="price" style="color:<%style.pricecolor%>">¥1 </span>
                    </div>
                    <div class="market" style="color:<%style.pricelightcolor%>">¥ 1</div>
                </div>
                <div class="name-group" style="color:<%style.titlecolor%>">商品名称</div>
            </div>
            <div class="freight-sales">
                <span class="freight">运费：包邮</span>
                <span class="sales">销量：99笔</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_promote">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-promote" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <%each data as item%>
            <%if item.key == 'fullcut'%>
            <div class="item" >
                <div class="title" style="color:<%style.titlecolor%>">促销</div>
                <div class="value">
                    <span>满减</span>
                    <span>满赠</span>
                    <span>满邮</span>
                </div>
                <div class="right-icon">
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
            <%/if%>
            <%if item.key == 'coupon'%>
            <div class="item">
                <div class="title" style="color:<%style.titlecolor%>">优惠</div>
                <div class="value coupon-value">
                    <span>优惠券|¥5</span>
                    <span>优惠券|5折</span>
                </div>
                <div class="right-icon">
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
            <%/if%>
            <%if item.key == 'rebate'%>
            <div class="item">
                <div class="title" style="color:<%style.titlecolor%>">返利</div>
                <div class="value">
                    <span>返佣金</span>
                    <span>返积分</span>
                </div>
                <div class="right-icon">
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
            <%/if%>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_specs">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-specs" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <div class="item">
                <div class="title" style="color:<%style.titlecolor%>">规格</div>
                <div class="value" style="color:<%style.nocurrentcolor%>">请选择规格</div>
                <div class="right-icon">
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_delivery">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-delivery" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <div class="item">
                <div class="title" style="color:<%style.titlecolor%>">配送</div>
                <div class="value" style="color:<%style.nocurrentcolor%>">请选择配送地址</div>
                <div class="right-icon">
                    <span class="text">切换</span>
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_service">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-service" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <div class="item">
                <div class="value">
                    <%each data as item%>
                    <div class="value-item">
                        <img src="<%item.imgurl%>">
                        <span style="color:<%style.titlecolor%>"><%item.title%></span>
                    </div>
                    <%/each%>
                </div>
                <div class="right-icon">
                    <i class="icon icon-right-arrow"></i>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_shop">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-shop" style="margin-top: <%style.margintop%>px;margin-bottom: <%style.marginbottom%>px;">
            <div class="info">
                <div class="left-info">
                    <div class="shop-logo">
                        <img src="http://iph.href.lu/70x32?text=logo">
                    </div>
                    <div class="name-score">
                        <div class="name" style="color: <%style.namecolor%>;">店铺名称</div>
                        <div class="score" style="color: <%style.starcolor%>;">
                            <i class="v-icon v-icon-rate-on"></i>
                            <i class="v-icon v-icon-rate-on"></i>
                            <i class="v-icon v-icon-rate-on"></i>
                            <i class="v-icon v-icon-rate-on"></i>
                            <i class="v-icon v-icon-rate-on"></i>
                        </div>
                    </div>
                </div>
                <div class="right-btn">
                    <button class="btn btn-sm" style="background: <%style.btncolor%>;color: <%style.btntextcolor%>;">全部商品</button>
                    <button class="btn btn-sm" style="background: <%style.btncolor%>;color: <%style.btntextcolor%>;">进入店铺</button>
                </div>
            </div>
            <div class="score-group">
                <div class="item">
                    <span style="color: <%style.titlecolor%>;">描述</span>
                    <span style="color: <%style.scorecolor%>;">5.0</span>
                </div>
                <div class="item">
                    <span style="color: <%style.titlecolor%>;">物流</span>
                    <span style="color: <%style.scorecolor%>;">5.0</span>
                </div>
                <div class="item">
                    <span style="color: <%style.titlecolor%>;">服务</span>
                    <span style="color: <%style.scorecolor%>;">5.0</span>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_desc">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-detail-desc">这里是商品描述内容示例，不可编辑，仅能拖动排序</div>
    </div>
</script>
<!-- 视图 end -->
<script>
    require(['admin_custom','tpl','utilAdmin'],function(modal,tpl,util){

        $('.custom-header-list-warp').click(function(){
            $('.custom-header-list-box').fadeToggle(150);
        })
        $('.v-layout').addClass('mobileCustom')
        $('.addPage').click(function () {
            var html = '<form class="form-horizontal padding-15" >';
            html += '<div class="form-group"><label class="col-md-3 control-label">页面名称</label><div class="col-md-8"><input id="modal_template_name" type="text" class="form-control" /></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label">页面模版</label><div class="col-md-8"><select id="modal_template_type" class="form-control" >' +
                '<option value="1">商城首页</option>' +
                '<option value="2">店铺首页</option>' +
                '<option value="3">商品详情页</option>' +
                '<option value="4">会员中心</option>' +
                '<option value="5">分销中心</option>' +
                '<option value="6">自定义页</option>' +
                '</select></div></div>';
            html += '</form>';
            util.confirm('新增页面', html, function () {
                var template_type = this.$content.find("#modal_template_type").val();
                var template_name = this.$content.find("#modal_template_name").val();
                if (template_name && template_name !== ' ') {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo __URL("ADMIN_MAIN/config/createCustomTemplate"); ?>',
                        data: {
                            'type': template_type,
                            'template_name': template_name
                        },
                        success: function (res) {
                            if (res.code > 0) {
                                util.message(res.message, 'success', __URL("ADMIN_MAIN/config/customtemplate?id=" + res.data.id));
                            } else {
                                util.message(res.message, 'error');
                            }
                        }
                    });
                } else {
                    util.message('页面名称不能空！')
                    return false
                }

            })
        })
        modal.init({
            tpl: tpl,
            attachurl: 'ADMIN_IMG/custom/default/',
            type: <?php echo $type; ?>,    //页 面类型
            id: <?php echo $id; ?>,
            data: <?php echo !empty($template_data)?$template_data: "''"; ?>,
            tabbar: <?php echo !empty($tabbar)?$tabbar: "''"; ?>,
            copyright: <?php echo !empty($copyright)?$copyright: "''"; ?>,
            realm_ip:"<?php echo $real_ip; ?>",
            default_version:"<?php echo $default_version; ?>",
            shop_id : <?php echo !empty($shop_id)?$shop_id: 0; ?>
        });
    })
</script>

</body>
</html>