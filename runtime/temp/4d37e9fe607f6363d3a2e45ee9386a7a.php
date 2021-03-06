<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"template/admin/System/returnSetting.html";i:1583811758;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            

<header class="panel-heading font-bold"> 商家地址设置</header>
<div class="panel-body">
	<div id="returnsetting_list">
		<div class="mb-10">
        	<a class="btn btn-primary" href="javascript:addressEdit(0);"><i class="icon icon-add1"></i> 添加模板</a>
     	</div>
     	<table class="table v-table table-auto-center">
            <thead>
                <tr>
                    <th>发货人</th>
                    <th>电话</th>
                    <th>发货地址</th>
                    <th>详细地址</th>
                    <th>是否默认</th>
                    <th class="col-md-2">操作</th>
                </tr>
            </thead>
            <tbody id="address_list">
            </tbody>
        </table>
	</div>
    <form action="" class="form-horizontal widthFixedForm hide" id="returnsetting_edit" name='form'>
		<div class="form-group">
			<label class="col-md-2 control-label"><span class="text-bright">*</span>收货人</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="return_consigner" id="return_consigner" value="" required >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label"><span class="text-bright">*</span>联系方式</label>
			<div class="col-md-5">
				<input type="text" name="return_mobile" class="form-control" isPhone="true" id="return_mobile"  value="" required>
			</div>
		</div>
	   <div class="form-group">
            <label class="col-md-2 control-label"><span class="text-bright">*</span>收货地区</label>
            <div class="col-md-5">
                <div class="area-form-group">
                    <select name="province" id="return_provinces"  class="form-control getProvince" min="0" required title=" ">
                            <option value="-1">请选择省...</option>
                    </select>
                    <select name="city" id="return_cities"  class="form-control getSelCity" min="0" required title=" ">
                            <option value="-1">请选择市...</option>
                    </select>
                    <select name="district" id="return_districts" class="form-control" min="0" required title=" ">
                            <option value="-1">请选择区...</option>
                    </select>
                </div>
            </div>
        </div>
		<div class="form-group">
			<label class="col-md-2 control-label"><span class="text-bright">*</span>详细地址</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="return_address" id="return_address" value=""  required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">邮政编码</label>
			<div class="col-md-5">
				<input type="text" class="form-control" name="return_zip_code" id="return_zip_code" value="">
			</div>
		</div>
		<div class="form-group">
             <label class="col-md-2 control-label">是否默认</label>
             <div class="col-md-5">
                 <label class="radio-inline">
                     <input type="radio" name="return_is_default" value="1" id="return_is_default">是
                 </label>
                 <label class="radio-inline">
                     <input type="radio" name="return_is_default" value="0" id="return_is_default2">否
                 </label>
             </div>
         </div>
		<div class="form-group"></div>
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<button class="btn btn-primary add" type="submit">保存</button>
				<a href="javascript:void(0);" class="btn btn-default address_return_list">返回</a>
			</div>
		</div>
		<input type="hidden" id="return_id" name="return_id" value="0">
		<input type="hidden" id="pid" name="pid" value="">
        <input type="hidden" id="cid" name="cid" value="">
        <input type="hidden" id="aid" name="aid" value="">
    </form>
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
    /**
     *添加物流公司
     **/
    require(['utilAdmin'], function (utilAdmin) {
    	loading();
        function loading(){
            $.ajax({
                type:"post",
                url : "<?php echo __URL('ADMIN_MAIN/config/getShopReturnList'); ?>",
                async : true,
                success : function(data) {
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr>';
                            html += '<td>' + data[i]["consigner"] + '</td>';
                            html += '<td>' + data[i]["mobile"] + '</td>';
                            html += '<td>' + data[i]["province_name"] + data[i]["city_name"] + data[i]["dictrict_name"] + '</td>';
                            html += '<td>' + data[i]["address"] + '</td>';
                            html += data[i]["is_default"]==1 ? '<td><span class="label label-success">是</span></td>' : '<td><span class="label label-danger">否</span></td>';
                            html += '<td>';
                            html += '<a class="btn-operation" href="javascript:addressEdit(' + data[i]["return_id"] + ');">编辑</a>';
                            html += '<a class="btn-operation address_return_delete" href="javascript:void(0);" data-return_id="' + data[i]["return_id"] + '">删除</a>';
                            html += '</td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="6">暂无数据记录</td></tr>';
                    }
                    $("#address_list").html(html);
                }
            });
        }
        //商家地址设置
        var flag = false;
        utilAdmin.validate($('.form-horizontal'),function(form){
        	var return_id = $("#return_id").val();
            var consigner = $("#return_consigner").val();
            var mobile = $("#return_mobile").val();
            var province = $("#return_provinces").val();
            var city = $("#return_cities").val();
            var district = $("#return_districts").val();
            var address = $("#return_address").val();
            var zip_code = $("#return_zip_code").val();
            var is_default = $('input[name=return_is_default]:checked').val();
            if(flag){
                return false;
            }
            flag = true;
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/config/returnSetting'); ?>",
                data: {
                	'return_id' : return_id,
                	'consigner' : consigner,
                    'mobile' : mobile,
                    'province' : province,
                    'city': city,
                    'district' : district,
                    'address': address,
                    'zip_code': zip_code,
                    'is_default' : is_default
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                    	utilAdmin.message(data["message"],'success', function () {
                        	loading();
                        	$('#returnsetting_list').removeClass('hide');
                        	$('#returnsetting_edit').addClass('hide');
                        	flag = false;
   	                 	});
                    } else {
                    	utilAdmin.message(data["message"],'danger', function () {
                        	flag = false;
   	                 	});
                    }
                }
            });
        });
		//返回地址
        $('.address_return_list').click(function(){
        	$('#returnsetting_list').removeClass('hide');
        	$('#returnsetting_edit').addClass('hide');
        });
        //删除地址
        $('body').on('click','.address_return_delete',function(){
        	var return_id = $(this).data('return_id');
        	utilAdmin.alert('确定删除该地址？', function(){
                 $.ajax({
                     type:"post",
                     url:"<?php echo __URL('ADMIN_MAIN/config/returnDelete'); ?>",
                     data:{"return_id" : return_id},
                     async:true,
                     success:function (data) {
                         if (data["code"] > 0) {
                        	 utilAdmin.message(data["message"],'success', function () {
                        		 loading();
         	                });
                         } else {
                        	 utilAdmin.message(data["message"],'danger');
                         }
                     }
                 });
             });
        });
    })
    //编辑地址
    function addressEdit(id){
    	$("#return_id").val('0');
        $("#return_consigner").val('');
        $("#return_mobile").val('');
        $("#return_provinces").val('-1');
        $("#return_cities").val('-1');
        $("#return_districts").val('-1');
        $("#return_address").val('');
        $("#return_zip_code").val('');
        $('#pid').val('-1');
        $('#cid').val('-1');
        $('#aid').val('-1');
        $("#return_is_default").removeAttr('checked');
        $("#return_is_default2").removeAttr('checked');
    	if(id>0){
            $.ajax({
                type:"post",
                url:"<?php echo __URL('ADMIN_MAIN/config/getShopReturn'); ?>",
                data:{"return_id" : id},
                async:true,
                success:function (data) {
                    if (data) {
                    	$("#return_id").val(data.return_id);
                        $("#return_consigner").val(data.consigner);
                        $("#return_mobile").val(data.mobile);
                        $("#return_provinces").val(data.province);
                        $("#return_cities").val(data.city);
                        $("#return_districts").val(data.district);
                        $("#pid").val(data.province);
                        $("#cid").val(data.city);
                        $("#aid").val(data.district);
                        $("#return_address").val(data.address);
                        $("#return_zip_code").val(data.zip_code);
                        if(data.is_default==1){
                        	$("#return_is_default").prop('checked','true');
                        }else{
                        	$("#return_is_default2").prop('checked','true');
                        }
                        getAddress();
                    }
                }
            });
    	}else{
    		$("#return_is_default2").prop('checked','true');
    		getAddress();
    	}
    	$('#returnsetting_list').addClass('hide');
    	$('#returnsetting_edit').removeClass('hide');
    }
    function getAddress(){
        var pid=0,cid=0,aid=0;
        initProvince("#return_provinces");
        function initProvince(obj){
            pid = $('#pid').val();
            $.ajax({
                type : "post",
                url : "<?php echo __URL('ADMIN_MAIN/order/getProvince'); ?>",
                dataType : "json",
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            if(pid == data[i].province_id){
                                str += '<option selected value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }
                        }
                        $(obj).append(str);
                    }
                }
            });
        }
        getProvince();
        //选择省份弹出市区
        $('.getProvince').on('change', function () {
            var id = $('#return_provinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo __URL('ADMIN_MAIN/order/getCity'); ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#return_cities').html(str);
                    }
                }
            });
        })
        function getProvince() {
            var id = $('#return_provinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo __URL('ADMIN_MAIN/order/getCity'); ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#return_cities').html(str);
                    }
                }
            });
        };
        getSelCity();
        //选择市区弹出区域
        $('.getSelCity').on('change', function () {
            var id = $('#return_cities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('ADMIN_MAIN/order/getDistrict'); ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#return_districts').html(str);
                    }
                }
            });
        })
        function getSelCity() {
            var id = $('#return_cities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo __URL('ADMIN_MAIN/order/getDistrict'); ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#return_districts').html(str);
                    }
                }
            });
        }
    }
</script>

</body>
</html>