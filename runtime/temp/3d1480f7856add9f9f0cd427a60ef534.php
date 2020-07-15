<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/platform/miniProgramCustom.html";i:1583811700;s:86:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/common/customEditTemplate.html";i:1586931646;s:86:"/www/wwwroot/www.tuandr.com/addons/miniprogram/template/common/customViewTemplate.html";i:1586931646;}*/ ?>

<link rel="stylesheet" href="PLATFORM_STATIC/css/wap_iconfont.css">
<!-- page -->
<div class="custom-header">
    <div class="custom-header-box">
        <div class="custom-header-list flex">
            <div class="v-logo-padding"><a class="v-logo-img" href="javascript:void(0);" title=""><img src="/public/platform/images/logo2.png" style="height: 27px;max-width: 400px;"></a></div>
            <div class="custom-header-list-warp flex-center-justify">
                <i class="icon icon-menu1"></i>
                <span class="name"><?php echo $template_name; ?></span>
                <i class="icon icon-down-arrow"></i>
            </div>
            <div class="custom-header-list-box">
                <div class="box-head flex-center-justify">
                    <span>我的全部页面</span>
                    <div class="">
<!--                        todo.... 修改-->
                        <a href="javascript:void(0);" class="btn btn-default btn-sm addPage">新建页面</a>
                        <a href="<?php echo __URL('ADDONS_MAINminiProgramCustomList'); ?>" class="btn btn-default btn-sm">管理页面</a>
                    </div>
                </div>
                <div class="box-main">
                    <div class="box-main-left">
                        <div class="title">基础页</div>
                        <ul class="list">
                            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): if( count($template_list)==0 ) : echo "" ;else: foreach($template_list as $key=>$list): if(in_array($list['type'],[1,2,3,4,5])): ?>
                            <li class="item"><a href="<?php echo __URL('ADDONS_MAINminiProgramCustom&id='.$list['id']); ?>"><?php echo $list['template_name']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="box-main-right bg-f9">
                        <div class="title">自定义页</div>
                        <ul class="list">
                            <?php if(is_array($template_list) || $template_list instanceof \think\Collection || $template_list instanceof \think\Paginator): if( count($template_list)==0 ) : echo "" ;else: foreach($template_list as $key=>$list): if(in_array($list['type'],[6])): ?>
                            <li class="item"><a href="<?php echo __URL('ADDONS_MAINminiProgramCustom&id='.$list['id']); ?>"><?php echo $list['template_name']; ?></a></li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-header-operate">
            <!--<button class="btn btn-save btn-success" data-type="preview">预览</button>-->
            <button class="btn btn-save btn-info" data-type="recovery">还原</button>
        </div>
    </div>
</div>
<div class="custom-sidebar">
    <div class="custom-sidebar-title">组件</div>
    <div class="custom-component-list" id="navs"></div>
</div>
<div class="custom-container flex flex-pack-center">
    <div class="custom-view">
        <!--<div class="view-title" id="page">Loading...</div>-->
        <div class="view-title1"></div>
        <div id="page" class="navbarbackground">Loading...</div>
        <div class="view-main" id="view"></div>
        <div class="view-foot" id="foot">
            <div class="drag fixed nodelete" data-itemid="copyright" id="copyright"></div>
            <div class="drag fixed nodelete" data-itemid="tabbar" id="tabbar"></div>
        </div>
    </div>
    <div class="custom-editor">
        <div class="editor-main" id="editor">
            <div class="editor-arrow"></div>
            <div class="editor-inner"></div>
        </div>
        <div class="editor-foot flex flex-pack-center">
            <button class="btn btn-save btn-primary" data-type="save">保存</button>
        </div>
    </div>
</div>
<!-- page end -->


<!-- 编辑 -->
<script type="text/html" id="tpl_navs">
    <%each initnav as nav %>
    <div class="item" data-id="<%nav.id%>">
        <div class="drag <%if nav.type==type%>special<%/if%> remove" data-id="<%nav.id%>">
            <div class="img">
                <img src="/public/platform/images/custom/nav-icon/custom-<%nav.id%>.png">
            </div>
            <div class="text"><%nav.name%></div>
        </div>
    </div>
    <%/each%>
</script>
<script type="text/html" id="edit-del">
    <div class="btn-edit-del">
        <div class="btn-del">删除</div>
    </div>
