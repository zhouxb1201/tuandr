<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/www.tuandr.com/addons/bargain/template/platform/bargainConfig.html";i:1583811704;}*/ ?>


        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">砍价</label>
                <div class="col-md-8">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_bargain" id="is_bargain" <?php if($addons_data['is_use']==1): ?>checked<?php endif; ?>>
                        <label for="is_bargain" class=""></label>
                    </div>
                    <div class="help-block mb-0">关闭后所有商品预售活动均不生效</div>
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><span class="text-bright">*</span>支付限时</label>
                <div class="col-md-8">
                    <div class="input-group w-200">
                        <input class="form-control" type="number" name="pay_time_limit" value="<?php echo $addons_data['pay_time_limit']; ?>" required>
                        <div class="input-group-addon">分钟</div>
                    </div>
                    <div class="help-block mb-0">超出这个时间未完成支付则订单关闭</div>
                </div>
            </div>
            <?php if($has_distribution): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与分销</label>
                <div class="col-md-8">
                    <div class="switch-inline">
                        <input type="checkbox" name="is_distribution" id="is_distribution" <?php if($addons_data['is_distribution']==1): ?>checked<?php endif; ?>>
                        <label for="is_distribution" class=""></label>
                    </div>
                    <div class="help-block mb-0">开启分销后默认所有商品参加</div>
                </div>
            </div>
            <div class="form-group rule_commission <?php if($addons_data['is_distribution']==0): ?>hide<?php endif; ?>">
                <label class="col-md-2 control-label">独立分销佣金规则</label>
                <div class="col-md-8">
                    <!--<label class="checkbox-inline" style="float:left;margin-left: 5px;width: 60px;">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_commission']==1): ?> checked <?php endif; ?> name="rule_commission">开启
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" value="1" name="rule_commission" id="rule_commission" <?php if($addons_data['rule_commission']==1): ?> checked <?php endif; ?> >
                        <label for="rule_commission" class=""></label>
                    </div>
                    <div class="help-block mb-0">不开启则使用默认佣金，开启后必填</div>
                </div>
            </div>
            <div class="form-group <?php if($addons_data['rule_commission'] && $addons_data['distribution_val']['recommend_type']): else: ?>hide<?php endif; ?>" id="recommend_type">
                <label class="col-md-2 control-label">返佣类型</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($addons_data['rule_commission'] && $addons_data['distribution_val']['recommend_type']==1): ?>checked<?php endif; ?> value="1"> 比例返佣
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($addons_data['rule_commission'] && $addons_data['distribution_val']['recommend_type']==2): ?>checked<?php endif; ?> value="2"  > 固定返佣
                    </label>
                </div>
            </div>
            <div class="form-group <?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['recommend_type']==1): else: ?>hide<?php endif; ?>" id="distribution_input">
            <label class="col-md-2"></label>
            <div class="col-md-5">
                <div class="input-group">
                    <div class="input-group-addon">一级返佣</div>
                    <input type="number" name="first_rebate" id="first_rebate" class="form-control rebate" min="0"  value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['first_rebate']): ?><?php echo $addons_data['distribution_val']['first_rebate']; endif; ?>"  style="min-width: 74px">
                    <div class="input-group-addon">%,二级返佣</div>
                    <input type="number" name="second_rebate" id="second_rebate" class="form-control rebate" min="0"   value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['second_rebate']): ?><?php echo $addons_data['distribution_val']['second_rebate']; endif; ?>" style="min-width: 74px">
                    <div class="input-group-addon">%,三级返佣</div>
                    <input type="number" name="third_rebate" id="third_rebate" class="form-control rebate" min="0" value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['third_rebate']): ?><?php echo $addons_data['distribution_val']['third_rebate']; endif; ?>" style="min-width: 74px">
                    <div class="input-group-addon">%</div>
                </div>
                <br>
                <div class="input-group">
                    <div class="input-group-addon">一级返积分</div>
                    <input type="number" name="first_point" id="first_point" class="form-control rebate" min="0"  value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['first_point']): ?><?php echo $addons_data['distribution_val']['first_point']; endif; ?>"  style="min-width: 74px">
                    <div class="input-group-addon">%,二级返积分</div>
                    <input type="number" name="second_point" id="second_point" class="form-control rebate" min="0"   value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['second_point']): ?><?php echo $addons_data['distribution_val']['second_point']; endif; ?>" style="min-width: 74px">
                    <div class="input-group-addon">%,三级返积分</div>
                    <input type="number" name="third_point" id="third_point" class="form-control rebate" min="0" value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['third_point']): ?><?php echo $addons_data['distribution_val']['third_point']; endif; ?>" style="min-width: 74px">
                    <div class="input-group-addon">%</div>
                </div>
            </div>
            </div>
            <div class="form-group <?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['recommend_type']==2): else: ?>hide<?php endif; ?>" id="distribution_input1">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣金</div>
                        <input type="number" name="first_rebate1" id="first_rebate1" class="form-control rebate" min="0"  value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['first_rebate1']): ?><?php echo $addons_data['distribution_val']['first_rebate1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">元,二级返佣金</div>
                        <input type="number" name="second_rebate1" id="second_rebate1" class="form-control rebate" min="0"   value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['second_rebate1']): ?><?php echo $addons_data['distribution_val']['second_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元,三级返佣金</div>
                        <input type="number" name="third_rebate1" id="third_rebate1" class="form-control rebate" min="0" value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['third_rebate1']): ?><?php echo $addons_data['distribution_val']['third_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point1" id="first_point1" class="form-control rebate" min="0"  value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['first_point1']): ?><?php echo $addons_data['distribution_val']['first_point1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">积分,二级返积分</div>
                        <input type="number" name="second_point1" id="second_point1" class="form-control rebate" min="0"   value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['second_point1']): ?><?php echo $addons_data['distribution_val']['second_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分,三级返积分</div>
                        <input type="number" name="third_point1" id="third_point1" class="form-control rebate" min="0" value="<?php if($addons_data['distribution_val'] && $addons_data['distribution_val']['third_point1']): ?><?php echo $addons_data['distribution_val']['third_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分</div>
                    </div>
                </div>
            </div>
            <?php endif; if($has_global): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与全球分红</label>
                <div class="col-md-8">
                    <label class="radio-inline">
                        <input type="radio" name="is_global_bonus" <?php if($addons_data['is_global_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_global_bonus" value="0" <?php if($addons_data['is_global_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="help-block mb-0">开启全球分红后默认所有商品参加</div>
                </div>
            </div>
            <?php endif; if($has_area): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与区域分红</label>
                <div class="col-md-8">
                    <label class="radio-inline">
                        <input type="radio" name="is_area_bonus" <?php if($addons_data['is_area_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_area_bonus" value="0" <?php if($addons_data['is_area_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="help-block mb-0">开启区域分红后默认所有商品参加</div>
                </div>
            </div>
            <?php endif; if($has_team): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与团队分红</label>
                <div class="col-md-8">
                    <label class="radio-inline">
                        <input type="radio" name="is_team_bonus" <?php if($addons_data['is_team_bonus']==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_team_bonus" value="0" <?php if($addons_data['is_team_bonus']==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="help-block mb-0">开启团队分红后默认所有商品参加</div>
                </div>
            </div>
            <?php endif; if($has_team || $has_area || $has_global): ?>
            <div class="form-group <?php if($addons_data['is_global_bonus']==0 && $addons_data['is_area_bonus']==0 && $addons_data['is_team_bonus']==0): ?>hide<?php endif; ?>" id="bouns_rule">
                <label class="col-md-2 control-label">独立分红佣金规则</label>
                <div class="col-md-8">
                    <!--<label class="checkbox-inline">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_bonus']==1): ?> checked <?php endif; ?> name="rule_bonus">开启
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" value="1" <?php if($addons_data['rule_bonus']==1): ?> checked <?php endif; ?> name="rule_bonus" id="rule_bonus">
                        <label for="rule_bonus" class=""></label>
                    </div>
                    <div class="help-block mb-0">不开启则使用默认分红，开启后必填</div>
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
                            <th class="w-200 team_bonus <?php if($addons_data['is_team_bonus']==0): ?>hide1<?php endif; ?>" >团队分红</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php if($has_global): ?>
                            <td class="global_bonus <?php if($addons_data['is_global_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="global_bonus" id="global_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['bonus_val']['global_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($has_area): ?>
                            <td class="area_bonus <?php if($addons_data['is_area_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <div class="input-group-addon">省级</div>
                                    <input type="number" name="province_bonus" id="province_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['bonus_val']['area_bonus']['province_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,市级</div>
                                    <input type="number" name="city_bonus" id="city_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['bonus_val']['area_bonus']['city_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,区级</div>
                                    <input type="number" name="district_bonus" id="district_bonus" class="form-control mw-68" value="<?php echo $addons_data['bonus_val']['area_bonus']['district_bonus']; ?>" min="0" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($has_team): ?>
                            <td class="team_bonus <?php if($addons_data['is_team_bonus']==0): ?>hide1<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="team_bonus" id="team_bonus" class="form-control mw-68" min="0" value="<?php echo $addons_data['bonus_val']['team_bonus']; ?>" <?php if($addons_data['rule_bonus']==1): ?> required <?php endif; ?>>
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
                    <button class="btn btn-primary save"  type="submit">保存</button>
                    <a href="javascript:history.go(-1);" class="btn btn-default">返回</a>
                </div>
            </div>
        </form>



<script>
    require(['util'], function (util) {
        $("input[name='is_global_bonus']").on('change',function(){
            var value=$(this).val();
            if(value==1){
                $('.global_bonus').show();
            }
            if(value==0){
                $('.global_bonus').hide();
                $('.global_bonus').find('input').removeAttr('required');
            }
            if($("input[name='is_global_bonus']:checked").val()==0 && $("input[name='is_area_bonus']:checked").val()==0 && $("input[name='is_team_bonus']:checked").val()==0){
                $('#bouns_rule').addClass('hide');
                $("#rule_bonus").removeAttr("checked");
                $("#bonus_input").find("input").removeAttr("required");
            }else{
                $('#bouns_rule').removeClass('hide'); 
            }
        });
        $("input[name='is_area_bonus']").on('change',function(){
            var value=$(this).val();
            if(value==1){
                $('.area_bonus').show();
            }
            if(value==0){
                $('.area_bonus').hide();
                $('.area_bonus').find('input').removeAttr('required');
            }
            if($("input[name='is_global_bonus']:checked").val()==0 && $("input[name='is_area_bonus']:checked").val()==0 && $("input[name='is_team_bonus']:checked").val()==0){
                $('#bouns_rule').addClass('hide');
                $("#rule_bonus").removeAttr("checked");
                $("#bonus_input").find("input").removeAttr("required");
            }else{
                $('#bouns_rule').removeClass('hide');
            }

        });
        $("input[name='is_team_bonus']").on('change',function(){
            var value=$(this).val();
            if(value==1){
                $('.team_bonus').show();
            }
            if(value==0){
                $('.team_bonus').hide();
                $('.team_bonus').find('input').removeAttr('required');
            }
            if($("input[name='is_global_bonus']:checked").val()==0 && $("input[name='is_area_bonus']:checked").val()==0 && $("input[name='is_team_bonus']:checked").val()==0){
                $('#bouns_rule').addClass('hide');
                $("#rule_bonus").removeAttr("checked");
                $("#bonus_input").find("input").removeAttr("required");
            }else{
                $('#bouns_rule').removeClass('hide');
            }

        });

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

        $("input[name='rule_bonus']").on('change', function () {
            if ($(this).is(':checked')) {
                $("#bonus_input").removeClass('hide');
                // $("#bonus_input").find('input').attr('required', true);
                if($("input[name='is_global_bonus']:checked").val()==1){
                    $(".global_bonus").find('input').attr('required', true);
                }
                if($("input[name='is_area_bonus']:checked").val()==1){
                    $(".area_bonus").find('input').attr('required', true);
                }
                if($("input[name='is_team_bonus']:checked").val()==1){
                    $(".team_bonus").find('input').attr('required', true);
                }
            } else {
                $("#bonus_input").addClass('hide');
                $("#bonus_input").find('input').removeAttr('required', true);
            }
        });

        util.validate($('.form-validate'), function (form) {
            var data = {};
            var is_bargain = $("input[name='is_bargain']").is(':checked')? 1 : 0;//是否开启砍价
            data.is_bargain = is_bargain;
            var pay_time_limit = $("input[name='pay_time_limit']").val();//支付时限
            data.pay_time_limit = pay_time_limit;
            //是否参与分销
            distribution_obj = {};
            var is_distribution = $("input[name='is_distribution']").is(':checked')? 1 : 0;
            data.is_distribution = is_distribution;
            //是否参与独立分销规则
            var rule_commission = $('input[name=rule_commission]:checked').val();
            var recommend_type = $('input[name=recommend_type]:checked').val();
            data.rule_commission = rule_commission;
            if(rule_commission == '1' && recommend_type){
                if(recommend_type==1){
                    var first_rebate = $('#first_rebate').val();
                    var second_rebate = $('#second_rebate').val();
                    var third_rebate = $('#third_rebate').val();
                    var first_point = $('#first_point').val();
                    var second_point = $('#second_point').val();
                    var third_point = $('#third_point').val();
                }else{
                    var first_rebate1 = $('#first_rebate1').val();
                    var second_rebate1 = $('#second_rebate1').val();
                    var third_rebate1 = $('#third_rebate1').val();
                    var first_point1 = $('#first_point1').val();
                    var second_point1 = $('#second_point1').val();
                    var third_point1 = $('#third_point1').val();
                }
                distribution_obj.recommend_type = recommend_type;
                distribution_obj.first_rebate = first_rebate;
                distribution_obj.second_rebate = second_rebate;
                distribution_obj.third_rebate = third_rebate;
                distribution_obj.first_point = first_point;
                distribution_obj.second_point = second_point;
                distribution_obj.third_point = third_point;
                distribution_obj.first_rebate1 = first_rebate1;
                distribution_obj.second_rebate1 = second_rebate1;
                distribution_obj.third_rebate1 = third_rebate1;
                distribution_obj.first_point1 = first_point1;
                distribution_obj.second_point1 = second_point1;
                distribution_obj.third_point1 = third_point1;
                data.distribution_val = distribution_obj;
            }else{
                data.distribution_val = '';
            }
            //是否参与分红
            bonus_obj = {'area_bonus':{}};
            //是否独立分红
            var rule_bonus = $('input[name=rule_bonus]:checked').val();
            data.rule_bonus = rule_bonus;
            if(rule_bonus == '1'){
                //全球分红
                var global_bonus = $('#global_bonus').val();
                //区域分红
                var province_bonus = $('#province_bonus').val();
                var city_bonus = $('#city_bonus').val();
                var district_bonus = $('#district_bonus').val();
                //团队分红
                var team_bonus = $('#team_bonus').val();
                bonus_obj.global_bonus = global_bonus;
                bonus_obj.area_bonus.province_bonus = province_bonus;
                bonus_obj.area_bonus.city_bonus = city_bonus;
                bonus_obj.area_bonus.district_bonus = district_bonus;
                bonus_obj.team_bonus = team_bonus;
                // bonus_obj_str = JSON.stringify(bonus_obj);
                data.bonus_val = bonus_obj;
            }else{
                data.bonus_val = '';
            }
            is_global_bonus = $("input[name='is_global_bonus']:checked").val();//是否参与全球分红
            data.is_global_bonus = is_global_bonus;
            is_area_bonus = $("input[name='is_area_bonus']:checked").val();//是否参与区域分红
            data.is_area_bonus = is_area_bonus;
            is_team_bonus = $("input[name='is_team_bonus']:checked").val();//是否参与团队分红
            data.is_team_bonus = is_team_bonus;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url : "<?php echo $addBargainConfig; ?>",
                data: data,
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINbargainConfig'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //点击是否参与分销隐藏分销佣金规则
        $("input[name='is_distribution']").change(function(){
            if($(this).is(':checked')){
                //rule_commission distribution_input
                $('.rule_commission').removeClass('hide');
                if( !$('input[name=rule_commission]').is(':checked') || !$('input[name=recommend_type]').is(':checked') ){
                    $('#distribution_input').find('input').attr('required',false);
                }
            }else{
                $('.rule_commission').addClass('hide');
                $('#distribution_input').addClass('hide');
                $('#distribution_input').find('input').attr('required',false);
                $("#rule_commission").prop("checked",false);
            }
        })
    });
</script>

