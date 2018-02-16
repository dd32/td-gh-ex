jQuery(document).ready(function ($) {
    'use-strict';

    var stickyHeader, stickyNavTop, mobileTrigger, mobileNavContainer, mobileNav;


    mobileNavContainer = $('.mobile-nav-container');
    mobileTrigger = $('a.mobile-trigger');
    var header = $('#header');
    stickyNavTop = header.offset().top;

    var stickyNav = function () {
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top
        if (scrollTop > stickyNavTop) {
            header.addClass('justwp-sticky box-shadow-bottom');
            if (header.hasClass('transparent-header')) {
                header.removeClass('transparent-header');
                header.addClass('no-transparent-header');
            }
        } else {
            header.removeClass('justwp-sticky box-shadow-bottom');
            if (header.hasClass('no-transparent-header')) {
                header.removeClass('no-transparent-header');
                header.addClass('transparent-header');
            }
        }
    };

    mobileTrigger.sidr({
        name: 'sidr-mobile',
        source: '#main-navigation',
        displace: false

    });

    /*
    * Impose some same height
    */
    $('.sameHeightDiv').matchHeight();

    $(window).scroll(function () {
        if (header.hasClass('sticky-header')) {
            stickyNav();
        }
    });
});