</script>
<!--页面信息设置-->
<script type="text/html" id="tpl_edit_page">
    <div class="form-editor-title">页面信息设置</div>
    <div class="alert alert-info alert-sm" role="alert">首次装修小程序需要“保存”后“发布”提交到微信平台审核，审核通过后更改页面数据点击“保存”即可无需重新发布。</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">页面标题</div>
        <div class="col-sm-10">
            <% if page.readonly %>
            <input class="form-control input-sm diy-bind" data-bind="title" data-placeholder="请输入标题" placeholder="请输入标题" readonly value="<%page.title%>" />
            <%else%>
            <input class="form-control input-sm diy-bind" data-bind="title" data-placeholder="请输入标题" placeholder="请输入标题" value="<%page.title%>" />
            <%/if%>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind="background" value="<%page.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">状态栏颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind="navbarbackground" value="<%page.navbarbackground%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#000000">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <%if page.navbarcolor %>
                <input type="text" class="colorpicker2 diy-bind" data-bind="navbarcolor" value="<%page.navbarcolor%>" type="color">
                <%else%>
                <input type="text" class="colorpicker2 diy-bind" data-bind="navbarcolor" value="#ffffff" type="color">
                <%/if%>
                
                <span class="btn btn-default btn-sm btn-reset1" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_tabbar">
    <div class="form-editor-title">底部导航设置</div>
    <div class="alert alert-info alert-sm" role="alert">左边图片为默认，右边图片为选中（建议大小80x80）</div>
    <div class="form-items indent" data-min="1" data-max="5">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square" data-toggle="selectImgFooter" data-input="#normal-<%itemid%>" data-img="#normal-<%itemid%>">
                    <div class="text singlePicture"  data-input="#normal-<%itemid%>" data-img="#normal-<%itemid%>">默认</div>
                    <img src="<%child.normal%>" class="changePath" id="normal-<%itemid%>">
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="normal" id="normal-<%itemid%>" value="<%child.normal%>">
                </div>
                <div class="item-image square" data-toggle="selectImgFooter" data-input="#active-<%itemid%>" data-img="#active-<%itemid%>">
                    <div class="text singlePicture"  data-input="#active-<%itemid%>" data-img="#active-<%itemid%>">选中</div>
                    <img src="<%child.active%>" class="changePath" id="active-<%itemid%>">
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="active" id="active-<%itemid%>" value="<%child.active%>">
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text">
                    </div>
                    <div class="input-group">
                        <input type="text" disabled class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="path" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.path%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_copyright">
    <div class="form-editor-title">版权设置</div>
    <%if params.readonly == '1'%>
    <div class="alert alert-info alert-sm" role="alert">默认版本不支持修改相关参数</div>
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">版权信息</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input <%if params.readonly == '1'%>disabled<%/if%> type="radio" name="is_show" value="1" class="diy-bind" data-bind-child="params" data-bind="is_show" data-bind-init="true" <%if params.is_show=='1'||!params.is_show%>checked="checked"<%/if%>> 显示</label>
            <label class="radio-inline"><input <%if params.readonly == '1'%>disabled<%/if%> type="radio" name="is_show" value="0" class="diy-bind" data-bind-child="params" data-bind="is_show" data-bind-init="true" <%if params.is_show=='0'%>checked="checked"<%/if%>> 隐藏</label>
        </div>
    </div>
    <%if params.is_show != '0'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">版权内容</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="text" data-placeholder="" placeholder="请填写版权内容" value="<%params.text%>" <%if params.readonly == '1'%>disabled<%/if%>/>
            <div class="help-block">版权内容建议40个字符以内</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">跳转链接</div>
        <div class="col-sm-10">
            <div class="input-group">
                <input type="text" class="form-control input-sm diy-bind" <%if params.readonly == '1'%>disabled<%/if%> data-bind-child="params" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址(可不填)" value="<%params.linkurl%>" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-disabled="<%if params.readonly == '1'%>disabled<%/if%>"  data-input="#curl-<%itemid%>">选择链接</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">启用LOGO</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showlogo" value="1" class="diy-bind" data-bind-child="params" data-bind="showlogo" data-bind-init="true" <%if params.showlogo=='1'||!params.showlogo%>checked="checked"<%/if%> <%if params.readonly == '1'%>disabled<%/if%>> 是</label>
            <label class="radio-inline"><input type="radio" name="showlogo" value="0" class="diy-bind" data-bind-child="params" data-bind="showlogo" data-bind-init="true" <%if params.showlogo=='0'||!params.showlogo%>checked="checked"<%/if%> <%if params.readonly == '1'%>disabled<%/if%>> 否</label>
        </div>
    </div>
    <%if params.showlogo=='1' %>
    <div class="form-group">
        <div class="col-sm-2 control-label">选择样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="0" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='0'||!style.showtype%>checked="checked"<%/if%> <%if params.readonly == '1'%>disabled<%/if%>> 样式一</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='1'||!style.showtype%>checked="checked"<%/if%> <%if params.readonly == '1'%>disabled<%/if%>> 样式二</label>
        </div>
    </div>
    <div class="form-items">
        <div class="inner" id="form-items">
            <div class="item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%params.src%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" class="changePath" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm changePath diy-bind" data-bind-child="params" data-bind="src" id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%params.src%>" <%if params.readonly == '1'%>disabled<%/if%>/>
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-disabled="<%if params.readonly == '1'%>disabled<%/if%>" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <%/if%>  
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_search">
    <div class="form-editor-title">搜索框设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
        <!-- <div class="col-sm-2 control-label">输入框背景</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="inputbackground" value="<%style.inputbackground%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div> -->
    </div>

    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#999999">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#b4b4b4">重置</span>
            </div>
        </div>
    </div> -->

    <div class="form-group">
        <div class="col-sm-2 control-label">提示文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="placeholder" data-placeholder="" placeholder="请输入提示文字(不填则不显示，最长20字)" value="<%params.placeholder%>" maxlength="20" />
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">文字对齐</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div> -->
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_banner">
    <div class="form-editor-title">图片轮播设置</div>
    <div class="alert alert-info alert-sm" role="alert">宽度建议750px，高度自适应。图片建议保证高度一致。</div>
    <div class="form-items" data-min="1" data-max="8">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>"  class="changePath" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm changePath diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_menu">
    <div class="form-editor-title">按钮组设置</div>
    <div class="alert alert-info alert-sm" role="alert">图标尺寸建议100 * 100</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rownum" value="3" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='3'%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="4" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='4'%>checked="checked"<%/if%>> 4个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="5" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='5'%>checked="checked"<%/if%>> 5个</label>
        </div>
    </div>

    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</div>
                    <img src="<%child.imgurl%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" class="changePath" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10 colorpicker-input-group">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" placeholder="请选择图片或输入图片地址" value="<%child.text%>" style="width: 55%" />
                        <input class="colorpicker input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="color" value="<%child.color%>" type="color" />
                        <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
                    </div>
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_notice">
    <div class="form-editor-title">公告设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#fff7cc">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f60">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">公告内容</div>
        <div class="col-sm-10">
            <textarea class="form-control input-sm diy-bind" rows="3"  data-bind-child="params" data-bind="text" id="curl-<%itemid%>" placeholder="输入公告内容"><%params.text%></textarea>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_picture">
    <div class="form-editor-title">单图设置</div>
    <div class="alert alert-info alert-sm" role="alert">宽度建议750px，高度自适应</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items indent" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" id="pimg-<%itemid%>" class="changePath" />
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_title">
    <div class="form-editor-title">标题栏设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
        </div>
    </div>
    <!-- <div class="form-group">
        <div class="col-sm-2 control-label">标题链接</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="link" data-placeholder="" placeholder="" value="<%params.link%>" id="titlelink"/>
                <span data-input="#titlelink" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
            </div>
        </div>
    </div> -->
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control colorpicker diy-bind" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">对齐方向</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字大小</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.fontsize%>" data-min="9" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.fontsize%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="fontsize" value="<%style.fontsize%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_line">
    <div class="form-editor-title">辅助线设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">线条颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#333333">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="linestyle" value="solid" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='solid'%>checked="checked"<%/if%> > 实线</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dashed" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dashed'%>checked="checked"<%/if%>> 虚线(长方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dotted" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dotted'%>checked="checked"<%/if%>> 虚线(正方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="double" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='double'%>checked="checked"<%/if%>> 双实线</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条高度</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="20"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_blank">
    <div class="form-editor-title">辅助线设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">元素高度</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="200"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_picturew">
    <div class="form-editor-title">图片橱窗设置</div>
    <div class="alert alert-info alert-sm" role="alert">建议图片尺寸图一400*400，图二400*200，图三、四200*200</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="form-control input-sm diy-bind colorpicker" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">布局方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="row" value="1" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='1'%>checked="checked"<%/if%>> 橱窗样式</label>
            <label class="radio-inline"><input type="radio" name="row" value="2" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='2'%>checked="checked"<%/if%>> 堆积两列</label>
            <label class="radio-inline"><input type="radio" name="row" value="3" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='3'%>checked="checked"<%/if%>> 堆积三列</label>
            <label class="radio-inline"><input type="radio" name="row" value="4" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='4'%>checked="checked"<%/if%>> 堆积四列</label>
            <%if params.row==1%>
            <div class="help-block">单组最多显示四个，超出隐藏</div>
            <%/if%>
            <%if params.row>1%>
            <div class="help-block">图片大小不限制，但请确保所有图片的尺寸/比例相同。</div>
            <%/if%>
        </div>
    </div>

    <div class="form-items indent" data-min="2" data-max="20">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%child.imgurl%>" onerror="this.src='/public/platform/images/custom/nopic.jpg';" id="pimg-<%itemid%>" class="changePath"/>
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control input-sm diy-bind changePath" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default singlePicture" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="addChild"><i class="icon icon-add1"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_goods">
    <div class="form-editor-title">商品组设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">展示方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='1'%>checked="checked"<%/if%>> 一行一个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="2" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if !params.showtype||params.showtype=='2'%>checked="checked"<%/if%>> 一行两个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="3" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='3'%>checked="checked"<%/if%>> 一行三个</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">商品范围</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 自营商品</label>
            <%if shoptype != 2%>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='1'||!params.goodstype%>checked="checked"<%/if%>> 全平台商品</label>
            <%/if%>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="recommendtype" value="0" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='0'||!params.recommendtype%>checked="checked"<%/if%>> 自动推荐</label>
            <label class="radio-inline"><input type="radio" name="recommendtype" value="1" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='1'||!params.recommendtype%>checked="checked"<%/if%>> 手动推荐</label>
        </div>
    </div>
    <%if params.recommendtype=='0'||!params.recommendtype%>
    <%if showtype==9%>
    <div class="form-group">
        <div class="col-sm-2 control-label">商品范围</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 自营商品</label>
            <%if shoptype != 2%>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='1'||!params.goodstype%>checked="checked"<%/if%>> 全平台商品</label>
            <%/if%>
        </div>
    </div>
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">排序规则</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="goodssort" data-bind-child="params" >
                <option name="goodssort" value="0" <%if params.goodssort=='0'%>selected="selected"<%/if%>>按上架时间升序</option>
                <option name="goodssort" value="1" <%if params.goodssort=='1'%>selected="selected"<%/if%>>按上架时间降序</option>
                <option name="goodssort" value="2" <%if params.goodssort=='2'%>selected="selected"<%/if%>>按销量升序</option>
                <option name="goodssort" value="3" <%if params.goodssort=='3'%>selected="selected"<%/if%>>按销量降序</option>
                <option name="goodssort" value="4" <%if params.goodssort=='4'%>selected="selected"<%/if%>>按收藏数升序</option>
                <option name="goodssort" value="5" <%if params.goodssort=='5'%>selected="selected"<%/if%>>按收藏数降序</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐数量</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%params.recommendnum%>" data-min="2" data-max="30" data-step='2'></div>
                <div class="col-sm-4 control-labe count"><span><%params.recommendnum%></span> 个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="recommendnum" value="<%params.recommendnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.recommendtype=='1'||!params.recommendtype%>
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover_micro%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectGoods"><i class="icon icon-add1"></i> 选择商品</div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_goodsIntegral">
    <div class="form-editor-title">商品组设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">展示方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='1'%>checked="checked"<%/if%>> 一行一个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="2" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='2'%>checked="checked"<%/if%>> 一行两个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="3" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='3'%>checked="checked"<%/if%>> 一行三个</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="recommendtype" value="0" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='0'||!params.recommendtype%>checked="checked"<%/if%>> 自动推荐</label>
            <label class="radio-inline"><input type="radio" name="recommendtype" value="1" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='1'||!params.recommendtype%>checked="checked"<%/if%>> 手动推荐</label>
        </div>
    </div>
    <%if params.recommendtype=='0'||!params.recommendtype%>
    <%if showtype==9%>
    <!--<div class="form-group">
        <div class="col-sm-2 control-label">商品范围</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 自营商品</label>
            <%if shoptype != 2%>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='1'||!params.goodstype%>checked="checked"<%/if%>> 全平台商品</label>
            <%/if%>
        </div>
    </div>-->
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">排序规则</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="goodssort" data-bind-child="params" >
                <option name="goodssort" value="0" <%if params.goodssort=='0'%>selected="selected"<%/if%>>按上架时间升序</option>
                <option name="goodssort" value="1" <%if params.goodssort=='1'%>selected="selected"<%/if%>>按上架时间降序</option>
                <option name="goodssort" value="2" <%if params.goodssort=='2'%>selected="selected"<%/if%>>按兑换量升序</option>
                <option name="goodssort" value="3" <%if params.goodssort=='3'%>selected="selected"<%/if%>>按兑换量降序</option>
                <option name="goodssort" value="4" <%if params.goodssort=='4'%>selected="selected"<%/if%>>按积分升序</option>
                <option name="goodssort" value="5" <%if params.goodssort=='5'%>selected="selected"<%/if%>>按积分降序</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐数量</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%params.recommendnum%>" data-min="2" data-max="30" data-step='2'></div>
                <div class="col-sm-4 control-labe count"><span><%params.recommendnum%></span> 个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="recommendnum" value="<%params.recommendnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.recommendtype=='1'||!params.recommendtype%>
    <!--<div class="form-group">
        <div class="col-sm-2 control-label">商品范围</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 自营商品</label>
            <%if shoptype != 2%>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='1'||!params.goodstype%>checked="checked"<%/if%>> 全平台商品</label>
            <%/if%>
        </div>
    </div>-->
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover_micro%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectGoods"><i class="icon icon-add1"></i> 选择商品</div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_shop">
    <div class="form-editor-title">店铺设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">模块标题</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
            <div class="help-block">标题文字建议8个字以内</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="recommendtype" value="0" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='0'||!params.recommendtype%>checked="checked"<%/if%>> 自动推荐</label>
            <label class="radio-inline"><input type="radio" name="recommendtype" value="1" class="diy-bind" data-bind-child="params" data-bind="recommendtype" data-bind-init="true" <%if params.recommendtype=='1'||!params.recommendtype%>checked="checked"<%/if%>> 手动推荐</label>
        </div>
    </div>
    <%if params.recommendtype == '0'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐条件</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="recommendcondi" data-bind-child="params" >
                <option name="recommendcondi" value="0" <%if params.recommendcondi=='0'%>selected="selected"<%/if%>>按入驻时间升序</option>
                <option name="recommendcondi" value="1" <%if params.recommendcondi=='1'%>selected="selected"<%/if%>>按入驻时间降序</option>
                <option name="recommendcondi" value="2" <%if params.recommendcondi=='2'%>selected="selected"<%/if%>>按销量额升序</option>
                <option name="recommendcondi" value="3" <%if params.recommendcondi=='3'%>selected="selected"<%/if%>>按销量额降序</option>
                <option name="recommendcondi" value="4" <%if params.recommendcondi=='4'%>selected="selected"<%/if%>>按店铺收藏数升序</option>
                <option name="recommendcondi" value="5" <%if params.recommendcondi=='5'%>selected="selected"<%/if%>>按店铺收藏数降序</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">推荐数量</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%params.recommendnum%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%params.recommendnum%></span> 个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="recommendnum" value="<%params.recommendnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.recommendtype == '1'%>
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.pic_cover%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectShop"><i class="icon icon-add1"></i> 选择店铺</div>
    </div>
    <%/if%>
