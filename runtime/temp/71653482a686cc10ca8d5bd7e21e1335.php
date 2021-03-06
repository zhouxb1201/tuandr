<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/www.tuandr.com/addons/presell/template/admin/presellList.html";i:1583811696;}*/ ?>


<div class="mb-20">
    <a href="<?php echo __URL('admin/Menu/addonmenu?addons=addpresell'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>
        添加预售</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="商品名称" id="search_text" value="">
        <span class="input-group-btn">
                    <button class="btn btn-primary search" type="button">搜索</button>
                </span>
    </div>
</div>
<ul id="group_type" class="nav nav-tabs v-nav-tabs fs-12">
    <li role="presentation" class="active" data-type=""><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="true">全部(<?php echo $count; ?>)</a></li>
    <li role="presentation" class="" data-type="1"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">进行中(<?php echo $count_1; ?>)</a></li>
    <li role="presentation" class="" data-type="2"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">待开始(<?php echo $count_2; ?>)</a></li>
    <li role="presentation" class="" data-type="3"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">已结束(<?php echo $count_3; ?>)</a></li>
</ul>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>商品信息</th>
        <th>预售时间</th>
        <th>库存/剩余</th>
        <th>类型</th>
        <th>定金/尾款</th>
        <th>预定人数</th>
        <th>状态</th>
        <th class="col-md-2 pr-14 operationLeft">操作</th>
    </tr>
    </thead>
    <tbody id="group_shopping_list">
    </tbody>
</table>
<input type="hidden" id="page_index">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page" class="pagination pull-right"></ul>
</nav>


<script id="presell_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td><%item.name%></td>
        <td><%item.first_pay_time%></td>
        <td><%item.presellnum%>/<%item.surplus_num%></td>
        <td>定金+余额</td>
        <td>定金：<%item.firstmoney%><br/>尾款：<%item.last_money%></td>
        <td><%item.count_people%></td>
        <td>     
            <%if item.status_name == '已结束'%>
            <span class="label label-grey"><%item.status_name%></span>
            <%/if%>
            <%if item.status_name == '进行中'%>
            <span class="label label-green"><%item.status_name%></span>
            <%/if%>
            <%if item.status_name == '未开始'%>
            <span class="label label-skyBlue"><%item.status_name%></span>
            <%/if%>
        </td>
        <td class="operate fs-0 operationLeft">
            <a class="btn-operation link-pr" href="javascript:void(0);"> <span>链接</span>
                <div class="link-pos">
                    <div class="link-arrow">
                        <form class="form-horizontal">
                            <%if addon_status.wap_status == 1%>
                            <div class="form-group"><label class="col-md-2 control-label">手机端</label>
                                <div class="col-md-10">
                                    <div class="input-group"><input class="form-control" type="text" disabled
                                                                    value="<%__URLS('SHOP_MAIN/wap/goods/detail/'+item.goods_id)%>"> <span
                                            class="input-group-btn btn btn-primary bbllrr0 copy"
                                            data-clipboard-text="<%__URLS('SHOP_MAIN/wap/goods/detail/'+item.goods_id)%>">复制链接</span> </div>
                                </div>
                            </div>
                            <%/if%>
                            <%if addon_status.is_minipro == 1%>
                            <div class="form-group"><label class="col-md-2 control-label">小程序端</label>
                                <div class="col-md-10">
                                    <div class="input-group"><input class="form-control" type="text" disabled
                                                                    value="pages/goods/detail/index?goodsId=<%item.goods_id%>"> <span
                                            class="input-group-btn btn btn-primary bbllrr0 copy"
                                            data-clipboard-text="pages/goods/detail/index?goodsId=<%item.goods_id%>">复制链接</span> </div>
                                </div>
                            </div>
                            <%/if%>
                            <!--<%if addon_status.is_pc_use == 1%>-->
                            <!--<div class="form-group"><label class="col-md-2 control-label">电脑端</label>-->
                                <!--<div class="col-md-10">-->
                                    <!--<div class="input-group"><input class="form-control" type="text" disabled-->
                                                                    <!--value="<%__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+item.goods_id)%>"> <span-->
                                            <!--class="input-group-btn btn btn-primary bbllrr0 copy"-->
                                            <!--data-clipboard-text="<%__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+item.goods_id)%>">复制链接</span> </div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<%/if%>-->
                        </form>
                        <div class="flex link-flex">
                            <%if addon_status.wap_status == 1%>
                            <div class="flex-1">
                                <div class="mb-04"><img
                                        src="<%__URL('admin/goods/getGoodsDetailQr')+'?goods_id='+item.goods_id +'&qr_type=1&wap_path=/wap/goods/detail/'%>" style="width: 100px;height: 100px">
                                </div>
                                <p>(手机端二维码)</p></div>
                            <%/if%>
                            <%if addon_status.is_minipro == 1%>
                            <div class="flex-1">
                                <div class="mb-04"><img
                                        src="<%__URL('admin/goods/getGoodsDetailQr')+'?goods_id='+item.goods_id +'&qr_type=2&mp_path=pages/goods/detail/index'%>" style="width: 100px;height: 100px">
                                </div>
                                <p>(小程序二维码)</p>
                            </div>
                            <%/if%>
                        </div>
                    </div>
                </div>
            </a>
            <%if item.status == 2%>
            <a href="<?php echo __URL('admin/Menu/addonmenu?addons=editpresell&type=edit&id=<%item.id%>'); ?>" class="btn-operation">编辑</a>
            <%/if%>
            <%if item.status == 1%>
            <a href="javascript:void(0)" class="btn-operation close_presell">关闭</a>
            <%/if%>
            <a href="<?php echo __URL('admin/Menu/addonmenu?addons=orderrecord&id=<%item.id%>'); ?>" class="btn-operation">记录</a>
            <a href="<?php echo __URL('admin/Menu/addonmenu?addons=editpresell&id=<%item.id%>'); ?>" class="btn-operation">详情</a>
            <%if item.status == 3%>
            <a href="javascript:void(0)" class="btn-operation text-red1 del_presell">删除</a>
            <%/if%>
        </td>
        <input type="hidden" name="id" value="<%item.id%>">
    </tr>
    <%/each%>
