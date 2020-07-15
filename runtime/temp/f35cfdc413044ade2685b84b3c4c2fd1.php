<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:34:"template/platform/index/index.html";i:1591330109;s:31:"template/platform/new_base.html";i:1592227919;s:44:"template/platform/controlCommonVariable.html";i:1591330104;s:31:"template/platform/urlModel.html";i:1591330114;}*/ ?>
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
    
  <style>
	.jconfirm-buttons{
		float: none !important;
		text-align: center !important;
	}
	.v-container{
		background-color: #f5f5f5;
		padding:10px;
		margin-bottom:0px;
		padding-bottom: 0;
	}
    .copyrights{
        margin-top: 0;
    }
</style>
  
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
            
				<!-- page -->
			   <div class="flex">
				   <div style="padding-right: 20px;">

					<?php if($cms_infos): ?>
						<div class="alert alert-tips alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="alert-tips-title"><?php echo $cms_infos['title']; ?> <a href="<?php echo __URL('PLATFORM_MAIN/Mail/cmsInfo'); ?>?topic_id=<?php echo $cms_infos['topic_id']; ?>" target="_blank" class="text-primary view_Detail fs-12">查看详情</a></h4>
						</div>
					<?php endif; ?>

					<!--商城助手-->
					<div class="v-card-body" id="mallGuide">
						<div class="newbie mb-20 flex flex-pack-justify">
							<div class="bold">商城助手</div>
							<div class="pr remove-pr">
								<a href="javascript:void(0);"><i class="icon icon-set"></i></a>
								<div class="remove-pos">
									<div class="remove-arrow">
										<a href="javascript:void(0)" id="remove">永久关闭</a>
									</div>
								</div>
							</div>
						</div>
						<div class="process">
							<div class="procedure">
								<div class="step-number">
									<img src="/public/platform/images/index/1.png" alt="">
									<div class="select">
										<div class="flex">
											<div class="choose">商城基本配置</div>
											<div class="v-tooltip">									
												<span class="tips-box"><i class="icon icon-index-guide"></i></span>
												<div class="v-tooltip-box">
													<div class="v-tooltip-box-arrow">
														<ul class="tooltip-box-ul">
															<li><i class="icon <?php if($basic_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>基本设置</li>
															<li><i class="icon <?php if($trade_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>交易设置</li>
															<li><i class="icon <?php if($withdraw_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>提现设置</li>
															<li><i class="icon <?php if($mobile_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>短信通知</li>
															<li><i class="icon <?php if($pay_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>支付方式</li>
															<li><i class="icon <?php if($return_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>商家地址</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div>
                                            <?php if($basic_set && $trade_set && $withdraw_set && $mobile_set && $pay_set && $return_set): ?>
                                            <span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
                                            <?php else: ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>" class="v-btn-set">前往设置</a>
                                            <?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="procedure">
								<div class="step-number">
									<img src="/public/platform/images/index/2.png" alt="">
									<div class="select">
										<div class="flex">
											<div class="choose">配置物流信息</div>
											<div class="v-tooltip">
												<span class="tips-box"><i class="icon icon-index-guide"></i></span>
												<div class="v-tooltip-box">
													<div class="v-tooltip-box-arrow">
														<ul class="tooltip-box-ul">
															<li><i class="icon <?php if($express_company_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>物流公司</li>
															<li><i class="icon <?php if($shipping_fee_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>运费模板</li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<div>
											<?php if($express_company_set && $shipping_fee_set): ?>
											<span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
											<?php elseif($express_company_set): ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/express/freighttemplatelist'); ?>" class="v-btn-set">前往设置</a>
											<?php elseif($shipping_fee_set): ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/express/expresscompany'); ?>" class="v-btn-set">前往设置</a>
											<?php else: ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/express/expresscompany'); ?>" class="v-btn-set">前往设置</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="procedure">
								<div class="step-number">
									<img src="/public/platform/images/index/4.png" alt="">
									<div class="select">
										<div class="flex">
											<div class="choose">发布商品</div>
											<div class="v-tooltip">
												<span class="tips-box"><i class="icon icon-index-guide"></i></span>
												<div class="v-tooltip-box">
													<div class="v-tooltip-box-arrow">
														<ul class="tooltip-box-ul">
															<li><i class="icon <?php if($category_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>商品分类</li>
															<li><i class="icon <?php if($goods_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>发布商品</li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<div>
											<?php if($category_set && $goods_set): ?>
											<span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
											<?php elseif($goods_set): ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/goods/goodscategorylist'); ?>" class="v-btn-set">前往设置</a>
											<?php elseif($category_set): ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/goods/selfgoodslist'); ?>" class="v-btn-set">前往设置</a>
											<?php else: ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/goods/goodscategorylist'); ?>" class="v-btn-set">前往设置</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="procedure">
								<div class="step-number">
									<img src="/public/platform/images/index/5.png" alt="">
									<div class="select">
										<div class="flex">
											<div class="choose">商城装修</div>
											<div class="v-tooltip">
												<span class="tips-box"><i class="icon icon-index-guide"></i></span>
												<div class="v-tooltip-box">
													<div class="v-tooltip-box-arrow">
														<ul class="tooltip-box-ul">
															<li><i class="icon <?php if($custom_website_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>商城首页</li>
															<?php if($shopStatus): ?>
															<li><i class="icon <?php if($custom_shop_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>店铺首页</li>
															<?php endif; ?>
															<li><i class="icon <?php if($custom_member_set): ?>icon-index-sel<?php else: ?>icon-index-noSel<?php endif; ?>"></i>会员中心</li>
														</ul>
													</div>

												</div>
											</div>
										</div>
										<div>
											<?php if($shopStatus): if($custom_website_set && $custom_shop_set && $custom_member_set): ?>
											<span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
											<?php else: ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/config/customtemplatelist'); ?>" class="v-btn-set">前往设置</a>
											<?php endif; else: if($custom_website_set && $custom_member_set): ?>
											<span class="v-btn-finish"><i class="icon icon-success-l"></i> 完成</span>
											<?php else: ?>
											<a href="<?php echo __URL('PLATFORM_MAIN/config/customtemplatelist'); ?>" class="v-btn-set">前往设置</a>
											<?php endif; endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--商城助手-->
					<!--运营状况-->
					<div class="v-card-body">
						<div class="newbie mb-20 flex flex-pack-justify">
							<div class="bold">运营概况</div>
						</div>
						<div class="engage">
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/6.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">待发货订单</div>
											<div class="pay-num"><a href="<?php echo __URL('PLATFORM_MAIN/order/orderlist'); ?>?order_status=1" class="index-order-red"><?php echo $order_data['daifahuo']; ?></a></div>
										</div>
										<div class="figure">
											<div class="pay-mange">售后订单</div>
											<div class="pay-num"><a href="<?php echo __URL('PLATFORM_MAIN/order/afterorderlist'); ?>" class="index-order-red"><?php echo $order_data['tuikuanzhong']; ?></a></div>
										</div>
										<div class="figure">
											<div class="pay-mange">本月成交订单</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $order_data['complete']; ?></a></div>
											<div class="pay-day">上月：<?php echo $order_data['complete1']; ?></div>
										</div>

									 </div>
								</div>

							</div>
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/7.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">今日营业额</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_money_day1']; ?></a></div>
											<div class="pay-day">昨日：<?php echo $sale_data['sale_money_day2']; ?></div>
										</div>
										<div class="figure">
											<div class="pay-mange">今日支付订单</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_num_day1']; ?></a></div>
											<div class="pay-day">昨日：<?php echo $sale_data['sale_num_day2']; ?></div>
										</div>
										<div class="figure">
											<div class="pay-mange">支付人数</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-red"><?php echo $sale_data['sale_member_day1']; ?></a></div>
											<div class="pay-day">昨日：<?php echo $sale_data['sale_member_day1']; ?></div>
										</div>

									 </div>
								</div>

							</div>
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/8.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">新增分销商</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $sale_data['commission_num1']; ?></a></div>
											<div class="pay-day">昨日：<?php echo $sale_data['commission_num2']; ?></div>
										</div>
										<div class="figure">
											<div class="pay-mange">待审核分销商</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $sale_data['commission_num3']; ?></a></div>
										</div>
										<div class="figure">
											<div class="pay-mange">总分销商数</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $sale_data['commission_num']; ?></a></div>
										</div>

									 </div>
								</div>

							</div>
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/9.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">待处理会员提现</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $withdraws_data['member_withdraw']; ?></a></div>
											
										</div>
										<div class="figure">
											<div class="pay-mange">待处理佣金提现</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $withdraws_data['commission_withdraw']; ?></a></div>
										</div>
										<div class="figure">
											<div class="pay-mange">本月提现佣金</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-blue"><?php echo $withdraws_data['commission1']; ?></a></div>
											<div class="pay-day">上月：<?php echo $withdraws_data['commission2']; ?></div>
										</div>

									 </div>
								</div>

							</div>
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/10.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">新增会员</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $sale_data['member_num1']; ?></a></div>
											<div class="pay-day">昨日:<?php echo $sale_data['member_num2']; ?></div>
											
										</div>
										<div class="figure">
											<div class="pay-mange">今日活跃用户</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $sale_data['visitor_num1']; ?></a></div>
											<div class="pay-day">昨日:<?php echo $sale_data['visitor_num2']; ?></div>
										</div>
										<div class="figure">
											<div class="pay-mange">总会员数</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $sale_data['member_num']; ?></a></div>
											
										</div>

									 </div>
								</div>

							</div>
							<div class="payment">
								<div class="payment-one">
                                    <div class="pay-img"><img src="/public/platform/images/index/11.png" alt=""></div>
									<div class="string"></div>
									<div class="figures">
										<div class="figure">
											<div class="pay-mange">出售中商品</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $goods_data['sale']; ?></a></div>
											
										</div>
										<div class="figure">
											<div class="pay-mange">仓库中商品</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $goods_data['store']; ?></a></div>
										</div>
										<div class="figure">
											<div class="pay-mange">库存预警</div>
											<div class="pay-num"><a href="javascript:void(0)" class="index-order-green"><?php echo $goods_data['warning']; ?></a></div>
											
										</div>

									 </div>
								</div>

							</div>


						</div>
					</div>
					<!--运营状况-->
					<!--快捷入口-->
					<div class="v-card-body">
						<div class="newbie mb-20 flex flex-pack-justify">
							<div class="bold">快捷入口</div>
						</div>
						<div class="succession">
							<div class="balance">
								<a href="<?php echo __URL('PLATFORM_MAIN/goods/addgoods'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/12.png" alt="">
									<div class="ml-10">发布商品</div>
								</a>
								<a href="<?php echo __URL('PLATFORM_MAIN/config/customtemplatelist'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/13.png" alt="">
									<div class="ml-10">商城装修</div>
								</a>
								<a href="<?php echo __URL('PLATFORM_MAIN/wchat/config'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/14.png" alt="">
									<div class="ml-10" style="margin-left: 9px;">公众号管理</div>
								</a>
								<a href="<?php echo __URL('PLATFORM_MAIN/order/orderlist'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/15.png" alt="">
									<div class="ml-10">订单管理</div>
								</a>
								<a href="<?php echo __URL('PLATFORM_MAIN/statistics/orderDistribution'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/16.png" alt="">
									<div class="ml-10">订单分析</div>
								</a>
								<a href="<?php echo __URL('ADDONS_MAINdistributorList'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/17.png" alt="">
									<div class="ml-10">分销商</div>
								</a>
								<a href="<?php echo __URL('ADDONS_MAINformList'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/18.png" alt="">
									<div class="ml-10">发货助手</div>
								</a>
								<a href="<?php echo __URL('ADDONS_MAINgoodImportHelper'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/19.png" alt="">
									<div class="ml-10">商品助手</div>
								</a>
								<a href="<?php echo __URL('ADDONS_MAINcouponTypeList'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/20.png" alt="">
									<div class="ml-10">优惠券</div>
								</a>
								<a href="<?php echo __URL('ADDONS_MAINfullCutList'); ?>" class="balanceOperation">
									<img src="/public/platform/images/index/21.png" alt="">
									<div class="ml-10">满减送</div>
								</a>
							</div>
						</div>
					</div>
					<!--快捷入口-->
					<div class="row">
						<div class="col-sm-6 pr-10">
							<div class="v-card-body">
								<div class="newbie mb-20 flex flex-pack-justify">
									<div class="bold">订单概况</div>
								</div>
								<div class="tab-content mb" style="margin-bottom: 5px">
									<div role="tabpanel" class="tab-pane fade in active" id="order" style="height: 300px;"></div>
									<div role="tabpanel" class="tab-pane fade" id="trade" style="height: 300px;"></div>
								</div>

							</div>
						</div>
						<div class="col-sm-6 tradeState pl-10">
							<div class="v-card-body">
								<div class="newbie mb-20 flex flex-pack-justify">
									<div class="bold">转化概况</div>
								</div>

								<div class="panel-body pr panel-paddings">
									<div class="left ">
										<div class="left-data">
											<div class="ts-item" style="background-color: #f2f6fd">
												<ul class="ts-item-ul clearfix">
													<li>
													<p>访客人数</p>
													<p id="visitor_num" class="index-order-red"></p>
													</li>
												</ul>

											</div>
											<div class="ts-item" style="background-color: #eff8f0">
												<ul class="ts-item-ul clearfix">
													<li>
													<p>下单买家数</p>
													<p id="order_num" class="index-order-red"></p>
													</li>
													<li>
													<p>下单金额</p>
													<p id="order_money" class="index-order-red"></p>
													</li>
												</ul>
											</div>
											<div class="ts-item" style="background-color: #fdf7ed">
												<ul class="ts-item-ul clearfix">
													<li>
													<p>支付买家数</p>
													<p id="pay_num" class="index-order-red"></p>
													</li>
													<li>
													<p>支付金额</p>
													<p id="pay_money" class="index-order-red"></p>
													</li>
													<li>
													<p>客单价</p>
													<p id="unit_price" class="index-order-red"></p>
													</li>
												</ul>
											</div>
										</div>
										<div class="left-chart">
											<div class="pr">
												<div class="rate-item1">
													<p>转化率</p>
													<p id="order_conversion" class="index-order-red"></p>
												</div>
												<div class="rate-item2">
													<p>转化率</p>
													<p id="orderpay_conversion" class="index-order-red"></p>
												</div>
												<div class="rate-item3">
													<p>转化率</p>
													<p id="pay_conversion" class="index-order-red"></p>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				   </div>
			   </div>








