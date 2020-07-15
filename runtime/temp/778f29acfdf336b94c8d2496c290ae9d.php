<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.tuandr.com/addons/teambonus/template/platform/teamAgentLevelList.html";i:1583811696;}*/ ?>

		<!-- page -->

		<div class="mb-20">
			<a href="<?php echo __URL('ADDONS_MAINaddTeamAgentLevel'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加等级</a>
		</div>

		<table class="table v-table table-auto-center">
			<thead>
			<tr>
				<th>等级名称</th>
				<th>分红比例</th>
				<th>升级条件</th>
				<th>降级条件</th>
				<th>权重</th>
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
        function isInArray(arr,value){
            for(var i = 0; i < arr.length; i++){
                if(value === arr[i]){
                    return true;
                }
            }
            return false;
        }
        function getList(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo $teamAgentLevelListUrl; ?>",
                async : true,
                data : {
                    "page_index" : page_index, "website_id":<?php echo $website_id; ?>
                },
                success : function(data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]["level_name"] + '</td>';
                            html += '<td>' + data["data"][i]["ratio"] + '</td>';
                            html += '<td>';
                            if(data["data"][i]["upgradetype"]==1){
                                var arr = data["data"][i]["upgradeconditions"].split(',');
                                if(data["data"][i]["pay_money"]>0 && isInArray(arr,"1")){
                                    html += '内购订单金额满'+data["data"][i]["pay_money"]+'元<br>';
                                }
                                if(data["data"][i]["number"] && isInArray(arr,"8")){
                                    html += '客户人数满'+data["data"][i]["number"]+'人<br>';
                                }
                                if(data["data"][i]["one_number"] && isInArray(arr,"3")){
                                    html += '一级分销商满'+data["data"][i]["one_number"]+'人<br>';
                                }
                                if(data["data"][i]["two_number"] && isInArray(arr,"4")){
                                    html += '二级分销商满'+data["data"][i]["two_number"]+'人<br>';
                                }
                                if(data["data"][i]["three_number"] && isInArray(arr,"5")){
                                    html += '三级分销商满'+data["data"][i]["three_number"]+'人<br>';
                                }
                                if(data["data"][i]["order_money"]>0 && isInArray(arr,"6")){
                                    html += '一级订单金额满'+data["data"][i]["order_money"]+'元<br>';
                                }
                                if(data["data"][i]["up_team_money"]>0 && isInArray(arr,"11")){
                                    html += '团队订单金额满'+data["data"][i]["up_team_money"]+'元<br>';
                                }
                                if(data["data"][i]["group_number"] && isInArray(arr,"2")){
                                    html += '团队人数满'+data["data"][i]["group_number"]+'人<br>';
                                }
                                if(data["data"][i]["level_number"] && isInArray(arr,"9")){
                                    html += '指定推荐等级['+data["data"][i]["upgrade_level_name"]+']人数满'+data["data"][i]["level_number"]+'人<br>';
                                }
                                if(data["data"][i]["goods_id"] && isInArray(arr,"7")){
                                    html += '购买指定商品'+data["data"][i]["goods_name"]+'<br>';
                                }
                            }else{
                                html += '无';
                            }
                            html += '</td>';
                            html += '<td>';
                            if(data["data"][i]["downgradetype"]==1){
                                var arr1 = data["data"][i]["downgradeconditions"].split(',');
                                if(data["data"][i]["team_number"] && isInArray(arr1,"1")){
                                    html += '距上次升级'+data["data"][i]["team_number_day"]+'天内团队订单量少于'+data["data"][i]["team_number"]+'个<br>';
                                }
                                if(data["data"][i]["team_money"] && isInArray(arr1,"2")){
                                    html += '距上次升级'+data["data"][i]["team_money_day"]+'天内团队订单金额少于'+data["data"][i]["team_money"]+'元<br>';
                                }
                                if(data["data"][i]["self_money"]>0 && isInArray(arr1,"3")){
                                    html += '距上次升级'+data["data"][i]["self_money_day"]+'天内内购订单金额少于'+data["data"][i]["self_money"]+'元<br>';
                                }
                            }else{
                                html += '无';
                            }
                            html += '</td>';
                            html += '<td>' + data["data"][i]["weight"] + '</td>';
                            if(data["data"][i]["is_default"]==1){
                                html += '<td class="fs-0 operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateTeamAgentLevel&id='+ data['data'][i]['id'])+'">编辑</a>';
                            }else{
                                html += '<td class="fs-0 operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateTeamAgentLevel&id='+ data['data'][i]['id'])+'">编辑</a> ';
                                html +=	'<a class="btn-operation text-red1 del" href="javascript:;" data-id="'+ data['data'][i]['id']+'" >删除</a></td>';
                            }

                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="6">暂无符合条件的数据记录</td></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#list").html(html);del();
                }
            });
        }
        function del(){
            $('.del').on('click',function(){
                var id = $(this).data('id');
                util.alert('确定删除该等级？',function(){
                    $.ajax({
                        type : "post",
                        url : "<?php echo $deleteTeamAgentLevelUrl; ?>",
                        data : {
                            'id' : id
                        },
                        async : true,
                        success : function(data) {
                            if (data['code'] > 0) {
                                util.message(data["message"], 'success', getList($("#page_index").val()));
                            } else {
                                util.message(data["message"], 'danger', getList($("#page_index").val()));
                            }
                        }
                    });
                })
            })
        }
    })
</script>