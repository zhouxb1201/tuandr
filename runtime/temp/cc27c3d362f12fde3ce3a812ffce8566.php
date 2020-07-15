<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/www.tuandr.com/addons/pcport/template/admin/customTemplatePc.html";i:1591181863;s:71:"/www/wwwroot/www.tuandr.com/addons/pcport/template/platform/pcPage.html";i:1591181822;s:77:"/www/wwwroot/www.tuandr.com/addons/pcport/template/platform/pcPageFooter.html";i:1591181822;}*/ ?>
<!--<link rel="stylesheet" href="PLATFORM_NEW_LIB/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/common.css">-->
<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/layer.css">
<link rel="stylesheet" href="PLATFORM_NEW_LIB/swiper/css/swiper.min.css">
<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/pagination.css">

<!--<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/purebox.css">-->
<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/shop.css">
<?php if($style && $style!='default'): ?>
<link rel="stylesheet" href="PLATFORM_NEW_CSS/indexDecorate/css/<?php echo $style; ?>.css">
<?php endif; ?>
<style>
    .v-main{padding-top:45px;padding-left:259px;}
    .v-container{padding:0px;min-height: 0;}
</style>
<div class="v-subnav component mall-component">
    <div class="mall-component-title">
        <ul class="mall-component-title-ul clearfix">
            <li class="active"><a href="#tab1">组件</a></li>
            <li><a href="#tab2">风格</a></li>
        </ul></div>
    <div class="tab_container">
        <div id="tab1" class="tab_content" style="display: block; ">
            <div class="module-list">
                <?php if($type=='custom_templates'): ?>
                <div class="visual-item ui-draggable topBan J-topBanner lyrow" data-mode="topBanner" data-purebox="adv" ectype="visualItme" data-length="1">
                    <div class="drag ui-draggable-handle">
                        <div class="pic toppic">
                            <img src="ADMIN_IMG/decorate/component/component7.png" alt="">
                            <p class="txt">顶部广告</p>
                        </div>
                        <div class="view" style="display: none">
                            <div class="bannerWidth topBanner mallTopBanner" data-type="range">
                                <a href="javascript:void(0);" class="mtb_a"><img src="http://iph.href.lu/1920x80" alt="" class="imgWidth"></a>
                            </div>
                            <div class="setup_box">
                                <div class="barbg"></div>
                                <a href="javascript:void(0);" class="move-edit mtbEdit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                                <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                            </div>
                        </div>


                    </div>
                </div>
                <?php endif; if($type=='home_templates'): ?>
                <div class="visual-item ui-draggable topBan J-topBanner lyrow" data-mode="topBanner" data-purebox="adv" ectype="visualItme" data-length="1">
                    <div class="drag ui-draggable-handle">
                        <div class="pic toppic">
                            <img src="ADMIN_IMG/decorate/component/component7.png" alt="">
                            <p class="txt">顶部广告</p>
                        </div>
                        <div class="view" style="display: none">
                            <div class="bannerWidth topBanner mallTopBanner" data-type="range">
                                <a href="javascript:void(0);" class="mtb_a"><img src="http://iph.href.lu/1920x80" alt="" class="imgWidth"></a>
                            </div>
                            <div class="setup_box">
                                <div class="barbg"></div>
                                <a href="javascript:void(0);" class="move-edit mtbEdit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                                <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="visual-item ui-draggable lunbotu lyrow" data-mode="home_banner" ectype="visualItme" data-length="8" data-purebox="shop_adv" data-li="1">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component6.png" alt="">
                            <p class="txt">多图轮播</p>
                        </div>
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <!--banner图-->
                        <div class="banner bannerWidth" data-type='range'>
                            <div class="swiper-container swiper-container1 swiper-no-swiping">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><a href="javascript:void(0);" class="lbtTwo bg-full" style="background-image:url('http://iph.href.lu/1920x520');width: 100%;height: 100%"></a></div>
                                </div>
                                <!-- 如果需要分页器 -->
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="w1200" style="position: relative;">
                                <div class="vip-outcon">
                                    <div class="vip-con">
                                        <div class="user-img">
                                            <a href="javascript:void(0);"><img src="ADMIN_IMG/decorate/weidenglu.png" alt=""></a>
                                        </div>
                                        <p class="infor">Hi,欢迎来到</p>
                                        <div class="outcon-btn">
                                            <a href="javascript:void(0);" class="login">登录</a>
                                            <a href="javascript:void(0);">注册</a>
                                        </div>
                                        <div class="entrance">
                                            <div class="entrance-title">快捷入口</div>
                                            <div class="entrance-list">
                                                <ul class="clearfix">

                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="entrance-img"><img src="http://iph.href.lu/30x30" alt=""></div>
                                                            <p>我的足迹</p>
                                                        </a>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <?php endif; if($type=='shop_templates'|| $type=='custom_templates'): ?>
                <div class="visual-item ui-draggable lunbotu lyrow" data-mode="lunbo" ectype="visualItme" data-purebox="adv" data-li="1" data-length="8">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component6.png" alt="">
                            <p class="txt">多图轮播</p>
                        </div>
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <!--banner图-->
                        <div class="banner bannerWidth">
                            <div class="swiper-container swiper-container1 swiper-no-swiping">
                                <div class="swiper-wrapper" data-type='range'>
                                    <div class="swiper-slide"><a href="javascript:void(0);" class="lbtTwo bg-full" style="background-image:url('http://iph.href.lu/1920x520');width: 100%;height: 100%"></a></div>
                                </div>
                                <!-- 如果需要分页器 -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; if($type=='home_templates'||$type=='shop_templates'||$type=='goods_templates'|| $type=='custom_templates'): ?>
                <div class="visual-item ui-draggable lyrow" data-mode="singleBanner" data-purebox="singleBanner" ectype="visualItme" data-length="1">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component1.png" alt="">
                            <p class="txt">单图广告</p>
                        </div>
                        <!--编辑删除-->
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <div class="sBanner">
                            <div class="s-banner">
                                <div class="module w1200" data-type="range">
                                    <a href="javascript:void(0);"><img src="http://iph.href.lu/1200x100" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; if($type=='home_templates'||$type=='shop_templates'|| $type=='custom_templates'): ?>
                <div class="visual-item ui-draggable lyrow" data-mode="hot" data-purebox="hot" ectype="visualItme">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component4.png" alt="">
                            <p class="txt">热门活动</p>
                        </div>
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <div class="hotActivity" id="h-storeRec" data-type="range" data-lift="">
                            <div class="w1200 titles">
                                <h3>热门活动</h3>
                            </div>
                            <div class="h-list w1200 clearfix">

                                <div class="h-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="h-img">
                                            <img src="http://iph.href.lu/290x290" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="h-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="h-img">
                                            <img src="http://iph.href.lu/290x290" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="h-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="h-img">
                                            <img src="http://iph.href.lu/290x290" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="h-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="h-img">
                                            <img src="http://iph.href.lu/290x290" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visual-item ui-draggable lyrow" data-mode="homeFloor" data-purebox="homeFloor" data-li="1" ectype="visualItme">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic"><img src="ADMIN_IMG/decorate/component/component5.png" alt=""><p class="txt">主推楼层</p></div>
                        <!--编辑删除-->
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view" data-type="range">
                        <div class="floor-content1">
                            <!--标题栏-->
                            <div class="floor-hd w1200 clearfix">
                                <div class="hd-tit">魅力型男</div>
                            </div>
                            <!--内容栏-->
                            <div class="f1-list w1200 clearfix">

                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/472x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                                <div class="f-list-item">
                                    <a href="javascript:void(0);">
                                        <div class="f-img">
                                            <img src="http://iph.href.lu/230x280" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; if($type=='home_templates'): ?>
                <div class="visual-item ui-draggable lyrow" data-mode="h-shop" data-purebox="homeAdv" data-li="1" ectype="visualItme">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component8.png" alt="">
                            <p class="txt">精选好店</p>
                        </div>
                    </div>
                    <div class="view"  data-type="range">
                        <div class="goodShop">
                            <!--好店列表-->
                            <div class="w1200 goodShopList clearfix">
                                <div class="goodShopList-left fl">
                                    <div class="left-brand-item">
                                        <div class="left-brand-img">
                                            <img src="http://iph.href.lu/290x225" alt="">
                                        </div>
                                        <a href="javascript:void(0);" class="brand-mask">
                                            <div class="coupon">
                                                <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                            </div>
                                            <div class="enter">
                                                <span>点击进入</span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="goodShopList-right fl">
                                    <div class="brand-list">
                                        <ul>

                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="brand-img">
                                                    <img src="http://iph.href.lu/148x74" alt="">
                                                </div>
                                                <a href="javascript:void(0);" class="brand-mask">
                                                    <div class="coupon">
                                                        <span data-spm-anchor-id="875.7931836/B.2016073.i0.31b64265q7qTaZ">伊利</span>
                                                    </div>
                                                    <div class="enter">
                                                        <span>点击进入</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="last">
                                                <div class="brand-img">
                                                    <a href="javascript:void(0);">发现更多好店>></a>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--编辑删除-->
                    <div class="setup_box">
                        <div class="barbg"></div>
                        <a href="javascript:void(0);" class="move-up iconfont icon-up1"></a>
                        <a href="javascript:void(0);" class="move-down iconfont icon-down1"></a>
                        <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="iconfont icon-edit"></i>编辑</a>
                        <a href="javascript:void(0);" class="move-edit move-del"><i class="iconfont icon-delete"></i>删除</a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="visual-item ui-draggable lyrow" data-mode="goodsRecom" data-purebox="goods" ectype="visualItme">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic"><img src="ADMIN_IMG/decorate/component/component2.png" alt=""><p class="txt">商品推荐</p></div>
                        <!--编辑删除-->
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <div class="goodsRecom" data-type="range" data-lift="" data-rec_type="" data-count="" data-sort="">
                            <div class="w1200 titles" data-goodsTitle='title'>
                                <h3>商品推荐</h3>
                            </div>
                            <!--推荐内容-->
                            <div class="goodsRecom-ul w1200">
                                <ul class="clearfix">
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary notproprietary"
                                                                                                                                      href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="product_box">
                                            <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                            <div class="product_info">
                                                <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                                <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                                <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="visual-item ui-draggable lyrow"  data-mode="custom" data-purebox="cust" ectype="visualItme">
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic">
                            <img src="ADMIN_IMG/decorate/component/component3.png" alt="">
                            <p class="txt">自定义区</p>
                        </div>
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit"  ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <div class="custom" data-type="range" data-lift="" <?php if($goods_style==1): ?>style='width:auto;'<?php endif; ?>>
                            <div class="default ui-draggable ui-box-display"></div>

                        </div>
                    </div>
                </div>
                <?php if($type=='shop_templates'): ?>
                <div class="visual-item ui-draggable lyrow" data-mode="service_mode" data-purebox="service" ectype="visualItme" data-length='7'>
                    <div class="drag ui-draggable-handle" data-html="not">
                        <div class="pic"><img src="ADMIN_IMG/decorate/component/component9.png" alt=""><p class="txt">客服中心</p></div>
                        <div class="setup_box" data-html="not">
                            <div class="barbg"></div>
                            <a href="javascript:void(0);" class="move-edit"  ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                            <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
                        </div>
                    </div>
                    <div class="view">
                        <div class="serviceCenter"  data-type="range">
                            <div class="w w1200 clearfix">
                                <div class="left pull-left">客服中心
                                    <span class="desc">Service Center</span>
                                </div>
                                <div class="center pull-left clearfix">
                                    <div class="pull-left beforeSell">售前客服</div>
                                    <ul class="clearfix pull-left serviceList">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="sells"><img src="http://iph.href.lu/62x62" alt=""></div>
                                                <div class="sells-name">来来</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="right pull-left">工作时间:8:00到16:00</div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="bottomWord">
                    拖动组件到装修区域
                </div>
            </div>
        </div>
        <div id="tab2" class="tab_content" style="display: none; ">
            <div class="shopStyle clearfix">
                <div class="style-item <?php if($style=='default' || !$style): ?> selected <?php endif; ?>" data-style="default">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style11.png" alt="">
                    </div>
                    <p>默认</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style1'): ?> selected <?php endif; ?>" data-style="style1" >
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style1.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style2'): ?> selected <?php endif; ?>" data-style="style2">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style2.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style3'): ?> selected <?php endif; ?>" data-style="style3">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style3.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style4'): ?> selected <?php endif; ?>" data-style="style4">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style4.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style5'): ?> selected <?php endif; ?>" data-style="style5">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style5.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style6'): ?> selected <?php endif; ?>" data-style="style6">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style6.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style7'): ?> selected <?php endif; ?>" data-style="style7">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style7.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style8'): ?> selected <?php endif; ?>" data-style="style8">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style8.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style9'): ?> selected <?php endif; ?>" data-style="style9">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style9.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>
                <div class="style-item <?php if($style=='style10'): ?> selected <?php endif; ?>" data-style="style10">
                    <div class="style-pic">
                        <img src="ADMIN_IMG/decorate/component/style10.png" alt="">
                    </div>
                    <p>选用</p>
                    <i></i>
                </div>


            </div>
            <div class="bottomWord">
                选择商城风格
            </div>
        </div>
    </div>
