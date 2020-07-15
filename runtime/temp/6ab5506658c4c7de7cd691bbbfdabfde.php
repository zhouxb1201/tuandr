<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"/www/wwwroot/www.tuandr.com/addons/thingcircle/template/platform/thingcircleTopicList.html";i:1583811702;}*/ ?>

<style>
    .label-danger a{padding-top:5px;}
</style>


            <!-- page -->
            <div class="mb-20">
                <a href="<?php echo __URL('platform/Menu/addonmenu?addons=addThingcircleTopic'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加话题</a>
            </div>
            <table class="table v-table table-auto-center tree" >
                <thead>
                <tr>
                    <?php if(($setup['topic_state']==1)): ?><th class="text-left"><i class="treegrid-expander icon icon-minus toggle_tree"></i></th><?php endif; ?>
                    <th>排序</th>
                    <th>话题名称</th>
                    <th>关联干货数</th>
                    <th>状态</th>
                    <th  class="col-md-2 pr-14 operationLeft">操作</th>
                </tr>
                </thead>
                <tbody >
                    <?php if($topic_list): if(is_array($topic_list) || $topic_list instanceof \think\Collection || $topic_list instanceof \think\Paginator): $i = 0; $__LIST__ = $topic_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v['superiors_id'] == 0): ?>
                <tr class="treegrid-<?php echo $v['topic_id']; ?>">
                    <?php if(($setup['topic_state']==1)): ?>
                    <td class="text-left"></td>
                    <?php endif; ?>
                    <td>
                        <input type="text" data-category_id="<?php echo $v['topic_id']; ?>" class="form-control sort-form-control" value="<?php echo $v['sort']; ?>">
                    </td>
                    <td>
                        <div><input type="text" data-category_id="<?php echo $v['topic_id']; ?>" class="form-control change_category_name" value="<?php echo $v['topic_title']; ?>"></div>
                    </td>
                    
                    <td>
                        <div><?php echo $v['count']; ?></div>
                    </td>
                    <td>
                        <?php if($v['state'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <?php endif; ?>
                        <input type="hidden" name="topic_id" value="<?php echo $v['topic_id']; ?>">
                        <input type="hidden" name="test" value="">
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="topic_id" value="<?php echo $v['topic_id']; ?>">
                        <?php if(($setup['topic_state']==1)): ?>
                        <a href="<?php echo __URL('platform/Menu/addonmenu?addons=addThingcircleTopic&topic_id='.$v['topic_id']); ?>" class="btn-operation">添加子话题</a>
                        <?php endif; ?>
                        <a href="<?php echo __URL('platform/Menu/addonmenu?addons=updateThingcircleTopic&topic_id='.$v['topic_id']); ?>" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_topic text-red1">删除</a>
                        
                    </td>
                </tr>
                <?php if(($setup['topic_state']==1)): if(is_array($v['child_list']) || $v['child_list'] instanceof \think\Collection || $v['child_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                <tr class="treegrid-<?php echo $two['topic_id']; ?> treegrid-parent-<?php echo $two['superiors_id']; ?>">
                    <td class="text-left"></td>
                    <td>
                        <input type="text" data-topic_id="<?php echo $two['topic_id']; ?>" class="form-control sort-form-control" value="<?php echo $two['sort']; ?>">
                    </td>
                    <td>
                        <div class="pl-15"><input type="text" data-topic_id="<?php echo $two['topic_id']; ?>" class="form-control change_category_name" value="<?php echo $two['topic_title']; ?>"></div>
                    </td>
                    <td>
                        <div><?php echo $two['count']; ?></div>
                    </td>
                    <td>
                        <?php if($two['state'] == '1'): ?>
                        <a href="javascript:void(0);" class="label label-success is_show" data-is_show="0">是</a>
                        <?php else: ?>
                        <a href="javascript:void(0);" class="label label-danger is_show" data-is_show="1">否</a>
                        <input type="hidden" name="topic_id" value="<?php echo $two['topic_id']; ?>">
                        <?php endif; ?>
                    </td>
                    <td class="operationLeft fs-0">
                        <input type="hidden" name="topic_id" value="<?php echo $two['topic_id']; ?>">
                        <a href="<?php echo __URL('platform/Menu/addonmenu?addons=updateThingcircleTopic&topic_id='.$two['topic_id']); ?>" class="btn-operation">编辑</a>
                        <a href="javascript:void(0);" class="btn-operation delete_topic text-red1">删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; endif; endforeach; endif; else: echo "" ;endif; else: ?>
                <tr align="center"><td colspan="6">暂无符合条件的数据记录</td></tr>
                <?php endif; ?>
                </tbody>
            </table>

            <!-- page end -->



<script>
    require(['util'],function(util){
        util.treegrid('.tree');
        $(".toggle_tree").toggle(function(){
            $(".tree").treegrid("collapseAll");
            $(this).removeClass("icon-minus").addClass("icon-plus");
        },function(){
            $(".tree").treegrid("expandAll");
            $(this).removeClass("icon-plus").addClass("icon-minus");
        })
        util.tips();

        //删除话题
        $('.delete_topic').on('click', function () {
            var topic_id = $(this).siblings("input[name='topic_id']").val();
            util.alert('确认删除此话题吗 ？', function () {
                $.ajax({
                    type : "post",
                    url : "<?php echo $delThingcircleTopicUrl; ?>",
                    async : true,
                    data : {
                        "topic_id" : topic_id,
                    },
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('ADDONS_MAINtopicList'); ?>");
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
                url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategorySort'); ?>",
                async : true,
                data : {category_id : category_id, sort_val : sort_val},
                success : function(data) {
                    // console.log(data);return;
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
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
                url : "<?php echo __URL('PLATFORM_MAIN/Goods/changeGoodsCategoryName'); ?>",
                async : true,
                data : {category_id : category_id, category_name : category_name},
                success : function(data) {
                    if (data["code"] > 0) {
                        util.message(data["message"],'success',"<?php echo __URL('PLATFORM_MAIN/Goods/goodscategorylist'); ?>");
                    }else{
                        util.message(data["message"],'danger');
                    }
                }
            })
        })

       
        //是否显示
        $('.is_show').click(function(){
            test = 'test';
            $(this).removeClass('is_show');
            var status = $(this).data('is_show');
            is_show(this, status);
        })
        function is_show(obj, status){
            var topic_id = $(obj).next().val();
            util.alert('是否更改状态？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo $changeTopicStateUrl; ?>",
                    async : true,
                    data : {topic_id : topic_id, state : status},
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message(data["message"],'success',"<?php echo __URL('ADDONS_MAINtopicList'); ?>");
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
