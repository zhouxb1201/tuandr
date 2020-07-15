<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/wwwroot/www.tuandr.com/addons/bargain/template/admin/addBargain.html";i:1583811704;}*/ ?>

<!-- page -->
<style>
    .form_time{margin-left:15px !important;}
    .red_font{color:#ff0000}
</style>
<form class="form-horizontal pt-15 form-validate widthFixedForm">
    <div class="screen-title">
        <span class="text">规则设置</span>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>活动标签</label>
        <div class="col-md-5">
            <input type="text" name="bargain_name" id="bargain_name" value="<?php echo $bargain_info['bargain_name']; ?>" required maxlength="4" class="form-control w-200" placeholder="最多只可输入4个字符" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>活动时间</label>
        <div class="col-md-8">
            <div class="v-datetime-input-control">
                <label for="effect_time">
                    <input type="text" class="form-control" id="effect_time" placeholder="请选择时间" value="<?php if($bargain_id): if($bargain_info['start_bargain_date'] != '1970-01-01'): ?><?php echo $bargain_info['start_bargain_date']; endif; ?> - <?php if($bargain_info['end_bargain_date'] != '1970-01-01'): ?><?php echo $bargain_info['end_bargain_date']; endif; endif; ?>" autocomplete="off" name="effect_time" required>
                    <i class="icon icon-calendar"></i>
                    <input type="hidden" id="start_bargain_time" name="start_bargain_time" value="<?php if($bargain_info['start_bargain_date'] != '1970-01-01'): ?><?php echo $bargain_info['start_bargain_date']; endif; ?>">
                    <input type="hidden" id="end_bargain_time" name="end_bargain_time" value="<?php if($bargain_info['end_bargain_date'] != '1970-01-01'): ?><?php echo $bargain_info['end_bargain_date']; endif; ?>">
                </label>
            </div>
            <div class="help-block mb-0">开始时间点为选中日期的0:00:00，结束时间点为选中日期的23:59:59</div>
        </div>

    </div>

    <div class="form-group" id="sele_goods">
        <label class="col-md-2 control-label"><span class="red_font">*</span>选择商品</label>
        <div class="col-md-5">
            <div  id="selectGoods" class="btn btn-primary-diy">点击选择</div>
            <div class="help-block mb-0">多规格商品价格必须一致</div>
        </div>
    </div>

    <div id="goods_info_box" class="form-group hidden">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <div class="media text-left">
                <div class="media-left goods-img">
                    <img  src="<?php echo $bargain_info['pic_cover']; ?>" onerror="this.src='http://iph.href.lu/60x60';" width="60" height="60">
                </div>
                <div class="media-body max-w-300">
                    <div class="line-2-ellipsis goods-text"><?php echo $bargain_info['goods_name']; ?></div>
                    <div class="line-1-ellipsis text-danger strong goods-price"><?php echo $bargain_info['start_money']; ?></div>
                </div>
            </div>
            <input type="hidden" name="goods_id" id="goods_id" value="<?php echo $bargain_info['goods_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>初始金额</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0.01" type="number" name="start_money" id="start_money" value="<?php echo $bargain_info['start_money']; ?>" required>
                <div class="input-group-addon">元</div>
            </div>
            <div class="mb-0 help-block">商品砍价初始价格，建议与商品售价一致</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>最低砍至金额</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0" type="number" name="lowest_money" id="lowest_money" value="<?php echo $bargain_info['lowest_money']; ?>" required>
                <div class="input-group-addon">元</div>
            </div>
            <div class="mb-0 help-block">最低可砍至设置的金额，若0则可砍至0元购买</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>第一刀砍价</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0" type="number" name="first_bargain_money" id="first_bargain_money" value="<?php echo $bargain_info['first_bargain_money']; ?>">
                <div class="input-group-addon">元</div>
            </div>
            <div class="help-block mb-0">设置后第一刀默认为该价格</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>单次砍价金额</label>
        <div class="col-md-5">
            <label class="radio-inline">
                <input type="radio" name="bargain_method" checked value="1" <?php if($bargain_info['bargain_method']==1): ?>checked<?php endif; ?>> 固定金额
            </label>
            <label class="radio-inline">
                <input type="radio" name="bargain_method" value="2" <?php if($bargain_info['bargain_method']==2): ?>checked<?php endif; ?>> 随机金额
            </label>
            <div class="mb-0 help-block">固定金额则每次砍固定的金额。随机在设置范围内砍价，砍价</div>
        </div>
    </div>
    <div class="form-group fix_bargain_money">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" type="number" name="fix_money" min="0" step="0.01" id="fix_money" value="<?php echo $bargain_info['fix_money']; ?>" required>
                <div class="input-group-addon">元</div>
            </div>
        </div>
    </div>

    <div class="form-group rand_bargain_money" style="display:none;">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-5">
            <div class="input-group w-400">
                <input class="form-control" type="number" placeholder="最低" min="1" step="1" name="rand_lowest_money" id="rand_lowest_money" value="<?php echo $bargain_info['rand_lowest_money']; ?>" required>
                <div class="input-group-addon"> ~ </div>
                <input class="form-control" type="number" placeholder="最高" min="1" step="1" name="rand_highest_money" id="rand_highest_money" value="<?php echo $bargain_info['rand_highest_money']; ?>" required>
                <div class="input-group-addon">元</div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"><span class="red_font">*</span>活动库存</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="1" type="number" name="bargain_num" id="bargain_num" value="<?php echo $bargain_info['bargain_stock']; ?>">
                <div class="input-group-addon">件</div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">限购</label>
        <div class="col-md-5">
            <div class="input-group w-200">
                <input class="form-control" min="0" step="1" type="number" name="limit_buy" id="limit_buy" value="<?php echo $bargain_info['limit_buy']; ?>">
                <div class="input-group-addon">件</div>
            </div>
            <div class="mb-0 help-block">用户最多参与多少次砍价购买活动</div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">自己是否参与砍价</label>
        <div class="col-md-5">
            <div class="switch-inline">
                <input type="checkbox" name="is_my_bargain" id="is_my_bargain" <?php if($bargain_info['is_my_bargain']==1): ?>checked<?php endif; ?>>
                <label for="is_my_bargain" class=""></label>
            </div>
        </div>
    </div>

    <div id="sub_val">
        <div class="form-group">
            <label class="col-md-2 control-label"></label>
            <div class="col-md-8">
                <button class="btn btn-primary-diy" type="submit" id="submit">添加</button>
                <a href="javascript:history.go(-1);" class="btn btn-default-diy">返回</a>
            </div>
        </div>
    </div>

</form>

<!-- page end -->


<script>
    require(['util'], function (util) {
        util.layDate('#effect_time',true,function(value, date, endDate){
            var date1=date.year+'-'+date.month+'-'+date.date;
            var date2=endDate.year+'-'+endDate.month+'-'+endDate.date;
            if(value){
                $('#start_bargain_time').val(date1);
                $('#end_bargain_time').val(date2);
                $('#effect_time').parents('.form-group').removeClass('has-error');
            }
            else{
                $('#start_bargain_time').val('');
                $('#end_bargain_time').val('');
            }
        });
        if("<?php echo $bargain_id; ?>" != '0'){
            $('#goods_info_box').removeClass('hidden');
            $('#goods_info_box').addClass('show');
        }
        if($('input[name=bargain_method]:checked').val() == '1'){
            $('.fix_bargain_money').show();
            $('.rand_bargain_money').hide();
            $('#rand_lowest_money').attr('required',false);
            $('#rand_highest_money').attr('required',false);
            $('#start_bargain_time').attr('required',false);
            $('#end_bargain_time').attr('required',false);
        }else{
            $('.fix_bargain_money').hide();
            $('.rand_bargain_money').show();
            $('#fix_money').attr('required',false);
            $('#start_bargain_time').attr('required',false);
            $('#end_bargain_time').attr('required',false);
        }
        //点击固定金额和随机金额切换表单
        $('input[name=bargain_method]').change(function(){
            if($(this).val() == 1){
                $('.fix_bargain_money').show();
                $('.rand_bargain_money').hide();
                $('#rand_lowest_money').attr('required',false);
                $('#rand_highest_money').attr('required',false);
            }else{
                $('.fix_bargain_money').hide();
                $('.rand_bargain_money').show();
                $('#fix_money').attr('required',false);
            }
        })


        //添加
        util.validate($('.form-validate'), function (form) {
            //判断商品是否选择了
            var goods_id = $('#goods_id').val();
            if(goods_id == ''){
                $('#sele_goods').addClass('has-error');
                var info = '<span id="group-error" class="help-block-error">请选择商品</span>';
                $('#selectGoods').after(info);
                return;
            }
            var data = {};
            var bargain_name = $('#bargain_name').val();    //标签
            var start_bargain_time = $('#start_bargain_time').val();  //开始时间
            var end_bargain_time = $('#end_bargain_time').val();  //结束时间
            var goods_id = $('#goods_id').val();  //选择商品
            var start_money = $('#start_money').val();  //开始金额
            var lowest_money = $('#lowest_money').val();  //砍至最低金额
            var first_bargain_money = $('#first_bargain_money').val();  //第一刀
            var send_goods_time = $('#send_goods_time').val();  //发货时间
            var bargain_method = $('input[name="bargain_method"]:checked').val();  //活动状态
            var fix_money = $('#fix_money').val();  //固定金额
            var rand_lowest_money = $('#rand_lowest_money').val();  //随机最低金额
            var rand_highest_money = $('#rand_highest_money').val();  //随机最高金额
            var bargain_num = $('#bargain_num').val();  //库存
            var limit_buy = $('#limit_buy').val();  //限购
            var is_my_bargain = $('input[name=is_my_bargain]').is(':checked') ? 1 : 0;//我是否可以砍价
            var bargain_id = '<?php echo $bargain_id; ?>';
            data.bargain_name = bargain_name;
            data.start_bargain_time = start_bargain_time;
            data.end_bargain_time = end_bargain_time;
            data.goods_id = goods_id;
            data.start_money = start_money;
            data.lowest_money = lowest_money;
            data.first_bargain_money = first_bargain_money;
            data.send_goods_time = send_goods_time;
            data.bargain_method = bargain_method;
            data.fix_money = fix_money;
            data.rand_lowest_money = rand_lowest_money;
            data.rand_highest_money = rand_highest_money;
            data.bargain_stock = bargain_num;
            data.limit_buy = limit_buy;
            data.is_my_bargain = is_my_bargain;
            data.bargain_id = bargain_id;

            if (util.DateTurnTime(start_bargain_time) > util.DateTurnTime(end_bargain_time)) {
                $("#effect_time").focus();
                util.message("开始活动时间大于结束时间","danger");
                return;
            }

            $.post('<?php echo $addBargain; ?>',
                data,
                function(res){
                    if (res["code"] > 0) {
                        util.message('添加/修改成功', 'success', "<?php echo __URL('admin/Menu/addonmenu?addons=bargainList'); ?>");
                        // util.message('添加成功', 'success', "");
                    } else {
                        util.message(res["message"], 'danger');
                    }
                });
        })

        //选择商品
        $('#selectGoods').click(function () {
            util.goodsDialog("url:<?php echo $bargainDialogGoodsList; ?>",function(data){
            });
        });
        // 批量设置
        $('#stock_table').on('click','.batchSet',function(){
            var batch_text = $(this).text();
            var batch_type = $(this).data('batch_type');
            var html = '<form class="form-horizontal padding-15">';
            html += '<div class="form-group"><label class="col-md-3 control-label">'+batch_text+'</label><div class="col-md-8">';
            html += '<input type="number" min="0" oninput="if(value.length>9)value=value.slice(0,9)" name="batch_'+batch_type+'" class="form-control">';
            html += '</div></div></form>';
            util.confirm('批量修改'+batch_text,html,function(){
                var val;
                var maxNum = 9999999.99;
                var currInput = $('#stock_table input[name="'+batch_type+'"]');
                val = this.$content.find('input[name="batch_'+batch_type+'"]').val();
                if(!val || val == ''){
                    util.message(batch_text+'不能为空');
                    return false;
                }else if(val > maxNum && batch_type !== 'goods_code'){
                    util.message('价格最大为 '+maxNum);
                    return false;
                }
                currInput.each(function(i,e){
                    e.value = val;
                });
            });

        });

    });
</script>
