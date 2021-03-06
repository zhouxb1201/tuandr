<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"template/platform/Order/logisticsList.html";i:1591330112;}*/ ?>
<div id="express_list"></div>
<script id="tpl_express_list" type="text/html">
    <ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
        <%each data as item%>
        <li role="presentation" data-i="<%i++%>" class="<%if i == 1%>active<%/if%>">
            <a href="#li_<%i%>" aria-controls="li_<%i%>" role="tab" data-toggle="tab"
               class="flex-auto-center"
               aria-expanded="false">包裹<%i%></a>
        </li>
        <%/each%>
    </ul>
    <div class="tab-content">
        <%each data as items key%>
        
        <div data-j="<%j++%>" class="tab-pane fade tab-<%j%><%if j == 1%> active in<%/if%>" id="li_<%j%>">
            <div> <p style="line-height:  40px; margin-top: -5px;font-weight: bold;">物流公司：<%express[key].express_company%>&nbsp;&nbsp;&nbsp;&nbsp;物流单号：<%express[key].express_no%></p></div>
            <%if items.code > 0%>
            <div class="modal_logistics_info">
                <ul>
                    <%each items.data.data as item%>
                    <li>
                        <p class=" logistic_state"><%item.context%></p>
                        <p class="time"><%item.time%></p>
                    </li>
                    <%/each%>
                </ul>
            </div>
            <%else%>
            <div class="modal_logistics_info">
                <%items.message%>
            </div>
            <%/if%>
        </div>
        <%/each%>
    </div>
</script>
<script type="text/javascript">
    require(['util', 'tpl'], function (util, tpl) {
        $.ajax({
            url: __URL(PLATFORMMAIN + '/order/logisticsModal'),
            type: 'post',
            data: {order_id: '<?php echo $order_id; ?>',order_goods_id : '<?php echo $order_goods_id; ?>'},
            success: function (data) {
                $("#express_list").html(tpl('tpl_express_list', {data: data, i: 0, j: 0,express:JSON.parse('<?php echo $express; ?>')}))
            }
        })
    })
</script>
