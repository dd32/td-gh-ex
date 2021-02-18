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

        $(".gallery-columns-1, ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid").each(function () {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: true,
                nextArrow: '<i class="nav icon-right"></i>',
                prevArrow: '<i class="nav icon-left"></i>',
            });
        });
    });

    $(function () {
        $('.widget-area').theiaStickySidebar({
            additionalMarginTop: 30
        });
    });


    $(function () {
        $('.icon-search').on('click', function (event) {
            $('body').toggleClass('united-model');
            $('body').addClass('window-scroll-locked');
            setTimeout(function () { 
                $('.model-search-wrapper .search-field').focus();
            }, 300);
            
        });
        $('.cross-exit').on('click', function (event) {
            $('body').removeClass('united-model');
            $('body').removeClass('window-scroll-locked');
            $('.icon-search').focus();
        });

        $(document).keyup(function(j) {
            if (j.key === "Escape") {
                $('body').removeClass('united-model');
                $('body').removeClass('window-scroll-locked');
                $('.icon-search').focus();
            }
        });

        $('.searchbar-skip-link').focus(function(){
            $('.model-search .search-submit').focus();
        });

        $( 'input, a, button' ).on( 'focus', function() {
            if ( $( 'body' ).hasClass( 'united-model' ) ) {

                if ( ! $( this ).parents( '.model-search' ).length ) {
                    $('.cross-exit').focus();
                }
            }
        } );

    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-up').fadeIn();
        } else {
            $('.scroll-up').fadeOut();
        }
    });

    $('.scroll-up').on("click", function (e) {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $(".gallery, .wp-block-gallery").each(function () {
        $(this).magnificPopup({
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

    $('.zoom-gallery').each(function () {
        $(this).magnificPopup({
            delegate: 'span',
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
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });

});