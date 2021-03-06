<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"template/platform/System/selectQuestion.html";i:1583811744;}*/ ?>
<div class="goods-dialog">
    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab" class="flex-auto-center">文章列表</a></li>
        <div class="input-group search-input-group pull-right">
            <input type="text" class="form-control" placeholder="文章名称" name="cms_name" id="cms_name">
            <span class="input-group-btn"><a class="btn btn-primary search">搜索</a></span>
        </div>
    </ul>
    <div class="dialog-box">
        <table class="table v-table table-auto-center">
            <thead>
            <tr>
                <th>文章名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="j-list">

            </tbody>
        </table>
    </div>
    <div>
        <span class="user_name_span J-user_name">选中的文章：</span>
        <input type="text" class="form-control cms_val J-admin_name"  name="cms_val" disabled>
        <input type="hidden" class="selectCms_id">
    </div>
    <input type="hidden" id="page_index">
    <nav aria-label="Page navigation" class="clearfix">
        <ul id="page" class="pagination pull-right"></ul>
    </nav>
</div>
<script>
    require(['util'],function(util) {
        $(document).ready(function(){
            var width = $(".J-user_name").innerWidth();
            $('.J-admin_name').css('padding-left',width);
        });
        util.initPage(getList);
        function getList(page_index) {
            $("#page_index").val(page_index);
            var search_text = $("#cms_name").val();
            $.ajax({
                type: "post",
                    url: "<?php echo __URL('PLATFORM_MAIN/system/selectQuestionList'); ?>",
                async: true,
                data: {
                    "page_index": page_index,
                    "search_text": search_text
                },
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<tr>';
                            html += '<td>' + data["data"][i]['title'] + '</td>';
                            html += '<td><a href="javascript:void(0);" class="text-primary selectedCms" data-id = "' + data["data"][i]['question_id'] + '" data-name="' + data["data"][i]['title'] + '" >选择</a></td>';
                            html += '</tr>';
                        }

                    } else {
                        html += '<tr><th colspan="3">暂无符合条件的数据记录</th></tr>';
                    }
                    $('#page').paginator('option', {
                        totalCounts: data['total_count']  // 动态修改总数
                    });
                    console.log(html)
                    $("#j-list").html(html);selectedCms();
                }
            });
        }
        $('.search').on('click', function () {
            util.initPage(getList);
        });
        function selectedCms() {
            $('.selectedCms').on('click', function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $(".selectCms_id").val(id);
                $(".cms_val").val(name);
            })
        }
    })
</script>