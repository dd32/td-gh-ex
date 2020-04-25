/**
 * Custom js for theme
 */
(function ($) {
    $(window).on('load', function () {
        $("#mini-loader").fadeOut(500);
    });
    $(document).ready(function () {
        var pageSection = $(".data-bg");
        pageSection.each(function (indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
        $('.background-src').each(function () {
            var src = $(this).children('img').attr('src');
            $(this).css('background-image', 'url(' + src + ')').children('img').hide();
        });
    });

    $(document).ready(function () {
        $('.search-icon').on('click', function (event) {
            $('body').toggleClass('search-toogle');
            setTimeout(function () { 
                $('.search-icon').focus();
            }, 300);
            
        });
        $('.esc-search').on('click', function (event) {
            $('body').removeClass('search-toogle');
            $('.search-icon').focus();
        });

        $(document).keyup(function(j) {
            if (j.key === "Escape") { // escape key maps to keycode `27`
                $('body').removeClass('search-toogle');
            }
        });

        $('.popup-search .esc-search').blur(function(){
            if ($('body').hasClass('search-toogle')) {
                $('.popup-search .search-field').focus();
            }
        });    
 
    });

    $(document).ready(function () {
        $(".main-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: true,
            nextArrow: '<i class="navcontrol-icon slide-next ion-ios-arrow-right"></i>',
            prevArrow: '<i class="navcontrol-icon slide-prev ion-ios-arrow-left"></i>',
            easing: "linear"
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
                nextArrow: '<i class="navcontrol-icon slide-next ion-ios-arrow-right"></i>',
                prevArrow: '<i class="navcontrol-icon slide-prev ion-ios-arrow-left"></i>',
                easing: "linear"
            });
        });
        $('.gallery, .wp-block-gallery').each(function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
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
    });
    $(document).ready(function () {
        $('.background').each(function () {
            var src = $(this).children('img').attr('src');
            $(this).css('background-image', 'url(' + src + ')').children('img').hide();
        });
    });
    $(document).ready(function () {
        $("#scroll-top").on("click", function () {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    $(document).scroll(function () {
        if ($(window).scrollTop() > $(window).height() / 2) {
            $("#scroll-top").fadeIn(300);
        } else {
            $("#scroll-top").fadeOut(300);
        }
    });
})(jQuery);