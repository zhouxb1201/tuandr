<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/www.tuandr.com/addons/discount/template/platform/discountInfo.html";i:1583811702;}*/ ?>



<div class="couponsDetails">
    <!-- page -->
    <div class="screen-title"><span class="text">活动信息</span></div>
    <form class="form-horizontal" role="form">
        <!--<div class="form-group mb0">
            <label class="col-sm-1 control-label">适用范围</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="range"></p>
            </div>
        </div>
        <div class="form-group mb0">
            <label class="col-sm-1 control-label">活动名称</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="discount_name"></p>
            </div>
        </div>
        <div class="form-group mb0">
            <label class="col-sm-1 control-label">活动折扣</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="discount_num"></p>
            </div>
        </div>
        <div class="form-group mb0">
            <label class="col-sm-1 control-label">生效时间</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="time"></p>
            </div>
        </div>
        <div class="form-group mb0">
            <label class="col-sm-1 control-label">活动说明</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="remark"></p>
            </div>
        </div>
        <div class="form-group mb0">
            <label class="col-sm-1 control-label">活动状态</label>
            <div class="col-sm-6">
                <p class="form-control-static" id="status"></p>
            </div>
        </div>-->
            <div class="col-md-10">
                <table class="table v-table table-auto-center table-bordered">
                    <tbody>
                        <tr>
                            <input type="hidden" id="discount_id" name="discount_id" value="<?php echo $info['discount_id']; ?>">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p >适用范围</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="range">
                                    <?php if($info['shop_id'] != 0): ?>店铺端<?php endif; if($info['range_type'] == 1): ?> 自营店<?php endif; if($info['range_type'] == 2): ?> 全平台 <?php endif; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>活动名称</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="discount_name"><?php echo $info['discount_name']; ?></p>
                            </td>
                        </tr>
                        <?php if($info['range'] == 1): ?>
                        <tr>
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>活动折扣</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="discount_num"><?php echo $info['discount_num']; ?>折</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>生效时间</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="time"><?php echo timeStampTurnDate($info['start_time'] ); ?> 00:00:00 ~ <?php echo timeStampTurnDate($info['end_time'] ); ?> 23:59:59</p>
                            </td>
                        </tr>
                        <tr class="no_sku">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>活动说明</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="remark"><?php echo $info['remark']; ?></p>
                            </td>
                        </tr>
                        <tr class="no_sku">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>活动状态</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="status">
                                    <?php if($info['status'] == 0): ?>未发布<?php endif; if($info['status'] == 1): ?>正常<?php endif; if($info['status'] == 3): ?>关闭<?php endif; if($info['status'] == 4): ?>结束<?php endif; ?>
                                </p>
                            </td>
                        </tr>
                        <tr class="no_sku">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>商品范围</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="remark"><?php if($info['range'] == 1): ?>全部商品<?php else: ?>部分商品<?php endif; ?></p>
                            </td>
                        </tr>
                        <tr class="no_sku">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>折扣类型</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="discount_type"><?php if($info['discount_type'] == 2): ?>固定价格<?php else: ?>打折<?php endif; ?></p>
                            </td>
                        </tr>
                        <?php if($info['integer_type'] == 1): ?>
                        <tr class="no_sku">
                            <td class="col-md-3 bg-f5">
                                <div class="padding-15">
                                    <p>小数取整</p>
                                </div>
                            </td>
                            <td class="text-left">
                                <p id="integer_type"><?php if($info['integer_type'] == 1): ?>是<?php else: ?>否<?php endif; ?></p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group"></div>
    </form>
    <?php if($info['range'] == 2): ?>
    <div class="screen-title"><span class="text">活动商品</span></div>

    <!--表格-->
    <table class="table v-table table-auto-center">
        <thead>
        <tr>
            <th class="col-md-6">商品信息</th>
            <th>库存</th>
            <th>店铺</th>
            <th>折扣/折扣价</th>
        </tr>
        </thead>
        <tbody class="trs" id="seleted_goods_list">
        </tbody>
    </table>
    <?php endif; ?>
    <div class="cd-back" >
        <a href="javascript:window.history.go(-1)" style="text-align: center;color:white;background: #2c9cf0;padding: 10px;margin-left:10%;border-radius: 5px;">返回</a>
    </div>
    <!-- page end -->
</div>


<script>
  require(['utilAdmin','util'], function (utilAdmin,util) {
    $(function () {
            discountInfo();
    })

    function discountInfo() {
        $("#discountInfo").modal("show");
        var discount_id = parseInt($("input[name='discount_id']").val());
        $.ajax({
            type : "post",
            url : "<?php echo $gettail; ?>",
            data : {
                'discount_id':discount_id
            },
            success : function(data) {
                $data_array = data['data'];
                var html = '';
                var seleted_html = '';
                if (data['goods_list'].length > 0) {
                    for (var i = 0; i < data['goods_list'].length; i++) {
                        html+='<tr>';
                        html+='<td>';
                        html+='<div class="media text-left">';
                        html+='<div class="media-left">';
                        html +='<div>';
                        if(data['goods_list'][i]["picture_info"]['pic_cover']){
                            html +='<img src="'+__IMG(data['goods_list'][i]["picture_info"]['pic_cover'])+'" width="60" height="60"></div></th>';
                        }else{
                            html +='<img src="http://iph.href.lu/60x60" width="60" height="60"></div></th>';
                        }
                        html +='</div>';
                        html+='<div class="media-body break-word">';
                        html+='<div class="line-2-ellipsis"><a href="'+__URLS('SHOP_MAIN/goods/goodsinfo&goodsid='+data['goods_list'][i]["goods_id"])+'" target="_blank" class="new-window" title="'+data['goods_list'][i]["goods_name"]+'">'+data['goods_list'][i]["goods_name"]+'</a></div>';
                        html+='</div>';
                        html+='</div>';
                        html+='</td>';
                        html+='<td>';
                        if(parseInt(data['goods_list'][i]["stock"])>0){
                            html+=data['goods_list'][i]["stock"];
                        }else{
                            html+= 0;
                        }
                        html+='</td>';
                        html+='<td>';
                        html+=data['goods_list'][i]["shop_name"];
                        html+='</td>';
                        html+='<td>';
                        if(data['goods_list'][i]["discount_type"] == 2){
                            html +=data['goods_list'][i]["discount"]+'元';
                        }else {
                            html +=data['goods_list'][i]["discount"]+'折';
                        }
                        html+='</td>';
                        html+='</tr>';
                        //

                    }
                }
                $("#seleted_goods_list").append(html);
                var totalpage = $("#page_count").val();
                if (totalpage == 1) {
                    changeClass("all");
                }
            }
        });
    }

  })

</script>
