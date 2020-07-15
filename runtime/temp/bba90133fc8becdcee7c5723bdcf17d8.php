<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"template/platform/index/preview.html";i:1591330109;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预览页 - <?php if($logo_config['title_word']): ?><?php echo $logo_config['title_word']; else: ?>团大人 - 让更多的人帮你卖货！<?php endif; ?></title>
    <link rel="stylesheet" href="PLATFORM_NEW_LIB/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="PLATFORM_STATIC/css/common.css">
    <link rel="stylesheet" href="PLATFORM_NEW_CSS/platform.css">
    <script>
        var PLATFORMJS = "PLATFORM_NEW_JS";
    </script>
    <script type="text/javascript" src="PLATFORM_NEW_LIB/require.js"></script>
    <script type="text/javascript" src="PLATFORM_NEW_JS/config.js"></script>
    <style>
        .outer-container {
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body style="background-color: #fff">
    <div class="preview-title">当前为商城预览页</div>

    <div class="preWrapper">
        <ul class="preTab">
            <div class="inline-block">预览：</div>
            <li class="tab-item active">移动端</li>
            <?php if($pcportStatus==1): ?>
            <li class="tab-item">PC端</li>
            <?php endif; if($pcportStatus==1): ?>
            <li class="ml-93"><a href="<?php echo __URLS('SHOP_MAIN/index'); ?>" class="btn btn-primary" target="_blank">前往商城首页</a></li>
            <?php endif; ?>
            
        </ul>
        <div class="products">
            <div class="main selected">
                <div class="flex flex-pack-center preview_web">   
                    <div class="preview_web_left outer-container">
                        <iframe src="<?php echo $wap_url; ?>" style="height:580px" marginWidth=0 marginHeight=0  scrolling="auto" frameBorder=0 width="100%"></iframe>
                    </div>
                    <div class="preview_web_right">
                        <div class="preview_web_right_qrbox">
                            <p class="mb-10 preview_border_dashed">微信 / H5端</p>
                            <p class="mb-10">使用微信或手机浏览器扫码访问</p>
                            <div class="preview_code"><img src="<?php echo __URL('PLATFORM_MAIN/index/getWapCode'); ?>" alt=""></div>
                            
                        </div>
                        <?php if($miniprogramStatus == 1): if(!(empty($sun_url) || (($sun_url instanceof \think\Collection || $sun_url instanceof \think\Paginator ) && $sun_url->isEmpty()))): ?>
                        <div class="preview_web_right_qrbox">
                            <p class="mb-10 preview_border_dashed">小程序</p>
                            <p class="mb-10">使用微信扫码访问</p>
                            <div class="preview_code"><img src="<?php echo __IMG($sun_url); ?>" alt=""></div>
                        </div>
                        <?php endif; endif; ?>
                    </div>
                </div>
            </div>
            <div class="main">
                <?php if($pcportStatus==1): ?>
                <iframe src="<?php echo __URLS('SHOP_MAIN/index'); ?>" width="100%" height="860" frameborder="0"></iframe>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        require(['util'],function(util){
            $(".preWrapper .tab-item").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
                $(".products .main").eq($(this).index()-'1').show().siblings().hide();
            })

        })
    </script>

</body>
</html>