<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/www/wwwroot/www.tuandr.com/addons/teambonus/template/platform/teamBasicSetting.html";i:1586931644;}*/ ?>


		<!-- page -->
		<ul class="nav nav-tabs v-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINteamBasicSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINteamSettlementSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINteamApplicationAgreement'); ?>&type=2"  class="flex-auto-center">申请协议</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINteamApplicationAgreement'); ?>&type=1"  class="flex-auto-center">文案样式</a></li>
			<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINteamApplicationAgreement'); ?>&type=3"  class="flex-auto-center">推送通知</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="base">
				<form class="form-horizontal form-validate pt-15 widthFixedForm">
					<div class="form-group">
						<label class="col-md-2 control-label">团队分红</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="teambonus_status" id="teambonus_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>>
								<label for="teambonus_status" class=""></label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"><span class="text-bright">*</span>成为队长条件</label>
						<div class="col-md-8">
							<div>
							<label class="radio-inline">
								<input type="radio" value="1" name="teamagentcondition" required <?php if($website['teamagent_condition'] == 1): ?>checked<?php endif; ?>> 满足所有勾选条件
							</label>
							<label class="radio-inline">
								<input type="radio" value="2" name="teamagentcondition" required <?php if($website['teamagent_condition'] == 2): ?>checked<?php endif; ?>> 满足勾选条件之一即可
							</label>
							<label class="radio-inline">
								<input type="radio"  value="-1" name="teamagentcondition" required <?php if($website['teamagent_condition'] == -1): ?>checked<?php endif; ?>> 申请成为队长
							</label>
							</div>
						</div>
					</div>
					<div class="form-group" id="iscondition">
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<div class="form-additional" style="width: auto">
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="1"> 内购订单金额满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="pay_money" value="<?php if($website['pay_money']): ?><?php echo $website['pay_money']; endif; ?>">
											<div class="input-group-addon">元</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="2"> 团队人数满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="number" value="<?php if($website['number']): ?><?php echo $website['number']; endif; ?>">
											<div class="input-group-addon">人</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="3"> 一级分销商满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="one_number" value="<?php if($website['one_number']): ?><?php echo $website['one_number']; endif; ?>">
											<div class="input-group-addon">人</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="4"> 二级分销商满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="two_number" value="<?php if($website['two_number']): ?><?php echo $website['two_number']; endif; ?>">
											<div class="input-group-addon">人</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="5"> 三级分销商满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="three_number" value="<?php if($website['three_number']): ?><?php echo $website['three_number']; endif; ?>">
											<div class="input-group-addon">人</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="6"> 一级订单金额满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="order_money" value="<?php if($website['order_money']): ?><?php echo $website['order_money']; endif; ?>">
											<div class="input-group-addon">元</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="11"> 团队订单金额满</label>
									<div class="col-md-7 control-group">
										<div class="input-group">
											<input type="number" class="form-control" min="0" name="up_team_money" value="<?php if($website['up_team_money']): ?><?php echo $website['up_team_money']; endif; ?>">
											<div class="input-group-addon">元</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label"><input type="checkbox" name="teamagentconditions" value="7"> 购买指定商品</label>
									<div class="col-md-7 control-group">
										<div class="picture-list">
											<a href="javascript:;" class="plus-box search_goods <?php if($website['pic']): ?>close-box1<?php endif; ?>">
												<?php if($website['pic']): ?>
												<i class='icon icon-danger' title='删除'></i><img src="<?php echo __IMG($website['pic']); ?>" style='width:80px;height:80px;margin:0;'>
												<?php else: ?>
												<i class="icon icon-plus"></i>
												<?php endif; ?>
											</a>
											<input type="text" class="visibility" data-visi-type="singlePicture" name="picture-Logo">
										</div>
										<input type="hidden" name='pic_id' id="pic_id" value="">
										<input type="hidden" name="selectgoods_id" id="selectgoods_id" value="<?php echo $website['goods_id']; ?>">
										<div class="input-group selectid">
											<?php if(($website['goods_id'])): ?>指定商品：<?php echo $website['goods_name']; endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">队长自动审核</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="teamagentcheck" id="teamagentcheck" <?php if($website['teamagent_check'] == 1): ?>checked<?php endif; ?>>
								<label for="teamagentcheck" class=""></label>
							</div>
							<div class="help-block mb-0">开启后无需手动审核团队队长</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">队长必须完善资料</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="teamagentdata" id="teamagentdata" <?php if($website['teamagent_data'] == 1): ?>checked<?php endif; ?>>
								<label for="teamagentdata" class=""></label>
							</div>
							<div class="mb-0 help-block">开启后未完善资料的队长需要完善资料才能进行操作，若还不是队长则需要提交资料申请审核。</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">内购分红</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="purchasetype" id="purchasetype" <?php if($website['purchase_type'] == 1): ?>checked<?php endif; ?>>
								<label for="purchasetype" class=""></label>
							</div>
							<div class="help-block mb-0">开启分红内购，代理商自己购买商品，可获得团队分红</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">是否开启级差</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="gradationstatus" id="gradationstatus" <?php if($website['gradation_status'] == 1): ?>checked<?php endif; ?>>
								<label for="gradationstatus" class=""></label>
							</div>
							<div class="help-block mb-0">开启级差后每个队长所拿的分红比例为自己等级减去下级的比例</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">是否开启跳级降级</label>
						<div class="col-md-5">
							<div class="switch-inline">
								<input type="checkbox" name="teamagentgrade" id="teamagentgrade" <?php if($website['teamagent_grade'] == 1): ?>checked<?php endif; ?>>
								<label for="teamagentgrade" class=""></label>
							</div>
							<div class="help-block mb-0">开启后，团队队长按照权重顺序跳级或跳降级，只要升级或降级条件满足则会一直执行</div>
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
        loading();
        function loading(){
            var teamagent_conditions = "<?php echo $website['teamagent_conditions']; ?>";
            teamagent_conditions = teamagent_conditions.split(',');
            for(var i = 0; i < teamagent_conditions.length;i++){
                $('[name="teamagentconditions"][value="'+teamagent_conditions[i]+'"]').prop("checked", true);
            }
            var teamagent_condition = "<?php echo $website['teamagent_condition']; ?>";
            if(teamagent_condition==-1){
                $("#iscondition").hide();
			}else{
                $("#iscondition").show();
			}
        }
        $('body').on('click','.search_goods', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectGoodsList'); ?>";
            util.confirm('选择商品','url:'+url, function () {
                var data = this.$content.find('.goods_val').val();
                var pic = $('#pic_id').val();
                $(".selectid").html('指定商品：'+data);
                html='';
                html += "<i class='icon icon-danger' title='删除'></i><img src="+__IMG(pic)+" style='width:80px;height:80px;margin:0;'>";
                $(".search_goods").find('.visibility').removeAttr("required");
                $(".search_goods").addClass('close-box1').removeClass('plus-box').removeClass('search_goods');
                $(".close-box1").html(html);
                $(".close-box1").siblings('.visibility').removeAttr("required");
            },'large')

        })
        $("input[name='teamagentconditions']").click(function () {
            if($(this).is(':checked')){
                var vals=$(this).val();
                if(vals!=7 || $("input[name='selectgoods_id']").val()==''){
                    $(this).parent(".control-label").siblings(".control-group").find("input").attr("required",true);
                }
            } else{
                $(this).parents(".form-group").removeClass('has-error');
                $(this).parents(".form-group").find('.help-block-error').html('');
                $(this).parent(".control-label").siblings(".control-group").find("input").removeAttr("required",true);
            }
        })
        $("input[name='teamagentcondition']").click(function () {
            if($(this).is(':checked') && $("input[name='teamagentcondition']:checked").val()==-1){
                $("#iscondition").hide();
            } else{
                $("#iscondition").show();
            }
        })
        function isInArray(arr,value){
            for(var i = 0; i < arr.length; i++){
                if(value === arr[i]){
                    return true;
                }
            }
            return false;
        }
        util.validate($('.form-validate'),function(form){
            var teambonus_status = $("input[name='teambonus_status']").is(':checked')? 1: 0;
            var teamagentcondition = $("input[name='teamagentcondition']:checked").val();
            var teamagentconditions = $("input:checkbox[name='teamagentconditions']:checked").map(function(index,elem) {
                return $(elem).val();
            }).get().join(',');
            var arr=teamagentconditions.split(',');
            if(isInArray(arr,"7")){
                var goods_id = $("input[name='selectgoods_id']").val();
            }else{
                var goods_id ='';
            }
            var pay_money = $("input[name='pay_money']").val();
            var number = $("input[name='number']").val();
            var one_number = $("input[name='one_number']").val();
            var two_number = $("input[name='two_number']").val();
            var three_number = $("input[name='three_number']").val();
            var order_money = $("input[name='order_money']").val();
			var up_team_money = $("input[name='up_team_money']").val();//团队订单金额
            var teamagentcheck = $("input[name='teamagentcheck']").is(':checked') ? 1 : 2;
            var teamagentgrade = $("input[name='teamagentgrade']").is(':checked') ? 1 : 2;
            var purchasetype = $("input[name='purchasetype']").is(':checked') ? 1 : 2;
            var gradationstatus = $("input[name='gradationstatus']").is(':checked') ? 1 : 2;
            var teamagentdata = $("input[name='teamagentdata']").is(':checked') ? 1 : 2;
            if(teamagentcondition>0 && teamagentconditions==''){
                util.message('请填写成为队长条件','danger');
                return false;
            }
            $.ajax({
                type:"post",
                url:"<?php echo $teamBasicSettingUrl; ?>",
                data:{
                    'teambonus_status':teambonus_status,
                    'number':number,
                    'one_number':one_number,
                    'two_number':two_number,
                    'three_number':three_number,
                    'teamagent_condition': teamagentcondition,
                    'teamagent_conditions':teamagentconditions,
                    'pay_money':pay_money,
                    'order_money':order_money,
					'up_team_money':up_team_money,
                    'teamagent_check':teamagentcheck ,
                    'teamagent_grade':teamagentgrade,
                    'goods_id':goods_id,
                    'purchase_type':purchasetype,
                    'gradation_status':gradationstatus,
                    'teamagent_data':teamagentdata
                },
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINteamBasicSetting'); ?>");
                    }else if(data['code']==-3) {
                        util.message('该应用有未完成分红数据，暂时无法关闭，必须等分红结算完成才可以进行关闭操作！', 'danger', "<?php echo __URL('ADDONS_MAINteamBasicSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
