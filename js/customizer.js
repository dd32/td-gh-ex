/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
		console.log( 'callback fires! blogname' );
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
		console.log( 'callback fires! blogdescription' );
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
		console.log( 'callback fires! Text Color' );
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	//
	// Layout Option
	//
	// -- Layout Width
	wp.customize( 'backphoto_layout_width', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css('max-width', to );
		} );
	} );

	// -- Layout Padding
	wp.customize( 'backphoto_layout_padding', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css({'padding-left': to, 'padding-right': to });
		} );
	} );

	//
	// Header
	//
	// -- Header Layout
	wp.customize( 'backphoto_header_setting_layout', function( value ) {
		value.bind( function( to ) {
			if ( 'horizontal' === to ) {
				$( '.site-header' ).addClass('horizontal');
			} else {
				$( '.site-header' ).removeClass('horizontal');
			}
		} );
	} );

	// -- Header Behaviour


	//
	// Color
	//
	// -- Color
	wp.customize( 'backphoto_color_link', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css('color', to );
			$( 'a:visited' ).css('color', to );
		} );
	} );
	wp.customize( 'backphoto_color_link_hover', function( value ) {
		value.bind( function( to ) {
			$( 'a:hover' ).css('color', to );
		} );
	} );
	wp.customize( 'backphoto_color_paragpraph', function( value ) {
		value.bind( function( to ) {
			$( 'body, button, input, select, optgroup, textarea' ).css('color', to );
		} );
	} );
	wp.customize( 'backphoto_color_heading', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css('color', to );
		} );
	} );

	// Typography

	// --- Title Font Family
	wp.customize( 'backphoto_typo_title', function( value ) {
		value.bind( function( to ) {
			if('Arvo' === to) {
				WebFont.load({
				  google: {
				    families: ['Arvo:400,700']
				  }
				});
			} else 
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:300,400,600,700']
				  }
				});
			} else
			if('Merriweather' === to) {
				WebFont.load({
				  google: {
				    families: ['Merriweather:300,400,600,700']
				  }
				});
			} else
			if('Open sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:300,400,600,700']
				  }
				});
			} else
			if('Pt Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:300,400,600,700']
				  }
				});
			} else
			if('Raleway' === to) {
				WebFont.load({
				  google: {
				    families: ['Raleway:300,400,600,700']
				  }
				});
			} else
			if('Roboto Slab' === to) {
				WebFont.load({
				  google: {
				    families: ['Roboto Slab:300,400,600,700']
				  }
				});
			} else
			if('Ubuntu' === to) {
				WebFont.load({
				  google: {
				    families: ['Ubuntu:300,400,600,700']
				  }
				});
			}

			$( '.entry-title' ).css('font-family', to );
		} );
	} );

	// --- Title Font Weight
	wp.customize( 'backphoto_typo_title_weight', function( value ) {
		value.bind( function( to ) {
			console.log('typo title fires');
			$( '.entry-title' ).css('font-weight', to );
		} );
	} );

	// --- Title Font Size
	wp.customize( 'backphoto_typo_title_size', function( value ) {
		value.bind( function( to ) {
			console.log('typo title fires');
			$( '.entry-title' ).css('font-size', to );
		} );
	} );



	// --- H2 Font Family
	wp.customize( 'backphoto_typo_h2', function( value ) {
		value.bind( function( to ) {
			if('Arvo' === to) {
				WebFont.load({
				  google: {
				    families: ['Arvo:400,700']
				  }
				});
			} else 
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:300,400,600,700']
				  }
				});
			} else
			if('Merriweather' === to) {
				WebFont.load({
				  google: {
				    families: ['Merriweather:300,400,600,700']
				  }
				});
			} else
			if('Open sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:300,400,600,700']
				  }
				});
			} else
			if('Pt Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:300,400,600,700']
				  }
				});
			} else
			if('Raleway' === to) {
				WebFont.load({
				  google: {
				    families: ['Raleway:300,400,600,700']
				  }
				});
			} else
			if('Roboto Slab' === to) {
				WebFont.load({
				  google: {
				    families: ['Roboto Slab:300,400,600,700']
				  }
				});
			} else
			if('Ubuntu' === to) {
				WebFont.load({
				  google: {
				    families: ['Ubuntu:300,400,600,700']
				  }
				});
			}

			console.log('h2 Size');
			$( '.entry-content h2' ).css('font-family', to );
		} );
	} );

	// --- H2 Font Weight
	wp.customize( 'backphoto_typo_h2_weight', function( value ) {
		value.bind( function( to ) {
			console.log('h2 Weight');
			$( '.entry-content h2' ).css('font-weight', to );
		} );
	} );

	// --- H2 Font Size
	wp.customize( 'backphoto_typo_h2_size', function( value ) {
		value.bind( function( to ) {
			console.log('h2 Size');
			$( '.entry-content h2' ).css('font-size', to );
		} );
	} );

	
	// --- H3 Font Family
	wp.customize( 'backphoto_typo_h3', function( value ) {
		value.bind( function( to ) {
			if('Arvo' === to) {
				WebFont.load({
				  google: {
				    families: ['Arvo:400,700']
				  }
				});
			} else 
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:300,400,600,700']
				  }
				});
			} else
			if('Merriweather' === to) {
				WebFont.load({
				  google: {
				    families: ['Merriweather:300,400,600,700']
				  }
				});
			} else
			if('Open sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:300,400,600,700']
				  }
				});
			} else
			if('Pt Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:300,400,600,700']
				  }
				});
			} else
			if('Raleway' === to) {
				WebFont.load({
				  google: {
				    families: ['Raleway:300,400,600,700']
				  }
				});
			} else
			if('Roboto Slab' === to) {
				WebFont.load({
				  google: {
				    families: ['Roboto Slab:300,400,600,700']
				  }
				});
			} else
			if('Ubuntu' === to) {
				WebFont.load({
				  google: {
				    families: ['Ubuntu:300,400,600,700']
				  }
				});
			}

			$( '.entry-content h3' ).css('font-family', to );
		} );
	} );

	// --- H3 Font Weight
	wp.customize( 'backphoto_typo_h3_weight', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content h3' ).css('font-weight', to );
		} );
	} );

	// --- H3 Font Size
	wp.customize( 'backphoto_typo_h3_size', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content h3' ).css('font-size', to );
		} );
	} );


	// --- P Font Family
	wp.customize( 'backphoto_typo_p', function( value ) {
		value.bind( function( to ) {
			if('Droid Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Droid Sans:400,700']
				  }
				});
			} else
			if('Open Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:400,700']
				  }
				});
			} else
			if('Lato' === to) {
				WebFont.load({
				  google: {
				    families: ['Lato:400,700']
				  }
				});
			} else
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:400,700']
				  }
				});
			} else
			if('Source Sans Pro' === to) {
				WebFont.load({
				  google: {
				    families: ['Source Sans Pro:400,700']
				  }
				});
			} else
			if('PT Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:400,700']
				  }
				});
			} else
			if('Noto' === to) {
				WebFont.load({
				  google: {
				    families: ['Noto:400,700']
				  }
				});
			} else
			if('Muli' === to) {
				WebFont.load({
				  google: {
				    families: ['Muli:400,700']
				  }
				});
			} else
			if('Fira Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Fira Sans:400,700']
				  }
				});
			}

			$( '.entry-content p' ).css('font-family', to );
		} );
	} );

	// --- P Font Weight
	wp.customize( 'backphoto_typo_p_weight', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content p' ).css('font-weight', to );
		} );
	} );

	// --- P Font Size
	wp.customize( 'backphoto_typo_p_size', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content p' ).css('font-size', to );
		} );
	} );


	// --- Menu Font Family
	wp.customize( 'backphoto_typo_nav', function( value ) {
		value.bind( function( to ) {
			if('Droid Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Droid Sans:400,700']
				  }
				});
			} else
			if('Open Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:400,700']
				  }
				});
			} else
			if('Lato' === to) {
				WebFont.load({
				  google: {
				    families: ['Lato:400,700']
				  }
				});
			} else
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:400,700']
				  }
				});
			} else
			if('Source Sans Pro' === to) {
				WebFont.load({
				  google: {
				    families: ['Source Sans Pro:400,700']
				  }
				});
			} else
			if('PT Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:400,700']
				  }
				});
			} else
			if('Noto' === to) {
				WebFont.load({
				  google: {
				    families: ['Noto:400,700']
				  }
				});
			} else
			if('Muli' === to) {
				WebFont.load({
				  google: {
				    families: ['Muli:400,700']
				  }
				});
			} else
			if('Fira Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Fira Sans:400,700']
				  }
				});
			}

			$( '.main-navigation' ).css('font-family', to );
		} );
	} );

	// --- Menu Font Weight
	wp.customize( 'backphoto_typo_nav_weight', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation' ).css('font-weight', to );
		} );
	} );

	// --- Menu Font Size
	wp.customize( 'backphoto_typo_nav_size', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation' ).css('font-size', to );
		} );
	} );


	// --- Sidebar Font Family
	wp.customize( 'backphoto_typo_sidebar', function( value ) {
		value.bind( function( to ) {
			if('Droid Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Droid Sans:400,700']
				  }
				});
			} else
			if('Open Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Open Sans:400,700']
				  }
				});
			} else
			if('Lato' === to) {
				WebFont.load({
				  google: {
				    families: ['Lato:400,700']
				  }
				});
			} else
			if('Montserrat' === to) {
				WebFont.load({
				  google: {
				    families: ['Montserrat:400,700']
				  }
				});
			} else
			if('Source Sans Pro' === to) {
				WebFont.load({
				  google: {
				    families: ['Source Sans Pro:400,700']
				  }
				});
			} else
			if('PT Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['PT Sans:400,700']
				  }
				});
			} else
			if('Noto' === to) {
				WebFont.load({
				  google: {
				    families: ['Noto:400,700']
				  }
				});
			} else
			if('Muli' === to) {
				WebFont.load({
				  google: {
				    families: ['Muli:400,700']
				  }
				});
			} else
			if('Fira Sans' === to) {
				WebFont.load({
				  google: {
				    families: ['Fira Sans:400,700']
				  }
				});
			}

			$( '.widget-title, #secondary ul, #secondary div, secondary p' ).css('font-family', to );
		} );
	} );

	// --- Sidebar Title Font Weight
	wp.customize( 'backphoto_typo_sidebar_weight', function( value ) {
		value.bind( function( to ) {
			$( '.widget-title' ).css('font-weight', to );
		} );
	} );

	// --- Sidebar Title Font Size
	wp.customize( 'backphoto_typo_sidebar_title_size', function( value ) {
		value.bind( function( to ) {
			$( '.widget-title' ).css('font-size', to );
		} );
	} );

	// --- Sidebar Content Font Size
	wp.customize( 'backphoto_typo_sidebar_content_size', function( value ) {
		value.bind( function( to ) {
			$( '#secondary ul, #secondary div, secondary p' ).css('font-size', to );
		} );
	} );


	// --- Sidebar Content Font Size
	wp.customize( 'backphoto_footer_setting', function( value ) {
		value.bind( function( to ) {
			$( 'footer .copyright' ).text( to );
		} );
	} );

} )( jQuery );