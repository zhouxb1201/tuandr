<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:35:"template/admin/Goods/goodsList.html";i:1587970148;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            
<form class="v-filter-container">
    <div class="filter-fields-wrap">
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label">商品分类</label>
                    <div class="v__controls">
                        <input type="text" id="select_cname" name="select_cname" class="v__control_input J-selectCategory" placeholder="请选择分类" autocomplete="off">
                    </div>
                    <input type="hidden" id="category_id_1" name="category_id_1" autocomplete="off">
                    <input type="hidden" id="category_id_2" name="category_id_2" autocomplete="off">
                    <input type="hidden" id="category_id_3" name="category_id_3" autocomplete="off">
                    <input type="hidden" id="select_name_hidden" name="select_name_hidden" autocomplete="off">
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品名称</label>
                    <div class="v__controls">
                        <input type="text" class="v__control_input" id="goods_name" placeholder="请输入商品名称" autocomplete="off">
                    </div>
                </div>
                <div class="v__control-group">
                    <label class="v__control-label">商品标签</label>
                    <div class="v__controls">
                    	<div class="checkbox_three" style="margin-top: 6px;">
                            <label class="checkbox-inline"><input type="checkbox" name="label_list" value="1">推荐</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="2">新品</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="3">热卖</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="4">促销</label>
	                        <label class="checkbox-inline"><input type="checkbox" name="label_list" value="5">包邮</label>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-item clearfix">
            <div class="filter-item__field">
                <div class="v__control-group">
                    <label class="v__control-label"></label>
                    <div class="v__controls">
                        <a class="btn btn-primary search"><i class="icon icon-search"></i>搜索</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--tab栏切换-->
<div class="infoTab">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#all" data-toggle="tab" class="gl-add1" >
                <p>全部</p>
                <p class="J-all">(0)</p>
            </a>
        </li>
        <li>
            <a href="#selling" data-toggle="tab" class="gl-add2">
                <p>出售中</p>
                <p class="J-sale">(0)</p>
            </a>
        </li>
        <li>
            <a href="#warehouse" data-toggle="tab" class="gl-add3">
                <p>仓库中</p>
                <p class="J-audit">(0)</p>
            </a>
        </li>
        <li>
            <a href="#selled" data-toggle="tab" class="gl-add4">
                <p>已售罄</p>
                <p class="J-sold_out">(0)</p>
            </a>
        </li>
        <li>
            <a href="#warehouseAlert" data-toggle="tab" class="gl-add5">
                <p>库存预警</p>
                <p class="J-stock_warning">(0)</p>
            </a>
        </li>
        <?php if($shop_info['base_info']['shop_audit']): ?>
        <li>
            <a href="#waitaudit" data-toggle="tab" class="gl-add13">
                <p>待审核</p>
                <p class="J-waitaudit">(0)</p>
            </a>
        </li>
        <li>
            <a href="#unaudit" data-toggle="tab" class="gl-add14">
                <p>审核不通过</p>
                <p class="J-unaudit">(0)</p>
            </a>
        </li>
        <?php endif; ?>
        <li>
            <a href="#shelf" data-toggle="tab" class="gl-add15">
                <p>违规下架</p>
                <p class="J-shelf">(0)</p>
            </a>
        </li>
    </ul>
    <!--全选删除添加轮播-->
    <div class="allDelAdd clearfix" style="margin-top:10px">
        <div class="pull-left">
            <a href="<?php echo __URL('ADMIN_MAIN/goods/addgoods'); ?>" class="anno_goods"><i class="icon icon-add1"></i> 发布商品</a>
            <!--<label for="chek_all">
                <span class="allDel">
                    <label class="checkbox-inline">
                        <input type="checkbox" class="all decorate gl-add6" name='chek_all' id="chek_all">&nbsp;全选
                    </label>
                </span>
            </label>-->
            <?php if(($goodhelperStatus==1)): ?>
	        <a href="<?php echo __URL('ADMIN_MAIN/addonslist/menu_addonslist?addons=goodImportHelper'); ?>" class="btn btn-success" target="_blank">商品助手导入</a>
	        <?php endif; ?>
            <a class="allDel del gl-add7" href="javascript:void(0)">上架</a>
            <a class="allDel del gl-add8" href="javascript:void(0)">下架</a>
            <a class="allDel del gl-add9" href="javascript:void(0)">删除</a>
        </div>
    </div>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="all"></div>
        <div class="tab-pane fade" id="selling"></div>
        <div class="tab-pane fade" id="warehouse"></div>
        <div class="tab-pane fade" id="selled"></div>
        <div class="tab-pane fade" id="warehouseAlert"></div>
        <div class="tab-pane fade" id="waitaudit"></div>
        <div class="tab-pane fade" id="unaudit"></div>
        <div class="tab-pane fade" id="shelf"></div>
        <input id="type" type="hidden" value="0">
        <div class="page clearfix">
            <div class="M-box3 m-style fr">
            </div>
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

