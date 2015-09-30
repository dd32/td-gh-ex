!function(t,i,o){function e(i,o){this.el=i,this.$el=t(this.el),this.options=t.extend({},a,o),this._defaults=a,this._name=n,this.init()}var n="nivoLightbox",a={effect:"fade",theme:"default",keyboardNav:!0,clickOverlayToClose:!0,onInit:function(){},beforeShowLightbox:function(){},afterShowLightbox:function(){},beforeHideLightbox:function(){},afterHideLightbox:function(){},onPrev:function(){},onNext:function(){},errorMessage:"The requested content cannot be loaded. Please try again later."};e.prototype={init:function(){var i=this;t("html").hasClass("nivo-lightbox-notouch")||t("html").addClass("nivo-lightbox-notouch"),"ontouchstart"in o&&t("html").removeClass("nivo-lightbox-notouch"),this.$el.on("click",function(t){i.showLightbox(t)}),this.options.keyboardNav&&t("body").off("keyup").on("keyup",function(o){var e=o.keyCode?o.keyCode:o.which;27==e&&i.destructLightbox(),37==e&&t(".nivo-lightbox-prev").trigger("click"),39==e&&t(".nivo-lightbox-next").trigger("click")}),this.options.onInit.call(this)},showLightbox:function(i){var o=this,e=this.$el,n=this.checkContent(e);if(n){i.preventDefault(),this.options.beforeShowLightbox.call(this);var a=this.constructLightbox();if(a){var l=a.find(".nivo-lightbox-content");if(l){if(t("body").addClass("nivo-lightbox-body-effect-"+this.options.effect),this.processContent(l,e),this.$el.attr("data-lightbox-gallery")){var s=t('[data-lightbox-gallery="'+this.$el.attr("data-lightbox-gallery")+'"]');t(".nivo-lightbox-nav").show(),t(".nivo-lightbox-prev").off("click").on("click",function(i){i.preventDefault();var n=s.index(e);e=s.eq(n-1),t(e).length||(e=s.last()),o.processContent(l,e),o.options.onPrev.call(this,[e])}),t(".nivo-lightbox-next").off("click").on("click",function(i){i.preventDefault();var n=s.index(e);e=s.eq(n+1),t(e).length||(e=s.first()),o.processContent(l,e),o.options.onNext.call(this,[e])})}setTimeout(function(){a.addClass("nivo-lightbox-open"),o.options.afterShowLightbox.call(this,[a])},1)}}}},checkContent:function(t){var i=t.attr("href"),o=i.match(/(youtube|youtu|vimeo)\.(com|be)\/(watch\?v=([\w-]+)|([\w-]+))/);return null!==i.match(/\.(jpeg|jpg|gif|png)$/i)?!0:o?!0:"ajax"==t.attr("data-lightbox-type")?!0:"#"==i.substring(0,1)&&"inline"==t.attr("data-lightbox-type")?!0:"iframe"==t.attr("data-lightbox-type")?!0:!1},processContent:function(o,e){var n=this,a=e.attr("href"),l=a.match(/(youtube|youtu|vimeo)\.(com|be)\/(watch\?v=([\w-]+)|([\w-]+))/);if(o.html("").addClass("nivo-lightbox-loading"),this.isHidpi()&&e.attr("data-lightbox-hidpi")&&(a=e.attr("data-lightbox-hidpi")),null!==a.match(/\.(jpeg|jpg|gif|png)$/i)){var s=t("<img>",{src:a});s.one("load",function(){var e=t('<div class="nivo-lightbox-image" />');e.append(s),o.html(e).removeClass("nivo-lightbox-loading"),e.css({"line-height":t(".nivo-lightbox-content").height()+"px",height:t(".nivo-lightbox-content").height()+"px"}),t(i).resize(function(){e.css({"line-height":t(".nivo-lightbox-content").height()+"px",height:t(".nivo-lightbox-content").height()+"px"})})}).each(function(){this.complete&&t(this).load()}),s.error(function(){var i=t('<div class="nivo-lightbox-error"><p>'+n.options.errorMessage+"</p></div>");o.html(i).removeClass("nivo-lightbox-loading")})}else if(l){var h="",r="nivo-lightbox-video";if("youtube"==l[1]&&(h="http://www.youtube.com/embed/"+l[4],r="nivo-lightbox-youtube"),"youtu"==l[1]&&(h="http://www.youtube.com/embed/"+l[3],r="nivo-lightbox-youtube"),"vimeo"==l[1]&&(h="http://player.vimeo.com/video/"+l[3],r="nivo-lightbox-vimeo"),h){var c=t("<iframe>",{src:h,"class":r,frameborder:0,vspace:0,hspace:0,scrolling:"auto"});o.html(c),c.load(function(){o.removeClass("nivo-lightbox-loading")})}}else if("ajax"==e.attr("data-lightbox-type"))t.ajax({url:a,cache:!1,success:function(e){var n=t('<div class="nivo-lightbox-ajax" />');n.append(e),o.html(n).removeClass("nivo-lightbox-loading"),n.outerHeight()<o.height()&&n.css({position:"relative",top:"50%","margin-top":-(n.outerHeight()/2)+"px"}),t(i).resize(function(){n.outerHeight()<o.height()&&n.css({position:"relative",top:"50%","margin-top":-(n.outerHeight()/2)+"px"})})},error:function(){var i=t('<div class="nivo-lightbox-error"><p>'+n.options.errorMessage+"</p></div>");o.html(i).removeClass("nivo-lightbox-loading")}});else if("#"==a.substring(0,1)&&"inline"==e.attr("data-lightbox-type"))if(t(a).length){var v=t('<div class="nivo-lightbox-inline" />');v.append(t(a).clone().show()),o.html(v).removeClass("nivo-lightbox-loading"),v.outerHeight()<o.height()&&v.css({position:"relative",top:"50%","margin-top":-(v.outerHeight()/2)+"px"}),t(i).resize(function(){v.outerHeight()<o.height()&&v.css({position:"relative",top:"50%","margin-top":-(v.outerHeight()/2)+"px"})})}else{var g=t('<div class="nivo-lightbox-error"><p>'+n.options.errorMessage+"</p></div>");o.html(g).removeClass("nivo-lightbox-loading")}else{if("iframe"!=e.attr("data-lightbox-type"))return!1;var f=t("<iframe>",{src:a,"class":"nivo-lightbox-item",frameborder:0,vspace:0,hspace:0,scrolling:"auto"});o.html(f),f.load(function(){o.removeClass("nivo-lightbox-loading")})}if(e.attr("title")){var u=t("<span>",{"class":"nivo-lightbox-title"});u.text(e.attr("title")),t(".nivo-lightbox-title-wrap").html(u)}else t(".nivo-lightbox-title-wrap").html("")},constructLightbox:function(){if(t(".nivo-lightbox-overlay").length)return t(".nivo-lightbox-overlay");var i=t("<div>",{"class":"nivo-lightbox-overlay nivo-lightbox-theme-"+this.options.theme+" nivo-lightbox-effect-"+this.options.effect}),o=t("<div>",{"class":"nivo-lightbox-wrap"}),e=t("<div>",{"class":"nivo-lightbox-content"}),n=t('<a href="#" class="nivo-lightbox-nav nivo-lightbox-prev">Previous</a><a href="#" class="nivo-lightbox-nav nivo-lightbox-next">Next</a>'),a=t('<a href="#" class="nivo-lightbox-close" title="Close"><span class="icon_close_alt"></span></a>'),l=t("<div>",{"class":"nivo-lightbox-title-wrap"}),s=0;s&&i.addClass("nivo-lightbox-ie"),o.append(e),o.append(l),i.append(o),i.append(n),i.append(a),t("body").append(i);var h=this;return h.options.clickOverlayToClose&&i.on("click",function(i){(i.target===this||t(i.target).hasClass("nivo-lightbox-content")||t(i.target).hasClass("nivo-lightbox-image"))&&h.destructLightbox()}),a.on("click",function(t){t.preventDefault(),h.destructLightbox()}),i},destructLightbox:function(){var i=this;this.options.beforeHideLightbox.call(this),t(".nivo-lightbox-overlay").removeClass("nivo-lightbox-open"),t(".nivo-lightbox-nav").hide(),t("body").removeClass("nivo-lightbox-body-effect-"+i.options.effect);var o=0;o&&(t(".nivo-lightbox-overlay iframe").attr("src"," "),t(".nivo-lightbox-overlay iframe").remove()),t(".nivo-lightbox-prev").off("click"),t(".nivo-lightbox-next").off("click"),t(".nivo-lightbox-content").empty(),this.options.afterHideLightbox.call(this)},isHidpi:function(){var t="(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";return i.devicePixelRatio>1?!0:i.matchMedia&&i.matchMedia(t).matches?!0:!1}},t.fn[n]=function(i){return this.each(function(){t.data(this,n)||t.data(this,n,new e(this,i))})},t("a").nivoLightbox({effect:"fade"})}(jQuery,window,document);