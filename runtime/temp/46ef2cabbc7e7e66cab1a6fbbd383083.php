<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"template/platform/Finance/pointDetail.html";i:1583811744;}*/ ?>
<form class="form-horizontal padding-15" id="">
    <div class="form-group">
        <label class="col-md-3 control-label">积分流水号</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["records_no"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">会员信息</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["user_tel"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">变动类型</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["type_name"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">变动积分</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["number"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">变动时间</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["create_time"]; ?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">描述</label>
        <div class="col-md-8">
            <p class="form-control-static"><?php echo $list[0]["text"]; ?></p>
        </div>
    </div>
</form>