<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"template/admin/System/albumPictureList.html";i:1583811758;s:24:"template/admin/base.html";i:1586931652;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>微商来 - 让更多的人帮你卖货！<?php endif; ?></title>
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
                    <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">
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
                                            <a href="http://bbs.vslai.com.cn/plugin.php?id=workorder" target="_blank"><i class="icon icon-list mr-10"></i>工单管理</a>
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
            

<input type="hidden" id="album_id" value="<?php echo $album_id; ?>" />
<div class="allDelAdd row album" style="margin-left: 0">
    <div class="fl">
        <span class="allDel AP-add1">全选</span>
        <span class="allDel del AP-add2">反选</span>
        <span class="allDel del AP-add3">批量删除</span>
        <span class="allDel del AP-add4">移动素材</span>
        <!--<button class="albumBorder">上传素材<input type="file" id="fileupload" class="input-file" name="file_upload" multiple="multiple"/></button>-->
        <a href="javascript:void(0);" style="margin-top: -5px" class="btn btn-info btn-file">上传图片<input class="fileupload" type="file" name="file_upload" multiple=""></a>
        <a href="javascript:void(0);" style="margin-top: -5px" class="btn btn-info btn-file" data-is_video="1">上传视频<input class="fileupload" type="file" name="file_upload"></a>
    </div>

    <div class="fr allSort">
        <span class="searchFr gl_search">
            <input type="text" class="searchs" id='search_text' placeholder="素材搜索">
            <button class="search_to">搜索</button>
        </span>

        <select class="fr allSort_sel" id="is_use">
            <option value ="0">全部</option>
            <option value ="1">未使用</option>
        </select>

        <span class="fr" style="padding-top: 4px">筛选条件：</span>

    </div>
</div>

<div>
    <ul class="clearfix albums" id="albumList">
    </ul>
    <div class="page clearfix">
        <div class="M-box3 m-style fr">
        </div>
    </div>
</div>
<!-- page end -->


<!-- 移动素材模态框（Modal） -->
<div class="modal fade" id="change_album_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">选择相册</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <input type="hidden" id="change_pic_id" />
                    <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label">相册名称</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="album_id" id="change_album_id">
                                <?php foreach($album_list as $vo): if($vo['is_default'] == '1'): ?>
                                <option value="<?php echo $vo['album_id']; ?>"selected="selected"><?php echo $vo['album_name']; ?></option>
                                <?php else: ?>
                                <option value="<?php echo $vo['album_id']; ?>"><?php echo $vo['album_name']; ?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary AP-add5">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

        </div>
        <div class="copyrights"><a href="http://q.url.cn/s/EPvXzVm" target="_blank" class="text-primary">在线客服</a> | <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>Copyright©2012-2019 微商来. All Rights Reserved 网站备案号：粤ICP备14084496号<?php endif; ?></div>
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

<!--<script src="ADMIN_JS/file_upload.js" type="text/javascript"></script>-->
<script type="text/javascript">
    require(['utilAdmin', 'util', 'ajax_file_upload'], function (utilAdmin, util, ajaxFileUpload) {
        $(function () {
            LoadingInfo(1);
        });
        function LoadingInfo(page_index) {
            $('#page_index').val(page_index ? page_index : '1');
            var album_id = $("#album_id").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/albumpicturelist'); ?>",
                data: {
                    "page_index": page_index,
                    "page_size": $("#showNumber").val(),
                    "album_id": album_id,
                    "is_use": $("#is_use").val(),
                    "pic_name": $("#search_text").val()
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<li class="thumbnail">';
                            html += '<div>';
                            html += '<label class="imgHref">';
                            if (data["data"][i]["is_wide"]) {
                                html += '<video width="100%" height="100%" id="img_' + data["data"][i]["pic_id"] + '" src="' + __IMG(data["data"][i]["pic_cover"]) + '"></video>';
                            } else {
                                html += '<img id="img_' + data["data"][i]["pic_id"] + '" src="' + __IMG(data["data"][i]["pic_cover"]) + '">';
                            }
                            html += '<input id="C' + data["data"][i]["pic_id"] + '" name="id[]" value="' + data["data"][i]["pic_id"] + '" type="checkbox" class="imgIpt decorate">';
                            html += '</label>';
                            html += '<p class="albumsDefa"><input id="' + data["data"][i]["pic_id"] + '" class="editInput1 AP-add12" readonly=""  value="' + data["data"][i]["pic_name"] + '" title="双击名称可以进行编辑" style="cursor:pointer;"><span class="AP-add11" title="双击名称可以进行编辑"><i class="icon icon-edit pull-right"></i></p>';
                            html += '<p class="editDel" style="min-height:102px">';
                            if (!data["data"][i]["is_wide"]) {
                                html += '<a href="javascript:void(0);" class="btn btn-default btn-info"><input accept="image/*" type="file" name="file_upload"  data-is_video="' + data["data"][i]["is_wide"] + '" id="file_' + data["data"][i]["pic_id"] + '" class="input-file AP-add10" size="1" data-pic_id = "' + data["data"][i]["pic_id"] + '" style="left:0;">替换上传</a>';
                            }
                            html += '<a href="javascript:void(0);" class="btn btn-default AP-add9" nc_type="dialog" dialog_title="转移相册" uri="rfghfdg" data-aid="' + data["data"][i]["album_id"] + '" data-pid="' + data["data"][i]["pic_id"] + '">移动素材</a>';
                            if (!data["data"][i]["is_wide"]) {
                                html += '<a href="javascript:void(0);" class="btn btn-default AP-add6" data-id="' + data["data"][i]["pic_id"] + '">设为封面</a>';
                            }
                            html += '<a href="javascript:void(0)" class="btn btn-default AP-add7" data-id="' + data["data"][i]["pic_id"] + '">删除素材</a>';
                            html += '<a href="JavaScript:void(0);" class="btn btn-default AP-add8" data-id="' + data["data"][i]["pic_id"] + '">复制链接</a><div style="text-indent: -999em;height: 2px;"><input type="text" id="hidden_img_' + data["data"][i]["pic_id"] + '" value="' + __IMG(data["data"][i]["pic_cover"]) + '"/></div>';
                            html += '</p>';
                            html += '</div>';
                            html += '</li>';
                        }
                    } else {
                        html += '<div class="empty-box">暂无符合条件的数据记录</div>';
                    }
                    $("#albumList").html(html);
                    utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
                }
            });
        }

