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
    $('body').click(function (event) {
        if(!$(event.target).closest('#sidr-mobile').length){
            $.sidr('close', 'sidr-mobile');
        }
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

    /*
    * Apply carousel
    */
    $('.atlast-slider-container').slick({
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 5500
    });

    $('.blog-carousel-wrapper').slick({
       arrows: true,
       autoplay: true,
       infinite: true,
       autoplaySpeed: 4000,
       slidesToShow: atlast_business_vars.carousel_slidesToShow,
       slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    autoplay: true,
                    infinite: true,
                    autoplaySpeed: 3000,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                    autoplay: true,
                    infinite: true,
                    autoplaySpeed: 3000,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    infinite: true,
                    autoplaySpeed: 3000,
                    arrows: false
                }
            },
        ]
    });

    /*
    * Apply the faq accordion
    */
    $('.faq-item-title').on('click', function () {
        $('.faq-item-title').not(this).removeClass('active');
        var contentToBeShown = $(this).attr('data-content');
        $(this).addClass("active");

        $('#'+contentToBeShown).slideDown(800);
        $('.faq-item-content').not('#'+contentToBeShown).slideUp(800);
    });
});