</div> 
<div class="v-header">
    <div class="v-header-box">
        <div class="custom-header-box">
                <div class="custom-header-list flex">
                    <div class="v-logo-padding"><a class="v-logo-img" href="javascript:void(0);" title=""><img src="/public/platform/images/logo2.png" style="height: 27px;max-width: 400px;"></a></div>
                    <div class="custom-header-list-warp flex-center-justify">
                        <i class="icon icon-menu1"></i>
                        <span class="name"><?php echo $shop_name; ?></span>
                        <i class="icon icon-down-arrow"></i>
                    </div>
                    <div class="custom-header-list-box" style="display: none;">
                        <div class="box-head flex-center-justify">
                            <span>我的全部页面</span>
                            <div class="">
                                <a href="javascript:void(0)" class="btn btn-default btn-sm J-manage">管理页面</a>
                            </div>
                        </div>
                        <div class="box-main">
                            <div class="box-main-left">
                                <div class="title">基础页</div>
                                <ul class="list" id="jc-list">

                                </ul>
                            </div>
                            <div class="box-main-right bg-f9">
                                <div class="title">自定义页</div>
                                <ul class="list" id="zd-list">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-header-operate">
                    <a class="btn btn-save btn-success" href="<?php echo $yl_url; ?>" target="_blank">预览</a>
                    <a href="javascript:void(0);" class="J-back btn btn-info" <?php if($is_temp == 0): ?> style="display:none" <?php endif; ?>>还原</a>
                    <a href="javascript:void(0);" class="J-download btn btn-primary">发布</a>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $urlconst; ?>" id="visual_url">