</script>
<script>
    require(['util', 'tpl'], function (util, tpl) {
        util.copy();
        tpl.helper('__URLS',function(str){
            return  __URLS(str)
        })
        tpl.helper('__URL',function(str){
            return  __URL(str)
        })
        util.initPage(LoadingInfo);
        var type = $('#group_type').find('li.active').data('type');
        $('body').on('click','.del_presell',function () {
            var id = $(this).parent().next().val();
            util.alert('删除？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('admin/addons/execute/addons/presell/controller/Presell/action/del_presell'); ?>",
                    data: {"id": id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });

        //关闭
        $('body').on('click','.close_presell',function () {
            var id = $(this).parent().next().val();
            util.alert('关闭？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('admin/addons/execute/addons/presell/controller/Presell/action/close_presell'); ?>",
                    data: {"id": id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });

        $('#group_shopping_list').on('click', '.off', function () {
            var group_id = $(this).attr('data-group_id');
            util.alert('关闭后未成团的订单将作废处理！', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $closeGroupShoppingUrl; ?>",
                    data: {"group_id": group_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#group_shopping_list').on('click', '.on', function () {
            var group_id = $(this).attr('data-group_id');
            util.alert('开启活动？', function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo $openGroupShoppingUrl; ?>",
                    data: {"group_id": group_id},
                    dataType: "json",
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success', LoadingInfo($('#page_index').val(),type));
                        } else {
                            util.message(data['message']);
                        }
                    }
                });
            });
        });
        $('#group_type').on('click','li',function(){
            type = $(this).data('type');
            LoadingInfo(1);
        });
        $('#group_shopping_list').on('click', '.text-primary.block', function () {
            var type = $(this).attr('data-type');
            var group_id = $(this).attr('data-group_id');
            switch (type) {
                case 'edit':
                    location.href = __URL('ADDONS_MAINupdateGroupShopping&group_id=' + group_id);
                    break;
                case 'info':
                    location.href = __URL('ADDONS_MAINgroupShoppingDetail&group_id=' + group_id);
                    break;
                case 'history':
                    location.href = __URL('ADDONS_MAINgroupRecord&group_id=' + group_id);
                    break;
            }
        });

        //搜索
        $('.search').on('click',function(){
            util.initPage(LoadingInfo);
        });


        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var status = type;
            $.ajax({
                type: "post",
                url: "<?php echo __URL('admin/Menu/addonmenu?addons=presellList'); ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "status": status
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="8">暂无符合条件的数据记录</td></tr>';
                    console.log(data);
                    if(data.data){
                        if (tpl('shop_curr_list', data)) {
                            for(var i = 0;i < data.data.length; i++){
                                data.data[i]['pic_cover_mid'] = __IMG( data.data[i]['pic_cover_mid']);
                            }
                            $("#group_shopping_list").html(tpl('presell_list', data));
                        } else {
                            $("#group_shopping_list").html(html);
                        }
                        $('#page').paginator('option', {
                            totalCounts: data['total_count']  // 动态修改总数
                        });
                    }else{
                        $("#group_shopping_list").html(html);
                    }
                }
            });
        }
    });


</script>
