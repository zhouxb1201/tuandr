webpackJsonp([37],{K3mk:function(t,a){},Wa3g:function(t,a,e){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var s=e("eKM9"),i=e("vLgD");var r=Object(s.a)({name:"festivalcare-center",data:function(){return{info:{}}},computed:{},mounted:function(){var t,a=this;if(this.$store.state.config.addons.festivalcare){var e=this.$route.params.prizeid;(t=e,Object(i.a)({url:"/addons/festivalcare/festivalcare/acceptFestivalcare",method:"post",data:{prize_id:t}})).then(function(t){var e=t.data;a.info=e,a.$refs.load.success()}).catch(function(){a.$refs.load.fail()})}else this.$refs.load.fail({errorText:"未开启节日关怀应用",showFoot:!1})}}),n={render:function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("Layout",{ref:"load",staticClass:"festivalcare-center"},[e("Navbar"),t._v(" "),e("img",{staticClass:"bg",attrs:{src:t.$BASEIMGPATH+"festivalcare-bg.jpg"}}),t._v(" "),e("div",{staticClass:"wrap"},[e("div",{staticClass:"main"},[e("div",{staticClass:"img"},[e("img",{attrs:{src:t.info.prize_pic,onerror:t.$ERRORPIC.noGoods}})]),t._v(" "),e("div",{staticClass:"txt"},[e("h3",[t._v(t._s(t.info.prize_name?t.info.prize_name:""))]),t._v(" "),e("p",[t._v(t._s(t.info.name?t.info.name:""))])])]),t._v(" "),e("p",{staticClass:"tip"},[t._v("奖品已放置在列表当中")]),t._v(" "),e("router-link",{staticClass:"jump",attrs:{to:"/prize/list"}},[t._v("前往领取")])],1)],1)},staticRenderFns:[]};var c=e("VU/8")(r,n,!1,function(t){e("K3mk")},"data-v-13709ee9",null);a.default=c.exports}});