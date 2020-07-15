<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:50:"template/platform/Express/freightTemplateEdit.html";i:1583811744;s:31:"template/platform/new_base.html";i:1587970146;s:44:"template/platform/controlCommonVariable.html";i:1583811744;s:31:"template/platform/urlModel.html";i:1583811744;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo $second_menu['module_name']; ?> - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>微商来 - 让更多的人帮你卖货！<?php endif; ?></title>
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
    
<link rel="stylesheet" href="__STATIC__/lib/drag/layer.css">
<link href="PLATFORM_CSS/express/freight_edit.css" rel="stylesheet" type="text/css"/>

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
                <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">
                <?php if($web_info['mall_name']): ?>
                <span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['mall_name']; ?></span>
                <?php else: ?><span style="font-weight: bold;font-size: 18px;padding: 0 3px"><?php echo $web_info['title']; ?></span><?php endif; ?> 
                <span class="btn-version btn-primary versionPr" id="versionPr">
                    <?php echo $web_info['version']; ?>
                </span>
            </div>
            <?php else: ?>
            <div class="v-header-title">
                <img src="<?php if($logo_config['opera_logo']): ?><?php echo $logo_config['opera_logo']; else: ?>PLATFORM_IMG/logo2.png<?php endif; ?>" class="v-header-img">
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
            
