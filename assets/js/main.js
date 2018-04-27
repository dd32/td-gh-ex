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
        $(".main-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            infinite: true,
            dots: true,
            nextArrow: '<i class="navcontrol-icon slide-next la la-angle-right"></i>',
            prevArrow: '<i class="navcontrol-icon slide-prev la la-angle-left"></i>',
            easing: "linear"
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