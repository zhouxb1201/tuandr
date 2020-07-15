<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.tuandr.com/addons/distribution/template/platform/distributorInfo.html";i:1586931646;}*/ ?>

			<!-- page -->
			<div class="screen-title">
				<span class="text">基本信息</span>
			</div>
			<div class="row panel-detail">
				<div class="col-md-6">
					<div class="item h-auto">
						<div class="media">
							<div class="media-left">
								<img src="<?php if($info['user_headimg']): ?><?php echo __IMG($info['user_headimg']); else: ?>/public/static/images/headimg.png<?php endif; ?>" width="160px" height="160px" >
							</div>
							<input type="hidden" id="uid" value="<?php echo $info['uid']; ?>">
							<div class="media-body">
								<p class="p"><span class="text-label">ID：</span><?php echo $info['uid']; ?></p>
								<p class="p"><span class="text-label">昵称：</span><?php echo $info['member_name']; ?></p>
								<p class="p"><span class="text-label">手机号码：</span><?php echo $info['mobile']; ?></p>
								<div class="p" style="min-width: 250px">
									<span class="text-label">分销等级：</span>
									<select id="level" class="form-control select-form-control inline-block">
										<?php if(is_array($distributor_level) || $distributor_level instanceof \think\Collection || $distributor_level instanceof \think\Paginator): if( count($distributor_level)==0 ) : echo "" ;else: foreach($distributor_level as $key=>$value): ?>
										<option value="<?php echo $value['id']; ?>" <?php if($info['distributor_level_id']==$value['id']): ?>selected<?php endif; ?>><?php echo $value['level_name']; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
								<div class="p">
									<span class="text-label">当前状态：</span>
									<select name="status" id="status" class="form-control select-form-control inline-block">
										<option value="2" <?php if($info['isdistributor']==2): ?>selected<?php endif; ?>>已审核</option>
										<option value="1" <?php if($info['isdistributor']==1): ?>selected<?php endif; ?>>待审核</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="item h-auto">
						<div class="media-body">
							<p class="p">推荐人：<?php if($info['referee_name']): ?><?php echo $info['referee_name']; else: ?>总店<?php endif; ?> </p>
							<p class="p">推广订单：<?php if($info['extensionordercount']): ?><?php echo $info['extensionordercount']; else: ?>0<?php endif; ?> </p>
							<p class="p">推广订单金额：<?php if($info['extensionmoney']): ?><?php echo $info['extensionmoney']; else: ?>0.00<?php endif; ?></p>
							<p class="p">佣金总额：<?php if($info['commission']): ?><?php echo $info['commission']; else: ?>0.00<?php endif; ?></p>
							<p class="p">已提佣金：<?php if($info['withdrawals']): ?><?php echo $info['withdrawals']; else: ?>0.00<?php endif; ?></p>
							<p class="p">申请时间：<?php echo $info['apply_distributor_time']; ?></p>
							<p class="p">成为分销商时间：<?php echo $info['become_distributor_time']; ?></p>
						</div>
					</div>
				</div>
            </div>
            <!-- 
			<?php if($agent_info): ?>
			<div class="screen-title">
				<span class="text">设置代理商</span>
			</div>
				<?php if($agent_info['global']): ?>
				<div class="form-horizontal form-validate widthFixedForm">
					<div class="form-group">
						<label class="control-label col-md-2">全球代理等级</label>
                        <div class="col-md-8">
                            <select name="" class="form-control" id="global_agent">
                                <option value="-1" <?php if($info['is_global_agent']!=2): ?>selected<?php endif; ?> >不是全球代理商</option>
                                <?php if(is_array($agent_info['global']) || $agent_info['global'] instanceof \think\Collection || $agent_info['global'] instanceof \think\Paginator): if( count($agent_info['global'])==0 ) : echo "" ;else: foreach($agent_info['global'] as $key=>$value): ?>
                                <option value="<?php echo $value['id']; ?>" <?php if($info['global_agent_level_id']==$value['id'] && $info['is_global_agent']==2): ?>selected<?php endif; ?>><?php echo $value['level_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>

					</div>
				</div>
				<?php endif; if($agent_info['team']): ?>
				<div class="form-horizontal form-validate widthFixedForm">
					<div class="form-group">
						<label class="control-label col-md-2">团队代理等级</label>
                        <div class="col-md-8">
                            <select name="" class="form-control" id="team_agent">
                                <option value="-1" <?php if($info['is_team_agent']!=2): ?>selected<?php endif; ?> >不是团队代理商</option>
                                <?php if(is_array($agent_info['team']) || $agent_info['team'] instanceof \think\Collection || $agent_info['team'] instanceof \think\Paginator): if( count($agent_info['team'])==0 ) : echo "" ;else: foreach($agent_info['team'] as $key=>$value): ?>
                                <option value="<?php echo $value['id']; ?>" <?php if($info['team_agent_level_id']==$value['id'] && $info['is_team_agent']==2): ?>selected<?php endif; ?>><?php echo $value['level_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>

					</div>
				</div>
				<?php endif; if($agent_info['area']): ?>
				<div class="form-horizontal form-validate widthFixedForm">
					<div class="form-group">
						<label class="control-label col-md-2">区域代理等级</label>
                        <div class="col-md-8">
                            <select name="" class="form-control" id="area_agent">
                            <option value="-1" <?php if($info['is_area_agent']!=2): ?>selected<?php endif; ?> >不是区域代理商</option>
                            <?php if(is_array($agent_info['area']) || $agent_info['area'] instanceof \think\Collection || $agent_info['area'] instanceof \think\Paginator): if( count($agent_info['area'])==0 ) : echo "" ;else: foreach($agent_info['area'] as $key=>$value): ?>
                            <option value="<?php echo $value['id']; ?>" <?php if($info['area_agent_level_id']==$value['id'] && $info['is_area_agent']==2): ?>selected<?php endif; ?>><?php echo $value['level_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>

					</div>
				</div>
				<div class="area_agent_status" <?php if($info['is_area_agent']!=2): ?> style="display: none"<?php endif; ?> >
					<div class="form-horizontal form-validate widthFixedForm">
						<div class="form-group">
							<label class="control-label col-md-2">代理区域</label>
                            <div class="col-md-8">
                                <select name="" class="form-control" id="area_type">
									<option value="3" <?php if($info['area_type']==3): ?>selected<?php endif; ?>>区级代理</option>
									<option value="2" <?php if($info['area_type']==2): ?>selected<?php endif; ?>>市级代理</option>
                                    <option value="1" <?php if($info['area_type']==1): ?>selected<?php endif; ?>>省级代理</option>
                                </select>
                            </div>

						</div>

					</div>
					<div class="form-horizontal form-validate widthFixedForm">
					<div class="form-group">
							<label class="control-label col-md-2">代理地区</label>
							<div class="area-form-group col-md-8">
								<select name="province" id="selProvinces"  class="form-control getProvince">
									<option value="-1">请选择省...</option>
								</select>
								<span class="selCities">
								<select name="city" id="selCities"  class="form-control getSelCity">
									<option value="-1">请选择市...</option>
								</select>
								</span>
								<span class="selDistricts">
								<select name="district" id="selDistricts" class="form-control">
									<option value="-1">请选择区...</option>
								</select>
								</span>
							</div>
						</div>
				</div>

				</div>
				<?php endif; endif; ?>
                -->
				<div class="form-horizontal form-validate widthFixedForm">
					<div class="form-group">
						<label class="control-label col-md-2"></label>
                        <div class="col-md-8">
                            <a href="javascript:; " class="btn btn-primary add">保存</a>
                        </div>
						
					</div>
				</div>


			<input type="hidden" id="pid">
			<input type="hidden" id="cid">
			<input type="hidden" id="aid">
<input type="hidden" id="areatype" value="<?php echo $info['area_type']; ?>">
			<!-- page end -->


<script>
    require(['util'],function(util){
        $("#area_agent").on('change', function (){
            if($("#area_agent").val()==-1){
                 $('.area_agent_status').hide();
			}else{
                $('.area_agent_status').show();
			}
		})
        $('#area_type').on('change', function () {
			var id = $('#area_type').val();
			if(id==1){
				$(".selCities").hide();
				$(".selDistricts").hide();
			}
			if(id==2){
				$(".selCities").show();
				$(".selDistricts").hide();
			}
			if(id==3){
				$(".selCities").show();
				$(".selDistricts").show();
			}
        })
        var agent_area = "<?php echo $info['agent_area_id']; ?>";
        agent_area_id = agent_area.split(',');
        $areatype = $("#areatype").val();
        if($areatype){
            if($areatype ==1){
                $('#pid').val(agent_area_id[0]);
                $(".selCities").hide();
                $(".selDistricts").hide();
            }
            if($areatype ==2){
                $('#pid').val(agent_area_id[0]);
                $('#cid').val(agent_area_id[1]);
                $(".selCities").show();
                $(".selDistricts").hide();
            }
            if($areatype ==3){
                $('#pid').val(agent_area_id[0]);
                $('#cid').val(agent_area_id[1]);
                $('#aid').val(agent_area_id[2]);
                $(".selCities").show();
                $(".selDistricts").show();
            }
		}
        initProvince("#selProvinces");
        function initProvince(obj){
            pid = $('#pid').val();
            $.ajax({
                type : "post",
                url : "<?php echo $getProvinceUrl; ?>",
                dataType : "json",
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            if(pid == data[i].province_id){
                                str += '<option selected value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].province_id+'">'+data[i].province_name+'</option>';
                            }
                        }
                        $(obj).append(str);
                    }
                }
            });
        }
        getProvince();
        //选择省份弹出市区
        $('.getProvince').on('change', function () {
            var id = $('#selProvinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo $getCityUrl; ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#selCities').html(str);
                    }
                }
            });
        })
        function getProvince() {
            var id = $('#selProvinces').val();
            if(id==-1){
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type : "post",
                url :"<?php echo $getCityUrl; ?>",
                dataType : "json",
                data : {
                    "province_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }else{
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#selCities').html(str);
                    }
                }
            });
        };
        getSelCity();
        //选择市区弹出区域
        $('.getSelCity').on('change', function () {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo $getDistrictUrl; ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#selDistricts').html(str);
                    }
                }
            });
        })
        function getSelCity() {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if(id==-1){
                id = cid;
            }
            $.ajax({
                type : "post",
                url : "<?php echo $getDistrictUrl; ?>",
                dataType : "json",
                data : {
                    "city_id" : id
                },
                success : function(data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if(aid==data[i].district_id){
                                str += '<option selected value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }else{
                                str += '<option value="'+data[i].district_id+'">'+data[i].district_name+'</option>';
                            }

                        }
                        $('#selDistricts').html(str);
                    }
                }
            });
        }
        $('.add').click(function (e) {
            var real_name = $("#real_name").val();
            var status = $("#status").val();
            var level = $("#level").val();
            var uid = $("#uid").val();
            var team_agent = $("#team_agent").val();
            var area_agent = $("#area_agent").val();
            var global_agent = $("#global_agent").val();
            var area_type = $("#area_type").val();
            var selProvinces = $("#selProvinces").val();
            var selCities = $("#selCities").val();
            var selDistricts = $("#selDistricts").val();
            $.ajax({
                type: "post",
                url : "<?php echo $updateDistributorInfoUrl; ?>",
                data : {
                    "uid":uid,"status":status,"real_name":real_name,"level":level, "team_agent" : team_agent, "area_agent" : area_agent,"global_agent":global_agent,"area_id":area_type,"province_id":selProvinces,"city_id":selCities,"district_id":selDistricts
                },
                async: true,
                success: function (data) {
                    if (data['code'] > 0) {
                        util.message(data["message"], 'success', "<?php echo __URL('ADDONS_MAINdistributorInfo'); ?>&distributor_id="+uid);
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });

        })
    })
</script>

