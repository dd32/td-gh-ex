/**
 * customizer.js
 * author    Franchi Design
 * package   Atomy
 * version   1.0.0
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

// Logo size
wp.customize('at_logo_size', function(control) {
	control.bind(function( controlValue ) {
		$('.top_header_middle img').css('max-width', controlValue + 'px');
	});
});

// Media Header Hight img
wp.customize('at_height_media_header', function(control) {
	control.bind(function( controlValue ) {
		$('.wp-custom-header img').css('height', controlValue + 'px');
	});
});

// Media Header Hight iframe
wp.customize('at_height_media_header', function(control) {
	control.bind(function( controlValue ) {
		$('.wp-custom-header iframe').css('height', controlValue + 'px');
	});
});

// Media Header padding top
wp.customize('at_padding_top_write', function(control) {
	control.bind(function( controlValue ) {
		$('.at-write-auto').css('top', controlValue + 'em');
	});
});

// Media Header padding left
wp.customize('at_padding_left_write', function(control) {
	control.bind(function( controlValue ) {
		$('.at-write-auto').css('left', controlValue + 'em');
	});
});

// Media Header text color
wp.customize('at_color_text_write_header_media', function(control) {
	control.bind(function( controlValue ) {
		$('.at-write-auto h1').css('color', controlValue);
	});
});

// Media Header text font size
wp.customize('at_font_size_text', function(control) {
	control.bind(function( controlValue ) {
		$('.at-write-auto h1').css('font-size', controlValue + 'px');
	});
});

// Media Header Call To Action padding top
wp.customize('at_padding_top_call_to_action', function(control) {
	control.bind(function( controlValue ) {
		$('.at-button-action-static').css('top', controlValue + 'em');
	});
});

// Block Icons Header Border
wp.customize('at_border_block_icons', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-header-ecommerce').css('border', controlValue + 'px solid');
	});
});

// Block Icons Header Padding
wp.customize('at_padding_block_icons', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-header-ecommerce').css('padding', controlValue + 'em');
	});
});

// Block Icons Header Border Color
wp.customize('at_border_color_block_icons', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-header-ecommerce,.atom-col-1,.atom-col-2').css('color', controlValue);
	});
});

// Block Icons Header Icon 1 Color
wp.customize('at_color_icon_1', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-col-1 i').css('color', controlValue);
	});
});

// Block Icons Header 1
wp.customize( 'at_title_icons_header_1', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header.1 h4' ).html( newval );
	} );
} );

wp.customize( 'at_subtitle_icons_header_1', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header.1 p' ).html( newval );
	} );
} );

// Block Icons Header 2
wp.customize( 'at_title_icons_header_2', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header.2 h4' ).html( newval );
	} );
} );

// Block Icons Header Icon 2 Color
wp.customize('at_color_icon_2', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-col-2 i').css('color', controlValue);
	});
});


wp.customize( 'at_subtitle_icons_header_2', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header.2 p' ).html( newval );
	} );
} );

// Block Icons Header 3
wp.customize( 'at_title_icons_header_3', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header-s.3 h4' ).html( newval );
	} );
} );

// Block Icons Header Icon 3 Color
wp.customize('at_color_icon_3', function(control) {
	control.bind(function( controlValue ) {
		$('.atom-col-3 i').css('color', controlValue);
	});
});


wp.customize( 'at_subtitle_icons_header_3', function( value ) {
	value.bind( function( newval ) {
		$( '.atom-text-header-s.3 p' ).html( newval );
	} );
} );

// Title Category Shop
wp.customize( 'at_category_shop_title', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.at_contr_title_category_shop' ).html( newval );
	} );
} );

// Font Size Title Category Shop
wp.customize('at_font_size_title_category_shop', function(control) {
	control.bind(function( controlValue ) {
		$('.at-content-woocommerce-page-single-product h1').css('font-size', controlValue + 'px');	   
	});
});

// Text Align Description Category Shop
wp.customize('atomy_align_description_category_shop', function(control) {
	control.bind(function( controlValue ) {
		$('.shop_cat_desc').css('text-align', controlValue );
	});
}); 

// Padding left Description Category Shop
wp.customize('at_padding_left_description_catyegory_shop', function(control) {
	control.bind(function( controlValue ) {
		$('.shop_cat_desc').css('padding-left', controlValue + 'px');
	});
}); 

// Font family title
wp.customize('atomy_title_font', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6,.entry-header a').css('font-family', controlValue );
	});
});

// Font weight title
wp.customize('at_font_weight_title', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6').css('font-weight', controlValue );
	});
});

// Title text transform
wp.customize('at_text_transform_title', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6').css('text-transform', controlValue );
	});
});

// Title font style
wp.customize('at_font_style_title', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6').css('font-style', controlValue );
	});
});

// Letter spacing Title
wp.customize('at_letter_spacing_title', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6').css('letter-spacing', controlValue + 'px');
	});
});

// Word spacing Title
wp.customize('at_word_spacing_title', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header h1,.entry-header h2,.entry-header h3,.entry-header h4,.entry-header h5,.entry-header h6,h1,h2,h3,h4,h5,h6').css('word-spacing', controlValue + 'px');
	});
});

// Font family subtitle
wp.customize('atomy_title_font_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('font-family', controlValue );
	});
});

// Font weight subtitle
wp.customize('at_font_weight_title_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('font-weight', controlValue );
	});
});

// Subtitle text transform
wp.customize('at_text_transform_title_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('text-transform', controlValue );
	});
});

// Subtitle font style
wp.customize('at_font_style_title_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('font-style', controlValue );
	});
});

// Letter spacing Subtitle
wp.customize('at_letter_spacing_title_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('letter-spacing', controlValue + 'px');
	});
});

// Word spacing Subtitle
wp.customize('at_word_spacing_title_meta', function(control) {
	control.bind(function( controlValue ) {
		$('p,.entry-meta').css('word-spacing', controlValue + 'px');
	});
});

// Font family Link
wp.customize('atomy_title_font_meta_a', function(control) {
	control.bind(function( controlValue ) {
		$('a').css('font-family', controlValue );
	});
});

// Link font style
wp.customize('at_font_style_title_meta_a', function(control) {
	control.bind(function( controlValue ) {
		$('a').css('font-style', controlValue );
	});
});

// Link Underline
wp.customize('at_text_underline_title', function(control) {
	control.bind(function( controlValue ) {
		$('a,a:hover').css('text-decoration', controlValue );
	});
});

// Shop Image Featured Page height
wp.customize('at_height_image_cart', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce-page img.at-img-single').css('height', controlValue + 'px');
	});
});

// Shop Image Featured Page object-fit
wp.customize('at_object_cart_image', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce-page img.at-img-single').css('object-fit', controlValue );
	});
});

// Shop Image Single Product object-fit
wp.customize('at_object_image_single_product', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce .woocommerce-product-gallery__image img.wp-post-image,.woocommerce .yith_magnifier_zoom_wrap img').css('object-fit', controlValue );
		
	});
});

// Shop Title Single Product margin top
wp.customize('at_padding_top_title_single_product', function(control) {
	control.bind(function( controlValue ) {
		$('.summary.entry-summary').css('margin-top', controlValue + 'em');
	});
});

// Border Left Custom Area
wp.customize('at_border_left_custom_area', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce-account .woocommerce-MyAccount-navigation').css('border-left', controlValue + 'px solid');
	});
});

// Border Left Color Custom Area
wp.customize('at_border_left_color_custom_area', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce-account .woocommerce-MyAccount-navigation').css('border-color', controlValue );
	});
});

// List Style Custom Area
wp.customize('at_ul_list_style_custom_area', function(control) {
	control.bind(function( controlValue ) {
		$('.woocommerce-account .woocommerce-MyAccount-navigation ul').css('list-style', controlValue );
	});
});

// Blog padding title single article
wp.customize('at_blog_single_padding_header', function(control) {
	control.bind(function( controlValue ) {
		$('.entry-header').css('padding-top', controlValue + 'px' );
	});
});

// Title Portfolio Section
wp.customize( 'at_title_portfolio_section', function( value ) {
	value.bind( function( newval ) {
		$( '.at_portfolio_2 h2' ).html( newval );
	} );
} );

// Title for All Nav Portfolio 2
wp.customize( 'at_title_portfolio2_all', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.atall' ).html( newval );
	} );
} );

// Title for Tab 1 Nav Portfolio 2
wp.customize( 'at_title_portfolio2_tab_1', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.attab1' ).html( newval );
	} );
} );

// Title for Tab 2 Nav Portfolio 2
wp.customize( 'at_title_portfolio2_tab_2', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.attab2' ).html( newval );
	} );
} );

// Title for Tab 3 Nav Portfolio 2
wp.customize( 'at_title_portfolio2_tab_3', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.attab3' ).html( newval );
	} );
} );

// Title for Tab 4 Nav Portfolio 2
wp.customize( 'at_title_portfolio2_tab_4', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.attab4' ).html( newval );
	} );
} );

// Title for Tab 5 Nav Portfolio 2
wp.customize( 'at_title_portfolio2_tab_5', function( value ) {
	value.bind( function( newval ) {
		$( '#filters span.attab5' ).html( newval );
	} );
} );

// Color Text Nav
wp.customize('at_color_text_nav_portfolio_2', function(control) {
	control.bind(function( controlValue ) {
		$('#filters li span').css('color', controlValue );
	});
});

// Background Color Active Text Nav
wp.customize('at_background_color_active_text_nav_portfolio_2', function(control) {
	control.bind(function( controlValue ) {
		$('#filters li span.active,.at-product-price.at-product-price-portfolio').css('background-color', controlValue );
	});
});

// Color Active Text Nav
wp.customize('at_color_active_text_nav_portfolio_2', function(control) {
	control.bind(function( controlValue ) {
		$('#filters li span.active,.at-product-price.at-product-price-portfolio').css('color', controlValue );
	});
});

// Color Border Price 
wp.customize('at_color_active_text_nav_portfolio_2', function(control) {
	control.bind(function( controlValue ) {
		$('.at-product-price.at-product-price-portfolio').css('border-color', controlValue );
	});
});

// Margin Left Nav
wp.customize('at_margin_left_nav_portfolio2', function(control) {
	control.bind(function( controlValue ) {
		$('#filters').css('margin-left', controlValue +'em');
	});
});

// Padding Bottom Image Portfolio 2
wp.customize('at_padding_bottom_image_portfolio2', function(control) {
	control.bind(function( controlValue ) {
		$('#portfoliolist .portfolio').css('padding-bottom', controlValue +'px');
	});
});

// Contact
wp.customize('at_border_top_sidebar_contact', function(control) {
	control.bind(function( controlValue ) {
		$('.atomy-sidebar-contact').css('border-top', controlValue +'px solid');
	});
});

wp.customize('at_border_right_sidebar_contact', function(control) {
	control.bind(function( controlValue ) {
		$('.atomy-sidebar-contact').css('border-right', controlValue +'px solid');
	});
});

wp.customize('at_border_top_color_sidebar_contact', function(control) {
	control.bind(function( controlValue ) {
		$('.atomy-sidebar-contact').css('border-top-color', controlValue );
	});
});

wp.customize('at_border_right_color_sidebar_contact', function(control) {
	control.bind(function( controlValue ) {
		$('.atomy-sidebar-contact').css('border-right-color', controlValue );
	});
});

// Parallax

// Height Image Primary
wp.customize('at_height_parallax_image', function(control) {
	control.bind(function( controlValue ) {
		$('.at-box-parallax').css('height', controlValue + 'px' );
	});
});

// Height Image Secondary
wp.customize('at_height_parallax_image_secondary', function(control) {
	control.bind(function( controlValue ) {
		$('.at-second-img-parallax').css('height', controlValue + 'px' );
	});
});

// Width Image Secondary
wp.customize('at_width_parallax_image_secondary', function(control) {
	control.bind(function( controlValue ) {
		$('.at-second-img-parallax').css('max-width', controlValue + 'px' );
	});
});

// Padding Left Image Secondary
wp.customize('at_padding_left_parallax_image', function(control) {
	control.bind(function( controlValue ) {
		$('.at-second-img-parallax').css('left', controlValue + '%' );
	});
});

// Padding Top Image Secondary
wp.customize('at_padding_top_parallax_image', function(control) {
	control.bind(function( controlValue ) {
		$('.at-second-img-parallax').css('top', controlValue + 'em' );
	});
});

// Border Radius Image Secondary
wp.customize('at_border_radius_parallax_image', function(control) {
	control.bind(function( controlValue ) {
		$('.at-second-img-parallax').css('border-radius', controlValue + '%' );
	});
});

// Padding Top Text Secondary
wp.customize('at_padding_top_parallax_text', function(control) {
	control.bind(function( controlValue ) {
		$('.at-text-parallax').css('top', controlValue + 'em' );
	});
});

// Font Size Text Secondary
wp.customize('at_font_size_parallax_text', function(control) {
	control.bind(function( controlValue ) {
		$('.at-text-parallax h1').css('font-size', controlValue + 'px' );
	});
});

// Color Text Secondary
wp.customize('at_color_parallax_text', function(control) {
	control.bind(function( controlValue ) {
		$('.at-text-parallax h1').css('color', controlValue );
	});
});

// Title Parallax
wp.customize( 'at_title_parallax', function( value ) {
	value.bind( function( newval ) {
		$( '.at-text-parallax h1' ).html( newval );
	} );
} );

// Title Call-to-action button Static
wp.customize( 'at_title_action_static', function( value ) {
	value.bind( function( newval ) {
		$( '.at-button-action-static a' ).html( newval );
	} );
} );

// Title Call-to-action button Parallax
wp.customize( 'at_title_action_parallax', function( value ) {
	value.bind( function( newval ) {
		$( '.at-parallax-a a' ).html( newval );
	} );
} );

// Title Services Section
wp.customize( 'at_title_services_section', function( value ) {
	value.bind( function( newval ) {
		$( '.at-services h2' ).html( newval );
	} );
} );

// Background Color Services Section
wp.customize('at_background_color_services_section', function(control) {
	control.bind(function( controlValue ) {
		$('.at-services').css('background-color', controlValue );
	});
});

// Color Icon 1 Services Section
wp.customize('at_color_icon_1_services_section', function(control) {
	control.bind(function( controlValue ) {
		$('.at-cl-s-i-1 i').css('color', controlValue );
	});
});

// Title Icon 1 Services Section
wp.customize( 'at_title_icon_1_services_section', function( value ) {
	value.bind( function( newval ) {
		$( '.at-cl-s-1 h6' ).html( newval );
	} );
} );

// Color Icon 2 Services Section
wp.customize('at_color_icon_2_services_section', function(control) {
	control.bind(function( controlValue ) {
		$('.at-cl-s-i-2 i').css('color', controlValue );
	});
});

// Title Icon 2 Services Section
wp.customize( 'at_title_icon_2_services_section', function( value ) {
	value.bind( function( newval ) {
		$( '.at-cl-s-2 h6' ).html( newval );
	} );
} );

// Color Icon 3 Services Section
wp.customize('at_color_icon_3_services_section', function(control) {
	control.bind(function( controlValue ) {
		$('.at-cl-s-i-3 i').css('color', controlValue );
	});
});

// Title Icon 3 Services Section
wp.customize( 'at_title_icon_3_services_section', function( value ) {
	value.bind( function( newval ) {
		$( '.at-cl-s-3 h6' ).html( newval );
	} );
} );

// Section Two Image

// Margin top section
wp.customize('at_margin_top_section_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('margin-top', controlValue + 'em' );
	});
});

// Margin bottom section
wp.customize('at_margin_bottom_section_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('margin-bottom', controlValue + 'em' );
	});
});

// Padding top section
wp.customize('at_padding_top_section_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('padding-top', controlValue + 'em' );
	});
});

// Padding bottom section
wp.customize('at_padding_bottom_section_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('padding-bottom', controlValue + 'em' );
	});
});

// Background Color Section
wp.customize('at_background_color_section_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('background-color', controlValue );
	});
});

// Margin left image left
wp.customize('at_margin_left_img_left', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-left img').css('margin-left', controlValue + 'em' );
	});
});

// Margin top image left
wp.customize('at_margin_top_img_left', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-left img').css('margin-top', controlValue + 'em' );
	});
});

// Margin right image right
wp.customize('at_margin_right_img_right', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-right img').css('right', controlValue + 'em' );
	});
});

// Margin top image right
wp.customize('at_margin_top_img_right', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-right img').css('margin-top', controlValue + 'em' );
	});
});


// Extra For Align Title Section

// Product/Category
wp.customize('at_text_align_title_category', function(control) {
	control.bind(function( controlValue ) {
		$('h2.at_contr_title_category_shop').css('text-align', controlValue );
	});
}); 

// Extra Slide Section

// Title Slide
wp.customize( 'at_title_slide', function( value ) {
	value.bind( function( newval ) {
		$( '.at-col-slide h2' ).html( newval );
	} );
} );

// Subtitle Slide
wp.customize( 'at_subtitle_slide', function( value ) {
	value.bind( function( newval ) {
		$( '.at-col-slide h5' ).html( newval );
	} );
} );

// Background Color Second Carousel
wp.customize('at_background_color_second_banner_slide', function(control) {
	control.bind(function( controlValue ) {
		$('.at-banner-slide').css('background-color', controlValue);
	});
});

// Margin Top
wp.customize('at_margin_top_slide', function(control) {
	control.bind(function( controlValue ) {
		$('.at-slide').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_slide', function(control) {
	control.bind(function( controlValue ) {
		$('.at-slide').css('margin-bottom', controlValue + 'em' );
	});
});

// Margin Top
wp.customize('at_margin_top_category_product', function(control) {
	control.bind(function( controlValue ) {
		$('.at-content-woocommerce-page-single-product').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_category_product', function(control) {
	control.bind(function( controlValue ) {
		$('.at-content-woocommerce-page-single-product').css('margin-bottom', controlValue + 'em' );
	});
});

// Margin Top
wp.customize('at_margin_top_block_icons', function(control) {
	control.bind(function( controlValue ) {
		$('.at-block-icon-header-s').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_block_icons', function(control) {
	control.bind(function( controlValue ) {
		$('.at-block-icon-header-s').css('margin-bottom', controlValue + 'em' );
	});
});

// Margin Top
wp.customize('at_margin_top_portfolio', function(control) {
	control.bind(function( controlValue ) {
		$('.at_portfolio_2').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_portfolio', function(control) {
	control.bind(function( controlValue ) {
		$('.at_portfolio_2').css('margin-bottom', controlValue + 'em' );
	});
});


// Margin Top
wp.customize('at_margin_top_services', function(control) {
	control.bind(function( controlValue ) {
		$('.at-services-margin').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_services', function(control) {
	control.bind(function( controlValue ) {
		$('.at-services-margin').css('margin-bottom', controlValue + 'em' );
	});
});

// Margin Top
wp.customize('at_margin_top_whoweare', function(control) {
	control.bind(function( controlValue ) {
		$('.at-text-image-about').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_whoweare', function(control) {
	control.bind(function( controlValue ) {
		$('.at-text-image-about').css('margin-bottom', controlValue + 'em' );
	});
});

// Margin Top
wp.customize('at_margin_top_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('margin-top', controlValue + 'em' );
	});
});

// Margin Bottom
wp.customize('at_margin_bottom_twoimage', function(control) {
	control.bind(function( controlValue ) {
		$('.at-two-image-extra').css('margin-bottom', controlValue + 'em' );
	});
});

// Background Color Product
wp.customize('at_background_color_product', function(control) {
	control.bind(function( controlValue ) {
		$('figure.snip1418').css('background-color', controlValue);
	});
});

// Margin Top Site
wp.customize('at_margin_top_site', function(control) {
	control.bind(function( controlValue ) {
		$('#page').css('margin-top', controlValue + 'em' );
	});
});

// Font Size Menu
wp.customize('at_font_size_menu', function(control) {
	control.bind(function( controlValue ) {
		$('.shop_header_area .navbar .navbar-nav li a').css('font-size', controlValue + 'px' );
	});
});

// Padding Menu
wp.customize('at_padding_menu', function(control) {
	control.bind(function( controlValue ) {
		$('.shop_header_area .navbar .navbar-nav li').css('margin-right', controlValue + 'px' );
	});
});


} )( jQuery );







