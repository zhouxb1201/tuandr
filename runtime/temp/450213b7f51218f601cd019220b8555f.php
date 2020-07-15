<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"template/platform/Goods/associateCategoryDialog.html";i:1591330108;}*/ ?>
<form class="form-horizontal">
    <!--关联分类-->
    <div class="form-group" style="margin-right: auto;margin-left: auto;">
        <div class="col-md-12">
            <div class="transfer-box">
                <div class="item" style="width: 100%">
                    <div class="transfer-title">
                        <div class="checkbox line-1-ellipsis flex flex-pack-justify">
                            <div>分类列表</div>
                            <div>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" checked disabled>当前品类已关联</label>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" class="bgcccc" checked disabled>其他品类已关联</label>
                                <label class="checkbox-inline" style="padding-top: 0"><input type="checkbox" name="goods_labels" disabled>未关联品类</label>
                            </div>
                        </div>
                    </div>
                    <div class="transfer-search">
                        <div class="transfer-search-div padding-10" style="padding-bottom: 0">
                            <input type="text" class="form-control" placeholder="请输入分类名称" id="category_txt_selected">
                            <i class="icon icon-custom-search"></i>
                        </div>
                    </div>
                    <div id="category_id" class="heights tree-checkbox-group">
                        <?php if($goodsCategoryList): if(is_array($goodsCategoryList) || $goodsCategoryList instanceof \think\Collection || $goodsCategoryList instanceof \think\Paginator): if( count($goodsCategoryList)==0 ) : echo "" ;else: foreach($goodsCategoryList as $key=>$v): ?>
                        <div class="item_chek">
                            <div class="checkbox checkbox_first">
                                <i class="icon icon-drop-down mr-04"></i><label for="<?php echo $v['category_id']; ?>"> <input type="checkbox" value="<?php echo $v['category_id']; ?>" id="<?php echo $v['category_id']; ?>" name="module_chek" class="checkOne <?php if($v['attr_id'] > 0 && $attr_id != $v['attr_id']): ?>bgccc<?php endif; ?>" <?php if($attr_id == $v['attr_id']): ?> checked <?php endif; ?> data-name="<?php echo $v['category_name']; ?>" ><?php echo $v['category_name']; ?></label>
                            </div>
                            <?php if($v['child_list'] != ''): if(is_array($v['child_list']) || $v['child_list'] instanceof \think\Collection || $v['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                            <div class="checkbox_seconds">
                                <!--复选框二级选框-->
                                 <i class="icon icon-drop-down checkbox_seconds_icon"></i><label for="<?php echo $two['category_id']; ?>" class="checkbox-inline"><input type="checkbox" id="<?php echo $two['category_id']; ?>" value="<?php echo $two['category_id']; ?>" name="module_chek" class="checkTwo <?php if($two['attr_id'] > 0 && $attr_id != $two['attr_id']): ?>bgccc<?php endif; ?>" <?php if($attr_id == $two['attr_id']): ?> checked <?php endif; ?> data-name="<?php echo $two['category_name']; ?>" ><?php echo $two['category_name']; ?></label>
                                 <div class="checkbox_three item_content">
                                <?php if($two['child_list'] != ''): if(is_array($two['child_list']) || $two['child_list'] instanceof \think\Collection || $two['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $two['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?>
                                    <label for="<?php echo $three['category_id']; ?>" class="checkbox-inline"><input type="checkbox" name="module_chek" id="<?php echo $three['category_id']; ?>" value="<?php echo $three['category_id']; ?>" <?php if($attr_id == $three['attr_id']): ?> checked <?php endif; ?> class="checkThree <?php if($three['attr_id'] > 0 && $attr_id != $three['attr_id']): ?>bgccc<?php endif; ?>" data-name="<?php echo $three['category_name']; ?>" ><?php echo $three['category_name']; ?></label>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                 </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

                    </div>
                </div>

            </div>
            <div class="mb-0 help-block">品类需要关联分类使用，发布商品选择分类后自动获取所关联品类的“规格、品牌、属性”等。</div>
        </div>
    </div>
</form>

<script>
require(['util'],function(util){
    // 分类名称搜索
    $("#category_txt_selected").on('keyup', function () {
        var val = $(this).val();
        if(val==''){
            $('.item_chek').removeClass('hide');
            $('.checkbox_first').removeClass('hide');
            $('.checkbox_seconds').removeClass('hide');
            $('.checkbox_three').removeClass('hide');
        }else{
            $('.item_chek').addClass('hide');
            $('.checkbox_first').addClass('hide');
            $('.checkbox_seconds').addClass('hide');
            $('.checkbox_three').addClass('hide');
            $('.checkOne').each(function(i,e){
                var name0 = $(this).data('name')+ '';
                if (name0.indexOf(val) != -1) {
                    $(e).parents('.item_chek').removeClass('hide');
                    $(e).parents('.checkbox_first').removeClass('hide');
                }
            });
            $('.checkTwo').each(function(i,e){
                var name1 = $(this).data('name')+ '';
                if (name1.indexOf(val) != -1) {
                    $(e).parents('.item_chek').removeClass('hide');
                    $(e).parents('.checkbox_seconds').removeClass('hide');
                    $(e).parents('.checkbox_seconds').siblings('.checkbox_first').removeClass('hide');
                }
            });
            $('.checkThree').each(function(i,e){
                var name2 = $(this).data('name')+ '';
                if (name2.indexOf(val) != -1) {
                    $(e).parents('.item_chek').removeClass('hide');
                    $(e).parents('.checkbox_three').removeClass('hide');
                    $(e).parents('.checkbox_seconds').removeClass('hide');
                    $(e).parents('.checkbox_seconds').siblings('.checkbox_first').removeClass('hide');
                }
            });
        }

    })
})
</script>