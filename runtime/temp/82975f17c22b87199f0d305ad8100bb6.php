<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/addShopGroup.html";i:1583811694;}*/ ?>





        <!-- page -->
        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>分类名称</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="group_name" value="<?php echo $shop_group_info['group_name']; ?>" required title="分类名称不能为空">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">排序</label>
                <div class="col-md-5">
                    <input type="number" class="form-control" id="group_sort" value="<?php echo $shop_group_info['group_sort']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">是否显示</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_visible" value="1" <?php if($shop_group_info['is_visible']==1): ?> checked="checked" <?php endif; ?>> 是
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_visible" value="0" <?php if(!$shop_group_info['is_visible']): ?> checked="checked" <?php endif; ?>> 否
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_visible" id="is_visible" <?php if($shop_group_info['is_visible']==1): ?> checked="checked" <?php endif; ?>>
                        <label for="is_visible" class=""></label>
                    </div>
                </div>
            </div>


            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <input type="hidden" name="shop_group_id" id="shop_group_id" value="<?php echo $shop_group_info['shop_group_id']; ?>">
                    <button class="btn btn-primary" type="submit"><?php if($shop_group_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>

        <!-- page end -->


<script>
    require(['util'], function (util) {
        //添加店铺
            util.validate($('.form-validate'), function (form) {
                var group_name = $("#group_name").val();
                var group_sort = $("#group_sort").val();
                var shop_group_id = $("#shop_group_id").val();
                var is_visible = $('input[name=is_visible]').is(':checked')? 1 : 0;

                $.ajax({
                    type: "post",
                    url: "<?php echo $updateShopGroupUrl; ?>",
                    data: {
                        'group_name': group_name,
                        'group_sort': group_sort,
                        'shop_group_id': shop_group_id,
                        'is_visible': is_visible,
                        'website_id': '<?php echo $website_id; ?>'
                    },
                    async: true,
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message('添加成功', 'success', "<?php echo __URL('ADDONS_MAINshopGroupList'); ?>");
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            });
    });
</script>
