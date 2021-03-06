<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/goodhelper/template/admin/goodGatherList.html";i:1586931644;}*/ ?>

<!-- page -->
<div class="alert alert-tips alert-dismissible">
    <ul class="domain-ul">
        <li>1、请先下载微商来商品采集助手，安装并启动。</li>
        <li>2、使用商家账号以及分配给您的接入地址登录采集助手。</li>
        <li>3、采集助手支持淘宝、天猫、天猫超市、京东电商平台的商品采集。</li>
    </ul>
</div>
<form class='form-horizontal widthFixedForm'>
    <div class="form-group">
        <label class="col-md-2 control-label">采集助手</label>
        <div class="col-md-5">
            <div>
                <a class="btn btn-primary" href = "https://pic.vslai.com.cn/attachment/vslspcjzs_v1.4.exe">点击下载</a>
            </div>

            <div class="mb-0 help-block">下载安装后，即可采集商品</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label order_chmod"><span class="text-bright">*</span>接入地址</label>
        <div class="col-md-8">
            <div class="input-group">
                <input class="form-control" type="text" disabled value="<?php echo $realm_ip; ?>/admin/addons/goodhelper/goodhelper/setGoodGather"> <!--wapapi/addons/goodhelper/goodhelper/setGoodGather-->
                <span class="input-group-btn btn btn-primary bbllrr0 copy" data-clipboard-text="<?php echo $realm_ip; ?>/admin/addons/goodhelper/goodhelper/setGoodGather">复制链接</span>
            </div>

            <div class="mb-0 help-block">登录商品助手时把该地址填写至对应位置，否则无法正常使用。</div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>账户密码</label>
        <div class="col-md-5">
                <p class="form-control-static text-red1">使用登录商城后台的账号密码，账号需要有发布商品及商品助手应用权限</p>
        </div>
    </div>
</form>


<script>
    require(['util'], function (util) {
        util.copy();
    });
</script>

