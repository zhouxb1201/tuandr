<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.tuandr.com/addons/channel/template/platform/channelAgreement.html";i:1583811706;}*/ ?>


		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation" ><a href="<?php echo __URL('ADDONS_MAINchannelSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation" ><a href="<?php echo __URL('ADDONS_MAINchannelSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINchannelAgreement'); ?>"  class="flex-auto-center">申请协议</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane tab-pane fade in active" id="protocol">
				<form class="form-horizontal form-validate pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>注册成为渠道商海报图片</label>
						<div class="col-md-5">
							<div class="picture-list" id="Logo">
								<?php if($website['logo']): ?>
								<a href="javascript:;" class="close-box"><i class="icon icon-danger" title="删除"></i><img src="<?php if($website['logo']): ?><?php echo $website['logo']; endif; ?>"></a>
								<?php else: ?>
								<a href="javascript:;" class="plus-box" data-toggle="singlePicture"><i class="icon icon-plus"></i></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>协议内容</label>
						<div class="col-md-9">
							<div id="UE-protocol" data-content='<?php if($website['content']): ?><?php echo $website['content']; endif; ?>'></div>
						</div>
					</div>

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
            var Logo = $("#Logo").find('img').attr('src');
            var content = $('#UE-protocol').data('content');
            if(Logo=== undefined){
                util.message('海报图片不能为空','danger');
                return false;
            }
            if(content==''){
                util.message('协议内容不能为空','danger');
                return false;
            }
            $.ajax({
                type:"post",
                url:"<?php echo $channelAgreement; ?>",
                data:{
                    'image':Logo,
                    'content':content
                },
                success:function(data){
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINchannelAgreement'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
