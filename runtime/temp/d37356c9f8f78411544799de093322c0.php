<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:38:"template/platform/Order/sendGoods.html";i:1591330112;}*/ ?>
<form class="form-horizontal padding-15" id="delevery">
    <table class="table v-table table-auto-center">
        <thead>
        <tr>
            <th>
                <input type="checkbox" id="select_all" checked>
            </th>
            <th>商品</th>
            <th>数量</th>
            <th>物流单号</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($order_goods_list) || $order_goods_list instanceof \think\Collection || $order_goods_list instanceof \think\Paginator): if( count($order_goods_list)==0 ) : echo "" ;else: foreach($order_goods_list as $key=>$goods): ?>
        <tr>
            <td>
                <?php if($goods['shipping_status'] > 0 || ($goods['refund_status'] != 0 && !in_array($goods['refund_status'],[-1,-3]))): ?>
                <input type="checkbox" name="select_goods" value="<?php echo $goods['shipping_status']; ?>" disabled>
                <?php else: ?>
                <input type="checkbox" id="<?php echo $goods['order_goods_id']; ?>" value="<?php echo $goods['shipping_status']; ?>"
                       name="select_goods" checked>
                <?php endif; ?>
            </td>
            <td>
                <div class="media text-left">
                    <div class="media-left">
                        <img src="<?php echo getApiSrc($goods['picture_info']['pic_cover_mid']); ?>" alt="" width="60" height="60">
                    </div>
                    <div class="media-body max-w-300">
                        <div class="line-2-ellipsis"><?php echo $goods['goods_name']; ?></div>
                        <div class="small-muted line-2-ellipsis">
                            <?php if(is_array($goods['spec']) || $goods['spec'] instanceof \think\Collection || $goods['spec'] instanceof \think\Paginator): if( count($goods['spec'])==0 ) : echo "" ;else: foreach($goods['spec'] as $key=>$spec): ?>
                            <?php echo $spec['spec_name'].':'.$spec['spec_value_name'].' '; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <?php echo $goods['num']; ?>
            </td>
            <td>
                <?php echo !empty($goods['express_info']['express_no'])?$goods['express_info']['express_no']: ''; ?>
            </td>
            <td>
                <?php if($goods['refund_status'] != 0): ?>
                <span class="text-danger"><?php echo $goods['status_name']; ?></span>
                <?php else: ?>
                <span class="text-danger"><?php echo $goods['shipping_status_name']; ?></span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php if($order_info['goods_type']!='3'): ?>
    <div class="form-group">
        <label class="col-md-2 control-label">收货信息</label>
        <div class="col-md-10">
            <p class="form-control-static">
                <span class="mr-15"><?php echo $order_info['receiver_name']; ?></span>
                <span class="mr-15"><?php echo $order_info['receiver_mobile']; ?></span>
                <span class=""><?php echo $order_info['address'] . ' ' . $order_info['receiver_address']; ?></span>
            </p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">快递公司</label>
        <div class="col-md-5">
            <select class="form-control" id="delivery_express_company" required="">
                <?php if(is_array($express_company_list) || $express_company_list instanceof \think\Collection || $express_company_list instanceof \think\Paginator): if( count($express_company_list)==0 ) : echo "" ;else: foreach($express_company_list as $key=>$company): ?>
                <option value="<?php echo $company['co_id']; ?>" <?php if($company['co_id']== $order_info['shipping_company_id']): ?>checked<?php endif; ?>><?php echo $company['company_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">快递订单</label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="delivery_express_no">
            <p class="help-block">*发货后24小时内可以修改一次快递信息</p>
        </div>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">备注</label>
        <div class="col-sm-5">
            <textarea class="form-control ta_resize" rows="4" id="delivery_seller_memo"
                      placeholder="备注"></textarea>
        </div>
    </div>
</form>
<script>
    $("#select_all").on('change',function () {
        var checked = $(this).prop('checked');
        $("input[name='select_goods'][value='0']").not(":disabled").prop("checked",checked);
    })
</script>