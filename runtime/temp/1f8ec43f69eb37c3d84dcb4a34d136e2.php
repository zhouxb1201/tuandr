<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/www.tuandr.com/addons/microshop/template/platform/basicSetting.html";i:1583811704;}*/ ?>

			<!-- page -->
			<ul class="nav nav-tabs v-nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="<?php echo __URL('ADDONS_MAINbasicMicroShopSetting'); ?>"  class="flex-auto-center">基础设置</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINsettlementMicroShopSetting'); ?>"  class="flex-auto-center">结算设置</a></li>
				<li role="presentation"><a href="<?php echo __URL('ADDONS_MAINapplicationMicroShopAgreement'); ?>"  class="flex-auto-center">申请协议</a></li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="base">
					<form class="form-horizontal form-validate  pt-15 widthFixedForm">
						<div class="form-group">
							<label class="col-md-2 control-label">微店</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="microshop_status" id="microshop_status" <?php if($website['is_use'] == 1): ?>checked<?php endif; ?>>
									<label for="microshop_status" class=""></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>收益模式</label>
							<div class="col-md-5">
								<select class="form-control" id="microshop_pattern" name="microshop_pattern" required >
									<option value="">请选择</option>
									<option value="1"  <?php if($website['microshop_pattern'] == 1): ?> selected="selected"<?php endif; ?>>一级收益</option>
									<option value="2"  <?php if($website['microshop_pattern'] == 2): ?> selected="selected"<?php endif; ?>>二级收益</option>
									<option value="3"  <?php if($website['microshop_pattern'] == 3): ?> selected="selected"<?php endif; ?>>三级收益</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><span class="text-bright">*</span>成为店主条件</label>
							<div class="col-md-5">
								<label class="radio-inline">
									<input type="radio" name="microshopconditions" checked> 购买其中一款商品
								</label>
								<a class="btn btn-primary search_goods"> 挑选商品</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<div class="border-default padding-15">
									<div class="mb-20">
										<div class="picture-list1">
											<?php if($website['goods_id']): foreach($website['goods_info'] as $v): ?>
											<a href="javascript:;" class="fl picture-list1-pic" data-id="<?php echo $v['goods_id']; ?>">
												<i class="icon icon-danger" style="right:10px;" title="删除"></i>
												<div><img src="<?php echo __IMG($v['pic']); ?>" style="width: 80px;height: 80px"></div>
												<div class="line-1-ellipsis"><?php echo $v['goods_name']; ?></div>
											</a>
											<?php endforeach; else: ?>
											<div class="empty-box" style="border:none">暂无商品</div>
											<?php endif; ?>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">自动成为分销商</label>
							<div class="col-md-5">
								<div class="switch-inline">
									<input type="checkbox" name="microshopcheck" id="microshopcheck" <?php if($website['shopKeeper_check'] == 1): ?>checked<?php endif; ?>>
									<label for="microshopcheck" class=""></label>
								</div>
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
<input id="goodsid" type="hidden" value="<?php echo $website['goods_id']; ?>">
			<!-- page end -->


<script>
    require(['util'],function(util){
        Array.prototype.remove = function(val) {
            var index = this.indexOf(val);
            if (index > -1) {
                this.splice(index, 1);
            }
        };
        // 移除图片
        $('.picture-list1').on('click','.icon-danger',function(e){
            e && e.stopPropagation ? e.stopPropagation() : window.event.cancelBubble = true;
            var id=$(this).parents('.picture-list1-pic').attr('data-id');
            $(this).parents('.picture-list1-pic').remove();
            var str=$("#goodsid").val();
            var str1 = str.split(',');
            str1.remove(id);
            var str2 = str1.join(',');
            $("#goodsid").val(str2);
        })
        $('.search_goods').on('click', function () {
            var url = "<?php echo __URL('PLATFORM_MAIN/goods/selectNumGoodsList'); ?>&goodsid="+$("#goodsid").val();
            util.confirm('选择商品','url:'+url, function () {
                var goods_id = this.$content.find('#goods_id').val();
				$("#goodsid").val(goods_id);
                $.ajax({
                    type:"post",
                    url:" <?php echo __URL('PLATFORM_MAIN/goods/selectNumGoodsInfo'); ?>",
                    data:{
                        'goods_id':goods_id,
                    },
                    async:true,
                    success:function (data) {
                        if (data) {
                            var html='';
                            for(var i=0;i<data.length;i++){
                                html+='<a href="javascript:;" class="fl picture-list1-pic" data-id='+data[i]['goods_id']+'>';
                                html+='<i class="icon icon-danger" style="right:10px;" title="删除"></i>';
                                html+='<div><img style=\'width: 80px;height: 80px\' src='+__IMG(data[i]['pic_cover_mid'])+' ></div>';
                                html+='<div class="line-1-ellipsis">'+data[i]['goods_name']+'</div>';
                                html+='</a>';
							}
                            $(".picture-list1").html(html);
                        }
                    }
                });
            },'large')
        })
        util.validate($('.form-validate'),function(form){
            var microshop_status = $("input[name='microshop_status']").is(':checked')?1:0;
            var microshop_pattern = $("#microshop_pattern").val();
            var goods_id =$('#goodsid').val();
            if(goods_id==''){
                util.message('请挑选商品作为成为店主的条件','danger');
                return false;
            }
            var microshopcheck = $("input[name='microshopcheck']").is(':checked')?1:0;
            $.ajax({
                type:"post",
                url:"<?php echo $basicMicroShopSettingUrl; ?>",
                data:{
                    'microshop_status':microshop_status,
                    'microshop_pattern':microshop_pattern,
                    'shopKeeper_check':microshopcheck ,
                    'goods_id':goods_id,
                },
                async:true,
                success:function (data) {
                    if (data['code']>0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINbasicMicroShopSetting'); ?>");
                    }else{
                        util.message(data["message"], 'danger');
                    }
                }
            });
        })
    })
</script>
