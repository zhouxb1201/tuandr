<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/helpcenter/template/platform/addQuestion.html";i:1583811702;}*/ ?>

<!-- page -->
<form class="form-horizontal form-validate pt-15 widthFixedForm">

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>问题名称</label>
        <div class="col-md-5">
            <input type="text" class="form-control"  id="title" name="title" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>问题分类</label>
        <div class="col-md-5">
            <select id="cate_id" name="cate_id" class="form-control" required>
                <option value="">请选择</option>
                <?php if(is_array($questionCateList['data']) || $questionCateList['data'] instanceof \think\Collection || $questionCateList['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $questionCateList['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['cate_id']; ?>"><?php echo $vo['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>问题内容</label>
        <div class="col-md-9">
            <div id="UE-article-content" data-content='' required></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">排序</label>
        <div class="col-md-2">
            <input type="number" min="0" class="form-control" id="sort" name="sort" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">是否显示</label>
        <div class="col-md-2">
            <div class="switch-inline">
                <input type="checkbox" id="switch1" name="switch1">
                <label for="switch1" class=""></label>
            </div>
        </div>
    </div>

    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary " type="submit">添加</button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['util'], function (util) {
        util.validate($('.form-validate'), function (form) {
            var title = $("#title").val();
            var cate_id = $("#cate_id").val();
            var sort = $("#sort").val();
            var status = 0;
            if ($("#switch1").is(":checked")) {
                status = 1;
            }
            var content = $('#UE-article-content').data('content');
            if (content) {
                $.ajax({
                    type: "post",
                    url: "<?php echo $addQuestionUrl; ?>",
                    data: {
                        'title': title,
                        'cate_id': cate_id,
                        'content': content,
                        'sort': sort,
                        'status': status
                    },
                    async: true,
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINquestionList'); ?>");
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }

                });
            } else {
                util.message('请填写文章内容');
            }

        });
    });
</script>

