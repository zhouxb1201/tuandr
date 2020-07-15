<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/www.tuandr.com/addons/store/template/admin/addAssistant.html";i:1583811702;}*/ ?>

<!-- page -->
<form class="form-horizontal form-validate pt-15 widthFixedForm">
    <input type="hidden" class="form-control"  id="assistant_id" name="assistant_id" value="<?php echo $assistant_info['assistant_id']; ?>">
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>店员名称</label>
        <div class="col-md-5">
            <input type="text" class="form-control"  id="assistant_name" name="assistant_name" required value="<?php echo $assistant_info['assistant_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>所属门店</label>
        <div class="col-md-5">
            <div class=" checkbox">
                <!--复选框-->
                <?php if(is_array($store_list) || $store_list instanceof \think\Collection || $store_list instanceof \think\Paginator): $i = 0; $__LIST__ = $store_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <label>
                    <input type="checkbox"  name="store_id" value="<?php echo $vo['store_id']; ?>" <?php if(in_array(($vo['store_id']), is_array($assistant_info['store_id'])?$assistant_info['store_id']:explode(',',$assistant_info['store_id']))): ?> checked <?php endif; ?> > <?php echo $vo['store_name']; ?>
                </label>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>岗位</label>
        <div class="col-md-5">
            <select class="form-control" name="jobs_id" id="jobs_id" required>
                <option value="">请选择</option>
                <?php if(is_array($jobs_list) || $jobs_list instanceof \think\Collection || $jobs_list instanceof \think\Paginator): $i = 0; $__LIST__ = $jobs_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['jobs_id']; ?>" <?php if($assistant_info['jobs_id'] == $vo['jobs_id']): ?> selected <?php endif; ?>><?php echo $vo['jobs_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>手机号码</label>
        <div class="col-md-5">
            <input type="text" class="form-control"  id="assistant_tel" name="assistant_tel" required value="<?php echo $assistant_info['assistant_tel']; ?>">
        </div>
    </div>
    <?php if(!$assistant_info): ?>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="text-bright">*</span>登录密码</label>
        <div class="col-md-5">
            <input type="text" class="form-control"  id="password" name="password" required value="">
        </div>
    </div>
    <?php endif; if($assistant_info): ?>
    <div class="form-group">
            <label class="col-md-2 control-label">是否启用</label>
            <div class="col-md-5">
                <!--<label class="radio-inline">
                    <input type="radio" name="status" value="1" <?php if($assistant_info['status']): ?> checked <?php endif; ?>> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="0" <?php if(!$assistant_info['status']): ?> checked <?php endif; ?>> 否
                </label>-->
                <div class="switch-inline">
                    <input type="checkbox" name="status" id="status" <?php if($assistant_info['status']): ?> checked <?php endif; ?>>
                    <label for="status" class=""></label>
                </div>

            </div>
        </div>
    <?php else: ?>
    <div class="form-group">
            <label class="col-md-2 control-label">是否启用</label>
            <div class="col-md-5">
                <!--<label class="radio-inline">
                    <input type="radio" name="status" value="1" checked> 是
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="0" > 否
                </label>-->
                <div class="switch-inline">
                    <input type="checkbox" name="status" id="status" checked>
                    <label for="status" class=""></label>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-8">
            <button class="btn btn-primary J-submit" type="submit"><?php if($assistant_info): ?>保存<?php else: ?>添加<?php endif; ?></button>
            <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['utilAdmin'], function (utilAdmin) {
        utilAdmin.validate($('.form-validate'), function (form) {
            var btnHtml = $('.J-submit').html();
            if($('.J-submit').attr('disabled')==='disabled'){
                return false;
            }
            var assistant_id = $("#assistant_id").val();
            var assistant_name = $("#assistant_name").val();
            var assistant_tel = $("#assistant_tel").val();
            var password = $("#password").val();
            var store_id = '';
            $("input[name='store_id']:checked").each(function(){
                    store_id = store_id + ',' + $(this).val();
            });
            store_id = store_id.substring(1);
            if(store_id===''){
                util.message('请选择门店', 'danger');
                return;
            }
            var jobs_id = $("#jobs_id").val();
            var status = $('input[name=status]').is(':checked')?1:0;
            $('.J-submit').attr({disabled: "disabled"}).html('提交中...');
            $.ajax({
                type: "post",
                url: "<?php echo $addOrUpdateAssistantUrl; ?>",
                data: {
                    'assistant_id': assistant_id,
                    'assistant_name': assistant_name,
                    'assistant_tel': assistant_tel,
                    'password': password,
                    'store_id': store_id,
                    'jobs_id': jobs_id,
                    'status': status
                },
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        utilAdmin.message(data["message"], 'success', function () {
                            window.location.href = "<?php echo __URL('ADDONS_ADMIN_MAINassistantList'); ?>";
                        });
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                        $('.J-submit').removeAttr('disabled').html(btnHtml);
                    }
                }

            });
        });
    });
</script>