// 反选
        function switchAll() {
            $('input[type="checkbox"]').each(function () {
                if ($(this).prop("checked") == true) {
                    $(this).prop("checked", false);
                } else {
                    $(this).prop("checked", true);
                }
            });
        }

//批量操作
        function submit_form(type) {
            if (type != 'move') {
                $('#batchClass').hide();
            }
            var id = '';
            $('input[type=checkbox]:checked').each(function () {
                if (!isNaN($(this).val())) {
                    id = $(this).val() + "," + id;
                }
            });
            if (id == '') {
                utilAdmin.message('请选择素材！');
                return false;
            } else {
                id = id.substring(0, id.length - 1);
            }
            if (type == 'del') {
                deletePicture(id);
            } else if (type == "changealbum") {
                var album_id = $("#album_id").val();
                changeAlbumClassBox(album_id, id);
            }
        }

//删除素材
        function deletePicture(pic_id_array) {
            utilAdmin.alert('您确定要删除已选中素材吗?<br/>提示：已使用素材将不会被删除!', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('ADMIN_MAIN/system/deletepicture'); ?>",
                    data: {"pic_id_array": pic_id_array},
                    dataType: "json",
                    success: function (data) {
                        if (data['code'] > 0) {
                            utilAdmin.message(data["message"], 'success', function () {
                                LoadingInfo($('#page_index').val());
                            });
                        } else {
                            utilAdmin.message('部分素材正在商品中使用，没有被删除', 'info', function () {
                                LoadingInfo($('#page_index').val());
                            });
                        }
                    }
                });
            })
        }

//替换上传
        /**
         * 上传文件
         * @param fileid 当前input file类型
         * @param data 传输的数据 file_path属性必传
         * @source admin pc sourcel
         */
        function uploadFile(fileid, data, callBack, source) {
            var dom = document.getElementById(fileid);
            var file = dom.files[0];//File对象;
            if (validationFile(file, source)) {
                $.ajaxFileUpload({
                    url: __URL(ADMINMAIN + '/upload/uploadfile'), //用于文件上传的服务器端请求地址
                    secureuri: false, //一般设置为false
                    fileElementId: fileid, //文件上传空间的id属性  <input type="file" id="file" name="file" />
                    dataType: 'json', //返回值类型 一般设置为json
                    data: data,
                    async: false,
                    contentType: "text/json;charset=utf-8",
                    success: function (res) { //服务器成功响应处理函数
                        callBack.call(this, res);
                    }
                });
            }
        }

        /**
         * 验证文件是否可以上传
         * @param file JS DOM文件对象
         * @source admin pc sourcel
         */
        function validationFile(file, source) {
            var fileTypeArr = ['application/php', 'text/html', 'application/javascript', 'application/msword', 'application/x-msdownload', 'text/plain'];
            if (null == file)
                return false;

            if (!file.type) {
                if (source == 1)
                    layer.msg("文件类型不合法");

                else if (source == "pc")
                    $.msg("文件类型不合法");

                else
                    showTip("文件类型不合法", "warning");

                return false;
            }

            var flag = false;
            for (var i = 0; i < fileTypeArr.length; i++) {
                if (file.type == fileTypeArr[i]) {
                    flag = true;
                    break;
                }
            }

            if (flag) {
                if (source == 1)
                    layer.msg("文件类型不合法");

                else if (source == "pc")
                    $.msg("文件类型不合法");

                else
                    showTip("文件类型不合法", "warning");

                return false;
            }

            return true;
        }
        function change_photo(event) {
            var fileid = $(event).attr("id");
            var pic_id = $(event).data("pic_id");
            var is_video = $(event).data("is_video");
            var album_id = Number($("#album_id").val());
            var data = {
                "album_id": album_id,
                "type": "1,2,3,4",
                "pic_id": pic_id
            };
            if (is_video) {
                var data = {
                    "album_id": album_id,
                    "type": "",
                    "pic_id": pic_id,
                    "file_type": 1
                };
            }
            uploadFile(fileid, data, function (res) {
                if (res.code > 0) {
                    utilAdmin.message(res.message, 'success', function () {
                        LoadingInfo($('#page_index').val());
                    });
                } else {
                    utilAdmin.message(res.message, 'danger');
                }
            });
        }

