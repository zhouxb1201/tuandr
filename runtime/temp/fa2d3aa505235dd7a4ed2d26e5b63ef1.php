<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"template/admin/System/uploadAlbumImgDialog.html";i:1586931652;}*/ ?>

<!-- 图片空间 -->
<div class="picture-dialog">
    <div class="picture-header flex flex-pack-end padding-15">
        <div>
            <a href="javascript:void(0);" class="btn btn-primary" id="createAlbum">创建相册</a>
            <button class="btn btn-info btn-file">上传图片<input id="fileupload" class="fileupload" type="file" name="file_upload" multiple></button>
        </div>
    </div>
    <div class="picture-body">
        <div class="picture-sidebar border-right">
            <div class="list-group album_id" id="album_id">
            </div>
        </div>
        <div class="picture-container">
            <ul class="album-list clearfix"></ul>
            <input type="hidden" id="page_index">
            <input type="hidden" id="selectedData">

        </div>

    </div>
    <div class="page clearfix" style="margin:10px 0px;">
        <div class="M-box3 m-style fr">
        </div>
    </div>
</div>


<script type="text/javascript">
    require(['utilAdmin'], function (utilAdmin) {
        $(function () {
            selectAlbum();
            changedpic(1);
            // 跳转相册
            $('.picture-dialog').on('click', '.album_category', function () {
                $(this).addClass('active').siblings().removeClass('active');
                localStorage.setItem("admin_album_id", $(this).data('album_id'));
                changedpic(1);
            });
            // 点击上传图片
            $('.picture-dialog').on('click', '.btn-file', function () {
                imgUpload1();
            });
        });

        var storage = new utilAdmin.Storage('session');
        var img_array = new Object();
        img_array["id"] = new Array();
        img_array["path"] = new Array();
        // var count = $("input[name='upload_img_id']").length;
        // if($('.add_tab1 li:eq(2)').hasClass('active')){
        //     var count =0;
        // }
        // else{
        //     var count = $("input[name='upload_img_id']").length;
        // }
        var count =storage.getItem('count1');
        var maxCount = 5;
        var Max = $('#J-goodspic').data('max');
        if(Max == '9'){
            maxCount = 9;
        }
        function selectAlbum() {
            var album_id = localStorage.getItem("admin_album_id");
            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/albumList'); ?>",
                data: {"page_size": 0},
                async: false,
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            if (album_id) {
                                if (data['data'][i]['album_id'] == album_id) {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category active" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                }
                            } else {
                                if (i == 0) {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category active" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                } else {
                                    html += '<a href="javascript:void(0)" class="list-group-item album_category" data-album_id="' + data["data"][i]["album_id"] + '">' + data["data"][i]["album_name"] + '<span class="badge"></span></a>';
                                }
                            }
                        }
                    }
                    $('.album_id').html(html);
                }
            });
        }

        //创建相册
        $('#createAlbum').on('click', function () {
            var html = '<form class="form-horizontal padding-15" >';
            html += '<div class="form-group"><label class="col-md-3 control-label">相册名称</label><div class="col-md-8"><input type="text" class="form-control albumName" /></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label">排序</label><div class="col-md-8"><input type="text" class="form-control sort" /></div></div>';
            html += '</form>';
            utilAdmin.confirm('创建相册', html, function () {
                var name = this.$content.find('.albumName').val();
                var sort = this.$content.find('.sort').val();
                if (!name) {
                    utilAdmin.message('内容不能为空');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo __URL('ADMIN_MAIN/system/addalbumclass'); ?>",
                    data: {
                        "album_name": name,
                        "sort": sort
                    },
                    dataType: "json",
                    async: true,
                    success: function (data) {
                        if (data) {
                            localStorage.setItem("admin_album_id", data["code"]);
                            utilAdmin.message('创建成功', 'success', function () {
                                selectAlbum();
                                changedpic(1);
                            });
                        }
                    }
                })
            })
        })


        //图片上传
        function imgUpload1() {
            var album_id = $('body').find("#album_id").children('.active').data("album_id");
            var dataAlbum = {
                "album_id": album_id,
                "type": "1,2,3,4"
            };
            if (album_id > 0) {
                var options = {
                    url: "<?php echo __URL('ADMIN_MAIN/upload/uploadFile'); ?>", //上传地址
                    autoUpload: true, //是否自动上传
                    acceptFileTypes: /(.|\/)(jpe?g|png)$/i, //文件格式限制
                    maxNumberOfFiles: 1, //最大上传文件数目
                    maxFileSize: 5000000, //文件不超过5M
                    sequentialUploads: true, //是否队列上传
                    dataType: 'json',
                    formData: dataAlbum //从服务器返回数据json类型
                };
                utilAdmin.fileuploadPicSpace(options, function (file_url) {
                    changedpic(1);
                });
            }

        }

        /* 切换图片库 */
        function changedpic(page_index) {
            /*
             ** val 表示选中图片库的值
             ** sort 弹出图片库选中筛选排序值
             */
            var album_id = $('body').find(".list-group").children('.active').data("album_id");
            $('#page_index').val(page_index ? page_index : '1');

            $.ajax({
                type: "post",
                url: "<?php echo __URL('ADMIN_MAIN/system/getalbunpic'); ?>",
                data: {"page_index": page_index, "page_size": $("#showNumber").val(), "album_id": album_id},
                success: function (data) {
                    var html = '';
                    if (data["data"].length > 0) {
                        for (var i = 0; i < data["data"].length; i++) {
                            html += '<li class="item albumItem" data-path="' + __IMG(data["data"][i]["pic_cover"]) + '" data-id="' + data["data"][i]["pic_id"] + '"><img src="' + __IMG(data["data"][i]["pic_cover"]) + '"></li>';
                        }
                    } else {
                        html += '<div class="empty-box">暂无符合条件的数据记录</div>';
                    }
                    $(".album-list").html(html);
                    utilAdmin.page(".M-box3", data['total_count'], data["page_count"], page_index, changedpic);
                }
            });
        }

        //选择图片
        $('.album-list').on('click', '.albumItem', function () {
            var id = $(this).data("id").toString();
            var path = $(this).data("path");
            if (storage.getKey('multiple') && storage.getItem('multiple') === '1') {
                //多选图片
                if ($(this).hasClass("active")) {
                    // 取消选中
                    $(this).removeClass("active");
                    var index = $.inArray(id, img_array["id"]);
                    img_array["id"].splice(index, 1);
                    img_array["path"].splice(index, 1);
                    --count;
                } else {
                    // 选中图片
                    if (count > maxCount - 1) {
                        utilAdmin.message('最多可选择' + maxCount + '张图片')
                        return false;
                    }
                    $(this).addClass("active");
                    img_array["id"].push(id);
                    img_array["path"].push(path);
                    ++count;
                }
            } else {

                //单选图片
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    img_array["id"] = [];
                    img_array["path"] = [];
                } else {
                    $(this).addClass("active").siblings().removeClass('active');
                    img_array["id"][0] = id;
                    img_array["path"][0] = path;
                }
            }

            $('#selectedData').data(img_array);
        });

    });
</script>