</script>
<script type="text/html" id="tpl_edit_listmenu">
    <div class="form-editor-title">列表导航设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">提示颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="remarkcolor" value="<%style.remarkcolor%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="20">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image square">
                        <span class="btn-del" title="清空图标" onclick="$('#cicon-<%itemid%>').val('').trigger('change')"></span>
                        <div class="icon-main">
                            <i class="v-icon <%child.iconclass%>" id="picon-<%itemid%>"></i>
                        </div>
                        <div class="text" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                        <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" data-bind-init="true">
                    </div>
                    <div class="item-form">
                        <div class="input-group mb-10">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon">提示</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.remark%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="remark" maxlength="6">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>
<script type="text/html" id="tpl_edit_richtext">
    <div class="form-editor-title">自定义设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">边距设置</div>
        <div class="col-sm-10">
            <div class="slider-form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.padding%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div id="UE_richtext_<%itemid%>" class="diy-bind" data-bind-child="params" data-bind="content" ></div>
            <textarea id="get_UE_richtext_<%itemid%>" class="hidden form-control diy-bind" data-bind-child="params" data-bind="content"></textarea>
        </div>
    </div>
</script>
<!--店招设置-->
<script type="text/html" id="tpl_edit_shop_head">
    <div class="form-editor-title">店招设置</div>
    <div class="alert alert-info alert-sm" role="alert">背景图片宽度建议750px，高度建议200px</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">风格样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="styletype" value="1" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='1'||!params.styletype%>checked="checked"<%/if%>> 风格一</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="2" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='2'%>checked="checked"<%/if%>> 风格二</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="3" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='3'%>checked="checked"<%/if%>> 风格三</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="4" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='4'%>checked="checked"<%/if%>> 风格四</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="5" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='5'%>checked="checked"<%/if%>> 风格五</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="6" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='6'%>checked="checked"<%/if%>> 风格六</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景图片</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="style" data-bind="backgroundimage" data-placeholder="" placeholder="" value="<%style.backgroundimage%>" id="backgroundimage"/>
                <span data-input="#backgroundimage" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_detail_fixed"></script>
