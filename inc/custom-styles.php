<?php
/**
 * Add inline CSS for styles handled by the Theme customizer
 *
 * @package The Box
 * @since The Box 1.0
 */


/**
 * Convert hex to rgb
 *
 */
function thebox_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
}


/**
 * Get Contrast
 *
 */
function thebox_get_brightness($hex) {
 // returns brightness value from 0 to 255
 // strip off any leading #
 $hex = str_replace('#', '', $hex);

 $c_r = hexdec(substr($hex, 0, 2));
 $c_g = hexdec(substr($hex, 2, 2));
 $c_b = hexdec(substr($hex, 4, 2));

 return (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;
}


/**
 * Add CSS for styles handled by the Theme Customizer
 *
 */
function thebox_custom_style() {
	$accent_color = esc_attr( get_option('color_primary') ); 
	$footer_bg = esc_attr( get_option('color_footer') );
	
	$theme_css = "";
			
	// Accent Color
	if ( ! empty( $accent_color) ) {
		$accent_color_rgb = thebox_hex2rgb( $accent_color );
		
		$theme_css .= "
		.main-navigation,
		button,
		input[type='button'],
		input[type='reset'],
		input[type='submit'],
		.pagination .nav-links .current,
		.pagination .nav-links .current:hover,
		.pagination .nav-links a:hover {
		background-color: {$accent_color};	
		}
		button:hover,
		input[type='button']:hover,
		input[type='reset']:hover,
		input[type='submit']:hover {
		background-color: rgba({$accent_color_rgb}, 0.9);		
		}
		.entry-time {
		background-color: rgba({$accent_color_rgb}, 0.7);		
		}
		.site-header .main-navigation ul ul a:hover,
		.site-header .main-navigation ul ul a:focus,
	    .site-header .site-title a:hover,
	    .page-title a:hover,
	    .entry-title a:hover,
	    .entry-meta a:hover,
	    .entry-content a,
	    .entry-summary a,
		.entry-footer a,
	    .entry-footer .icon-font,
	    .author-bio a,
	    .comments-area a,
	    .page-title span,
		.edit-link a,
		.more-link,
		.post-navigation a,
		#secondary a,
		#secondary .widget_recent_comments a.url { 
	    color: {$accent_color};
	    }
	    .edit-link a {
		border-color: {$accent_color};
	    }";
		if ( thebox_get_brightness( $accent_color ) > 155 ) {
			$theme_css .= "	
			button,
			input[type='button'],
			input[type='reset'],
			input[type='submit'],
			.main-navigation > div > ul > li > a {color: rgba(0,0,0,.8);}
			.main-navigation > div > ul > li > a:hover {color: rgba(0,0,0,.7);}";
		}
	}
	    
	// Footer Background
	if ( ! empty( $footer_bg ) ) {
		$theme_css .= "
		.site-footer {
		background-color: {$footer_bg};	
		}";
		if ( thebox_get_brightness( $footer_bg ) > 155 ) {
			$theme_css .= "
			.site-footer,
			.site-footer a,
			.site-footer a:hover {
			color: rgba(0,0,0,.8);
			}
			#tertiary {
			border-bottom-color: rgba(0,0,0,.05);
			}";	
		}
	}
	
	$editor_css = "";
	
	// Accent Color
	if ( ! empty( $accent_color ) ) {
		$editor_css .= "
		.edit-post-visual-editor .editor-block-list__block a,
		.edit-post-visual-editor .editor-block-list__block a:hover,
		.wp-block-freeform.block-library-rich-text__tinymce a
		.wp-block-freeform.block-library-rich-text__tinymce a:hover,
		.editor-styles-wrapper .wp-block-quote:before,
		.wp-block-freeform.block-library-rich-text__tinymce blockquote:before {
		color: {$accent_color};
		}";
	}
	
	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$theme_css = $editor_css;
	}
	
	return $theme_css;
	
}

/**
 * Enqueues inline CSS for styles handled by the Theme customizer
 */
function thebox_add_inline_style() {
	
	$custom_css = thebox_custom_style();
	if ( ! empty( $custom_css ) ) { 
		wp_add_inline_style( 'thebox-style', $custom_css );
	}
	
}
add_action( 'wp_enqueue_scripts', 'thebox_add_inline_style' );

