<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/settlementSetting.html";i:1583811698;}*/ ?>


		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINbasicSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINsettlementSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=2"  class="flex-auto-center">申请协议</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=1"  class="flex-auto-center">文案样式</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationAgreement'); ?>&type=3"  class="flex-auto-center">推送通知</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="settlement">
				<form class="form-horizontal form-validate pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>提现方式</label>
						<div class="col-md-5" id="type">

							<div class="help-block mb-0">银行卡（自动提现）提现金额可自动转账至银行账户（需配置通联支付），银行卡（手动提现）提现金额需要手动转账无需配置任何东西</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>佣金计算节点</label>
						<div class="col-md-5">
							<select class="form-control w-200" name="commission_calculation" id="commission_calculation" required>
								<option value="">请选择</option>
                                <option value="1" <?php if($website['commission_calculation'] == 1): ?> selected="selected"<?php endif; ?>>实付款金额</option>
                                <option value="2" <?php if($website['commission_calculation'] == 2): ?> selected="selected"<?php endif; ?>>商品原价</option>
                                <option value="3" <?php if($website['commission_calculation'] == 3): ?> selected="selected"<?php endif; ?>>商品售价</option>
                                <option value="4" <?php if($website['commission_calculation'] == 4): ?> selected="selected"<?php endif; ?>>商品成本价</option>
                                <option value="5" <?php if($website['commission_calculation'] == 5): ?> selected="selected"<?php endif; ?>>商品利润价</option>
							</select>
                            <div class="help-block mb-0">个人佣金 = 佣金计算节点 * 分销商等级比例</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>佣金到账节点</label>
						<div class="col-md-5">
							<select class="form-control w-200" name="commission_arrival" id="commission_arrival" required>
								<!--<option value="">请选择</option>-->
                                <!--<option value="1" <?php if($website['commission_arrival'] == 1): ?> selected="selected"<?php endif; ?>>订单付款</option>-->
                                <option value="2"  selected="selected">订单已完成</option>
							</select>
                            <div class="help-block mb-0">达到上述节点，订单的分销佣金才能解冻生效，分销商才可以提现</div>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">佣金提现免审核</label>
                        <div class="col-md-5">
                            <div class="switch-inline">
                                <input type="checkbox" name="withdrawals_check" id="withdrawals_check" <?php if($website['withdrawals_check'] == 1): ?>checked<?php endif; ?>>
                                <label for="withdrawals_check" class=""></label>
                            </div>
                            <div class="help-block mb-0">开启后佣金提现佣金自动审核通过，无需手动操作</div>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金提现打款方式</label>
						<div class="col-md-5">
							<label class="radio-inline">
								<input type="radio" name="make_money" value="1" <?php if($website['make_money'] == 1): ?>checked<?php endif; ?>> 自动
							</label>
							<label class="radio-inline">
								<input type="radio" name="make_money" value="2" <?php if($website['make_money'] != 1): ?>checked<?php endif; ?>> 手动
							</label>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">佣金个人所得税</label>
                        <div class="col-md-5">
                            <div class="input-group w-200">
                                <input type="number" class="form-control" min="0" name="poundage" value="<?php if($website['poundage']): ?><?php echo $website['poundage']; endif; ?>">
                                <div class="input-group-addon">%</div>
                            </div>
                            <div class="help-block mb-0">佣金提现时，按照比例扣税个人所得税，0或空则不扣除</div>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金免打税区间</label>
						<div class="col-md-5">
							<div class="input-group w-300">
								<input type="number" name="withdrawalsbegin" class="form-control number-form-control" step="0.1" min="0" value="<?php echo $website['withdrawals_begin']; ?>">
								<div class="input-group-addon"> ~ </div>
								<input type="number" name="withdrawalsend" class="form-control number-form-control" step="0.1" min="0" value="<?php echo $website['withdrawals_end']; ?>">
								<div class="input-group-addon">元</div>
							</div>
                            <div class="help-block mb-0">当提现金额在免打税区间时，则该笔提现不扣除个人所得税，开始金额必须小于结束金额</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金最低提现额度</label>
						<div class="col-md-5">
							<div class="input-group w-200">
								<input type="number" class="form-control" id="withdrawals_min" min="0" value="<?php if($website['withdrawals_min']): ?><?php echo $website['withdrawals_min']; endif; ?>" >
								<div class="input-group-addon">元</div>
							</div>
                            <div class="help-block mb-0">佣金必须大于或等于设置的额度才能提现</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">佣金免审核提现额度</label>
						<div class="col-md-5">
							<div class="input-group w-200">
								<input type="number" class="form-control" id="withdrawals_cash" min="0" value="<?php if($website['withdrawals_cash']): ?><?php echo $website['withdrawals_cash']; endif; ?>">
								<div class="input-group-addon">元</div>
							</div>
                            <div class="help-block mb-0">提现金额少于或等于免审核额度则该笔提现无需审核</div>
						</div>
					</div>

					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary add" type="submit">保存</button>
							<a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
						</div>
					</div>
				</form>


			</div>
		</div>

		<!-- page end -->


