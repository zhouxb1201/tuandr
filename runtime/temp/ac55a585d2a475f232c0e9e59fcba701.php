<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/integral/template/platform/integralSetting.html";i:1583811704;}*/ ?>


        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">积分商城</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_integral_open" id="on" <?php if($addons_data['is_use']==1): ?>checked<?php endif; ?> value="1"> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_integral_open" id="off" value="0" <?php if($addons_data['is_use']==0): ?>checked<?php endif; ?>> 关闭
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_integral_open" id="is_integral_open" <?php if($addons_data['is_use']==1): ?>checked<?php endif; ?>>
                        <label for="is_integral_open" class=""></label>
                    </div>
                    <div class="help-block mb-0">关闭后所有商品活动均不生效</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary save" id="save" type="submit">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>



<script>
    require(['util'], function (util) {

        util.validate($('.form-validate'), function (form) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url : "<?php echo $addIntegralSetting; ?>",
                data: {
                    'is_integral_open': $("input[name='is_integral_open']").is(':checked')?1:0,//是否开启砍价
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success');
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
</script>

