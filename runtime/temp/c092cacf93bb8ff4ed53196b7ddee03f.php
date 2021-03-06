<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"template/admin/Goods/selectCategory.html";i:1583811760;}*/ ?>
<style>
    .category-group{
    border: 1px solid #ddd;
    height: 404px;
}
.category-group .list{
    border-right:  1px solid #ddd;
    height: 100%;
    overflow-y: auto;
}
.category-group .list:last-child{
    border-right: 0;
}
.category-group .list .item{
    display:  block;
    padding:  10px 15px;
    position: relative;
}
.category-group .list .item:after{
    display: inline-block;
    width: 8px;
    height: 8px;
    border-top: 1px solid #ffffff;
    border-right: 1px solid #ffffff;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    position: absolute;
    right: 15px;
    top: 16px;
}
.category-group .list .item.active{
    color: #fff;
    background: #2c9cf0;
}
.category-group .list .item.active:after{
    content: '';
}
.category-group .list:last-child .item.active:after{
    content: initial;
}
.flex-1 {
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}
</style>
<div class="links-dialog">
    <div class="tab-content min-h-200">
            <p class="form-control-static">请选择分类<span class="pull-right small-muted">你选择的分类是：<b id="selectedSort"></b></span></p>
            <div class="category-group flex">
                <div class="list flex-1" id="sort1"></div>
                <div class="list flex-1" id="sort2"></div>
                <div class="list flex-1" id="sort3"></div>
            </div>
        </div>
    <input type="hidden" id="selected_c1">
    <input type="hidden" id="selected_c2">
    <input type="hidden" id="selected_c3">
    <input type="hidden" id="selected_cn">
</div>

<script>

$(function () {
    var cname1,cname2,cname3;
    var cid1 = $('#category_id_1').val();
    var cid2 = $('#category_id_2').val();
    var cid3 = $('#category_id_3').val();
    var select_cname = $('#select_name_hidden').val();
    $('#selected_c1').val(cid1);
    $('#selected_c2').val(cid2);
    $('#selected_c3').val(cid3);
    $('#selected_cn').val(select_cname);
    $('#selectedSort').html(select_cname);
    // 获取分类数据
    //获取一级分类链接
    function select_cates() {
        $.ajax({
            type: "post",
            url: __URL(ADMINMAIN + '/goods/getcategorylistforlink'),
            async: false,
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        var active = '';
                        if(curr['category_id'] == cid1){
                            active = 'active';
                        }
                        html += '<a href="javascript:void(0);" class="item '+active+'" data-id="' + curr["category_id"] + '">' + curr["short_name"] + '</a>';
                    }
                } else {
                    html += '<div class="padding-15">暂无符合条件的数据记录</div>';
                }
                $("#sort1").html(html);
                cname1 = $('#sort1 .active').text();
            }
        });
    };
    select_cates();
    if(cid1 > 0){
        selectcate1(cid1);
    }
    if(cid2 > 0){
        selectcate2(cid2);
    }
    //获取二级分类链接
    function selectcate1(id) {
        $("#sort2").html("");
        $("#sort3").html("");
        $.ajax({
            type: "post",
            url: __URL(ADMINMAIN + '/goods/getcategorylistforlink'),
            data: {
                "id": id
            },
            async: false,
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        var active = '';
                        if(curr['category_id'] == cid2){
                            active = 'active';
                        }
                        html += '<a href="javascript:void(0);" class="item '+active+'" data-id="' + curr["category_id"] + '">' + curr["short_name"] + '</a>';
                    }
                } else {
                    html += '<div class="padding-15">暂无符合条件的数据记录</div>';
                }
                $("#sort2").html(html);
                cname2 = $('#sort2 .active').text();
            }
        });
    }
    //获取三级分类链接
    function selectcate2(id) {
        $.ajax({
            type: "post",
            url: __URL(ADMINMAIN + '/goods/getcategorylistforlink'),
            data: {
                "id": id
            },
            async: false,
            success: function (data) {
                var html = "";
                if (data['data'].length > 0) {
                    for (var i = 0; i < data['data'].length; i++) {
                        var curr = data['data'][i];
                        var active = '';
                        if(curr['category_id'] == cid3){
                            active = 'active';
                        }
                        html += '<a href="javascript:void(0);" class="item '+active+'" data-id="' + curr["category_id"] + '">' + curr["short_name"] + '</a>';
                    }
                } else {
                    html += '<div class="padding-15">暂无符合条件的数据记录</div>';
                }
                $("#sort3").html(html);
                cname3 = $('#sort3 .active').text();
            }
        });
    }
    $('#sort1').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        $('#sort3').html('');
        cname1 = $(this).text();
        var cid1 = $(this).data('id');
        cid2 = '';
        cid3 = '';
        $('#selected_c2').val(cid2);
        $('#selected_c3').val(cid3);
        selectcate1(cid1);
        $('#selected_cn').val(cname1);
        $('#selected_c1').val(cid1);
        $('#selectedSort').html(cname1);
    });
    $('#sort2').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        cname2 = $(this).text();
        var cid2 = $(this).data('id');
        cid3 = '';
        $('#selected_c3').val(cid3);
        selectcate2(cid2);
        $('#selected_cn').val(cname1 +' > '+ cname2);
        $('#selectedSort').html(cname1 +' > '+ cname2);
        $('#selected_c2').val(cid2);
        
    });
    $('#sort3').on('click', '.item', function() {
        $(this).addClass('active').siblings().removeClass('active');
        cname3 = $(this).text();
        var cid3 = $(this).data('id');
        $('#selected_cn').val(cname1 +' > '+ cname2 +' > '+ cname3);
        $('#selectedSort').html(cname1 +' > '+ cname2 +' > '+ cname3);
        $('#selected_c3').val(cid3);
    });
});
</script>