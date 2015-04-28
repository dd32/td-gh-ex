(function($){
	var $main_menu = $('ul.nav'),
		$featured = $('#featured'),
		et_slider;

	$(document).ready(function(){
		$main_menu.superfish({
			delay:       300,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  true,                           // disable generation of arrow mark-up
			dropShadows: false                            // disable drop shadows
		});
		
		if ( $featured.length ){
			et_slider_settings = {
				slideshow: false
			}

			if ( $featured.find('.slide').length == 1 ) {
				$featured.find('.slide').addClass( 'flex-active-slide' ).show();
			} else {
				if ( $featured.hasClass('et_slider_auto') ) {
					var et_slider_autospeed_class_value = /et_slider_speed_(\d+)/g;

					et_slider_settings.slideshow = true;

					et_slider_autospeed = et_slider_autospeed_class_value.exec( $featured.attr('class') );

					et_slider_settings.slideshowSpeed = et_slider_autospeed[1];
				}

				if ( $featured.hasClass('et_slider_effect_slide') ){
					et_slider_settings.animation = 'slide';
				}
				et_slider_settings.pauseOnHover = true;

				$featured.flexslider( et_slider_settings );
			}
		}
	});
})(jQuery)