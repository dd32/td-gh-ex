/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {

	/***********************************************/
	/******************  Features  *****************/
	/***********************************************/

	// Show this section
	wp.customize( 'asterion_features_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#features' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#features' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_features_title', function( value ) {
		value.bind( function( to ) {

			$( '#features .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_features_text', function( value ) {
		value.bind( function( to ) {

			$( '#features .section-title p' ).html( to );
		} );
	} );


	// section color
	wp.customize( 'asterion_features_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#features' ).css( 'background-color', to );	
			} else {
				$( '#features' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_features_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#features' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#features' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );

	/***********************************************/
	/****************** Portfolio  *****************/
	/***********************************************/
	
	// Show this section
	wp.customize( 'asterion_portfolio_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#portfolio' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#portfolio' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_portfolio_title', function( value ) {
		value.bind( function( to ) {

			$( '#portfolio .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_portfolio_text', function( value ) {
		value.bind( function( to ) {

			$( '#portfolio .section-title p' ).html( to );
		} );
	} );


	// section color
	wp.customize( 'asterion_portfolio_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#portfolio' ).css( 'background-color', to );	
			} else {
				$( '#portfolio' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_portfolio_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#portfolio' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#portfolio' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );

	/***********************************************/
	/****************** Testimonials  *****************/
	/***********************************************/
	
	// Show this section
	wp.customize( 'asterion_testimonials_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#testimonials' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#testimonials' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_testimonials_title', function( value ) {
		value.bind( function( to ) {

			$( '#testimonials .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_testimonials_text', function( value ) {
		value.bind( function( to ) {

			$( '#testimonials .section-title p' ).html( to );
		} );
	} );


	// section color
	wp.customize( 'asterion_testimonials_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#testimonials' ).css( 'background-color', to );	
			} else {
				$( '#testimonials' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_testimonials_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#testimonials' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#testimonials' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );

	/***********************************************/
	/******************  Team  *****************/
	/***********************************************/

	// Show this section
	wp.customize( 'asterion_team_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#team' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#team' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_team_title', function( value ) {
		value.bind( function( to ) {

			$( '#team .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_team_text', function( value ) {
		value.bind( function( to ) {

			$( '#team .section-title p' ).html( to );
		} );
	} );


	// section color
	wp.customize( 'asterion_team_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#team' ).css( 'background-color', to );	
			} else {
				$( '#team' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_team_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#team' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#team' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );

	/***********************************************/
	/******************  About  *****************/
	/***********************************************/

	// Show this section
	wp.customize( 'asterion_about_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#about' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#about' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_about_title', function( value ) {
		value.bind( function( to ) {

			$( '#about .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_about_text', function( value ) {
		value.bind( function( to ) {

			$( '#about .section-title p' ).html( to );
		} );
	} );


	// section color
	wp.customize( 'asterion_about_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#about' ).css( 'background-color', to );	
			} else {
				$( '#about' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_about_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#about' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#about' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );
	

	/***********************************************/
	/******************  CONTACT  *****************/
	/***********************************************/

	// Show this section
	wp.customize( 'asterion_contact_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#contact' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#contact' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title
	wp.customize( 'asterion_contact_title', function( value ) {
		value.bind( function( to ) {

			$( '#contact .section-title h2' ).html( to );
		} );
	} );

	// Text
	wp.customize( 'asterion_contact_text', function( value ) {
		value.bind( function( to ) {

			$( '#contact .section-title p' ).html( to );
		} );
	} );

	// section color
	wp.customize( 'asterion_contact_bg_color', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#contact' ).css( 'background-color', to );	
			} else {
				$( '#contact' ).css( 'background-color', '#ffffff' );	
			}
			
		} );
	} );


	// section text color
	wp.customize( 'asterion_contact_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#contact' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#contact' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );


	// Address title
	wp.customize( 'asterion_contact_address_title', function( value ) {
		value.bind( function( to ) {

			$( '#contact .address-details .ot-address .section-text h4' ).html( to );
		} );
	} );

	// Address 
	wp.customize( 'asterion_contact_address', function( value ) {
		value.bind( function( to ) {

			$( '#contact .address-details .ot-address .section-text p' ).html( to );
		} );
	} );

	// Contact info title 
	wp.customize( 'asterion_contact_info_title', function( value ) {
		value.bind( function( to ) {

			$( '#contact .address-details .ot-contact .section-text h4' ).html( to );
		} );
	} );

	// Contact info phone 
	wp.customize( 'asterion_contact_info_phone', function( value ) {
		value.bind( function( to ) {

			$( '#contact .address-details .ot-contact .section-text p.ot-phone span' ).html( to );
		} );
	} );

	// Contact info email 
	wp.customize( 'asterion_contact_info_email', function( value ) {
		value.bind( function( to ) {

			$( '#contact .address-details .ot-contact .section-text p.ot-email span' ).html( to );
		} );
	} );

	/***********************************************/
	/******************  GENERAL  *****************/
	/***********************************************/

	// Copyright
	wp.customize( 'asterion_copyright', function( value ) {
		value.bind( function( to ) {

			$( '.mz-footer .ot-copyright' ).html( to );
		} );
	} );


	/***********************************************/
	/******************  HEADER   *****************/
	/***********************************************/

	// Header image 
	wp.customize( 'asterion_intro_image', function( value ) {
		value.bind( function( to ) {
			if( to !== false ) {
				$( '#header' ).css( "background-image", 'url(' + to + ')' );	
			} else {
				$( '#header' ).css( "background-image", 'none' );	
			}
			
		} );
	} );

	// image parallax
	wp.customize( 'asterion_intro_image_parallax', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#header' ).removeClass( 'intro-parallax' );
			} else if( to == true ) {
				$( '#header' ).addClass( 'intro-parallax' );
			}
		} );
	} );

	// image overlay
	wp.customize( 'asterion_intro_image_overlay', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#header .slider-container' ).removeClass( 'dark-overlay' );
			} else if( to == true ) {
				$( '#header .slider-container' ).addClass( 'dark-overlay' );
			}
		} );
	} );

	// Header image title 1
	wp.customize( 'asterion_header_title_1', function( value ) {
		value.bind( function( to ) {
			$( '.slider-container .intro-text h3.intro-lead-in' ).html( to );
		} );
	} );

	// Header image title 2
	wp.customize( 'asterion_header_title_2', function( value ) {
		value.bind( function( to ) {
			$( '.slider-container .intro-text h2.intro-heading' ).html( to );
		} );
	} );

	// Header Button Title
	wp.customize( 'asterion_header_button_title', function( value ) {
		value.bind( function( to ) {
			$( '.slider-container .intro-text a' ).html( to );
		} );
	} );

	// Header Button URL
	wp.customize( 'asterion_header_button_url', function( value ) {
		value.bind( function( to ) {
			$( '.slider-container .intro-text a' ).attr( 'href', to );
		} );
	} );

	// Header Button target
	wp.customize( 'asterion_header_button_target', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.slider-container .intro-text a' ).attr( 'target', '_self' );
			} else if( to == true ) {
				$( '.slider-container .intro-text a' ).attr( 'target', '_blank' );
			}
		} );
	} );


	// single post image
	wp.customize( 'asterion_single_post_image', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.single-post .blog-post-image' ).hide();
			} else if( to == true ) {
				$( '.single-post .blog-post-image' ).show();
			}
		} );
	} );


	// single post data
	wp.customize( 'asterion_single_post_date', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.single-post .ot-post-date' ).hide();
			} else if( to == true ) {
				$( '.single-post .ot-post-date' ).show();
			}
		} );
	} );
	// single post author
	wp.customize( 'asterion_single_post_author', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.single-post .ot-post-author' ).hide();
			} else if( to == true ) {
				$( '.single-post .ot-post-author' ).show();
			}
		} );
	} );
	// single post tags
	wp.customize( 'asterion_single_post_tags', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.single-post .mz-entry-tags' ).hide();
			} else if( to == true ) {
				$( '.single-post .mz-entry-tags' ).show();
			}
		} );
	} );
	// single post categories
	wp.customize( 'asterion_single_post_cat', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.single-post .ot-post-cats' ).hide();
			} else if( to == true ) {
				$( '.single-post .ot-post-cats' ).show();
			}
		} );
	} );


	// blog listing post image
	wp.customize( 'asterion_blog_post_image', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.blog .blog-post-image' ).hide();
			} else if( to == true ) {
				$( '.blog .blog-post-image' ).show();
			}
		} );
	} );

	// blog listing post categories
	wp.customize( 'asterion_blog_post_cat', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.blog .ot-post-cats' ).hide();
			} else if( to == true ) {
				$( '.blog .ot-post-cats' ).show();
			}
		} );
	} );

	// blog listing post date
	wp.customize( 'asterion_blog_post_date', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.blog .ot-post-date' ).hide();
			} else if( to == true ) {
				$( '.blog .ot-post-date' ).show();
			}
		} );
	} );
	// blog listing post comments
	wp.customize( 'asterion_blog_post_comment', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '.blog .ot-post-comments' ).hide();

			} else if( to == true ) {
				$( '.blog .ot-post-comments' ).show();

			}
		} );
	} );


	/***********************************************/
	/******************  COUNTERS  *****************/
	/***********************************************/

	// Show this section
	wp.customize( 'asterion_counters_show', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#counters' ).addClass( 'customizer-display-none' );
			} else if( to == true ) {
				$( '#counters' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Title 1 
	wp.customize( 'asterion_counters_title_1', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-1 h6' ).html( to );
		} );
	} );

	// Count 1 
	wp.customize( 'asterion_counters_count_1', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-1 h2' ).html( to );
			$( '#counters .ot-counter-nr-1 h2' ).data('n', to );
		} );
	} );

	// Title 2 
	wp.customize( 'asterion_counters_title_2', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-2 h6' ).html( to );
		} );
	} );

	// Count 2 
	wp.customize( 'asterion_counters_count_2', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-2 h2' ).html( to );
			$( '#counters .ot-counter-nr-2 h2' ).data('n', to );
		} );
	} );

	// Title 3
	wp.customize( 'asterion_counters_title_3', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-3 h6' ).html( to );
		} );
	} );

	// Count 3 
	wp.customize( 'asterion_counters_count_3', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-3 h2' ).html( to );
			$( '#counters .ot-counter-nr-3 h2' ).data('n', to );
		} );
	} );

	// Title 4
	wp.customize( 'asterion_counters_title_4', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-4 h6' ).html( to );
		} );
	} );

	// Count 4 
	wp.customize( 'asterion_counters_count_4', function( value ) {
		value.bind( function( to ) {
			$( '#counters .ot-counter-nr-4 h2' ).html( to );
			$( '#counters .ot-counter-nr-4 h2' ).data('n', to );
		} );
	} );


	//bg type
	wp.customize( 'asterion_counters_bg_type', function( value ) {
		value.bind( function( to ) {

			if( to == 2 ) {

				$( '#counters' ).css( "background-image", 'none' );	
				$( '#counters' ).css( 'background-color', wp.customize._value.asterion_counters_bg_color() );

				// section color
				wp.customize( 'asterion_counters_bg_color', function( value ) {
					value.bind( function( to ) {
						if( to !== false ) {
							$( '#counters' ).css( 'background-color', to );	
						} else {
							$( '#counters' ).css( 'background-color', '#ffffff' );	
						}
						
					} );
				} );

			}

			if( to == 1 ) {
				$( '#counters' ).css( "background-color", 'none' );	
				$( '#counters' ).css( "background-image", 'url(' + wp.customize._value.asterion_counters_bg_image() + ')' );	

				// section image
				wp.customize( 'asterion_counters_bg_image', function( value ) {
					value.bind( function( to ) {
						if( to !== false ) {
							$( '#counters' ).css( "background-image", 'url(' + to + ')' );	
						} else {
							$( '#counters' ).css( "background-image", 'none' );	
						}
						
					} );
				} );
			}
		});
	});

	// image parallax
	wp.customize( 'asterion_counters_image_parallax', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#counters' ).removeClass( 'intro-parallax' );
			} else if( to == true ) {
				$( '#counters' ).addClass( 'intro-parallax' );
			}
		} );
	} );

	// image overlay
	wp.customize( 'asterion_counters_image_overlay', function( value ) {
		value.bind( function( to ) {
			if( to == false ) {
				$( '#counters .short-section' ).removeClass( 'dark-overlay' );
			} else if( to == true ) {
				$( '#counters .short-section' ).addClass( 'dark-overlay' );
			}
		} );
	} );

	// section text color
	wp.customize( 'asterion_counters_text_color', function( value ) {
		value.bind( function( to ) {
			if( to != false ) {
				$( '#counters' ).addClass( 'text-light' ).removeClass( 'text-dark' );
			} else {
				$( '#counters' ).addClass( 'text-dark' ).removeClass( 'text-light' );
			}
		} );
	} );


} )( jQuery );