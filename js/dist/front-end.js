!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=76)}({20:function(e,t,n){var o=n(77),r=n(78),i=n(79),a=n(80);e.exports=function(e){return o(e)||r(e)||i(e)||a()}},238:function(e,t,n){"use strict";n.r(t);var o=n(72),r=n.n(o),i=n(73),a=n.n(i);function s(e){return void 0===window.air_light_screenReaderText||void 0===window.air_light_screenReaderText[e]?(console.error("Missing translation for ".concat(e)),""):window.air_light_screenReaderText[e]}var l=n(20),c=n.n(l);[].concat(c()(document.querySelectorAll("figure.alignright")),c()(document.querySelectorAll("figure.alignleft"))).forEach((function(e){var t=e.querySelector("img");void 0!==t&&(e.style.width="".concat(t.clientWidth,"px"))}));var d,u,f;n(81),n(82);document.body.classList.remove("no-js"),document.body.classList.add("js"),function(){var e=[window.location.host];void 0!==window.air_light_externalLinkDomains&&(e=e.concat(window.air_light_externalLinkDomains));var t=document.querySelectorAll("a");c()(t).filter((function(t){return function(e,t){if(!e.length)return!1;if(["#","tel:","mailto:","/"].some((function(t){return new RegExp("^".concat(t),"g").test(e)})))return!1;var n=new URL(e);return!t.some((function(e){return n.host===e}))}(t.href,e)})).forEach((function(e){var t="_blank"===e.target?"".concat(s("external_link")," ").concat(e.textContent,", ").concat(s("target_blank")):"".concat(s("external_link")," ").concat(e.textContent);e.setAttribute("aria-label",t),e.classList.add("is-external-link")}))}(),(new a.a).update(),d=jQuery,u=d(".back-to-top").offset(),f=d(".block, .site-footer"),d(document).scroll((function(){f.each((function(e){var t=d(this).offset().top-d(window).scrollTop();if(t<u.top&&t+d(this).height()>0)return d(".back-to-top").removeClass("has-light-bg has-dark-bg").addClass(d(this).hasClass("has-light-bg")?"has-light-bg":"has-dark-bg"),!1}))})),d.fn.isInViewport=function(){var e=d(this).offset().top,t=e+d(this).outerHeight(),n=d(window).scrollTop(),o=n+d(window).height();return t>n&&e<o},d(window).on("resize scroll",(function(){d(".block, .site-footer").each((function(){d(this).isInViewport()&&d(".back-to-top").removeClass("has-light-bg has-dark-bg").addClass(d(this).hasClass("has-light-bg")?"has-light-bg":"has-dark-bg")}))})),d(window).scroll((function(){var e=".back-to-top";d(this).scrollTop()>300?d(e).addClass("is-visible"):d(e).removeClass("is-visible"),d(this).scrollTop()>1200?d(e).addClass("fade-out"):d(e).removeClass("fade-out")})),d((function(){})),document.addEventListener("DOMContentLoaded",(function(){for(var e=new r.a({ease:"easeInQuad"},{easeInQuad:function(e,t,n,o){return n*(e/=o)*e+t},easeOutQuad:function(e,t,n,o){return-n*(e/=o)*(e-2)+t}}),t=document.getElementsByClassName("js-trigger"),n=0;n<t.length;n++)e.registerTrigger(t[n])}))},38:function(e,t){e.exports=function(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,o=new Array(t);n<t;n++)o[n]=e[n];return o}},72:function(e,t,n){"use strict";var o=function(){var e={tolerance:0,duration:800,easing:"easeOutQuart",container:window,callback:function(){}};function t(e,t,n,o){return e/=o,-n*(--e*e*e*e-1)+t}function n(e,t){var n={};return Object.keys(e).forEach((function(t){n[t]=e[t]})),Object.keys(t).forEach((function(e){n[e]=t[e]})),n}function o(e){return e instanceof HTMLElement?e.scrollTop:e.pageYOffset}function r(){var o=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};this.options=n(e,o),this.easeFunctions=n({easeOutQuart:t},r)}return r.prototype.registerTrigger=function(e,t){var o=this;if(e){var r=e.getAttribute("href")||e.getAttribute("data-target"),i=r&&"#"!==r?document.getElementById(r.substring(1)):document.body,a=n(this.options,function(e,t){var n={};return Object.keys(t).forEach((function(t){var o=e.getAttribute("data-mt-".concat(t.replace(/([A-Z])/g,(function(e){return"-"+e.toLowerCase()}))));o&&(n[t]=isNaN(o)?o:parseInt(o,10))})),n}(e,this.options));"function"==typeof t&&(a.callback=t);var s=function(e){e.preventDefault(),o.move(i,a)};return e.addEventListener("click",s,!1),function(){return e.removeEventListener("click",s,!1)}}},r.prototype.move=function(e){var t=this,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(0===e||e){r=n(this.options,r);var i,a="number"==typeof e?e:e.getBoundingClientRect().top,s=o(r.container),l=null;a-=r.tolerance;var c=function n(c){var d=o(t.options.container);l||(l=c-1);var u=c-l;if(i&&(a>0&&i>d||a<0&&i<d))return r.callback(e);i=d;var f=t.easeFunctions[r.easing](u,s,a,r.duration);r.container.scroll(0,f),u<r.duration?window.requestAnimationFrame(n):(r.container.scroll(0,a+s),r.callback(e))};window.requestAnimationFrame(c)}},r.prototype.addEaseFunction=function(e,t){this.easeFunctions[e]=t},r}();e.exports=o},73:function(e,t,n){e.exports=function(){"use strict";function e(){return(e=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e}).apply(this,arguments)}var t="undefined"!=typeof window,n=t&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),o=t&&"IntersectionObserver"in window,r=t&&"classList"in document.createElement("p"),i=t&&window.devicePixelRatio>1,a={elements_selector:".lazy",container:n||t?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"loading",class_loaded:"loaded",class_error:"error",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!0,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},s=function(t){return e({},a,t)},l=function(e,t){var n,o=new e(t);try{n=new CustomEvent("LazyLoad::Initialized",{detail:{instance:o}})}catch(e){(n=document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized",!1,!1,{instance:o})}window.dispatchEvent(n)},c=function(e,t){return e.getAttribute("data-"+t)},d=function(e,t,n){var o="data-"+t;null!==n?e.setAttribute(o,n):e.removeAttribute(o)},u=function(e){return c(e,"ll-status")},f=function(e,t){return d(e,"ll-status",t)},p=function(e){return f(e,null)},g=function(e){return null===u(e)},h=function(e){return"native"===u(e)},v=["loading","loaded","applied","error"],m=function(e,t,n,o){e&&(void 0===o?void 0===n?e(t):e(t,n):e(t,n,o))},w=function(e,t){r?e.classList.add(t):e.className+=(e.className?" ":"")+t},b=function(e,t){r?e.classList.remove(t):e.className=e.className.replace(new RegExp("(^|\\s+)"+t+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")},_=function(e){return e.llTempImage},x=function(e,t){if(t){var n=t._observer;n&&n.unobserve(e)}},y=function(e,t){e&&(e.loadingCount+=t)},E=function(e,t){e&&(e.toLoadCount=t)},k=function(e){for(var t,n=[],o=0;t=e.children[o];o+=1)"SOURCE"===t.tagName&&n.push(t);return n},L=function(e,t,n){n&&e.setAttribute(t,n)},C=function(e,t){e.removeAttribute(t)},A=function(e){return!!e.llOriginalAttrs},N=function(e){if(!A(e)){var t={};t.src=e.getAttribute("src"),t.srcset=e.getAttribute("srcset"),t.sizes=e.getAttribute("sizes"),e.llOriginalAttrs=t}},O=function(e){if(A(e)){var t=e.llOriginalAttrs;L(e,"src",t.src),L(e,"srcset",t.srcset),L(e,"sizes",t.sizes)}},T=function(e,t){L(e,"sizes",c(e,t.data_sizes)),L(e,"srcset",c(e,t.data_srcset)),L(e,"src",c(e,t.data_src))},I=function(e){C(e,"src"),C(e,"srcset"),C(e,"sizes")},D=function(e,t){var n=e.parentNode;n&&"PICTURE"===n.tagName&&k(n).forEach(t)},S=function(e,t){k(e).forEach(t)},R={IMG:function(e,t){D(e,(function(e){N(e),T(e,t)})),N(e),T(e,t)},IFRAME:function(e,t){L(e,"src",c(e,t.data_src))},VIDEO:function(e,t){S(e,(function(e){L(e,"src",c(e,t.data_src))})),L(e,"poster",c(e,t.data_poster)),L(e,"src",c(e,t.data_src)),e.load()}},M=function(e,t){var n=R[e.tagName];n&&n(e,t)},j=function(e,t,n){y(n,1),w(e,t.class_loading),f(e,"loading"),m(t.callback_loading,e,n)},P={IMG:function(e,t){d(e,t.data_src,null),d(e,t.data_srcset,null),d(e,t.data_sizes,null),D(e,(function(e){d(e,t.data_srcset,null),d(e,t.data_sizes,null)}))},IFRAME:function(e,t){d(e,t.data_src,null)},VIDEO:function(e,t){d(e,t.data_src,null),d(e,t.data_poster,null),S(e,(function(e){d(e,t.data_src,null)}))}},z=function(e,t){d(e,t.data_bg_multi,null),d(e,t.data_bg_multi_hidpi,null)},B=function(e,t){var n=P[e.tagName];n?n(e,t):function(e,t){d(e,t.data_bg,null),d(e,t.data_bg_hidpi,null)}(e,t)},F=["IMG","IFRAME","VIDEO"],q=function(e,t){!t||function(e){return e.loadingCount>0}(t)||function(e){return e.toLoadCount>0}(t)||m(e.callback_finish,t)},K=function(e,t,n){e.addEventListener(t,n),e.llEvLisnrs[t]=n},Q=function(e,t,n){e.removeEventListener(t,n)},G=function(e){return!!e.llEvLisnrs},V=function(e){if(G(e)){var t=e.llEvLisnrs;for(var n in t){var o=t[n];Q(e,n,o)}delete e.llEvLisnrs}},W=function(e,t,n){!function(e){delete e.llTempImage}(e),y(n,-1),function(e){e&&(e.toLoadCount-=1)}(n),b(e,t.class_loading),t.unobserve_completed&&x(e,n)},U=function(e,t,n){var o=_(e)||e;G(o)||function(e,t,n){G(e)||(e.llEvLisnrs={});var o="VIDEO"===e.tagName?"loadeddata":"load";K(e,o,t),K(e,"error",n)}(o,(function(r){!function(e,t,n,o){var r=h(t);W(t,n,o),w(t,n.class_loaded),f(t,"loaded"),B(t,n),m(n.callback_loaded,t,o),r||q(n,o)}(0,e,t,n),V(o)}),(function(r){!function(e,t,n,o){var r=h(t);W(t,n,o),w(t,n.class_error),f(t,"error"),m(n.callback_error,t,o),r||q(n,o)}(0,e,t,n),V(o)}))},H=function(e,t,n){!function(e){e.llTempImage=document.createElement("IMG")}(e),U(e,t,n),function(e,t,n){var o=c(e,t.data_bg),r=c(e,t.data_bg_hidpi),a=i&&r?r:o;a&&(e.style.backgroundImage='url("'.concat(a,'")'),_(e).setAttribute("src",a),j(e,t,n))}(e,t,n),function(e,t,n){var o=c(e,t.data_bg_multi),r=c(e,t.data_bg_multi_hidpi),a=i&&r?r:o;a&&(e.style.backgroundImage=a,function(e,t,n){w(e,t.class_applied),f(e,"applied"),z(e,t),t.unobserve_completed&&x(e,t),m(t.callback_applied,e,n)}(e,t,n))}(e,t,n)},Y=function(e,t,n){!function(e){return F.indexOf(e.tagName)>-1}(e)?H(e,t,n):function(e,t,n){U(e,t,n),M(e,t),j(e,t,n)}(e,t,n)},$=["IMG","IFRAME"],X=function(e){return e.use_native&&"loading"in HTMLImageElement.prototype},Z=function(e,t,n){e.forEach((function(e){return function(e){return e.isIntersecting||e.intersectionRatio>0}(e)?function(e,t,n,o){f(e,"entered"),function(e,t,n){t.unobserve_entered&&x(e,n)}(e,n,o),m(n.callback_enter,e,t,o),function(e){return v.indexOf(u(e))>=0}(e)||Y(e,n,o)}(e.target,e,t,n):function(e,t,n,o){g(e)||(function(e,t,n,o){n.cancel_on_exit&&function(e){return"loading"===u(e)}(e)&&"IMG"===e.tagName&&(V(e),function(e){D(e,(function(e){I(e)})),I(e)}(e),function(e){D(e,(function(e){O(e)})),O(e)}(e),b(e,n.class_loading),y(o,-1),p(e),m(n.callback_cancel,e,t,o))}(e,t,n,o),m(n.callback_exit,e,t,o))}(e.target,e,t,n)}))},J=function(e){return Array.prototype.slice.call(e)},ee=function(e){return e.container.querySelectorAll(e.elements_selector)},te=function(e){return function(e){return"error"===u(e)}(e)},ne=function(e,t){return function(e){return J(e).filter(g)}(e||ee(t))},oe=function(e,n){var r=s(e);this._settings=r,this.loadingCount=0,function(e,t){o&&!X(e)&&(t._observer=new IntersectionObserver((function(n){Z(n,e,t)}),function(e){return{root:e.container===document?null:e.container,rootMargin:e.thresholds||e.threshold+"px"}}(e)))}(r,this),function(e,n){t&&window.addEventListener("online",(function(){!function(e,t){var n;(n=ee(e),J(n).filter(te)).forEach((function(t){b(t,e.class_error),p(t)})),t.update()}(e,n)}))}(r,this),this.update(n)};return oe.prototype={update:function(e){var t,r,i=this._settings,a=ne(e,i);E(this,a.length),!n&&o?X(i)?function(e,t,n){e.forEach((function(e){-1!==$.indexOf(e.tagName)&&(e.setAttribute("loading","lazy"),function(e,t,n){U(e,t,n),M(e,t),B(e,t),f(e,"native")}(e,t,n))})),E(n,0)}(a,i,this):(r=a,function(e){e.disconnect()}(t=this._observer),function(e,t){t.forEach((function(t){e.observe(t)}))}(t,r)):this.loadAll(a)},destroy:function(){this._observer&&this._observer.disconnect(),ee(this._settings).forEach((function(e){delete e.llOriginalAttrs})),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(e){var t=this,n=this._settings;ne(e,n).forEach((function(e){x(e,t),Y(e,n,t)}))}},oe.load=function(e,t){var n=s(t);Y(e,n)},oe.resetStatus=function(e){p(e)},t&&function(e,t){if(t)if(t.length)for(var n,o=0;n=t[o];o+=1)l(e,n);else l(e,t)}(oe,window.lazyLoadOptions),oe}()},76:function(e,t,n){e.exports=n(238)},77:function(e,t,n){var o=n(38);e.exports=function(e){if(Array.isArray(e))return o(e)}},78:function(e,t){e.exports=function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}},79:function(e,t,n){var o=n(38);e.exports=function(e,t){if(e){if("string"==typeof e)return o(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?o(e,t):void 0}}},80:function(e,t){e.exports=function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}},81:function(e,t,n){var o;o=function(){return function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={exports:{},id:o,loaded:!1};return e[o].call(r.exports,r,r.exports,n),r.loaded=!0,r.exports}return n.m=e,n.c=t,n.p="",n(0)}([function(e,t){"use strict";e.exports=function(){if("undefined"==typeof document||"undefined"==typeof window)return{ask:function(){return"initial"},element:function(){return null},ignoreKeys:function(){},specificKeys:function(){},registerOnChange:function(){},unRegisterOnChange:function(){}};var e=document.documentElement,t=null,n="initial",o=n,r=Date.now(),i="false",a=["button","input","select","textarea"],s=[],l=[16,17,18,91,93],c=[],d={keydown:"keyboard",keyup:"keyboard",mousedown:"mouse",mousemove:"mouse",MSPointerDown:"pointer",MSPointerMove:"pointer",pointerdown:"pointer",pointermove:"pointer",touchstart:"touch",touchend:"touch"},u=!1,f={x:null,y:null},p={2:"touch",3:"touch",4:"mouse"},g=!1;try{var h=Object.defineProperty({},"passive",{get:function(){g=!0}});window.addEventListener("test",null,h)}catch(e){}var v=function(){var e=!!g&&{passive:!0};document.addEventListener("DOMContentLoaded",m),window.PointerEvent?(window.addEventListener("pointerdown",w),window.addEventListener("pointermove",_)):window.MSPointerEvent?(window.addEventListener("MSPointerDown",w),window.addEventListener("MSPointerMove",_)):(window.addEventListener("mousedown",w),window.addEventListener("mousemove",_),"ontouchstart"in window&&(window.addEventListener("touchstart",w,e),window.addEventListener("touchend",w))),window.addEventListener(C(),_,e),window.addEventListener("keydown",w),window.addEventListener("keyup",w),window.addEventListener("focusin",x),window.addEventListener("focusout",y)},m=function(){if(i=!(e.getAttribute("data-whatpersist")||"false"===document.body.getAttribute("data-whatpersist")))try{window.sessionStorage.getItem("what-input")&&(n=window.sessionStorage.getItem("what-input")),window.sessionStorage.getItem("what-intent")&&(o=window.sessionStorage.getItem("what-intent"))}catch(e){}b("input"),b("intent")},w=function(e){var t=e.which,r=d[e.type];"pointer"===r&&(r=k(e));var i=!c.length&&-1===l.indexOf(t),s=c.length&&-1!==c.indexOf(t),u="keyboard"===r&&t&&(i||s)||"mouse"===r||"touch"===r;if(L(r)&&(u=!1),u&&n!==r&&(E("input",n=r),b("input")),u&&o!==r){var f=document.activeElement;f&&f.nodeName&&(-1===a.indexOf(f.nodeName.toLowerCase())||"button"===f.nodeName.toLowerCase()&&!O(f,"form"))&&(E("intent",o=r),b("intent"))}},b=function(t){e.setAttribute("data-what"+t,"input"===t?n:o),A(t)},_=function(e){var t=d[e.type];"pointer"===t&&(t=k(e)),N(e),(!u&&!L(t)||u&&"wheel"===e.type||"mousewheel"===e.type||"DOMMouseScroll"===e.type)&&o!==t&&(E("intent",o=t),b("intent"))},x=function(n){n.target.nodeName?(t=n.target.nodeName.toLowerCase(),e.setAttribute("data-whatelement",t),n.target.classList&&n.target.classList.length&&e.setAttribute("data-whatclasses",n.target.classList.toString().replace(" ",","))):y()},y=function(){t=null,e.removeAttribute("data-whatelement"),e.removeAttribute("data-whatclasses")},E=function(e,t){if(i)try{window.sessionStorage.setItem("what-"+e,t)}catch(e){}},k=function(e){return"number"==typeof e.pointerType?p[e.pointerType]:"pen"===e.pointerType?"touch":e.pointerType},L=function(e){var t=Date.now(),o="mouse"===e&&"touch"===n&&t-r<200;return r=t,o},C=function(){return"onwheel"in document.createElement("div")?"wheel":void 0!==document.onmousewheel?"mousewheel":"DOMMouseScroll"},A=function(e){for(var t=0,r=s.length;t<r;t++)s[t].type===e&&s[t].fn.call(void 0,"input"===e?n:o)},N=function(e){f.x!==e.screenX||f.y!==e.screenY?(u=!1,f.x=e.screenX,f.y=e.screenY):u=!0},O=function(e,t){var n=window.Element.prototype;if(n.matches||(n.matches=n.msMatchesSelector||n.webkitMatchesSelector),n.closest)return e.closest(t);do{if(e.matches(t))return e;e=e.parentElement||e.parentNode}while(null!==e&&1===e.nodeType);return null};return"addEventListener"in window&&Array.prototype.indexOf&&(d[C()]="mouse",v()),{ask:function(e){return"intent"===e?o:n},element:function(){return t},ignoreKeys:function(e){l=e},specificKeys:function(e){c=e},registerOnChange:function(e,t){s.push({fn:e,type:t||"input"})},unRegisterOnChange:function(e){var t=function(e){for(var t=0,n=s.length;t<n;t++)if(s[t].fn===e)return t}(e);(t||0===t)&&s.splice(t,1)},clearStorage:function(){window.sessionStorage.clear()}}}()}])},e.exports=o()},82:function(e,t){!function(e){var t=960,n=!1;e(window).keydown((function(e){13===e.which&&(n=!0)})).keyup((function(e){13===e.which&&(n=!1)})),e(".menu-item-has-children").hover((function(){e(this).addClass("hover-intent")}),(function(){var t=this;setTimeout((function(){e(t).removeClass("hover-intent")}),100)}));var o,r,i,a,s,l,c,d,u,f=e(".nav-container"),p=f.find("#nav-toggle"),g=f.find("#main-navigation-wrapper"),h=f.find("#nav");if(p.length&&(window.innerWidth<t&&p.add(h).attr("aria-expanded","false"),p.on("click",(function(){e(this).add(g).toggleClass("toggled-on"),e(this).attr("aria-expanded","false"===e(this).attr("aria-expanded")?"true":"false"),e("#nav-toggle-label").text(e("#nav-toggle-label").text()===air_light_screenReaderText.expand_toggle?air_light_screenReaderText.collapse_toggle:air_light_screenReaderText.expand_toggle),e(this).attr("aria-label",e(this).attr("aria-label")===air_light_screenReaderText.expand_toggle?air_light_screenReaderText.collapse_toggle:air_light_screenReaderText.expand_toggle),e(this).add(h).attr("aria-expanded","false"===e(this).add(h).attr("aria-expanded")?"true":"false")}))),e(".menu-item a, .dropdown button").on("keyup",(function(){0!==e(".dropdown").find(":focus").length&&27===event.keyCode&&(thisDropdown=e(this).parent().parent().parent(),screenReaderSpan=thisDropdown.find(".screen-reader-text"),dropdownToggle=thisDropdown.find(".dropdown-toggle"),thisDropdown.find(".sub-menu").removeClass("toggled-on"),thisDropdown.find(".dropdown-toggle").removeClass("toggled-on"),thisDropdown.find(".dropdown").removeClass("toggled-on"),dropdownToggle.attr("aria-expanded","false"),screenReaderSpan.text(air_light_screenReaderText.expand),thisDropdown.find(".dropdown-toggle:first").focus()),window.innerWidth>t&&(prevDropdown=e(this).parent().prev(),screenReaderSpanPrev=prevDropdown.find(".screen-reader-text"),dropdownTogglePrev=prevDropdown.find(".dropdown-toggle"),prevDropdown.find(".sub-menu").removeClass("toggled-on"),prevDropdown.find(".dropdown-toggle").removeClass("toggled-on"),prevDropdown.find(".dropdown").removeClass("toggled-on"),dropdownTogglePrev.attr("aria-expanded","false"),screenReaderSpanPrev.text(air_light_screenReaderText.expand),nextDropdown=e(this).parent().next(),screenReaderSpanNext=nextDropdown.find(".screen-reader-text"),dropdownToggleNext=nextDropdown.find(".dropdown-toggle"),nextDropdown.find(".sub-menu").removeClass("toggled-on"),nextDropdown.find(".dropdown-toggle").removeClass("toggled-on"),nextDropdown.find(".dropdown").removeClass("toggled-on"),dropdownToggleNext.attr("aria-expanded","false"),screenReaderSpanNext.text(air_light_screenReaderText.expand))})),g.find(".menu-item-has-children").attr("aria-haspopup","true"),e(".dropdown-toggle").each((function(){e(this).attr("aria-label","".concat(air_light_screenReaderText.expand_for," ").concat(e(this).prev().text()))})),g.find(".dropdown-toggle").click((function(o){if(n||window.innerWidth<t){var r=e(this).nextAll(".sub-menu");o.preventDefault(),e(this).toggleClass("toggled-on"),r.toggleClass("toggled-on"),e(this).attr("aria-expanded","false"===e(this).attr("aria-expanded")?"true":"false"),e(this).attr("aria-label",e(this).attr("aria-label")==="".concat(air_light_screenReaderText.collapse_for," ").concat(e(this).prev().text())?"".concat(air_light_screenReaderText.expand_for," ").concat(e(this).prev().text()):"".concat(air_light_screenReaderText.collapse_for," ").concat(e(this).prev().text()))}})),e(".sub-menu .menu-item-has-children").parent(".sub-menu").addClass("has-sub-menu"),e(".menu-item a, button.dropdown-toggle").on("keydown",(function(t){if(-1!=[37,38,39,40].indexOf(t.keyCode))switch(t.keyCode){case 37:t.preventDefault(),t.stopPropagation(),e(this).hasClass("dropdown-toggle")?e(this).prev("a").focus():e(this).parent().prev().children("button.dropdown-toggle").length?e(this).parent().prev().children("button.dropdown-toggle").focus():e(this).parent().prev().children("a").focus(),e(this).is("ul ul ul.sub-menu.toggled-on li:first-child a")&&e(this).parents("ul.sub-menu.toggled-on li").children("button.dropdown-toggle").focus();break;case 39:t.preventDefault(),t.stopPropagation(),e(this).next("button.dropdown-toggle").length?e(this).next("button.dropdown-toggle").focus():e(this).parent().next().find("input").length?e(this).parent().next().find("input").focus():e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu .dropdown-toggle.toggled-on")&&e(this).parent().find("ul.sub-menu li:first-child a").focus();break;case 40:t.preventDefault(),t.stopPropagation(),e(this).next().length?e(this).next().find("li:first-child a").first().focus():e(this).parent().next().find("input").length?e(this).parent().next().find("input").focus():e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu a")&&e(this).next("button.dropdown-toggle").length&&e(this).parent().next().children("a").focus(),e(this).is("ul.sub-menu .dropdown-toggle")&&e(this).parent().next().children(".dropdown-toggle").length&&e(this).parent().next().children(".dropdown-toggle").focus();break;case 38:t.preventDefault(),t.stopPropagation(),e(this).parent().prev().length?e(this).parent().prev().children("a").focus():e(this).parents("ul").first().prev(".dropdown-toggle.toggled-on").focus(),e(this).is("ul.sub-menu .dropdown-toggle")&&e(this).parent().prev().children(".dropdown-toggle").length&&e(this).parent().prev().children(".dropdown-toggle").focus()}})),(i=document.getElementById("nav"))&&void 0!==(a=document.getElementById("nav-toggle")))if(o=document.getElementsByTagName("html")[0],r=document.getElementsByTagName("body")[0],s=i.getElementsByTagName("ul")[0],l=document.getElementById("main-navigation-wrapper"),void 0!==s){if(window.innerWidth<t&&s.setAttribute("aria-expanded","false"),-1===s.className.indexOf("nav-menu")&&(s.className+=" nav-menu"),window.innerWidth<t){var v=null,m=null;navElements=i.querySelectorAll([".nav-primary a[href]",".nav-primary button"]);for(var w=0;w<navElements.length;w++)navElements[w].addEventListener("keydown",x)}for(a.onclick=function(){-1!==i.className.indexOf("is-active")?b():(o.className+=" disable-scroll",r.className+=" js-nav-active",i.className+=" is-active",a.className+=" is-active",a.setAttribute("aria-expanded","true"),s.setAttribute("aria-expanded","true"),a.addEventListener("keydown",x,!1))},document.addEventListener("keyup",(function(e){27==e.keyCode&&-1!==i.className.indexOf("is-active")&&b()})),l.onclick=function(e){e.target==l&&-1!==i.className.indexOf("is-active")&&b()},c=s.getElementsByTagName("a"),s.getElementsByTagName("ul"),w=0,d=c.length;w<d;w++)c[w].addEventListener("focus",_,!0),c[w].addEventListener("blur",_,!0)}else a.style.display="none";function b(){a.removeEventListener("keydown",x,!1),o.className=o.className.replace(" disable-scroll",""),r.className=r.className.replace(" js-nav-active",""),i.className=i.className.replace(" is-active",""),a.className=a.className.replace(" is-active",""),a.setAttribute("aria-expanded","false"),s.setAttribute("aria-expanded","false"),a.focus()}function _(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}function x(e){u=i.querySelectorAll([".sub-menu.toggled-on > li a[href]",'ul[aria-expanded="true"] > li > a[href]',"area[href]","input:not([disabled])","select:not([disabled])","textarea:not([disabled])",".sub-menu.toggled-on > li > button:not([disabled]):not(.toggled-on)",'ul[aria-expanded="true"] > li > button:not([disabled]):not(.toggled-on)',"iframe","object","embed","[contenteditable]",NaN]),v=u[0],(m=u[u.length-1])!==e.target||9!==e.keyCode||e.shiftKey||(e.preventDefault(),a.focus()),v===e.target&&9===e.keyCode&&e.shiftKey&&(e.preventDefault(),a.focus()),a===e.target&&9===e.keyCode&&e.shiftKey&&(e.preventDefault(),m.focus())}}(jQuery)}});