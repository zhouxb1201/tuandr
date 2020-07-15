<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"template/platform/Goods/attribututeListDialog.html";i:1591330108;}*/ ?>
<form class="form-horizontal">
    <!--商品属性-->
    <div class="form-group" style="margin-right: auto;margin-left: auto;">
        <div class="col-md-12">
            <table class="table v-table table-auto-center" id="attributeItemList">
                <thead>
                    <tr>
                        <th class="col-sm-2">排序</th>
                        <th class="col-sm-2">属性名称</th>
                        <th class="col-sm-4 break-word">属性值</th>
                        <th class="col-sm-2">输入类型</th>
                        <th class="col-md-2 pr-14 operationLeft">操作</th>
                    </tr>
                </thead>

                <?php if($info['value_list']['data'] != ''): if(is_array($info['value_list']['data']) || $info['value_list']['data'] instanceof \think\Collection || $info['value_list']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['value_list']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr class="attributeItem value_data" curr_num="<?php echo $key; ?>">
                <input type="hidden" name="attr_value_id" value="<?php echo $v['attr_value_id']; ?>">
                <td><?php echo $v['sort']; ?></td>
                <td><?php echo $v['attr_value_name']; ?></td>
                <td class="break-word attribute_value_<?php echo $key; ?>"><?php echo $v['value']; ?></td>
                <td>
                    <?php if($v['type'] == '1'): ?>输入框<?php endif; if($v['type'] == '2'): ?>单选框<?php endif; if($v['type'] == '3'): ?>复选框<?php endif; ?>
                </td>
                <!--<td><?php if($key > 0): ?><a href="javascript:void(0);" class="text-danger removeAttributeItem">删除</a><?php endif; ?></td>-->
                <td class="operationLeft fs-0">
                    <a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="<?php echo $v['sort']; ?>" data-name="<?php echo $v['attr_value_name']; ?>" data-value="<?php echo $v['value']; ?>" data-type="<?php echo $v['type']; ?>" data-type-text="单选框" data-key="<?php echo $key; ?>">编辑</a>
                    <?php if($key > 0): ?><a href="javascript:void(0);" class="btn-operation text-red1 removeAttributeItem">删除</a><?php endif; ?>
                </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr><td colspan="5" class="text-left"><a href="javascript:void(0);" class="text-primary" id="addAttributeItem" data-title="add"> +添加属性</a></td></tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</form>
<div style="display: none;" id="attributeDialog">
    <form class="form-horizontal padding-15" id="">
        <div class="form-group">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>属性名称</label>
            <div class="col-md-8"><input type="text" class="form-control" id="attributeName" value=""></div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>输入类型</label>
            <div class="col-md-8">
                <label class="radio-inline">
                    <input type="radio" name="push_type" id="" value="1" checked> 输入框
                </label>
                <label class="radio-inline">
                    <input type="radio" name="push_type" id="" value="2"> 单选框
                </label>
                <label class="radio-inline">
                    <input type="radio" name="push_type" id="" value="3"> 复选框
                </label>
            </div>
        </div>
        <div class="form-group attributeType" style="display: none">
            <label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>
            <div class="col-md-8">
                <textarea name="content" id="content" rows="6" class="form-control"></textarea>
                <div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">排序</label>
            <div class="col-md-8"><input type="text" class="form-control" id="edit_sort" value=""></div>
        </div>

    </form>
</div>
<script type="text/javascript">
    require(['util'], function (util) {
// 编辑属性
// 添加属性
        $("#addAttributeItem").on('click', function () {
            var html = $("#attributeDialog").html();
            var _this = $(this);
            util.confirm('添加属性', html, function () {
                var attributeName = this.$content.find('#attributeName').val();
                var push_type = this.$content.find('input[name="push_type"]:checked').val();
                if(push_type==2 || push_type==3){
                    var contents = this.$content.find("#content").val();
                    contents = contents.replace(/[\r\n]/g,",");
                }else{
                    var contents ='';
                }
                var edit_sort = this.$content.find("#edit_sort").val();

                // 增加验证
                if(attributeName==''){
                    util.message('请输入属性名称','danger');
                    return false;
                }
                if(push_type==2 || push_type==3){
                    if(contents==''){
                        util.message('请输入属性值','danger');
                        return false;
                    }
                }
                var data_obj = $(".value_data");
                var data_obj_arr = [];

                data_obj.each(function (i) {
                    if (data_obj.eq(i) != '') {
                        data_obj_arr.push($(this).find('.editAttributeItem').data('name').toString());
                    }
                });

                for(var i=0;i<data_obj_arr.length;i++){
                    if(data_obj_arr[i]==name){
                        data_obj_arr.splice(i, 1);
                    }
                }

                if($.inArray(attributeName,data_obj_arr) != '-1'){
                    util.message('属性名称重复，请重新填写','danger');
                    return false;
                }
                 if(push_type==1){
                     var push_type_text = '输入框';
                 }else if(push_type==2){
                     var push_type_text = '单选框';
                 }else{
                     var push_type_text = '复选框';
                 }
                
                var tpl = '';

                tpl += '<tr class="attributeItem value_data">';
                tpl += '<td>'+edit_sort+'</td>';
                tpl += '<td>'+attributeName+'</td>';
                tpl += '<td class="break-word">'+contents+'</td>';
                tpl += '<td>'+push_type_text+'</td>';
                tpl += '<td class="operationLeft fs-0"><a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="'+edit_sort+'" data-name="'+attributeName+'" data-value="'+contents+'" data-type="'+push_type+'" data-type-text="'+push_type_text+'">编辑</a><a href="javascript:void(0);" class="btn-operation text-red1 removeAttributeItem">删除</a></td>';
                tpl += '</tr>';
                _this.parents('tr').before(tpl);
                $('.attributeType').hide();
            }, 'large');
        });
        $('table').on('click','.editAttributeItem', function () {
            var _this = $(this);
            var sort = _this.attr('data-sort');
            var name = _this.attr('data-name');
            var value = _this.attr('data-value');
            var key = _this.parents('tr').index();
            console.log(key);
            value = value.replace(/,/g, "\n");
            var type = _this.attr('data-type');
            var html = '';
            html += '<form class="form-horizontal padding-15" id="">';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性名称</label><div class="col-md-8"><input type="text" class="form-control" id="attributeName" value="' + name + '"></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label"><span class="text-bright">*</span>输入类型</label>';
            if (type == 1) {
                html += '<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1" checked> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2"> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3"> 复选框</label></div>';
            } else if (type == 2) {
                html += '<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1"> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2" checked> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3"> 复选框</label></div>';
            } else {
                html += '<div class="col-md-8"><label class="radio-inline"><input type="radio" name="push_type" id="" value="1"> 输入框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="2"> 单选框</label><label class="radio-inline"><input type="radio" name="push_type" id="" value="3" checked> 复选框</label></div>';
            }
            html += '</div>';
            if (type == 1) {
                html += '<div class="form-group attributeType" style="display: none"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>';
                html += '<div class="col-md-8"><textarea name="content" id="content" rows="6" class="form-control"></textarea><div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div></div>';
                html += '</div>';
            } else {
                html += '<div class="form-group attributeType"><label class="col-md-3 control-label"><span class="text-bright">*</span>属性值</label>';
                html += '<div class="col-md-8"><textarea name="content" id="content" rows="6" class="form-control">' + value + '</textarea><div class="help-block mb-0">一行代表一个属性值，多个属性值回车换行添加</div></div>';
                html += '</div>';
            }
            html += '<div class="form-group"><label class="col-md-3 control-label">排序</label><div class="col-md-8"><input type="number" class="form-control" id="edit_sort" value="' + sort + '"></div></div>';
            html += '</form>';

            util.confirm('编辑属性', html, function () {
                var attributeName = this.$content.find('#attributeName').val();
                var push_type = this.$content.find('input[name="push_type"]:checked').val();
                if (push_type == 2 || push_type == 3) {
                    var contents = this.$content.find("#content").val();
                    contents = contents.replace(/[\r\n]/g, ",");
                } else {
                    var contents = '';
                }
                var edit_sort = this.$content.find("#edit_sort").val();

                // 增加验证
                if (attributeName == '') {
                    util.message('请输入属性名称', 'danger');
                    return false;
                }
                if (push_type == 2 || push_type == 3) {
                    if (contents == '') {
                        util.message('请输入属性值', 'danger');
                        return false;
                    }
                }
                var data_obj = $(".value_data");
                var data_obj_arr = [];

                data_obj.each(function (i) {
                    if (data_obj.eq(i) != '' && i != key) {
                        data_obj_arr.push($(this).find('.editAttributeItem').data('name').toString());
                    }
                });
                
                if ($.inArray(attributeName, data_obj_arr) != '-1') {
                    util.message('属性名称重复，请重新填写', 'danger');
                    return false;
                }
                if (push_type == 1) {
                    var push_type_text = '输入框';
                } else if (push_type == 2) {
                    var push_type_text = '单选框';
                } else {
                    var push_type_text = '复选框';
                }

                var tpl = '';
                tpl += '<td>' + edit_sort + '</td>';
                tpl += '<td>' + attributeName + '</td>';
                tpl += '<td>' + contents + '</td>';
                tpl += '<td>' + push_type_text + '</td>';
                tpl += '<td class="operationLeft fs-0"><a href="javascript:void(0);" class="btn-operation editAttributeItem" data-sort="' + edit_sort + '" data-name="' + attributeName + '" data-value="' + contents + '" data-type="' + push_type + '" data-type-text="' + push_type_text + '" data-key="'+ key +'">编辑</a>';
                if(key > 0){
                    tpl += '<a href="javascript:void(0);" class="btn-operation text-red1 removeAttributeItem">删除</a>';
                } 
                tpl += '</td>';
                _this.parents('tr').html(tpl);
                $('.attributeType').hide();
            }, 'large')
        })
        // 删除属性
        $('.removeAttributeItem').on('click', function () {
            var _this = $(this);
            util.alert('确定删除该属性吗？', function () {
                _this.parents('tr').remove();
            })
        })
        $('body').on('change','input[name="push_type"]',function(){
            var val=$(this).val();
            if(val==1){
                $('.attributeType').hide();
            }else{
                $('.attributeType').show();
            }
        })
    });
</script>