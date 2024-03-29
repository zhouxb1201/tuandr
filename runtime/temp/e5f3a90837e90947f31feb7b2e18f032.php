<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/www/wwwroot/www.tuandr.com/addons/teambonus/template/platform/teamBonusBalance.html";i:1583811696;}*/ ?>

		<div class="flex-auto-center mb-20 bg-info text-center border-info">
			<div class="flex-1 padding-15">
				<h3 class="strong">未发放分红金额</h3>
				<p id="account_money"></p>
			</div>
			<div class="flex-1 padding-15">
				<h3 class="strong">订单金额</h3>
				<p id="account_sum"></p>
			</div>
			<div class="flex-1 padding-15">
				<h3 class="strong">未发放分红的队长人数</h3>
				<p id="account_pay"></p>
			</div>
		</div>

		<div class="mb-20">
			<a href="javascript:;" class="btn btn-primary send">发放分红</a>
		</div>

		<table class="table v-table table-auto-center">
			<thead>
			<tr>
				<th>用户名</th>
				<th>手机号码</th>
				<th>队长等级</th>
				<th>待分红</th>
			</tr>
			</thead>
			<tbody id="list">

			</tbody>
		</table>
		<input type="hidden" id="page_index">
		<nav aria-label="Page navigation" class="clearfix">
			<ul id="page" class="pagination pull-right"></ul>
		</nav>

		<!-- page end -->



<script>
    require(['util'],function(util){
        util.initPage(getList);
        function getList(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo $teamBonusBalanceUrl; ?>",
                async : true,
                data : {
                    "page_index" : page_index, "website_id":<?php echo $website_id; ?>
                },
                success : function(data) {
                    $("#account_money").html(data.ungrant_bonus);
                    $("#account_sum").html(data.order_money);
                    $("#account_pay").html(data.total_agent);
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            if(data["data"][i]["ungrant_bonus"]>0){
                                html += '<tr>';
                                html += '<td>' + data["data"][i]["user_name"] + '</td>';
                                html += '<td>' + data["data"][i]["mobile"] +'</td>';
                                html += '<td>' + data["data"][i]["level_name"] +'</td>';
                                html += '<td>' + data["data"][i]["ungrant_bonus"] +'</td>';
                                html += '</tr>';
                            }
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="4">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                }
            });
        }
        $('.send').on('click',function(){
            if(Number($("#account_money").html())<=0){
                util.message('无分红可发放','danger');
                return false;
            }
            util.alert('是否发放分红？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo $teamBonusGrantUrl; ?>",
                    async : true,
                    success : function(data) {
                        if (data['code']) {
                            util.message('发放成功', 'success',"<?php echo __URL('ADDONS_MAINteamBonusBalance'); ?>");
                        } else {
                            util.message('发放失败', 'danger');
                        }
                    }
                })
            })
        })
    })
</script>
