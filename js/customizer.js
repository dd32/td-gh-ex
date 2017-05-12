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
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
    
    wp.customize( 'beetech_copyright_text', function( value ) {
		value.bind( function( to ) {
			$( '.copyright-text' ).text( to );
		} );
	} );
    
    wp.customize( 'service_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-services .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'service_section_sub_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-services .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'team_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-team .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'team_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-team .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'about_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'about_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_0', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #first .text-holder h6' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_sub_0', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #first .text-holder span' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_1', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #second .text-holder h6' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_sub_1', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #second .text-holder span' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_2', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #third .text-holder h6' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_sub_2', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #third .text-holder span' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_3', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #forth .text-holder h6' ).text( to );
		} );
	} );
    
    wp.customize( 'about_title_sub_3', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-about ul #forth .text-holder span' ).text( to );
		} );
	} );
    
    wp.customize( 'testimonials_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-testimonials .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_icon_0', function( value ) {
		value.bind( function( to ) {
            $( '#bt-section-fact #first .icon-holder i' ).removeClass();
			$( '#bt-section-fact #first .icon-holder i' ).addClass( 'fa '+to );
		} );
	} );
    
    wp.customize( 'fact_counter_title_0', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #first .title' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_counter_number_0', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #first .number' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_icon_1', function( value ) {
		value.bind( function( to ) {
            $( '#bt-section-fact #second .icon-holder i' ).removeClass();
			$( '#bt-section-fact #second .icon-holder i' ).addClass( 'fa '+to );
		} );
	} );
    
    wp.customize( 'fact_counter_title_1', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #second .title' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_counter_number_1', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #second .number' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_icon_2', function( value ) {
		value.bind( function( to ) {
            $( '#bt-section-fact #third .icon-holder i' ).removeClass();
			$( '#bt-section-fact #third .icon-holder i' ).addClass( 'fa '+to );
		} );
	} );
    
    wp.customize( 'fact_counter_title_2', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #third .title' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_counter_number_2', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #third .number' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_icon_3', function( value ) {
		value.bind( function( to ) {
            $( '#bt-section-fact #forth .icon-holder i' ).removeClass();
			$( '#bt-section-fact #forth .icon-holder i' ).addClass( 'fa '+to );
		} );
	} );
    
    wp.customize( 'fact_counter_title_3', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #forth .title' ).text( to );
		} );
	} );
    
    wp.customize( 'fact_counter_number_3', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-fact #forth .number' ).text( to );
		} );
	} );
    
    wp.customize( 'portfolio_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-portfolio .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'portfolio_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-portfolio .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'blog_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-blog .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'blog_section_desc', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-blog .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'clients_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-clients .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'clients_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-clients .bt-section-header p' ).text( to );
		} );
	} );
    
    wp.customize( 'contact_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-contact .bt-section-header h2' ).text( to );
		} );
	} );
    
    wp.customize( 'contact_section_phone', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-contact .detail-contact .number span' ).text( to );
		} );
	} );
    
    wp.customize( 'contact_section_address', function( value ) {
		value.bind( function( to ) {
			$( '#bt-section-contact .detail-contact .address span' ).text( to );
		} );
	} );

} )( jQuery );
