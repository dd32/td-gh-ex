jQuery(document).ready(function () {  

    if (window.matchMedia('(min-width: 768px)').matches) {
        jQuery(".amenu-list li").hover(
                function () {
                    jQuery(this).children('ul').hide();
                    jQuery(this).children('ul').slideDown('500');
                },
                function () {
                    jQuery(this).children('ul').slideUp('slow');
                });
    }

    jQuery("#blog_slide").owlCarousel({
        autoPlay: true,
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 2],
        itemsMobile: [600, 1]


    });
    var owl = jQuery("#blog_slide");
    owl.owlCarousel();
    jQuery(".blog-next").click(function () {
        owl.trigger('owl.next');
    });
    jQuery(".blog-prev").click(function () {
        owl.trigger('owl.prev');
    });

});

jQuery(window).scroll(function () {
    if (jQuery(document).width() > 980) {
        if (jQuery(window).scrollTop()) {
            if (jQuery('body').hasClass('logged-in'))
                jQuery(".scroll-header").addClass("slideDownScaleReversedIn").removeClass("slideDownScaleReversedOut").css({'position': 'fixed', 'top': '32px'});
            else
                jQuery(".scroll-header").addClass("slideDownScaleReversedIn").removeClass("slideDownScaleReversedOut").css({'position': 'fixed', 'top': '0'});
        }
        else {
            if (jQuery('body').hasClass('logged-in'))
                jQuery(".scroll-header").addClass("slideDownScaleReversedOut").removeClass("slideDownScaleReversedIn").css({'position': 'absolute', 'top': '32px'});
            else
                jQuery(".scroll-header").addClass("slideDownScaleReversedOut").removeClass("slideDownScaleReversedIn").css({'position': 'absolute', 'top': '0'});
            if (!(jQuery('body > section > div').hasClass('banner')))
                jQuery('body > section').css({'margin-top': jQuery('.scroll-header').height()});
        }
    }

});