<input type="hidden" class="logo-input-hidden" value="<?php echo $logo_pic; ?>">
<input type="hidden" id="downloadmodalUrl" value="<?php echo $downloadmodalUrl; ?>">
<input type="hidden" id="backmodalUrl" value="<?php echo $backmodalUrl; ?>">
<input type="hidden" id="deletepccustomtemplatetopUrl" value="<?php echo $deletepccustomtemplatetopUrl; ?>">
<input type="hidden" id="hotUrl" value="<?php echo $hotUrl; ?>">
<input type="hidden" id="homeAdvUrl" value="<?php echo $homeAdvUrl; ?>">
<input type="hidden" id="homefloorUrl" value="<?php echo $homefloorUrl; ?>">
<input type="hidden" id="customUrl" value="<?php echo $customUrl; ?>">
<input type="hidden" id="homeBannerUrl" value="<?php echo $homeBannerUrl; ?>">
<input type="hidden" id="bannerUrl" value="<?php echo $bannerUrl; ?>">
<input type="hidden" id="singlebannerUrl" value="<?php echo $singlebannerUrl; ?>">
<input type="hidden" id="navmodeUrl" value="<?php echo $navmodeUrl; ?>">
<input type="hidden" id="homeheadermodeUrl" value="<?php echo $homeheadermodeUrl; ?>">
<input type="hidden" id="helpmodeUrl" value="<?php echo $helpmodeUrl; ?>">
<input type="hidden" id="rightmodeUrl" value="<?php echo $rightmodeUrl; ?>">
<input type="hidden" id="linkmodeUrl" value="<?php echo $linkmodeUrl; ?>">
<input type="hidden" id="copymodeUrl" value="<?php echo $copymodeUrl; ?>">
<input type="hidden" id="goodsinfoUrl" value="<?php echo $goodsinfoUrl; ?>">
<input type="hidden" id="servicemodeUrl" value="<?php echo $servicemodeUrl; ?>">
<input type="hidden" id="shopheadermodeUrl" value="<?php echo $shopheadermodeUrl; ?>">
<input type="hidden" id="homeBannerResponseUrl" value="<?php echo $homeBannerResponseUrl; ?>">
<input type="hidden" id="navmodebackUrl" value="<?php echo $navmodebackUrl; ?>">
<input type="hidden" id="homeheadermodebackUrl" value="<?php echo $homeheadermodebackUrl; ?>">
<input type="hidden" id="addmoduleUrl" value="<?php echo $addmoduleUrl; ?>">
<input type="hidden" id="addsinglebannerUrl" value="<?php echo $addsinglebannerUrl; ?>">
<input type="hidden" id="homefloorresponseUrl" value="<?php echo $homefloorresponseUrl; ?>">
<input type="hidden" id="homeadvinsertUrl" value="<?php echo $homeadvinsertUrl; ?>">
<input type="hidden" id="homeshopUrl" value="<?php echo $homeshopUrl; ?>">
<input type="hidden" id="changedgoodsUrl" value="<?php echo $changedgoodsUrl; ?>">
<input type="hidden" id="servicemodebackUrl" value="<?php echo $servicemodebackUrl; ?>">
<input type="hidden" id="helpmodebackUrl" value="<?php echo $helpmodebackUrl; ?>">
<input type="hidden" id="linkmodebackUrl" value="<?php echo $linkmodebackUrl; ?>">
<input type="hidden" id="copymodebackUrl" value="<?php echo $copymodebackUrl; ?>">
<input type="hidden" id="rightmodebackUrl" value="<?php echo $rightmodebackUrl; ?>">
<input type="hidden" id="fileputvisualUrl" value="<?php echo $fileputvisualUrl; ?>">
<div class="yc_text_html" style="display: none;"></div>
    <div class="pc-page pc-home" ectype="visualShell">
        <?php if($pc_page['out']): ?>
        <?php echo $pc_page['out']; else: if($type=='home_templates' ||  $type == 'custom_templates'): ?>
