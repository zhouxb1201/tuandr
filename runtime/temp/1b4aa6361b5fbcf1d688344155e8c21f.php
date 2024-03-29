<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/www/wwwroot/www.tuandr.com/addons/microshop/template/platform/shopkeeperLevelList.html";i:1583811704;}*/ ?>

			<!-- page -->

			<div class="mb-20">
				<a href="<?php echo __URL('ADDONS_MAINaddShopkeeperLevel'); ?>" class="btn btn-primary"><i class="icon icon-add1"></i> 添加等级</a>
			</div>

			<table class="table v-table table-auto-center">
				<thead>
				<tr>
					<th>等级名称</th>
					<?php if($website['microshop_pattern']>=1): ?>
					<th>一级收益</th>
					<?php endif; if($website['microshop_pattern']>=2): ?>
					<th>二级收益</th>
					<?php endif; if($website['microshop_pattern']>=3): ?>
					<th>三级收益</th>
					<?php endif; ?>
					<th>升级条件</th>
					<th>权重</th>
					<th class="col-md-2 pr-14 operationLeft">操作</th>
				</tr>
				</thead>
				<tbody id="list">

				</tbody>
			</table>
			<input type="hidden" id="page_index" value="">
			<nav aria-label="Page navigation" class="clearfix">
				<ul id="page" class="pagination pull-right"></ul>
			</nav>
			<!-- page end -->
<input type="hidden" id="pattern" value="<?php if($website['microshop_pattern']): ?><?php echo $website['microshop_pattern']; else: ?>0<?php endif; ?>">


<script>
    require(['util'],function(util){
        util.initPage(getList);
        var pattern = $('#pattern').val();
        function getList(page_index) {
            $("#page_index").val(page_index);
            $.ajax({
                type : "post",
                url : "<?php echo $shopkeeperLevelListUrl; ?>",
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
                            if (pattern>=1){
                                html += '<td>' + data["data"][i]["profit1"] + '</td>';
							}
                            if(pattern>=2){
                                html += '<td>' + data["data"][i]["profit2"] + '</td>';
							}
                            if(pattern>=3){
                                html += '<td>' + data["data"][i]["profit3"] + '</td>';
                            }
                            html += '<td>';
                            if(data["data"][i]["is_default"]!=1){
								html += '购买商品';
                            }else{
                                html += '无';
                            }
                            html += '</td>';
                            html += '</td>';
                            html += '<td>' + data["data"][i]["weight"] + '</td>';
                            if(data["data"][i]["is_default"]==1){
                                html += '<td class="fs-0 operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateShopkeeperLevel&id='+ data['data'][i]['id'])+'">编辑</a>';
                            }else{
                                html += '<td class="fs-0 operationLeft"><a class="btn-operation"  href="'+ __URL('ADDONS_MAINupdateShopkeeperLevel&id='+ data['data'][i]['id'])+'">编辑</a>';
                                html +=	'<a class="btn-operation text-red1 del" href="javascript:;" data-id="'+ data['data'][i]['id']+'" >删除</a></td>';
                            }

                            html += '</tr>';
                        }
                    } else {
                        html += '<tr><td class="h-200" colspan="7">暂无符合条件的数据记录</td></tr>';
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
                        url : "<?php echo $deleteShopkeeperLevelUrl; ?>",
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
