webpackJsonp([18],{"3cbI":function(t,e){},"4AY3":function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),i=a("Q3je"),n={data:function(){return{}},props:{info:Object},methods:{kindName:function(t){var e="";return 1==t?e="单次任务":2==t?e="周期任务":3==t?e="单级海报任务":4==t&&(e="多级海报任务"),e}}},r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"head card-group-box"},[a("img",{staticClass:"bg",attrs:{src:t.$BASEIMGPATH+"task-head-bg.png"}}),t._v(" "),a("div",{staticClass:"box"},[a("div",{staticClass:"info"},[a("div",{staticClass:"img"},[a("img",{attrs:{src:t._f("BASESRC")(t.info.task_img),onerror:t.$ERRORPIC.noSquare}})]),t._v(" "),a("div",{staticClass:"text"},[a("div",{staticClass:"name"},[t._v(t._s(t.info.task_name))]),t._v(" "),a("div",{staticClass:"txt"},[t._v(t._s(t.kindName(t.info.task_kind)))])])])])])},staticRenderFns:[]};var o=a("VU/8")(n,r,!1,function(t){a("ea8+")},"data-v-2a342e7c",null).exports,c={props:{title:String,content:String}},l={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"cell-group"},[e("div",{staticClass:"title"},[this._v(this._s(this.title))]),this._v(" "),this._t("default",[e("div",{staticClass:"content",domProps:{innerHTML:this._s(this.content)}})])],2)},staticRenderFns:[]};var u=a("VU/8")(c,l,!1,function(t){a("Bm44")},"data-v-a508e782",null).exports,d={props:{items:Object},computed:{},mounted:function(){this.formatRuleItem(this.items.task_rule),this.formatRewardItem(this.items.task_reward)},methods:{formatRuleItem:function(t){var e=[];return t.forEach(function(t){for(var a in t){var s=t[a];if("is_complete"!=a&&"goods_name"!=a&&s){var i={};switch(i.value=s,i.finish=t.is_complete,a){case"referrals":i.name="推荐人数达",i.unit="人";break;case"distribution_commission":i.name="分销佣金达",i.unit="元";break;case"distribution_orders":i.name="分销订单达",i.unit="笔";break;case"pay_order_total_num":i.name="支付订单达",i.unit="笔";break;case"order_total_money":i.name="订单满额",i.unit="元";break;case"order_total_sum":i.name="订单累计",i.unit="元";break;case"goods_comment_num":i.name="累计评价",i.unit="次";break;case"total_recharge":i.name="累计充值达",i.unit="元";break;case"single_recharge":i.name="单次充值满",i.unit="元";break;case"goods_id":i.name="购买",i.goods_id=s,i.value=t.goods_name,i.unit="商品"}e.push(i)}}}),e},formatRewardItem:function(t){var e=this.$store.state.member.memberSetText,a=e.balance_style,s=e.point_style,i=[];for(var n in t){var r=t[n];if("gift_voucher_name"!=n&&"coupon_name"!=n&&r){var o={};switch(o.value=r,n){case"point":o.text="个"+s;break;case"balance":o.text="元"+a;break;case"wchat_red_packet":o.text="元微信红包";break;case"growth":o.text="成长值";break;case"gift_voucher_id":o.text="礼品券",o.value=t.gift_voucher_name;break;case"coupon_type_id":o.text="优惠券",o.value=t.coupon_name}i.push(o)}}return i}},components:{DetailCellGroup:u}},_={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("DetailCellGroup",{attrs:{title:"任务规则"}},t._l(t.formatRuleItem(t.items.task_rule),function(e,s){return a("van-cell",{key:s,staticClass:"cell"},[a("div",{staticClass:"cell-item",class:e.finish?"positive":"negative"},[t._v("\n        ● "+t._s(e.name)+"\n        "),a("span",{staticClass:"cell-value"},[t._v(t._s(e.value))]),t._v("\n        "+t._s(e.unit)+"\n      ")])])})),t._v(" "),a("DetailCellGroup",{attrs:{title:"任务奖励"}},t._l(t.formatRewardItem(t.items.task_reward),function(e,s){return a("van-cell",{key:s,staticClass:"cell"},[a("div",{staticClass:"cell-item text-secondary"},[t._v(t._s(s+1)+"、"+t._s(e.value)+" "+t._s(e.text))])])}))],1)},staticRenderFns:[]};var v=a("VU/8")(d,_,!1,function(t){a("RMM0")},"data-v-77ee370b",null).exports,m=Object(s.a)({name:"task-detail",data:function(){return{isLoading:!1,detail:{}}},computed:{showReceiveBtn:function(){return(3==this.detail.task_kind||4==this.detail.task_kind)&&1===this.detail.is_get},isDisabled:function(){return 0!==this.detail.is_get},btnText:function(){return this.isDisabled?this.detail.end_task_time+" 失效":"立即领取"}},mounted:function(){this.$store.state.config.addons.taskcenter?this.loadData():this.$refs.load.fail({errorText:"未开启任务中心应用",showFoot:!1})},methods:{loadData:function(){var t=this;Object(i.b)(this.$route.params.id,this.$route.query.user_task_id).then(function(e){var a=e.data;t.detail=a.general_task_detail,t.$refs.load.success()}).catch(function(){t.$refs.load.fail()})},onReceive:function(){var t=this,e=this.$route.params.id;this.isLoading=!0,Object(i.d)(e).then(function(e){var a=e.message;t.$Toast.success(a),t.isLoading=!1,t.loadData()}).catch(function(){t.isLoading=!1})}},components:{DetailHead:o,DetailCellGroup:u,DetailRuleRewardGroup:v}}),f={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("Layout",{ref:"load",staticClass:"task-detail"},[a("Navbar"),t._v(" "),a("DetailHead",{attrs:{info:t.detail}}),t._v(" "),a("DetailCellGroup",{attrs:{title:"任务时间",content:t.detail.start_task_time+" ~ "+t.detail.end_task_time}}),t._v(" "),a("DetailCellGroup",{attrs:{title:"任务要求"}},[2==t.detail.task_kind?a("div",{staticClass:"text-regular"},[t._v("\n      每隔\n      "),a("span",{staticClass:"text-maintone"},[t._v(t._s(t.detail.task_limit_time))]),t._v(" 小时可重新领取，领取后\n      "),a("span",{staticClass:"text-maintone"},[t._v(t._s(t.detail.task_limit_time))]),t._v(" 小时内完成\n    ")]):a("div",{staticClass:"text-regular"},[t._v("\n      领取后\n      "),a("span",{staticClass:"text-maintone"},[t._v(t._s(t.detail.task_limit_time))]),t._v(" 小时内完成\n    ")])]),t._v(" "),t._l(t.detail.task_rule_reward,function(t,e){return a("DetailRuleRewardGroup",{key:e,attrs:{items:t}})}),t._v(" "),a("DetailCellGroup",{attrs:{title:"任务说明",content:t.detail.task_explain}}),t._v(" "),t.showReceiveBtn?a("div",{staticClass:"fixed-foot-btn-group"},[a("van-button",{attrs:{size:"normal",type:"danger",round:"",block:"",disabled:t.isDisabled,loading:t.isLoading},on:{click:t.onReceive}},[t._v(t._s(t.btnText))])],1):t._e()],2)},staticRenderFns:[]};var h=a("VU/8")(m,f,!1,function(t){a("Kfni")},"data-v-c68c22ee",null);e.default=h.exports},Bm44:function(t,e){},EI9Q:function(t,e){},Kfni:function(t,e){},Q3je:function(t,e,a){"use strict";e.a=function(t){return Object(s.a)({url:"/addons/taskcenter/taskcenter/getTaskList",method:"post",data:t})},e.d=function(t){return Object(s.a)({url:"/addons/taskcenter/taskcenter/getMyTask",method:"post",data:{general_poster_id:t}})},e.c=function(t){return Object(s.a)({url:"/addons/taskcenter/taskcenter/getMyTaskList",method:"post",data:t})},e.b=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"";return Object(s.a)({url:"/addons/taskcenter/taskcenter/getTaskDetail",method:"post",data:{general_poster_id:t,user_task_id:e}})};var s=a("vLgD")},RMM0:function(t,e){},Txgu:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),i=a("iVvP"),n={data:function(){return{}},props:{info:Object}},r={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"head card-group-box"},[a("img",{staticClass:"bg",attrs:{src:t.$BASEIMGPATH+"task-head-bg.png"}}),t._v(" "),a("div",{staticClass:"box"},[a("div",{staticClass:"info"},[a("div",{staticClass:"img"},[a("img",{attrs:{src:t._f("BASESRC")(t.info.user_headimg),onerror:t.$ERRORPIC.noAvatar}})]),t._v(" "),a("div",{staticClass:"text"},[a("div",{staticClass:"name"},[t._v(t._s(t.info.user_name))]),t._v(" "),a("div",{staticClass:"name"},[t._v("\n          待完成\n          "),a("span",{staticClass:"strong"},[t._v(t._s(t.info.unfinished_count))]),t._v(" 个任务\n        ")])])]),t._v(" "),a("div",{staticClass:"btn-group flex-auto-center"},[a("van-button",{staticClass:"btn",attrs:{round:"",hairline:"",size:"small",to:"/task/list"}},[t._v("我的任务")])],1)])])},staticRenderFns:[]};var o=a("VU/8")(n,r,!1,function(t){a("fN0i")},"data-v-0f3cf6b6",null).exports,c=a("oxrl"),l=a("Q3je"),u=a("msXN"),d={data:function(){return{isDisabled:!1,isLoading:!1}},props:{state:[String,Number],id:[String,Number]},mixins:[u.a],methods:{receive:function(){var t=this,e=this.id;this.isLoading=!0,Object(l.d)(e).then(function(e){var a=e.message;t.isDisabled=!0,t.$Toast.success(a),t.isLoading=!1}).catch(function(){t.isLoading=!1})}}},_={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return 0==t.state?a("van-button",{staticClass:"btn",attrs:{type:"danger",round:"",hairline:"",size:"small",disabled:t.isDisabled,loading:t.isLoading},on:{click:function(e){t.bindMobile("receive")}}},[t._v("领取")]):t._e()},staticRenderFns:[]},v=a("VU/8")(d,_,!1,null,null,null).exports,m=Object(s.a)({name:"task-centre",data:function(){return{info:{},active:0,tabs:[{name:"单次任务",task_kind:1},{name:"多次任务",task_kind:2}],params:{task_kind:1}}},mixins:[u.e],mounted:function(){this.$store.state.config.addons.taskcenter&&this.loadList()},methods:{onTab:function(t){var e=this.tabs[t].task_kind;this.params.task_kind=e,this.loadList("init")},loadList:function(t){var e=this;t&&"init"===t&&e.initList(),Object(l.a)(e.params).then(function(a){var s=a.data,i=s.user_task_info?s.user_task_info.task_info:[];e.info=s.user_task_info.user_info,e.pushToList(i,s.page_count,t)}).catch(function(){e.loadError()})}},components:{Empty:i.a,Header:o,ListItem:c.a,ReceiveBtn:v}}),f={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"task-centre"},[t.$store.state.config.addons.taskcenter?[a("Navbar"),t._v(" "),a("Header",{attrs:{info:t.info}}),t._v(" "),a("van-tabs",{on:{change:t.onTab},model:{value:t.active,callback:function(e){t.active=e},expression:"active"}},t._l(t.tabs,function(t,e){return a("van-tab",{key:e,attrs:{title:t.name}})})),t._v(" "),a("List",{staticClass:"list",attrs:{finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{message:"没有相关任务",top:t.$store.state.isWeixin?126:166}},on:{"update:error":function(e){t.error=e},load:t.loadList},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(t,e){return a("ListItem",{key:e,attrs:{items:t}},[a("ReceiveBtn",{attrs:{slot:"right",state:t.task_info_status,id:t.general_poster_id},slot:"right"})],1)}))]:a("Empty",{attrs:{"page-type":"fail",message:"未开启任务中心应用","show-foot":!1}})],2)},staticRenderFns:[]};var h=a("VU/8")(m,f,!1,function(t){a("3cbI")},"data-v-d1f3fc08",null);e.default=h.exports},W3Rv:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("eKM9"),i=a("iVvP"),n=a("ORU3"),r=a("oxrl"),o={data:function(){return{arr:[{state:1,icon:"clock-o",color:"#1989fa",text:"进行中"},{state:2,icon:"passed",color:"#06bf04",text:"已完成"},{state:3,icon:"close",color:"#909399",text:"已失效"}]}},props:{state:[Number,String]},computed:{active:function(){var t=this;return this.arr.filter(function(e){return e.state==t.state})[0]}}},c={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"box"},[e("van-icon",{staticClass:"icon",attrs:{name:this.active.icon,color:this.active.color,size:"2.2em"}}),this._v(" "),e("span",{staticClass:"text",style:"color:"+this.active.color},[this._v(this._s(this.active.text))])],1)},staticRenderFns:[]};var l=a("VU/8")(o,c,!1,function(t){a("Y1Gl")},"data-v-71572f62",null).exports,u=a("Q3je"),d=a("msXN"),_=Object(s.a)({name:"task-list",data:function(){return{info:{},tab_active:0,tabs:[{name:"进行中",task_status:1},{name:"已完成",task_status:2},{name:"已失效",task_status:3}],params:{task_status:1}}},mixins:[d.e],mounted:function(){this.loadList()},methods:{onTab:function(t){var e=this.tabs[t].task_status;this.params.task_status=e,this.loadList("init")},loadList:function(t){var e=this;t&&"init"===t&&e.initList(),Object(u.c)(e.params).then(function(a){var s=a.data,i=s.user_task_info?s.user_task_info.task_info:[];e.info=s.user_task_info.user_info,e.pushToList(i,s.page_count,t)}).catch(function(){e.loadError()})}},components:{Empty:i.a,HeadTab:n.a,ListItem:r.a,TaskState:l}}),v={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"task-list"},[t.$store.state.config.addons.taskcenter?[a("Navbar"),t._v(" "),a("HeadTab",{attrs:{tabs:t.tabs},on:{"tab-change":t.onTab},model:{value:t.tab_active,callback:function(e){t.tab_active=e},expression:"tab_active"}}),t._v(" "),a("List",{staticClass:"list",attrs:{finished:t.finished,error:t.error,"is-empty":t.isListEmpty,empty:{message:"没有相关任务"}},on:{"update:error":function(e){t.error=e},load:t.loadList},model:{value:t.loading,callback:function(e){t.loading=e},expression:"loading"}},t._l(t.list,function(e,s){return a("ListItem",{key:s,attrs:{items:e}},[a("TaskState",{attrs:{slot:"right",state:t.params.task_status},slot:"right"})],1)}))]:a("Empty",{attrs:{"page-type":"fail",message:"未开启任务中心应用","show-foot":!1}})],2)},staticRenderFns:[]};var m=a("VU/8")(_,v,!1,function(t){a("klsr")},"data-v-4066bf85",null);e.default=m.exports},Y1Gl:function(t,e){},"ea8+":function(t,e){},fN0i:function(t,e){},klsr:function(t,e){},oxrl:function(t,e,a){"use strict";var s={data:function(){return{}},props:{items:Object},computed:{ruleItem:function(){var t=[];return this.items.task_rule.forEach(function(e){for(var a in e){var s=e[a];if("goods_name"!=a&&s){var i={};switch(i.value=s,a){case"referrals":i.name="推荐人数达",i.unit="人";break;case"distribution_commission":i.name="分销佣金达",i.unit="元";break;case"distribution_orders":i.name="分销订单达",i.unit="笔";break;case"pay_order_total_num":i.name="支付订单达",i.unit="笔";break;case"order_total_money":i.name="订单满额",i.unit="元";break;case"order_total_sum":i.name="订单累计",i.unit="元";break;case"goods_comment_num":i.name="累计评价",i.unit="次";break;case"total_recharge":i.name="累计充值达",i.unit="元";break;case"single_recharge":i.name="单次充值满",i.unit="元";break;case"goods_id":i.name="购买",i.goods_id=s,i.value=e.goods_name,i.unit="商品"}t.push(i)}}}),t}},methods:{toDetail:function(t){var e=t.general_poster_id,a=t.user_task_id,s={name:"task-detail",params:{id:e}};return a&&(s.query={user_task_id:a}),s}}},i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("van-cell",{attrs:{"value-class":"item"}},[a("div",{staticClass:"text-group"},[a("div",{staticClass:"name"},[t._v(t._s(t.items.task_name))]),t._v(" "),a("div",{staticClass:"rule"},t._l(t.ruleItem,function(e,s){return a("div",{key:s,staticClass:"text"},[t._v("\n        "+t._s(e.name)+"\n        "),e.goods_id?a("router-link",{staticClass:"text-maintone",attrs:{tag:"span",to:"/goods/detail/"+e.goods_id}},[t._v(t._s(e.value))]):a("span",{staticClass:"text-maintone"},[t._v(t._s(e.value))]),t._v("\n        "+t._s(e.unit)+"\n      ")],1)})),t._v(" "),a("router-link",{staticClass:"a-link",attrs:{to:t.toDetail(t.items),tag:"span"}},[t._v("任务详情 >")])],1),t._v(" "),a("div",{staticClass:"right-group"},[t._t("right")],2)])},staticRenderFns:[]};var n=a("VU/8")(s,i,!1,function(t){a("EI9Q")},"data-v-7abf28fb",null);e.a=n.exports}});