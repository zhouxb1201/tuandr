<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:43:"template/platform/System/updateReferee.html";i:1591330114;}*/ ?>
<div class="form-control-static">可将关系链以外的人设为上级，修改前产生的订单按照原先关系链计算佣金，修改后产生的订单按照新的关系链计算佣金。</div>
<div class="mb-10 flex flex-pack-justify">
    <input type="hidden" id="uid" value="<?php echo $uid; ?>">
    <input type="hidden" id="referee_id" value="">
    <input type="hidden" id="referee_name" value="">
    <div class="form-control-static">
        当前上级：<span class="strong"><?php if($name): ?><?php echo $name; else: ?>总店<?php endif; ?></span>
        新上级：<span class="strong new_referee"></span>
    </div>
    <div class="input-group search-input-group">
        <input type="text" class="form-control search_text"  placeholder="昵称/用户名">
        <span class="input-group-btn">
            <a href="javascript:;" class="btn btn-primary search">搜索</a>
        </span>
    </div>
</div>
<table class="table v-table table-auto-center">
    <thead>
    <tr>
        <th>分销商</th>
        <th>联系方式</th>
        <th>等级</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="referee_distributor">
    </tbody>
</table>
<input type="hidden" id="lower_id" value="<?php echo $lower_id; ?>">
<nav aria-label="Page navigation" class="clearfix">
    <ul id="page2" class="pagination pull-right"></ul>
</nav>
<script>
    require(['util'],function(util){
        util.initPage(getList,'page2');
        function getList(page_index){
            var search_text = $(".search_text").val();
            var lower_id = $("#lower_id").val();
            $.ajax({
                type : "post",
                url : "<?php echo $refereeDistributorListUrl; ?>",
                data : {
                    "page_index" : page_index, "search_text" : search_text,"lower_id":lower_id
                },
                success : function(data) {
                    var html="";
                    if (data["data"].length>0){
                        html += '<tr>';
                        html += '<td>总店</td>';
                        html += '<td></td>';
                        html += '<td></td>';
                        html += '<td><a href="javascript:;" class="text-primary select_referee" data-id="0" data-name="总店">设为上级</a></td>';
                        html += '</tr>';
                        for (var i = 0; i < data["data"].length; i++) {
                            if(data['data'][i]['uid']!=$("#uid").val()){
                                html += '<tr>';
                                html += '<td>' + data['data'][i]["user_name"] + '</td>';
                                html += '<td>' + data['data'][i]["mobile"] + '</td>';
                                html += '<td>' + data['data'][i]["level_name"] + '</td>';
                                html += '<td><a href="javascript:;" class="text-primary select_referee" data-id="' + data['data'][i]['uid'] +'" data-name="' + data['data'][i]['user_name'] +'">设为上级</a></td>';
                                html += '</tr>';
                            }
                        }
                    }else{
                        html += '<tr><th colspan="5">暂无符合条件的数据记录</th></tr>';
                    }
                    $('#page2').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    $("#referee_distributor").html(html);
                }
            });
        }
        $('.search').on('click',function(){
            util.initPage(getList,'page2');
        });
            $('body').on('click','.select_referee',function(){
                var uid = $(this).data('id');
                var name = $(this).data('name');
                if(uid!=0){
                    $("#referee_id").val(uid);
                    // $("#referee_name").val(name);
                    $(".new_referee").html(name);
                }else if(uid==0){
                    $("#referee_id").val('');
                    $(".new_referee").html('总店');
                }

            });

    })
</script>