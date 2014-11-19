jQuery(window).scroll(function ()
{
    if (jQuery(document).width() >= 768) {
        if (jQuery(window).scrollTop() > 0) {

            if (scroll_top_header == '') {
                jQuery(".top-header").slideUp()
            }
            jQuery("header").css({'position': 'fixed'});
            jQuery(".section-main").css({'margin-top': jQuery("header").height()});

        }
        if (jQuery(window).scrollTop() <= 0) {

            if (scroll_top_header == '') {   
                jQuery(".top-header").slideDown()
            }
            jQuery("header").css({'position': 'static'});
            jQuery(".section-main").css({'margin-top': '0px'});
        }
    }
});

jQuery(document).ready(function () {
    jQuery("#a1_submit").click(function () {
        if (jQuery("#a1_name").val() == "" || jQuery("#a1_email").val() == "" || jQuery("#a1_phone").val() == "" || jQuery("#a1_message").val() == "") {
            if (jQuery("#a1_name").val() == "") {
                jQuery("#a1_name").css('border', '1px solid red');
            }
            if (jQuery("#a1_email").val() == "") {
                jQuery("#a1_email").css('border', '1px solid red');
            }
            if (jQuery("#a1_phone").val() == "") {
                jQuery("#a1_phone").css('border', '1px solid red');
            }
            if (jQuery("#a1_message").val() == "") {
                jQuery("#a1_message").css('border', '1px solid red');
            }
            return false;
        }
    });
    jQuery("#owl-demo").owlCarousel({
        items: 1,
        autoPlay: true,
        lazyLoad: true,
        navigation: true,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [980, 1],
        itemsTabletSmall: [768, 1]

    });
    jQuery("#join-gallery").owlCarousel({
        items: 6,
        itemsDesktop: [1024, 6],
        itemsDesktopSmall: [980, 5],
        itemsTablet: [768, 4],
        itemsTabletSmall: [600, 3],
        itemsMobile: [460, 2],
        autoPlay: true,
        lazyLoad: true,
        navigation: true
    });


});
