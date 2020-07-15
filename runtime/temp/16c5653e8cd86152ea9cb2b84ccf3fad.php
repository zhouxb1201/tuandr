<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopApplyDetail.html";i:1583811694;}*/ ?>

<style>
    .col-md-5{padding-top: 7px;}
</style>




        <!-- page -->
        <form class="form-horizontal pt-15">
            <div class="screen-title"><span class="text">店铺信息</span></div>
            <div class="form-group">
                <label class="col-md-2 control-label">店铺名称</label>
                <div class="col-md-5"><?php echo $result['shop_name']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">店铺分类</label>
                <div class="col-md-5"><?php echo $result['shop_group_name']; ?></div>
            </div>
            <?php if(!$result['post_data']): ?>
            <div class="screen-title"><span class="text">企业或个人信息</span></div>
            <div class="form-group">
                <label class="col-md-2 control-label">申请类型</label>
                <div class="col-md-5">
                    <?php if($result['apply_type'] == 1): ?>个人<?php else: ?>企业<?php endif; ?>
                </div>
            </div>
            <?php if($result['apply_type'] == 2): ?>
            <div class="form-group J-company">
                <label class="col-md-2 control-label">公司名称</label>
                <div class="col-md-5"><?php echo $result['company_name']; ?></div>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="address" class="col-sm-2 control-label fw"><?php if($result['apply_type'] == 1): ?>联系地址<?php else: ?>公司所在地<?php endif; ?></label>
                <div class="col-sm-3">
                    <div class="area-form-group">
                        <select name="province" id="selProvinces"  class="form-control getProvince" disabled="disabled">
                            <option value="-1">请选择省...</option>
                        </select>
                        <select name="city" id="selCities"  class="form-control getSelCity" disabled="disabled">
                            <option value="-1">请选择市...</option>
                        </select>
                        <select name="district" id="selDistricts" class="form-control" disabled="disabled">
                            <option value="-1">请选择区...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?php if($result['apply_type'] == 1): ?>详细地址<?php else: ?>公司详细地址<?php endif; ?></label>
                <div class="col-md-5"><?php echo $result['company_address_detail']; ?></div>
            </div>
            <?php if($result['apply_type'] == 2): ?>
            <div class="form-group">
                <label class="col-md-2 control-label">公司类型</label>
                <div class="col-md-5">
                    <?php echo $result['company_type']; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">公司电话</label>
                <div class="col-md-5"><?php echo $result['company_phone']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">员工总数</label>
                <div class="col-md-5"><?php echo $result['company_employee_count']; ?>人</div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">注册资金（万元）</label>
                <div class="col-md-5"><?php echo $result['company_registered_capital']; ?>万元</div>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label class="col-md-2 control-label">联系人姓名</label>
                <div class="col-md-5"><?php echo $result['contacts_name']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">联系人电话</label>
                <div class="col-md-5"><?php echo $result['contacts_phone']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">电子邮箱</label>
                <div class="col-md-5"><?php echo $result['contacts_email']; ?></div>
            </div>
            <?php if($result['apply_type'] == 2): ?>
            <div class="screen-title"><span class="text">营业执照信息（副本）</span></div>
            <div class="form-group">
                <label class="col-md-2 control-label">营业执照号</label>
                <div class="col-md-5"><?php echo $result['business_licence_number']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">法定经营范围</label>
                <div class="col-md-5"><?php echo $result['business_sphere']; ?> </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">营业执照照片</label>
                <div class="col-md-5 picture-list" id='business_licence_number_electronic'>
                    <a href="javascript:void(0);" class="plus-box"><img src="<?php echo $result['business_licence_number_electronic']; ?>" style='margin:0px;'></a>
                </div>
            </div>
            <?php endif; ?>
            <div class="screen-title"><span class="text">身份证信息</span></div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?php if($result['apply_type'] == 1): ?>身份证号码<?php else: ?>法人身份证号码<?php endif; ?></label>
                <div class="col-md-5"><?php echo $result['contacts_card_no']; ?></div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?php if($result['apply_type'] == 1): ?>手持身份证照片<?php else: ?>法人手持身份证照片<?php endif; ?></label>
                <div class="col-md-5 picture-list" id='contacts_card_electronic_1'>
                    <a href="javascript:void(0);" class="plus-box"><img src="<?php echo $result['contacts_card_electronic_1']; ?>" style='margin:0px;'></a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?php if($result['apply_type'] == 1): ?>身份证正面<?php else: ?>法人身份证正面<?php endif; ?></label>
                <div class="col-md-5 picture-list" id='contacts_card_electronic_2'>
                    <a href="javascript:void(0);" class="plus-box"><img src="<?php echo $result['contacts_card_electronic_2']; ?>" style='margin:0px;'></a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"><?php if($result['apply_type'] == 1): ?>身份证反面<?php else: ?>法人身份证反面<?php endif; ?></label>
                <div class="col-md-5 picture-list" id='contacts_card_electronic_3'>
                    <a href="javascript:void(0);" class="plus-box"><img src="<?php echo $result['contacts_card_electronic_3']; ?>" style='margin:0px;'></a>
                </div>
            </div>
            <?php else: ?>
            <div class="screen-title"><span class="text">自定义表单</span></div>
            <div id="custom_list"></div>
            <?php echo $result['post_data']; endif; ?>
            <div class="form-group"></div>
            <?php if($result['apply_state'] == '1' || $result['apply_state'] == '-1'): ?>
            <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-8">
                    <a href="javascript:void(0);" class="btn btn-default J-verify">审核</a>
                    <!--<a href="javascript:void(0);" data-type="2" class="btn btn-default J-apply">拒绝</a>-->
                </div>
            </div>
            <?php endif; ?>
            <input type="hidden" id="pid" value="<?php echo $result['company_province_id']; ?>">
            <input type="hidden" id="cid" value="<?php echo $result['company_city_id']; ?>">
            <input type="hidden" id="aid" value="<?php echo $result['company_district_id']; ?>">
            <input type="hidden" value="<?php echo $result['apply_state']; ?>" id="apply_state"/>
            <input type="hidden" value="<?php echo $result['apply_id']; ?>" id="apply_id"/>
        </form>
        <!-- page end -->