//控制素材名称input焦点可编辑
        function _focus(o) {
            var name;
            obj = o;
            name = obj.val();
            obj.removeAttr("readonly");
            obj.attr('class', 'editInput2');
            obj.select();
            obj.blur(function () {
                if (name != obj.val()) {
                    _save(this);
                } else {
                    obj.attr('class', 'editInput1');
                    obj.attr('readonly', 'readonly');
                }
            });
        }

        function _save(obj) {
            var pic_id = obj.id;
            var pic_name = obj.value;
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/modifyalbumpicturename'); ?>",
                data: {"pic_id": pic_id, "pic_name": pic_name},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success', function () {
                            LoadingInfo($('#page_index').val());
                        });
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            })
        }

        function changeAlbumClassBox(album_id, pic_id) {
            $('#change_album_class').modal('show');
            $("#change_album_id").val(album_id);
            $("#change_pic_id").val(pic_id);
        }

        function changeAlbumClass() {
            var pic_id = $("#change_pic_id").val();
            var album_id = $("#change_album_id").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/modifyalbumpictureclass'); ?>",
                data: {"pic_id": pic_id, "album_id": album_id},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        $('#change_album_class').modal('hide');
                        utilAdmin.message(data["message"], 'success', function () {
                            LoadingInfo(1);
                        });
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            });
        }
        /**
         复制素材路径
         */
        function JScopy(id) {
            var url = $("#img_" + id).attr('src');
            if (url.indexOf("http://") == -1 && url.indexOf("https://") == -1) {
                var domain = document.domain;
                url = "http://" + domain + url;
            }
            $("#hidden_img_" + id).val(url);
            var iurl = document.getElementById('hidden_img_' + id);
            iurl.select();
            document.execCommand("Copy");
            utilAdmin.message("复制成功", 'success');
        }
        function changeAlbumClassCover(pic_id) {
            var album_id = $("#album_id").val();
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/modifyalbumclasscover'); ?>",
                data: {"pic_id": pic_id, "album_id": album_id},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success');
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            });
        }
        $('.btn-file').click(function () {
            var album_id = $("#album_id").val();
            var is_video = $(this).data('is_video');
            var dataAlbum = {
                "album_id": album_id,
                "type": "1,2,3,4"
            };
            if (is_video) {
                dataAlbum = {
                    "album_id": album_id,
                    "type": "",
                    "file_type": 1
                };
            }
            var url = "<?php echo __URL('ADMIN_MAIN/upload/uploadFile'); ?>";
            utilAdmin.AlbumimgUpload(url, dataAlbum, function (file_url) {
                LoadingInfo(1);
            });
        })


        $('body').on('click', '.search_to', function () {
            LoadingInfo(1);
        });
        $('body').on('change', '#is_use', function () {
            LoadingInfo(1);
        });
        $('body').on('click', '.AP-add1', function () {
            $('input[type="checkbox"]').each(function () {
                $(this).prop("checked", true);
            });
        });
        $('body').on('click', '.AP-add2', function () {
            switchAll();
        });
        $('body').on('click', '.AP-add3', function () {
            submit_form('del');
        });
        $('body').on('click', '.AP-add4', function () {
            submit_form('changealbum');
        });
        $('body').on('click', '.AP-add5', function () {
            changeAlbumClass();
        });
        $('body').on('click', '.AP-add6', function () {
            var id = $(this).attr('data-id');
            changeAlbumClassCover(id);
        });
        $('body').on('click', '.AP-add7', function () {
            var id = $(this).attr('data-id');
            deletePicture(id);
        });
        $('body').on('click', '.AP-add8', function () {
            var id = $(this).attr('data-id');
            JScopy(id);
        });
        $('body').on('click', '.AP-add9', function () {
            var aid = $(this).attr('data-aid');
            var pid = $(this).attr('data-pid');
            changeAlbumClassBox(aid, pid);
        });
        $('body').on('change', '.AP-add10', function () {
            var _this = $(this);
            change_photo(_this);
        });
        $('body').on('dblclick', '.AP-add11', function () {
            _focus($(this).prev());
        });
        $('body').on('dblclick', '.AP-add12', function () {
            $(this).unbind();
            _focus($(this));
        });


    })
</script>

</body>
</html>