<script type="text/html" id="tpl_edit_seckill">
    <div class="form-editor-title">秒杀设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
            <div class="help-block">标题文字建议8个字以内</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">排序规则</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="goodssort" data-bind-child="params" >
                <option name="goodssort" value="0" <%if params.goodssort=='0'%>selected="selected"<%/if%>>按活动申请时间升序</option>
                <option name="goodssort" value="1" <%if params.goodssort=='1'%>selected="selected"<%/if%>>按活动申请时间降序</option>
                <option name="goodssort" value="2" <%if params.goodssort=='2'%>selected="selected"<%/if%>>按销量升序</option>
                <option name="goodssort" value="3" <%if params.goodssort=='3'%>selected="selected"<%/if%>>按销量降序</option>
                <option name="goodssort" value="4" <%if params.goodssort=='4'%>selected="selected"<%/if%>>按收藏数升序</option>
                <option name="goodssort" value="5" <%if params.goodssort=='5'%>selected="selected"<%/if%>>按收藏数降序</option>
            </select>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_member_fixed">
    <div class="form-editor-title">会员信息设置</div>
    <div class="alert alert-info alert-sm" role="alert">背景图片宽度建议750px，高度建议320px</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">风格样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="styletype" value="1" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='1'||!params.styletype%>checked="checked"<%/if%>> 风格一</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="2" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='2'%>checked="checked"<%/if%>> 风格二</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="3" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='3'%>checked="checked"<%/if%>> 风格三</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="4" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='4'%>checked="checked"<%/if%>> 风格四</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="5" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='5'%>checked="checked"<%/if%>> 风格五</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="6" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='6'%>checked="checked"<%/if%>> 风格六</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景图片</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="style" data-bind="backgroundimage" data-placeholder="" placeholder="" value="<%style.backgroundimage%>" id="backgroundimage"/>
                <span data-input="#backgroundimage" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_member_bind_fixed">
    <div class="form-editor-title">绑定模块设置</div>
    <div class="alert alert-info alert-sm" role="alert">该模块仅在会员未绑定手机时才显示</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ff454e">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">描述颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="desccolor" value="<%style.desccolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">描述文字</div>
        <div class="col-sm-10">
            <textarea class="form-control input-sm diy-bind" rows="3"  data-bind-child="params" data-bind="desc" placeholder="请输入描述"><%params.desc%></textarea>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_member_assets_fixed">
    <div class="form-editor-title">资产模块设置</div>
    <div class="alert alert-info alert-sm" role="alert">子栏目实际效果为一行超过3个默认显示前3个，可点击下拉按钮展开全部</div>
    <div class="form-group-title">标题设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titleiconcolor" value="<%style.titleiconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">提示颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titleremarkcolor" value="<%style.titleremarkcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group-box">
        <div class="inner">
            <div class="item-box">
                <div class="item-image square">
                    <span class="btn-del" title="清空图标" onclick="$('#micon-<%id%>').val('').trigger('change')"></span>
                    <div class="icon-main">
                        <i class="v-icon <%params.iconclass%>"></i>
                    </div>
                    <div class="text" data-toggle="selectIcon" data-input="#micon-<%id%>" data-element="#iicon-<%id%>">选择图标</div>
                    <input type="hidden" id="micon-<%id%>" class="diy-bind" data-bind-child="params" data-bind="iconclass" data-bind-init="true">
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <span class="input-group-addon">标题</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" value="<%params.title%>" placeholder="留空则不显示">
                        <span class="input-group-addon">提示</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="remark" value="<%params.remark%>" placeholder="留空则不显示">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group-title">子栏目设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">高亮颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="highlight" value="<%style.highlight%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ff454e">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="10">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <%if child.no_addons != '1'%>
            <div class="item" data-id="<%itemid%>">
                <div class="item-body">
                    <div class="item-form">
                        <div class="input-group mb-10">
                            <span class="input-group-addon"><%child.name%></span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20" <%if child.key == 'balance' || child.key == 'points' %>readonly<%/if%>>
                        </div>
                        <div class="input-group">
                            <label class="radio-inline"><input type="radio" name="is_show_<%itemid%>" value="1" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="is_show" <%if child.is_show=='1'%>checked="checked"<%/if%>> 显示</label>
                            <label class="radio-inline"><input type="radio" name="is_show_<%itemid%>" value="0" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="is_show" <%if child.is_show=='0'%>checked="checked"<%/if%>> 隐藏</label>
                        </div>
                    </div>
                </div>
            </div>
            <%/if%>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_member_order_fixed">
    <div class="form-editor-title">订单模块设置</div>
    <div class="form-group-title">标题设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titleiconcolor" value="<%style.titleiconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">提示颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="titleremarkcolor" value="<%style.titleremarkcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#909399">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group-box">
        <div class="inner">
            <div class="item-box">
                <div class="item-image square">
                    <span class="btn-del" title="清空图标" onclick="$('#micon-<%id%>').val('').trigger('change')"></span>
                    <div class="icon-main">
                        <i class="v-icon <%params.iconclass%>"></i>
                    </div>
                    <div class="text" data-toggle="selectIcon" data-input="#micon-<%id%>" data-element="#iicon-<%id%>">选择图标</div>
                    <input type="hidden" id="micon-<%id%>" class="diy-bind" data-bind-child="params" data-bind="iconclass" data-bind-init="true">
                </div>
                <div class="item-form">
                    <div class="input-group mb-10">
                        <span class="input-group-addon">标题</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" value="<%params.title%>" placeholder="留空则不显示">
                        <span class="input-group-addon">提示</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="remark" value="<%params.remark%>" placeholder="留空则不显示">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group-title">子栏目设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#ffffff">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group input-group-sm">
                <input type="text" class="colorpicker diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color">
                <span class="btn btn-default btn-sm btn-reset" data-color="#323233">重置</span>
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="10">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <div class="item-body">
                    <div class="item-image square">
                        <div class="icon-main">
                            <i class="v-icon <%child.iconclass%>" id="picon-<%itemid%>"></i>
                        </div>
                        <div class="text" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                        <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" data-bind-init="true">
                    </div>
                    <div class="item-form">
                        <div class="input-group mb-10">
                            <span class="input-group-addon"><%child.name%></span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                        </div>
                        <div class="input-group">
                            <label class="radio-inline"><input type="radio" name="is_show_<%itemid%>" value="1" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="is_show" <%if child.is_show=='1'%>checked="checked"<%/if%>> 显示</label>
                            <label class="radio-inline"><input type="radio" name="is_show_<%itemid%>" value="0" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="is_show" <%if child.is_show=='0'%>checked="checked"<%/if%>> 隐藏</label>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_commission_fixed">
    <div class="form-editor-title">分销商信息设置</div>
    <div class="alert alert-info alert-sm" role="alert">背景图片宽度建议750px，高度建议260px</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">风格样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="styletype" value="1" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='1'||!params.styletype%>checked="checked"<%/if%>> 风格一</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="2" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='2'%>checked="checked"<%/if%>> 风格二</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="3" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='3'%>checked="checked"<%/if%>> 风格三</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="4" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='4'%>checked="checked"<%/if%>> 风格四</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="5" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='5'%>checked="checked"<%/if%>> 风格五</label>
            <label class="radio-inline"><input type="radio" name="styletype" value="6" class="diy-bind" data-bind-child="params" data-bind="styletype" <%if params.styletype=='6'%>checked="checked"<%/if%>> 风格六</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景图片</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="style" data-bind="backgroundimage" data-placeholder="" placeholder="" value="<%style.backgroundimage%>" id="backgroundimage"/>
                <span data-input="#backgroundimage" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_customer">
    <div class="form-editor-title">客服中心设置</div>
    <div class="alert alert-info alert-sm" role="alert">
        前往<a href="https://mp.weixin.qq.com" class="text-primary" target="_blank">https://mp.weixin.qq.com</a>登录小程序管理后台，在客服消息页面中根据提示配置客服人员，客服人员通过<a href="https://mpkf.weixin.qq.com/" class="text-primary" target="_blank">https://mpkf.weixin.qq.com/</a>登录后，可以接收并回复客服消息
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">客服图标</div>
        <div class="col-sm-10">
            <div class="input-group item">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="imgurl" data-placeholder="" placeholder="" value="<%params.imgurl%>" id="imgurl"/>
                <span data-input="#imgurl" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_edit_goodsCps">
    <div class="form-editor-title">商品组设置</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4 colorpicker-col">
            <div class="colorpicker-input-group">
                <input class="colorpicker input-sm diy-bind" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="btn btn-default btn-sm btn-reset" data-color="#f8f8f8">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">展示方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='1'%>checked="checked"<%/if%>> 一行一个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="2" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if !params.showtype||params.showtype=='2'%>checked="checked"<%/if%>> 一行两个</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="3" class="diy-bind" data-bind-child="params" data-bind="showtype" <%if params.showtype=='3'%>checked="checked"<%/if%>> 一行三个</label>
        </div>
    </div>
    <div class="form-items" data-min="1" data-max="30">
        <div class="goods-inner">
            <%each data as child itemid %>
            <div class="goods-item" data-id="<%itemid%>">
                <div class="item-image">
                    <img src="<%child.pic_cover%>" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-block btn-default btn-outline" id="selectCpsGoods"><i class="icon icon-add1"></i> 选择商品</div>
    </div>