<script>
    require(['util'], function (util) {
        var pid = 0, cid = 0, aid = 0;
        initProvince("#selProvinces");
        function initProvince(obj) {
            pid = $('#pid').val();
            $.ajax({
                type: "post",
                url: "<?php echo $getProvinceUrl; ?>",
                dataType: "json",
                success: function (data) {
                    if (data != null && data.length > 0) {
                        var str = "";
                        for (var i = 0; i < data.length; i++) {
                            if (pid == data[i].province_id) {
                                str += '<option selected value="' + data[i].province_id + '">' + data[i].province_name + '</option>';
                            } else {
                                str += '<option value="' + data[i].province_id + '">' + data[i].province_name + '</option>';
                            }
                        }
                        $(obj).append(str);
                    }
                }
            });
        }
        getProvince();
        function getProvince() {
            var id = $('#selProvinces').val();
            if (id == -1) {
                id = pid;
            }
            cid = $('#cid').val();
            $.ajax({
                type: "post",
                url: "<?php echo $getCityUrl; ?>",
                dataType: "json",
                data: {
                    "province_id": id
                },
                success: function (data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择市</option>";
                        for (var i = 0; i < data.length; i++) {
                            if (cid == data[i].city_id) {
                                str += '<option selected value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            } else {
                                str += '<option  value="' + data[i].city_id + '">' + data[i].city_name + '</option>';
                            }
                        }
                        $('#selCities').html(str);
                    }
                }
            });
        }
        getSelCity();
        function getSelCity() {
            var id = $('#selCities').val();
            aid = $('#aid').val();
            if (id == -1) {
                id = cid;
            }
            $.ajax({
                type: "post",
                url: "<?php echo $getDistrictUrl; ?>",
                dataType: "json",
                data: {
                    "city_id": id
                },
                success: function (data) {
                    if (data != null && data.length > 0) {
                        var str = "<option value='-1'>请选择区</option>";
                        for (var i = 0; i < data.length; i++) {
                            if (aid == data[i].district_id) {
                                str += '<option selected value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                            } else {
                                str += '<option value="' + data[i].district_id + '">' + data[i].district_name + '</option>';
                            }

                        }
                        $('#selDistricts').html(str);
                    }
                }
            });
        }
        //添加店铺
        $('.J-apply').on('click', function () {
            var apply_id = $("#apply_id").val();
            var type = $(this).data('type');
            if (type == '1') {
                type = 'agree';
            } else if (type == '2') {
                type = 'disagree';
            } else {
                return false;
            }
            $.ajax({
                type: "post",
                url: "<?php echo $ajax_shopVerifyUrl; ?>",
                data: {'apply_id': apply_id, 'type': type},
                async: true,
                success: function (data) {
                    if (data["code"] > 0) {
                        util.message(data["message"], 'success', 'ADDONS_MAINshopApplyList');
                    } else {
                        util.message(data["message"], 'danger');
                    }
                }
            });
        });
        //loadingInfo();
        function loadingInfo(){
            $.ajax({
                type : "post",
                url :  "<?php echo $getApplyDetailUrl; ?>",
                dataType : "json",
                data: {'apply_id' : $('#apply_id').val()},
                success : function(data) {
                    console.log(data);
                    var data1=data.custom_data;
                    console.log(data1)
                    for(var i in data1){
                        if(data1[i].tag=='select'){
                             data1[i].options = data1[i].options.split('\n');
                        };
                        if(data1[i].tag=='radio'){
                            data1[i].options = data1[i].options.split('\n');
                        };
                        if(data1[i].tag=='checkbox'){
                            data1[i].options = data1[i].options.split('\n');
                        };
                    }
                    // console.log(data1);

                    // $("#custom_list").html(tpl('tpl_custom_list', {data: data1, i: 0, j: 0}))
                    var html = template('test', {data1:data1});
                    document.getElementById('custom_list').innerHTML = html;
                    if($('input[id^="date"]')){ 
                        $('input[id^="date"]').each(function(){
                            var index=$(this).data('index');
                            dialog.layDate("#date"+index);
                        })
                        
                    }

                    if($('input[id^="RangeDate"]')){ 
                        $('input[id^="RangeDate"]').each(function(){
                            var index=$(this).data('index');
                            dialog.layDate("#RangeDate"+index,true);
                        })
                        
                    }
                    if($('div[id^="imgs"]')){
                        $('div[id^="imgs"]').each(function(){
                            var index=$(this).data('index');
                            imgUp.imgUpload("#imgs"+index);
                        })
                    }
                    
                    


                }
            });
        }
        $('body').on('click', '.J-verify', function () {
            var apply_id = $('#apply_id').val();
            util.confirm('审核店铺','url:<?php echo $shopApplyModalUrl; ?>'+'?id=' + apply_id , function () {
                var apply_state = this.$content.find("input[name='apply_state']:checked").val();
                var shop_audit = 0;
                var shop_platform_commission_rate = this.$content.find('#shop_platform_commission_rate').val();
                var margin = this.$content.find('#margin').val();
                var refuse_reason = this.$content.find('#refuse_reason').val();
                if(this.$content.find("#shop_audit").is(":checked")){
                    shop_audit = 1;
                }
                var type = 'agree';
                if(apply_state == '-1'){
                    type = 'disagree';
                }
                $.ajax({
                    type: "post",
                    url: "<?php echo $ajax_shopVerifyUrl; ?>",
                    data: {'apply_id': apply_id, 'type': type, 'shop_platform_commission_rate' :shop_platform_commission_rate,'shop_audit' :shop_audit,'margin' :margin, 'refuse_reason':refuse_reason},
                    async: true,
                    success: function (data) {
                        if (data["code"] > 0) {
                            util.message(data["message"], 'success',  "<?php echo __URL('ADDONS_MAINshopApplyList'); ?>");
                        } else {
                            util.message(data["message"], 'danger');
                        }
                    }
                });
            }, 'large')
        })
    });
</script>
