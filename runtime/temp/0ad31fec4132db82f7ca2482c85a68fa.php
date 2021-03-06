<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/www/wwwroot/www.tuandr.com/addons/integral/template/platform/integralCategoryList.html";i:1583811704;}*/ ?>


<style>
    .label-danger a{padding-top:5px;}
</style>


<!-- page -->
<div class="mb-20">
    <a href="<?php echo __URL('platform/Menu/addonmenu?addons=addIntegralCategory'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加分类</a>
</div>
<table class="table v-table table-auto-center tree" >
    <thead>
    <tr>
        <th width="100"></th>
        <th>排序</th>
        <th>商品分类</th>
        <th>关联品类</th>
        <th>是否显示</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($integral_cate_list) || $integral_cate_list instanceof \think\Collection || $integral_cate_list instanceof \think\Paginator): $i = 0; $__LIST__ = $integral_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <tr class="">
        <td class=""></td>
        <td>
            <input type="text" data-category_id="<?php echo $v['integral_category_id']; ?>" class="form-control sort-form-control" value="<?php echo $v['sort']; ?>">
        </td>
        <td>
            <div><input type="text" data-category_id="<?php echo $v['integral_category_id']; ?>" class="form-control change_category_name" value="<?php echo $v['category_name']; ?>"></div>
        </td>
        <td>
            <?php echo $v['attr_name']; ?>
        </td>
        <td>
            <?php if($v['is_visible'] == '1'): ?>
            <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
            <?php else: ?>
            <a href="javascript:void(0);" class="label label-default is_show" data-is_show="1">否</a>
            <?php endif; ?>
            <input type="hidden" name="category_id" value="<?php echo $v['integral_category_id']; ?>">
            <input type="hidden" name="test" value="">
        </td>
        <td class="operationLeft fs-0">
            <input type="hidden" name="category_id" value="<?php echo $v['integral_category_id']; ?>">
            <a href="<?php echo __URL('platform/Menu/addonmenu?addons=addIntegralCategory&category_id='.$v['integral_category_id']); ?>" class="btn-operation">编辑</a>
            <a href="javascript:void(0);" class="btn-operation text-red1 delete_category">删除</a>
            
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

<!-- page end -->



<script>
    require(['util'],function(util){
        util.treegrid('.tree');
        util.tips();

        //删除分类
        $('.delete_category').on('click', function () {
            var category_id = $(this).siblings($("input[name='category_id']")).val();
            util.alert('确认删除此分类吗 ？', function () {
                $.ajax({
                    type : "post",
                    url : "<?php echo $deleteIntegralCategory; ?>",
                    async : true,
                    data : {
                        "category_id" : category_id,
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('platform/Menu/addonmenu?addons=integralCategory'); ?>");
                        }else{
                            util.message(data["message"],'danger');
                        }
                    }
                })
            })
        })
        //排序
        $('.sort-form-control').change(function(){
            var category_id = $(this).data('category_id');
            var sort_val = $(this).val();
            // console.log(category_id);return;
            $.ajax({
                type : "post",
                url : "<?php echo $changeIntegralCategorySort; ?>",
                async : true,
                data : {category_id : category_id, sort_val : sort_val},
                success : function(data) {
                    // console.log(data);return;
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('platform/Menu/addonmenu?addons=integralCategory'); ?>");
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            })
        })
        //修改分类名
        $('.change_category_name').change(function(){
            var category_id = $(this).data('category_id');
            var category_name = $(this).val();
            $.ajax({
                type : "post",
                url : "<?php echo $changeIntegralCategoryName; ?>",
                async : true,
                data : {category_id : category_id, category_name : category_name},
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('platform/Menu/addonmenu?addons=integralCategory'); ?>");
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            })
        })


        //是否显示
        // $('.is_show').click(function(){
        //     test = 'test';
        //     $(this).removeClass('is_show');
        //     var status = $(this).data('is_show');
        //     is_show(this, status);
        // })
        function is_show(obj, status){
            var category_id = $(obj).next().val();
            //0不显示
            if(status == 0){
                var is_visible = 0;
                $msg = '是否更改为不显示？';
            }else{
                var is_visible = 1;
                $msg = '是否更改为显示？';
            }
            util.alert($msg,function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategoryShow'); ?>",
                    async : true,
                    data : {category_id : category_id, is_visible : is_visible},
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('platform/Menu/addonmenu?addons=integralCategory'); ?>");
                        }else{
                            util.message(data["message"],'danger');
                        }
                        $(this).addClass('is_show');
                    }
                })
            })

        }
    })
</script>
