jQuery(document).ready(function ($) {
    "use strict";
    $(function () {
        $('#mainslider').slick({
            dots: false,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            navigation: false,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
        });

        $(".gallery-columns-1").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: true,
            nextArrow: '<i class="nav nav-angle-right"></i>',
            prevArrow: '<i class="nav nav-angle-left"></i>',
        });

    });

    $(function () {
        $('.icon-search').on('click', function() {
            $('body').toggleClass('united-model');
        });
        $('.cross-exit').on('click', function() {
            $('body').removeClass('united-model');
        });
    });


    $('div.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function (element) {
                return element.find('img');
            }
        }
    });

    $('div.gallery-icon').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title');
            }
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function (element) {
                return element.find('img');
            }
        }
    });

});