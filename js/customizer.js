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
			$( '.site-title a, .navbar .navbar-brand h3' ).text( to );
		} );
	} );
	wp.customize( 'custom-logo', function( value ) {
		value.bind( function( to ) {
			$( '.custom-logo' ).text( to );
		} );
	} );

     //calender backgrod img
     wp.customize( 'atoz_backgrund_image', function( value ) {
		value.bind( function( to ) {
			$( '.service' ).text( to );
		} );
	} );
    
    
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .navbar .navbar-brand h3' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .navbar .navbar-brand h3' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .navbar .navbar-brand h3' ).css( {
					'color': to
				} );
			}
		} );
	} );
    
    
    /*blog details*/
     wp.customize( 'atoz_post_check', function( value ) {
			value.bind( function( to ) {
            if ( true === to) {
            $( '#sb-imgbox' ).show();
            } 
            else {
            $( '#sb-imgbox' ).hide();
            } 
			} );
		} ); 
    
     wp.customize( 'atoz_post_title', function( value ) {
		value.bind( function( to ) {
			$( '#sb-imgbox h2' ).text( to );
		} );
	} );
    
      wp.customize( 'atoz_post_desc', function( value ) {
		value.bind( function( to ) {
			$( '.blogpost_desc' ).text( to );
		} );
	} );
    
     wp.customize( 'atoz_related_post_check', function( value ) {
			value.bind( function( to ) {
            if ( true === to) {
            $( '.blog-box-inn img' ).show();
            } 
            else {
            $( '.blog-box-inn img' ).hide();
            } 
			} );
		} ); 
    
    /*calender details*/
    
    
    
     wp.customize( 'atoz_Featured_check', function( value ) {
			value.bind( function( to ) {
            if ( true === to) {
            $( '#service' ).show();
            } 
            else {
            $( '#service' ).hide();
            } 
			} );
		} ); 
    
    
     //calender featerd img
     wp.customize( 'atoz_image', function( value ) {
		value.bind( function( to ) {
			$( '.serv-img img' ).text( to );
		} );
	} );
    
      //calender backgrod img
     wp.customize( 'atoz_backgrund_image', function( value ) {
		value.bind( function( to ) {
			$( '.service' ).text( to );
		} );
	} );
    
    //calender  title
     wp.customize( 'atoz_title', function( value ) {
		value.bind( function( to ) {
			$( '.serv-content h4' ).text( to );
		} );
	} );
    
    //calender descrpn
     wp.customize( 'atoz_descritn', function( value ) {
		value.bind( function( to ) {
			$( '.serv-content p' ).text( to );
		} );
	} );
    
     //calender url title
     wp.customize( 'atoz_url_title', function( value ) {
		value.bind( function( to ) {
			$( '.serv-content a' ).text( to );
		} );
	} );
    
    //calender url link
     wp.customize( 'atoz_url_link', function( value ) {
		value.bind( function( to ) {
			$( '.serv-content href' ).text( to );
		} );
	} );
    
    //calender background color
    wp.customize( 'atoz_quote_bg_color', function( value ) {
			value.bind( function( to ) {
				$( '#service:before' ).css( 'background-color', to );
			} );
		} );
    
    
     ///////acent color
	 wp.customize( 'atoz_nav_text_color', function( value ) {
			value.bind( function( to ) {
				$( '#tf-menu.navbar-default .navbar-nav>li>a' ).css( 'color', to );
			} );
		} );
    wp.customize( 'atoz_nav_bg', function( value ) {
			value.bind( function( to ) {
				$( '#tf-menu.navbar-default' ).css( 'background-color', to );
			} );
		} );
      wp.customize( 'atoz_submenu_bg', function( value ) {
			value.bind( function( to ) {
				$( '#tf-menu ul ul' ).css( 'background-color', to );
			} );
		} ); 
      wp.customize( 'atoz_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '.search, .btn-outline-primary' ).css( 'background-color', to );
			} );
		} );
		      wp.customize( 'atoz_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '.fnav a' ).css( 'color', to );
			} );
		} );
    wp.customize( 'atoz_accent_color', function( value ) {
			value.bind( function( to ) {
				$( '.btn-default' ).css( 'background-color', to );
			} );
		} );
	wp.customize( 'atoz_fontawesome_icons', function( value ) {
			value.bind( function( to ) {
				$( 'i.fa' ).css( 'color', to );
			} );
		} );
    wp.customize( 'atoz_social_icon_color', function( value ) {
			value.bind( function( to ) {
				$( 'footer i.fa' ).css( 'color', to );
			} );
		} );
        wp.customize( 'atoz_social_icon_color', function( value ) {
			value.bind( function( to ) {
				$( 'footer i.fa:hover' ).css( 'background-color', to );
			} );
		} );
   
    
    ///////footer background color
    wp.customize( 'atoz_footer_bck_color', function( value ) {
			value.bind( function( to ) {
				$( '.footer-bottom' ).css( 'background-color', to );
			} );
		} );
    
    ///////footer font color
    wp.customize( 'atoz_footer_text_color', function( value ) {
			value.bind( function( to ) {
				$( '.footer-bottom h2' ).css( 'color', to );
			} );
		} );
    
     wp.customize( 'atoz_footer_text_color', function( value ) {
			value.bind( function( to ) {
				$( '.footer-bottom li' ).css( 'color', to );
			} );
		} );
    
     wp.customize( 'atoz_footer_text_color', function( value ) {
			value.bind( function( to ) {
				$( '.footer-bottom li a' ).css( 'color', to );
			} );
		} );
    
    wp.customize( 'atoz_footer_text_color', function( value ) {
			value.bind( function( to ) {
				$( '.footer-bottom li i' ).css( 'color', to );
			} );
		} );
    
} )( jQuery );
