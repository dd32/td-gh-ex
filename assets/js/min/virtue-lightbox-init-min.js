jQuery(document).ready(function(t){function e(e,o){return/(png|jpg|jpeg|gif|tiff|bmp)$/.test(t(o).attr("href").toLowerCase().split("?")[0].split("#")[0])}function o(){t('a[href]:not(".kt-no-lightbox")').filter(e).attr("data-rel","lightbox")}function i(){t.extend(!0,t.magnificPopup.defaults,{tClose:"",tLoading:virtue_lightbox.loading,gallery:{tPrev:"",tNext:"",tCounter:virtue_lightbox.of},image:{tError:virtue_lightbox.error,titleSrc:function(t){return t.el.find("img").attr("alt")}}}),t("a[data-rel^='lightbox']:not('.kt-no-lightbox'):not('.custom-link')").magnificPopup({type:"image"}),t(".kad-light-gallery").each(function(){t(this).find("a[data-rel^='lightbox']:not('.kt-no-lightbox'):not('.custom-link')").magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:"title"}})}),t(".kad-light-wp-gallery").each(function(){t(this).find('a[data-rel^="lightbox"]:not(".kt-no-lightbox"):not(".custom-link")').magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:function(t){return t.el.find("img").attr("data-caption")}}})}),t(".wp-block-gallery").each(function(){t(this).find('a[data-rel^="lightbox"]:not(".kt-no-lightbox"):not(".custom-link")').magnificPopup({type:"image",gallery:{enabled:!0},image:{titleSrc:function(t){return t.el.parents(".blocks-gallery-item").find("figcaption").length?t.el.parents(".blocks-gallery-item").find("figcaption").html():t.el.find("img").attr("alt")}}})}),t(".woocommerce-product-gallery__wrapper.woo_product_slider_enabled.woo_product_zoom_enabled").each(function(){t(this).parents(".woocommerce-product-gallery").prepend('<a href="#" class="woocommerce-product-gallery__trigger"></a>'),t(this).parents(".woocommerce-product-gallery").find("a.woocommerce-product-gallery__trigger").on("click",function(e){e.preventDefault(),2<=t(this).parents(".woocommerce-product-gallery").find(".woocommerce-product-gallery__wrapper").children().length?t(this).parents(".woocommerce-product-gallery").find(".flex-active-slide a[data-rel^='lightbox']:not('.kt-no-lightbox')").magnificPopup("open",t(this).parents(".woocommerce-product-gallery").find(".flex-active-slide").index()):t(this).parents(".woocommerce-product-gallery").find("a[data-rel^='lightbox']:not('.kt-no-lightbox')").magnificPopup("open")})})}o(),i(),t(window).on("infintescrollnewelements",function(t){i()})});