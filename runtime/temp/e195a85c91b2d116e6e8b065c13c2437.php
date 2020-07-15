<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:37:"template/admin/Goods/recycleList.html";i:1583811760;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            
<!-- page -->
<!--全选删除添加轮播-->
<div class="mb-20 flex flex-pack-justify">
    <div class="allDelAdd">
        <!--<label for="chek_all">
            <span class="allDel">
              <label class="checkbox-inline">
                <input type="checkbox" class="all decorate" id="chek_all" name="chek_all">&nbsp;全选
              </label>
            </span>
        </label>-->
        <span class="allDel del add1">批量恢复</span>
        <span class="allDel del add2">批量删除</span>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control" id="goods_name" placeholder="商品名称" value="<?php echo $search_info; ?>">
        <span class="input-group-btn "><a class="btn btn-primary search_to">搜索</a></span>
    </div>
</div>
<input type='hidden' id='goods_type_ids'/>
<!--表格-->
<table class="table v-table">
    <thead>
        <tr>
            <th><input type="checkbox" class="all decorate" id="chek_all" name="chek_all"></th>
            <th class="col-md-4">商品</th>
            <th>售价</th>
            <th>原价</th>
            <th>库存</th>
            <th>销量</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody class="trs" id="list">
    </tbody>
</table>
<div class="page clearfix">
    <div class="M-box3 m-style fr">
    </div>
</div>
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

<script type="text/javascript">
require(['utilAdmin'], function (utilAdmin) { 
    $(function () {
        LoadingInfo(1);
    });
    function searchData() {
        LoadingInfo(1);
    }
    function LoadingInfo(page_index) {
        $('#page_index').val(page_index ? page_index : '1');
        var goods_name = $("#goods_name").val();
        var category_id_1 = $("#category_id_1").val();
        var category_id_2 = $("#category_id_2").val();
        var category_id_3 = $("#category_id_3").val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/goods/recyclelist'); ?>",
            data: {
                "page_index": page_index,
                "page_size": $("#showNumber").val(),
                "goods_name": goods_name,
                "category_id_1": category_id_1,
                "category_id_2": category_id_2,
                "category_id_3": category_id_3
            },
            success: function (data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        html += '<td><input class="decorate" type="checkbox" value="' + data["data"][i]["goods_id"] + '" data-state="' + data["data"][i]["state"] + '"></td>';
                        html += '<td class="picword_td">';
                        // html += '<div class="col-sm-3 pic_td"><img src="' + __IMG(data["data"][i]["pic_cover_micro"]) + '" alt=""></div>';
                        // html += '<div class="col-sm-9 word_td">';
                        // html += '<p class="tdTitles">' + data["data"][i]["goods_name"] + '</p>';
                        // html += '<p class="desc"></p>';
                        // html += '</div>';
                        html += '<div class="media text-left">';
                        html += '<div class="media-left"><p><img src="' + __IMG(data["data"][i]["pic_cover_mid"]) + '" style="width:60px;height:60px;"></p></div>';
                        html += '<div class="media-body break-word"><div class="line-2-ellipsis"><a href="javascript:;">' + data["data"][i]["goods_name"] + '</a></div>';
                        html += '<div class="small-muted line-2-ellipsis"></div>';
                        html += '</div></div>';

                        html += '</td>';
                        html += '<td>￥' + data["data"][i]["promotion_price"] + '</td>';
                        html += '<td>￥' + data["data"][i]["price"] + '</td>';
                        html += '<td>' + data["data"][i]["stock"] + '</td>';
                        html += '<td>' + data["data"][i]["real_sales"] + '</td>';
                        html += '<td class="fs-0 operationLeft">';
                        html += '<a class="btn-operation add3" href="javascript:void(0);" data-id="' + data["data"][i]["goods_id"] + '">恢复</a>';
                        html += '<a href="javascript:void(0);" class="btn-operation text-red1 del add4" data-id="' + data["data"][i]["goods_id"] + '">彻底删除</a>';
                        html += '</td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr align="center"><td colspan="7" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                $("#list").html(html);
                utilAdmin.tips();
                utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, LoadingInfo);
            }
        });
    }

