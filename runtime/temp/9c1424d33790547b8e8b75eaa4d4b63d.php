<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:44:"template/platform/Config/platformModule.html";i:1591330106;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
            
<div class="mb-20">
    <?php if($type == 'platform'): if(per('system','addplatformmodule')): ?>
    <a href="<?php echo __URL('PLATFORM_MAIN/System/addPlatformModule?pid=0'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加模块</a>
    <?php endif; elseif($type == 'admin'): if(per('system','addshopmodule')): ?>
    <a href="<?php echo __URL('PLATFORM_MAIN/System/addShopModule?pid=0'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加模块</a>
    <?php endif; endif; ?>
</div>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th></th>
        <th>排序</th>
        <th>模块名</th>
        <th>是否显示</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v1): ?>
    <tr class="pid_0" id="first_id_<?php echo $v1['module_id']; ?>" isClick="false">
        <td>
            <?php if($v1['sub_menu'] == 1): ?>
            <a href="javascript:void(0);" data-first_id="<?php echo $v1['module_id']; ?>" class="tab_jia_<?php echo $v1['module_id']; ?> btn-first" style="display: inline;"><i class="icon icon-add"></i></a>
            <a href="javascript:void(0);" data-first_id="<?php echo $v1['module_id']; ?>" class="tab_jian_<?php echo $v1['module_id']; ?> btn-first" style="display: none;"><i class="icon icon-minus"></i></a>
            <?php endif; ?>
        </td>
        <td>
            <input type="text" fieldid="<?php echo $v1['module_id']; ?>" fieldname="sort" class="form-control" value="<?php echo $v1['sort']; ?>">
        </td>
        <td>
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <input type="text" class="form-control" fieldid="<?php echo $v1['module_id']; ?>" fieldname="module_name" value="<?php echo $v1['module_name']; ?>">
            </div>
        </td>
        <td class="center J-menu <?php echo !empty($v1['is_menu'])?'isTrue' : 'isFalse'; ?>"><a href="javascript:void(0)" class="changeField label <?php if($v1['is_menu']): ?>label-success<?php else: ?>label-default<?php endif; ?>" data-id="<?php echo $v1['module_id']; ?>" data-name="is_menu" data-menu="<?php if($v1['is_menu']): ?>0<?php else: ?>1<?php endif; ?>" data-type="first"><?php echo !empty($v1['is_menu'])?'是' : '否'; ?></a></td>
        <td class="center">
            <?php if(per('system','editmodule')): ?>
            <a href="<?php echo __URL('PLATFORM_MAIN/System/editModule?module_id='.$v1['module_id']); ?>" class="btn-operation" data-toggle="tooltip" title="修改" data-trigger="hover" ><i class="icon icon-edit-l"></i></a>
            <?php endif; if(per('system','delmodule')): ?>
            <a href="javascript:void(0);" class="del delModule btn-operation" data-id = <?php echo $v1['module_id']; ?> data-toggle="tooltip" title="删除" data-trigger="hover"><i class="icon icon-clean-l"></i></a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'],function(util){
        util.tips();
        var per_edit = "<?php echo per('system','editmodule');; ?>";
        var per_del = "<?php echo per('system','delmodule');; ?>";
        $('body').on('click','.changeField',function(){
            var fieldid = $(this).data('id');
            var fieldname = $(this).data('name');
            var fieldvalue = $(this).data('menu');
            var atype = $(this).data('type');
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/system/modifyfield'); ?>",
                data:{'fieldid':fieldid,'fieldname':fieldname,'fieldvalue':fieldvalue},
                async:true,
                success: function (data) {
                    if(data['code'] <= 0){
                        util.message(data['message'],'danger');
                        return false;
                    }else{
                        util.message('操作成功','success',function(){
                            if(fieldname=='is_menu'){
                                if(atype=='first'){
                                    if(fieldvalue==1){
                                        $('#first_id_'+fieldid+' .J-menu a').html('是');
                                        $('#first_id_'+fieldid+' .J-menu a').data('id',fieldid);
                                        $('#first_id_'+fieldid+' .J-menu a').data('name',"is_menu");
                                        $('#first_id_'+fieldid+' .J-menu a').data('menu',0);
                                        $('#first_id_'+fieldid+' .J-menu a').removeClass('label-default').addClass('label-success');
                                        $('#first_id_'+fieldid+' .J-menu').removeClass('isFalse').addClass('isTrue');
                                    }else{
                                        $('#first_id_'+fieldid+' .J-menu').removeClass('isTrue').addClass('isFalse');
                                        $('#first_id_'+fieldid+' .J-menu a').removeClass('label-success').addClass('label-default');
                                        $('#first_id_'+fieldid+' .J-menu a').html('否');
                                        $('#first_id_'+fieldid+' .J-menu a').data('id',fieldid);
                                        $('#first_id_'+fieldid+' .J-menu a').data('name',"is_menu");
                                        $('#first_id_'+fieldid+' .J-menu a').data('menu',1);
                                    }

                                }else{
                                    if(fieldvalue==1){
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').html('是');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').data('menu',0);
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').removeClass('label-default').addClass('label-success');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu').removeClass('isFalse').addClass('isTrue');
                                    }else{
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu').removeClass('isTrue').addClass('isFalse');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').removeClass('label-success').addClass('label-default');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').html('否');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').data('menu',1);
                                    }
                                }
                            }
                        });
                        location.reload();
                    }
                }
            });
        });

        $("body").on('click',".delModule",function(){
            var module_id= $(this).data('id');
            util.alert('确定删除该模块？',
                function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo __URL('PLATFORM_MAIN/system/delmodule'); ?>",
                        async: true,
                        data: {
                            'module_id':module_id
                        },
                        success: function (data) {
                            if (data["code"] > 0) {
                                util.message("操作成功！", 'success', function () {
                                    $('.J-id_'+module_id).remove();
                                });
                                location.reload();
                            } else {
                                util.message(data['message'], 'danger');
                                return false;
                            }
                        }
                    })
                });
        });
        $("tbody").on('change','input',function(){
            var fieldid = $(this).attr('fieldid');
            var fieldname = $(this).attr('fieldname');
            var fieldvalue = $(this).val();
            var atype = $(this).data('type');
            $.ajax({
                type:"post",
                url:"<?php echo __URL('PLATFORM_MAIN/system/modifyfield'); ?>",
                data:{'fieldid':fieldid,'fieldname':fieldname,'fieldvalue':fieldvalue},
                async:true,
                success: function (data) {
                    if(data['code'] <= 0){
                        util.message(data['message'],'danger');
                        return false;
                    }else{
                        util.message('操作成功','success',function(){
                            if(fieldname=='is_menu'){
                                if(atype=='first'){
                                    if(fieldvalue==1){
                                        $('#first_id_'+fieldid+' .J-menu a').html('是');
                                        $('#first_id_'+fieldid+' .J-menu a').data('id',fieldid);
                                        $('#first_id_'+fieldid+' .J-menu a').data('name',"is_menu");
                                        $('#first_id_'+fieldid+' .J-menu a').data('menu',0);
                                        $('#first_id_'+fieldid+' .J-menu a').removeClass('label-default').addClass('label-success');
                                        $('#first_id_'+fieldid+' .J-menu').removeClass('isFalse').addClass('isTrue');
                                    }else{
                                        $('#first_id_'+fieldid+' .J-menu').removeClass('isTrue').addClass('isFalse');
                                        $('#first_id_'+fieldid+' .J-menu a').removeClass('label-success').addClass('label-default');
                                        $('#first_id_'+fieldid+' .J-menu a').html('否');
                                        $('#first_id_'+fieldid+' .J-menu a').data('id',fieldid);
                                        $('#first_id_'+fieldid+' .J-menu a').data('name',"is_menu");
                                        $('#first_id_'+fieldid+' .J-menu a').data('menu',1);
                                    }

                                }else{
                                    if(fieldvalue==1){
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').html('是');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').data('menu',0);
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').removeClass('label-default').addClass('label-success');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu').removeClass('isFalse').addClass('isTrue');
                                    }else{
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu').removeClass('isTrue').addClass('isFalse');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').removeClass('label-success').addClass('label-default');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').html('否');
                                        $('tbody').find('.J-id_'+fieldid+' .J-menu a').data('menu',1);
                                    }
                                }
                            }
                        });
                        location.reload();
                    }
                }
            });
        });
        $('.btn-first').on('click',function(){
            var first_id = $(this).data('first_id');
            first_tab_switch(first_id)
        })
        $('tbody').delegate('.btn-second','click',function(){
            var first_id = $(this).data('first_id');
            var second_id = $(this).data('second_id');
            second_tab_switch(first_id,second_id)
        })
        function first_tab_switch(module_id){
            if($("#first_id_"+module_id).attr("isClick") == 'false'){
                getSecondList(module_id);
            }
            if($(".second_pid_"+module_id).attr('isShow')== 'true'){
                $(".tab_jian_"+module_id).hide();
                $(".tab_jia_"+module_id).show();
                $(".second_pid_"+module_id).fadeOut();
                $(".js-third_pid_"+module_id).hide();
                $(".second_pid_"+module_id).attr('isShow','false');
            }else{
                $(".tab_jian_"+module_id).show();
                $(".tab_jia_"+module_id).hide();
                $(".second_pid_"+module_id).fadeIn();
                $(".second_pid_"+module_id).attr('isShow','true');
                if($(".second_pid_"+module_id).attr('isShow')=='false'){
                    closeSecond(module_id);
                }
            }
        }
        function getSecondList(module_id){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/system/getModuleListByParentId'); ?>",
                data : {"pid" : module_id},
                success : function(data){
                    if(data.length > 0){
                        var addInfo = '';
                        for (var i = 0; i < data.length; i++) {
                            var is_menu = '否';
                            var change_menu = '1';
                            var menu_class = 'isFalse';
                            if(data[i]['is_menu'] === 1){
                                is_menu = '是';
                                change_menu = '0';
                                menu_class = 'isTrue';
                            }
                            addInfo += '<tr class="second_pid_'+ module_id +' J-id_'+data[i]['module_id']+'" id="second_id_'+data[i]['module_id']+'" isClick="false" isShow="true">';
                            addInfo += '<td>';
                            if(data[i]['sub_menu'] === 1){
                                addInfo += '<a href="javascript:void(0);" data-first_id="'+ module_id +'" data-second_id="'+data[i]['module_id']+'" class="tab_jia_'+data[i]['module_id']+' btn-second" style="display: inline;"><i class="icon icon-add"></i></a>';
                                addInfo += '<a href="javascript:void(0);" data-first_id="'+ module_id +'" data-second_id="'+data[i]['module_id']+'" class="tab_jian_'+data[i]['module_id']+' btn-second" style="display: none;"><i class="icon icon-minus"></i></a>';
                            }
                            addInfo += '</td>';
                            addInfo += '<td>';
                            addInfo += '<input type="text" fieldid="'+data[i]['module_id']+'" fieldname="sort" class="form-control" value="'+data[i]['sort']+'">';
                            addInfo += '</td>';
                            addInfo += '<td>';
                            addInfo += '<div class="col-md-2"></div>';
                            addInfo += '<div class="col-md-10">';
                            addInfo += '<input type="text" class="form-control" fieldid="'+data[i]['module_id']+'" fieldname="module_name" value="'+data[i]['module_name']+'">';
                            addInfo += '</div>';
                            addInfo += '</td>';
                            if(data[i]['is_menu']==1){
                                addInfo += '<td class="center J-menu '+menu_class+'"><a href="javascript:void(0)" class="changeField label label-success" data-id="'+data[i]['module_id']+'" data-menu="'+change_menu+'" data-name="is_menu">' + is_menu + '</a></td>';
                            }else{
                                addInfo += '<td class="center J-menu '+menu_class+'"><a href="javascript:void(0)" class="changeField label label-default" data-id="'+data[i]['module_id']+'" data-menu="'+change_menu+'" data-name="is_menu">' + is_menu + '</a></td>';
                            }
                            addInfo += '<td class="center">';
                            if(per_edit){
                                addInfo += '<a href="'+__URL('PLATFORM_MAIN/System/editModule?module_id=' + data[i]['module_id']) + '"  class="btn-operation" data-toggle="tooltip" title="修改" data-trigger="hover"><i class="icon icon-edit-l"></i></a>&nbsp;';
                            }
                            if(per_del){
                                addInfo += '<a href="javascript:void(0);" class="del delModule btn-operation" data-id="'+data[i]['module_id']+'" data-toggle="tooltip" title="删除" data-trigger="hover"><i class="icon icon-clean-l"></i></a>';
                            }
                            addInfo += '</td>';
                            addInfo += '</tr>';
                        }
                    }
                    $("#first_id_"+module_id).after(addInfo);
                    $("#first_id_"+module_id).attr("isClick", 'true');
                }
            });
        }
        function getThirdList(first_id,second_id){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/system/getModuleListByParentId'); ?>",
                data : {"pid" : second_id},
                success : function(data){
                    if(data.length > 0){
                        var addInfo = '';
                        for (var i = 0; i < data.length; i++) {
                            var is_menu = '否';
                            var change_menu = '1';
                            var menu_class = 'isFalse';
                            if(data[i]['is_menu'] === 1){
                                is_menu = '是';
                                change_menu = '0';
                                menu_class = 'isTrue';
                            }
                            addInfo += '<tr class="js-third_pid_'+first_id+' third_pid_'+ second_id +' J-id_'+data[i]['module_id']+'" id="third_id_'+data[i]['module_id']+'" isClick="false">';
                            addInfo += '<td>';
                            addInfo += '</td>';
                            addInfo += '<td>';
                            addInfo += '<input type="text" fieldid="'+data[i]['module_id']+'" fieldname="sort" class="form-control" value="'+data[i]['sort']+'">';
                            addInfo += '</td>';
                            addInfo += '<td>';
                            addInfo += '<div class="col-md-3"></div>';
                            addInfo += '<div class="col-md-9">';
                            addInfo += '<input type="text" class="form-control" fieldid="'+data[i]['module_id']+'" fieldname="module_name" value="'+data[i]['module_name']+'">';
                            addInfo += '</div>';
                            addInfo += '</td>';
                            addInfo += '<td class="center J-menu '+menu_class+'"><a href="javascript:void(0)" class="J-changemenu" data-id="'+data[i]['module_id']+'" data-menu="'+change_menu+'">' + is_menu + '</a></td>';
                            addInfo += '<td class="center">';
                            if(per_edit){
                                addInfo += '<a href="'+__URL('PLATFORM_MAIN/System/editModule?module_id=' + data[i]['module_id']) + '"  class="btn-operation" data-toggle="tooltip" title="修改" data-trigger="hover"><i class="icon icon-edit-l"></i></a>&nbsp;';
                            }
                            if(per_del){
                                addInfo += '<a href="javascript:void(0);" class="del delModule" data-id="'+data[i]['module_id']+'" data-toggle="tooltip" title="删除" data-trigger="hover"><i class="icon icon-clean-l"></i></a>';
                            }
                            addInfo += '</td>';
                            addInfo += '</tr>';
                        }
                    }
                    $("#second_id_"+second_id).after(addInfo);
                    $("#second_id_"+second_id).attr("isClick", 'true');
                }
            });
        }
        function closeSecond(module_id){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/system/getModuleListByParentId'); ?>",
                data : {"pid" : module_id},
                success : function(data){
                    if(data.length > 0){
                        for (var i = 0; i < data.length; i++) {
                            $(".tab_jian_"+data[i]['module_id']).hide();
                            $(".tab_jia_"+data[i]['module_id']).show();
                        }
                    }
                }
            });
        }
        function second_tab_switch(first_id,second_id){
            if($("#second_id_"+second_id).attr("isClick") == 'false'){
                if(first_id == undefined){
                    first_id = 0;
                }
                getThirdList(first_id,second_id);
            }
            if($(".tab_jia_"+second_id).css('display') != 'inline'){
                $(".tab_jian_"+second_id).hide();
                $(".tab_jia_"+second_id).show();
                $(".third_pid_"+second_id).fadeOut();
            }else{
                $(".tab_jian_"+second_id).show();
                $(".tab_jia_"+second_id).hide();
                $(".third_pid_"+second_id).fadeIn();
            }
        }
    });
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