</script>
<!-- 编辑 end -->
<!-- 视图 -->
<script type="text/html" id="tpl_show_search">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-search" style="background: <%style.background%>; padding: <%style.paddingtop||'10'%>px <%style.paddingleft||'10'%>px;">
            <div class="inner left" >
                <div class="search-icon" ><i class="icon icon-search"></i></div>
                <div class="search-input" >
                    <span><%params.placeholder%></span>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_tabbar">
    <div class="vui-tabbar">
        <% each data as item%>
        <div class="vui-tabbar-item">
            <div class="vui-tabbar-item-icon">
                <img src="<%item.normal%>">
            </div>
            <div class="vui-tabbar-item-text">
                <span><%item.text%></span>
            </div>
        </div>
        <%/each%>
    </div>
</script>
<script type="text/html" id="tpl_show_copyright">
    <div class="vui-copyright style-<%style.showtype%>">
        <%if params.showlogo == '1'%>
        <img src="<%params.src%>">
        <%/if%>
        <span class="text"><%params.text%></span>
    </div>
</script>
<script type="text/html" id="tpl_show_banner">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-banner">
            <%each data as item%>
            <img src="<%item.imgurl%>" />
            <%/each%>
            <div class="dots">
                <%each data as item%>
                <span></span>
                <%/each%>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_menu">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-icon-group noborder col-<%style.rownum%>" style="background: <%style.background||'#ffffff'%>">
            <%each data as item%>
            <div class="vui-icon-col">
                <div class="icon"><img src="<%item.imgurl%>"></div>
                <div class="text" style="color: <%item.color%>"><%item.text%></div>
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_notice">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-notice" style="background: <%style.background%>">
            <div class="vui-notice-icon"><img src="/public/platform/images/custom/default/notice-icon.png"></div>
            <div class="vui-notice-wrap">
                <div class="vui-notice-content" style="color: <%style.color%>"><%params.text%></div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_picture">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-picture" style="padding-bottom: <%style.paddingtop%>px; background: <%style.background%>;">
            <%each data as item%>
            <div style="display: block; padding: <%style.paddingtop%>px <%style.paddingleft%>px 0;">
                <img src="<%item.imgurl%>" />
            </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_title">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-title" style="background: <%style.background||''%>; color: <%style.color||''%>; font-size: <%style.fontsize||'12'%>px; text-align: <%style.textalign||''%>; padding: <%style.paddingtop||'0'%>px <%style.paddingleft||'5'%>px;">
            <%if params.link%>
            <a href="<%params.link%>" style="color: <%style.color||''%>"><%params.title||'请输入标题内容'%></a>
            <%else%>
            <%params.title||'请输入标题内容'%>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_line">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-line" style="background: <%style.background%>; padding: <%style.padding%>px 0;">
            <div class="line" style="border-top: <%style.height||'2'%>px <%style.linestyle||'solid'%> <%style.bordercolor||'#000000'%>"></div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_blank">
    <div class="drag" data-itemid="<%itemid%>">
        <div style="height: <%style.height%>px; background: <%style.background%>"></div>
    </div>
