<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"template/platform/System/updateReferee2.html";i:1583811744;}*/ ?>
<div class="form-control-static"></div>
<div class="mb-10 flex flex-pack-justify">
    <input type="hidden" id="uid" value="<?php echo $uid; ?>">
    <input type="hidden" id="referee_id" value="">
    <input type="hidden" id="referee_name" value="">
    
    <div class="form-control-static">
        当前选择：<span class="strong new_referee"></span>
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
        <th>用户名称</th>
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
            var urls = __URL(PLATFORMMAIN + '/member/getUserLists');
            $.ajax({
                type : "post",
                url : urls,
                data : {
                    "page_index" : page_index, "search_text" : search_text
                },
                success : function(data) {
                    var html="";
                    if (data["data"].length>0){
                        for (var i = 0; i < data["data"].length; i++) {
                            if(data['data'][i]['uid']!=$("#uid").val()){
                                html += '<tr>';
                                if(data['data'][i]["user_name"]){
                                    html += '<td>' + data['data'][i]["user_name"] + '</td>';
                                }else{
                                    html += '<td>' + data['data'][i]["nick_name"] + '</td>';
                                }
                                
                                html += '<td>' + data['data'][i]["user_tel"] + '</td>';
                                html += '<td>' + data['data'][i]["level_name"] + '</td>';
                                html += '<td><a href="javascript:;" class="text-primary select_referee" data-id="' + data['data'][i]['uid'] +'" data-name="' + data['data'][i]['user_name'] +'" data-nick_name="' + data['data'][i]['nick_name'] +'">选择会员</a></td>';
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
                var nick_name = $(this).data('nick_name');
                if(uid!=0){
                    $("#referee_id").val(uid);
                    if(name){
                        $("#referee_name").val(name);
                        $(".new_referee").html(name);
                    }else if(nick_name){
                        $("#referee_name").val(nick_name);
                        $(".new_referee").html(nick_name);
                    }
                }else if(uid==0){
                    $("#referee_id").val('');
                    $(".new_referee").html('总店');
                }

            });

    })
</script>