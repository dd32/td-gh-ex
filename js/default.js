jQuery(document).ready(function() {

    jQuery("#our-brand").owlCarousel({
        autoPlay: false, //Set AutoPlay to 3 seconds

        items: 3,
        itemsDesktop: [1024, 3],
        itemsDesktopSmall: [979, 3],
        itemsMobile: [768, 2],
        itemsMobile : [380, 1]

    });
    jQuery(".next").click(function() {
        jQuery("#our-brand").trigger('owl.next');
    })
    jQuery(".prev").click(function() {
        jQuery("#our-brand").trigger('owl.prev');
    })
});

