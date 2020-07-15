<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:35:"template/admin/Shop/shopConfig.html";i:1583811758;s:24:"template/admin/base.html";i:1591103601;s:41:"template/admin/controlCommonVariable.html";i:1583811758;s:28:"template/admin/urlModel.html";i:1583811758;}*/ ?>
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
            

<div class="infoTab">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#shopInfo" data-toggle="tab" class="infoSingle">店铺信息</a>
        </li>
        <li><a href="#registerInfo" data-toggle="tab" class="infoSingle">注册信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="shopInfo">
            <form class="form-horizontal widthFixedForm" role="form" id="shopInfoForm">
                <!--店铺信息-->
                <div class="form-group">
                    <div class="col-md-2" style="text-align: right">店铺版本</div>
                    <div class="col-md-8">
                        <?php echo $shop_info['instance_type_info']['type_name']; ?>
                    </div>
                </div>
                <!--店铺名称-->
                <div class="form-group">
                    <label for="shopsName" class="col-md-2 control-label fw">店铺名称</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="shopsName" name="shopsName" value="<?php echo $shop_info['base_info']['shop_name']; ?>" required title="店铺名称不能为空">
                    </div>
                </div>
                <!--所属分类-->
                <div class="form-group">
                    <label for="shopsName" class="col-md-2 control-label fw">所属分类</label>
                    <div class="col-md-8">
                        <select id="group_id" name="group_id" class="form-control" required title="请选择所属分类">
                            <?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): if( count($group_list)==0 ) : echo "" ;else: foreach($group_list as $key=>$group): ?>
                            <option value="<?php echo $group['shop_group_id']; ?>" <?php if($shop_info['group_info']['shop_group_id'] == $group['shop_group_id']): ?> selected <?php endif; ?>><?php echo $group['group_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <!--店铺logo-->
                <div class="form-group">
                    <label for="Logo" class="col-md-2 control-label fw"><span class="red">*</span>店铺logo</label>
                    <div class="col-sm-5">
                        <div class="picture-list" id="Logo">
                            <?php if($shop_info['base_info']['shop_logo_img']): ?>
                            <a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;" title="删除"></i><img data-id="<?php if($shop_info['base_info']['shop_logo']): ?><?php echo $shop_info['base_info']['shop_logo']; endif; ?>" src="<?php echo __IMG($shop_info['base_info']['shop_logo_img']); ?>"></a>
                            <?php else: ?>
                            <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <input type="text" class="visibility" required data-visi-type="singlePicture" name="picture-icon">
                            <?php endif; ?>
                        </div>
                        <!--<input type="hidden" id="Logo" class="J-pic" value="<?php if($shop_info['base_info']['shop_logo']): ?><?php echo $shop_info['base_info']['shop_logo']; endif; ?>"/>-->
                        <p class="help-block">建议400 * 200，支持JPG\GIF\PNG格式</p>
                    </div>
                </div>
                <!--客服qq-->
                <div class="form-group">
                    <label for="shop_qq" class="col-md-2 control-label fw"><span class="red">*</span>客服qq</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="shop_qq" name="shop_qq" value="<?php echo $shop_info['base_info']['shop_qq']; ?>" required >
                    </div>
                </div>
                <!--商家电话-->
                <div class="form-group">
                    <label for="tel" class="col-md-2 control-label fw"><span class="red">*</span>商家电话</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="shop_phone" name="shop_phone" value="<?php echo $shop_info['base_info']['shop_phone']; ?>" required>
                    </div>
                </div>
                <!--店铺介绍-->
                <div class="form-group">
                    <label for="shop_intro" class="col-md-2 control-label fw">店铺介绍</label>
                    <div class="col-md-8">
                        <textarea id="shop_intro" name="shop_intro" class="form-control ta_resize" rows="4"><?php echo $shop_info['base_info']['shop_intro']; ?></textarea>
                    </div>
                </div>
                <!--保存-->
                <div class="form-group add_back">
                    <label class="col-md-2"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn add2">保存</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="registerInfo">
            <form class="form-horizontal widthFixedForm" role="form">
                <div class="screen-title"><span class="text">企业或个人信息</span></div>
                <?php if($shop_info['company_info']['apply_type']==2): ?>
                <!--公司名称-->
                <div class="form-group">
                    <label for="company_name" class="col-md-2 control-label fw">公司名称</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $shop_info['company_info']['company_name']; ?>">
                    </div>
                </div>
                <?php endif; ?>
                <!--公司所在地-->
                <div class="form-group">
                    <label for="address" class="col-md-2 control-label fw"><?php if($shop_info['company_info']['apply_type']==2): ?>公司所在地<?php else: ?>联系地址<?php endif; ?></label>
                    <div class="col-md-5">
                        <div  class="area-form-group" data-toggle="distpicker">
                            <select name="province" id="selProvinces" style='width:180px;float:left;'  class="form-control getProvince">
                                    <option value="-1">请选择省...</option>
                            </select>
                            <select name="city" id="selCities" style='width:180px;float:left;' class="form-control getSelCity">
                                    <option value="-1">请选择市...</option>
                            </select>
                            <select name="district" id="selDistricts" style='width:180px;float:left' class="form-control">
                                    <option value="-1">请选择区...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--公司详细地址-->
                <div class="form-group">
                    <label for="company_address_detail" class="col-md-2 control-label fw">详细地址</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="company_address_detail" name="company_address_detail" value="<?php echo $shop_info['company_info']['company_address_detail']; ?>">
                    </div>
                </div>
                <?php if($shop_info['company_info']['apply_type']=='2'): ?>
                <div class="form-group J-company">
                    <label class="col-md-2 control-label">公司类型</label>
                    <div class="col-md-8">
                        <select id="company_type" name="company_type" class="form-control">
                            <option value="私企" <?php if($shop_info['company_info']['company_type'] == '私企'): ?> selected <?php endif; ?>>私企</option>
                            <option value="个体" <?php if($shop_info['company_info']['company_type'] == '个体'): ?> selected <?php endif; ?>>个体</option>
                            <option value="外企" <?php if($shop_info['company_info']['company_type'] == '外企'): ?> selected <?php endif; ?>>外企</option>
                            <option value="中外合资" <?php if($shop_info['company_info']['company_type'] == '中外合资'): ?> selected <?php endif; ?>>中外合资</option>
                        </select>
                    </div>
                </div>
                <!--公司电话-->
                <div class="form-group">
                    <label for="company_phone" class="col-md-2 control-label fw">公司电话</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="company_phone" name="company_phone" value="<?php echo $shop_info['company_info']['company_phone']; ?>">
                    </div>
                </div>
                <!--员工人数-->
                <div class="form-group">
                    <label for="company_employee_count" class="col-md-2 control-label fw">员工人数</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control"  min='0' id="company_employee_count" name="company_employee_count" value="<?php echo $shop_info['company_info']['company_employee_count']; ?>">
                    </div>
                </div>
                <!--注册资金-->
                <div class="form-group">
                    <label for="company_registered_capital" class="col-md-2 control-label fw">注册资金（万元）</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control"  min='0' id="company_registered_capital" name="company_registered_capital" value="<?php echo $shop_info['company_info']['company_registered_capital']; ?>">
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                        <label class="col-md-2 control-label">联系人姓名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="contacts_name" placeholder="请输入联系人姓名" value="<?php echo $shop_info['company_info']['contacts_name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">联系人电话</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="contacts_phone" placeholder="请输入联系人电话" value="<?php echo $shop_info['company_info']['contacts_phone']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">电子邮箱</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="contacts_email" placeholder="请输入电子邮箱" value="<?php echo $shop_info['company_info']['contacts_email']; ?>">
                        </div>
                    </div>
                <?php if($shop_info['company_info']['apply_type']=='2'): ?>
                <div class="screen-title"><span class="text">营业信息</span></div>
                <!--营业执照号-->
                <div class="form-group">
                        <label class="col-md-2 control-label">营业执照号</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="business_licence_number" placeholder="请输入营业执照号" value="<?php echo $shop_info['company_info']['business_licence_number']; ?>">
                        </div>
                    </div>
                <div class="form-group">
                    <label for="business_licence_number_electronic" class="col-md-2 control-label fw">营业执照</label>
                    <div class="col-sm-5">
                        <!--<a href="javascript:void(0)"  onclick="showAlbum(this, 1, 'selectpic(this)');" style="display: inline-block;">
                            <img class="limit100" src="<?php if($shop_info['company_info']['business_licence_number_electronic']): ?><?php echo $shop_info['company_info']['business_licence_number_electronic']; else: ?>ADMIN_IMG/aa.png<?php endif; ?>" alt="">
                            <input type="hidden" id="business_licence_number_electronic" class="J-pic" value="<?php echo $shop_info['company_info']['business_licence_number_electronic']; ?>"/>
                        </a>-->
                        <div class="picture-list" id="business_licence_number_electronic">
                            <?php if($shop_info['company_info']['business_licence_number_electronic']): ?>
                            <a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;" title="删除"></i><img src="<?php echo $shop_info['company_info']['business_licence_number_electronic']; ?>"></a>
                            <?php else: ?>
                            <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--法定经营范围-->
                <div class="form-group">
                    <label for="business_sphere" class="col-md-2 control-label fw">法定经营范围</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="business_sphere" name="business_sphere" value="<?php echo $shop_info['company_info']['business_sphere']; ?>">
                    </div>
                </div>
                <?php endif; ?>
                <div class="screen-title"><span class="text">身份证</span></div>
                 <div class="form-group">
                        <label class="col-md-2 control-label"><?php if($shop_info['company_info']['apply_type']=='2'): ?>法人<?php endif; ?>身份证号码</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="contacts_card_no" placeholder="请输入身份证号码" value="<?php echo $shop_info['company_info']['contacts_card_no']; ?>">
                        </div>
                    </div>
                <!--手持身份证正面-->
                <div class="form-group">
                    <label for="idcard_positive" class="col-md-2 control-label fw"><?php if($shop_info['company_info']['apply_type']=='2'): ?>法人<?php endif; ?>手持身份证照片</label>
                    <div class="col-md-2">
                        <div class="picture-list" id="contacts_card_electronic_1">
                            <?php if($shop_info['company_info']['contacts_card_electronic_1']): ?>
                            <a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;" title="删除"></i><img src="<?php echo $shop_info['company_info']['contacts_card_electronic_1']; ?>"></a>
                            <?php else: ?>
                            <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--身份证正面-->
                <div class="form-group">
                    <label for="idcard_positive" class="col-md-2 control-label fw">身份证正面照</label>
                    <div class="col-md-5">
                        <div class="picture-list" id="contacts_card_electronic_2">
                            <?php if($shop_info['company_info']['contacts_card_electronic_2']): ?>
                            <a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;" title="删除"></i><img src="<?php echo $shop_info['company_info']['contacts_card_electronic_2']; ?>"></a>
                            <?php else: ?>
                            <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
                <!--身份证反面-->
                <div class="form-group">
                    <label for="idcard_opposite" class="col-md-2 control-label fw">身份证反面照</label>
                    <div class="col-md-8">
                        <div class="picture-list" id="contacts_card_electronic_3">
                            <?php if($shop_info['company_info']['contacts_card_electronic_3']): ?>
                            <a href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;" title="删除"></i><img src="<?php echo $shop_info['company_info']['contacts_card_electronic_3']; ?>"></a>
                            <?php else: ?>
                            <a href="javascript:void(0);" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!--保存-->
                <div class="form-group add_back">
                    <label class="col-md-2"></label>
                    <div class="col-md-5">
                        <button type="button" class="btn add1">保存</button>
                    </div>
                </div>
                <input type="hidden" id="pid" value="<?php echo $shop_info['company_info']['company_province_id']; ?>">
                <input type="hidden" id="cid" value="<?php echo $shop_info['company_info']['company_city_id']; ?>">
                <input type="hidden" id="aid" value="<?php echo $shop_info['company_info']['company_district_id']; ?>">
            </form>
        </div>

    </div>
</div>
<!-- page end -->


<!-- /.modal -->

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
require(['utilAdmin'], function (utilAdmin) {    
var pid = 0, cid = 0, aid = 0;
$(document).ready(function () {
    initProvince("#selProvinces");
    getProvince();
    getSelCity();
    // $('#shopInfoForm').validate();
});
function initProvince(obj) {
    pid = $('#pid').val();
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/getprovince'); ?>",
        dataType: "json",
        success: function (data) {
            if (data != null && data.length > 0) {
                var str = "";
                for (var i = 0; i < data.length; i++) {
                    if (pid == data[i].province_id) {
                        str += '<option selected value="' + data[i].province_id + '">' + data[i].province_name + '</option>';
                    } else {
                        str += '<option value="' + data[i].province_id + '">' + data[i].province_name + '</option>';
                    }
                }
                $(obj).append(str);
            }
        }
    });
}
//选择省份弹出市区
$('.getProvince').on('change', function () {
    var id = $('#selProvinces').val();
    if (id == -1) {
        id = pid;
    }
    cid = $('#cid').val();
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/getcity'); ?>",
        dataType: "json",
        data: {
            "province_id": id
        },
        success: function (data) {
            if (data != null && data.length > 0) {
                var str = "<option value='-1'>请选择市</option>";
                for (var i = 0; i < data.length; i++) {
                    if (cid == data[i].city_id) {
                        str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                    } else {
                        str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                    }
                }
                $('#selCities').html(str);
            }
        }
    });
});
function getProvince() {
    var id = $('#selProvinces').val();
    if (id == -1) {
        id = pid;
    }
    cid = $('#cid').val();
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/getcity'); ?>",
        dataType: "json",
        data: {
            "province_id": id
        },
        success: function (data) {
            if (data != null && data.length > 0) {
                var str = "<option value='-1'>请选择市</option>";
                for (var i = 0; i < data.length; i++) {
                    if (cid == data[i].city_id) {
                        str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                    } else {
                        str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                    }
                }
                $('#selCities').html(str);
            }
        }
    });
}
//选择市区弹出区域
$('.getSelCity').on('change', function () {
    var id = $('#selCities').val();
    aid = $('#aid').val();
    if (id == -1) {
        id = cid;
    }
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/getdistrict'); ?>",
        dataType: "json",
        data: {
            "city_id": id
        },
        success: function (data) {
            if (data != null && data.length > 0) {
                var str = "<option value='-1'>请选择区</option>";
                for (var i = 0; i < data.length; i++) {
                    if (aid == data[i].district_id) {
                        str += '<option selected value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                    } else {
                        str += '<option value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                    }

                }
                $('#selDistricts').html(str);
            }
        }
    });
});
function getSelCity() {
    var id = $('#selCities').val();
    aid = $('#aid').val();
    if (id == -1) {
        id = cid;
    }
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/getdistrict'); ?>",
        dataType: "json",
        data: {
            "city_id": id
        },
        success: function (data) {
            if (data != null && data.length > 0) {
                var str = "<option value='-1'>请选择区</option>";
                for (var i = 0; i < data.length; i++) {
                    if (aid == data[i].district_id) {
                        str += '<option selected value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                    } else {
                        str += '<option value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                    }

                }
                $('#selDistricts').html(str);
            }
        }
    });
}
function setShopConfigAjax() {
    utilAdmin.validate('#shopInfoForm',function(form){
        var shop_logo = $("#Logo").find("img").data("id");
        var shop_qq = $("#shop_qq").val();
        var shop_phone = $("#shop_phone").val();
        var shop_intro = $("#shop_intro").val();
        var shop_name = $("#shopsName").val();
        var group_id = $("#group_id").val();
        $.ajax({
            type: "post",
            url: "<?php echo __URL('ADMIN_MAIN/Shop/shopConfig'); ?>",
            data: {
                'shop_logo': shop_logo,
                'shop_qq': shop_qq,
                'shop_intro': shop_intro,
                'shop_phone': shop_phone,
                'shop_name': shop_name,
                'group_id': group_id
            },
            success: function (data) {
                if (data["code"] > 0) {
                    // layer.msg(data["message"], {icon: 1, time: 1000});
                    utilAdmin.message(data["message"],'success');
                } else {
                    // layer.msg(data["message"], {icon: 2, time: 1000});
                    utilAdmin.message(data["message"],'danger');
                }
            }
        });
    });

}
function setCompanyConfigAjax() {
    var company_name = $("#company_name").val();
    var company_province_id = $("#selProvinces").val();
    var company_city_id = $("#selCities").val();
    var company_district_id = $("#selDistricts").val();
    var company_type = $("#company_type").val();
    var company_address_detail = $("#company_address_detail").val();
    var company_phone = $("#company_phone").val();
    var company_employee_count = $("#company_employee_count").val();
    var company_registered_capital = $("#company_registered_capital").val();
    var contacts_name = $("#contacts_name").val();
    var contacts_phone = $("#contacts_phone").val();
    var contacts_email = $("#contacts_email").val();
    var business_licence_number = $("#business_licence_number").val();
    var business_sphere = $("#business_sphere").val();
    var business_licence_number_electronic = $("#business_licence_number_electronic").find("img").attr("src");
    var contacts_card_no = $("#contacts_card_no").val();
    var contacts_card_electronic_1 = $("#contacts_card_electronic_1").find("img").attr("src");
    var contacts_card_electronic_2 = $("#contacts_card_electronic_2").find("img").attr("src");
    var contacts_card_electronic_3 = $("#contacts_card_electronic_3").find("img").attr("src");
    $.ajax({
        type: "post",
        url: "<?php echo __URL('ADMIN_MAIN/Shop/companyConfig'); ?>",
        data: {
            'company_name': company_name,
            'company_type': company_type,
            'company_province_id': company_province_id,
            'company_city_id': company_city_id,
            'company_district_id': company_district_id,
            'company_address_detail': company_address_detail,
            'company_phone': company_phone,
            'company_employee_count': company_employee_count,
            'company_registered_capital': company_registered_capital,
            'contacts_name': contacts_name,
            'contacts_phone': contacts_phone,
            'contacts_email': contacts_email,
            'business_licence_number': business_licence_number,
            'business_sphere': business_sphere,
            'business_licence_number_electronic': business_licence_number_electronic,
            'contacts_card_no': contacts_card_no,
            'contacts_card_electronic_1': contacts_card_electronic_1,
            'contacts_card_electronic_2': contacts_card_electronic_2,
            'contacts_card_electronic_3': contacts_card_electronic_3,
        },
        success: function (data) {
            if (data["code"] > 0) {
                // layer.msg(data["message"], {icon: 1, time: 1000});
                utilAdmin.message(data["message"],'success');
            } else {
                utilAdmin.message(data["message"],'danger');
            }
        }
    });
}
function selectpic(event) {
    $('#licenseImg').modal('hide');
    var chooseId = $('#J-choose').val();
    var chooseImg = $('#J-choose_img').val();
    if (chooseId === '') {
        return;
    }
    var dom = $(event).attr('dom');
    if(dom=='Logo'){
        $('#' + dom).val(chooseId);
    }else{
        $('#' + dom).val(chooseImg);
    }
    $('#' + dom).siblings('img').removeAttr('style').attr('src', chooseImg);
    $('#shop_logo-error').hide();
}

$('body').on('click','.add1',function(){
    setCompanyConfigAjax();
});

    setShopConfigAjax();

})
</script>

</body>
</html>