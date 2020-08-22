jQuery(document).ready(function($){
    // nnc-hero-slider
    var slider_1 = new Swiper('.at-slider__container', {
        slidesPerView: 1,
        speed: 1000,

    });

    // Aos
    AOS.init({
        once: true,
        easing: 'ease',
    });

    // Scroll To Top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.at-scroll-top').addClass("show");
        } else {
            $('.at-scroll-top').removeClass("show");
        }
    });

    $(".at-scroll-top").on("click", function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $('#searchModal').on('shown.bs.modal', function () {
        $('#custom-search-popup').focus();
    });

});
