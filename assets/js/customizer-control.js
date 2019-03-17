/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function () {
	wp.customize.bind('ready', function () {

		


		/* 
		* Top header 
		* top header right content option
		*/
		wp.customize( 'arrival_top_right_header_content', function( setting ) {
            wp.customize.control( 'arrival_top_right_header_menus', function( control ) {
                var visibility = function() {
                    if ( 'menus' === setting.get() ) {
                        control.container.removeClass( 'arrival-control-hide' );
                    } else {
                        control.container.addClass( 'arrival-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

            wp.customize.control( 'arrival_top_social_redirect_btn', function( control ) {
                var visibility = function() {
                    if ( 'icons' === setting.get() ) {
                        control.container.removeClass( 'arrival-control-hide' );
                    } else {
                        control.container.addClass( 'arrival-control-hide' );
                    }
                };

                visibility();
                setting.bind( visibility );
            });

        });


	/**
	* Main navigation last item show/hide controller
	*
	*/
	wp.customize( 'arrival_main_nav_right_content', function( setting ) {
	            wp.customize.control( 'arrival_main_nav_right_btn', function( control ) {
	                var visibility = function() {
	                    if ( 'button' === setting.get() ) {
	                        control.container.removeClass( 'arrival-control-hide' );
	                    } else {
	                        control.container.addClass( 'arrival-control-hide' );
	                    }
	                };

	                visibility();
	                setting.bind( visibility );
	            });
	});


    /**
    * Footer social icon show/hide
    *
    */
    wp.customize( 'arrival_footer_icons_enable', function( setting ) {
                wp.customize.control( 'arrival_footer_social_redirect_btn', function( control ) {
                    var visibility = function() {
                        if ( 'yes' === setting.get() ) {
                            control.container.removeClass( 'arrival-control-hide' );
                        } else {
                            control.container.addClass( 'arrival-control-hide' );
                        }
                    };

                    visibility();
                    setting.bind( visibility );
                });
    });


	/**
     * Script for sidebars
     */
      $('body').on('click', '.controls#arrival-img-container li img', function () {
        $('.controls#arrival-img-container li').each(function(){
            $(this).find('img').removeClass ('arrival-radio-img-selected') ;
        });
        $(this).addClass ('arrival-radio-img-selected') ;
    });


	});



})(jQuery);