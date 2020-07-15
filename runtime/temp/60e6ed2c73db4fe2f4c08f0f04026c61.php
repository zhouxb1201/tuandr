<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/www.tuandr.com/addons/customform/template/platform/customerFormSetting.html";i:1583811704;}*/ ?>

<!-- page -->
<form class="form-horizontal pt-15 widthFixedForm">
    <div class="form-group">
        <label class="col-md-2 control-label order_chmod">确认订单填写资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="is_coupon" id="is_coupon" <?php if($all['custom_info']->order_coupon==1): ?>checked<?php endif; ?> >
                <label for="is_coupon" class=""></label>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="order_name" id="order_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->order_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label member">会员资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="member" id="member" <?php if($all['custom_info']->member==1): ?>checked<?php endif; ?> >
                <label for="member" class=""></label>
            </div>

        </div>
        <div class="col-md-4">
            <select class="form-control" name="member_name" id="member_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->member_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php if($all['distributionStatus'] == 1): ?>
    <div class="form-group">
        <label class="col-md-2 control-label district">分销商申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="distributor" id="distributor" <?php if($all['custom_info']->distributor==1): ?>checked<?php endif; ?> >
                <label for="distributor" class=""></label>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="distributor_name" id="distributor_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->distributor_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; if($all['globalbonus'] == 1): ?>
    <div class="form-group">
        <label class="col-md-2 control-label share">股东申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="shareholder" id="shareholder" <?php if($all['custom_info']->shareholder==1): ?>checked<?php endif; ?> >
                <label for="shareholder" class=""></label>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="shareholder_name" id="shareholder_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->shareholder_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; if($all['areabonus'] == 1): ?>
    <div class="form-group">
        <label class="col-md-2 control-label region">区域代理申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="region" id="region" <?php if($all['custom_info']->region==1): ?>checked<?php endif; ?> >
                <label for="region" class=""></label>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="region_name" id="region_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->region_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; if($all['teambonus'] == 1): ?>
    <div class="form-group">
        <label class="col-md-2 control-label captain">队长申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="captain" id="captain" <?php if($all['custom_info']->captain==1): ?>checked<?php endif; ?> >
                <label for="captain" class=""></label>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="captain_name" id="captain_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->captain_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; if($all['channel'] == 1): ?>
    <div class="form-group">
        <label class="col-md-2 control-label channel">渠道商申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="channel_dealer" id="channel_dealer" <?php if($all['custom_info']->channel_dealer==1): ?>checked<?php endif; ?> >
                <label for="channel_dealer" class=""></label>
            </div>

        </div>
        <div class="col-md-4">
            <select class="form-control" name="channel_name" id="channel_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->channel_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div>
    <?php endif; if($all['shopStatus'] == 1): ?>
    <!-- <div class="form-group">
        <label class="col-md-2 control-label shop">店铺入驻申请资料</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" name="shop_apply_dealer" id="shop_apply_dealer" <?php if($all['custom_info']->shop_apply_dealer==1): ?>checked<?php endif; ?> >
                <label for="shop_apply_dealer" class=""></label>
            </div>

        </div>
        <div class="col-md-4">
            <select class="form-control" name="shop_apply_name" id="shop_apply_name" required>
                <option value="">选择模板</option>
                <?php foreach($all['all'] as $tem): if($all['custom_info']->apply_id == $tem['id']): ?>
                <option value="<?php echo $tem['id']; ?>" selected><?php echo $tem['name']; ?></option>
                <?php else: ?>
                <option value="<?php echo $tem['id']; ?>"><?php echo $tem['name']; ?></option>
                <?php endif; endforeach; ?>
            </select>
        </div>
    </div> -->
    <?php endif; ?>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary save" id="save" type="button">保存</button>
            <!--<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>-->
        </div>
    </div>
</form>

<!-- page end -->


<script>
    require(['util'],function(util){
        $("#save").on("click",function () {

            $.ajax({
                type:'POST',
                dataType:'json',
                url:'<?php echo $saveCustomFormSettingUrl; ?>',
                data:{
                    'order_chmod_text' : $('.order_chmod').text(),
                    'member_text' : $('.member').text(),
                    'district_text' : $('.district').text(),
                    'share_text' : $('.share').text(),
                    'region_text' : $('.region').text(),
                    'captain_text' : $('.captain').text(),
                    'channel_text' : $('.channel').text(),
                    'shop_text' : $('.shop').text(),
                    'order_coupon':$("input[name='is_coupon']").is(':checked')?1:0,
                    'member':$("input[name='member']").is(':checked')?1:0,
                    'distributor':$("input[name='distributor']").is(':checked')?1:0,
                    'shareholder':$("input[name='shareholder']").is(':checked')?1:0,
                    'region':$("input[name='region']").is(':checked')?1:0,
                    'captain':$("input[name='captain']").is(':checked')?1:0,
                    'channel_dealer':$("input[name='channel_dealer']").is(':checked')?1:0,
                    'shop_apply_dealer':$("input[name='shop_apply_dealer']").is(':checked')?1:0,
                    'order_id': $("select[name=order_name]").val(),
                    'member_id': $("select[name=member_name]").val(),
                    'distributor_id': $("select[name=distributor_name]").val(),
                    'shareholder_id': $("select[name=shareholder_name]").val(),
                    'region_id': $("select[name=region_name]").val(),
                    'captain_id': $("select[name=captain_name]").val(),
                    'channel_id': $("select[name=channel_name]").val(),
                    'apply_id': $("select[name=shop_apply_name]").val(),
                },
                success:function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINcustomFormSetting'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })

    })
</script>

