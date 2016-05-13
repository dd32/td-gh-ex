var isMobile={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return isMobile.Android()||isMobile.BlackBerry()||isMobile.iOS()||isMobile.Opera()||isMobile.Windows()}};!function($){"use strict";$.fn.kt_imagesLoaded=function(){var t=function(t,e,n){var i,r=!1,a=$(t).parent(),o=$("<img />"),l=$(t).attr("srcset"),u=$(t).attr("sizes")||"100vw",s=$(t).attr("src"),c=function(){o.off("load error",c),clearTimeout(i),e()};n&&(i=setTimeout(c,n)),o.on("load error",c),a.is("picture")&&(a=a.clone(),a.find("img").remove().end(),a.append(o),r=!0),l?(o.attr("sizes",u),o.attr("srcset",l),r||o.appendTo(document.createElement("div")),r=!0):s&&o.attr("src",s),r&&!window.HTMLPictureElement&&(window.respimage?window.respimage({elements:[o[0]]}):window.picturefill?window.picturefill({elements:[o[0]]}):s&&o.attr("src",s))};return function(e){var n=0,i=$("img",this).add(this.filter("img")),r=function(){n++,n>=i.length&&e()};return i.length?(i.each(function(){t(this,r)}),this):e()}}()}(jQuery),jQuery(document).ready(function($){function t(t,e){return/(png|jpg|jpeg|gif|tiff|bmp)$/.test($(e).attr("href").toLowerCase().split("?")[0].split("#")[0])}function e(){$("a[href]").filter(t).attr("data-rel","lightbox")}$("[rel=tooltip]").tooltip(),$("[data-toggle=tooltip]").tooltip(),$("[rel=popover]").popover(),$("#authorTab a").click(function(t){t.preventDefault(),$(this).tab("show")}),$(".sc_tabs a").click(function(t){t.preventDefault(),$(this).tab("show")}),$(".videofit").fitVids(),$(".woocommerce-ordering .orderby").customSelect(),$(".kad-select").customSelect(),$.extend(!0,$.magnificPopup.defaults,{tClose:"",image:{titleSrc:function(t){return t.el.find("img").attr("alt")}}}),$(".collapse-next").click(function(t){var e=$(this).siblings(".sf-dropdown-menu");e.hasClass("in")?(e.collapse("toggle"),$(this).removeClass("toggle-active")):(e.collapse("toggle"),$(this).addClass("toggle-active"))}),e(),$("a[rel^='lightbox']").magnificPopup({type:"image"}),$("a[data-rel^='lightbox']").magnificPopup({type:"image"}),$(".kad-light-gallery").each(function(){$(this).find('a[rel^="lightbox"]').magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:"title"}})}),$(".kad-light-gallery").each(function(){$(this).find("a[data-rel^='lightbox']").magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:"title"}})}),$(".kad-light-wp-gallery").each(function(){$(this).find('a[rel^="lightbox"]').magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:function(t){return t.el.find("img").attr("alt")}}})}),$(".kad-light-wp-gallery").each(function(){$(this).find("a[data-rel^='lightbox']").magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:function(t){return t.el.find("img").attr("alt")}}})}),$("ul.sf-menu").superfish({delay:200,animation:{opacity:"show",height:"show"},speed:"fast"}),$(".kt-flexslider").each(function(){var t=$(this).data("flex-speed"),e=$(this).data("flex-animation"),n=$(this).data("flex-anim-speed"),i=$(this).data("flex-auto");$(this).flexslider({animation:e,animationSpeed:n,slideshow:i,slideshowSpeed:t,start:function(t){t.removeClass("loading")}})}),$(".init-masonry").each(function(){var t=$(this),e=$(this).data("masonry-selector");t.kt_imagesLoaded(function(){t.masonry({itemSelector:e})})}),$(".kt-masonry-init").each(function(){var t=$(this),e=$(this).data("masonry-selector");t.kt_imagesLoaded(function(){t.masonry({itemSelector:e})})}),jQuery(".initcaroufedsel").each(function(){function t(){var t;return t=jQuery(window).width()<=540?h.width()/s:jQuery(window).width()<=768?h.width()/c:jQuery(window).width()<=990?h.width()/d:h.width()/f}function e(){var e=t()-1;i.children().css({width:e})}function n(){i.carouFredSel({scroll:{items:1,easing:"swing",duration:o,pauseOnHover:!0},auto:{play:l,timeoutDuration:a},prev:"#prevport-"+u,next:"#nextport-"+u,pagination:!1,swipe:!0,items:{visible:null}})}var i=jQuery(this),r=i.data("carousel-container"),a=i.data("carousel-speed"),o=i.data("carousel-transition"),l=i.data("carousel-auto"),u=i.data("carousel-id"),s=i.data("carousel-ss"),c=i.data("carousel-xs"),d=i.data("carousel-sm"),f=i.data("carousel-md"),h=jQuery(r);e(),i.kt_imagesLoaded(function(){n()}),h.animate({opacity:1}),jQuery(window).on("debouncedresize",function(t){i.trigger("destroy"),e(),n()})}),jQuery(".initcarouselslider").each(function(){function t(){var t=n.width();n.children().css({width:t}),jQuery(window).width()<=768&&(u=null,n.children().css({height:"auto"}))}function e(){n.carouFredSel({width:"100%",height:u,align:s,auto:{play:o,timeoutDuration:r},scroll:{items:1,easing:"quadratic"},items:{visible:1,width:"variable"},prev:"#prevport-"+l,next:"#nextport-"+l,swipe:{onMouse:!1,onTouch:!0}})}var n=jQuery(this),i=n.data("carousel-container"),r=n.data("carousel-speed"),a=n.data("carousel-transition"),o=n.data("carousel-auto"),l=n.data("carousel-id"),u=n.data("carousel-height"),s="center",c=jQuery(i);t(),n.kt_imagesLoaded(function(){e(),c.animate({opacity:1}),c.css({height:"auto"}),c.parent().removeClass("loading")}),jQuery(window).on("debouncedresize",function(i){n.trigger("destroy"),t(),e()})})}),isMobile.any()&&jQuery(document).ready(function($){matchMedia("only screen and (max-width: 480px)").addListener(function(t){$("select.hasCustomSelect").removeAttr("style"),$("select.hasCustomSelect").css({width:"250px"}),$(".kad-select.customSelect").remove(),$("select.kad-select").customSelect(),$(".customSelectInner").css("width","100%")})});var ua=navigator.userAgent.toLowerCase(),isAndroid=ua.indexOf("android")>-1;isAndroid&&(!function(t){"function"==typeof define&&define.amd&&define.amd.jQuery?define(["jquery"],t):t(jQuery)}(function(t){function e(e){return!e||void 0!==e.allowPageScroll||void 0===e.tswipe&&void 0===e.tswipeStatus||(e.allowPageScroll=s),void 0!==e.click&&void 0===e.tap&&(e.tap=e.click),e||(e={}),e=t.extend({},t.fn.tswipe.defaults,e),this.each(function(){var i=t(this),r=i.data(E);r||(r=new n(this,e),i.data(E,r))})}function n(e,n){function k(e){if(!(ut()||t(e.target).closest(n.excludedElements,Wt).length>0)){var i=e.originalEvent?e.originalEvent:e,r,a=O?i.touches[0]:i;return qt=b,O?Ft=i.touches.length:e.preventDefault(),Rt=0,_t=null,Bt=null,Ct=0,It=0,Ht=0,Nt=1,Ut=0,Xt=ht(),zt=wt(),ot(),!O||Ft===n.fingers||n.fingers===m||B()?(ct(0,a),Yt=Et(),2==Ft&&(ct(1,i.touches[1]),It=Ht=yt(Xt[0].start,Xt[1].start)),(n.tswipeStatus||n.pinchStatus)&&(r=D(i,qt))):r=!1,r===!1?(qt=S,D(i,qt),r):(st(!0),null)}}function M(t){var e=t.originalEvent?t.originalEvent:t;if(qt!==x&&qt!==S&&!lt()){var i,r=O?e.touches[0]:e,a=dt(r);if(Vt=Et(),O&&(Ft=e.touches.length),qt=T,2==Ft&&(0==It?(ct(1,e.touches[1]),It=Ht=yt(Xt[0].start,Xt[1].start)):(dt(e.touches[1]),Ht=yt(Xt[0].end,Xt[1].end),Bt=Tt(Xt[0].end,Xt[1].end)),Nt=bt(It,Ht),Ut=Math.abs(It-Ht)),Ft===n.fingers||n.fingers===m||!O||B()){if(_t=Ot(a.start,a.end),N(t,_t),Rt=xt(a.start,a.end),Ct=mt(),pt(_t,Rt),(n.tswipeStatus||n.pinchStatus)&&(i=D(e,qt)),!n.triggerOnTouchEnd||n.triggerOnTouchLeave){var o=!0;if(n.triggerOnTouchLeave){var l=kt(this);o=Mt(a.end,l)}!n.triggerOnTouchEnd&&o?qt=Q(T):n.triggerOnTouchLeave&&!o&&(qt=Q(x)),qt!=S&&qt!=x||D(e,qt)}}else qt=S,D(e,qt);i===!1&&(qt=S,D(e,qt))}}function L(t){var e=t.originalEvent;return O&&e.touches.length>0?(at(),!0):(lt()&&(Ft=Zt),t.preventDefault(),Vt=Et(),Ct=mt(),C()?(qt=S,D(e,qt)):n.triggerOnTouchEnd||0==n.triggerOnTouchEnd&&qt===T?(qt=x,D(e,qt)):!n.triggerOnTouchEnd&&V()?(qt=x,R(e,qt,h)):qt===T&&(qt=S,D(e,qt)),st(!1),null)}function j(){Ft=0,Vt=0,Yt=0,It=0,Ht=0,Nt=1,ot(),st(!1)}function P(t){var e=t.originalEvent;n.triggerOnTouchLeave&&(qt=Q(x),D(e,qt))}function A(){Wt.unbind(jt,k),Wt.unbind(Dt,j),Wt.unbind(Pt,M),Wt.unbind(At,L),Qt&&Wt.unbind(Qt,P),st(!1)}function Q(t){var e=t,i=H(),r=_(),a=C();return!i||a?e=S:!r||t!=T||n.triggerOnTouchEnd&&!n.triggerOnTouchLeave?!r&&t==x&&n.triggerOnTouchLeave&&(e=S):e=x,e}function D(t,e){var n=void 0;return F()||q()?n=R(t,e,d):(z()||B())&&n!==!1&&(n=R(t,e,f)),it()&&n!==!1?n=R(t,e,p):rt()&&n!==!1?n=R(t,e,g):nt()&&n!==!1&&(n=R(t,e,h)),e===S&&j(t),e===x&&(O?0==t.touches.length&&j(t):j(t)),n}function R(e,s,c){var w=void 0;if(c==d){if(Wt.trigger("tswipeStatus",[s,_t||null,Rt||0,Ct||0,Ft]),n.tswipeStatus&&(w=n.tswipeStatus.call(Wt,e,s,_t||null,Rt||0,Ct||0,Ft),w===!1))return!1;if(s==x&&W()){if(Wt.trigger("tswipe",[_t,Rt,Ct,Ft]),n.tswipe&&(w=n.tswipe.call(Wt,e,_t,Rt,Ct,Ft),w===!1))return!1;switch(_t){case i:Wt.trigger("tswipeLeft",[_t,Rt,Ct,Ft]),n.tswipeLeft&&(w=n.tswipeLeft.call(Wt,e,_t,Rt,Ct,Ft));break;case r:Wt.trigger("tswipeRight",[_t,Rt,Ct,Ft]),n.tswipeRight&&(w=n.tswipeRight.call(Wt,e,_t,Rt,Ct,Ft));break;case a:Wt.trigger("tswipeUp",[_t,Rt,Ct,Ft]),n.tswipeUp&&(w=n.tswipeUp.call(Wt,e,_t,Rt,Ct,Ft));break;case o:Wt.trigger("tswipeDown",[_t,Rt,Ct,Ft]),n.tswipeDown&&(w=n.tswipeDown.call(Wt,e,_t,Rt,Ct,Ft))}}}if(c==f){if(Wt.trigger("pinchStatus",[s,Bt||null,Ut||0,Ct||0,Ft,Nt]),n.pinchStatus&&(w=n.pinchStatus.call(Wt,e,s,Bt||null,Ut||0,Ct||0,Ft,Nt),w===!1))return!1;if(s==x&&U())switch(Bt){case l:Wt.trigger("pinchIn",[Bt||null,Ut||0,Ct||0,Ft,Nt]),n.pinchIn&&(w=n.pinchIn.call(Wt,e,Bt||null,Ut||0,Ct||0,Ft,Nt));break;case u:Wt.trigger("pinchOut",[Bt||null,Ut||0,Ct||0,Ft,Nt]),n.pinchOut&&(w=n.pinchOut.call(Wt,e,Bt||null,Ut||0,Ct||0,Ft,Nt))}}return c==h?s!==S&&s!==x||(clearTimeout(Jt),G()&&!K()?($t=Et(),Jt=setTimeout(t.proxy(function(){$t=null,Wt.trigger("tap",[e.target]),n.tap&&(w=n.tap.call(Wt,e,e.target))},this),n.doubleTapThreshold)):($t=null,Wt.trigger("tap",[e.target]),n.tap&&(w=n.tap.call(Wt,e,e.target)))):c==p?s!==S&&s!==x||(clearTimeout(Jt),$t=null,Wt.trigger("doubletap",[e.target]),n.doubleTap&&(w=n.doubleTap.call(Wt,e,e.target))):c==g&&(s!==S&&s!==x||(clearTimeout(Jt),$t=null,Wt.trigger("longtap",[e.target]),n.longTap&&(w=n.longTap.call(Wt,e,e.target)))),w}function _(){var t=!0;return null!==n.threshold&&(t=Rt>=n.threshold),t}function C(){var t=!1;return null!==n.cancelThreshold&&null!==_t&&(t=gt(_t)-Rt>=n.cancelThreshold),t}function I(){return null!==n.pinchThreshold?Ut>=n.pinchThreshold:!0}function H(){var t;return t=n.maxTimeThreshold?!(Ct>=n.maxTimeThreshold):!0}function N(t,e){if(n.allowPageScroll===s||B())t.preventDefault();else{var l=n.allowPageScroll===c;switch(e){case i:(n.tswipeLeft&&l||!l&&n.allowPageScroll!=w)&&t.preventDefault();break;case r:(n.tswipeRight&&l||!l&&n.allowPageScroll!=w)&&t.preventDefault();break;case a:(n.tswipeUp&&l||!l&&n.allowPageScroll!=v)&&t.preventDefault();break;case o:(n.tswipeDown&&l||!l&&n.allowPageScroll!=v)&&t.preventDefault()}}}function U(){var t=X(),e=Y(),n=I();return t&&e&&n}function B(){return!!(n.pinchStatus||n.pinchIn||n.pinchOut)}function z(){return!(!U()||!B())}function W(){var t=H(),e=_(),n=X(),i=Y(),r=C(),a=!r&&i&&n&&e&&t;return a}function q(){return!!(n.tswipe||n.tswipeStatus||n.tswipeLeft||n.tswipeRight||n.tswipeUp||n.tswipeDown)}function F(){return!(!W()||!q())}function X(){return Ft===n.fingers||n.fingers===m||!O}function Y(){return 0!==Xt[0].end.x}function V(){return!!n.tap}function G(){return!!n.doubleTap}function Z(){return!!n.longTap}function J(){if(null==$t)return!1;var t=Et();return G()&&t-$t<=n.doubleTapThreshold}function K(){return J()}function tt(){return(1===Ft||!O)&&(isNaN(Rt)||0===Rt)}function et(){return Ct>n.longTapThreshold&&y>Rt}function nt(){return!(!tt()||!V())}function it(){return!(!J()||!G())}function rt(){return!(!et()||!Z())}function at(){Gt=Et(),Zt=event.touches.length+1}function ot(){Gt=0,Zt=0}function lt(){var t=!1;if(Gt){var e=Et()-Gt;e<=n.fingerReleaseThreshold&&(t=!0)}return t}function ut(){return!(Wt.data(E+"_intouch")!==!0)}function st(t){t===!0?(Wt.bind(Pt,M),Wt.bind(At,L),Qt&&Wt.bind(Qt,P)):(Wt.unbind(Pt,M,!1),Wt.unbind(At,L,!1),Qt&&Wt.unbind(Qt,P,!1)),Wt.data(E+"_intouch",t===!0)}function ct(t,e){var n=void 0!==e.identifier?e.identifier:0;return Xt[t].identifier=n,Xt[t].start.x=Xt[t].end.x=e.pageX||e.clientX,Xt[t].start.y=Xt[t].end.y=e.pageY||e.clientY,Xt[t]}function dt(t){var e=void 0!==t.identifier?t.identifier:0,n=ft(e);return n.end.x=t.pageX||t.clientX,n.end.y=t.pageY||t.clientY,n}function ft(t){for(var e=0;e<Xt.length;e++)if(Xt[e].identifier==t)return Xt[e]}function ht(){for(var t=[],e=0;5>=e;e++)t.push({start:{x:0,y:0},end:{x:0,y:0},identifier:0});return t}function pt(t,e){e=Math.max(e,gt(t)),zt[t].distance=e}function gt(t){return zt[t]?zt[t].distance:void 0}function wt(){var t={};return t[i]=vt(i),t[r]=vt(r),t[a]=vt(a),t[o]=vt(o),t}function vt(t){return{direction:t,distance:0}}function mt(){return Vt-Yt}function yt(t,e){var n=Math.abs(t.x-e.x),i=Math.abs(t.y-e.y);return Math.round(Math.sqrt(n*n+i*i))}function bt(t,e){var n=e/t*1;return n.toFixed(2)}function Tt(){return 1>Nt?u:l}function xt(t,e){return Math.round(Math.sqrt(Math.pow(e.x-t.x,2)+Math.pow(e.y-t.y,2)))}function St(t,e){var n=t.x-e.x,i=e.y-t.y,r=Math.atan2(i,n),a=Math.round(180*r/Math.PI);return 0>a&&(a=360-Math.abs(a)),a}function Ot(t,e){var n=St(t,e);return 45>=n&&n>=0?i:360>=n&&n>=315?i:n>=135&&225>=n?r:n>45&&135>n?o:a}function Et(){var t=new Date;return t.getTime()}function kt(e){e=t(e);var n=e.offset(),i={left:n.left,right:n.left+e.outerWidth(),top:n.top,bottom:n.top+e.outerHeight()};return i}function Mt(t,e){return t.x>e.left&&t.x<e.right&&t.y>e.top&&t.y<e.bottom}var Lt=O||!n.fallbackToMouseEvents,jt=Lt?"touchstart":"mousedown",Pt=Lt?"touchmove":"mousemove",At=Lt?"touchend":"mouseup",Qt=Lt?null:"mouseleave",Dt="touchcancel",Rt=0,_t=null,Ct=0,It=0,Ht=0,Nt=1,Ut=0,Bt=0,zt=null,Wt=t(e),qt="start",Ft=0,Xt=null,Yt=0,Vt=0,Gt=0,Zt=0,$t=0,Jt=null;try{Wt.bind(jt,k),Wt.bind(Dt,j)}catch(Kt){t.error("events not supported "+jt+","+Dt+" on jQuery.tswipe")}this.enable=function(){return Wt.bind(jt,k),Wt.bind(Dt,j),Wt},this.disable=function(){return A(),Wt},this.destroy=function(){return A(),Wt.data(E,null),Wt},this.option=function(e,i){if(void 0!==n[e]){if(void 0===i)return n[e];n[e]=i}else t.error("Option "+e+" does not exist on jQuery.tswipe.options");return null}}var i="left",r="right",a="up",o="down",l="in",u="out",s="none",c="auto",d="tswipe",f="pinch",h="tap",p="doubletap",g="longtap",w="horizontal",v="vertical",m="all",y=10,b="start",T="move",x="end",S="cancel",O="ontouchstart"in window,E="TouchtSwipe",k={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,tswipe:null,tswipeLeft:null,tswipeRight:null,tswipeUp:null,tswipeDown:null,tswipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,triggerOnTouchEnd:!0,triggerOnTouchLeave:!1,allowPageScroll:"auto",fallbackToMouseEvents:!0,excludedElements:"label, button, input, select, textarea, a, .notSwipe"};t.fn.tswipe=function(n){var i=t(this),r=i.data(E);if(r&&"string"==typeof n){if(r[n])return r[n].apply(this,Array.prototype.slice.call(arguments,1));t.error("Method "+n+" does not exist on jQuery.tswipe")}else if(!(r||"object"!=typeof n&&n))return e.apply(this,arguments);return i},t.fn.tswipe.defaults=k,t.fn.tswipe.phases={PHASE_START:b,PHASE_MOVE:T,PHASE_END:x,PHASE_CANCEL:S},t.fn.tswipe.directions={LEFT:i,RIGHT:r,UP:a,DOWN:o,IN:l,OUT:u},t.fn.tswipe.pageScroll={NONE:s,HORIZONTAL:w,VERTICAL:v,AUTO:c},t.fn.tswipe.fingers={ONE:1,TWO:2,THREE:3,ALL:m}}),jQuery(document).ready(function($){$(".caroufedselclass").tswipe({excludedElements:"button, input, select, textarea, .noSwipe",tswipeLeft:function(){$(".caroufedselclass").trigger("next",1)},tswipeRight:function(){$(".caroufedselclass").trigger("prev",1)},tap:function(t,e){window.open(jQuery(e).closest(".grid_item").find("a").attr("href"),"_self")}})}));