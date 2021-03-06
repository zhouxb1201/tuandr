<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/www.tuandr.com/addons/shop/template/platform/shopProtocol.html";i:1583811694;}*/ ?>





        <!-- page -->
        <ul class="nav nav-tabs v-nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#direction" aria-controls="direction" role="tab" data-toggle="tab" class="flex-auto-center">招商方向</a></li>
            <li role="presentation"><a href="#standard" aria-controls="standard" role="tab" data-toggle="tab" class="flex-auto-center">招商标准</a></li>
            <li role="presentation"><a href="#demand" aria-controls="demand" role="tab" data-toggle="tab" class="flex-auto-center">资质要求</a></li>
            <li role="presentation"><a href="#cost" aria-controls="cost" role="tab" data-toggle="tab" class="flex-auto-center">资费标准</a></li>
            <li role="presentation"><a href="#join" aria-controls="join" role="tab" data-toggle="tab" class="flex-auto-center">入驻协议</a></li>
        </ul>

        <form class="form-horizontal pt-15 form-validate widthFixedForm">
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane fade in active" id="direction" >
                    <input type='hidden' name='key[]' value="DIRECTION">
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议标题</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control J-title" name='title' value="<?php echo $shopProtocol['direction']['title']; ?>" title="协议标题不能为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议内容</label>
                        <div class="col-md-9">
                            <div id="UE-direction" data-content='<?php echo $shopProtocol["direction"]["content"]; ?>'></div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="standard" >
                    <input type='hidden' name='key[]' value="STANDARD">
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议标题</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control J-title"  name='title_0' value="<?php echo $shopProtocol['standard']['title']; ?>"  title="协议标题不能为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议内容</label>
                        <div class="col-md-9">
                            <div id="UE-standard" data-content='<?php echo $shopProtocol["standard"]["content"]; ?>'></div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="demand" >
                    <input type='hidden' name='key[]' value="DEMAND">
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议标题</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control J-title"  name='title_1' value="<?php echo $shopProtocol['demand']['title']; ?>"  title="协议标题不能为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议内容</label>
                        <div class="col-md-9">
                            <div id="UE-demand" data-content='<?php echo $shopProtocol["demand"]["content"]; ?>'></div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="cost" >
                    <input type='hidden' name='key[]' value="COST">
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议标题</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control J-title"  name='title_2' value="<?php echo $shopProtocol['cost']['title']; ?>"  title="协议标题不能为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议内容</label>
                        <div class="col-md-9">
                            <div id="UE-cost" data-content='<?php echo $shopProtocol["cost"]["content"]; ?>'></div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="join" >
                    <input type='hidden' name='key[]' value="JOIN">
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议标题</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control J-title"  name='title_3' value="<?php echo $shopProtocol['join']['title']; ?>"  title="协议标题不能为空">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">协议内容</label>
                        <div class="col-md-9">
                            <div id="UE-join" data-content='<?php echo $shopProtocol["join"]["content"]; ?>'></div>
                        </div>
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
            </div>
        </form>
        <!-- page end -->


<script>
require(['util'],function(util){
      //店铺协议
      util.validate($('.form-validate'), function (form) {
            var title = [],key=[],content=[];
            $(".J-title").each(function () {
                var t = $(this).val();
                title.push(t);
            });
            $("input[name='key[]']").each(function () {
                var k = $(this).val();
                key.push(k);
            });
            $("div[id^='UE-']").each(function(){
                var c = $(this).data('content');
                content.push(c);
            });

            $.ajax({
                    type : "post",
                    url : "<?php echo $setShopProtocolUrl; ?>",
                    data : {
                            'title' : title,
                            'key' : key,
                            'content' : content,
                            'website_id' : '<?php echo $website_id; ?>'
                    },
                    async : true,
                    success : function(data) {
                        if (data["code"] > 0) {
                            util.message('添加成功','success',"<?php echo __URL('ADDONS_MAINshopProtocol'); ?>");
                        } else {
                            util.message(data["message"],'danger');
                        }
                    }
            });
      });
});
</script>