<input type="hidden" id="hidden_co_id" value="<?php echo $co_id; ?>"/>
        <!-- page -->

        <form class="form-horizontal form-validate pt-15 widthFixedForm" role="form" id="freight_template_form">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>快递公司</label>
                <div class="col-md-5">
                    <select class="form-control" name="co_id" required title="请选择快递公司">
                        <option value="">请选择</option>
                        <?php if(is_array($company_lists['data']) || $company_lists['data'] instanceof \think\Collection || $company_lists['data'] instanceof \think\Paginator): if( count($company_lists['data'])==0 ) : echo "" ;else: foreach($company_lists['data'] as $k=>$company): ?>
                        <option value="<?php echo $company['co_id']; ?>" <?php if($company['co_id']== $shipping_fee_detail['co_id']): ?>selected<?php endif; ?>><?php echo $company['company_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 模版名称</label>
                <div class="col-md-5">
                    <input class="form-control" id="shipping_fee_name" type="text" name="shipping_fee_name"
                           value="<?php echo $shipping_fee_detail['shipping_fee_name']; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 计费方式</label>
                <div class="col-md-8">
                    <label class="radio-inline">
                        <input type="radio" name="calculate_type" id="calculate_weight" value="1" <?php if($shipping_fee_detail['calculate_type']== 1 || empty($shipping_fee_detail['calculate_type'])): ?>checked<?php endif; ?>> 按重计费（kg）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="calculate_type" id="calculate_num" value="2" <?php if($shipping_fee_detail['calculate_type']== 2): ?>checked<?php endif; ?>> 按件计费（件）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="calculate_type" id="calculate_volume" value="3" <?php if($shipping_fee_detail['calculate_type']== 3): ?>checked<?php endif; ?>> 按体积计费（m³）
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 配送区域设置</label>
                <div class="col-md-8" style="width: 720px">
                    <table class="table table-bordered table-auto-center mb-10" id="" >
                        <tr>
                            <th>配送至</th>
                            <th id="main_level_num"><?php if($shipping_fee_detail['calculate_type'] == 1 || empty($shipping_fee_detail['calculate_type'])): ?>首重(kg)<?php endif; if($shipping_fee_detail['calculate_type'] == 2): ?>首件(件)<?php endif; if($shipping_fee_detail['calculate_type'] == 3): ?>首体积(m³)<?php endif; ?></th>
                            <th id="main_level_fee"><?php if($shipping_fee_detail['calculate_type'] == 1 || empty($shipping_fee_detail['calculate_type'])): ?>首重运费(元)<?php endif; if($shipping_fee_detail['calculate_type'] == 2): ?>首件运费(元)<?php endif; if($shipping_fee_detail['calculate_type'] == 3): ?>首体积运费(元)<?php endif; ?></th>
                            <th id="extra_level_num"><?php if($shipping_fee_detail['calculate_type'] == 1 || empty($shipping_fee_detail['calculate_type'])): ?>续重(kg)<?php endif; if($shipping_fee_detail['calculate_type'] == 2): ?>续件(件)<?php endif; if($shipping_fee_detail['calculate_type'] == 3): ?>续体积运费(m³)<?php endif; ?></th>
                            <th id="per_extra_level_fee"><?php if($shipping_fee_detail['calculate_type'] == 1 || empty($shipping_fee_detail['calculate_type'])): ?>续重运费(元)<?php endif; if($shipping_fee_detail['calculate_type'] == 2): ?>续件运费(元)<?php endif; if($shipping_fee_detail['calculate_type'] == 3): ?>续体积运费(元)<?php endif; ?></th>
                            <th style="width: 42px">操作</th>
                        </tr>
                        <tbody class="trs">
                        <?php if(is_array($shipping_fee_detail['shipping_area']) || $shipping_fee_detail['shipping_area'] instanceof \think\Collection || $shipping_fee_detail['shipping_area'] instanceof \think\Paginator): if( count($shipping_fee_detail['shipping_area'])==0 ) : echo "" ;else: foreach($shipping_fee_detail['shipping_area'] as $k=>$area): ?>
                        <tr id="shipping_fee_area_id_<?php echo $area['shipping_fee_area_id']; ?>"
                            data-shipping-fee-area-id="<?php echo $area['shipping_fee_area_id']; ?>"
                            data-is-default="<?php echo $area['is_default_area']; ?>">
                            <td>
                                <?php if($area['is_default_area']): ?>
                                默认地区
                                <?php else: ?>
                                <span class="js-region-info region-info"><?php if($area['province_name_array']): ?><?php echo implode(',',$area['province_name_array']); endif; ?></span>
                                <a href="javascript:void(0);" class="text-primary js-select-city">编辑</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($shipping_fee_detail['calculate_type'] == 2): ?>
                                <input type="number" name="main_level_num" int="true" step="1" min="0" value="<?php echo intval($area['main_level_num']); ?>"
                                       class="form-control number-form-control" required>
                                <?php else: ?>
                                <input type="number" name="main_level_num" min="0" value="<?php echo $area['main_level_num']; ?>"
                                       class="form-control number-form-control" required>
                                <?php endif; ?>
                            </td>

                            <td>
                                <input type="number" min="0" class="form-control number-form-control"
                                       name="main_level_fee" value="<?php echo $area['main_level_fee']; ?>" required/>
                            </td>

                            <td>
                                <?php if($shipping_fee_detail['calculate_type'] == 2): ?>
                                <input type="number" name="extra_level_num" step="1" min="1" value="<?php echo intval($area['extra_level_num']); ?>"
                                       class="form-control number-form-control" required>
                                <?php else: ?>
                                <input type="number" name="extra_level_num" min="0" value="<?php echo $area['extra_level_num']; ?>"
                                       class="form-control number-form-control" required>
                                <?php endif; ?>
                            </td>

                            <td>
                                <input type="number" min="0" class="form-control number-form-control"
                                       name="per_extra_level_fee" value="<?php echo $area['per_extra_level_fee']; ?>" required/>
                            </td>
                            <td>
                                <?php if(!$area['is_default_area']): ?>
                                <a href="javascript:void(0);" class="text-danger delete-area">删除</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="6" class="text-left">
                                <a href="javascript:void(0);" class="btn btn-primary" id="add-area">新增配送区域</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="help-block help-tips mb-0">根据重量计算运费，当物品不足《首重重量》时，按照《首重费用》计算，超过部分按照《续重重量》和《续重费用》乘积来计算</div>

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 是否生效</label>
                <div class="col-md-5">
                    <label class="radio-inline">
                        <input type="radio" name="is_enabled" value="1" <?php if($shipping_fee_detail['is_enabled'] == 1): ?>checked<?php endif; ?>> 生效
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_enabled" value="0" <?php if($shipping_fee_detail['is_enabled'] == 0): ?>checked<?php endif; if($use_count > 0): ?>disabled<?php endif; ?>> 失效 <?php if($use_count > 0): ?>(已被使用不能设置失效)<?php endif; ?>
                    </label>
                </div>
            </div>
            <?php if($shipping_fee_detail['is_default'] == 0): ?>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span> 是否为默认模板</label>
                <div class="col-md-5">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_default" <?php if($shipping_fee_detail['is_default']== 1): ?>checked<?php endif; ?>/> 是
                    </label>
                </div>
            </div>
            <?php endif; ?>

            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary add" type="submit">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>

        </form>

        <div id="select-region">
            <div class="cont">
                <div class="selectSub dialog-areas">
                    <ul class="js-regions">
                        <li>
                            <div class="dcity clearfix">
                                <!-- 省 -->
                                <div class="province-list">
                                    <?php if(is_array($province_lists) || $province_lists instanceof \think\Collection || $province_lists instanceof \think\Paginator): if( count($province_lists)==0 ) : echo "" ;else: foreach($province_lists as $province_id=>$province): ?>
                                    <div class="ecity">
                                <span class="gareas">
                                    <input data-second-parent-index data-province-id="<?php echo $province_id; ?>"
                                           id="province_<?php echo $province_id; ?>" type="checkbox"
                                           data-province-name="<?php echo $province; ?>"
                                           value="<?php echo $province_id; ?>"/>
                                    <label for="province_<?php echo $province_id; ?>"
                                           title="<?php echo $province; ?>"><?php echo $province; ?></label>
                                    <i class="icon icon-drop-down drop-down" data-level="province"></i>
                                    <!-- 市 -->
                                    <div class="citys">
                                        <?php if(is_array($city_lists[$province_id]) || $city_lists[$province_id] instanceof \think\Collection || $city_lists[$province_id] instanceof \think\Paginator): if( count($city_lists[$province_id])==0 ) : echo "" ;else: foreach($city_lists[$province_id] as $city_id=>$city): ?>
                                            <span class="areas">
                                                <input data-third-parent-index
                                                       data-province-id="<?php echo $province_id; ?>"
                                                       data-city-id="<?php echo $city_id; ?>" value="<?php echo $city_id; ?>"
                                                       id="city_<?php echo $city_id; ?>" type="checkbox"/>
                                                <label for="city_<?php echo $city_id; ?>"
                                                       title="<?php echo $city; ?>"><?php echo $city; ?></label>
                                                <?php if(count($district_lists[$city_id])): ?>
                                                <i class="icon icon-drop-down drop-down" data-level="city"></i>
                                                <?php endif; ?>

                                                <!-- 区 -->
                                                    <div class="district">
                                                    <?php if(is_array($district_lists[$city_id]) || $district_lists[$city_id] instanceof \think\Collection || $district_lists[$city_id] instanceof \think\Paginator): if( count($district_lists[$city_id])==0 ) : echo "" ;else: foreach($district_lists[$city_id] as $district_id=>$district): ?>
                                                    <span class="areas">
                                                        <input data-four-parent-index
                                                               data-province-id="<?php echo $province_id; ?>"
                                                               data-city-id="<?php echo $city_id; ?>"
                                                               value="<?php echo $district_id; ?>"
                                                               id="district_<?php echo $district_id; ?>" type="checkbox"/>
                                                        <label for="district_<?php echo $district_id; ?>"
                                                               title="<?php echo $district; ?>"><?php echo $district; ?></label>
                                                    </span>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </div>
                                            </span>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </span>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- page end -->

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>广州领客信息科技股份有限公司 ©版权所有 粤ICP备14084496号<?php endif; ?></div>
    </div>

</div>
    
<script>
    var shipping_fee_detail = <?php echo json_encode($shipping_fee_detail); ?>;
    var area_tree = {};
    area_tree['province'] =  <?php echo json_encode($province_lists); ?>;
    area_tree['city'] =  <?php echo json_encode($city_lists); ?>;
    area_tree['district'] =  <?php echo json_encode($district_lists); ?>;
    require(['util', 'freight_edit', 'layer'], function (util) {
        var flag = false;
        window.legal = true;
        util.validate($('.form-validate'),function(form){
            if (flag) {
                return false;
            }
            buildData();
            if (!legal){
                util.message('数目输入请输入正整数,金额为正数')
                legal = true
                return false;
            }
            flag = true;
            $.ajax({
                url: __URL(PLATFORMMAIN + "/express/freighttemplateedit"),
                type: "post",
                dataType: 'json',
                data: {"data": JSON.stringify(shipping_fee_detail)},
                success: function (res) {
                    if (parseInt(res.code)) {
                        util.message(res.message,"success", function () {
                            window.location.href = __URL(PLATFORMMAIN + '/Express/freightTemplateList');
                        })
                    } else {
                        util.message(res.message, "danger");
                        flag = false;
                    }
                }
            });
        });

        $('input[name="calculate_type"]').on('change',function(){
            var value = $(this).val();
            if(value==1){
                $('.help-tips').html('根据重量计算运费，当物品不足《首重重量》时，按照《首重费用》计算，超过部分按照《续重重量》和《续重费用》乘积来计算');
            }
            if(value==2){
                $('.help-tips').html('根据件数计算运费，当物品不足《首件数量》时，按照《首件费用》计算，超过部分按照《续件数量》和《续件费用》乘积来计算');
            }
            if(value==3){
                $('.help-tips').html('根据体积计算运费，当物品不足《首体积》时，按照《首体积费用》计算，超过部分按照《续体积》和《续体积费用》乘积来计算');
            }
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

