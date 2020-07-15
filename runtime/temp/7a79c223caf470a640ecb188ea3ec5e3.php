<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"template/admin/Shop/customTemplateList.html";i:1583811760;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            

<div class="mb-20 flex flex-pack-justify">
    <div class="">
        <a href="javascript:void(0);" class="btn btn-primary J-add" data-toggle="modal" data-target="#new_template"><i class="icon icon-add1"></i> 新增页面</a>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="模板名称" autocomplete="off">
        <span class="input-group-btn "><a class="btn btn-primary search_to">搜索</a></span>
    </div>
</div>

<ul class="nav nav-tabs v-nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#base" aria-controls="base" role="tab" data-toggle="tab"
                                              class="flex-auto-center">基础页</a></li>
    <li role="presentation"><a href="#diy" aria-controls="diy" role="tab" data-toggle="tab"
                               class="flex-auto-center">自定义页</a></li>
</ul>


<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th class="td-left">页面名称</th>
        <th>页面模版</th>
        <th id="status">状态</th>
        <th>更新时间</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody id="list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<div class="page clearfix">
    <div class="M-box3 m-style fr">
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

<script>
require(['utilAdmin','util'], function (utilAdmin,util) {
    $(function () {
        $('.btn-search').on('click', function () {
            LoadingInfo(1)
        })

        LoadingInfo(1);

        //切换基础、自定义页面
        $('a[href="#diy"],a[href="#base"]').on('shown.bs.tab', function () {
            LoadingInfo(1);
        })

        //设置使用
        $('#list').on('click', '.useCustomTemplate', function () {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            $.ajax({
                type: "post",
                url: __URL("ADMIN_MAIN/config/useCustomTemplate"),
                async: true,
                data: {
                    "id": id,
                    "type": type
                },
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        utilAdmin.message(data["message"], 'danger', LoadingInfo($('#page_index').val()));
                    }
                }
            })
        })

        //删除页面
        $('#list').on('click', '.removeTemplate', function () {
            var id = [];
            id.push($(this).attr('data-id'));
            utilAdmin.alert('确定要删除该模板？',function(){
                $.ajax({
                    type: "post",
                    url: __URL("ADMIN_MAIN/config/deleteCustomTemplateById"),
                    data: {
                        "id": id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            utilAdmin.message(data["message"],'success', function () {
                                LoadingInfo($('#page_index').val());
                            });
                        } else {
                            utilAdmin.message(data["message"], 'danger');
                        }
                    }
                })
            })
        })

        $('.J-add').on('click', function () {
            var url = "<?php echo __URL('ADMIN_MAIN/config/createWapTemplateDialog'); ?>";

            util.confirm2('新增页面', 'url:'+url,'col-md-10',function () {
                var template_type = this.$content.find("#modal_template_type").val();
                $.ajax({
                    type: 'post',
                    url: '<?php echo __URL("ADMIN_MAIN/config/createCustomTemplate"); ?>',
                    data: {
                        'type': template_type,
                        'template_name': template_name
                    },
                    success: function (res) {
                        if (res.code > 0) {
                            util.message(res.message, 'success', LoadingInfo($("#page_index").val()));
                        } else {
                            util.message(res.message, 'error');
                        }
                    }
                });

            })
        })
    })

    function LoadingInfo(page_index) {
        //console.log($('li[role=presentation].active').find('a').attr('aria-controls'));
        var template_type = $('li[role=presentation].active').find('a').attr('aria-controls');
        $("#page_index").val(page_index);
        $.ajax({
            type: "post",
            data: {
                "page_index": page_index,
                "page_size": $("#showNumber").val(),
                "template_type": template_type,
                "template_name": $("#search_text").val()
            },
            url: __URL("ADMIN_MAIN/config/customtemplatelist"),
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        html += '<tr>';
                        html += '<td class="td-left editChange">';
                        if (curr.is_default == 1) {
                            html += '<i class="icon icon-mo text-danger" title="默认模板"></i> ';
                        }
                        html += '<div class="editIcon-pa" style="width:auto;height:auto"><i class="icon icon-edit"></i></div>';
                        html += '<input type="text" class="editInput3" value='+ curr.template_name +' style="width: 40%; display: none;">';
                        html += '<input type="hidden" class="code" value='+ curr.id+'>';
                        html += '<input type="hidden" class="code_name" value='+ curr.template_name +'>';
                        html += '<span class="editSpan">'+curr.template_name + '</span></td>';
                        // html += curr.template_name + '</td>';
                        switch (curr.type) {
                            case 1:
                                html += '<td>商城首页</td>';
                                break;
                            case 2:
                                html += '<td>店铺首页</td>';
                                break;
                            case 3:
                                html += '<td>商品详情</td>';
                                break;
                            case 4:
                                html += '<td>会员中心</td>';
                                break;
                            case 5:
                                html += '<td>分销中心</td>';
                                break;
                            case 6:
                                html += '<td>自定义页面</td>';
                                break;
                            default:
                                html += '<td>商城首页</td>';
                        }

                        if (template_type == 'base') {
                            $("#status").show();
                            html += '<td>';
                            if (curr.in_use == 1) {
                                html += '<span class="label label-success">使用中</span>';
                            } else {
                                html += '<span class="label label-danger">未使用</span>';
                            }
                            html += '</td>';
                        } else {
                            $("#status").hide();
                        }

                        html += '<td>' + utilAdmin.timeStampTurnTime(curr.modify_time) + '</td>';
                        html += '<td class="fs-0 operationLeft">';
                        if (curr.in_use == 0 && curr.type != 6) {
                            html += '<a href="javascript:void(0);" class="btn-operation useCustomTemplate" data-id = \'' + curr.id + '\' data-type=\'' + curr.type + '\'>设为使用</a>';
                        }
                        if (curr.type == 6) {
                            //自定义页面
                            html += '<input type="text" style = "display:none;width:1px;border: 0px;" id="hidden_img_' + curr.id + '" value="' + __URLS("APP_MAIN/diy/" + curr.id) + '"/>';
                            html += '<a href="javascript:void(0)" data-clipboard-text="' + __URLS("APP_MAIN/diy/" + curr.id) + '"  class="btn-operation copy" data-id= "' + curr.id + '">复制链接</a>';
                            utilAdmin.copy();
                        }

                        html += '<a class="btn-operation" href="' + __URL("ADMIN_MAIN/config/customtemplate?id=" + curr.id) + '">装修</a>';
                        if (curr.is_default == 0 && curr.in_use == 0) {
                            html += '<a href="javascript:void(0);" class="btn-operation text-red1 removeTemplate" data-id=\'' + curr.id + '\'>删除</a>';
                        }

                        html += '</td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr align="center"><td colspan="5" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                $("#list").html(html);
                utilAdmin.tips();
                utilAdmin.page('.M-box3', data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }

    function createNewTemplate() {
        var template_type = $("#modal_template_type").val();
        var template_name = $("#modal_template_name").val();
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
                        //$("#new_template").modal('hide');
                        utilAdmin.message(res.message,'success', function () {
                            location.href = __URL('ADMIN_MAIN/config/customtemplate?id=' + res.data.id)
                        });
                    } else {
                        utilAdmin.message(res.message,'danger');
                    }
                }
            });
        } else {
            layer.msg('页面名称不能空！', 'danger');
            return false
        }
    }

    /**
     复制路径
     */
    function JScopy(id = '') {
        $('#hidden_img_' + id).show();
        var iurl = document.getElementById('hidden_img_' + id);
        iurl.select();
        document.execCommand("Copy");
        $('#hidden_img_' + id).hide();
        layer.msg('复制成功', {icon: 1, time: 1000});
    }

    $('body').on('click','.search_to',function(){
        LoadingInfo(1)
    });
    $('body').on('click','.addSure',function(){
        var type=$(this).attr('data-type');
    });
    
    //点击修改页面名称
    $("body").on("click",".editIcon-pa",function(){
        $(this).siblings(".editInput3").show();
        $(this).siblings(".editInput3").focus();
        $(this).siblings(".editSpan").hide();
    });
    $("body").on("blur",".editInput3",function(){
        $(this).hide();
        $(this).siblings(".editSpan").show();
        var code = $(this).siblings('.code').val();
        var default_code_name = $(this).siblings('.code_name').val();
        var code_name = $(this).val();
        if(default_code_name != code_name){
            $.ajax({
                type: "post",
                url: __URL("ADMIN_MAIN/config/editTemplateName"),
                data: {"id": code, "name":code_name},
                dataType: "json",
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo($('#page_index').val()));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        }
    });

})
</script>

</body>
</html>