<input type="hidden" id="merchant_expire" value="<?php echo $merchant_expire; ?>">
<input type="hidden" id="merchant" value="<?php echo $web_info['version']; ?>">

        </div>
        <div class="copyrights"> <?php if($logo_config['opera_copyright']): ?><?php echo $logo_config['opera_copyright']; else: ?>团大人<?php endif; ?></div>
    </div>

</div>
    
<script>
    require(['util'],function(util){
        if($("#merchant_expire").val()==1){
            var merchant = $("#merchant").val();
			var html = '';
			html += '<h2 class="text-center" style="font-size:16px;font-weight:bold">温馨提示</h2><div style="font-size: 14px;padding-top: 20px">您使用的'+merchant+'已过期!系统部分功能可能受到限制，请及时联系我们客服进行续费，以免影响商城正常运作！点击联系<a href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT84941002&lng=cn" target="_blank" class="text-primary">QQ客服</a>，电话客服：<span class="text-danger">400-889-6625</span></div>';
			util.confirmExpire('',html,function(){
				window.open("http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT84941002&lng=cn")
			});
		}
            getTransactionStatus(1);
            loading();

    		$('#emoji').on('click',function(){
    			util.emojiDialog(function(data){
    			})
    		})
	        $('#tips').on('click',function(){
	            util.message('删除成功','success')
	        })
	        $('#picture').on('click',function(){
	            var _this = $(this);
	            util.pictureDialog(_this,false,function(res){
	                util.message('选择了 '+res.path[0])
	            })
	        })
	        $('#icon').on('click', function () {
	            util.iconsDialog(function(data){
                    util.message('你选择了'+data)
                })
	        });
	        $('#wap_icon').on('click', function () {
	            util.wap_iconsDialog(function(data){
                    util.message('你选择了'+data)
                })
	        });
	        $('#confirm').on('click',function(){
	            util.alert('内容',function(){
	            	util.message('你点击了确定')
	            })
	        })
	        $('#material').on('click',function(){
	            util.materialDialog()
	        })
	        $('#link').on('click',function(){
	        	util.linksDialog(function(data){
	        	})
	        });
	        $('#goods').on('click',function(){
	        	util.goodsDialog(function(data){
	        	})
	        });
	        $('#shop').on('click',function(){
	        	util.shopDialog(function(data){
	        	})
	        });
        function getTransactionStatus(time) {
            $.ajax({
                type:"post",
                url : "<?php echo __URL('PLATFORM_MAIN/index/getTransactionStatus'); ?>",
                async : true,
                data :{'times':time},
                success : function(data) {
                    $("#vistor").html(data['visitor_num']);
                    $("#visitor_num").html(data['visitor_num']);
					$("#order_num").html(data['order_num']);
                    $("#order_money").html(data['order_money']);
                    $("#pay_num").html(data['pay_num']);
                    $("#pay_money").html(data['pay_money']);
                    $("#unit_price").html(data['unit_price']);
                    $("#order_conversion").html(data['order_conversion']);
                    $("#orderpay_conversion").html(data['orderpay_conversion']);
                    $("#pay_conversion").html(data['pay_conversion']);
                }
            });
        }
        function loading(){
            $.ajax({
                type : "post",
                url : "<?php echo __URL('PLATFORM_MAIN/index/getOrderMovementsChartCount'); ?>",
                async : true,
                success : function(data) {
                    var orderOption = {
                        title: {
                            subtext: '近七日自营订单走势',
							left: 'center',
							top:'20'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['订单量','付款订单','售后订单'],
							left: 'center',
                            // top: '30px',
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        // toolbox: {
                        //     feature: {
                        //         saveAsImage: {}
                        //     }
                        // },

                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data: data[0]
                        },
                        yAxis: {
                            type: 'value',
							name:'数量'
                        },
                        series: [
                            {
                                name:'订单量',
                                type:'line',
                                // stack: '总量',
                                data:data[1][0]['data']
                            },
                            {
                                name:'付款订单',
                                type:'line',
                                // stack: '总量',
                                data:data[1][1]['data']
                            },
                            {
                                name:'售后订单',
                                type:'line',
                                // stack: '总量',
                                data:data[1][2]['data']
                            }
                        ]
                    };
                    util.chart('order',orderOption);
                }
            });
        }

		// 永久移除点击事件
		$("#remove").on("click",function(){
			util.alert("移除模块后，商家后台首页将不会再呈现商城助手。",function(){
				$("#mallGuide").fadeOut();
			})
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

