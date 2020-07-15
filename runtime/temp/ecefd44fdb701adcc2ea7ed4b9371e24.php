<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/pcport/template/admin/createTemplate.html";i:1591181862;}*/ ?>
<form class="form-horizontal padding-15 J-addTemplate" ><ul class="nav nav-tabs v-nav-tabs" role="tablist" style="margin-left: 14px;margin-right: 14px;">
        <?php foreach($typeList as $key => $type): ?>
        <li role="template" <?php if($key=='shop_templates'): ?>class="active"<?php endif; ?> data-type='<?php echo $key; ?>'><a href="javascript:void(0)" aria-controls="index" role="tab" data-toggle="tab" class="flex-auto-center J-type"><?php echo $type; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="template-list">
        <ul class="template-list-ul clearfix J-defaultList">

        </ul>
    </div>
</form>
<script>
    require(['utilAdmin'], function (utilAdmin) {
        getTemplateList();

        function getTemplateList() {
            var type = $('li[role=template].active').data('type');
            $.ajax({
                type: "post",
                url: "<?php echo $pcDefaultTemplateListUrl; ?>",
                async: true,
                data: {
                    "template_type": type
                },
                success: function (res) {
                    var data = res['data'];
                    var html = '<li>';
                    html += '<div class="template-list-pic"><img src="/public/static/images/customPC/blankTemplate.png" alt=""></div>';
                    html += '<p class="template-list-title">空白模板</p>';
                    html += '<p class="template-list-button"><a href="javascript:void(0);" class="template-list-button-a J-create_now" data-name="空白模板">立即创建</a></p>';
                    html += '</li>';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var curr = data[i];
                            if (curr.screenshot == '') {
                                curr.screenshot = '/public/static/images/customPC/blankTemplate.png';
                            }
                            html += '<li>';
                            html += '<div class="template-list-pic"><img style="width:140px;height:140px" src="' + __IMG(curr.screenshot) + '" alt=""></div>';
                            html += '<p class="template-list-title">' + curr.name + '</p>';
                            html += '<p class="template-list-button"><a href="javascript:void(0);" class="template-list-button-a J-create_now" data-code="' + curr.code + '" data-name="' + curr.name + '">立即创建</a></p>';
                            html += '</li>';
                        }
                    }
                    $(".J-defaultList").html(html);
                }
            });
        }

        //切换模板类型
        $('.J-type').on('shown.bs.tab', function () {
            getTemplateList();
        });
        $('.J-defaultList').on('click', '.J-create_now', function () {
            var template_type = $('li[role=template].active').data('type');
            var template_code = $(this).data('code');
            var name = $(this).data('name');
            if (template_type == '') {
                template_type = 'home_templates';
            }
            $.ajax({
                type: "post",
                url: "<?php echo $createTemplateUrl; ?>",
                data: {"template_type": template_type, "template_code": template_code, "name": name},
                dataType: "json",
                async: true,
                success: function (data) {
                    if (data.error == 0) {
                        utilAdmin.message(data["message"], 'success', __URL('ADDONS_ADMIN_MAINpcCustomTemplate&code=' + data.code + '&type=' + data.type));
                    } else {
                        utilAdmin.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
        
</script>