//全选
    // function CheckAll(event) {
    //     var checked = event.checked;
    //     $("#list input[type = 'checkbox']").prop("checked", checked);
    // }

//批量删除回收站数据
    function batchDelete() {
        var goods_ids = new Array();
        $("#list input[type='checkbox']:checked").each(function () {
            if (!isNaN($(this).val())) {
                goods_ids.push($(this).val());
            }
        });
        if (goods_ids.length == 0) {
            utilAdmin.message('请选择需要操作的记录');
            return false;
        }
        deleteGoods(goods_ids);
    }

//单个删除回收站数据
    function deleteGoods(goods_ids) {
        utilAdmin.alert('确定要从回收站彻底删除吗？',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/emptydeletegoods'); ?>",
                data: {"goods_ids": goods_ids.toString()},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        LoadingInfo($('#page_index').val());
                        utilAdmin.message(data["message"],'success',function(){
                            $("#chek_all").prop("checked", false);
                        });
                        return false;
                    }
                }
            });
        })
    }

//批量恢复
    function batchRegainDelete() {
        var goods_ids = new Array();
        $("#list input[type='checkbox']:checked").each(function () {
            if (!isNaN($(this).val())) {
                goods_ids.push($(this).val());
            }
        });
        if (goods_ids.length == 0) {
            utilAdmin.message('请选择需要操作的记录');
            return false;
        }
        regainGoodsDeleted(goods_ids);
    }

