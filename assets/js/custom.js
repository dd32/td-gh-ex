jQuery(document).ready(function(n) {
    jQuery("#nav>ul").addClass("main-list"), jQuery("body").prepend('<div class="mobile-menu"></div>'), jQuery(".main-list").clone().appendTo(".mobile-menu"), jQuery(".mobile-menu ul.main-list > li").find("ul").before('<span class="dropdown"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></div>'), jQuery(".dropdown").click(function(n) {
        jQuery(this).toggleClass("open"), jQuery(this).parent().children("ul").slideToggle("fast")
    }), jQuery("#nav").after('<div class="mobile-nav"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>'), jQuery(".mobile-nav").click(function(n) {
        return jQuery(this).hasClass("isDown") ? jQuery(".mobile-menu").stop().animate({
            left: "-300px"
        }, 200) : jQuery(".mobile-menu").stop().animate({
            left: "0px"
        }, 200), jQuery(this).toggleClass("isDown"), !1
    }), jQuery(window).resize(function() {
        jQuery(window).width() >= 1024 ? jQuery(".mobile-menu").addClass("menu-hide") : jQuery(".mobile-menu").removeClass("menu-hide")
    }), jQuery(".header-top .mobile-nav").insertBefore("#logo")
});
/* Start social sharing script */
jQuery(document).ready(function($) {
    jQuery('.social-share a').click(function(){
        newwindow=window.open($(this).attr('href'),'','height=450,width=700');
        if (window.focus) {newwindow.focus()}
        return false;
    });
});

/* End social sharing script */

jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
        animation: "slide",
        keyboard: false,
        multipleKeyboard: false,
        mousewheel: false,
        start: function(slider) {
            jQuery('.flexslider').removeClass('loading');
            setTimeout(function() {
                jQuery('.slider-content h1').animate({
                    bottom: "50%",
                    opacity: 1
                }, 500)
            }, 200);
            setTimeout(function() {
                jQuery('.slider-content p').animate({
                    bottom: "35%",
                    opacity: 1
                }, 500)
            }, 400);
            setTimeout(function() {
                jQuery('.button-row').animate({
                    bottom: "28%",
                    opacity: 1
                }, 500)
            }, 600);
        },
        before: function(slider) {
            jQuery('.slider-content h1,.slider-content p,.button-row').animate({
                bottom: 0,
                opacity: 0
            }, 50);
        },
        after: function(slider) {
            setTimeout(function() {
                jQuery('.slider-content h1').animate({
                    bottom: "50%",
                    opacity: 1
                }, 500)
            }, 200);
            setTimeout(function() {
                jQuery('.slider-content p').animate({
                    bottom: "35%",
                    opacity: 1
                }, 500)
            }, 400);
            setTimeout(function() {
                jQuery('.button-row').animate({
                    bottom: "28%",
                    opacity: 1
                }, 500)
            }, 600);
        }
    });
});
jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollToTop').fadeIn()
        } else {
            jQuery('.scrollToTop').fadeOut()
        }
    });
    jQuery('.scrollToTop').click(function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 800);
        return false
    });
   });
   jQuery(document).ready(function(e) {
    windowWidth = jQuery(window).outerWidth();
    if (windowWidth >= 1024) {
        jQuery(window).scroll(function() {
            var yPos = (jQuery(window).scrollTop());
            if (yPos > 0) {
                jQuery("#header").addClass('fixed');
            } else {
                jQuery("#header").removeClass('fixed');
            }
        });
    }
});