<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/www/wwwroot/www.tuandr.com/addons/areabonus/template/platform/areaBonusDetail.html";i:1583811698;}*/ ?>

		<!-- page -->
		<div class="screen-title"><span class="text">明细列表</span></div>
		<table class="table v-table table-auto-center">
			<thead>
			<tr>
				<th>分红金额</th>
				<th>分红人数</th>
				<th>分红方式</th>
				<th>分红时间</th>
				<th class="col-md-2 pr-14 operationLeft">操作</th>
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
                url : "<?php echo $areaBonusListUrl; ?>",
                async : true,
                data : {
                    "page_index" : page_index, "website_id":<?php echo $website_id; ?>
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data['data'][i]["bonus_total"] + '</td>';
                            html += '<td>' + data['data'][i]["bonus_number"] +'</td>';
                            if(data['data'][i]["type"]==1){
                                html += '<td >手动</td>';
                            }else{
                                html += '<td >自动</td>';
                            }

                            html += '<td>' +data['data'][i]["grant_time"] +'</td>';
                            html += '<td class="operationLeft fs-0"><a class="btn-operation" href="'+__URL('ADDONS_MAINareaBonusInfo&sn='+ data['data'][i]['sn']) +'">详情</a></td>';
                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="5">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);
                }
            });
        }
    })
</script>
