(function($) {
 "use strict"
	$("body").fitVids();
	
	$("#services").owlCarousel({
		items : 3,
		lazyLoad : true,
		navigation : false,
		pagination : true,
		autoPlay: true
    });
	
	// WOW
	new WOW(
		{ offset: 300 }
	).init();
			
	// DM Top
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 1) {
			jQuery('.dmtop').css({bottom:"25px"});
		} else {
			jQuery('.dmtop').css({bottom:"-100px"});
		}
	});
	jQuery('.dmtop').click(function(){
		jQuery('html, body').animate({scrollTop: '0px'}, 800);
		return false;
	});
	
	// TOOLTIP
    $('.social-icons').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })

// Pretty Photo for blog
$('a[data-gal]').each(function() {
	$(this).attr('rel', $(this).data('gal'));
});  	
$("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
	$("#header-style-1").affix({
	offset: {
	  top: 50
	, bottom: function () {
		return (this.bottom = $('#copyrights').outerHeight(true))
	  }
	}
});
})(jQuery);