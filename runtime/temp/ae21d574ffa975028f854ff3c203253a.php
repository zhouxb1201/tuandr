<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/addShopLevel.html";i:1583811692;}*/ ?>





        <!-- page -->
        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">版本名称</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="type_name" value="<?php echo $shop_level_info['type_name']; ?>" required title="版本名称不能为空">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">备注</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="4" name="type_desc" id="type_desc"><?php echo $shop_level_info['type_desc']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">权限</label>
                <div class="col-md-9">
                    <div class="tree-checkbox-group">
                        <div class="checkbox">
                            <label for="chek_all">
                                <input type="checkbox" name="module_chek" id="chek_all" value="chek_all" />全选
                            </label>
                        </div>
                        <?php if(is_array($module_list_one) || $module_list_one instanceof \think\Collection || $module_list_one instanceof \think\Paginator): $i = 0; $__LIST__ = $module_list_one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="item_chek">
                            <?php if($vo['level'] == 1): ?>
                            <div class="checkbox">
                                <label for="<?php echo $vo['module_id']; ?>">
                                    <input type="checkbox" value="<?php echo $vo['module_id']; ?>" id="<?php echo $vo['module_id']; ?>" name="module_chek"><?php echo $vo['module_name']; ?>
                                </label>
                            </div>
                            <div class="checkbox_seconds">
                                <!--复选框二级选框-->
                                <?php if(is_array($module_list_two) || $module_list_two instanceof \think\Collection || $module_list_two instanceof \think\Paginator): $i = 0; $__LIST__ = $module_list_two;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_two): $mod = ($i % 2 );++$i;if($vo_two['pid'] == $vo['module_id']): ?>
                                <label for="<?php echo $vo_two['module_id']; ?>" class="checkbox-inline">
                                    <input type="checkbox" id="<?php echo $vo_two['module_id']; ?>" value="<?php echo $vo_two['module_id']; ?>" name="module_chek"><?php echo $vo_two['module_name']; ?>
                                </label>
                                <div class="checkbox_three item_content">
                                    <?php if(is_array($module_list_three) || $module_list_three instanceof \think\Collection || $module_list_three instanceof \think\Paginator): $i = 0; $__LIST__ = $module_list_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_three): $mod = ($i % 2 );++$i;if($vo_three['pid'] == $vo_two['module_id']): ?>
                                    <label for="<?php echo $vo_three['module_id']; ?>" class="checkbox-inline">
                                        <input type="checkbox" name="module_chek" id="<?php echo $vo_three['module_id']; ?>" value="<?php echo $vo_three['module_id']; ?>" /><?php echo $vo_three['module_name']; ?>
                                    </label>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>


            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary" type="submit"><?php if($shop_level_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
            <input type="hidden" id="instance_typeid" name="instance_typeid" value="<?php echo $shop_level_info['instance_typeid']; ?>" />
        </form>
        <!-- page end -->


<script>
    require(['util'], function (util) {
        util.validate($('.form-validate'), function (form) {
            var instance_typeid=$('#instance_typeid').val();
            var type_name = $("#type_name").val();
            var type_desc = $("#type_desc").val();
            var type_sort = $("#type_sort").val();
            var type_module_array = '';
            $('input[type="checkbox"]:checked').each(function () {
                if ($(this).val() !== 'chek_all') {
                    type_module_array += $(this).val() + ',';
                }
            });
            type_module_array = type_module_array.substring(0, type_module_array.length - 1);
            if(type_module_array === ''){
                util.message('请选择版本权限','danger');
                return false;
            }
            
            $.ajax({
                type: "post",
                url: "<?php echo $updateShopLevelUrl; ?>",
                data: {
                    'instance_typeid':instance_typeid,
                    'type_name': type_name,
                    'type_desc': type_desc,
                    'type_sort': type_sort,
                    'type_module_array': type_module_array,
                    'website_id': '<?php echo $website_id; ?>'
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message('操作成功', 'success', "<?php echo __URL('ADDONS_MAINshopLevelList'); ?>");
                    } else {
                        util.message("操作失败", 'danger');
                    }
                }
            });
        });
        $(function () {
            var type_module_array = "<?php echo $shop_level_info['type_module_array']; ?>";
            var type_module_array=type_module_array.split(',');
            if (type_module_array.length > 1) {
                $('#chek_all').prop("checked", true);
            }
            for (var i = 0; i < type_module_array.length; i++) {
                $('input[type="checkbox"][value="' + type_module_array[i] + '"]').prop("checked", true);
            }
            //全选
            $('#chek_all').click(function () {
                if ($(this).is(":checked")) {
                    $('input[type="checkbox"]').prop("checked", true);
                } else {
                    $('input[type="checkbox"]').prop("checked", false);
                }
            });

            $('input[type="checkbox"]').click(function () {
                //添加选中
                if ($(this).is(":checked")) {
                    $(this).parents('.item_content').prev().find('input[type="checkbox"]').prop("checked", true);
                    $(this).parents('.item_chek').children('.checkbox').find('input[type="checkbox"]').prop("checked", true);
                     $('#chek_all').prop("checked", true);
                } else { //取消选中
                    if ($(this).parents('.checkbox_seconds').children('label').children('input[type="checkbox"]:checked').length == 0) {
                        $(this).parents('.item_chek').find('input').prop("checked", false);
                    }
                    if ($('input[type="checkbox"]:checked').length == 1) {
                         $('#chek_all').prop("checked", false);
                    }
                }
            });
            //选中取消子集
            $('.checkbox>label>input').click(function () {
                if ($(this).is(":checked")) {
                    $(this).parents('.item_chek').find('input[type="checkbox"]').prop("checked", true);
                } else {
                    $(this).parents('.item_chek').find('input[type="checkbox"]').prop("checked", false);
                }
            });
            $('.checkbox_seconds>label>input').click(function () {
                if ($(this).is(":checked")) {
                    $(this).parent().next('.item_content').find('input[type="checkbox"]').prop("checked", true);
                } else {
                    $(this).parent().next('.item_content').find('input[type="checkbox"]').prop("checked", false);
                }
            });
        });
        window.onload = function () {
            $('.item_content').each(function () {
                if ($(this).find('input[type="checkbox"]').length === 0) {
                    $(this).html('');
                }
            });
        }
    });
</script>
