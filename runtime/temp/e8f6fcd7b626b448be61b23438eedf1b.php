<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/channel/template/platform/channelSetting.html";i:1583811706;}*/ ?>

<!-- page -->
<ul class="nav nav-tabs v-nav-tabs add_tab1" role="tablist">
    <li role="presentation" class="active"><a href="#channel_setting" aria-controls="channel_setting" role="tab" data-toggle="tab" class="flex-auto-center">基础设置</a></li>
    <li role="presentation"><a href="#settlt_setting" aria-controls="settlt_setting" role="tab" data-toggle="tab"  class="flex-auto-center">结算设置</a></li>
    <li role="presentation"><a href="<?php echo __URL('ADDONS_MAINchannelAgreement'); ?>"  class="flex-auto-center">申请协议</a></li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="base">
        <form class="form-horizontal form-validate pt-15 widthFixedForm">
            <div id="myTabContent" class="tab-content">
            <div id="channel_setting" role="tabpanel" class="tab-pane fade in active tab-1">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>渠道商</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name='channel_status' value="1" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name='channel_status' value="0" <?php if($website['is_use'] == 0): ?>checked<?php endif; ?>> 关闭
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="channel_status" id="channel_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>>
                        <label for="channel_status" class=""></label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>成为渠道商条件</label>
                <div class="col-md-8">
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="channelCondition" value="none" required <?php if($website['channel_condition'] == 'none'): ?>checked<?php endif; ?>> 提交资料申请
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="channelCondition" value="all" required <?php if($website['channel_condition'] == 'all'): ?>checked<?php endif; ?>> 满足所有勾选条件
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="channelCondition" value="single" required <?php if($website['channel_condition'] == 'single'): ?>checked<?php endif; ?>> 满足勾选条件之一即可
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="iscondition">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <div class="form-additional" style="width: auto;">
                        <div class="form-group">
                            <label class="col-md-4 control-label"><input type="checkbox" name="channelConditions" value="channel_team"> 团队人数达</label>
                            <div class="col-md-7 control-group">
                                <div class="input-group">
                                    <input type="number" class="form-control" min="0" name="channel_team" value="<?php if($website['condition']['channel_team']): ?><?php echo $website['condition']['channel_team']; endif; ?>">
                                    <div class="input-group-addon">人</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><input type="checkbox" name="channelConditions" value="pay_money"> 消费</label>
                            <div class="col-md-7 control-group">
                                <div class="input-group">
                                    <input type="number" class="form-control" min="0" name="pay_money" value="<?php if($website['condition']['pay_money']): ?><?php echo $website['condition']['pay_money']; endif; ?>">
                                    <div class="input-group-addon">元</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><input type="checkbox" name="channelConditions" value="pay_number"> 消费</label>
                            <div class="col-md-7 control-group">
                                <div class="input-group">
                                    <input type="number" class="form-control" min="0" name="pay_number" value="<?php if($website['condition']['pay_number']): ?><?php echo $website['condition']['pay_number']; endif; ?>">
                                    <div class="input-group-addon">次</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><input type="checkbox" name="channelConditions" value="goods_id"> 购买指定商品</label>
                            <div class="col-md-7 control-group">
                                <div class="picture-list">
                                    <a href="javascript:;" class="<?php if($website['condition']['pic']): ?>close-box1 has-pic<?php else: ?>plus-box search_goods<?php endif; ?>">
                                        <?php if($website['condition']['pic']): ?>
                                        <i class='icon icon-danger' title='删除'></i><img src="<?php echo __IMG($website['condition']['pic']); ?>" style='width:80px;height:80px;'>
                                        <?php else: ?>
                                        <i class="icon icon-plus"></i>
                                        <?php endif; ?>
                                    </a>
                                    <input type="text" class="visibility" data-visi-type="singlePicture" name="picture-Logo">
                                </div>
                                <input type="hidden" name='pic_id' id="pic_id" value="">
                                <input type="hidden" name="selectgoods_id" id="selectgoods_id" value="<?php echo $website['condition']['goods_id']; ?>">
                                <div class="input-group selectid">
                                    <?php if(($website['condition']['goods_id'])): ?>指定商品：<?php echo $website['condition']['goods_name']; endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">是否开启平级奖</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_peers" id="is_peers" <?php if($website['peers_status'] == 1): ?>checked<?php endif; ?>>
                        <label for="is_peers" class=""></label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="channel_peers_div">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>平级奖模式</label>
                <div class="col-md-5">
                    <select class="form-control" name="channel_peers" id="channelPeers">
                        <option value="">请选择</option>
                        <option value="1" <?php if($website['channel_peers'] == 1): ?> selected="selected"<?php endif; ?>>平一级</option>
                        <option value="2" <?php if($website['channel_peers'] == 2): ?> selected="selected"<?php endif; ?>>平二级</option>
                        <option value="3" <?php if($website['channel_peers'] == 3): ?> selected="selected"<?php endif; ?>>平三级</option>
                    </select>
                    <div class="help-block mb-0">当下级与你平级采购时，可获得相应的奖金</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">是否开启跨级奖</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_cross" id="is_cross" <?php if($website['cross_status'] == 1): ?>checked<?php endif; ?>>
                        <label for="is_cross" class=""></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">渠道商自动审核</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" value="1" name="channel_check" <?php if($website['channel_check'] == 1): ?>checked<?php endif; ?>> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="0" name="channel_check" <?php if($website['channel_check'] != 1): ?>checked<?php endif; ?>> 关闭
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="channel_check" id="channel_check" <?php if($website['channel_check'] == 1): ?>checked<?php endif; ?>>
                        <label for="channel_check" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启后无需手动审核渠道商</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">是否开启跳级降级</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" value="1" name="channel_grade" <?php if($website['channel_grade'] == 1): ?>checked<?php endif; ?>> 开启
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="0" name="channel_grade" <?php if($website['channel_grade'] != 1): ?>checked<?php endif; ?>> 关闭
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="channel_grade" id="channel_grade" <?php if($website['channel_grade'] == 1): ?>checked<?php endif; ?>>
                        <label for="channel_grade" class=""></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>渠道订单自动关闭时间</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input type="number" class="form-control" required min="0" name="channel_order_close_time" value="<?php if($website['channel_order_close_time']): ?><?php echo $website['channel_order_close_time']; endif; ?>">
                        <div class="input-group-addon">分钟</div>
                    </div>
                    <div class="help-block mb-0">订到超过设定时间自动关闭，单位为分钟 </div>
                </div>
                
                </div>
            </div>
            <div id="settlt_setting" role="tabpanel" class="tab-pane fade in tab-2">
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>采购支付方式</label>
                    <div class="col-md-5">
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="pay_type" value="0" required <?php if($website['pay_type'] == 0): ?>checked<?php endif; ?>> 商城支付方式
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pay_type" value="1" required <?php if($website['pay_type'] == 1): ?>checked<?php endif; ?>> 货款支付
                        </label>
                        <p class="help-block">商城支付方式为商城开启配置好的支付方式；货款支付则只能仅用于渠道商，需要先把钱充到货款处再采购，货款不能提现。</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-2 control-label"><span class="text-bright">*</span>零售结算节点</label>
                    <div class="col-md-5">
                        <select id="settle_type" name="settle_type" class="form-control">
                            <option value="1" <?php if($website['settle_type'] == 1): ?> selected="selected"<?php endif; ?>>商品售价</option>
                            <option value="2" <?php if($website['settle_type'] == 2): ?> selected="selected"<?php endif; ?>>商品原价</option>
                            <option value="3" <?php if($website['settle_type'] == 3): ?> selected="selected"<?php endif; ?>>商品实付价（不含运费）</option>
                        </select>
                        <div class="mb-0 help-block">渠道商零售商品时，平台按照什么价格给渠道商结算。</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary add" type="submit">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>

