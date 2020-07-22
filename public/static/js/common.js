
 function trDel(callback) {
    $(".trs").on("click", ".del", function(e) {
      var that = $(this);
      layer.confirm(
        "确认要删除吗？",
        {
          btn: ["确定", "取消"],
          title: "系统提示"
        },
        function() {
          time: 500,
            layer.msg("删除成功", {
              time: 500,
              offset: ["50%", "50%"]
            }),
            e.preventDefault();
          that
            .parent()
            .parent()
            .remove();
          callback && callback();
        }
      );
    });
  }
  //时间戳转时间类型
function timeStampTurnTime(timeStamp){
	if(timeStamp > 0){
		var date = new Date();  
		date.setTime(timeStamp * 1000);  
		var y = date.getFullYear();      
		var m = date.getMonth() + 1;      
		m = m < 10 ? ('0' + m) : m;      
		var d = date.getDate();      
		d = d < 10 ? ('0' + d) : d;      
		var h = date.getHours();    
		h = h < 10 ? ('0' + h) : h;    
		var minute = date.getMinutes();    
		var second = date.getSeconds();    
		minute = minute < 10 ? ('0' + minute) : minute;      
		second = second < 10 ? ('0' + second) : second;     
		return y + '-' + m + '-' + d+' '+h+':'+minute+':'+second;  		
	}else{
		return "";
	}
	    
	//return new Date(parseInt(time_stamp) * 1000).toLocaleString().replace(/年|月/g, "/").replace(/日/g, " ");
}

//函数名：CheckDateTime
//功能介绍：检查是否为日期时间
function CheckDateTime(str){
	var reg = /^(\d+)-(\d{1,2})-(\d{1,2}) (\d{1,2}):(\d{1,2}):(\d{1,2})$/;
	var r = str.match(reg);
	if(r==null)return false;
	r[2]=r[2]-1;
	var d= new Date(r[1], r[2],r[3], r[4],r[5], r[6]);
	if(d.getFullYear()!=r[1]) return false;
	if(d.getMonth()!=r[2]) return false;
	if(d.getDate()!=r[3]) return false;
	if(d.getHours()!=r[4]) return false;
	if(d.getMinutes()!=r[5]) return false;
	if(d.getSeconds()!=r[6]) return false;
	return true;
}

function submitPassword() {
	var pwd0 = $("#pwd0").val();
	var pwd1 = $("#pwd1").val();
	var pwd2 = $("#pwd2").val();
	if (pwd0 == '') {
		$("#pwd0").focus();
		$("#pwd0").siblings("span").html("原密码不能为空");
		return;
	} else {
		$("#pwd0").siblings("span").html("");
	}

	if (pwd1 == '') {
		$("#pwd1").focus();
		$("#pwd1").siblings("span").html("密码不能为空");
		return;
	} else if ($("#pwd1").val().length < 6) {
		$("#pwd1").focus();
		$("#pwd1").siblings("span").html("密码不能少于6位数");
		return;
	} else {
		$("#pwd1").siblings("span").html("");
	}
	if (pwd2 == '') {
		$("#pwd2").focus();
		$("#pwd2").siblings("span").html("密码不能为空");
		return;
	} else if ($("#pwd2").val().length < 6) {
		$("#pwd2").focus();
		$("#pwd2").siblings("span").html("密码不能少于6位数");
		return;
	} else {
		$("#pwd2").siblings("span").html("");
	}
	if (pwd1 != pwd2) {
		$("#pwd2").focus();
		$("#pwd2").siblings("span").html("两次密码输入不一样，请重新输入");
		return;
	}
	$.ajax({
		url : __URL(PASSMAIN+"/index/modifypassword"),
		type : "post",
		data : {
			"old_pass" : $("#pwd0").val(),
			"new_pass" : $("#pwd1").val()
		},
		dataType : "json",
		success : function(data) {
			if (data['code'] > 0) {
                            message("密码修改成功！","success", function () {
                                location.href= __URL(PASSMAIN+"/login/logout");
                            });
			} else {
                            message(data['message'],"danger");
                            return false;
			}
		}
	});
}