<script type="text/javascript">
require(['utilAdmin'], function (utilAdmin) { 
    $(function () {
        LoadingInfo(1);
    })
    function select_goods(type) {
        $('#type').val(type);
        LoadingInfo(1);
    }

    function LoadingInfo(page_index) {
        $('#page_index').val(page_index ? page_index : '1');
        $("#chek_all").prop("checked", false);
        var start_date = $("#startDate").val();
        var type = $("#type").val();
        var end_date = $("#endDate").val();
        var state = $("#state").val();
        var goods_name = $("#goods_name").val();
        var goods_code = $("#goods_code").val();
        var category_id_1 = $("#category_id_1").val();
        var category_id_2 = $("#category_id_2").val();
        var category_id_3 = $("#category_id_3").val();
        var selectGoodsLabelId = $("#selectGoodsLabelId").val();
        var supplier_id = $("#supplier_id").val();
        var is_distribution = $("#is_distribution").val();
        var is_bonus = $("#is_bonus").val();
        var label_list = '';
        $("input[name ='label_list']:checked").each(function(){
        	label_list += $(this).val()+',';
        });
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/goods/goodslist'); ?>",
            data: {
                "page_index": page_index,
                "start_date": start_date,
                "end_date": end_date,
                "state": state,
                "goods_name": goods_name,
                "code": goods_code,
                "category_id_1": category_id_1,
                "category_id_2": category_id_2,
                "category_id_3": category_id_3,
                "selectGoodsLabelId": selectGoodsLabelId,
                "supplier_id": supplier_id,
                "is_distribution": is_distribution,
                "is_bonus": is_bonus,
                "label_list": label_list,
                "type": type
            },
            success: function (data) {
                var distributionStatus = <?php echo json_encode($distributionStatus); ?>;
                var html = '';
                html += '<table class="table v-table">';
                html += '<thead>';
                html += '<tr>';
                html += '<th><input type="checkbox" name="chek_all" id="chek_all"></th>';
                html += '<th>ID</th>';
                html += '<th class="col-md-4">商品</th>';
                html += '<th>售价</th>';
                html += '<th>原价</th>';
                html += '<th>库存</th>';
                html += '<th>状态</th>';
                html += '<th>原因</th>';
                html += '<th class="col-md-2 pr-14 operationLeft">操作</th>';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody class="trs">';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        var editspan = '';
                        var title = 'title = "规格商品暂不支持快速编辑价格"';
                        if (data["data"][i]["no_sku"]) {
                            editspan = '<span class="editIcon"><i class="icon icon-edit"></i></span>';
                            title = '';
                        }
                        else{
                            editspan = '<span class="editIcon1"><i class="icon icon-edit"></i></span>';
                        }
                        html += '<tr>';
                        html += '<td><input class="decorate" type="checkbox" value="' + data["data"][i]["goods_id"] + '" name="sub" data-state="' + data["data"][i]["state"] + '"></td>';
                        html += '<td>' + data["data"][i]["goods_id"] + '</td>';
                        html += '<td class="picword_td editChange">';

                        html += '<div class="media text-left">';
                        html += '<div class="editIcon-pa">';
                        html += '<i class="icon icon-edit"></i>';
                        html += '</div>';
                        html += '<div class="media-left"><p><img src="' + __IMG(data["data"][i]["pic_cover_mid"]) + '" style="width:60px;height:60px;"></p></div>';
                        html += '<div class="media-body break-word">';
                        html += '<div class="line-2-ellipsis line-title">';
                        html += '<a href="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '" target="_blank" class="a-goods-title J-title">' + data["data"][i]["goods_name"] + '</a>';
                        html += '<textarea class="editTextarea" data-goods-id="' + data["data"][i]["goods_id"] + '" data-type="goods_name" style="height:40px;width: 300px;display: none">' + data["data"][i]["goods_name"] + '</textarea>';
                        html += '</div>';
                        html += '<div class="small-muted line-2-ellipsis"> </div>';
                        html += '</div>';
                        if (data["data"][i]['introduction'] != '' && data["data"][i]['introduction'] != undefined) {
                            html += '<div class="small-muted line-2-ellipsis">' + data["data"][i]['introduction'] + '</div>';
                        }
                        html += '</div></div>'; 
                        html += '</td>';
                        html += '<td class="goodsEdit" ><span class="editSpan J-span" ' + title + ' data-toggle="tooltip" data-trigger="hover">￥' + data["data"][i]["price"] + '</span>';
                        html += '<input type="text" class="editInput3" data-goods-id="' + data["data"][i]["goods_id"] + '" data-type="price" value="' + data["data"][i]["price"] + '" style="width: 30%;display: none">';
                        html += editspan;
                        html += '</td>';
                        html += '<td class="goodsEdit"><span class="editSpan J-span" ' + title + ' data-toggle="tooltip" data-trigger="hover">￥' + data["data"][i]["market_price"] + '</span>';
                        html += '<input type="text" class="editInput3" data-goods-id="' + data["data"][i]["goods_id"] + '" data-type="market_price" value="' + data["data"][i]["market_price"] + '" style="width: 30%;display: none">';
                        html += editspan;
                        html += '</td>';
                        html += '<td class="goodsEdit"><span class="editSpan J-span" ' + title + ' data-toggle="tooltip" data-trigger="hover">' + data["data"][i]["stock"] + '</span>';
                        html += '<input type="text" class="editInput3" data-goods-id="' + data["data"][i]["goods_id"] + '" data-type="stock" value="' + data["data"][i]["stock"] + '" style="width: 30%;display: none">';
                        html += editspan;
                        html += '</td>';
                        if (data["data"][i]["state"] == 1) {
                            html += '<td><a href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '" class="label label-success J-offline">上架</a></td>';
                        } else if(data["data"][i]["state"] == 10){
                            html += '<td><a href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '" class="label label-danger">违规下架</a></td>';
                        } else if(data["data"][i]["state"] == 11){
                            html += '<td><a href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '" class="label label-warning J-online">待审核</a></td>';
                        } else if(data["data"][i]["state"] == 12){
                            html += '<td><a href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '" class="label label-danger J-online">审核不通过</a></td>';
                        } else {
                            html += '<td><a href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '" class="label label-danger J-online">下架</a></td>';
                        }
                        if(data["data"][i]["state"] == 10 || data["data"][i]["state"] == 12){
                            html += '<td>'+ data["data"][i]["illegal_reason"] +'</td>';
                        }else{
                            html += '<td>--</td>';
                        }
                        html += '<td class="fs-0 operationLeft">';
                        html += '<input type="text" style = "display:none;width:1px;border: 0px;" class="hidden_' + data["data"][i]["goods_id"] + '" value="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '"/>';          
                        html += '<a data-id="'+ data["data"][i]["goods_id"] +'" data-type="'+ data["data"][i]["promotion_type"] +'" data-name="'+ data["data"][i]["promotion_name"] +'" href="javascript:void(0)" class="btn-operation J-edit">编辑</a>';
                        // html += '<a href="javascript:void(0)" class="btn-operation copy" data-id="' + data["data"][i]["goods_id"] + '" data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '">复制链接</a>';
                        html +='<a class="btn-operation link-pr" href="javascript:void(0);" > <span>链接</span> <div class="link-pos"> <div class="link-arrow">' +
                            ' <form class="form-horizontal"> ' +
                            '<div class="form-group"> <label class="col-md-2 control-label">手机端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/wap/goods/detail/' + data["data"][i]["goods_id"]) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/wap/goods/detail/' + data["data"][i]["goods_id"]) + '">复制链接</span> </div> </div> </div>';

                        if('<?php echo $is_pc_use; ?>' == 1){
                            html += ' <div class="form-group"> <label class="col-md-2 control-label">电脑端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + __URLS('SHOP_MAIN/goods/goodsinfo&goodsid=' + data["data"][i]["goods_id"]) + '">复制链接</span> </div> </div> </div> ';
                        }
                        if('<?php echo $is_pc_use; ?>' == 1){
                            html += ' <div class="form-group"> <label class="col-md-2 control-label">小程序端</label> <div class="col-md-10"> <div class="input-group"> <input class="form-control" type="text" disabled value="' + 'pages/goods/detail/index?goodsId=' + data["data"][i]["goods_id"] + '"> <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="' + 'pages/goods/detail/index?goodsId=' + data["data"][i]["goods_id"] + '">复制链接</span> </div> </div> </div> ';
                        }
                        html += '</form> ' +
                            '<div class="flex link-flex"> ' +
                            '<div class="flex-1"> <div class="mb-04"><img src="'+ __URL('admin/goods/getGoodsDetailQr') +'?goods_id='+ data["data"][i]["goods_id"] +'&qr_type=1&wap_path=/wap/goods/detail/" style="width: 100px;height: 100px"></div> <p>(手机端二维码)</p> </div> ';
                        if('<?php echo $is_minipro; ?>' == 1){
                            html += '<div class="flex-1"> <div class="mb-04"><img src="'+ __URL('admin/goods/getGoodsDetailQr') +'?goods_id='+ data["data"][i]["goods_id"] +'&qr_type=2&mp_path=pages/goods/detail/index" style="width: 100px;height: 100px"></div> <p>(小程序二维码)</p> </div>';
                        }
                        html += ' </div> </div> </div> </a>';
                        html += '<a href="javascript:;" class="del gl-add12 btn-operation text-red1" data-id="' + data["data"][i]["goods_id"] + '">删除</a>';
                        utilAdmin.copy();
                        html += '</td>';
                        html += '</tr>';
                        html += '<tr class="title-tr"><td colspan="9" class="text-right" style="border-top:0;text-align: right;">';
                        if(data["data"][i]["is_distribution"]==1 && data["data"][i]["distribution_rule"]!=1 && distributionStatus==1){
                            html += '<span class="label label-skyBlue">参与分销</span>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_distribution"]==1 && data["data"][i]["distribution_rule"]==1 && distributionStatus==1){
                            html += '<span class="label label-skyBlue">参与分销并设置商品独立规则</span>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_recommend"]==1){
                                html += '<a href="javascript:void(0);" class="label label-red labels" data-label="recommend" data-id="'+data["data"][i]["goods_id"]+'">推荐</a>&nbsp;-&nbsp;';
                        }else{
                                html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="recommend" data-id="'+data["data"][i]["goods_id"]+'">推荐</a>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_new"]==1){
                                html += '<a href="javascript:void(0);" class="label label-red labels" data-label="new" data-id="'+data["data"][i]["goods_id"]+'">新品</a>&nbsp;-&nbsp;';
                        }else{
                                html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="new" data-id="'+data["data"][i]["goods_id"]+'">新品</a>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_hot"]==1){
                                html += '<a href="javascript:void(0);" class="label label-red labels" data-label="hot" data-id="'+data["data"][i]["goods_id"]+'">热卖</a>&nbsp;-&nbsp;';
                        }else{
                                html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="hot" data-id="'+data["data"][i]["goods_id"]+'">热卖</a>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_promotion"]==1){
                                html += '<a href="javascript:void(0);" class="label label-red labels" data-label="promotion" data-id="'+data["data"][i]["goods_id"]+'">促销</a>&nbsp;-&nbsp;';
                        }else{
                                html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="promotion" data-id="'+data["data"][i]["goods_id"]+'">促销</a>&nbsp;-&nbsp;';
                        }
                        if(data["data"][i]["is_shipping_free"]==1){
                                html += '<a href="javascript:void(0);" class="label label-red labels" data-label="shipping_free" data-id="'+data["data"][i]["goods_id"]+'">包邮</a>';
                        }else{
                                html += '<a href="javascript:void(0);" class="label label-grey labels" data-label="shipping_free" data-id="'+data["data"][i]["goods_id"]+'">包邮</a>';
                        }
                        html += '</td></tr>';
                    }
                } else {
                    html += '<tr align="center"><td colspan="9" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                html += '</tbody>';
                html += '</table>';
                $("div.tab-pane").html(html);
                $("div.active").html(html);
                utilAdmin.tips();
                utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }

//全选
    function CheckAll(event) {
        var checked = event.checked;
        $("div.active input[type = 'checkbox']").prop("checked", checked);
    }
    /**
     复制路径
     */
    function JScopy(id) {
        $('.hidden_' + id).show();
        var iurl = document.getElementsByClassName('hidden_' + id);
        iurl[0].select();
        document.execCommand("Copy");
        $('.hidden_' + id).hide();
        utilAdmin.message('复制成功',"success");
    }
//商品上架id合计
    function goodsIdCount(line) {
        var goods_ids = "";
        $("div.active input[type='checkbox']:checked").each(function () {
            if (!isNaN($(this).val())) {
                var state = $(this).data("state");
                goods_ids = $(this).val() + "," + goods_ids;
            }
        });
        goods_ids = goods_ids.substring(0, goods_ids.length - 1);
        if (goods_ids == "") {
            utilAdmin.message("请选择需要操作的记录");
            return false;
        }
        modifyGoodsOnline(goods_ids, line);
    }

//商品上下架
    function modifyGoodsOnline(goods_ids, line) {
        if (line == "online") {
            var url = "<?php echo __URL('ADMIN_MAIN/Goods/modifygoodsonline'); ?>";
            var lingStr = "上架";
        } else {
            var url = "<?php echo __URL('ADMIN_MAIN/Goods/modifygoodsoffline'); ?>";
            var lingStr = "下架";
        }
        $.ajax({
            type: "post",
            url: url,
            data: {"goods_ids": goods_ids},
            success: function (data) {
                if (data["code"] > 0) {
                    LoadingInfo($('#page_index').val());
                    utilAdmin.message("商品" + lingStr + "成功","success");
                    getgoodscount();
                }
            }
        })
    }

    function batchDelete() {
        var goods_ids = new Array();
        $("div.active input[type='checkbox']:checked").each(function () {
            if (!isNaN($(this).val())) {
                goods_ids.push($(this).val());
            }
        });
        if (goods_ids.length == 0) {
            utilAdmin.message("请选择需要操作的记录");
            return false;
        }
        deleteGoods(goods_ids);
    }

    function deleteGoods(goods_ids) {
        utilAdmin.alert('确定要删除吗？',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/deletegoods'); ?>",
                data: {"goods_ids": goods_ids.toString()},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        LoadingInfo($('#page_index').val());
                        utilAdmin.message(data["message"],"success", function () {
                            $("#chek_all").prop("checked", false);
                        });
                        getgoodscount();
                    }else{
                        utilAdmin.message(data["message"],"danger");
                    }
                }
            });
        })
    }

    function goodsCategoryThree(obj) {
        var parentId = $(obj).attr("category_id");
        var category_name = $(obj).text();
        $(".three ul li").not($(obj)).removeClass("selected");
        $(obj).addClass("selected");
        var goodsCategoryOne = $("#goodsCategoryOne").val();
        $("#goodsCategoryOne").val(goodsCategoryOne + '' + category_name);
        $("#category_id_3").val(parentId);
        $(".one").hide();
        $(".two").hide();
        $(".three").hide();
        $(".selectGoodsCategory").hide();
        $(".js-mask-category").hide();
        $(".selectGoodsCategory").css({
            'width': 218,
            'right': 580
        });
        $("#goodsCategoryOne").attr('is_show', 'false');
    }
    // 异步价格修改
    function goodListEdit() {
        $("#myTabContent").on("click", ".editIcon", function () {
            $(this).siblings(".editSpan").hide();
            $(this).siblings(".editInput3").show();
            $(this).siblings(".editInput3").focus();
        });
        $("#myTabContent").on("blur", ".editInput3", function () {
            var up_type = $(this).attr("data-type");
            var goods_id = $(this).attr("data-goods-id");
            var editContent = $(this).val();
            var $self = $(this);
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/ajaxEditGoodsDetail'); ?>",
                data: {
                    "goods_id": goods_id,
                    "up_type": up_type,
                    "up_content": editContent
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        if(up_type==='stock'){
                            $self.prev(".J-span").text(editContent);
                        }else{
                            $self.prev(".J-span").text('￥'+editContent);
                        }
                    }
                    $self.siblings(".editSpan").show();
                    $self.hide();
                    $self.siblings(".editIcon").removeClass("visible");
                }
            });

        });

        $("#myTabContent").on("click", ".editIcon-pa", function () {
            $(this).parents(".media").find(".line-title").children("a").hide().siblings(".editTextarea").show();
            $(this).parents(".media").find(".line-title").children("a").hide().siblings(".editTextarea").focus();
        });
        $("#myTabContent").on("blur", ".editTextarea", function () {
            var up_type = $(this).attr("data-type");
            var goods_id = $(this).attr("data-goods-id");
            var editContent = $(this).val();
            var $self = $(this);
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/ajaxEditGoodsDetail'); ?>",
                data: {
                    "goods_id": goods_id,
                    "up_type": up_type,
                    "up_content": editContent
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        $self.prev(".J-title").text(editContent);
                    }
                    $self.hide();
                    $self.parents(".media").find(".line-title").children("a").show();
                }
            });
        });
    }
    
    function setCategory(){
        var url = "<?php echo __URL('ADMIN_MAIN/goods/selectcategory'); ?>";
        utilAdmin.confirm('选择分类','url:'+url, function () {
            var cid1 = this.$content.find('#selected_c1').val();
            var cid2 = this.$content.find('#selected_c2').val();
            var cid3 = this.$content.find('#selected_c3').val();
            var cname = this.$content.find('#selected_cn').val();
            $("#category_id_1").val(cid1);
            $("#category_id_2").val(cid2);
            $("#category_id_3").val(cid3);
            $("#select_cname").val(cname);
            $("#select_name_hidden").val(cname);
        },'large');
    }
    
    function editLabel(obj){
        var label =  $(obj).data('label');
        var id =  $(obj).data('id');
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/goods/editLabel'); ?>",
            data: {"label": label,"goods_id":id},
            dataType: "json",
            async : true,
            success : function(data) {
                if (data["code"] > 0) {
                	utilAdmin.message(data["message"],'success',LoadingInfo($('#page_index').val()));
                }else{
                	utilAdmin.message(data["message"],'danger',LoadingInfo($('#page_index').val()));
                }
            }
        })
    }
    
    goodListEdit();

    $('body').on('click','.gl-add1',function(){
        select_goods(0);
    });
    $('body').on('click','.gl-add2',function(){
        select_goods(1);
    });
    $('body').on('click','.J-offline',function(){
        var gid = $(this).data('id');
        modifyGoodsOnline(gid, 'offline');
    });
    $('body').on('click','.J-online',function(){
        var gid = $(this).data('id');
        modifyGoodsOnline(gid, 'online');
    });
    $('body').on('click','.gl-add3',function(){
        select_goods(2);
    });
    $('body').on('click','.gl-add4',function(){
        select_goods(3);
    });
    $('body').on('click','.gl-add5',function(){
        select_goods(4);
    });
    $('body').on('click','.gl-add13',function(){
        select_goods(5);
    });
    $('body').on('click','.gl-add14',function(){
        select_goods(6);
    });
    $('body').on('click','.gl-add15',function(){
        select_goods(7);
    });
    // $('body').on('click','.gl-add6',function(){
    //     var checked = $(this).is(':checked');
    //     $("div.active input[type = 'checkbox']").prop("checked", checked);
    // });
    $("body").on('click','#chek_all',function(){
        $(".trs input[type = 'checkbox']").prop("checked", this.checked);
    })
    $('body').on('click','.gl-add7',function(){
        goodsIdCount('online');
    });
    $('body').on('click','.gl-add8',function(){
        goodsIdCount('offline');
    });
    $('body').on('click','.gl-add9',function(){
        batchDelete();
    });
    $('body').on('click','.gl-add10',function(){
        var _this=$(this);
        goodsCategoryThree(_this);
    });
    $('body').on('click','.gl-add11',function(){
        var id=$(this).attr('data-id');
        JScopy(id);
    });
    $('body').on('click','.gl-add12',function(){
        var id=$(this).attr('data-id');
        deleteGoods(id);
    });
    $('body').on('click','.J-edit',function(){
        var promotion_type = $(this).data('type');
        var promotion_name = $(this).data('name');
        if(promotion_name === ''){
            promotion_name = '活动';
        }
        var goods_id = $(this).data('id');
        window.location.href = __URL("ADMIN_MAIN/goods/addgoods?step=2&goodsId=" + goods_id);
        // if(!promotion_type){
        //     window.location.href = __URL("ADMIN_MAIN/goods/addgoods?step=2&goodsId=" + goods_id);
        // }else{
        //     utilAdmin.message('商品参与了' + promotion_name + '，不能编辑',"danger");
        // }
    });
    $('.search').on('click',function(){
        LoadingInfo(1);
    });
    $('body').on('click','.J-selectCategory', function () {
        setCategory();
    });
    $('body').on('click', '.labels', function(){
    	editLabel(this);
    });
    getgoodscount();
        //获取商品各种状态的数量
    function getgoodscount(){
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/index/getgoodscountlist'); ?>",
            success: function (data) {
                $('.J-all').html('('+data.all+')');
                $('.J-sale').html('('+data.sale+')');
                $('.J-audit').html('('+data.audit+')');
                $('.J-sold_out').html('('+data.sold_out+')');
                $('.J-stock_warning').html('('+data.stock_warning+')');
                $('.J-waitaudit').html('('+data.waitaudit+')');
                $('.J-unaudit').html('('+data.unaudit+')');
                $('.J-shelf').html('('+data.shelf+')');
            }
        });
    }
})
</script>

</body>
</html>