<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopAccountList.html";i:1583811692;}*/ ?>



                <!-- page -->
                <!--<form action="" class="form">
                    <div class="v-form-inline">
                        <div class="form-group">
                            <label class="control-label">店铺名称</label>
                            <input type="text" class="form-control" id="search_text" placeholder="请输入店铺账号">
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary mr-15 search"><i class="icon icon-search"></i> 搜索</a>
                        </div>
                    </div>
                </form>-->
        <form class="v-filter-container">
            <div class="filter-fields-wrap">
                <div class="filter-item clearfix">
                    <div class="filter-item__field">

                        <div class="v__control-group">
                            <label class="v__control-label">店铺名称</label>
                            <div class="v__controls">
                                <input type="text" id="search_text" class="v__control_input" placeholder="请输入店铺账号" autocomplete="off">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="filter-item clearfix">
                    <div class="filter-item__field">
                        <div class="v__control-group">
                            <label class="v__control-label"></label>
                            <div class="v__controls">
                                <a class="btn btn-primary search"><i class="icon icon-search"></i> 搜索</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                <div class="screen-title">
                    <span class="text">提现列表</span>
                </div>
                <table class="table v-table table-auto-center">
                    <thead>
                        <tr>
                            <th>店铺名称</th>
                            <th>营业总额</th>
                            <th>已提现</th>
                            <th>当前余额</th>
                            <th>提现中</th>
                        </tr>
                    </thead>
                    <tbody id="list">

                    </tbody>
                </table>
                <nav aria-label="Page navigation" class="clearfix">
                    <ul id="page" class="pagination pull-right"></ul>
                </nav>


<script>
require(['util'],function(util){
    util.initPage(getWithdrawList);
    function getWithdrawList(page_index){
        var search_text = $("#search_text").val();
        var url = '<?php echo $shopAccountListUrl; ?>';
        $.ajax({
            type : "post",
            url : url ,
            async : true,
            data : {
                "page_index" : page_index, "search_text" : search_text,"website_id":<?php echo $website_id; ?>
            },
            success : function(data) {
                var html = '';
                if (data["data"].length > 0) {
                    for (var i = 0; i < data["data"].length; i++) {
                        html += '<tr>';
                        html += '<td>' + data["data"][i]["shop_name"] + '</td>';
                        html += '<td>'+data["data"][i]["shop_entry_money"]+'</td>';
                        html += '<td>'+data["data"][i]["shop_withdraw"]+'</td>';
                        html += '<td>'+data["data"][i]["shop_total_money"]+'</td>';
                        html += '<td>'+data["data"][i]["withdraw_ing"]+'</td>';
                        html += '</td>';
                        html += '</tr>';
                    }
                } else {
                    html += '<tr><td colspan="5" class="h-200">暂无符合条件的数据记录</td></tr>';
                }
                $('#page').paginator('option', {
                    totalCounts: data['total_count']  // 动态修改总数
                });
                $("#list").html(html);
            }
        });
    }
    $('.search').on('click',function(){
        util.initPage(getWithdrawList);
    });
})
</script>
