!function(e){var t={};function n(i){if(t[i])return t[i].exports;var o=t[i]={i:i,l:!1,exports:{}};return e[i].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(i,o,function(t){return e[t]}.bind(null,o));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";function o(e){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}n.r(t);var s=document.getElementsByTagName("BODY")[0],l=document.scrollingElement||document.documentElement||document.body,r=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,a=Math.max(s.offsetHeight,s.scrollHeight),c=window.innerHeight,u={body:s,scrollingElem:l,scrollTop:r,bodyScrollDisabled:!1,scrollPosition:0,windowHeight:c,bodyHeight:a,isScrolling:!1,isResizing:!1,rafScrollCallbacks:[],rafResizeCallbacks:[],isRafRegistered:!1,isIos:function(){return/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream},isIe:function(){return/(trident|msie)/i.test(navigator.userAgent)},isTouch:function(){return!!("ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch||navigator.maxTouchPoints)},onRaf:function(){var e=this.rafScrollCallbacks.length,t=this.rafResizeCallbacks.length;0!==e||0!==t?(this.isScrolling&&this.runRafScroll(),this.isResizing&&this.runRafResize(),window.requestAnimationFrame?window.requestAnimationFrame(this.onRaf.bind(this)):setTimeout(this.onRaf.bind(this),1e3/60)):this.isRafRegistered=!1},runRafScroll:function(){var e=this.rafScrollCallbacks.filter(function(e){return"unbind"!==e()});this.rafScrollCallbacks=e},runRafResize:function(){var e=this.rafResizeCallbacks.filter(function(e){return"unbind"!==e()});this.rafResizeCallbacks=e},addRaf:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"scroll";"function"==typeof e&&(e(),"resize"===t?this.rafResizeCallbacks.push(e):this.rafScrollCallbacks.push(e),!1===this.isRafRegistered&&(this.onRaf(),this.isRafRegistered=!0))},updateOnScroll:function(){var e=this,t=null;this.addRaf(function(){e.scrollTop=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0,e.bodyHeight=Math.max(s.offsetHeight,s.scrollHeight)}),window.addEventListener("scroll",function(n){e.isScrolling=!0,clearTimeout(t),t=setTimeout(function(){e.isScrolling=!1},1e3/60)})},updateOnResize:function(){var e=this,t=null,n=null;window.addEventListener("resize",function(i){clearTimeout(t),t=setTimeout(function(){e.isResizing=!0,clearTimeout(n),n=setTimeout(function(){e.isResizing=!1},60)},1e3/60)})},scrollDisable:function(){this.bodyScrollDisabled||(this.scrollPosition=this.scrollingElem.scrollTop,this.scrollingElem.classList.add("no-scroll"),this.scrollingElem.scrollTop=0,this.bodyScrollDisabled=!0)},scrollEnable:function(){this.bodyScrollDisabled&&(this.scrollingElem.scrollTop=this.scrollPosition,this.scrollingElem.classList.remove("no-scroll"),this.bodyScrollDisabled=!1)},objToArr:function(e){var t;return"object"!==o(e)||Array.isArray(e)?e:(0===(t=Array.from(e)).length&&t.push(e),t)},strToHTML:function(e){return"string"!=typeof e?e:(new DOMParser).parseFromString(e,"text/html").body.firstChild},eachElement:function(e,t){var n=this;null!==e&&this.objToArr(e).forEach(function(e){t.call(n,e)})},on:function(e,t,n){var i=this;e.split(",").map(function(e){return e.trim()}).forEach(function(e){i.eachElement(t,function(t){t.addEventListener(e,n)})})},off:function(e,t,n){var i=this;e.split(",").map(function(e){return e.trim()}).forEach(function(e){i.eachElement(t,function(t){t.removeEventListener(e,n)})})},addClass:function(e,t){var n=this;t&&t.split(",").map(function(e){return e.trim()}).forEach(function(t){n.eachElement(e,function(e){e.classList.add(t)})})},removeClass:function(e,t){var n=this;t&&t.split(",").map(function(e){return e.trim()}).forEach(function(t){n.eachElement(e,function(e){e.classList.remove(t)})})},toggleClass:function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:null;t&&(!1===n?this.removeClass(e,t):!0===n?this.addClass(e,t):this.eachElement(e,function(e){e.classList.toggle(t)}))},hasClass:function(e,t){var n=t.split(",").map(function(e){return e.trim()});return void 0!==e.length&&(e=e[0]),void 0!==n.find(function(t){return e.classList.contains(t)})},isHidden:function(e){return void 0!==e.length&&(e=e[0]),"none"===(e.currentStyle?e.currentStyle.display:getComputedStyle(e,null).display)},get:function(e,t){var n=this;return t=t||document,this.objToArr(t).reduce(function(t,i){var o=n.getElement(e,i);return null===o||0===o.length?t:t.concat(n.objToArr(o))},[])},getElement:function(e,t){return t!==document&&1!==t.nodeType?null:"string"!=typeof e?null:/^#[\w-]*$/.test(e)?document.getElementById(e.slice(1)):/^\.[\w-]*$/.test(e)?t.getElementsByClassName(e.slice(1)):/^\w+$/.test(e)?t.getElementsByTagName(e):t.querySelectorAll(e)},animate:function(e,t,n,i,o,s){var l=n-t;this.animation(e,0,t,l,i,o,s)},animation:function(e,t,n,i,o,s,l){var r=this;t+=1e3/60;var a=this.easeInOutQuad(t,n,i,o);s(e,a),t<o?setTimeout(function(){r.animation(e,t,n,i,o,s,l)},1e3/60):(s(e,n+i),"function"==typeof l&&l(e))},easeInOutQuad:function(e,t,n,i){return(e/=i/2)<1?n/2*e*e+t:-n/2*(--e*(e-2)-1)+t},addRosObject:function(e){var t=this,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"fadein",i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:20,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:0,s=arguments.length>4&&void 0!==arguments[4]?arguments[4]:"easeinout",l=0,r=null,a=this.get(e);null!==a&&0!==a.length&&a.forEach(function(e){var a=e.parentNode,c=t.bodyHeight,u=e.getBoundingClientRect().top+t.scrollTop,f=100-i;0!==o&&(r!==a&&(l=0),r=a,e.style.transitionDelay=l*o+"ms",l++),n&&t.addRaf(function(){var i=u-t.scrollTop;if(c!==t.bodyHeight&&(i=e.getBoundingClientRect().top),Math.floor(i/t.windowHeight*100)<f)return e.classList.add(n),e.classList.add(s),"unbind"})})},addSlider:function(e,t,n,i){var o=this,s=this.get(e);null!==s&&0!==s.length&&s.forEach(function(e){o.sliderFunctionality(e,t,n,i)})},sliderFunctionality:function(e,t,n){var i=this,o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"new",s=this.get(t,e),l=0,r=0,a=s.length-1,c=this.get(o.next,e),u=this.get(o.prev,e),f=function(){i.addClass(s[l],"makeitvisible"),i.removeClass(s[r],"makeitvisible");var t=s[r].offsetHeight,n=s[l].offsetHeight;i.animate(e,t,n,600,function(e,t){e.style.height=t+"px"})};e.style.overflow="hidden",this.addClass(e,n),this.addClass(s[0],"makeitvisible, firstslide"),this.on("click",c,function(){++l>a&&(l=0),(r=l-1)<0&&(r=a),f()}),this.on("click",u,function(){--l<0&&(l=a),(r=l+1)>a&&(r=0),f()})},slideDown:function(e,t){var n=this,i=t||400;this.eachElement(e,function(e){e.style.cssText="display: block; overflow: auto";var t=Math.max(e.offsetHeight,e.scrollHeight);e.style.cssText="display: block; overflow: hidden; height: 0;",n.animate(e,0,t,i,function(e,t){e.style.height=t+"px"},function(e){e.style.cssText="display: block"})})},slideUp:function(e,t){var n=this,i=t||400;this.eachElement(e,function(e){e.style.cssText="display: block; overflow: auto";var t=Math.max(e.offsetHeight,e.scrollHeight);e.style.cssText="display: block; overflow: hidden; height: 0;",n.animate(e,t,0,i,function(e,t){e.style.height=t+"px"},function(e){e.style.cssText="display: none"})})}},f={global:window.bayleafScreenReaderText||{menu:"primary"},elems:{header:"#masthead",content:"#content",footer:"#colophon",main:"#main",eContent:".entry-content",mianNav:"#site-navigation",subMenuTog:".sub-menu-toggle",menuToggle:".menu-toggle",menuItems:".menu-item-has-children, .page_item_has_children",menuLinks:".menu-item-has-children a, .page_item_has_children a",dirLinks:".menu-item-has-children > a, .page_item_has_children > a",headWidToggle:".action-toggle",headWid:"#header-widget-area",scrlTop:".scrl-to-top",comments:".comments-area",cToggle:".comments-toggle",widthStyle:".has-featured-img, .slider2"},cls:{toggled:"toggled-on",toggler:"toggled-btn",single:"singular-view",visible:"makeitvisible"},vidsel:['iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="vimeo.com"]','iframe[src*="dailymotion.com"]','iframe[src*="videopress.com"]']};function h(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var g=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=f.elems;this.scrlTop=u.get(t.scrlTop),u.addRaf(this.scrlTopVisible.bind(this)),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){u.on("click",this.scrlTop,this.scrollTop)}},{key:"scrlTopVisible",value:function(){u.toggleClass(this.scrlTop,f.cls.visible,300<u.scrollTop)}},{key:"scrollTop",value:function(){var e=u.scrollingElem;u.animate(e,e.scrollTop,0,300,function(e,t){e.scrollTop=t})}}])&&h(t.prototype,n),i&&h(t,i),e}();function d(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var m=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=f.elems;this.header=u.get(t.header),this.nav=u.get(t.mianNav),this.menu=u.get("#".concat(f.global.menu)),this.menuToggle=u.get(t.menuToggle,this.header),this.subToggle=u.get(t.subMenuTog,this.menu),this.items=u.get(t.menuItems,this.menu),this.links=u.get(t.menuLinks,this.menu),this.dLinks=u.get(t.dirLinks,this.menu),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){u.on("click",this.menuToggle,this.toggleMenu.bind(this)),u.on("click",this.subToggle,this.toggleSubMenu),u.on("mouseenter, mouseleave",this.items,this.toggleItem),u.on("focus, blur",this.links,this.toggleLinkItems),u.on("touchstart",u.body,this.resetMenu.bind(this)),u.on("touchstart, click",this.dLinks,this.activateItem)}},{key:"toggleMenu",value:function(){u.toggleClass(this.menuToggle,f.cls.toggler),u.toggleClass(this.nav,f.cls.toggled)}},{key:"toggleSubMenu",value:function(){var e=this.nextElementSibling;u.toggleClass(this,f.cls.toggler),u.toggleClass(e,f.cls.toggled),u.hasClass(this,f.cls.toggler)?u.slideDown(e,200):u.slideUp(e,200)}},{key:"toggleItem",value:function(){u.toggleClass(this,f.cls.toggled)}},{key:"toggleLinkItems",value:function(){for(var e=this;null!==e&&!u.hasClass(e,"nav-menu");)u.hasClass(e,"menu-item, page_item")&&u.toggleClass(e,f.cls.toggled),e=e.parentElement}},{key:"resetMenu",value:function(e){u.isHidden(this.menuToggle)||this.menu.contains(e.target)||u.removeClass(this.items,f.cls.toggled)}},{key:"activateItem",value:function(e){var t=link.parentElement,n=t.parentElement.children;u.isHidden(u.get(f.elems.menuToggle))||u.hasClass(t,f.cls.toggled)||(e.preventDefault(),u.removeClass(n,f.cls.toggled),u.addClass(t,f.cls.toggled))}}])&&d(t.prototype,n),i&&d(t,i),e}();function v(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var y=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=f.elems;this.cutOffWidth=800,this.elems=u.get(t.widthStyle),this.widthStyleControl(),u.addRaf(this.widthStyleControl.bind(this),"resize")}var t,n,i;return t=e,(n=[{key:"widthStyleControl",value:function(){var e=this;u.eachElement(this.elems,function(t){e.cutOffWidth>t.offsetWidth?u.removeClass(t,"widescreen"):u.addClass(t,"widescreen")})}}])&&v(t.prototype,n),i&&v(t,i),e}();function p(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var b=function(){function e(){var t,n,i;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),i=void 0,(n="frames")in(t=this)?Object.defineProperty(t,n,{value:i,enumerable:!0,configurable:!0,writable:!0}):t[n]=i;var o=f.elems;this.main=u.get(o.main),this.content=u.get(o.eContent,this.main),u.hasClass(u.body,f.cls.single)&&0!==this.content.length&&(this.frames=u.get(f.vidsel.join(","),this.content),0!==this.frames.length&&(this.excludeAlreadyProcessed(),this.makeResponsive()))}var t,n,i;return t=e,(n=[{key:"excludeAlreadyProcessed",value:function(){var e=this.frames.filter(function(e){return"absolute"!==(e.currentStyle?e.currentStyle.position:getComputedStyle(e,null).position)});this.frames=e}},{key:"makeResponsive",value:function(){this.frames.forEach(function(e){var t=document.createElement("div");t.className="video-container",e.parentNode.insertBefore(t,e),t.appendChild(e)})}}])&&p(t.prototype,n),i&&p(t,i),e}();function w(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var T=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=f.elems;this.widget=u.get(t.headWid),this.toggler=u.get(t.headWidToggle,this.header),null!==this.widget&&this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){u.on("click",this.toggler,this.toggleWidget.bind(this))}},{key:"toggleWidget",value:function(){u.toggleClass(this.toggler,f.cls.toggler),u.toggleClass(this.widget,f.cls.toggled),u.hasClass(this.widget,f.cls.toggled)?u.scrollDisable():u.scrollEnable()}}])&&w(t.prototype,n),i&&w(t,i),e}();function k(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var C=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e);var t=f.elems;this.comments=u.get(t.comments),this.cToggle=u.get(t.cToggle),this.events()}var t,n,i;return t=e,(n=[{key:"events",value:function(){u.on("click",this.cToggle,this.toggleComments.bind(this))}},{key:"toggleComments",value:function(){u.toggleClass(this.cToggle,f.cls.toggler),u.hasClass(this.cToggle,f.cls.toggler)?u.slideDown(this.comments[0]):u.slideUp(this.comments[0])}}])&&k(t.prototype,n),i&&k(t,i),e}();function S(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var E=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.objectFit()}var t,n,o;return t=e,(n=[{key:"objectFit",value:function(){if(!1=="objectFit"in document.documentElement.style)for(container=document.querySelectorAll([".entry-thumbnail",".dp-thumbnail",".gallery-icon a",".header-image",".has-featured-img .thumb-wrapper"].join(",")),i=0;i<container.length;i++)imageSource=container[i].querySelector("img").src,container[i].querySelector("img").style.visibility="hidden",container[i].style.backgroundSize="cover",container[i].style.backgroundImage="url("+imageSource+")",container[i].style.backgroundPosition="center center"}}])&&S(t.prototype,n),o&&S(t,o),e}();function R(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}new(function(){function e(t){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),u.updateOnScroll(),u.updateOnResize(),u.addSlider(".slider-wrapper",".dp-entry","",{next:".dp-next-slide",prev:".dp-prev-slide"}),this.navigationMenu(),this.responsiveVideos(),this.scrollBackTop(),this.commentsToggle(),this.responsiveStyling(),this.headerWidgetToggle(),this.polyfill(),u.addRosObject(".brick","fadeInUp"),u.addRosObject(".dp-grid > .dp-entry","",0,150)}var t,n,i;return t=e,(n=[{key:"navigationMenu",value:function(){new m}},{key:"responsiveVideos",value:function(){new b}},{key:"headerWidgetToggle",value:function(){new T}},{key:"scrollBackTop",value:function(){new g}},{key:"commentsToggle",value:function(){new C}},{key:"responsiveStyling",value:function(){new y}},{key:"polyfill",value:function(){new E}}])&&R(t.prototype,n),i&&R(t,i),e}())}]);