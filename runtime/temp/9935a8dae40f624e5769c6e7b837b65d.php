<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"template/platform/Shop/minSubMessageDialog.html";i:1583811746;}*/ ?>
<div class="links-dialog">

    <ul class="nav nav-tabs v-nav-tabs pt-15" role="tablist">
        <li role="presentation" class="active"><a href="#keyWord" aria-controls="mall" role="tab" data-toggle="tab" class="flex-auto-center">商城页面</a></li>
    </ul>
    <div class="tab-content min-h-200">
        <div role="tabpanel" class="tab-pane fade in active" id="keyWord">
            <div class="" id="custom">
                <?php if(is_array($config) || $config instanceof \think\Collection || $config instanceof \think\Paginator): $j = 0; $__LIST__ = $config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($j % 2 );++$j;?>
                <div class="linkDialog-title">
                    <?php switch($j): case "1": ?>付款成功<?php break; case "2": ?>订单关闭<?php break; case "3": ?>余额变动<?php break; case "4": ?>售后情况<?php break; default: ?>其他
                    <?php endswitch; ?>
                </div>
                    <?php foreach($vo as $v): ?>
                    <a href="javascript:void(0);" class="btn btn-default selectedKeyWord" data-key="" data-id="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a>
                    <?php endforeach; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

    <input type="hidden" id="selectedData2">
</div>

<script>
    $(function(){
        // 选中页面
        $('.links-dialog').on('click','.selectedKeyWord',function(){
            var id = $(this).data("id");
            var key = $(this).html();
            var selecteddata = {
                id: id,
                key: key
            };
            $('#selectedData2').data('params',selecteddata);
        });
    })

</script>