<script>
    require(['util'],function(util){
        $('body').on('click','.withdrawals',function(){
            var message = $("input:checkbox[name='withdrawalstype']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            var type = $(this).val();
            var obj = $(this);
            if(message){
                var with_type = message.split(',');
                var index = with_type.indexOf(type);
                if (index > -1) {
                    with_type.splice(index, 1);
                }
                if(type==1){
                    if(with_type.indexOf("5")>0){
                        obj.removeAttr('checked');
                        util.message('银行卡提现只能选择一种模式','danger');
                    }
                }
                if(type==5){
                    if(with_type.indexOf("1")>0){
                        obj.removeAttr('checked');
                        util.message('银行卡提现只能选择一种模式','danger');
                    }
                }
            }
            $.ajax({
                'url':"<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                'type':'post',
                'data':{
                    'config_type':'payment'
                },
                success:function(data){
                    if(data['tl_set']['tl_tw']==0 && type==1){
                        obj.removeAttr('checked');
                        util.alert2('商城还没有配置银行卡，请先配置。', function () {
                            window.open("<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>&type=payment");
                            util.alert('是否已设置完成？', function(){
                                $.ajax({
                                    'url':"<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                                    'type':'post',
                                    'data':{
                                        'config_type':'payment'
                                    },
                                    success:function(data){
                                        if(data.data['tl_set']['value']['tl_tw'] == 1){
                                            obj.attr('checked',true);
                                        }else{
                                            util.message('商城未开启配置银行卡','danger');
										}
                                    }
                                })
                            })
                        })
                    }
                    if(type==2){
                        if(data['wx_set']['is_use'] == 0 || data['wx_set']['wx_tw']==0){
                            obj.removeAttr('checked');
                            util.alert2('商城还没有配置微信，请先配置。', function () {
                                window.open("<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>&type=payment");
                                util.alert('是否已设置完成？', function(){
                                    $.ajax({
                                        'url':"<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                                        'type':'post',
                                        'data':{
                                            'config_type':'payment'
                                        },
                                        success:function(data){
                                            if(data['wx_set']['is_use'] == 1  && data['wx_set']['value']['wx_tw'] == 1){
                                                obj.attr('checked',true);
                                            }else{
                                                util.message('商城未开启配置微信','danger');
                                            }
                                        }
                                    })
                                })
                            })
                        }
                    }
                    if(type==3){
                        if(data['ali_set']['is_use'] == 0){
                            obj.removeAttr('checked');
                            util.alert2('商城还没有配置支付宝，请先配置。', function () {
                                window.open("<?php echo __URL('PLATFORM_MAIN/config/sysconfig'); ?>&type=payment");
                                util.alert('是否已设置完成？', function(){
                                    $.ajax({
                                        'url':"<?php echo __URL('PLATFORM_MAIN/config/sysConfig'); ?>",
                                        'type':'post',
                                        'data':{
                                            'config_type':'payment'
                                        },
                                        success:function(data){
                                            if(data['wx_set']['is_use'] == 1  && data['wx_set']['wx_tw'] == 1){
                                                obj.attr('checked',true);
                                            }else{
                                                util.message('商城未开启配置支付宝','danger');
                                            }
                                        }
                                    })
                                })
                            })
                        }
                    }
                }
            })
        })
        loading();
        function loading(){
            html = "";
            html += '<label class="checkbox-inline"><input type="checkbox" name="withdrawalstype" class="withdrawals" value="4">商城余额</label>';
            html += '<label class="checkbox-inline"><input type="checkbox" name="withdrawalstype" class="withdrawals" value= 2>微信</label>';
            html += '<label class="checkbox-inline"><input type="checkbox" name="withdrawalstype" class="withdrawals" value= 3>支付宝</label>';
            html += '<label class="checkbox-inline"><input type="checkbox" name="withdrawalstype" class="withdrawals" value= 1>银行卡(自动提现)</label>';
            html += '<label class="checkbox-inline"><input type="checkbox" name="withdrawalstype" class="withdrawals" value= 5>银行卡(手动提现)</label>';
            $("#type").html(html);
            var withdraw_type = "<?php echo $website['withdrawals_type']; ?>";
            withdraw_type = withdraw_type.split(',');
            for(var i = 0; i < withdraw_type.length;i++){
                $('[name="withdrawalstype"][value="'+withdraw_type[i]+'"]').prop("checked", true);
            }
        }
        util.validate($('.form-validate'),function(form){
            var withdrawals_type = $("input:checkbox[name='withdrawalstype']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            if(withdrawals_type==''){
                util.message('请选择提现方式');
                return false;
			}
            var commission_calculation = $("#commission_calculation").val();
            var commission_arrival = $("#commission_arrival").val();
            var withdrawals_check = $("input[name='withdrawals_check']").is(':checked')? 1 : 2;
            var make_money = $("input[name='make_money']:checked").val();
            var poundage = $("input[name='poundage']").val();
            var withdrawals_min = $("#withdrawals_min").val();
            var withdrawals_cash = $("#withdrawals_cash").val();
            var withdrawals_begin = $("input[name='withdrawalsbegin']").val();
            var withdrawals_end = $("input[name='withdrawalsend']").val();
            $.ajax({
                type : "post",
                url : "<?php echo $settlementSettingUrl; ?>",
                data : {
                    'withdrawals_type' : withdrawals_type,
                    'commission_calculation' : commission_calculation ,
                    'commission_arrival' : commission_arrival,
                    'withdrawals_check' : withdrawals_check,
                    'make_money' : make_money,
                    'withdrawals_min' : withdrawals_min,
                    'withdrawals_cash' : withdrawals_cash,
                    'withdrawals_begin' : withdrawals_begin,
                    'withdrawals_end' : withdrawals_end,
                    'poundage' : poundage
                },
                success : function(data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINsettlementSetting'); ?>");
                    } else {
                        util.message(data["message"], 'danger', "<?php echo __URL('ADDONS_MAINsettlementSetting'); ?>");
                    }
                }
            });
        })
    })
</script>