function page(select,totalData,pageCount,current,callbacks){
    $(select).pagination({
        totalData:totalData,
        pageCount: pageCount,
        showData:20,
        current:current,
        jump: true,
        coping: true,
        homePage: "首页",
        endPage: "末页",
        prevContent: "上页",
        nextContent: "下页",
        callback: function (api) {
            callbacks && callbacks(api.getCurrent());
        }
    });
}
function CheckInputIntFloat(oInput)
{
    if('' != oInput.value.replace(/\d{1,}\.{0,1}\d{0,}/,''))
    {
        oInput.value = oInput.value.match(/\d{1,}\.{0,1}\d{0,}/) == null ? '' :oInput.value.match(/\d{1,}\.{0,1}\d{0,}/);
    }
}
//判断是否为数字（整数、小数）
function IsNum(obj) {
    var val = $.trim($(obj).val());
    var r = /^\d+(\.\d+|\d*)$/g;
    if (r.test(val) == false) {
        return false;
    }
    return true;
}
//判断是否为正整数
function IsPositiveNum(obj) {
    var val = $.trim($(obj).val());
    var r = /^[0-9]*[1-9][0-9]*$/ ;
    if (r.test(val) == false) {
        return false;
    }
    return true;
}
//取最大值
Array.max = function(array ){
    return Math.max.apply(Math,array);
};
//取最小值
Array.min = function(array){
    return Math.min.apply(Math,array);
};
function Exp(){
    $.validator.addMethod("isZipCode", function(value, element) {   
        var tel = /^[0-9]{6}$/;
        return this.optional(element) || (tel.test(value));
    }, "请正确填写您的邮政编码");
}

