<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/platform/mpTemplateDialog.html";i:1583811700;}*/ ?>
<form class="form-horizontal padding-15">
    <div id="content_type">
        <ul class="nav nav-tabs v-nav-tabs" role="tablist" style="margin-left: 14px;margin-right: 14px;">
            <li role="presentation" class="active"><a href="#index" aria-controls="index" role="tab" data-toggle="tab"
                                                      data-type="1"
                                                      class="flex-auto-center">商城首页</a></li>
            <li role="presentation"><a href="#shop" aria-controls="shop" role="tab" data-toggle="tab" data-type="2"
                                       class="flex-auto-center">店铺首页</a></li>
            <li role="presentation"><a href="#detail" aria-controls="detail" role="tab" data-toggle="tab" data-type="3"
                                       class="flex-auto-center">商品详情页</a></li>
            <li role="presentation"><a href="#member" aria-controls="member" role="tab" data-toggle="tab" data-type="4"
                                       class="flex-auto-center">会员中心</a></li>
            <li role="presentation"><a href="#distribution" aria-controls="distribution" role="tab" data-toggle="tab" data-type="5"
                                       class="flex-auto-center">分销中心</a></li>
            <?php if($integralStatus): ?>
            <!-- 积分商城 -->
            <li role="presentation"><a href="#integral" aria-controls="integral" role="tab" data-toggle="tab"
                                       data-type=9"
                                       class="flex-auto-center">积分商城首页</a></li>
            <?php endif; ?>
            <li role="presentation"><a href="#diy" aria-controls="diy" role="tab" data-toggle="tab" data-type="6"
                                       class="flex-auto-center">自定义页</a></li>
        </ul>
        <div class="template-list tab-content">
            <div class="tab-pane fade in active" id="index">
                <ul class="template-list-ul clearfix" data-type='1'>
                </ul>
            </div>
            <div class="tab-pane fade" id="shop">
                <ul class="template-list-ul clearfix" data-type='2'>
                </ul>
            </div>
            <div class="tab-pane fade" id="detail">
                <ul class="template-list-ul clearfix" data-type='3'>
                </ul>
            </div>
            <div class="tab-pane fade" id="member">
                <ul class="template-list-ul clearfix" data-type='4'>
                </ul>
            </div>
            <div class="tab-pane fade" id="distribution">
                <ul class="template-list-ul clearfix" data-type='5'>
                </ul>
            </div>
            <div class="tab-pane fade" id="integral">
                <ul class="template-list-ul clearfix" data-type='9'>
                </ul>
            </div>
            <div class="tab-pane fade" id="diy">
                <ul class="template-list-ul clearfix" data-type='6'>
                </ul>
            </div>
        </div>
    </div>
</form>
<script>
    require(['util'], function (util) {
        var system_template_list = {};
        $(function () {
            getSystemTemplateList();
            putSystemList();
        })

        function getSystemTemplateList() {
            $.ajax({
                type: "post",
                async: false,
                data: {},
                url: "<?php echo $mpSystemDefaultTemplateUrl; ?>",
                success: function (data) {
                    system_template_list = data;
                }
            })
        }

        function putSystemList() {
            $('.template-list').find('.template-list-ul').each(function(){
                var new_html = '<li>';
                new_html += '<div class="template-list-pic"><img src="/public/static/images/customPC/blankTemplate.png" alt=""></div>';
                new_html += '<p class="template-list-title">空白模板</p>';
                new_html += '<p class="template-list-button"><a href="javascript:;" data-type="' + $(this).data('type') + '" class="template-list-button-a J-create">立即创建</a></p>';
                new_html += '</li>';
                $(this).html(new_html);
            });
            $.each(system_template_list, function (type, list) {
                var list_html = '';
                // 先加上空白模板
                
                if (system_template_list[type]) {
                    $.each(list, function (k, v) {
                        list_html += '<li>';
                        list_html += '<div class="template-list-pic">';
                        list_html += '<img src=' + v.template_logo + ' alt="">';
                        list_html += '</div>';
                        list_html += '<p class="template-list-title">' + v.template_name + '</p>';
                        list_html += '<p class="template-list-button">';
                        list_html += '<a href="javascript:void(0);" data-type="' + type + '" data-id="' + v.id + '" class="template-list-button-a J-create">立即创建</a>';
                        list_html += '</p>';
                        list_html += '</li>';
                    })
                }

                var target = '#index ul';
                switch (type) {
                    case '1':
                        target = '#index ul';
                        break;
                    case '2':
                        target = '#shop ul';
                        break;
                    case '3':
                        target = '#detail ul';
                        break;
                    case '4':
                        target = '#member ul';
                        break;
                    case '5':
                        target = '#distribution ul';
                        break;
                    case '6':
                        target = '#diy ul';
                        break;
                    case '9':
                        target = '#integral ul';
                        break;
                }
                $(target).append(list_html);
            })
        }

        $('#content_type').on('click', '.J-create', function () {
            var type = $(this).attr('data-type');
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                url: '<?php echo $createCustomTemplateUrl; ?>',
                data: {
                    'type': type,
                    'id': id
                },
                success: function (res) {
                    if (res.code > 0) {
                        // util.message(res.message, 'success', __URL(PLATFORMMAIN + 'ADDONS_MAINminiProgramCustom&id=' + res.data.id));
                        window.location = __URL('ADDONS_MAINminiProgramCustom&id=' + res.data.id)
                    } else {
                        util.message(res.message, 'error');
                    }
                }
            });
        });
    });
</script>