//单个恢复已删除商品
    function regainGoodsDeleted(goods_ids) {
        utilAdmin.alert('确定要恢复吗？',function(){
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/goods/regaingoodsdeleted'); ?>",
                data: {"goods_ids": goods_ids.toString()},
                dataType: "json",
                success: function (data) {
                    if (data["code"] > 0) {
                        LoadingInfo($('#page_index').val());
                        utilAdmin.message(data["message"],'success',function(){
                            $("#chek_all").prop("checked", false);
                        });
                    }
                }
            });
        })
    }

    // $("#goodsCategoryOne").click(function () {
    //     var isShow = $("#goodsCategoryOne").attr('is_show');
    //     if (isShow == "false") {
    //         $(".one").show();
    //         $(".selectGoodsCategory").css({
    //             'width': 218,
    //             'right': 530
    //         });
    //         $(".selectGoodsCategory").show();
    //         $("#goodsCategoryOne").attr('is_show', 'true');
    //         $(".js-mask-category").show();
    //     } else {
    //         $(".one").hide();
    //         $(".two").hide();
    //         $(".three").hide();
    //         $(".selectGoodsCategory").css({
    //             'width': 218,
    //             'right': 530
    //         });
    //         $(".selectGoodsCategory").hide();
    //         $("#goodsCategoryOne").attr('is_show', 'false');
    //     }
    // })

    // $(".js-mask-category").click(function () {
    //     $(".one").hide();
    //     $(".selectGoodsCategory").hide();
    //     $(".two").hide();
    //     $(".three").hide();
    //     $("#goodsCategoryOne").attr('is_show', 'false');
    //     $(this).hide();
    // })

    // $(".js-category-one").click(function () {
    //     parentId = $(this).attr("category_id");
    //     category_name = $(this).text();
    //     $(".one ul li").not($(this)).removeClass("selected");
    //     $(this).addClass("selected");
    //     $("#goodsCategoryOne").val($.trim(category_name) + ">");
    //     $("#category_id_1").val(parentId);
    //     $("#category_id_2").val('');
    //     $("#category_id_3").val('');
    //     $.ajax({
    //         type: 'post',
    //         url: "<?php echo __URL('ADMIN_MAIN/goods/getcategorybyparentajax'); ?>",
    //         data: {"parentId": parentId},
    //         success: function (data) {
    //             if (data.length > 0) {
    //                 var html = '';
    //                 for (var i = 0; i < data.length; i++) {
    //                     html += '<li class="js-category-two" category_id="' + data[i]['category_id'] + '">' + data[i]['category_name'];
    //                     if (data[i]['is_parent'] == 1) {
    //                         html += '<i class="fa fa-angle-right fa-lg"></i>';
    //                     }
    //                     html += '</li>';
    //                 }
    //                 $("#goodsCategoryTwo").html(html);
    //                 $(".two").show();
    //                 $(".selectGoodsCategory").css({
    //                     'width': 437,
    //                     'right': 311
    //                 });
    //             } else {
    //                 $(".one").hide();
    //                 $(".two").hide();
    //                 $(".js-mask-category").hide();
    //                 $(".selectGoodsCategory").hide();
    //                 $("#goodsCategoryOne").attr('is_show', 'false');
    //             }
    //             $(".three").hide();
    //         }
    //     });
    //     return false;
    // });

    // $(".js-category-two").click(function (event) {
    //     var parentId = $(this).attr("category_id");
    //     var category_name = $(this).text();
    //     $(".two ul li").not($(this)).removeClass("selected");
    //     $(this).addClass("selected");
    //     var goodsCategoryOne = $("#goodsCategoryOne").val();
    //     $("#goodsCategoryOne").val(goodsCategoryOne + '' + category_name + '>');
    //     $("#category_id_2").val(parentId);
    //     $("#category_id_3").val('');
    //     $.ajax({
    //         type: 'post',
    //         url: "<?php echo __URL('ADMIN_MAIN/goods/getcategorybyparentajax'); ?>",
    //         data: {"parentId": parentId},
    //         success: function (data) {
    //             if (data.length > 0) {
    //                 var html = '';
    //                 for (var i = 0; i < data.length; i++) {
    //                     html += '<li onclick="goodsCategoryThree(this);" category_id="' + data[i]['category_id'] + '">' + data[i]['category_name'] + '<i class="fa fa-angle-right fa-lg"></i></li>';
    //                 }
    //                 $("#goodsCategoryThree").html(html);
    //                 $(".three").show();
    //                 $(".selectGoodsCategory").css({
    //                     'width': 636,
    //                     'right': 112
    //                 });
    //             } else {
    //                 $(".one").hide();
    //                 $(".two").hide();
    //                 $(".three").hide();
    //                 $(".selectGoodsCategory").hide();
    //                 $(".js-mask-category").hide();
    //                 $("#goodsCategoryOne").attr('is_show', 'false');
    //             }
    //         }
    //     })
    //     event.stopPropagation();
    // });

    // function goodsCategoryThree(obj) {
    //     var parentId = $(obj).attr("category_id");
    //     var category_name = $(obj).text();
    //     $(".three ul li").not($(obj)).removeClass("selected");
    //     $(obj).addClass("selected");
    //     var goodsCategoryOne = $("#goodsCategoryOne").val();
    //     $("#goodsCategoryOne").val(goodsCategoryOne + '' + category_name);
    //     $("#category_id_3").val(parentId);
    //     $(".one").hide();
    //     $(".two").hide();
    //     $(".three").hide();
    //     $(".selectGoodsCategory").hide();
    //     $(".selectGoodsCategory").css({
    //         'width': 218,
    //         'right': 530
    //     });
    //     $(".js-mask-category").hide();
    //     $("#goodsCategoryOne").attr('is_show', 'false');
    // }

    // $("#confirmSelect").click(function () {
    //     $(".one").hide();
    //     $(".two").hide();
    //     $(".three").hide();
    //     $(".selectGoodsCategory").hide();
    //     $(".selectGoodsCategory").css({
    //         'width': 218,
    //         'right': 530
    //     });
    // })

    $('body').on('click','#chek_all',function(){
        var checked=$(this).prop('checked');
        $("#list input[type = 'checkbox']").prop("checked", checked);
    })
    $('body').on('click','.add1',function(){
        batchRegainDelete();
    })
    $('body').on('click','.add2',function(){
        batchDelete();
    })
    $('body').on('click','.add3',function(){
        var id=$(this).attr('data-id');
        regainGoodsDeleted(id);
    })
    $('body').on('click','.add4',function(){
        var id=$(this).attr('data-id');
        deleteGoods(id);
    })
    $('body').on('click','.search_to',function(){
        LoadingInfo(1);
    })
})
</script>

</body>
</html>