// 图片空间弹出层
    /**
     * 选择图片
     * @DateTime 2018-05-08
     * @param    {
     *      _this       :    当前元素this   (必须)
     *      isMulti     :    是否多选  默认false (可选)
     *      callback    :       (可选)
     * }
     */
      function pictureDialog(_this,isMulti,callback){
        isMulti && isMulti !== undefined ? isMulti : isMulti = false;
        $.confirm({
            title: '图片空间',
            content: 'url:'+__URL(ADMINMAIN + '/system/pic_space'),
            animation: 'top',
            columnClass: 'col-md-11',
            closeAnimation: 'bottom',
            backgroundDismiss: true,
            animateFromElement: false,
            closeIcon: true,
            buttons: {
                confirm: {
                    text:'确定',
                    btnClass:'btn-primary',
                    action:function(){
                        var content = this.$content.find('#selectedData').data();
                        console.log(content);
                        if(isEmpty(content) || isEmpty(content['id'])){
                            message('请选择图片')
                            return false;
                        }
                        if(callback && callback !== undefined && typeof(callback) === 'function'){
                            callback(content);
                        }else{
                            if(isMulti){
                                for (var i = 0; i < content.path.length; i++) {
                                    $(_this).parent().prepend('<a id="goods_pic_list" href="javascript:void(0);" style="margin-right:10px;"><i class="icon icon-danger"  style="right:-15px;" title="删除"></i><img src='+content.path[i]+'></a><input type="hidden" name="upload_img_id" value="'+content.id[i]+'">')
                                }
                            }else{
                                
                                var img = '<a id="goods_pic_list" href="javascript:void(0);" class="close-box"><i class="icon icon-danger" style="margin-right:10px;"title="删除"></i><img src='+content.path[0]+' data-id='+content.id+'></a>';
                                $(_this).parent().html(img);
                            }
                            console.log('选中的图片数据===>',content)
                        }

                    }
                },
                cancel: {
                    text:'取消',
                    btnClass:'btn-default',
                    action:function(){
                        // console.log('取消了')
                    }
                }
            },
            onClose:function(){
                var storage = new Storage('session');
                if(storage.getKey('multiple')){
                    storage.removeItem('multiple')
                }
            },
            onContentReady: function () {

            }
        });
    }
    /**
        confirm 对话窗口
        title:标题        string
        content：内容     string | html代码
        callback：确定    function
        isString:定义宽度    选填 string 类型为function则执行 onContentReady
            默认=> medium
            中等=> large
            宽屏=> xlarge
            小屏=> small
            超小=> xsmall
    */
     function confirm(title,content,callback,isString,setContent){
        var columnClass = 'medium';
        var onContentReady = '';
        if(isString && isString !== undefined){
            if(typeof isString == 'string'){
                columnClass = isString
            }else{
                onContentReady = isString;
            }
        }
        if(setContent && setContent !== undefined && typeof setContent == 'function'){
            onContentReady = setContent;
        }
        $.confirm({
            title:title,
            content:content,
            animation:'top',
            closeAnimation:'bottom',
            animateFromElement: false,
            columnClass: columnClass,
            buttons: {
                '确定': {
                    btnClass: 'btn-primary',
                    action:callback
                },
                '取消': function () {
                    // util.message('danger','你点击了取消')
                }
            },
            onContentReady: onContentReady
        })
    }
    /**
        message消息提示
        参数：
        `type` ：提示类型 string
        {
            info = 提示
            success = 成功
            warning = 警告
            danger = 失败
        }
        `content`：提示内容
    */
    function message(content,type,callback){
        type ? type : type = 'info'
        var messageHtml = '<div class="alert alert-'+type+' alert-message-dialog fadeInDown" id="msgHtml" role="alert"><i class="icon icon-'+type+'"></i>'+content+'</div>'
        $(document.body).append(messageHtml)
        setTimeout(function(){
            $("#msgHtml").removeClass('fadeInDown').addClass('fadeInOut')
            removeHtml();
            if(typeof(callback) === "function"){
                callback();
            }
        },1500)
        function removeHtml(){
            setTimeout(function(){
                $("#msgHtml").remove();
            },500)
        }
    }

        /**
     * 判断对象object及数组array是否为空对象或空数组
     *
     * @DateTime 2018-05-08
     * @param    {obj}
     * @return   {Boolean}
     */
     function isEmpty(obj) {
        if (!obj && obj !== 0 && obj !== '') {
            return true;
        }
        if (Array.prototype.isPrototypeOf(obj) && obj.length === 0) {
            return true;
        }
        if (Object.prototype.isPrototypeOf(obj) && Object.keys(obj).length === 0) {
            return true;
        }
        return false;
    }

    /**
     * 本地临时存储   实例化对象 new Storage
     * @param {
     *      type     存储方式，指定是session或local存储
     * }
     * @DateTime 2018-05-08
     * @return   {
     *      setItem('key','data')       存储数据
     *      getItem('key')              获取存储数据
     *      removeItem('key')           删除键名为key的存储数据
     *      getKey('key')               判断是否存在某一键的数据
     *      clear('key')                清空存储
     * }
     */
     function Storage(type){
        this.map = {
            'session' : window.sessionStorage,
            'local' : window.localStorage
        },
        this.getItem = function( key ){
            return this.map[type].getItem( key );
        },
        this.setItem = function( key, value ){
            this.map[type].setItem( key,value )
        },
        this.removeItem = function( key ){
            this.map[type].removeItem( key );
        },
        this.clear = function(){
            this.map[type].clear();
        },
        this.getKey = function( key ){
            //var len = map.type.length;
            return key in this.map[type];
        }
    }
        /**
     * 发布商品的表单验证   
     * @param {
     *      element     form的id
     * }
     */
    function validate(element){
        // 有图片则开启验证
        $('.picture-list').bind('DOMNodeInserted',function(e){
            if($(".picture-list").find("input").attr('name')=='upload_img_id'){
                console.log("if");
                $('.visibility').removeAttr('required');
            }
        });
        $('.picture-list').bind('DOMNodeRemoved',function(e){
            if($(".picture-list").find("input").attr('name')=='upload_img_id'){
                $('.visibility').attr('required','required');
            }
        });

        var validate_rule = {
            ignore:'.ignore',
            errorElement: 'span',
            errorClass: 'help-block-error',
            focusInvalid: true,
            debug: true,
            highlight: function (element) {
                // console.log($(element));
                var parent = $(element).data('parent') || '';
                var visiType = $(element).data('visi-type');
                if (parent) {
                    $(parent).addClass('has-error')
                } else {
                    if (visiType == 'prices_1') {
                        $(element).closest('.w15').addClass('has-error');
                    }
                    else{
                        $(element).closest('.form-group').addClass('has-error')
                    }
                    
                }
            },
            onkeyup: function (element) {
                $(element).valid()
            },
            onfocusout: function (element) {
                $(element).valid()
            },
            success: function (element) {
                // console.log($(element));
                var visiType=$(element).siblings('input').data('visi-type');
                var parent = $(element).data('parent') || '';
                        if (parent) {
                            $(parent).removeClass('has-error')
                        } else {
                            if(visiType == 'prices_1'){
                                $(element).closest('.w15').removeClass('has-error');
                            }
                            else{
                                $(element).closest('.form-group').removeClass('has-error');
                            }
                                
                        }


            },
            errorPlacement: function (error, element) {
                // 单选复选框
                if (element.is(':radio') || element.is(':checkbox')) {
                    // console.log(element)
                    var group = element.parent().parent();
                    group.length > 0 ? group.after(error) : element.after(error)

                } else if (element.attr('class') == 'visibility') {
                    var visiType = $(element).data('visi-type')
                    if (visiType == 'singlePicture') {
                        // 单选图片
                        var pElement = $(element).parents('.picture-list')
                        pElement.find('.plus-box').addClass('validate-border')
                        pElement.after(error)
                        pElement.bind('DOMNodeInserted', function (e) {
                            if (e.target) {
                                $(e.target).parent().siblings('.help-block-error').remove()
                                $(e.target).parents('.form-group').removeClass('has-error')
                            }
                        });
                    } else if (visiType == 'multiPicture') {
                        // 多选图片
                        if($(element).prev().find('input[name="upload_img_id"]').length == 0){
                            $(element).prev().addClass('validate-border')
                            $(element).after(error)
                            $(element).prev().find('.picture-list').bind('DOMNodeInserted', function(e) {
                                if(e.target){
                                    var pElement = $(e.target).parents('.form-group')
                                    pElement.removeClass('has-error')
                                    pElement.find('.validate-border').removeClass('validate-border')
                                    pElement.find('.help-block-error').remove()
                                }
                            });
                        }else{
                            $(element).parents('.form-group').removeClass('has-error')
                            // $(element).remove()
                            $(element).removeAttr('required');
                        }
                    } else if (visiType == 'UE') {
                        //console.log($(element).prev().find('.edui-editor').addClass('validate-border'))
                        // $(element).prev().addClass('validate-border')
                        $(element).after(error);
                    }
                } else {
                    // 普通input框
                    var group = element.parents(".input-group");
                    group.length > 0 ? group.after(error) : element.after(error)
                    // element.after(error)
                }
            },
            submitHandler: function (form) {
                console.log('submitHandler');
                SubmitProductInfo(0);
            },
            invalidHandler:function(form, validator){
                console.log('invalidHandler');
                if($('.tab-1').find('.form-group').hasClass('has-error')){
                    console.log('if');
                    $('.add_tab1 li:eq(0) a').tab('show');
                }
                else if($('.tab-2').find('.w15').hasClass('has-error')){
                    $('.add_tab1 li:eq(1) a').tab('show');
                }
                else{
                    $('.add_tab1 li:eq(0) a').tab('show');
                }
                return false;

            }
        };
        $(element).validate(validate_rule);

}

    /**
        alert确认窗口
        callback:点击确认的回调
    */
    function alerts(content,callback){
        $.alert({
            title:'提示',
            content:content,
            animation: 'top',
            closeAnimation: 'bottom',
            animateFromElement: false,
            backgroundDismiss: true,
            buttons: {
                '确定': {
                    btnClass: 'btn-primary',
                    action:callback
                },
                '取消': function () {
                    // util.message('danger','你点击了取消')
                }
            }
        })
    }

    /**
     * layDate日期 
     * @param {
     *      element     触发的dom
     *      range       Boolean true为双日历
     *      callback    点击确定的回调
     * }
     * @DateTime 2018-11-15
     */
    function layDate(element,ranges,callback){
            ranges && ranges !== undefined ? ranges : false;
            var minDate = $(element).attr("data-mindate");
            var maxDate = $(element).attr("data-maxdate");
            minDate=minDate && minDate !== undefined ? minDate :'1900-1-1';
            maxDate=maxDate && maxDate !== undefined ? maxDate :'2099-12-31';
            laydate.render({
            elem: element,
            theme: '#2c9cf0',
            range:ranges,
            min:minDate,
            max:maxDate,
            done: function(value, date, endDate){
                callback && callback(value, date, endDate);
            }
        })
    }


	
