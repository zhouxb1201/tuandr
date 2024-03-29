<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/www.tuandr.com/addons/bargain/template/admin/bargainDetail.html";i:1583811704;}*/ ?>


        <form class="form-horizontal pt-15 form-validate">
            <div class="col-md-10">
            <table class="table v-table table-auto-center table-bordered">
                <tbody>
                    <tr>
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>活动标签</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p><?php echo $bargain_detail['bargain_name']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>活动时间</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p><?php echo $bargain_detail['start_bargain_time_format']; ?> ~ <?php echo $bargain_detail['end_bargain_time_format']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>活动商品</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="media text-left">
                                <div class="media-left goods-img">
                                    <img  src="<?php echo __IMG($bargain_detail['pic_cover']); ?>" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                                </div>
                                <div class="media-body max-w-300">
                                    <div class="line-2-ellipsis goods-text"><?php echo $bargain_detail['goods_name']; ?></div>
                                    <!--<div class="line-1-ellipsis text-danger strong goods-price"><?php echo $bargain_detail['start_money']; ?></div>-->
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>初始金额</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="start_money"><?php echo $bargain_detail['start_money']; ?></p>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>最低砍至金额</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="lowest_money"><?php echo $bargain_detail['lowest_money']; ?></p>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>第一刀砍价</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="first_bargain_money"><?php echo $bargain_detail['first_bargain_money']; ?></p>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>单次砍价金额</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="bargain_method"><?php if($bargain_detail['bargain_method'] == 1): ?><?php echo $bargain_detail['fix_money']; else: ?><?php echo $bargain_detail['rand_lowest_money']; ?> ~ <?php echo $bargain_detail['rand_highest_money']; endif; ?></p>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>活动库存</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="bargain_stock"><?php echo $bargain_detail['bargain_stock']; ?></p>
                        </td>
                    </tr>
                    <tr class="no_sku">
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>限购</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p id="limit_buy"><?php echo $bargain_detail['limit_buy']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-3 bg-f5">
                            <div class="padding-15">
                                <p>活动状态</p>
                            </div>
                        </td>
                        <td class="text-left">
                            <p><?php if($bargain_detail['bargain_status'] == 1): ?>待开始<?php elseif($bargain_detail['bargain_status']==2): ?>进行中<?php else: ?>已结束<?php endif; ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            <input type="hidden" name="goods_id" id="goods_id" value="<?php echo $bargain_detail['goods_id']; ?>">
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>


<script>
    require(['util'], function (util) {

    })
</script>

