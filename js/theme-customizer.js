
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */

( function( $ ) {  

	wp.customize( 'ct_acool[heading_font]', function( value ) {
		value.bind( function( newval ) {
			$('.ct_site_tagline').css('font-family', newval );
			$('.ct_site_name').css('font-family', newval );
			
		} );
	} );

	wp.customize( 'ct_acool[menu_font]', function( value ) {
		value.bind( function( newval ) {
			$('#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a').css('font-family', newval );
		} );
	} );

	wp.customize( 'ct_acool[title_font]', function( value ) {
		value.bind( function( newval ) {
			$('h1, h2, h3, h4, h5, h6,.case-tx0,.case-tx1,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.footer-widget .ioftsc-lt span').css('font-family', newval );
		} );
	} );


	wp.customize( 'ct_acool[body_font]', function( value ) {
		value.bind( function( newval ) {
			$('html, body, div, span, applet, object, iframe, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td ').css('font-family', newval );
		} );
	} );



    //Update header background color in real time...
    wp.customize( 'ct_acool[header_bgcolor]', function( value ) {
		
        value.bind( function( newval ) {			
            $('.site-header').css('background-color', newval );			
            $('.ct_header_class').css('border-bottom-color', newval );			
			
        } );
    } );
	
	wp.customize( 'ct_acool[show_search_icon]', function( value ) {
		value.bind( function( to ) {
			var $search = $('#ct_top_search');

			if ( to ) {
				$search.show();
			} else {
				$search.hide();
			}
		} );
	} );

	
	wp.customize( 'ct_acool[box_header_center]', function( value ) {
		value.bind( function( to ) {
			var $header_box = $('.header_box');

			if ( to ) {
				$('#ct-top-navigation').css('margin-left','0' );
				$('.ct_logo').css('padding-left','20px' );					
				$header_box.addClass( 'container' );

			} else {
				$('#ct-top-navigation').css('margin-left','40px' );
				$('.ct_logo').css('padding-left','56px' );				
				$header_box.removeClass( 'container' );		
			}
		} );
	} );	
	
	
    //Update other_link_color in real time...
    wp.customize( 'ct_acool[other_link_color]', function( value ) {
		
        value.bind( function( newval ) {			
            $('a').css('color', newval );			
            $('li a').css('color', newval );			
			
        } );
    } );	
	
    wp.customize( 'ct_acool[other_link_hover_color]', function( value ) {
		
        value.bind( function( newval ) {			
            $('li a:hover').css('color', newval );			
            $('a:hover').css('color', newval );			
			
        } );
    } );	


    wp.customize( 'ct_acool[content_link_color]', function( value ) {
		
        value.bind( function( newval ) {			
            $('.ct_single_content p a').css('color', newval );		
			
        } );
    } );	
	
    wp.customize( 'ct_acool[content_link_hover_color]', function( value ) {
		
        value.bind( function( newval ) {			
            $('.ct_single_content p a:hover').css('color', newval );				
        } );
    } );	


    wp.customize( 'ct_acool[footer_info]', function( value ) {
		
        value.bind( function( newval ) {
			$("span.footer_info").text(newval);	
			$('span.footer_info').css('display', 'block' );	
			//span.footer_info{ display:block;}		
            //$('.ct_single_content p a:hover').css('color', newval );				
        } );
    } );	

} )( jQuery );


/*to acool-pro*/
!function(o) {
	parseInt(clean_box_misc_links.WP_version) < 4 && (o(".preview-notice").prepend('<span style="font-weight:bold;">' + clean_box_misc_links.old_version_message + "</span>"), jQuery("#customize-info .btn-upgrade, .misc_links").click(function(o) {
		o.stopPropagation()
	})), o(".preview-notice").prepend('<span id="clean_box_upgrade"><a target="_blank" class="button btn-upgrade" href="' + clean_box_misc_links.upgrade_link + '">' + clean_box_misc_links.upgrade_text + "</a></span>"), jQuery("#customize-info .btn-upgrade, .misc_links").click(function(o) {
		o.stopPropagation()
	})
}(jQuery), function(o) {
	o.controlConstructor.radio = o.Control.extend({
		ready: function() {
			"clean_box_theme_options[color_scheme]" === this.id && this.setting.bind("change", function(n) {
				jQuery.each(clean_box_misc_links.color_list, function(e, i) {
					"light" == n ? (o(e).set(i.light), o.control(e).container.find(".color-picker-hex").data("data-default-color", i.light).wpColorPicker("defaultColor", i.light)) : "dark" == n && (o(e).set(i.dark), o.control(e).container.find(".color-picker-hex").data("data-default-color", i.dark).wpColorPicker("defaultColor", i.dark))
				})
			})
		}
	})
}(wp.customize);

/*to acool-pro end*/