<div class="pageHome">
    <div class='J-home demo' data-homehtml='topBanner' type='J-top' style="height:80px">

    </div>
    <div class="headers lyrow" data-mode="home_header_mode" data-purebox="home_header_mode" ectype="homeheader">
    <div class="site-nav">
            <div class="w w1200 clearfix">
                <div class="pull-left">欢迎来到团大人电商平台
                    <a href="javascript:void(0);" class="red login">登录</a>
                    <a href="javascript:void(0);" class="red">注册</a>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);">购物车</a>
                    <a href="javascript:void(0);">个人中心</a>
                    <a href="javascript:void(0);">移动商城</a>
                    <?php if($hasHelpcenter): ?><a href="javascript:void(0);">帮助中心</a><?php endif; ?>
                </div>
            </div>
        </div>
    <div class="shopHeader">
            <div class="w w1200 clearfix">

                <div class="fl oneItem">
                    <div class="logo">
                        <a href="javascript:void(0);" class="logo_a"><img src="<?php echo $web_info['logo']; ?>" alt=""></a>
                    </div>
                </div>

                <div class="fl twoItem">
                    <ul class="search-tabs clearfix">
                        <li class="active">商品</li>
                        <li>店铺</li>
                    </ul>
                    <div class="search">
                        <input type="text" class="search_input" placeholder="手机">
                        <button type="submit" class="searchs">搜索</button>
                    </div>
                    <div class="quickSearch" data-type="range">
                    </div>
                </div>

                <div class="fl threeItem">
                    <div class="carBorder">
                        <a href="javascript:void(0);"><i class="icon-cart icon carsIcon"></i> 我的购物车</a>
                        <div class="circle">1</div>
                    </div>
                </div>

            </div>
        </div>
    <div class="setup_box">
        <div class="barbg"></div>
        <a href="javascript:void(0);" class="move-edit" ectype="model_edit"><i class="icon icon-edit"></i>编辑</a>
    </div>