<!-- page end -->


<script>
    require(['util'],function(util){
        loading();
        function loading(){
            if($("input[name='channelCondition']:checked").val() == 'none'){
                $('#iscondition').hide();
            }
            var channel_conditions = "<?php echo $website['channel_conditions']; ?>";
            channelConditions = channel_conditions.split(',');
            for(var i = 0; i < channelConditions.length;i++){
                $('[name="channelConditions"][value="'+channelConditions[i]+'"]').prop("checked", true);
            }
        }
        //处理第一个提交资料申请，选这个则不需要填写资料
        $("input[name='channelCondition']").click(function(){
            var condition_val = $(this).val();
            if(condition_val == 'none'){
                $('#iscondition').hide();
            }else{
                $('#iscondition').show();
            }
        })
        //处理具体的渠道商条件，选了哪个渠道商，则下面input必填
        $("input[name='channelConditions']").click(function () {
            if($(this).is(':checked')){
                $(this).parent(".control-label").siblings(".control-group").find("input").attr("required",true);
            } else{
                $(this).parents(".form-group").removeClass('has-error');
                $(this).parents(".form-group").find('.help-block-error').html('');
                $(this).parent(".control-label").siblings(".control-group").find("input").removeAttr("required",true);
                if($(this).val() == 'goods_id'){
                    $('.search_goods img').remove();
                    $('#selectgoods_id').val('');
                    $('.selectid').html('');
                }
            }
        })

        //设置具体的值，自动勾选前面的条件选项
        $("input[name='channelConditions']").parent(".control-label").siblings(".control-group").find("input").click(function(){
            $(this).parent().parent().siblings().find('input').attr('checked',true);
        })

        $('body').on('click','.search_goods', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectGoodsList'); ?>";
            var obj = $(this);
            util.confirm('选择商品','url:'+url, function () {
                var data = this.$content.find('.goods_val').val();
                var pic = $('#pic_id').val();
                $(".selectid").html('指定商品：'+data);
                html='';
                html += "<i class='icon icon-danger' title='删除'></i><img src="+__IMG(pic)+" style='width:80px;height:80px;margin:0;'>";
                // $(".search_goods").html(html);
                // if(pic != ''){
                //     obj.parent().parent().parent().find('input[type=checkbox]').attr('checked',true);
                // }
                $(".search_goods").find('.visibility').removeAttr("required");
                $(".search_goods").addClass('close-box1').addClass('has-pic').removeClass('plus-box').removeClass('search_goods');
                $(".close-box1").html(html);
                $(".close-box1").siblings('.visibility').removeAttr("required");
            },'large')

        })
        //当关闭平级奖，下拉框隐藏
        $('#is_peers').click(function(){
            isPeers();
        })
        function isPeers(){
            if(!$('#is_peers').is(':checked')){
                $('#channelPeers').attr('required', false);
                $('#channel_peers_div').removeClass('show');
                $('#channel_peers_div').addClass('hide');
            }else{
                $('#channelPeers').attr('required', true);
                $('#channel_peers_div').removeClass('hide');
                $('#channel_peers_div').addClass('show');
            }
        }
        isPeers();
        util.validate($('.form-validate'),function(form){
            var data = {};
            var channel_status = $("input[name='channel_status']").is(':checked')?1:0;
            data.channel_status = channel_status;
            var channelCondition = $("input[name='channelCondition']:checked").val();
            var channelConditions = $("input:checkbox[name='channelConditions']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            // console.dir(channelConditions);return;
            if($("input[name='channelCondition']:checked").val() != 'none'){
                if(channelConditions==''){
                    util.message('请填写成为渠道商条件','danger');
                    return false;
                }
            }
            $('input[name=channelConditions]:checked').each(function(){
                console.log($(this).val());
                switch($(this).val()){
                    case 'channel_team':
                        //团队人数
                        var channel_team = $("input[name='channel_team']").val();
                        data.channel_team = channel_team;
                        break;
                    case 'pay_money':
                        //消费
                        var pay_money = $("input[name='pay_money']").val();
                        data.pay_money = pay_money;
                        break;
                    case 'pay_number':
                        //消费次数
                        var pay_number = $("input[name='pay_number']").val();
                        data.pay_number = pay_number;
                        break;
                    case 'goods_id':
                        //购买指定商品
                        var goods_id = $("input[name='selectgoods_id']").val();
                        data.goods_id = goods_id;
                        break;
                }
            })
            //是否开启平级奖
            var peers_status = $('#is_peers').is(':checked') ? 1 :0;
            data.peers_status = peers_status;
            //平级奖模式
            var channel_peers = $("select[name='channel_peers']").val();
            data.channel_peers = channel_peers;
            //是否开启跨级将模式
            var cross_status = $('#is_cross').is(':checked') ? 1 :0;
            data.cross_status = cross_status;
            //渠道商自动审核
            var channel_check = $("input[name='channel_check']").is(':checked')?1:0;
            data.channel_check = channel_check;
            //是否开启跳级降级
            var channel_grade = $("input[name='channel_grade']").is(':checked')?1:0;
            data.channel_grade = channel_grade;
            //渠道订单自动关闭时间
            var channel_order_close_time = $("input[name='channel_order_close_time']").val();
            data.channel_order_close_time = channel_order_close_time;
            //点击了哪个条件
            data.channel_condition = channelCondition;
            //具体要满足的条件
            data.channel_conditions = channelConditions;
            //采购支付方式
            var pay_type = $("input[name='pay_type']:checked").val();
            data.pay_type = pay_type;
            //零售结算节点
            var settle_type = $("#settle_type").val();
            data.settle_type = settle_type;
            $.ajax({
                type:"post",
                url:"<?php echo $addChannelSetting; ?>",
                data:data,
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINchannelSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
