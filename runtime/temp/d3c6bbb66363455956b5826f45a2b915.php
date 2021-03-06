<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/www/wwwroot/www.tuandr.com/addons/groupshopping/template/platform/groupShoppingSetting.html";i:1583811704;}*/ ?>
    

        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">拼团</label>
                <div class="col-md-5">
                    <div class="switch-inline">
                        <input type="checkbox" id="is_group_shopping" <?php if($addons_data['is_use']==1): ?>checked<?php endif; ?> >
                        <label for="is_group_shopping" class=""></label>
                    </div>
                    <div class="mb-0 help-block">关闭后所有拼团活动均不生效</div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>支付限时</label>
                <div class="col-md-5">
                    <div class="input-group w-200">
                        <input class="form-control" type="number" name="pay_time_limit" value="<?php echo $addons_data['pay_time_limit']; ?>" required>
                        <div class="input-group-addon">分钟</div>
                    </div>
                    <div class="mb-0 help-block">超出这个时间未完成支付则订单关闭</div>
                </div>
                
            </div>
            <?php if($has_distribution): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与分销</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_distribution" value="1" <?php if($addons_data['is_distribution']==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_distribution" value="0" <?php if($addons_data['is_distribution']==0): ?>checked<?php endif; ?>> 不参与
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_distribution" id="is_distribution" <?php if($addons_data['is_distribution']==1): ?>checked<?php endif; ?> >
                        <label for="is_distribution" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启分销后默认所有商品参加</div>
                </div>
                
            </div>
            <div class="form-group <?php if($addons_data['is_distribution']==0): ?>hide1<?php endif; ?>" id="ruleCommission">
                <label class="col-md-2 control-label">独立分销佣金规则</label>
                <div class="col-md-5">
                    <!--<label class="checkbox-inline">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_commission']==1): ?> checked <?php endif; ?> name="rule_commission">开启
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_commission']==1): ?> checked <?php endif; ?> name="rule_commission" id="rule_commission" >
                        <label for="rule_commission" class=""></label>
                    </div>

                    <div class="mb-0 help-block">不开启则使用默认佣金，开启后必填</div>
                </div>

            </div>
            <div class="form-group <?php if($addons_data && $addons_data['recommend_type']): else: ?>hide<?php endif; ?>" id="recommend_type">
                <label class="col-md-2 control-label">返佣类型</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($addons_data && $addons_data['recommend_type']==1): ?>checked<?php endif; ?> value="1"> 比例返佣
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($addons_data && $addons_data['recommend_type']==2): ?>checked<?php endif; ?> value="2"  > 固定返佣
                    </label>
                </div>
            </div>
            <div class="form-group <?php if($addons_data && $addons_data['recommend_type']==1): else: ?>hide<?php endif; ?>" id="distribution_input">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣</div>
                        <input type="number" name="first_rebate" id="first_rebate" class="form-control rebate" min="0"  value="<?php if($addons_data && $addons_data['first_rebate']): ?><?php echo $addons_data['first_rebate']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返佣</div>
                        <input type="number" name="second_rebate" id="second_rebate" class="form-control rebate" min="0"   value="<?php if($addons_data && $addons_data['second_rebate']): ?><?php echo $addons_data['second_rebate']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返佣</div>
                        <input type="number" name="third_rebate" id="third_rebate" class="form-control rebate" min="0" value="<?php if($addons_data && $addons_data['third_rebate']): ?><?php echo $addons_data['third_rebate']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point" id="first_point" class="form-control rebate" min="0"  value="<?php if($addons_data && $addons_data['first_point']): ?><?php echo $addons_data['first_point']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返积分</div>
                        <input type="number" name="second_point" id="second_point" class="form-control rebate" min="0"   value="<?php if($addons_data && $addons_data['second_point']): ?><?php echo $addons_data['second_point']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返积分</div>
                        <input type="number" name="third_point" id="third_point" class="form-control rebate" min="0" value="<?php if($addons_data && $addons_data['third_point']): ?><?php echo $addons_data['third_point']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group <?php if($addons_data && $addons_data['recommend_type']==2): else: ?>hide<?php endif; ?>" id="distribution_input1">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣金</div>
                        <input type="number" name="first_rebate1" id="first_rebate1" class="form-control rebate" min="0"  value="<?php if($addons_data && $addons_data['first_rebate1']): ?><?php echo $addons_data['first_rebate1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">元,二级返佣金</div>
                        <input type="number" name="second_rebate1" id="second_rebate1" class="form-control rebate" min="0"   value="<?php if($addons_data && $addons_data['second_rebate1']): ?><?php echo $addons_data['second_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元,三级返佣金</div>
                        <input type="number" name="third_rebate1" id="third_rebate1" class="form-control rebate" min="0" value="<?php if($addons_data && $addons_data['third_rebate1']): ?><?php echo $addons_data['third_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point1" id="first_point1" class="form-control rebate" min="0"  value="<?php if($addons_data && $addons_data['first_point1']): ?><?php echo $addons_data['first_point1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">积分,二级返积分</div>
                        <input type="number" name="second_point1" id="second_point1" class="form-control rebate" min="0"   value="<?php if($addons_data && $addons_data['second_point1']): ?><?php echo $addons_data['second_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分,三级返积分</div>
                        <input type="number" name="third_point1" id="third_point1" class="form-control rebate" min="0" value="<?php if($addons_data && $addons_data['third_point1']): ?><?php echo $addons_data['third_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分</div>
                    </div>
                </div>
            </div>
            <?php endif; if($has_global): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与全球分红</label>
                <div class="col-md-8">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_global_bonus" <?php if($addons_data['is_global_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_global_bonus" value="0" <?php if($addons_data['is_global_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_global_bonus" id="is_global_bonus" <?php if($addons_data['is_global_bonus']==1): ?>checked<?php endif; ?>>
                        <label for="is_global_bonus" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启全球分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($has_area): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与区域分红</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_area_bonus" <?php if($addons_data['is_area_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_area_bonus" value="0" <?php if($addons_data['is_area_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_area_bonus" id="is_area_bonus" <?php if($addons_data['is_area_bonus']==1): ?>checked<?php endif; ?>>
                        <label for="is_area_bonus" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启区域分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($has_team): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与团队分红</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_team_bonus" <?php if($addons_data['is_team_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_team_bonus" value="0" <?php if($addons_data['is_team_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_team_bonus" id="is_team_bonus" <?php if($addons_data['is_team_bonus']==1): ?>checked<?php endif; ?>>
                        <label for="is_team_bonus" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启团队分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($has_team || $has_area || $has_global): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">独立分红佣金规则</label>
                <div class="col-md-5">
                    <!--<div class="checkbox_three">
                        <label class="checkbox-inline">
                            <input type="checkbox" value="1" <?php if($addons_data['rule_bonus']==1): ?> checked <?php endif; ?> name="rule_bonus">开启
                        </label>
                    </div>-->
                    <div class="switch-inline">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_bonus']==1): ?> checked <?php endif; ?> name="rule_bonus" id="rule_bonus">
                        <label for="rule_bonus" class=""></label>
                    </div>
                    <div class="mb-0 help-block">不开启则使用默认分红，开启后必填</div>
                </div>
                
            </div>
            <?php endif; ?>
            <div class="form-group <?php if($addons_data['rule_bonus'] != 1): ?>hide<?php endif; ?>" id="bonus_input">
                <label class="col-md-2"></label>
                <div class="col-md-8">
                    <table class="table v-table table-auto-center table-bordered">
                        <thead>
                        <tr>
                            <?php if($has_global): ?>
                            <th class="w-200 global_bonus <?php if($addons_data['is_global_bonus']==0): ?>hide1<?php endif; ?>">全球分红</th>
                             <?php endif; if($has_area): ?>
                            <th class="w-600 area_bonus <?php if($addons_data['is_area_bonus']==0): ?>hide1<?php endif; ?>">区域分红</th>
                             <?php endif; if($has_team): ?>
                            <th class="w-200 team_bonus <?php if($addons_data['is_team_bonus']==0): ?>hide1<?php endif; ?>">团队分红</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php if($has_global): ?>
                            <td class="global_bonus <?php if($addons_data['is_global_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="global_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['global_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($has_area): ?>
                            <td class="area_bonus <?php if($addons_data['is_area_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <div class="input-group-addon">省级</div>
                                    <input type="number" name="province_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['province_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,市级</div>
                                    <input type="number" name="city_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['city_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,区级</div>
                                    <input type="number" name="district_bonus" class="form-control mw-68" value="<?php echo $addons_data['district_bonus']; ?>" min="0" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($has_team): ?>
                            <td class="team_bonus <?php if($addons_data['is_team_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="team_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['team_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <button class="btn btn-primary save" id="save" type="submit">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>



<script>
    require(['util'], function (util) {

        $("input[name='is_distribution']").on('change', function () {
            if($(this).is(':checked')) {
                $('#ruleCommission').show();
                // $("#distribution_input").removeClass('hide');
                // $("#distribution_input").find('input').attr('required', true);
                $('input[name="rule_commission"]').removeAttr('checked');
            }
            else{
                $('#ruleCommission').hide();
                $('input[name="rule_commission"]').attr('checked');
            }
        })
        $("input[name='recommend_type']").click(function () {
            if($(this).is(':checked') && $("input[name='recommend_type']:checked").val()==1){
                $("#distribution_input").show();
                $("#distribution_input1").hide();
                $('#distribution_input').removeClass('hide');
                $('#distribution_input').find('input').attr('required',true);
                $('#distribution_input1').addClass('hide');
                $('#distribution_input1').find('input').attr('required',false);
            }else if($(this).is(':checked') && $("input[name='recommend_type']:checked").val()==2){
                $("#distribution_input1").show();
                $("#distribution_input").hide();
                $('#distribution_input1').removeClass('hide');
                $('#distribution_input1').find('input').attr('required',true);
                $('#distribution_input').addClass('hide');
                $('#distribution_input').find('input').attr('required',false);
            }
        })
        $('input[name=rule_commission]').change(function(){
            var distribution_rule = $(this).is(':checked')?1:2;
            if(distribution_rule == 1){
                $('#recommend_type').show();
                $('#recommend_type').find('input').attr('required',true);
                $('#recommend_type').removeClass('hide');
            }else{
                $('#recommend_type').addClass('hide');
                $('#distribution_input').addClass('hide');
                $('#distribution_input1').addClass('hide');
                $('.recommend_type').removeAttr('checked');
                $('#recommend_type').find('input').attr('required',false);
                $('#distribution_input input').attr('required',false);
                $('#distribution_input1 input').attr('required',false);
            }
        })
        $("input[name='is_global_bonus']").on('change', function () {
            if($(this).is(':checked')) {
                $('.global_bonus').show();
            }
            else{
                $('.global_bonus').hide();
            }
        })
        $("input[name='is_area_bonus']").on('change', function () {
            if($(this).is(':checked')) {
                $('.area_bonus').show();
            }
            else{
                $('.area_bonus').hide();
            }
        })
        $("input[name='is_team_bonus']").on('change', function () {
            if($(this).is(':checked')) {
                $('.team_bonus').show();
            }
            else{
                $('.team_bonus').hide();
            }
        })
        $("input[name='rule_bonus']").on('change', function () {
            if ($(this).is(':checked')) {
                $("#bonus_input").removeClass('hide');
                $("#bonus_input").find('input').attr('required', true);
            } else {
                $("#bonus_input").addClass('hide');
                $("#bonus_input").find('input').removeAttr('required', true);
            }
        });

        util.validate($('.form-validate'), function (form) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo $saveGroupShoppingSettingUrl; ?>',
                data: {
                    'is_group_shopping': $('#is_group_shopping').is(':checked')? 1 : 0,//是否开启拼团
                    'pay_time_limit' : $("input[name='pay_time_limit']").val(),//支付时限
                    'is_distribution' : $('#is_distribution').is(':checked')? 1 : 0,//是否参与分销
                    'recommend_type':  $("input[name='recommend_type']:checked").val(),
                    'rule_commission' : $("input[name='rule_commission']:checked").val(),//是否设置独立分销佣金规则
                    'first_rebate' : $("input[name='first_rebate']").val(),//一级佣金比例
                    'second_rebate' : $("input[name='second_rebate']").val(),//二级佣金比例
                    'third_rebate' : $("input[name='third_rebate']").val(),//三级佣金比例
                    'first_rebate1' : $("input[name='first_rebate1']").val(),//一级佣金
                    'second_rebate1' : $("input[name='second_rebate1']").val(),//二级佣金
                    'third_rebate1' : $("input[name='third_rebate1']").val(),//三级佣金
                    'first_point' : $("input[name='first_point']").val(),//一级积分比例
                    'second_point' : $("input[name='second_point']").val(),//二级积分比例
                    'third_point' : $("input[name='third_point']").val(),//三级积分比例
                    'first_point1' : $("input[name='first_point1']").val(),//一级积分比例
                    'second_point1' : $("input[name='second_point1']").val(),//二级积分比例
                    'third_point1' : $("input[name='third_point1']").val(),//三级积分比例
                    'is_global_bonus' : $('#is_global_bonus').is(':checked')? 1 : 0,//是否参与全球分红
                    'is_area_bonus' : $('#is_area_bonus').is(':checked')? 1 : 0,//是否参与区域分红
                    'is_team_bonus' : $('#is_team_bonus').is(':checked')? 1 : 0,//是否参与团队分红
                    'rule_bonus' : $("input[name='rule_bonus']:checked").val(),//是否设置独立分红佣金规则
                    'global_bonus' : $("input[name='global_bonus']").val(),//全球分红比例
                    'province_bonus' : $("input[name='province_bonus']").val(),//省级分红比例
                    'city_bonus' : $("input[name='city_bonus']").val(),//市级分红比例
                    'district_bonus' : $("input[name='district_bonus']").val(),//区级分红比例
                    'team_bonus' : $("input[name='team_bonus']").val() //团队分红比例
                },
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success');
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
    });
</script>

