<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:37:"template/platform/System/movePic.html";i:1583811744;}*/ ?>
<form class="form-horizontal padding-15" id="">
    <div class="form-group">
        <label class="col-md-3 control-label">
        相册名称
        </label>
        <div class="col-md-8">
            <select class="form-control" name="album_list" id="album_list">
                <?php if(is_array($album) || $album instanceof \think\Collection || $album instanceof \think\Paginator): $i = 0; $__LIST__ = $album;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['album_id']; ?>"><?php echo $v['album_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
</form>