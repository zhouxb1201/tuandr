<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"template/platform/Wchat/fansDetail.html";i:1591330114;}*/ ?>
<form class="form-horizontal padding-15" id="">
    <div class="form-group">
        <label class="col-md-3 control-label">粉丝昵称</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list["nickname"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">粉丝openID</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list["openid"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">粉丝分组</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list["group_name"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">关注时间</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list["subscribe_date"]; ?></p>
        </div>
    </div>
</form>