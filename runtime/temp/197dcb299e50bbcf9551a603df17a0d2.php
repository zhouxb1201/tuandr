<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/www/wwwroot/www.tuandr.com/addons/teambonus/template/platform/teamBonusProfile.html";i:1583811696;}*/ ?>


		<div class="flex-auto-center mb-20 bg-info text-center border-info">
			<div class="flex-1 padding-15">
				<h3 class="strong">队长总数</h3>
				<p id="agent_total"></p>
			</div>
			<div class="flex-1 padding-15">
				<h3 class="strong">今日新增队长</h3>
				<p id="agent_today"></p>
			</div>
			<div class="flex-1 padding-15">
				<h3 class="strong">队长分红</h3>
				<p id="total_bonus"></p>
			</div>
			<div class="flex-1 padding-15">
				<h3 class="strong">已发放分红</h3>
				<p id="grant_bonus"></p>
			</div>
		</div>
		<div class="h-500" id="situation"></div>
		<!-- page end -->



<script>
    require(['util'],function(util){
        getOrderCount();
        showCharts();
        //统计详情
        function getOrderCount(){
            $.ajax({
                type : "post",
                url : "<?php echo $teamBonusProfileUrl; ?>",
                async : true,
                data : {'website_id':<?php echo $website_id; ?>},
                success : function(data) {
                    $("#agent_total").text(data.agent_total);
                    $("#agent_today").text(data.agent_today);
                    $("#total_bonus").text(data.total_bonus);
                    $("#grant_bonus").text(data.grant_bonus);
                }
            })
        }
        //显示统计图
        function  showCharts(){
            //type 走势图类型  1 数量
            $.ajax({
                type : "post",
                url : "<?php echo $teamBonusOrderProfileUrl; ?>",
                async : true,
                data : {'website_id':<?php echo $website_id; ?>},
                success : function(datas) {
                    var data = eval(datas);
                    var orderOption = {
                        title: {
                            text: '近七日分红订单走势'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: data.ordertype
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        toolbox: {
                            feature: {
                                saveAsImage: {}
                            }
                        },
                        xAxis: {
                            type: 'category',
                            boundaryGap: false,
                            data:  data.day
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: data.all
                    };
                    util.chart('situation',orderOption)
                }
            });
        }





    })
</script>

