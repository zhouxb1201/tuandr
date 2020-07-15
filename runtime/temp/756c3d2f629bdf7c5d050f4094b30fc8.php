<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/www.tuandr.com/addons/seckill/template/platform/seckSetting.html";i:1583811700;}*/ ?>


        <!-- page -->
        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="form-group">
                <label class="col-md-2 control-label">限时秒杀</label>
                <div class="col-md-2">
                    <?php if($is_open == '0' || $is_open == '1'): ?>
                        <div class="switch-inline">
                            <input type="checkbox" name="is_sk_open" id="is_sk_open" <?php if($is_open==1): ?>checked<?php endif; ?>>
                            <label for="is_sk_open" class=""></label>
                        </div>
                    <?php else: ?>
                        <div class="switch-inline">
                            <input type="checkbox" name="is_sk_open" id="is_sk_open">
                            <label for="is_sk_open" class=""></label>
                        </div>
                    <?php endif; ?>
                    <div class="help-block mb-0">关闭后所有秒杀活动均不生效</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">秒杀时段</label>
                <div class="col-md-8" id="sk_quantum">

                        <?php $__FOR_START_1455729558__=0;$__FOR_END_1455729558__=24;for($i=$__FOR_START_1455729558__;$i < $__FOR_END_1455729558__;$i+=1){ ?>
                            <label class="checkbox-inline" style="float: left;
                                                                  margin-left: 5px;
                                                                  width: 60px;">
                                <input type="checkbox" <?php if(is_array($sk_quantum_arr) || $sk_quantum_arr instanceof \think\Collection || $sk_quantum_arr instanceof \think\Paginator): if( count($sk_quantum_arr)==0 ) : echo "" ;else: foreach($sk_quantum_arr as $key=>$time): if(($time == $i) && $time != ""): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?> required value="<?php echo $i; ?>" name="sk_quantum"><?php echo $i; ?>点
                            </label>
                        <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">支付限时</label>
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="number" name="pay_limit_time" class="form-control" value="<?php echo $value['pay_limit_time']; ?>" id="pay_limit_time" min="1" placeholder="请输入限时" required >
                        <div class="input-group-addon">分钟</div>
                    </div>
                    <div class="help-block mb-0">超出这个时间未完成支付则订单关闭</div>
                    
                </div>
            </div>
            <div id="isupgrade">
                <div class="form-group">
                    <label class="col-md-2 control-label">店铺报名条件</label>
                    <div class="col-md-6 apply_condition">
                        <?php if($value['is_condition'] != ''): ?>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="0" <?php if($value['is_condition'] == '0'): ?>checked<?php endif; ?> > 无条件
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="1" <?php if($value['is_condition'] == '1'): ?>checked<?php endif; ?>> 满足所有勾选条件
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="2" <?php if($value['is_condition'] == '2'): ?>checked<?php endif; ?>> 满足勾选条件之一即可
                            </label>
                        <?php else: ?>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="0" checked> 无条件
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="1"> 满足所有勾选条件
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_condition" id="" value="2"> 满足勾选条件之一即可
                            </label>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group hidden" id="upgrade-condition">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-8">
                        <div class="form-additional" style="width: auto">
                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox"  name="upgradeconditions" <?php if($condition_check_val['margin']): ?>checked<?php endif; ?> value="1"> 保证金达</label>
                                <div class="col-md-7 control-group">
                                    <div class="input-group">
                                        <input type="number"  class="form-control" min="0" name="pay_money" id="pay_money" value="<?php echo $condition_check_val['margin']; ?>">
                                        <div class="input-group-addon">元</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox"  name="upgradeconditions" <?php if($condition_check_val['shop_desccredit']): ?>checked<?php endif; ?> value="2"> 商品描述达</label>
                                <div class="col-md-7 control-group">
                                    <div class="input-group">
                                        <input type="number"  class="form-control" min="0" max="5" name="goods_desc_num" id="goods_desc_num" value="<?php echo $condition_check_val['shop_desccredit']; ?>">
                                        <div class="input-group-addon">分</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox"  name="upgradeconditions" <?php if($condition_check_val['shop_servicecredit']): ?>checked<?php endif; ?> value="3"> 商家服务达</label>
                                <div class="col-md-7 control-group">
                                    <div class="input-group">
                                        <input type="number"  class="form-control" min="0" max="5" name="shop_service_num" id="shop_service_num" value="<?php echo $condition_check_val['shop_servicecredit']; ?>">
                                        <div class="input-group-addon">分</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox"  name="upgradeconditions" <?php if($condition_check_val['shop_deliverycredit']): ?>checked<?php endif; ?> value="4"> 物流发货达</label>
                                <div class="col-md-7 control-group">
                                    <div class="input-group">
                                        <input type="number"  class="form-control" min="0" max="5" name="logi_shipping_num" id="logi_shipping_num" value="<?php echo $condition_check_val['shop_deliverycredit']; ?>">
                                        <div class="input-group-addon" >分</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"><input type="checkbox"  name="upgradeconditions" <?php if($condition_check_val['shop_score_num']): ?>checked<?php endif; ?> value="5"> 店铺评分达</label>
                                <div class="col-md-7 control-group">
                                    <div class="input-group">
                                        <input type="number"  class="form-control" min="0" max="5" name="shop_score_num" id="shop_score_num" value="<?php echo $condition_check_val['shop_score_num']; ?>">
                                        <div class="input-group-addon">分</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">店铺商品审核方式</label>
                <div class="col-md-4" id="check_method">
                <?php if($value['check_method'] != ''): ?>
                    <label class="radio-inline">
                        <input type="radio" name="is_auto_check" id="" <?php if($value['check_method'] == '1'): ?>checked<?php endif; ?> value="1"> 自动审核
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_auto_check" id="" value="0" <?php if($value['check_method'] == '0'): ?>checked<?php endif; ?>> 手动审核
                    </label>
                <?php else: ?>
                    <label class="radio-inline">
                        <input type="radio" name="is_auto_check" id="" value="1"> 自动审核
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_auto_check" id="" value="0" checked> 手动审核
                    </label>
                <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">可报名日期区间</label>
                <!--<div class="col-md-10">
                    起 <input type="number" placeholder="最小为1" name="can_apply_date_start" id="can_apply_date_start" value="<?php echo $can_apply_date_start; ?>" required name="" class="form-control number-form-control ml-15 mr-15" min="1" step="1"> 天 , 止 <input type="number" name="can_apply_date_end" id="can_apply_date_end" value="<?php echo $can_apply_date_end; ?>" required class="form-control number-form-control ml-15 mr-15" min="1" step="1"> 天 <span class="info"> &nbsp;&nbsp;&nbsp;今天 + N天为可报名区间范围，建议报名区间为7-14天 </span>
                </div>-->
                <div class="col-md-8">
                    <div class="input-group">
                        <div class="input-group-addon"> 起 </div>
                        <input type="number" placeholder="最小为1" name="can_apply_date_start" id="can_apply_date_start" value="<?php echo $can_apply_date_start; ?>" required name="" class="form-control number-form-control" min="1" step="1">
                        <div class="input-group-addon"> 天 , 止  </div>
                        <input type="number" name="can_apply_date_end" id="can_apply_date_end" value="<?php echo $can_apply_date_end; ?>" required class="form-control number-form-control" min="1" step="1">
                        <div class="input-group-addon">天</div>
                    </div>
                    <div class="help-block mb-0">今天 + N天为可报名区间范围，建议报名区间为7-14天</div>
                </div>
            </div>



            <?php if($distribution_is_open == '1'): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与分销</label>
                <div class="col-md-5">
                    <!--<label class="radio-inline">
                        <input type="radio" name="is_distribution" value="1" <?php if($is_distribution==1): ?>checked<?php endif; ?>> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_distribution" value="0" <?php if($is_distribution==0): ?>checked<?php endif; ?>> 不参与
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="is_distribution" id="is_distribution" <?php if($is_distribution==1): ?>checked<?php endif; ?>>
                        <label for="is_distribution" class=""></label>
                    </div>
                    <div class="mb-0 help-block">开启分销后默认所有商品参加</div>
                </div>
                
            </div>
            <div class="form-group" id="distribution_rule_hidden" <?php if($is_distribution==0): ?>style="display:none;"<?php endif; ?>>
                <label class="col-md-2 control-label">独立分销佣金规则</label>
                <div class="col-md-5">
                    <!--<label class="checkbox-inline" style="float:left;margin-left: 5px;width: 60px;">
                        <input type="checkbox" value="1" <?php if($rule_commission==1): ?> checked <?php endif; ?> name="rule_commission">开启
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" value="1" <?php if($rule_commission==1): ?> checked <?php endif; ?> name="rule_commission" id="rule_commission">
                        <label for="rule_commission" class=""></label>
                    </div>
                    <div class="mb-0 help-block">不开启则使用默认佣金，开启后必填</div>
                </div>
                
            </div>
            <div class="form-group <?php if($is_distribution && $distribution_val['recommend_type']): else: ?>hide<?php endif; ?>" id="recommend_type">
                <label class="col-md-2 control-label">返佣类型</label>
                <div class="col-md-8" >
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($is_distribution && $distribution_val['recommend_type']==1): ?>checked<?php endif; ?> value="1"> 比例返佣
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="recommend_type" class="recommend_type" <?php if($is_distribution && $distribution_val['recommend_type']==2): ?>checked<?php endif; ?> value="2"  > 固定返佣
                    </label>
                </div>
            </div>
            <div class="form-group <?php if($distribution_val && $distribution_val['recommend_type']==1): else: ?>hide<?php endif; ?>" id="distribution_input">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣</div>
                        <input type="number" name="first_rebate" id="first_rebate" class="form-control rebate" min="0"  value="<?php if($distribution_val && $distribution_val['first_rebate']): ?><?php echo $distribution_val['first_rebate']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返佣</div>
                        <input type="number" name="second_rebate" id="second_rebate" class="form-control rebate" min="0"   value="<?php if($distribution_val && $distribution_val['second_rebate']): ?><?php echo $distribution_val['second_rebate']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返佣</div>
                        <input type="number" name="third_rebate" id="third_rebate" class="form-control rebate" min="0" value="<?php if($distribution_val && $distribution_val['third_rebate']): ?><?php echo $distribution_val['third_rebate']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point" id="first_point" class="form-control rebate" min="0"  value="<?php if($distribution_val && $distribution_val['first_point']): ?><?php echo $distribution_val['first_point']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">%,二级返积分</div>
                        <input type="number" name="second_point" id="second_point" class="form-control rebate" min="0"   value="<?php if($distribution_val && $distribution_val['second_point']): ?><?php echo $distribution_val['second_point']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%,三级返积分</div>
                        <input type="number" name="third_point" id="third_point" class="form-control rebate" min="0" value="<?php if($distribution_val && $distribution_val['third_point']): ?><?php echo $distribution_val['third_point']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </div>
            <div class="form-group <?php if($distribution_val && $distribution_val['recommend_type']==2): else: ?>hide<?php endif; ?>" id="distribution_input1">
                <label class="col-md-2"></label>
                <div class="col-md-5">
                    <div class="input-group">
                        <div class="input-group-addon">一级返佣金</div>
                        <input type="number" name="first_rebate1" id="first_rebate1" class="form-control rebate" min="0"  value="<?php if($distribution_val && $distribution_val['first_rebate1']): ?><?php echo $distribution_val['first_rebate1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">元,二级返佣金</div>
                        <input type="number" name="second_rebate1" id="second_rebate1" class="form-control rebate" min="0"   value="<?php if($distribution_val && $distribution_val['second_rebate1']): ?><?php echo $distribution_val['second_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元,三级返佣金</div>
                        <input type="number" name="third_rebate1" id="third_rebate1" class="form-control rebate" min="0" value="<?php if($distribution_val && $distribution_val['third_rebate1']): ?><?php echo $distribution_val['third_rebate1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">元</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon">一级返积分</div>
                        <input type="number" name="first_point1" id="first_point1" class="form-control rebate" min="0"  value="<?php if($distribution_val && $distribution_val['first_point1']): ?><?php echo $distribution_val['first_point1']; endif; ?>"  style="min-width: 74px">
                        <div class="input-group-addon">积分,二级返积分</div>
                        <input type="number" name="second_point1" id="second_point1" class="form-control rebate" min="0"   value="<?php if($distribution_val && $distribution_val['second_point1']): ?><?php echo $distribution_val['second_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分,三级返积分</div>
                        <input type="number" name="third_point1" id="third_point1" class="form-control rebate" min="0" value="<?php if($distribution_val && $distribution_val['third_point1']): ?><?php echo $distribution_val['third_point1']; endif; ?>" style="min-width: 74px">
                        <div class="input-group-addon">积分</div>
                    </div>
                </div>
            </div>
            <?php endif; if($globalbonus_is_open == '1'): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与全球分红</label>
                <div class="col-md-5">
                    <label class="radio-inline">
                        <input type="radio" name="is_global_bonus" <?php if($is_global_bonus==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_global_bonus" value="0" <?php if($is_global_bonus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <!--<div class="switch-inline">
                        <input type="checkbox" name="is_global_bonus" id="is_global_bonus" <?php if($is_global_bonus==1): ?>checked<?php endif; ?>>
                        <label for="is_global_bonus" class=""></label>
                    </div>-->

                    <div class="mb-0 help-block">开启全球分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($areabonus_is_open == '1'): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与区域分红</label>
                <div class="col-md-5">
                    <label class="radio-inline">
                        <input type="radio" name="is_area_bonus" <?php if($is_area_bonus==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_area_bonus" value="0" <?php if($is_area_bonus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="mb-0 help-block">开启区域分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($teambonus_is_open == '1'): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">是否参与团队分红</label>
                <div class="col-md-5">
                    <label class="radio-inline">
                        <input type="radio" name="is_team_bonus" <?php if($is_team_bonus==1): ?>checked<?php endif; ?> value="1"> 参与
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_team_bonus" value="0" <?php if($is_team_bonus==0): ?>checked<?php endif; ?>> 不参与
                    </label>
                    <div class="mb-0 help-block">开启团队分红后默认所有商品参加</div>
                </div>
                
            </div>
            <?php endif; if($areabonus_is_open == '1' || $globalbonus_is_open == '1' || $teambonus_is_open == '1'): ?>
            <div class="form-group" id="bonus_rules_hidden">
                <label class="col-md-2 control-label">独立分红佣金规则</label>
                <div class="col-md-5">
                    <!--<label class="checkbox-inline" style="float:left;margin-left: 5px;width: 60px;">
                        <input type="checkbox" value="1" <?php if($rule_bonus==1): ?> checked <?php endif; ?> name="rule_bonus">开启
                    </label>-->
                    <div class="switch-inline">
                        <input type="checkbox" name="rule_bonus" id="rule_bonus" value="1" <?php if($rule_bonus==1): ?> checked <?php endif; ?> >
                        <label for="rule_bonus" class=""></label>
                    </div>
                    <div class="mb-0 help-block">不开启则使用默认分红，开启后必填</div>
                </div>
                
            </div>
            <?php endif; ?>
            <div class="form-group <?php if($rule_bonus != 1): ?>hide<?php endif; ?>" id="bonus_input">
                <label class="col-md-2"></label>
                <div class="col-md-7">
                    <table class="table v-table table-auto-center table-bordered">
                        <thead>
                        <tr>
                            <?php if($globalbonus_is_open == '1'): ?>
                            <th class="w-200 global_bonus <?php if($is_global_bonus==0): ?>hide<?php endif; ?>">全球分红</th>
                            <?php endif; if($areabonus_is_open == '1'): ?>
                            <th class="w-600 area_bonus <?php if($is_area_bonus==0): ?>hide<?php endif; ?>">区域分红</th>
                            <?php endif; if($teambonus_is_open == '1'): ?>
                            <th class="w-200 team_bonus <?php if($is_team_bonus==0): ?>hide<?php endif; ?>">团队分红</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php if($globalbonus_is_open == '1'): ?>
                            <td class="global_bonus <?php if($is_global_bonus==0): ?>hide<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="global_bonus" id="global_bonus" class="form-control mw-68" min="0" value="<?php echo $bonus_val['global_bonus']; ?>" <?php if($rule_bonus==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($areabonus_is_open): ?>
                            <td class="area_bonus <?php if($is_area_bonus==0): ?>hide<?php endif; ?>">
                                <div class="input-group">
                                    <div class="input-group-addon">省级</div>
                                    <input type="number" name="province_bonus" id="province_bonus" class="form-control mw-68" min="0" value="<?php echo $bonus_val['area_bonus']['province_bonus']; ?>" <?php if($rule_bonus==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,市级</div>
                                    <input type="number" name="city_bonus" id="city_bonus" class="form-control mw-68" min="0" value="<?php echo $bonus_val['area_bonus']['city_bonus']; ?>" <?php if($rule_bonus==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%,区级</div>
                                    <input type="number" name="district_bonus" id="district_bonus" class="form-control mw-68" value="<?php echo $bonus_val['area_bonus']['district_bonus']; ?>" min="0" <?php if($rule_bonus==1): ?> required <?php endif; ?>>
                                    <div class="input-group-addon">%</div>
                                </div>
                            </td>
                            <?php endif; if($teambonus_is_open): ?>
                            <td class="team_bonus <?php if($is_team_bonus==0): ?>hide<?php endif; ?>">
                                <div class="input-group">
                                    <input type="number" name="team_bonus" id="team_bonus" class="form-control mw-68" min="0" value="<?php echo $bonus_val['team_bonus']; ?>" <?php if($rule_bonus==1): ?> required <?php endif; ?>>
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

        <!-- page end -->


<script>
    require(['util'],function(util){
        switch($('.apply_condition input[type=radio]:checked').val()){
            case '0':
                cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                numb_checkbox = $('#upgrade-condition input[type=number]');
                $('#upgrade-condition').removeClass('show');
                $('#upgrade-condition').addClass('hidden');
                cond_checkbox.eq(0).attr('required',null);
                numb_checkbox.eq(0).attr('required',null);
                break;
            case '1':
                cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                numb_checkbox = $('#upgrade-condition input[type=number]');
                $('#upgrade-condition').removeClass('hidden');
                $('#upgrade-condition').addClass('show');
                cond_checkbox.eq(0).attr('required','required');
                numb_checkbox.eq(0).attr('required','required');
                break;
            case '2':
                cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                numb_checkbox = $('#upgrade-condition input[type=number]');
                $('#upgrade-condition').removeClass('hidden');
                $('#upgrade-condition').addClass('show');
                cond_checkbox.eq(0).attr('required','required');
                numb_checkbox.eq(0).attr('required','required');
                break;
        }
        //当没有开启分销分红设置的时候，规则隐藏掉
        var isDistribution=$('input[name=is_distribution]').is(':checked');
        $('input[name=is_distribution]').change(function(){
            if($(this).is(':checked')) {
                $('#distribution_rule_hidden').show();
            }else{
                $('#distribution_rule_hidden').hide();
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
        $('input[name=is_global_bonus]').click(function(){
            if( ($('input[name=is_global_bonus]:checked').val() == 0 || $('input[name=is_global_bonus]:checked').val() == undefined) && ($('input[name=is_area_bonus]:checked').val() == 0 || $('input[name=is_area_bonus]:checked').val() == undefined) && ($('input[name=is_team_bonus]:checked').val() == 0 || $('input[name=is_team_bonus]:checked').val() == undefined)){
                $('#bonus_rules_hidden').hide();
                $('#bonus_input').hide();
            }else{
                $('#bonus_rules_hidden').show();
                $('#bonus_input').show();
            }
        })
        if( ($('input[name=is_global_bonus]:checked').val() == 0 || $('input[name=is_global_bonus]:checked').val() == undefined) && ($('input[name=is_area_bonus]:checked').val() == 0 || $('input[name=is_area_bonus]:checked').val() == undefined) && ($('input[name=is_team_bonus]:checked').val() == 0 || $('input[name=is_team_bonus]:checked').val() == undefined)){
            $('#bonus_rules_hidden').hide();
            $('#bonus_input').hide();
        }else{
            $('#bonus_rules_hidden').show();
            $('#bonus_input').show();
        }
        $('input[name=is_area_bonus]').click(function(){
            if(($('input[name=is_global_bonus]:checked').val() == 0 || $('input[name=is_global_bonus]:checked').val() == undefined) && ($('input[name=is_area_bonus]:checked').val() == 0 || $('input[name=is_area_bonus]:checked').val() == undefined) && ($('input[name=is_team_bonus]:checked').val() == 0 || $('input[name=is_team_bonus]:checked').val() == undefined)){
                $('#bonus_rules_hidden').hide();
                $('#bonus_input').hide();
            }else{
                $('#bonus_rules_hidden').show();
                $('#bonus_input').show();
            }
        })
        $('input[name=is_team_bonus]').click(function(){
            if(($('input[name=is_global_bonus]:checked').val() == 0 || $('input[name=is_global_bonus]:checked').val() == undefined) && ($('input[name=is_area_bonus]:checked').val() == 0 || $('input[name=is_area_bonus]:checked').val() == undefined) && ($('input[name=is_team_bonus]:checked').val() == 0 || $('input[name=is_team_bonus]:checked').val() == undefined)){
                $('#bonus_rules_hidden').hide();
                $('#bonus_input').hide();
            }else{
                $('#bonus_rules_hidden').show();
                $('#bonus_input').show();
            }
        })
        $('input[name=is_global_bonus]').on('change',function(){
            var val = $(this).val();
            if(val==1){
                $('.global_bonus').removeClass('hide');
                if($('input[name=rule_bonus]').is(":checked")){
                    $('.global_bonus').find('input').attr('required','required');
                }
                
            }
            else{
                $('.global_bonus').addClass('hide');
                $('.global_bonus').find('input').attr('required',null);
            }
        })
        $('input[name=is_area_bonus]').on('change',function(){
            var val = $(this).val();
            if(val==1){
                $('.area_bonus').removeClass('hide');
                if($('input[name=rule_bonus]').is(":checked")){
                    $('.area_bonus').find('input').attr('required','required');
                }
                
            }
            else{
                $('.area_bonus').addClass('hide');
                $('.area_bonus').find('input').attr('required',null);
            }
        })
        $('input[name=is_team_bonus]').on('change',function(){
            var val = $(this).val();
            if(val==1){
                $('.team_bonus').removeClass('hide');
                if($('input[name=rule_bonus]').is(":checked")){
                    $('.team_bonus').find('input').attr('required','required');
                }
                
            }
            else{
                $('.team_bonus').addClass('hide');
                $('.team_bonus').find('input').attr('required',null);
            }
        })

        $('#upgrade-condition input[type=checkbox]').click(function(){
            if($(this).attr('checked') === 'checked'){
                $(this).parent().parent().find('input[type=number]').attr('required','required');
            }else if($(this).attr('checked') === undefined){
                var idx = $(this).val();
                $(this).parent().parent().find('input[type=number]').attr('required',null);
                if(idx == '1'){
                    $(this).attr('required','required');
                    $(this).attr('aria-required',false);
                    $(this).parent().parent().find('input[type=number]').attr('required','required');
                    $(this).parent().parent().find('input[type=number]').attr('aria-required',false);
                }
                $(this).parent().parent().removeClass('has-error');
            }
        })
        $('#upgrade-condition input[type=checkbox]:checked').parent().parent().find('input[type=number]').attr('required','required');
        $('#upgrade-condition input[type=number]').click(function(){
            $(this).attr('required','required');
            $(this).parent().parent().parent().find('input[type=checkbox]').attr('checked','required');
        })
        if(!isDistribution){
            $('#distribution_input input').attr('required',null);
        }
        if($('input[name=is_bonus]:checked').val() != 1){
            $('#bonus_input input').attr('required',false);
        }

        $("input[name='rule_commission']").on('change', function () {
            if ($(this).is(':checked')) {
                $("#distribution_input").removeClass('hide');
                $("#distribution_input").find('input').attr('required', true);
            } else {
                $("#distribution_input").addClass('hide');
                $("#distribution_input").find('input').removeAttr('required', true);
            }
        });

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
            // console.log("<?php echo $saveSeckSettingUrl; ?>");return;
            var data = {};
            var is_open = $("input[name=is_sk_open]").is(':checked')? 1 : 0 ;//是否开启秒杀
            data.is_open = is_open;
            //秒杀时段
            var sk_quantum_tag = $('#sk_quantum input[type=checkbox]');
            var sk_quantum_str = '';
            sk_quantum_tag.each(function(i,obj){
                if($(obj).is(':checked')){
                    sk_quantum_str = sk_quantum_str + $(obj).val()+',';
                };
            });
            sk_quantum_str = sk_quantum_str.slice(0,-1);
            data.sk_quantum_str = sk_quantum_str;
            //支付限时
            var pay_limit_time = $('#pay_limit_time').val();
            data.pay_limit_time = pay_limit_time;

            //店铺报名条件，先获取当前单选框的值
            condition_obj = {};
            var redio_is_condition = $('input[name=is_condition]:checked').val();
            data.is_condition = redio_is_condition;
            var condition_check_obj = $('#upgrade-condition input[type=checkbox]');
/*            var number_check_obj = $('#upgrade-condition input[type=number]');
            var condition_check_val = '';*/
            if(redio_is_condition == '1' || redio_is_condition == '2'){
               /* var condition_check_id = condition_check_obj.map(function(index,elem) {
                    return $(elem).val();
                }).get().join(',');
                var condition_check_val = number_check_obj.map(function(index,elem) {
                    return $(elem).val();
                }).get().join(',');

                console.log(condition_check_val);return;*/
                condition_check_obj.each(function(i,obj){
                    if($(obj).is(':checked')){
                        switch($(obj).val()){
                            //保证金
                            case '1':
                                var pay_money = $('#pay_money').val();
                                condition_obj.margin = pay_money;
                                break;
                            //商家描述
                            case '2':
                                var goods_desc_num = $('#goods_desc_num').val();
                                condition_obj.shop_desccredit =goods_desc_num;
                                break;
                            //商家服务
                            case '3':
                                var shop_service_num = $('#shop_service_num').val();
                                condition_obj.shop_servicecredit =shop_service_num;
                                break;
                            //物流发货
                            case '4':
                                var logi_shipping_num = $('#logi_shipping_num').val();
                                condition_obj.shop_deliverycredit =logi_shipping_num;
                                break;
                            //总分
                            case '5':
                                var shop_score_num = $('#shop_score_num').val();
                                condition_obj.shop_score_num =shop_score_num;
                                break;
                        }
                        // condition_check = condition_check + $(obj).val() + ','
                    }
                });
                var condition_check_val = JSON.stringify(condition_obj);
                data.condition_check_val = condition_check_val;
            }else{
                data.condition_check_val = '';
            }

            //是否自动审核
            var check_method = $('#check_method input[type=radio]:checked').val();
            data.check_method = check_method;

            //可报名日期区间
            var can_apply_date_start = $('#can_apply_date_start').val();
            var can_apply_date_end = $('#can_apply_date_end').val();
            data.can_apply_date = can_apply_date_start + '-' +can_apply_date_end;

            //是否参与分销
            distribution_obj = {};
            var is_distribution = $('input[name=is_distribution]').is(':checked')? 1:0;
            var recommend_type = $('input[name=recommend_type]:checked').val();
            data.is_distribution = is_distribution;
            //是否参与独立分销规则
            var rule_commission = $('input[name=rule_commission]:checked').val();
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
                var distribution_val = JSON.stringify(distribution_obj);
                data.distribution_val = distribution_val;
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
                bonus_obj_str = JSON.stringify(bonus_obj);
                data.bonus_val = bonus_obj_str;
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
                type: "post",
                url: "<?php echo $saveSeckSettingUrl; ?>",
                data: data,
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message('添加成功', 'success', "<?php echo __URL('ADDONS_MAINseckSetting'); ?>");
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });

        $('.apply_condition input[type=radio]').change(function(){
            var condition_val = $(this).val();
            var now_condition_id = '<?php echo $value['is_condition']; ?>';
            if(now_condition_id != condition_val){
                cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                cond_checkbox.attr('checked',false);
                $('#pay_money').val('');
                $('#goods_desc_num').val('');
                $('#shop_service_num').val('');
                $('#logi_shipping_num').val('');
                $('#shop_score_num').val('');
            }else{
                cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                numb_checkbox = $('#upgrade-condition input[type=number]');
                if('<?php echo $condition_check_val['margin']; ?>'){
                    var input_0 = $('input[name=upgradeconditions]')[0];
                    $(input_0).prop('checked',true);
                }
                if('<?php echo $condition_check_val['shop_desccredit']; ?>'){
                    var input_1 = $('input[name=upgradeconditions]')[1];
                    $(input_1).prop('checked',true);
                }
                if('<?php echo $condition_check_val['shop_servicecredit']; ?>'){
                    var input_2 = $('input[name=upgradeconditions]')[2];
                    $(input_2).prop('checked',true);
                }
                if('<?php echo $condition_check_val['shop_deliverycredit']; ?>'){
                    var input_3 = $('input[name=upgradeconditions]')[3];
                    $(input_3).prop('checked',true);
                }
                if('<?php echo $condition_check_val['shop_score_num']; ?>'){
                    var input_4 = $('input[name=upgradeconditions]')[4];
                    $(input_4).prop('checked',true);
                }
                $('#pay_money').val('<?php echo $condition_check_val['margin']; ?>');
                $('#goods_desc_num').val('<?php echo $condition_check_val['shop_desccredit']; ?>');
                $('#shop_service_num').val('<?php echo $condition_check_val['shop_servicecredit']; ?>');
                $('#logi_shipping_num').val('<?php echo $condition_check_val['shop_deliverycredit']; ?>');
                $('#shop_score_num').val('<?php echo $condition_check_val['shop_score_num']; ?>');
            }
            switch(condition_val){
                case '0':
                    $('#upgrade-condition').removeClass('show');
                    $('#upgrade-condition').addClass('hidden');
                    cond_checkbox.attr('required',null);
                    numb_checkbox.attr('required',null);
                    break;
                case '1':
                    $('#upgrade-condition').removeClass('hidden');
                    $('#upgrade-condition').addClass('show');
                    cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                    cond_checkbox.eq(0).attr('required','required');
                    numb_checkbox.eq(0).attr('required','required');
                    break;
                case '2':
                    $('#upgrade-condition').removeClass('hidden');
                    $('#upgrade-condition').addClass('show');
                    cond_checkbox.eq(0).attr('required','required');
                    numb_checkbox.eq(0).attr('required','required');
                    cond_checkbox = $('#upgrade-condition input[type=checkbox]');
                    $('#upgrade-condition .form-group').removeClass('has-error');
                    $('#upgrade-condition .form-group .help-block-error').html('');
                    $(this).parents(".form-group").removeClass('has-error');
                    $(this).parents(".form-group").find('.help-block-error').html('');
                    break;
            }
        })
    })
</script>
