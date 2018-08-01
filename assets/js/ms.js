jQuery(document).ready(function ($) {
    'use-strict';

    var stickyHeader, stickyNavTop, mobileTrigger, mobileNavContainer, mobileNav, fsLoopItem, ajaxAddToCart,
        testimonialsContainer, ajaxEnabled;

    mobileNavContainer = $('.mobile-nav-container');
    mobileTrigger = $('.mob-trigger');
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
    /* Overlay =*/
    $('#close-btn').click(function () {
        $('#search-overlay').fadeOut();
        $('.search-btn').show();
    });
    $('.search-btn').click(function () {
        $(this).hide();
        $('#search-overlay').fadeIn();
        return false;
    });


    $('a#cart-close-button').click(function () {
        $('#cart-overlay').fadeOut();
        return false;
    });

    /*= Slider at the front page =*/
    var sliderWrapper = $('.fs-slider-wrapper');
    sliderWrapper.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true
    });

    // Carousels

    var testimonialWrapper = $('.testimonial-wrapper');

    testimonialWrapper.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 500,
        dots: true,
        arrows: false
    });
});

