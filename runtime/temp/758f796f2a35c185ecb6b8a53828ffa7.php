<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/www/wwwroot/www.tuandr.com/addons/microshop/template/platform/applicationAgreement.html";i:1583811704;}*/ ?>


		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINbasicMicroShopSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation" ><a href="<?php echo __URL('ADDONS_MAINsettlementMicroShopSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINapplicationMicroShopAgreement'); ?>"  class="flex-auto-center">申请协议</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane tab-pane fade in active" id="protocol">
				<form class="form-horizontal form-validate pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>说明内容</label>
						<div class="col-md-9">
							<div id="UE-protocol" data-content='<?php if($website['content']): ?><?php echo $website['content']; endif; ?>' required></div>
						</div>
					</div>
					<div class="form-group"></div>
					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<button class="btn btn-primary" type="submit">保存</button>
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
            var content = $('#UE-protocol').data('content');
            if(content==''){
                util.message('协议内容不能为空','danger');
                return false;
            }
            $.ajax({
                type:"post",
                url:"<?php echo $applicationMicroShopAgreementUrl; ?>",
                data:{
                    'content':content
                },
                success:function(data){
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINapplicationMicroShopAgreement'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
