<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopSetting.html";i:1583811692;}*/ ?>






        <!-- page -->
        <form class="form-horizontal pt-15 widthFixedForm" onsubmit="return false;" >
            <div class="form-group">
                <label class="col-md-2 control-label">是否启用</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_use" id="is_use" <?php if($shopSetting['is_use'] == 1): ?> checked <?php endif; ?>>
                        <label for="is_use" class=""></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">平台抽成比率</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" min="0" name="platform_commission_percentage" value="<?php echo $shopSetting['value']['platform_commission_percentage']; ?>">
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary J-add" type="button">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>
        <!-- page end -->


<script>
    require(['util'], function (util) {
        $('.J-add').on('click', function () {
            var is_use = $("input[name='is_use']").is(':checked')? 1 : 0;
            var platform_commission_percentage = $("input[name='platform_commission_percentage']").val();
            $.ajax({
                type: "post",
                url: "<?php echo $setShopSettingUrl; ?>",
                data: {
                    'is_use':is_use,
                    'platform_commission_percentage': platform_commission_percentage,
                    'website_id': '<?php echo $website_id; ?>'
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message('操作成功', 'success', "<?php echo __URL('ADDONS_MAINshopSetting'); ?>");
                    } else {
                        util.message("操作失败", 'danger');
                    }
                }
            });
        });
    });
</script>
