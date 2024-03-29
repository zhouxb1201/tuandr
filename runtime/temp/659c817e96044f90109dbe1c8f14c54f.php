<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"template/platform/Addons/increment.html";i:1591330103;}*/ ?>
<div class="applicationAdd">
    <div class="moreShops clearfix">
        <div class="moreShops_img"><img src="<?php echo __IMG($module_info['logo']); ?>" alt=""></div>
        <?php if($type==1): ?>
        <div class="moreShops_copy">
            <h4 class="moreShops_copy_title"><?php echo $module_info['title']; ?></h4>
            <p><?php echo $module_info['description']; ?></p>
            <p>原价：<del>￥<span id="price"><?php if($cycle_price[0]['market_price']): ?> <?php echo $cycle_price[0]['market_price']; else: ?> 0 <?php endif; ?></span></del></p>
            <p>现价：<span id="market_price" class="market_price">￥<?php echo $cycle_price[0]['price']; ?></span></p>
            <p>周期：
                <?php if(is_array($cycle_price) || $cycle_price instanceof \think\Collection || $cycle_price instanceof \think\Paginator): if( count($cycle_price)==0 ) : echo "" ;else: foreach($cycle_price as $k=>$ic): if($ic['cycle'] == 1): ?>
                <a href="javascript:;" class="cycleItem" data-id="1" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>"> 一个月</a>
                <?php endif; if($ic['cycle'] == 2): ?>
                <a href="javascript:;" class="cycleItem" data-id="2" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">三个月</a>
                <?php endif; if($ic['cycle'] == 3): ?>
                <a href="javascript:;" class="cycleItem" data-id="3" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">半年</a>
                <?php endif; if($ic['cycle'] == 4): ?>
                <a href="javascript:;" class="cycleItem" data-id="4" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">一年</a>
                <?php endif; if($ic['cycle'] == 5): ?>
                <a href="javascript:;" class="cycleItem" data-id="5" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">两年</a>
                <?php endif; if($ic['cycle'] == 6): ?>
                <a href="javascript:;" class="cycleItem" data-id="6" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">三年</a>
                <?php endif; if($ic['cycle'] == 7): ?>
                <a href="javascript:;" class="cycleItem" data-id="7" data-price="<?php echo $ic['price']; ?>" data-market_price="<?php echo $ic['market_price']; ?>">四年</a>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </p>
            <?php if($module_info['is_value_add']==1): ?>
            <p><a href="javascript:;" class="btn btn-primary order_now" data-id="<?php echo $module_info['id']; ?>">立即订购</a></p>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="moreShops_copy">
            <h4 class="moreShops_copy_title"><?php echo $module_info['title']; ?></h4>
            <p><?php echo $module_info['description']; ?></p>
        </div>
        <?php endif; ?>
    </div>
    <div class="applicationDetail">
        <div class="ad_title clearfix">
            <div class="ad_title_word">应用详情</div>
            <div class="ad_title_tip">服务专线：400-889-6625，服务时间：10:00-18:00</div>
        </div>
        <div class="ad_content content">
           <?php echo $module_info['content']; ?>
        </div>
    </div>
</div>
<input type="hidden" id="order_time">
<script>
require(['util'],function(util){

    $('body').on('click','.cycleItem',function(){
        $(this).addClass('sel');
        $(this).siblings().removeClass('sel');
        var time = $(this).data('id');
        var price = $(this).data('price');
        var market_price = $(this).data('market_price');
        $('#order_time').val(time);
        $('#price').html(market_price);
        $('#market_price').html(price);
    });
    $('.order_now').on('click',function(){
        if($('#order_time').val()==''){
            util.message('请选择周期','danger');
            return false;
        }else {
            var addons_id = $(this).data('id');
            var time = $('#order_time').val();
            location.href =  __URL(PLATFORMMAIN + '/Addonslist/orderNow&addons_id='+addons_id+'&time='+time);
        }
    })
})

</script>