!function(e){var t={};function n(i){if(t[i])return t[i].exports;var o=t[i]={i:i,l:!1,exports:{}};return e[i].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(i,o,function(t){return e[t]}.bind(null,o));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);var i=document.getElementsByTagName("BODY")[0],o=document.scrollingElement||document.documentElement||document.body,s=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,l=Math.max(i.offsetHeight,i.scrollHeight),r=window.innerHeight,a={body:i,scrollingElem:o,scrollTop:s,bodyScrollDisabled:!1,scrollPosition:0,windowHeight:r,bodyHeight:l,isScrolling:!1,isResizing:!1,rafScrollCallbacks:[],rafResizeCallbacks:[],isRafRegistered:!1,isIos:function(){return/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream},isIe:function(){return/(trident|msie)/i.test(navigator.userAgent)},isTouch:function(){return!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch||navigator.maxTouchPoints)},onRaf:function(){var e=this.rafScrollCallbacks.length,t=this.rafResizeCallbacks.length;0!==e||0!==t?(this.isScrolling&&this.runRafScroll(),this.isResizing&&this.runRafResize(),window.requestAnimationFrame?window.requestAnimationFrame(this.onRaf.bind(this)):setTimeout(this.onRaf.bind(this),1e3/60)):this.isRafRegistered=!1},runRafScroll:function(){var e=this.rafScrollCallbacks.filter((function(e){return"unbind"!==e()}));this.rafScrollCallbacks=e},runRafResize:function(){var e=this.rafResizeCallbacks.filter((function(e){return"unbind"!==e()}));this.rafResizeCallbacks=e},addRaf:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"scroll";"function"==typeof e&&(e(),"resize"===t?this.rafResizeCallbacks.push(e):this.rafScrollCallbacks.push(e),!1===this.isRafRegistered&&(this.onRaf(),this.isRafRegistered=!0))},updateOnScroll:function(){var e=this,t=null;this.addRaf((function(){e.scrollTop=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,e.bodyHeight=Math.max(i.offsetHeight,i.scrollHeight)})),window.addEventListener("scroll",(function(n){e.isScrolling=!0,clearTimeout(t),t=setTimeout((function(){e.isScrolling=!1}),1e3/60)}))},updateOnResize:function(){var e=this,t=null,n=null;window.addEventListener("resize",(function(i){clearTimeout(t),t=setTimeout((function(){e.isResizing=!0,clearTimeout(n),n=setTimeout((function(){e.isResizing=!1}),60)}),1e3/60)}))},scrollDisable:function(){this.bodyScrollDisabled||(this.scrollPosition=this.scrollingElem.scrollTop,this.scrollingElem.scrollTop=0,this.scrollingElem.classList.add("no-scroll"),this.bodyScrollDisabled=!0)},scrollEnable:function(){this.bodyScrollDisabled&&(this.scrollingElem.classList.remove("no-scroll"),this.scrollingElem.scrollTop=this.scrollPosition,this.bodyScrollDisabled=!1)},objToArr:function(e){var t;return e!==Object(e)||Array.isArray(e)?e:(0===(t=Array.prototype.slice.call(e)).length&&t.push(e),t)},strToHTML:function(e){return"string"!=typeof e?e:(new DOMParser).parseFromString(e,"text/html").body.firstChild},eachElement:function(e,t){var n=this;null!==e&&this.objToArr(e).forEach((function(e){t.call(n,e)}))},on:function(e,t,n){var i=this;e.split(",").map((function(e){return e.trim()})).forEach((function(e){i.eachElement(t,(function(t){t.addEventListener(e,n)}))}))},off:function(e,t,n){var i=this;e.split(",").map((function(e){return e.trim()})).forEach((function(e){i.eachElement(t,(function(t){t.removeEventListener(e,n)}))}))},addClass:function(e,t){var n=this;t&&t.split(",").map((function(e){return e.trim()})).forEach((function(t){n.eachElement(e,(function(e){e.classList.add(t)}))}))},removeClass:function(e,t){var n=this;t&&t.split(",").map((function(e){return e.trim()})).forEach((function(t){n.eachElement(e,(function(e){e.classList.remove(t)}))}))},toggleClass:function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;t&&(!1===n?this.removeClass(e,t):!0===n?this.addClass(e,t):this.eachElement(e,(function(e){e.classList.toggle(t)})))},hasClass:function(e,t){var n=t.split(",").map((function(e){return e.trim()}));return void 0!==e.length&&(e=e[0]),void 0!==n.find((function(t){return e.classList.contains(t)}))},isHidden:function(e){return void 0!==e.length&&(e=e[0]),"none"===(e.currentStyle?e.currentStyle.display:getComputedStyle(e,null).display)},get:function(e,t){var n=this;return t=t||document,this.objToArr(t).reduce((function(t,i){var o=n.getElement(e,i);return null===o||0===o.length?t:t.concat(n.objToArr(o))}),[])},getElement:function(e,t){return t!==document&&1!==t.nodeType?null:"string"!=typeof e?null:/^#[\w-]*$/.test(e)?document.getElementById(e.slice(1)):/^\.[\w-]*$/.test(e)?t.getElementsByClassName(e.slice(1)):/^\w+$/.test(e)?t.getElementsByTagName(e):t.querySelectorAll(e)},animate:function(e,t,n,i,o,s){var l=n-t;this.animation(e,0,t,l,i,o,s)},animation:function(e,t,n,i,o,s,l){var r=this;t+=1e3/60;var a=this.easeInOutQuad(t,n,i,o);s(e,a),t<o?setTimeout((function(){r.animation(e,t,n,i,o,s,l)}),1e3/60):(s(e,n+i),"function"==typeof l&&l(e))},easeInOutQuad:function(e,t,n,i){return(e/=i/2)<1?n/2*e*e+t:-n/2*(--e*(e-2)-1)+t},addRosObject:function(e){var t=this,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"fadein",i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:20,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:250,s=arguments.length>4&&void 0!==arguments[4]?arguments[4]:0,l=arguments.length>5&&void 0!==arguments[5]?arguments[5]:"easeinout",r=0,a=null,c=this.get(e);null!==c&&0!==c.length&&(this.addClass(c,"rosobj"),c.forEach((function(e){var c=e.parentNode,u=t.bodyHeight,h=e.getBoundingClientRect().top+t.scrollTop,g=100-i;e.style.transitionDuration=o+"ms",e.style.transitionTimingFunction=l,0!==s&&(a!==c&&(r=1),a=c,e.style.transitionDelay=r*s+"ms",r++),n&&t.addRaf((function(){var i=h-t.scrollTop;if(u!==t.bodyHeight&&(i=e.getBoundingClientRect().top),Math.floor(i/t.windowHeight*100)<g)return e.classList.add(n),"unbind"}))})))},addSlider:function(e,t,n,i){var o=this,s=this.get(e);null!==s&&0!==s.length&&s.forEach((function(e){o.sliderFunctionality(e,t,n,i)}))},sliderFunctionality:function(e,t,n){var i=this,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"new",s=this.get(t,e),l=0,r=0,a=s.length-1,c=this.get(o.next,e),u=this.get(o.prev,e),h=function(){i.addClass(s[l],"makeitvisible"),i.removeClass(s[r],"makeitvisible");var t=s[r].offsetHeight,n=s[l].offsetHeight;i.animate(e,t,n,600,(function(e,t){e.style.height=t+"px"}))};e.style.overflow="hidden",this.addClass(e,n),this.addClass(s[0],"makeitvisible, firstslide"),this.on("click",c,(function(){++l>a&&(l=0),(r=l-1)<0&&(r=a),h()})),this.on("click",u,(function(){--l<0&&(l=a),(r=l+1)>a&&(r=0),h()}))},slideDown:function(e,t){var n=this,i=t||400;this.eachElement(e,(function(e){e.style.cssText="display: block; overflow: auto";var t=Math.max(e.offsetHeight,e.scrollHeight);e.style.cssText="display: block; overflow: hidden; height: 0;",n.animate(e,0,t,i,(function(e,t){e.style.height=t+"px"}),(function(e){e.style.cssText="display: block"}))}))},slideUp:function(e,t){var n=this,i=t||400;this.eachElement(e,(function(e){e.style.cssText="display: block; overflow: auto";var t=Math.max(e.offsetHeight,e.scrollHeight);e.style.cssText="display: block; overflow: hidden; height: 0;",n.animate(e,t,0,i,(function(e,t){e.style.height=t+"px"}),(function(e){e.style.cssText="display: none"}))}))}},c={global:window.bayleafScreenReaderText||{menu:"primary"},elems:{header:"#masthead",content:"#content",footer:"#colophon",main:"#main",eContent:".entry-content",mianNav:"#site-navigation",subMenuTog:".sub-menu-toggle",menuToggle:".menu-toggle",menuItems:".menu-item-has-children, .page_item_has_children",menuLinks:".menu-item-has-children a, .page_item_has_children a",dirLinks:".menu-item-has-children > a, .page_item_has_children > a",headWidToggle:".action-toggle",headWid:"#header-widget-area",hSearchToggle:".search-toggle",headSearch:"#header-search-wrapper",scrlTop:".scrl-to-top",comments:".comments-area",cToggle:".comments-toggle",widthStyle:".has-featured-img, .slider2, .dp-wrapper"},cls:{toggled:"toggled-on",toggler:"toggled-btn",single:"singular-view",visible:"makeitvisible"},vidsel:['iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="vimeo.com"]','iframe[src*="dailymotion.com"]','iframe[src*="videopress.com"]']};function u(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var h=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=c.elems;this.scrlTop=a.get(t.scrlTop),a.addRaf(this.scrlTopVisible.bind(this)),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){a.on("click",this.scrlTop,this.scrollTop)}},{key:"scrlTopVisible",value:function(){a.toggleClass(this.scrlTop,c.cls.visible,300<a.scrollTop)}},{key:"scrollTop",value:function(){var e=a.scrollingElem;a.animate(e,e.scrollTop,0,300,(function(e,t){e.scrollTop=t}))}}])&&u(t.prototype,n),i&&u(t,i),e}();function g(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var f=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=c.elems;this.header=a.get(t.header),this.nav=a.get(t.mianNav),this.menu=a.get("#".concat(c.global.menu)),this.menuToggle=a.get(t.menuToggle,this.header),this.subToggle=a.get(t.subMenuTog,this.menu),this.items=a.get(t.menuItems,this.menu),this.links=a.get(t.menuLinks,this.menu),this.dLinks=a.get(t.dirLinks,this.menu),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){a.on("click",this.menuToggle,this.toggleMenu.bind(this)),a.on("click",this.subToggle,this.toggleSubMenu),a.on("mouseenter, mouseleave",this.items,this.toggleItem),a.on("focus, blur",this.links,this.toggleLinkItems),a.on("touchstart",a.body,this.resetMenu.bind(this)),a.on("touchstart, click",this.dLinks,this.activateItem)}},{key:"toggleMenu",value:function(){a.toggleClass(this.menuToggle,c.cls.toggler),a.toggleClass(this.nav,c.cls.toggled)}},{key:"toggleSubMenu",value:function(){var e=this.nextElementSibling;a.toggleClass(this,c.cls.toggler),a.toggleClass(e,c.cls.toggled),a.hasClass(this,c.cls.toggler)?a.slideDown(e,200):a.slideUp(e,200)}},{key:"toggleItem",value:function(){a.toggleClass(this,c.cls.toggled)}},{key:"toggleLinkItems",value:function(){for(var e=this;null!==e&&!a.hasClass(e,"nav-menu");)a.hasClass(e,"menu-item, page_item")&&a.toggleClass(e,c.cls.toggled),e=e.parentElement}},{key:"resetMenu",value:function(e){a.isHidden(this.menuToggle)||this.menu.contains(e.target)||a.removeClass(this.items,c.cls.toggled)}},{key:"activateItem",value:function(e){var t=link.parentElement,n=t.parentElement.children;a.isHidden(a.get(c.elems.menuToggle))||a.hasClass(t,c.cls.toggled)||(e.preventDefault(),a.removeClass(n,c.cls.toggled),a.addClass(t,c.cls.toggled))}}])&&g(t.prototype,n),i&&g(t,i),e}();function d(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var m=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=c.elems;this.cutOffWidth=800,this.elems=a.get(t.widthStyle),this.widthStyleControl(),a.addRaf(this.widthStyleControl.bind(this),"resize")}var t,n,i;return t=e,(n=[{key:"widthStyleControl",value:function(){var e=this;a.eachElement(this.elems,(function(t){e.cutOffWidth>t.offsetWidth?a.removeClass(t,"widescreen"):a.addClass(t,"widescreen")}))}}])&&d(t.prototype,n),i&&d(t,i),e}();function v(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var p=function(){function e(){var t,n,i;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),i=void 0,(n="frames")in(t=this)?Object.defineProperty(t,n,{value:i,enumerable:!0,configurable:!0,writable:!0}):t[n]=i;var o=c.elems;this.main=a.get(o.main),this.content=a.get(o.eContent,this.main),a.hasClass(a.body,c.cls.single)&&0!==this.content.length&&(this.frames=a.get(c.vidsel.join(","),this.content),0!==this.frames.length&&(this.excludeAlreadyProcessed(),this.makeResponsive()))}var t,n,i;return t=e,(n=[{key:"excludeAlreadyProcessed",value:function(){var e=this.frames.filter((function(e){return"absolute"!==(e.currentStyle?e.currentStyle.position:getComputedStyle(e,null).position)}));this.frames=e}},{key:"makeResponsive",value:function(){this.frames.forEach((function(e){var t=document.createElement("div");t.className="video-container",e.parentNode.insertBefore(t,e),t.appendChild(e)}))}}])&&v(t.prototype,n),i&&v(t,i),e}();function y(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var b=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=c.elems;this.widget=a.get(t.headWid),this.toggler=a.get(t.headWidToggle,this.header),this.search=a.get(t.headSearch),this.sToggler=a.get(t.hSearchToggle,this.header),null!==this.widget&&this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){a.on("click",this.toggler,this.toggleWidget.bind(this)),a.on("click",this.sToggler,this.toggleSearch.bind(this))}},{key:"toggleWidget",value:function(){a.toggleClass(this.toggler,c.cls.toggler),a.toggleClass(this.widget,c.cls.toggled),a.hasClass(this.widget,c.cls.toggled)?a.scrollDisable():a.scrollEnable()}},{key:"toggleSearch",value:function(){var e=a.get(".search-field",this.search);setTimeout((function(){e[0].focus()}),250),a.toggleClass(this.sToggler,c.cls.toggler),a.toggleClass(this.search,c.cls.toggled),a.hasClass(this.search,c.cls.toggled)?a.scrollDisable():a.scrollEnable()}}])&&y(t.prototype,n),i&&y(t,i),e}();function w(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var T=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=c.elems;this.comments=a.get(t.comments),this.cToggle=a.get(t.cToggle),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){a.on("click",this.cToggle,this.toggleComments.bind(this))}},{key:"toggleComments",value:function(){a.toggleClass(this.cToggle,c.cls.toggler),a.hasClass(this.cToggle,c.cls.toggler)?a.slideDown(this.comments[0]):a.slideUp(this.comments[0])}}])&&w(t.prototype,n),i&&w(t,i),e}();function k(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var C=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.objectFit(),this.closest(),this.objectAssign(),this.arrayFind()}var t,n,i;return t=e,(n=[{key:"objectFit",value:function(){if(0=="objectFit"in document.documentElement.style){var e=document.querySelectorAll([".entry-thumbnail",".dp-thumbnail",".gallery-icon a",".header-image",".has-featured-img .thumb-wrapper"].join(","));Array.prototype.slice.call(e).forEach((function(e){var t=e.getElementsByTagName("img"),n=t.length?t[0].src:"";n&&(t[0].style.visibility="hidden",e.style.backgroundImage="url("+n+")",e.style.backgroundSize="cover",e.classList.contains("dp-thumbnail")||(e.style.backgroundPosition="center center"))}))}}},{key:"closest",value:function(){Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),Element.prototype.closest||(Element.prototype.closest=function(e){var t=this;do{if(t.matches(e))return t;t=t.parentElement||t.parentNode}while(null!==t&&1===t.nodeType);return null})}},{key:"objectAssign",value:function(){"function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(e,t){if(null==e)throw new TypeError("Cannot convert undefined or null to object");for(var n=Object(e),i=1;i<arguments.length;i++){var o=arguments[i];if(null!=o)for(var s in o)Object.prototype.hasOwnProperty.call(o,s)&&(n[s]=o[s])}return n},writable:!0,configurable:!0})}},{key:"arrayFind",value:function(){Array.prototype.find||Object.defineProperty(Array.prototype,"find",{value:function(e){if(null==this)throw TypeError('"this" is null or not defined');var t=Object(this),n=t.length>>>0;if("function"!=typeof e)throw TypeError("predicate must be a function");for(var i=arguments[1],o=0;o<n;){var s=t[o];if(e.call(i,s,o,t))return s;o++}},configurable:!0,writable:!0})}}])&&k(t.prototype,n),i&&k(t,i),e}();function E(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}new(function(){function e(t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),a.updateOnScroll(),a.updateOnResize(),a.addSlider(".slider-wrapper",".dp-entry","",{next:".dp-next-slide",prev:".dp-prev-slide"}),this.navigationMenu(),this.responsiveVideos(),this.scrollBackTop(),this.commentsToggle(),this.responsiveStyling(),this.headerWidgetToggle(),this.polyfill(),a.addRosObject(".brick","fadein",20,100),a.addRosObject(".dp-grid > .dp-entry, .fc-main-content, .mfc-feature, .fc-featured-images","",0,600,150)}var t,n,i;return t=e,(n=[{key:"navigationMenu",value:function(){new f}},{key:"responsiveVideos",value:function(){new p}},{key:"headerWidgetToggle",value:function(){new b}},{key:"scrollBackTop",value:function(){new h}},{key:"commentsToggle",value:function(){new T}},{key:"responsiveStyling",value:function(){new m}},{key:"polyfill",value:function(){new C}}])&&E(t.prototype,n),i&&E(t,i),e}())}]);