</script>
<script type="text/html" id="tpl_show_picturew">
    <div class="drag" data-itemid="<%itemid%>">
        <%if params.row=='1'%>
        <div class="vui-cube" style="background: <%style.background%>; <%if count(data)==1%>padding: <%style.paddingtop%>px <%style.paddingleft%>px;<%/if%>">
            <%if count(data)==1%>
            <img src="<%toArray(data)[0].imgurl%>" />
            <%/if%>
            <%if count(data)>1%>
            <div class="vui-cube-left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                <img src="<%toArray(data)[0].imgurl%>" />
            </div>
            <div class="vui-cube-right" <%if count(data)==2%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
                <%if count(data)==2%>
                <img src="<%toArray(data)[1].imgurl%>" />
                <%/if%>
                <%if count(data)>2%>
                <div class="vui-cube-right1" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-bottom: 0;">
                    <img src="<%toArray(data)[1].imgurl%>" />
                </div>
                <div class="vui-cube-right2" <%if count(data)==3%> style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;"<%/if%>>
                    <%if count(data)==3%>
                    <img src="<%toArray(data)[2].imgurl%>" />
                    <%/if%>
                    <%if count(data)>3%>
                    <div class="left" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px; padding-right: 0;">
                        <img src="<%toArray(data)[2].imgurl%>" />
                    </div>
                    <%/if%>
                    <%if count(data)>=4%>
                    <div class="right" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                        <img src="<%toArray(data)[3].imgurl%>" />
                    </div>
                    <%/if%>
                </div>
                <%/if%>
            </div>
            <%/if%>
        </div>
        <%/if%>
        <%if params.row>1%>
        <div class="vui-picturew row-<%params.row%>" style="padding: <%style.paddingtop%>px; <%style.paddingleft%>px; background: <%style.background%>;">
            <%each data as item%>
            <div class="item" style="padding: <%style.paddingtop%>px <%style.paddingleft%>px;">
                <img src="<%item.imgurl%>">
            </div>
            <%/each%>
        </div>
        <%/if%>
    </div>
