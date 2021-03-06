<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/www.tuandr.com/addons/bargain/template/admin/bargainList.html";i:1583811704;}*/ ?>


<div class="mb-20">
    <a href="<?php echo __URL('admin/Menu/addonmenu?addons=addBargain'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i>
        添加砍价</a>
    <div class="input-group search-input-group ml-10" style="float:right">
        <input type="text" class="form-control" placeholder="商品名称" id="search_text" value="">
        <span class="input-group-btn">
                    <button class="btn btn-primary search" type="button">搜索</button>
                </span>
    </div>
</div>
<ul id="bargain_type" class="nav nav-tabs v-nav-tabs fs-12">
    <li role="presentation" class="active" data-type="all"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="true">全部<span class="J-all">(<?php echo $bargain_count['all_num']; ?>)</span></a></li>
    <li role="presentation" class="" data-type="unstart"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">待开始<span class="J-all">(<?php echo $bargain_count['unstart_num']; ?>)</span></a></li>
    <li role="presentation" class="" data-type="going"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">进行中<span class="J-all">(<?php echo $bargain_count['going_num']; ?>)</span></a></li>
    <li role="presentation" class="" data-type="ended"><a href="javascript:void(0)" data-toggle="tab" class="flex-auto-center" aria-expanded="false">已结束<span class="J-all">(<?php echo $bargain_count['ended_num']; ?>)</span></a></li>
    <input type="hidden" id="bargain_tab" name="bargain_tab" value="">
</ul>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th class="col-md-3">商品信息</th>
        <th>初始价格</th>
        <th>最低砍至金额</th>
        <th>库存剩余</th>
        <th>活动时间</th>
        <th class="col-md-1">状态</th>
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


<script id="shop_curr_list" type="text/html">
    <%each data as item index%>
    <tr>
        <td>
            <div class="media text-left ">
                <div class="media-left">
                    <p><img src="<%item.pic_cover_mid%>" style="width:60px;height:60px;"></p>
                </div>
                <div class="media-body max-w-300 ">
                    <div class="line-2-ellipsis line-title">
                        <%item.goods_name%>
                    </div>
                </div>
            </div>
        </td>

        <td>
            <%item.start_money%>
        </td>
        <td>
            <%item.lowest_money%>
        </td>
        <td><%item.bargain_stock%></td>
        <td>
            <%item.start_bargain_date%><br>~<br>
            <%item.end_bargain_date%>
        </td>
        <td>
            <%if item.status==0%>
                <a href="javascript:;" class="label label-warning" data-type=1 data-bargain_id="<%item.bargain_id%>">未开始</a>
            <%/if%>
            <%if item.status==1%>
                <a href="javascript:;" class="label label-success" data-type=1 data-bargain_id="<%item.bargain_id%>">进行中</a>
            <%/if%>
            <%if item.status==2%>
                <a href="javascript:;" class="label label-danger" data-type=1 data-bargain_id="<%item.bargain_id%>">已结束</a>
            <%/if%>
        </td>
        <td class="fs-0 operationLeft">
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
            <%if item.status==0%>
            <a href="ADDONS_ADMIN_MAINaddBargain&bargain_id=<%item.bargain_id%>" class="btn-operation" data-type="edit" data-group_id="<%item.group_id%>">编辑</a>
            <%/if%>
            <a href="ADDONS_ADMIN_MAINbargainRecord&bargain_id=<%item.bargain_id%>" class="btn-operation" data-type="history" data-group_id="<%item.group_id%>">记录</a>
            <a href="ADDONS_ADMIN_MAINbargainDetail&bargain_id=<%item.bargain_id%>" class="btn-operation" data-type="info" data-group_id="<%item.group_id%>">详情</a>
        </td>
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
        $('.search').click(function(){
            LoadingInfo($('#page_index').val());
        })
        $('#bargain_type li').click(function(){
            $('#bargain_tab').val($(this).data('type'));
            LoadingInfo($('#page_index').val());
        })
        function LoadingInfo(page_index) {
            $("#page_index").val(page_index);
            var type = $('#bargain_tab').val();
            var bargain_type = type;
            $.ajax({
                type: "post",
                url: "<?php echo $bargainListUrl; ?>",
                data: {
                    "page_index": page_index,
                    "search_text": $("#search_text").val(),
                    "bargain_type": bargain_type
                },
                success: function (data) {
                    var html = '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
                    if(data.data){
                        if (tpl('shop_curr_list', data)) {
                            for(var i = 0;i < data.data.length; i++){
                                data.data[i]['pic_cover_mid'] = __IMG( data.data[i]['pic_cover']);
                            }
                            $("#group_shopping_list").html(tpl('shop_curr_list', data));
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