</div>
</div>
<div class="navs lyrow" data-mode="home_nav_mode" data-purebox="home_nav_mode">
    <div class="w w1200 pr" data-type="range">
        <div class="nav_main" >
            <ul class="clearfix navitems" >
                <?php if($attr['showcat']==1): ?>
                <li class="navitems-group"><a class="fore" href="<?php echo __URLS('SHOP_MAIN/goods/category'); ?>" target="_blank">全部分类</a>
                    <?php if($attr['slide']==1): ?>
                    <div class="nav-con">
                        <ul class="normal-nav">
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                            <li class="pr"><a href="javascript:void(0);">女装 / 男装 / 内衣<span class="pa0"><b class="icon-right-arrow icon-dir-right3"></b></span></a> </li>
                        </ul>
                        <div class="index-sort-detail">
                            <div class="cate-list">
                                <div class="sort-two-item">
                                    <!--标题-->
                                    <div class="sort-two-item-title">
                                        <h4>女装</h4>
                                        <a class="more" href="javascript:void(0);">更多></a>
                                    </div>
                                    <!--三级分类-->
                                    <div class="sort-three-item">
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                    </div>
                                </div>
                                <div class="sort-two-item">
                                    <!--标题-->
                                    <div class="sort-two-item-title">
                                        <h4>女装</h4>
                                        <a class="more" href="javascript:void(0);">更多></a>
                                    </div>
                                    <!--三级分类-->
                                    <div class="sort-three-item">
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                    </div>
                                </div>
                                <div class="sort-two-item">
                                    <!--标题-->
                                    <div class="sort-two-item-title">
                                        <h4>女装</h4>
                                        <a class="more" href="javascript:void(0);">更多></a>
                                    </div>
                                    <!--三级分类-->
                                    <div class="sort-three-item">
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                        <a href="javascript:void(0);">羽绒服</a>
                                        <a href="javascript:void(0);">连衣裙</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </li>
                <?php endif; foreach($navigator as $navigator): ?>
                <li class="navitems-group"><a class="fore" href="<?php echo $navigator['url']; ?>"  <?php if($navigator['opennew'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $navigator['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

    </div>
    <div class="setup_box">
        <div class="barbg"></div>
        <a href="javascript:void(0);" class="move-edit menuNavs" ectype="model_edit"><i class="icon icon-edit"></i>编辑</a>
    </div>
</div>
<?php endif; if($type == 'shop_templates' ||  $type == 'goods_templates'): ?>
<div class='pageHome'>
    <div class='J-home'>
        <div class="site-nav">
            <div class="w w1200 clearfix">
                <div class="pull-left">欢迎来到团大人电商平台
                    <a href="javascript:void(0);" class="red login">登录</a>
                    <a href="javascript:void(0);" class="red">注册</a>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0);">购物车</a>
                    <a href="javascript:void(0);">个人中心</a>
                    <?php if($hasHelpcenter): ?><a href="javascript:void(0);">帮助中心</a><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="w w1200 clearfix">
                <div class="pull-left">
                    <div class="logo">
                        <a href="javascript:void(0);"><img src="ADMIN_IMG/decorate/LOGO.png" alt=""></a>
                    </div>
                    <div class="shop">店铺:
                        <span>XXXX旗舰店</span>
                        <a href="javascript:void(0);" class="enterShop">进入店铺</a>
                        <span class="desc">
                        <span>[描述 <b class="red shu">5</b></span>
                    <span>服务 <b class="red shu">5</b></span>
                    <span>物流 <b class="red">5</b>]</span>
                    </span>
                        <!--<a href="javascript:void(0);"><i class="icon icon-down-arrow"></i></a>-->
                    </div>
                </div>
                <div class="pull-right">
                    <div class="search">
                        <input type="text" class="search_input" placeholder="手机">
                        <button type="submit" class="search_store">搜店铺</button>
                        <button type="submit" class="search_web">搜全站</button>
                    </div>
                    <div class="collect_code">
                        <a href="javascript:void(0);">
                            <i class="icon icon-collection1"></i>
                            收藏店铺
                        </a>
                        <a href="javascript:void(0);">
                            <i class="icon icon-qr-code"></i>
                            用手机逛本店
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hd_main store_hd_main">
    <div data-homehtml='shopBanner'>
        <div class="hd_bg">
            <div class="header lyrow ui-draggable ui-box-display" data-mode="header_mode" data-purebox="header" style="padding-bottom: 0px;">
                <div class="storeBanner bannerWidth aa">
                    <div class="banner-box storeBanner-img" data-type="range" >
                        <img src="http://iph.href.lu/1920x120" alt="" class="imgWidth">
                        <div class="storeName">XXXX旗舰店</div>
                    </div>
                    <div class="setup_box" data-html="not">
                        <div class="barbg"></div>
                        <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navs">
        <div class="w w1200 lyrow" data-mode="nav_mode" data-purebox="nav_mode">
            <div class="nav_main"  >
                <ul class="clearfix" data-type="range">
                    <?php foreach($navigator as $navigator): ?>
                    <li class="navitems-group" ><a class="fore" href="<?php echo $navigator['url']; ?>"  <?php if($navigator['opennew'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $navigator['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="setup_box" data-html="not">
                <div class="barbg"></div>
                <a href="javascript:void(0);" class="move-edit menuNavs" ectype="model_edit"><i class="icon icon-edit"></i>编辑</a>
            </div>
        </div>
    </div>
</div>
<?php endif; if($hearder_body != 1): ?>
<div class="prompt" data-html="not">以上为页头区域</div>
<?php if($type == 'goods_templates'): ?>
<div class='w w1200'>
    <div class='goodsleft_1'><img src="ADMIN_IMG/decorate/goodsDetail.png" alt=""></div><!--占位1-->
    <div class='goodsright_1'><img src="ADMIN_IMG/decorate/store-info.png" alt=""></div><!--占位2-->
    <div class='goodsright_2'><img src="ADMIN_IMG/decorate/goodsright_2.png" alt=""></div><!--占位3-->

    <?php endif; ?>
    <div class="demo ui-sortable" <?php if($type == 'goods_templates'): ?>  data-area='J-detailbanner' type='goodst' <?php else: ?> type='default' <?php endif; ?> style="min-height: 100px; background-color: transparent;<?php if($type == 'goods_templates'): ?> display: inline-block;float: left;width: 80%;min-width:80%; <?php endif; ?>" >


</div>
<?php if($type == 'goods_templates'): ?>
<div class='goodsleft_2'><img src="ADMIN_IMG/decorate/goodsleft_2.png" alt=""></div><!--占位4-->
<div class="clearfix"></div>
</div>
<div class="demo ui-sortable" data-area='J-detail' style='display:block;min-height:100px;'>
    <div class="visual-item ui-draggable lyrow" data-mode="goodsRecom" data-purebox="goods" ectype="visualItme" data-diff="0">
        <div class="drag ui-draggable-handle" data-html="not">
            <div class="pic"><img src="ADMIN_IMG/decorate/navLeft_01.png" alt=""><p class="txt">商品推荐</p></div>
            <!--编辑删除-->
            <div class="setup_box" data-html="not">
                <div class="barbg"></div>
                <a href="javascript:void(0);" class="move-edit" ectype='model_edit'><i class="icon icon-edit"></i>编辑</a>
                <a href="javascript:void(0);" class="move-edit move-del"><i class="icon icon-delete"></i>删除</a>
            </div>
        </div>
        <div class="view" style="display: block;">
            <div class="goodsRecom" data-type="range" data-lift="" data-rec_type="" data-count="" data-sort="">
                <div class="w1200 titles" data-goodsTitle='title'>
                    <h3>商品推荐</h3>
                </div>
                <!--推荐内容-->
                <div class="goodsRecom-ul w1200">
                    <ul class="clearfix">
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary notproprietary"
                                                                                                                          href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="product_box">
                                <div class="product_img"><a href="javascript:void(0);"><img src="http://iph.href.lu/220x220" alt=""></a></div>
                                <div class="product_info">
                                    <div class="product_name"><a class="pName" href="javascript:void(0);">时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜时尚潮流眼镜 时尚时尚最时尚时尚潮流眼镜11111111111111111111111111</a></div>
                                    <div class="product_store"><a class="sName" href="javascript:void(0);">美的眼镜旗舰店</a> <a class="proprietary" href="javascript:void(0);">自营</a></div>
                                    <div class="product_sell clearfix"><span class="price pull-left">￥198.00</span><span class="sellsNum pull-right">销量：<b>9999</b></span></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="clearfix"></div>
<?php endif; endif; if($pc_page['bottom']): ?>
        <?php echo $pc_page['bottom']; else: ?>
        <div  data-homehtml='bottom'>
    <?php if($footer_body != 1): ?>
	<!--以上为页头区域-->
	<div class="prompt" data-html="not">以下为尾部公共区域</div>
	<?php endif; ?>
    <div class="footer-bt5 J-shopbottom">
        <div class="guide-icon  ui-sortable-handle  lyrow ui-draggable" data-purebox="banner" data-mode="bottomBanner" ectype="visualItme" data-diff="0" data-length="1" data-bottomBanner="1" data-homehtml='bottomBanner'>
            <div class="s-banner bottom-banner" >
                <div class="module w1200" data-type="range" >
                    <a href="javascript:void(0)"><img width="1200"  src="http://iph.href.lu/1200x112/4CD964/fff"></a>
                </div>
            </div>
            <div class="setup_box" data-html="not">
                <div class="barbg"></div>
                <a href="javascript:void(0);" class="move-edit" ectype="model_edit"><i class="iconfont icon-edit"></i>编辑</a>
            </div>
        </div>
	<!--帮助中心-->
	<div class="dsc-help lyrow" ectype="help"  data-mode="help_mode" data-purebox="help_mode">
		<div class="w1200 clearfix" data-type="range">
			<div class="help-list J-helpList">
				<div class="help-item">
					<h3></h3>
					<ul>

					</ul>
				</div>
			</div>
			<div class="help-cover">
				<div class="help-ctn">
					<div class="help-ctn-mt">
						<span>客服联系方式</span>
					</div>
				</div>
				<div class="help-scan">
					<div class="code">
						<img src="http://iph.href.lu/110x110">
					</div>
				</div>
			</div>

		</div>
		<!--编辑删除-->
		<div class="setup_box">
			<div class="barbg"></div>
			<a href="javascript:void(0);" class="move-edit helpCenter" ectype="model_edit"><i class="icon icon-edit"></i>编辑</a>
		</div>
	</div>
		<!--友情链接-->
	<div class="link pr lyrow" ectype="copy" ectype="link"  data-mode="link_mode" data-purebox="link_mode">
		<div class="about w1200" data-type="range">
		</div>
		<!--编辑删除-->
		<div class="setup_box">
			<div class="barbg"></div>
			<a href="javascript:void(0);" class="move-edit links" ectype="model_edit" >编辑</a>
		</div>
	</div>
	<!--底部-->
	<div class="footer pr lyrow" ectype="copy"  data-mode="copy_mode" data-purebox="copy_mode" >
		<div class="w1200" data-type="range">
			<div class="company copyright">

			</div>
			<div class="web">
				<a href="javascript:void(0)" target="_blank" ><img src="http://iph.href.lu/33x33" alt="" width="33" height="33" /></a>
			</div>
		</div>
		<!--编辑删除-->
		<div class="setup_box">
			<div class="barbg"></div>
			<a href="javascript:void(0);" class="move-edit copyInfo" ectype="model_edit" >编辑</a>
		</div>

	</div>
	<!--右侧固定栏-->
	<div class="rights lyrow" ectype="right"  data-mode="right_mode" data-purebox="right_mode">
		<div style="width: 36px; height:100%;">
			<div class="right-sidebar-con">
				<div class="right-sidebar-main">
					<div class="right-sidebar-panel" data-type="range">

						<div id="quick-links" class="quick-links">
							<ul>
								<li class="quick-area quick-login sidebar-user-trigger">
									<a href="javascript:void(0);" class="quick-links-a">
										<i class="setting"></i>
									</a>
								</li>
								<li class="sidebar-tabs">
									<!-- 购物车 -->
									<div class="cart-list quick-links-a sidebar-cartbox-trigger">
										<i class="cart"></i>
										<div class="span">购物车</div>
										<span class="ECS_CARTINFO">
                                                        <span class="cart_num js-cart-count">0</span>
                                                    <div class="sidebar-cart-box">
                                                        <h3 class="sidebar-panel-header">
                                                            <a href="javascript:void(0);" class="title">
                                                                                            <i class="cart-icon"></i> <em class="title">购物车</em>
                                                                                        </a>
                                                            <span class="close-panel"></span>
                                                        </h3>
                                                    </div>
                                                    </span>
									</div>
								</li>
								<li class="sidebar-tabs" data-ns-flag="love_history">
									<a href="javascript:void(0);" class="mpbtn_history quick-links-a sidebar-historybox-trigger">
										<i class="history"></i>
									</a>
									<!--<div class="popup" style="left: -121px; visibility: hidden;">
                                        <font id="mpbtn_histroy">我看过的</font> <i class="arrow-right"></i>
                                    </div>-->
								</li>
								<li id="collectGoods" class="sidebar-tabs" data-ns-flag="collections_goods">
									<a href="javascript:void(0);" class="mpbtn_collect quick-links-a">
										<i class="collect"></i>
									</a>
									<!--<div class="popup" style="left: -121px; visibility: hidden;">
                                        我收藏的商品 <i class="arrow-right"></i>
                                    </div>-->
								</li>
							</ul>
						</div>

						<div class="quick-toggle">
							<ul>
								<li class="quick-area">
									<a class="quick-links-a" href="javascript:void(0);">
										<i class="customer-service"></i>
									</a>
								</li>
								<li class="quick-area">
									<a class="quick-links-a" href="javascript:void(0);"> <i class="qr-code"></i></a>
									<div class="sidebar-code quick-sidebar" style="display: none;">
										<i class="qr-code"></i>
										<img src="">
									</div>
								</li>
								<li class="returnTop">
									<a href="javascript:void(0);" class="return_top quick-links-a">
										<i class="top"></i>
									</a>
									<!--<div class="popup" style="left: -121px; visibility: hidden;">
                                    返回顶部 <i class="icon icon-notice"></i>
                                </div>-->
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="setup_box" data-html="not">
			<div class="barbg"></div>
			<a href="javascript:void(0);" class="move-edit rightsMenu" ectype="model_edit" style="right: 0px;width:50px;top:200px;text-align: center">编辑</a>
		</div>
	</div>

    </div>
</div>


        <?php endif; ?>
        <input type="hidden" value="<?php echo $code; ?>" id="code">
        <input type="hidden" value="<?php echo $type; ?>" id="type">
    </div>
    <?php if($pc_page['shopbanner']): ?>
    <div class='J-banner' style='display:none;'>
        <?php echo $pc_page['shopbanner']; ?>
    </div>
    <?php endif; ?>
    <div style="display:none;">
        <input type="hidden" name="suffix" value="<?php echo $pc_page['tem']; ?>" data-section="<?php echo $vis_section; ?>" data-type="<?php echo $type; ?>"/>
        <div id="preview-layout"></div>
        <div id="homeheader-layout"></div>
        <div id="head-layout"></div>
        <div id="topBanner-layout"></div>
        <div id="shopBanner-layout"></div>
        <div id="bottom-layout"></div>
    </div>
<!-- 链接模态框（二级）（Modal） -->
<div class="modal fade jump-dia" id="jump" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 99999999">
    <input type="hidden" class="modal-nav-status" >
    <input type="hidden" class="modal-nav-id">
    <input type="hidden" class="modal-nav-type">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">选择链接</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0">
                <div class="mb10">链接<input type="text" id="J-choosedLink" style="width: 90%;margin-left: 10px"></div>

                <div class="infoTab">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#storePage" data-toggle="tab">商场页面</a></li>
                        <li><a href="#goodsSort" data-toggle="tab" onclick='select_cates()'>商品分类</a></li>
                        <li><a href="#goods" data-toggle="tab" onclick='select_goods()'>商品</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="storePage">
                            <div>
                                <p>请选择要跳转的页面</p>
                            </div>
                            <div class="jumpChoose">
                                <div id="fe-tab-link-li-11" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/index'); ?>">商城首页</div>
                                <?php if($shopStatus): ?>
                                <div id="fe-tab-link-li-30" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('ADDONS_SHOP_MAIN','addons=shopStreet'); ?>">店铺街</div>
                                <?php endif; ?>
                                <div id="fe-tab-link-li-12" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/goods/category'); ?>">分类导航</div>
                                <div id="fe-tab-link-li-13" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/goods/goodslist'); ?>">全部商品</div>
                                <div id="fe-tab-link-li-21" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/index'); ?>">会员中心</div>
                                <div id="fe-tab-link-li-22" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/orderlist'); ?>">我的订单</div>
                                <div id="fe-tab-link-li-23" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/goods/cart'); ?>">我的购物车</div>
                                <div id="fe-tab-link-li-24" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/goodscollectionlist'); ?>">我的收藏</div>
                                <div id="fe-tab-link-li-27" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/balancelist'); ?>">余额明细</div>
                                <div id="fe-tab-link-li-28" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/balancewithdrawals'); ?>">余额提现</div>
                                <div id="fe-tab-link-li-29" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/addresslist'); ?>">我的收货地址</div>
                            </div>
                            <div class="jumpChoose">
                                <p class="link-title">自定义装修页面</p>
                                <div class="link-list J-custom-link">
                                    <div class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('ADDONS_SHOP_MAIN','addons=shopIndex&shop_id='.$instance_id); ?>">店铺首页</div>
                                    <div class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('ADDONS_SHOP_MAIN','addons=shopGoodList&shop_id='.$instance_id.'&goods_group_id=0'); ?>">店铺商品列表</div>
                                    <div id="fe-tab-link-li-21" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/index'); ?>">会员中心</div>
                                    <div id="fe-tab-link-li-22" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/orderlist'); ?>">我的订单</div>
                                    <div id="fe-tab-link-li-23" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/goods/cart'); ?>">我的购物车</div>
                                    <div id="fe-tab-link-li-24" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/goodscollectionlist'); ?>">我的收藏</div>
                                    <div id="fe-tab-link-li-27" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/balancelist'); ?>">余额明细</div>
                                    <div id="fe-tab-link-li-28" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/balancewithdrawals'); ?>">余额提现</div>
                                    <div id="fe-tab-link-li-29" class="btn btn-default mylink-nav" onclick="chooseLink(this)" data-href="<?php echo __URLS('SHOP_MAIN/member/addresslist'); ?>">我的收货地址</div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="goodsSort">
                            <div>
                                <p>请选择要跳转的分类</p>
                            </div>
                            <div class="clearfix" id="select_cates">
                                <div class="sortMenu1 sortMenu">

                                </div>
                                <div class="sortMenu2 sortMenu">

                                </div>
                                <div class="sortMenu3 sortMenu">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="goods">
                            <div>
                                <p>请选择要跳转的商品</p>
                            </div>

                            <div class="searchBorder clearfix">
                                <div class="search pull-right" style="width: 200px">
                                    <input type="text" class="searchs" name="keyword" id="select-good-kw" placeholder="请输入商品名称">
                                    <button class="search_to" type="button" onclick="select_goods()">搜索</button>
                                </div>
                            </div>

                            <div class="goodsDes"  id="select-goods">
                                <div class="goods-item"></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="confirmLink()">确定</button>
            </div>
        </div>

    </div>
</div>

<script>
    require(['utilAdmin', 'visualizationB'], function (utilAdmin, modal) {
        $('.custom-header-list-warp').click(function(){
            $('.custom-header-list-box').fadeToggle(150);
        })

        $(document).ready(function(){            
            $('.v-nav').after($('.v-subnav'));    
            $('.v-sidebar').after($('.v-header'));    
        });
        modal.init();
        $('body').on('click', '.mylink-nav', function () {
            $(this).siblings().removeClass('btn-primary');
            $(this).addClass('btn-primary');
        });
        $('.J-manage').on('click', function () {
            var url = "<?php echo $pageEditModalUrl; ?>?code=<?php echo $code; ?>&template_type=<?php echo $type; ?>";
            utilAdmin.confirm('编辑页面信息','url:'+url,function(){
                var template_type = this.$content.find("select[name='template_type']").val();
                var name = this.$content.find("input[name='name']").val();
                var tem = this.$content.find("input[name='tem']").val();
                if (name === "") {
                    utilAdmin.message('模板名称不能为空','danger');
                    return false;
                }
                if (template_type === '') {
                    utilAdmin.message('请选择页面类型','danger');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo $edittemUrl; ?>",
                    data: {"name": name, "template_type": template_type, "tem": tem},
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        if (data.code === 1) {
                            utilAdmin.message('操作成功', 'success', function () {
                                getList(1);
                                getList1(1);
                                $('.J-name').html(name);
                            });
                        } else {
                            utilAdmin.message(data.data, 'danger');
                            return false;
                        }
                    }
                });
            });
        });
        getList(1);
        function getList(page_index) {
            $.ajax({
                type: "post",
                url: "<?php echo $pcCustomTemplateListUrl; ?>",
                async: true,
                data: {
                    "page_index": page_index, "is_page": 1
                },
                success: function (res) {
                    var data = res['data'];
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var curr = data[i];
                            html += '<li class="item">';
                            html += '<a href="' + __URL("ADDONS_ADMIN_MAINpcCustomTemplate&code=" + curr.code + "&type=" + curr.type) + '" title="' + curr.name + '">' + curr.name + '</a>';
                            html += '</li>';
                        }
                    }
                    $("#jc-list").html(html);
                }
            });
        }
        getList1(1);
        function getList1(page_index) {
            $.ajax({
                type: "post",
                url: "<?php echo $pcCustomTemplateListUrl; ?>",
                async: true,
                data: {
                    "page_index": page_index, "is_page": 1, "type": 'diy'
                },
                success: function (res) {
                    var data = res['data'];
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var curr = data[i];
                            html += '<li class="item">';
                            html += '<a href="' + __URL("ADDONS_ADMIN_MAINpcCustomTemplate&code=" + curr.code + "&type=" + curr.type) + '" title="' + curr.name + '">' + curr.name + '</a>';
                            html += '</li>';
                        }
                    }
                    $("#zd-list").html(html);
                }
            });
        }
        function toggleColor(element, dom, toggles) {
            $(element).on("click", dom, function () {
                $(this)
                        .addClass(toggles)
                        .siblings()
                        .removeClass(toggles);
            });
        }
        toggleColor(".search-tabs", "li", "active");
        $('.style-item').click(function () {
            var style = $(this).data('style');
            if ($(this).hasClass('selected')) {
                return;
            }
            layer.confirm('确定使用该风格？', {
                btn: ['确定', '取消']//按钮
            }, function (index) {
                layer.close(index);
                $.ajax({
                    type: "post",
                    data: {
                        "style": style
                    },
                    url: "<?php echo $changestyleUrl; ?>",
                    success: function (data) {
                        if (data.code == 1) {
                            layer.msg('操作成功！', {icon: 1, time: 1000}, function () {
                                window.location.reload();
                            });
                        } else {
                            layer.msg('操作失败！', {icon: 2, time: 1000});
                        }
                    }
                });
            }, function (index) {
                layer.close(index);
            });
        });

        // 组件tab栏切换
        $(".tab_content").hide();
        $("ul.mall-component-title-ul li:first").addClass("active").show();
        $(".tab_content:first").show();
        $("ul.mall-component-title-ul li").click(function () {
            $("ul.mall-component-title-ul li").removeClass("active");
            $(this).addClass("active");
            $(".tab_content").hide();
            var activeTab = $(this)
                    .find("a")
                    .attr("href");
            $(activeTab).fadeIn();
            return false;
        });
        $('body').on('click','[data-toggle="selectUrlPc"]',function(){
            var _this = $(this);
            // var curlId = _this.data('input');
            var elm = _this.siblings('input');
            utilAdmin.linksDialogPc(function(data){
                elm.val(data.params).change();
            })
        });

        // B端装修图片空间1
        $('body').on('click','[data-toggle="decoPicture1"]',function(){
            var _this = $(this);
            var cimg=_this.siblings('.ipt80');
            var pimg=_this.closest('.form-horizontal').find('.pic_src0');
            var input=_this.children('.J-pic');
            utilAdmin.pictureDialog(_this,false,function(data){
                var path = data.path[0];
                cimg.val(path);
                pimg.attr('src',path);
                input.val(path);
            })
        });

        // B端装修图片空间2表格1
        $('body').on('click','[data-toggle="decoPicture2"]',function(){
            var _this = $(this);
            var cimg=_this.siblings('.ipt80');
            var pimg=_this.parents('td').prev('td').find('img');
            var input=_this.children('.J-pic');
            utilAdmin.pictureDialog(_this,false,function(data){
                var path = data.path[0];
                cimg.val(path);
                pimg.attr('src',path);
                input.val(path);
            })
        });

        // B端装修图片空间2表格3(独用)
        $('body').on('click','[data-toggle="decoPicture3"]',function(){
            var _this = $(this);
            var cimg=_this.siblings('.ipt80');
            var pimg=_this.parents('.entrance-imgAddress').siblings('.entrance-img').find('img');
            var input=_this.children('.J-pic');
            utilAdmin.pictureDialog(_this,false,function(data){
                var path = data.path[0];
                cimg.val(path);
                pimg.attr('src',path);
                input.val(path);
            })
        });
        // B端装修图片空间2表格4
        $('body').on('click','[data-toggle="decoPicture4"]',function(){
            var _this = $(this);
            var cimg=_this.siblings('.ipt80');
            var pimg=_this.closest('div').prev().find('img');
            var input=_this.children('.J-pic');
            utilAdmin.pictureDialog(_this,false,function(data){
                var path = data.path[0];
                cimg.val(path);
                pimg.attr('src',path);
                input.val(path);
            })
        });
        // B端装修图片空间2店招
        $('body').on('click','[data-toggle="decoPicture5"]',function(){
            var _this = $(this);
            var pimg=_this.find('img');
            // var input=_this.find('.J-pic');
            utilAdmin.pictureDialog(_this,false,function(data){
                var path = data.path[0];
                var img = '<a href="javascript:;" class="close-box5"><i class="icon icon-danger" style="right: -10px" title="删除"></i><img src='+path+'></a><input type="hidden" id="bgimg" name="bgimg" class="J-pic" value="'+path+'">';
                // pimg.attr('src',path);
                _this.parent().html(img);
                // input.val(path);
            })
        });

        $('body').on('click','.close-box5 .icon',function(e){
             var _this = $(this);
             e && e.stopPropagation ? e.stopPropagation() : window.event.cancelBubble = true;
             var img = '<a href="javascript:void(0);" class="plus-box" data-toggle="decoPicture5"><i class="icon icon-plus"></i><input type="hidden" id="bgimg" name="bgimg" class="J-pic" value=""></a>';
             console.log(img);
             $("#picture-list1").html(img);

        })

    })
</script>