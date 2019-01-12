jQuery(document).ready(function ($) {
    "use strict";

    $('.jarallax').jarallax({
        speed: 0.2
    });

    /**
    * Back to top button
    */
    $('.scroll-top-top').hide();
    var offset = 250;
    var duration = 300;
    $(window).scroll(function () {
        if ($(this).scrollTop() > offset) {
            $('.scroll-top-top').fadeIn(duration);
        } else {
            $('.scroll-top-top').fadeOut(duration);
        }
    });
    $('body').on('click', '.scroll-top-top', function (event) {
        event.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    });

    /**
    * One page navigation
    *
    */
    var onePageNavigation = function onePageNavigation() {
        $(".site-header .main-navigation").onePageNav({
            currentClass: 'current',
            changeHash: false,
            scrollSpeed: 850,
            scrollThreshold: 0.5
        });
    };

    onePageNavigation;

    /*
    * Toggle search
    */
    $('body').on('click', '.header-last-item.search-wrap', function () {
        $('.arrival-search-form-wrapp').addClass('active');
    });

    $(document).on('click', '.arrival-search-form-wrapp .close', function () {
        $('.arrival-search-form-wrapp').removeClass('active');
    });
});