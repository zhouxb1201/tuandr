<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"/www/wwwroot/www.tuandr.com/addons/thingcircle/template/platform/thingcircleViolationList.html";i:1583811702;}*/ ?>

<!-- page -->
<div class="mb-20 flex flex-pack-justify">
    <div class="">
        <a href="javascript:void(0)" class="btn btn-primary J-add"><i class="icon icon-add1"></i> 添加违规类型</a>
    </div>
</div>
<table class="table v-table table-auto-center tree" >
    <thead>
        <tr>
            <th>类型名称</th>
            <th>排序</th>
            <th>状态</th>
            <th class="col-md-2 pr-14 operationLeft">操作</th>
        </tr>
    </thead>
    <tbody style="display: none;" id="add-area">
        <tr class="add_tr">
            <td>
                <div><input type="text" class="form-control J-addname"></div>
            </td>
            <td>
                <input type="text" class="form-control sort-form-control J-addsort">
            </td>
            <td>
                <!--<a href="javascript:void(0);" class="label label-success J-show" data-show="1" data-id="">使用中</a>-->
            </td>
            <td class="fs-0 operationLeft">
                <a href="javascript:void(0);" class="btn-operation text-red1 J-adddel">删除</a>
            </td>
        </tr>
    </tbody>
    <tbody id="violation_list">

    </tbody>

</table>

<!-- page end -->


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <div><input type="text" data-id="<%item.violation_id%>" class="form-control J-name" value="<%item.name%>"></div>
        </td>
        <td>
            <input type="text" data-id="<%item.violation_id%>" class="form-control sort-form-control J-sort" value="<%item.sort%>">
        </td>
        <td>
            <%if item.state==1%>
            <a href="javascript:void(0);" class="label label-success J-show" data-show="0" data-id="<%item.violation_id%>">使用中</a>
            <%else%>
            <a href="javascript:void(0);" class="label label-danger J-show" data-show="1" data-id="<%item.violation_id%>">未使用</a>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
            <a href="javascript:void(0);" data-id="<%item.violation_id%>" class="btn-operation text-red1 J-del">删除</a>
        </td>
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        LoadingInfo(0);
        $('.J-search').on('click', function () {
            LoadingInfo(0);
        });
        function LoadingInfo(order) {
            $.ajax({
                type: "post",
                url: "<?php echo $thingcircleViolationListUrl; ?>",
                data: {},
                success: function (data) {
                    var html = '<tr class="J-noData"><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    if (data.data) {
                        if (tpl('shop_curr_list', data)) {
                            $("#violation_list").html(tpl('shop_curr_list', data));
                        } else {
                            $("#violation_list").html(html);
                        }
                    } else {
                        $("#violation_list").html(html);
                    }

                }
            });
        }
        //删除分类
        $('#violation_list').on('click', '.J-del', function () {
            var violation_id = $(this).data('id');
            util.alert('确认删除此类型吗 ？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $deleteThingcircleViolationUrl; ?>",
                    async: true,
                    data: {
                        "violation_id": violation_id
                    },
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo(0));
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            });
        });
        $('.J-add').on('click', function () {
            if($('#violation_list .add_tr').length>0){
                return;
            }
            $('#violation_list').find('.J-noData').remove();
            $('#violation_list').append($('#add-area').html());
        });
        $('#violation_list').on('click','.J-adddel',function () {
            $(this).parents('tr').remove();
        });
        //修改排序
        $('#violation_list').on('change', '.J-sort', function () {
            var violation_id = $(this).data('id');
            var sort_val = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo $changeThingcircleViolationSortUrl; ?>",
                async: true,
                data: {violation_id: violation_id, sort: sort_val},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //添加类型
        $('#violation_list').on('change', '.J-addname', function () {
            var name = $(this).val();
            var sort = $('#violation_list .J-addsort').val();
            $.ajax({
                type: "post",
                url: "<?php echo $addThingcircleViolationUrl; ?>",
                async: true,
                data: {name: name, sort: sort},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(1));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //修改违规名称
        $('#violation_list').on('change', '.J-name', function () {
            var violation_id = $(this).data('id');
            var name = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo $changeThingcircleViolationNameUrl; ?>",
                async: true,
                data: {violation_id: violation_id, name: name},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        $('#violation_list').on('click', '.J-show', function () {
            var violation_id = $(this).data('id');
            var state = $(this).data('show');
            $.ajax({
                type: "post",
                url: "<?php echo $changeThingcircleViolationShowUrl; ?>",
                async: true,
                data: {violation_id: violation_id, state: state},
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', LoadingInfo(0));
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
</script>

