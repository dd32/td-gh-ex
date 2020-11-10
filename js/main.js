(function(){

    jQuery(document).ready(function() {

        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.bs_upscr').fadeIn();
            } else {
                jQuery('.bs_upscr').fadeOut();
            }
        });
		
		jQuery('.bs_upscr').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 700);
			return false;
		});
    });
})(jQuery);