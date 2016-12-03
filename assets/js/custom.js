/* Start social sharing script */
jQuery(document).ready(function($) {
    jQuery('.social-share a').click(function(){
        newwindow=window.open($(this).attr('href'),'','height=450,width=700');
        if (window.focus) {newwindow.focus()}
        return false;
    });
});

/* End social sharing script */

jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
        animation: "slide",
        keyboard: false,
        multipleKeyboard: false,
        mousewheel: false,
        start: function(slider) {
            jQuery('.flexslider').removeClass('loading');
            setTimeout(function() {
                jQuery('.slider-content h1').animate({
                    bottom: "50%",
                    opacity: 1
                }, 500)
            }, 200);
            setTimeout(function() {
                jQuery('.slider-content p').animate({
                    bottom: "35%",
                    opacity: 1
                }, 500)
            }, 400);
            setTimeout(function() {
                jQuery('.button-row').animate({
                    bottom: "28%",
                    opacity: 1
                }, 500)
            }, 600);
        },
        before: function(slider) {
            jQuery('.slider-content h1,.slider-content p,.button-row').animate({
                bottom: 0,
                opacity: 0
            }, 50);
        },
        after: function(slider) {
            setTimeout(function() {
                jQuery('.slider-content h1').animate({
                    bottom: "50%",
                    opacity: 1
                }, 500)
            }, 200);
            setTimeout(function() {
                jQuery('.slider-content p').animate({
                    bottom: "35%",
                    opacity: 1
                }, 500)
            }, 400);
            setTimeout(function() {
                jQuery('.button-row').animate({
                    bottom: "28%",
                    opacity: 1
                }, 500)
            }, 600);
        }
    });
    jQuery('.flex-gallery').show();
    jQuery('.flex-gallery').flexslider({
        animation: "slide"
    })
});