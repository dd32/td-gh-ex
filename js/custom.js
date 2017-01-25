/*
 *  jQuery All funtion
 *
 */
/* slider
============================================= */

jQuery(window).load(function(){
       jQuery('.flexslider').flexslider({
          animation: "fade",
          animationLoop: true,
          start: function(slider){
         }
       });
    });

/* Mobile-menu
============================================= */			
jQuery(document).ready(function(e) {
    jQuery(".main_nav>ul").addClass("main-list"), jQuery("body").prepend('<div class="mobile-menu"></div>'), jQuery("body").append('<div class="site-overlay"></div>'), jQuery(".main-list").clone().appendTo(".mobile-menu"), jQuery("#logo").clone().appendTo(".mobile-menu"),jQuery(".header-search").clone().appendTo(".mobile-menu"), jQuery(".mobile-menu #logo").insertBefore(".mobile-menu .main-list"), jQuery(".mobile-menu ul.main-list > li").find("ul").before('<span class="dropdown"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div>'), jQuery(".main_nav").after('<div class="toggle-mobile"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span><span class="layer three">&nbsp;</span></div>'), jQuery(".dropdown").click(function(e) {
        jQuery(this).toggleClass("open"), jQuery(this).next("ul").slideToggle()
    }), jQuery(document).ready(function(e) {
        var n = !0;
        jQuery(".toggle-mobile").click(function() {
            jQuery(".mobile-menu").toggleClass("show"), jQuery(".site-overlay").addClass("overlay-show"), n = !1
        }), jQuery(".mobile-menu").click(function() {
            n = !1
        }), jQuery("html,.mobile-menu>ul li a,.site-overlay").click(function() {
            n && (jQuery(".mobile-menu").removeClass("show"), jQuery(".site-overlay").removeClass("overlay-show")), n = !0
        })
    })
}), jQuery(document).ready(function(e) {
    jQuery("#menu_btn").click(function() {
        jQuery("#menu_btn").toggleClass("open"), jQuery(".nav").fadeToggle()
    })
})