</script>
<script type="text/html" id="tpl_show_goods">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-goods-group" style="background-color: <%style.background%>">
            <%if params.recommendtype == '0'%>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>">
                <div class="image">
                    <img src="/public/platform/images/custom/default/goods-1.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按销量升序<%/if%>
                        <%if params.goodssort=='3'%>按销量降序<%/if%>
                        <%if params.goodssort=='4'%>按收藏数升序<%/if%>
                        <%if params.goodssort=='5'%>按收藏数降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                        <div class="buy">购买</div>
                    </div>
                </div>
            </div>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>">
                <div class="image">
                    <img src="/public/platform/images/custom/default/goods-2.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按销量升序<%/if%>
                        <%if params.goodssort=='3'%>按销量降序<%/if%>
                        <%if params.goodssort=='4'%>按收藏数升序<%/if%>
                        <%if params.goodssort=='5'%>按收藏数降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                        <div class="buy">购买</div>
                    </div>
                </div>
            </div>
            <%/if%>
            <%if params.recommendtype == '1'%>
            <%each data as item%>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>" data-goodsid="<%item.goods_id%>">
                <div class="image">
                    <img src="<%item.pic_cover_mid%>">
                </div>
                <div class="detail">
                    <div class="name"><%item.goods_name%></div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥<%item.price%></span>
                        </div>
                        <div class="buy">购买</div>
                    </div>
                </div>
            </div>
            <%/each%>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_goodsIntegral">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-goods-group" style="background-color: <%style.background%>">
            <%if params.recommendtype == '0'%>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>">
                <div class="image">
                    <img src="/public/platform/images/custom/default/goods-1.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按兑换量升序<%/if%>
                        <%if params.goodssort=='3'%>按兑换量降序<%/if%>
                        <%if params.goodssort=='4'%>按积分升序<%/if%>
                        <%if params.goodssort=='5'%>按积分降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span>50积分</span>
                            <span>+</span>
                            <span class="minprice">￥11.00</span>
                        </div>
                        <!--<div class="buy">购买</div>-->
                    </div>
                </div>
            </div>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>">
                <div class="image">
                    <img src="/public/platform/images/custom/default/goods-2.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        (自动推荐的
                        <%if params.goodstype=='0'%>自营商品<%/if%>
                        <%if params.goodstype=='1'%>全平台商品<%/if%>,
                        <%if params.goodssort=='0'%>按上架时间升序<%/if%>
                        <%if params.goodssort=='1'%>按上架时间降序<%/if%>
                        <%if params.goodssort=='2'%>按兑换量升序<%/if%>
                        <%if params.goodssort=='3'%>按兑换量降序<%/if%>
                        <%if params.goodssort=='4'%>按积分升序<%/if%>
                        <%if params.goodssort=='5'%>按积分降序<%/if%>
                        )
                    </div>
                    <div class="price">
                        <div class="text">
                            <span>50积分</span>
                            <span>+</span>
                            <span class="minprice">￥11.00</span>
                        </div>
                        <!--<div class="buy">购买</div>-->
                    </div>
                </div>
            </div>
            <%/if%>
            <%if params.recommendtype == '1'%>
            <%each data as item%>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>" data-goodsid="<%item.goods_id%>">
                <div class="image">
                    <img src="<%item.pic_cover_mid%>">
                </div>
                <div class="detail">
                    <div class="name">
                        <%if item.goods_type == '1'%>
                        <span class="label label-red">优惠券</span>
                        <%else if item.goods_type == '2'%>
                        <span class="label label-red">礼品券</span>
                        <%else if item.goods_type == '3'%>
                        <span class="label label-red">余额</span>
                        <%else if item.goods_type == '0'%>
                        <span class="label label-red">商品</span>
                        <%/if%>
                        <%item.goods_name%>
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">
                                <%if item.goods_point != 0 %>
                                  <%item.goods_point%>积分
                                <%/if%>
                                <%if item.goods_point != 0 && item.price > 0 %>
                                +
                                <%/if%>
                                <%if item.price > 0 %>
                                  ￥<%item.price%>
                                <%/if%>
                                
                            </span>
                        </div>
                        <!--<div class="buy">购买 <%item.goods_point%></div>-->
                    </div>
                </div>
            </div>
            <%/each%>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_shop">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-shop">
            <div class="vui-shop-title">——<span class="text"><%params.title%></span>——</div>
            <%if params.recommendtype == '0'%>
            <div class="vui-shop-list">
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
                <div class="vui-shop-item">
                    <img src="http://iph.href.lu/100x50?text=100x50">
                </div>
            </div>
            <%else%>
            <div class="vui-shop-list">
                <%each data as item%>
                <div class="vui-shop-item">
                    <img src="<%item.pic_cover%>">
                </div>
                <%/each%>
            </div>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_listmenu">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-cell-group vui-cell-click" style="margin-top: <%style.margintop%>px; background-color: <%style.background%>;">
            <%each data as item%>
                <div class="vui-cell">
                    <%if item.iconclass%>
                        <div class="vui-cell-icon" style="color: <%style.iconcolor%>;"><i class="v-icon <%item.iconclass%>"></i></div>
                    <%/if%>
                    <div class="vui-cell-text" style="color: <%style.textcolor%>;"><%item.text%></div>
                    <div class="vui-cell-remark" style="color: <%style.remarkcolor%>;"><%item.remark%></div>
                    <div class="vui-cell-right"><i class="icon icon-right-arrow"></i></div>
                </div>
            <%/each%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_richtext">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-richtext" style="padding: <%style.padding%>px;">
            <%if params.content%>
            <%=decode(params.content)%>
            <%else%>
            <p><span style="font-size: 20px;">这里是『富文本』区域</span></p>
            <%/if%>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_shop_head">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-shop_head">
            <div class="box">
                <i class="icon v-icon-menu1"></i>
                <%if style.backgroundimage%>
                    <img src="<%style.backgroundimage%>" class="bg">
                    <img src="/public/platform/images/custom/shop_head_default_0<%params.styletype%>.png" class="img">
                <%else%>
                    <img src="/public/platform/images/custom/default/shop-head-0<%params.styletype%>.jpg" class="bg">
                    <img src="/public/platform/images/custom/shop_head_default_0<%params.styletype%>.png" class="img">
                <%/if%>
            </div>
            <div class="foot">
                <span class="item"><i class="icon icon-search"></i>搜索</span>
                <span class="item">全部商品</span>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_detail_fixed">
    <div class="fixed nodelete" data-itemid="<%itemid%>">
        <img src="/public/platform/images/custom/detail_default.png" width="100%">
    </div>
