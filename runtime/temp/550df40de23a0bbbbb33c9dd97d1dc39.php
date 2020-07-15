<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/www/wwwroot/www.tuandr.com/addons/areabonus/template/platform/areaBasicSetting.html";i:1583811698;}*/ ?>

		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINareaBasicSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINareaSettlementSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINareaApplicationAgreement'); ?>&type=2"  class="flex-auto-center">申请协议</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINareaApplicationAgreement'); ?>&type=1"  class="flex-auto-center">文案样式</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINareaApplicationAgreement'); ?>&type=3"  class="flex-auto-center">推送通知</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="base">
				<form class="form-horizontal form-validate pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label">区域分红</label>
						<div class="col-md-5">
							<!--<label class="radio-inline">
								<input type="radio" value="1" name="areabonus_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>> 开启
							</label>
							<label class="radio-inline">
								<input type="radio" value="0" name="areabonus_status" <?php if($website['is_use'] != 1): ?>checked<?php endif; ?>> 关闭
							</label>-->
							<div class="switch-inline">
								<input type="checkbox" name="areabonus_status" id="areabonus_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>>
								<label for="areabonus_status" class=""></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">成为区域代理条件</label>
						<div class="col-md-8">
							<label class="radio-inline">
								<input type="radio" name="areaagent_status" value="2"  <?php if($website['areaagent_status'] == 2): ?>checked<?php endif; ?>> 后台指定
							</label>
							<label class="radio-inline">
								<input type="radio" name="areaagent_status" value="1"  <?php if($website['areaagent_status'] != 2): ?>checked<?php endif; ?>> 提交资料申请
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">区域代理自动审核</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="areaagentcheck" id="areaagentcheck" <?php if($website['areaagent_check'] == 1): ?>checked<?php endif; ?>>
								<label for="areaagentcheck" class=""></label>
							</div>
							<div class="help-block mb-0">开启后无需手动审核区域代理</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">内购分红</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="purchasetype" id="purchasetype" <?php if($website['purchase_type'] == 1): ?>checked<?php endif; ?>>
								<label for="purchasetype" class=""></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">是否开启跳级降级</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="areaagentgrade" id="areaagentgrade" <?php if($website['areaagent_grade'] == 1): ?>checked<?php endif; ?>>
								<label for="areaagentgrade" class=""></label>
							</div>
							<div class="help-block mb-0">开启后，分销商按照权重顺序跳级或跳降级，只要升级或降级条件满足则会一直执行</div>
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
        util.validate($('.form-validate'),function(form){
            var areabonus_status = $("input[name='areabonus_status']").is(':checked')? 1 :2;
            var areaagent_status = $("input[name='areaagent_status']:checked").val();
            var areaagentcheck = $("input[name='areaagentcheck']").is(':checked')? 1 :2;
            var purchasetype = $("input[name='purchasetype']").is(':checked')? 1 :2;
            var areaagentgrade = $("input[name='areaagentgrade']").is(':checked')? 1 :2;
            $.ajax({
                type:"post",
                url:"<?php echo $areaBasicSettingUrl; ?>",
                data:{
                    'areabonus_status':areabonus_status,
                    'purchase_type':purchasetype,
                    'areaagent_status':areaagent_status,
                    'areaagent_check':areaagentcheck ,
                    'areaagent_grade':areaagentgrade
                },
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINareaBasicSetting'); ?>");
                    }else if(data['code']==-3) {
                        util.message('该应用有未完成分红数据，暂时无法关闭，必须等分红结算完成才可以进行关闭操作！', 'danger', "<?php echo __URL('ADDONS_MAINareaBasicSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
