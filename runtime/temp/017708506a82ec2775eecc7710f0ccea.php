<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/www.tuandr.com/addons/store/template/platform/addJobs.html";i:1583811702;}*/ ?>

<!-- page -->
<form class="form-horizontal form-validate pt-15 widthFixedForm">
    <input type="hidden" class="form-control"  id="jobs_id" name="jobs_id" value="<?php echo $jobs_info['jobs_id']; ?>">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>岗位名称</label>
        <div class="col-md-5">
            <input type="text" class="form-control"  id="jobs_name" name="jobs_name" required value="<?php echo $jobs_info['jobs_name']; ?>">
        </div>
    </div>
    <div class="form-group">
            <label class="col-md-2 control-label">岗位权限</label>
            <div class="col-md-9 checkbox">
                <!--复选框-->
                <label>
                    <input type="checkbox"  name="module_id_array" value="1" <?php if(in_array((1), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 扫码核销
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="4" <?php if(in_array((4), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 门店订单
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="5" <?php if(in_array((5), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 销售统计
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="6" <?php if(in_array((6), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 店员管理
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="7" <?php if(in_array((7), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 商品管理
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="8" <?php if(in_array((8), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 售后订单
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="9" <?php if(in_array((9), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 核销记录
                </label>
                <label>
                    <input type="checkbox"  name="module_id_array" value="10" <?php if(in_array((10), is_array($jobs_info['module_id_array'])?$jobs_info['module_id_array']:explode(',',$jobs_info['module_id_array']))): ?> checked <?php endif; ?> > 门店收银
                </label>
            </div>
        </div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary J-submit" type="submit"><?php if($jobs_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['util'], function (util) {
        util.validate($('.form-validate'), function (form) {
            var btnHtml = $('.J-submit').html();
            if($('.J-submit').attr('disabled')==='disabled'){
                return false;
            }
            var jobs_id = $("#jobs_id").val();
            var jobs_name = $("#jobs_name").val();
            var select_box = '';
            $("input[name='module_id_array']:checked").each(function(){
                    select_box = select_box + ',' + $(this).val();
            });
            select_box = select_box.substring(1);
            if(select_box===''){
                util.message('请选择岗位权限', 'danger');
                return;
            }
            $('.J-submit').attr({disabled: "disabled"}).html('提交中...');
            $.ajax({
                type: "post",
                url: "<?php echo $addOrUpdateJobsUrl; ?>",
                data: {
                    'jobs_id': jobs_id,
                    'jobs_name': jobs_name,
                    'module_id_array': select_box
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success',function(){
                            window.location.href="<?php echo __URL('ADDONS_MAINjobsList'); ?>";
                        });
                    } else {
                        util.message(data["message"], 'danger');
                        $('.J-submit').removeAttr('disabled').html(btnHtml);
                    }
                }

            });
        });
    });
</script>

