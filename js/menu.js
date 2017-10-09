jQuery(document).ready(function(){
    jQuery(".menu-button").click(function(){
        jQuery(".overlay").fadeToggle(400);
       jQuery(this).toggleClass('btn-open').toggleClass('change');
    });
});
jQuery(window).scroll( function() {
        if ( jQuery(window).scrollTop() > 500 ) {
           jQuery('#header').addClass('fixed animated fadeInDown');
    } else {
        jQuery('#header').removeClass('fixed animated fadeInDown');
    }
	if ( jQuery(window).scrollTop() > 500 ) {
           jQuery('#wrapper').addClass('fixed');
    } else {
        jQuery('#wrapper').removeClass('fixed');
    }
});