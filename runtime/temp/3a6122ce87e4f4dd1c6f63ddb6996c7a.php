<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/www/wwwroot/www.tuandr.com/addons/thingcircle/template/platform/thingcircleList.html";i:1583811702;}*/ ?>

			<!-- page -->
                <form class="v-filter-container">
                    <div class="filter-fields-wrap">
                        <div class="filter-item clearfix">
                            <div class="filter-item__field">
                                <div class="v__control-group">
                                    <label class="v__control-label">发布人</label>
                                    <div class="v__controls">
                                        <input type="text" id="search_user" class="v__control_input" placeholder="请输入用户名称" autocomplete="off">
                                    </div>
                                </div>

                                <div class="v__control-group">
                                    <label class="v__control-label">发布内容</label>
                                    <div class="v__controls">
                                        <input type="text" id="search_text" class="v__control_input" placeholder="请输入发布内容" autocomplete="off">
                                    </div>
                                </div>

                                <div class="v__control-group">
                                    <label class="v__control-label">发布时间</label>
                                    <div class="v__controls v-date-input-control">
                                        <label for="create_time">
                                            <input type="text" class="v__control_input pr-30" id="create_time" placeholder="请选择时间" autocomplete="off" data-types="datetime">
                                            <i class="icon icon-calendar"></i>
                                            <input type="hidden" id="create_starttime">
                                            <input type="hidden" id="create_endtime">
                                        </label>
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

            <div class="mb-10">
                <a class="btn btn-primary" href="<?php echo __URL('platform/Menu/addonmenu?addons=addThingcircle'); ?>"><i class="icon icon-add1"></i> 发布干货</a>
            </div>
			<table class="table v-table table-auto-center">
				<thead>
				<tr>
					<th>发布人</th>
					<th>内容</th>
					<th>发布时间</th>
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


<script>
    require(['util'],function(util){
        util.layDate('#create_time',true,function(value, date, endDate){
            var h=date.hours<10 ?"0"+date.hours : date.hours;
            var m=date.minutes<10 ?"0"+date.minutes : date.minutes;
            var s=date.seconds<10 ?"0"+date.seconds : date.seconds;
            var h1=endDate.hours<10 ?"0"+endDate.hours : endDate.hours;
            var m1=endDate.minutes<10 ?"0"+endDate.minutes : endDate.minutes;
            var s1=endDate.seconds<10 ?"0"+endDate.seconds : endDate.seconds;
            var date1=date.year+'-'+date.month+'-'+date.date+' '+h+":"+m+":"+s;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date+' '+h1+":"+m1+":"+s1;
            if(value){
                $('#create_starttime').val(date1);
                $('#create_endtime').val(date2);
            }
            else{
                $('#create_starttime').val('');
                $('#create_endtime').val('');
            }
        });
        util.initPage(getList);
        function getList(page_index){
            $("#page_index").val(page_index);
            var search_user = $("#search_user").val();
            var search_text = $("#search_text").val();
            var create_starttime = $("#create_starttime").val();
            var create_endtime = $("#create_endtime").val();
            $.ajax({
                type : "post",
                url : '<?php echo $thingcircleListUrl; ?>',
                async : true,
                data : {
                    "page_index" : page_index,"search_user" : search_user,"search_text" : search_text,"create_starttime" : create_starttime,"create_endtime":create_endtime
                },
                success : function(data) {
                    var html = '';
                    if (data['data'].length>0) {
                        for (var i = 0; i < data['data'].length; i++) {
                            html += '<tr>';
                            if(data['data'][i]["user_headimg"]){
                                html +='<td><img src="'+__IMG(data['data'][i]["user_headimg"])+'" width="30" height="30">&nbsp' + data['data'][i]["thing_user_name"] + '</span></td>';
                            }else{
                                html +='<td><img src="/public/static/images/headimg.png" width="30" height="30">&nbsp' + data['data'][i]["thing_user_name"] + '</span></td>';
                            }
                            if(data['data'][i]["title"]){
                                if(data['data'][i]["topic_title"]){
                                    html += '<td><font color="#FF8C00">#' + data['data'][i]["topic_title"] + '#</font>' + data['data'][i]["title"] + '</td>';
                                }else{
                                    html += '<td>' + data['data'][i]["title"] + '</td>';
                                }
                            }else{
                                if(data['data'][i]["topic_title"]){
                                    html += '<td><font color="#FF8C00">#' + data['data'][i]["topic_title"] + '#</font>' + data['data'][i]["content"] + '</td>';
                                }else{
                                    html += '<td>' + data['data'][i]["content"] + '</td>';
                                }
                            }
							html += '<td><span class="block">' + data['data'][i]["create_time"] + '</span></td>';
							html += '<td class="fs-0 operationLeft">';
                            if(data['data'][i]["user_id"] == "<?php echo $uid; ?>"){
                                html += '<a class="btn-operation edit" href="'+__URL('ADDONS_MAINupdateThingcircle&id='+ data['data'][i]['id']) +'" data-id="' + data['data'][i]['id'] +'">编辑</a>';
                            }
                            html += '<a class="btn-operation detail" href="'+__URL('ADDONS_MAINthingcircleDetail&id='+ data['data'][i]['id']) +'" data-id="' + data['data'][i]['id'] +'" data-id="' + data['data'][i]['id'] +'">详情</a>';
							html += '<a class="btn-operation del" href="javascript:;" data-id="' + data['data'][i]['id'] +'">删除</a>';
							html += '</td>';
                            html += '</tr>';
                            html += '<tr class="title-tr"><td colspan="1" class="" style="border-top:0;">';
                            if(data['data'][i]["port"] == 'admin'){
                                html += '<span class="label label-skyBlue">入驻商家</span>';
                            }else if(data['data'][i]["user_id"] == "<?php echo $uid; ?>"){
                                html += '<span class="label label-skyBlue">平台商家</span>';
                            }
                            html += '</td><td colspan="3" class="text-right" style="border-top:0;">';
                            html += '<span class="label label-red">阅读量'+ data['data'][i]["reading_volumes"] +'</span>&nbsp;-&nbsp;';
                            html += '<span class="label label-red">收藏数'+ data['data'][i]["collects"] +'</span>&nbsp;-&nbsp;';
                            html += '<span class="label label-red">点赞数'+ data['data'][i]["likes"] +'</span>&nbsp;-&nbsp;';
                            html += '<span class="label label-red">评论数'+ data['data'][i]["evaluates"] +'</span>';
                            html += '</td></tr>';
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
        $('.search').on('click',function(){
            util.initPage(getList(1));
        });
        $('body').on('click','.del',function(){
            var id = $(this).data('id');
            util.alert('是否删除该干货？',function(){
                $.ajax({
                    type : "post",
                    url : "<?php echo $delThingcircleUrl; ?>",
                    data:{'id':id},
                    async : true,
                    success : function(data) {
                        if(data["code"] > 0 ){
                            util.message(data["message"], 'success', getList($("#page_index").val()));
                        }else{
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            })
        });
    })
</script>