</script>
<script type="text/html" id="tpl_show_member_fixed">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-member_head">
            <div class="box">
                <%if style.backgroundimage%>
                    <img src="<%style.backgroundimage%>" class="bg">
                    <img src="/public/platform/images/custom/member_head_default_0<%params.styletype%>.png" class="img">
                <%else%>
                    <img src="/public/platform/images/custom/default/member-head-0<%params.styletype%>.png" class="bg">
                    <img src="/public/platform/images/custom/member_head_default_0<%params.styletype%>.png" class="img">
                <%/if%>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_member_bind_fixed">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>" style="overflow: initial;">
        <div class="vui-member_bind vui-cell-group" >
            <div class="box" style="background: <%style.background%>">
                <div class="left">
                    <div class="img">
                        <i class="icon v-icon-bind-phone" style="color: <%style.iconcolor%>"></i>
                    </div>
                    <div class="text">
                        <div class="title" style="color: <%style.titlecolor%>"><%params.title%></div> 
                        <div class="tip" style="color: <%style.desccolor%>"><%params.desc%></div>
                    </div>
                </div>
                <i class="icon v-icon-arrow-right right"></i>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_member_assets_fixed">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-member_assets" style="background: <%style.background%>">
            <div class="vui-cell">
                <%if params.iconclass %>
                    <div class="vui-cell-icon" style="color: <%style.titleiconcolor%>;"><i class="v-icon <%params.iconclass%>"></i></div>
                <%/if%>
                <div class="vui-cell-text" style="color: <%style.titlecolor%>;"><%params.title%></div>
                <div class="vui-cell-remark" style="color: <%style.titleremarkcolor%>;"><%params.remark%></div>
                <div class="vui-cell-right"><i class="icon icon-right-arrow"></i></div>
            </div>
            <div class="cell-panel cell-panel-3">
                <%each data as item%>
                <%if item.no_addons != '1' && item.is_show == '1' %>
                <div class="item">
                    <div class="box">
                        <div class="title" style="color: <%style.textcolor%>;"><%item.text%></div> 
                        <div class="text" style="color: <%style.highlight%>;">0</div>
                    </div>
                </div>
                <%/if%>
                <%/each%>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_member_order_fixed">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-member_order" style="background: <%style.background%>">
            <div class="vui-cell">
                <%if params.iconclass %>
                    <div class="vui-cell-icon" style="color: <%style.titleiconcolor%>;"><i class="v-icon <%params.iconclass%>"></i></div>
                <%/if%>
                <div class="vui-cell-text" style="color: <%style.titlecolor%>;"><%params.title%></div>
                <div class="vui-cell-remark" style="color: <%style.titleremarkcolor%>;"><%params.remark%></div>
                <div class="vui-cell-right"><i class="icon icon-right-arrow"></i></div>
            </div>
            <div class="cell-panel cell-panel-5">
                <%each data as item%>
                <%if item.is_show == '1' %>
                <div class="item">
                    <div class="box">
                        <div class="icon" style="color: <%style.iconcolor%>;"><i class="v-icon <%item.iconclass%>"></i></div> 
                        <div class="text" style="color: <%style.textcolor%>;"><%item.text%></div>
                    </div>
                </div>
                <%/if%>
                <%/each%>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_commission_fixed">
    <div class="drag fixed nodelete" data-itemid="<%itemid%>">
        <div class="vui-commission_head">
            <div class="box">
                <%if style.backgroundimage%>
                    <img src="<%style.backgroundimage%>" class="bg">
                    <img src="/public/platform/images/custom/commission_head_default_0<%params.styletype%>.png?" class="img">
                <%else%>
                    <img src="/public/platform/images/custom/default/commission-head-0<%params.styletype%>.png?" class="bg">
                    <img src="/public/platform/images/custom/commission_head_default_0<%params.styletype%>.png?" class="img">
                <%/if%>
            </div>
            <div class="foot">
                <img src="/public/platform/images/custom/commission_default.png?" width="100%">
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_seckill">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-seckill-head">
            <div class="text"><%params.title%></div>
            <div class="time">
                <span class="time-text">0点场</span>
                <div class="time-box">
                    <span>00</span>
                    <i>:</i>
                    <span>00</span>
                    <i>:</i>
                    <span>00</span>
                </div>
            </div>
        </div>
        <div class="vui-seckill-group">
            <div class="vui-seckill-item">
                <div class="image">
                    <span class="tag">秒杀</span>
                    <img src="/public/platform/images/custom/default/goods-1.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        秒杀商品名称
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vui-seckill-item">
                <div class="image">
                    <span class="tag">秒杀</span>
                    <img src="/public/platform/images/custom/default/goods-2.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        秒杀商品名称
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vui-seckill-item">
                <div class="image">
                    <span class="tag">秒杀</span>
                    <img src="/public/platform/images/custom/default/goods-1.jpg">
                </div>
                <div class="detail">
                    <div class="name">
                        秒杀商品名称
                    </div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥11.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_customer">
    <div class="drag fixed customer_fixed" data-itemid="<%itemid%>">
        <div class="vui-customer">
            <img src="<%params.imgurl%>">
        </div>
    </div>
</script>
<script type="text/html" id="tpl_show_goodsCps">
    <div class="drag" data-itemid="<%itemid%>">
        <div class="vui-goods-group" style="background-color: <%style.background%>">
            <%each data as item%>
            <div class="vui-goods-item vui-goods-item-<%params.showtype%>" data-goodsid="<%item.goods_id%>">
                <div class="image">
                    <img src="<%item.pic_cover%>">
                </div>
                <div class="detail">
                    <div class="name"><%item.goods_name%></div>
                    <div class="price">
                        <div class="text">
                            <span class="minprice">￥<%item.price%></span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
</script>
<!-- 视图 end -->
<script>
    require(['mp_custom','tpl','util'],function(modal,tpl,util){
        $('.custom-header-list-warp').click(function(){
            $('.custom-header-list-box').fadeToggle(150);
        })
        $('.v-layout').addClass('mobileCustom')
        $('.addPage').click(function(){
            var html = '<form class="form-horizontal padding-15" >';
            html += '<div class="form-group"><label class="col-md-3 control-label">页面名称</label><div class="col-md-8"><input id="modal_template_name" type="text" class="form-control" /></div></div>';
            html += '<div class="form-group"><label class="col-md-3 control-label">页面模版</label><div class="col-md-8"><select id="modal_template_type" class="form-control" >' +
                '<option value="1">商城首页</option>' +
                '<option value="2">店铺首页</option>' +
                '<option value="3">商品详情页</option>' +
                '<option value="4">会员中心</option>' +
                '<option value="5">分销中心</option>' +
                '<option value="6">自定义页</option>' +
                '</select></div></div>';
            html += '</form>';
            util.confirm('新增页面', html, function () {
                var template_type = this.$content.find("#modal_template_type").val();
                var template_name = this.$content.find("#modal_template_name").val();
                if(template_name && template_name !== ' '){
                    $.ajax({
                        type: 'post',
                        url: '<?php echo $createCustomTemplateUrl; ?>',
                        data: {
                            'type': template_type,
                            'template_name': template_name
                        },
                        success: function (res) {
                            if (res.code > 0) {
                                util.message(res.message, 'success',__URL('ADDONS_MAINminiProgramCustom&id=' +  res.data.id));
                            } else {
                                util.message(res.message, 'error');
                            }
                        }
                    });
                }else{
                    util.message('页面名称不能空！')
                    return false
                }

            })
        })
        modal.init({
            tpl: tpl,
            attachurl:'PLATFORM_IMG/custom/default/',
            type: <?php echo !empty($type)?$type: 1; ?>,    //页面类型
            id: '<?php echo $id; ?>',
            data: <?php echo !empty($template_data)?$template_data: "''"; ?>,
            tabbar: <?php echo !empty($tabbar)?$tabbar: "''"; ?>,
            copyright:<?php echo !empty($copyright)?$copyright: "''"; ?>,
            default_version:"<?php echo $default_version; ?>",
            addonsIsUse:<?php echo !empty($addonsIsUse)?$addonsIsUse: "''"; ?>
        });
    })
</script>

