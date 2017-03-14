<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Chip Life
 */

/**
 * Theme Mod Defaults
 *
 * @param string $theme_mod - Theme modification name.
 * @return mixed
 */
function chip_life_default( $theme_mod = 'chip_life_sidebar_position' ) {

	$chip_life_default = array(
		'chip_life_sidebar_position' => 'right',
		'chip_life_copyright'        => sprintf( '&copy; Copyright %1$s - <a href="%2$s">%3$s</a>', esc_html( date_i18n( __( 'Y', 'chip-life' ) ) ), esc_attr( esc_url( home_url( '/' ) ) ), esc_html( get_bloginfo( 'name' ) ) ),
		'chip_life_credit'           => true,
	);

	if ( isset( $chip_life_default[$theme_mod] ) ) {
		return $chip_life_default[$theme_mod];
	}

	return '';

}

/**
 * Theme Mod Wrapper
 *
 * @param string $theme_mod - Name of the theme mod to retrieve.
 * @return mixed
 */
function chip_life_mod( $theme_mod = '' ) {
	return get_theme_mod( $theme_mod, chip_life_default( $theme_mod ) );
}

if ( ! function_exists( 'chip_life_fonts_url' ) ) :
/**
 * Register Google fonts for Chip Life.
 *
 * @return string Google fonts URL for the theme.
 */
function chip_life_fonts_url() {

    // Fonts and Other Variables
    $fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

    /* Translators: If there are characters in your language that are not
    * supported by Playfair Display, translate this to 'off'. Do not translate
    * into your own language.
    */
    if ( 'off' !== esc_html_x( 'on', 'Playfair Display font: on or off', 'chip-life' ) ) {
		$fonts[] = 'Playfair Display:400,700';
	}

	/* Translators: If there are characters in your language that are not
    * supported by Raleway, translate this to 'off'. Do not translate
    * into your own language.
    */
    if ( 'off' !== esc_html_x( 'on', 'Raleway font: on or off', 'chip-life' ) ) {
		$fonts[] = 'Raleway:400,700';
	}

	/* Translators: To add an additional character subset specific to your language,
	* translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'.
	* Do not translate into your own language.
	*/
	$subset = esc_html_x( 'no-subset', 'Add new subset (cyrillic, greek, devanagari, vietnamese)', 'chip-life' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	/**
	 * Filters the Google Fonts URL.
	 *
	 * @param string $fonts_url Google Fonts URL.
	 */
	return apply_filters( 'chip_life_fonts_url', $fonts_url );

}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function chip_life_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['menu_class'] = 'site-primary-menu';
	return $args;
}
add_filter( 'wp_page_menu_args', 'chip_life_page_menu_args' );

/**
 * Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
 */
function chip_life_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="primary-menu sf-menu">', $class, 1 );
}
add_filter( 'wp_page_menu', 'chip_life_page_menu_class' );

/**
 * Filter 'excerpt_length'
 *
 * @param int $length
 * @return int
 */
function chip_life_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}

	// Excerpt Length
	$length = 45;

	/**
	 * Filters the Excerpt length.
	 *
	 * @param int $length Excerpt Length.
	 */
	return apply_filters( 'chip_life_excerpt_length', $length );
}
add_filter( 'excerpt_length', 'chip_life_excerpt_length' );

/**
 * Filter 'excerpt_more'
 *
 * @param str $excerpt_more
 * @return str
 */
function chip_life_excerpt_more( $excerpt_more ) {
	if ( is_admin() ) {
		return $excerpt_more;
	}

	// Excerpt More Suffix
	$excerpt_more = '&hellip;';

	/**
	 * Filters the Excerpt more string.
	 *
	 * @param string $excerpt_more Excerpt More.
	 */
	return apply_filters( 'chip_life_excerpt_more', $excerpt_more );
}
add_filter( 'excerpt_more', 'chip_life_excerpt_more' );

/**
 * Filter 'the_content_more_link'
 * Prevent Page Scroll When Clicking the More Link.
 *
 * @param string $link
 * @return filtered link
 */
function chip_life_the_content_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'chip_life_the_content_more_link_scroll' );

/**
 * Filter 'the_site_logo'
 *
 * @return string
 */
function chip_life_get_custom_logo( $html ) {
	return '<div class="site-logo-wrapper">' . $html . '</div>';
}
add_filter( 'get_custom_logo', 'chip_life_get_custom_logo' );

/**
 * Filter `body_class`
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function chip_life_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Site Title & Tagline Class
	if ( display_header_text() ) {
		$classes[] = 'has-site-branding';
	}

	// Custom Header
	if ( get_header_image() ) {
		$classes[] = 'has-custom-header';
	}

	// Custom Background Image
	if ( get_background_image() ) {
		$classes[] = 'has-custom-background-image';
	}

	// Sidebar Position Class
	if ( chip_life_has_sidebar() ) {
		$classes[] = 'has-' . esc_attr( chip_life_mod( 'chip_life_sidebar_position' ) ) . '-sidebar';
	} else {
		$classes[] = 'has-no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'chip_life_body_classes' );

/**
 * Blog Copyright.
 *
 * @return void
 */
function chip_life_copyright() {
	$html = '<div class="copyright chip-life-copyright">'. chip_life_mod( 'chip_life_copyright' ) .'</div>';

	/**
	 * Filters the Blog Copyright HTML.
	 *
	 * @param string $html Blog Copyright HTML.
	 */
	$html = apply_filters( 'chip_life_copyright_html', $html );

	echo convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $html ) ) ) ) ) ); // WPCS: XSS OK.
}
add_action( 'chip_life_credits', 'chip_life_copyright' );

/**
 * Designer Credits.
 *
 * @return void
 */
function chip_life_designer() {
	$designer_string = sprintf( '<a href="%1$s" title="%2$s">%3$s</a> <span>&sdot;</span> %4$s <a href="%5$s" title="%6$s">%7$s</a>',
		esc_url( 'http://www.tutorialchip.com/' ),
		esc_attr( 'Chip Life Theme' ),
		esc_html( 'Chip Life Theme' ),
		esc_html__( 'Powered by', 'chip-life' ),
		esc_url( 'https://wordpress.org/' ),
		esc_attr( 'WordPress', 'chip-life' ),
		esc_html( 'WordPress' )
	);

	// Designer HTML
	$html = '<div class="designer chip-life-designer">'. $designer_string .'</div>';

	/**
	 * Filters the Designer HTML.
	 *
	 * @param string $html Designer HTML.
	 */
	$html = apply_filters( 'chip_life_designer_html', $html );

	echo $html; // WPCS: XSS OK.
}
add_action( 'chip_life_credits', 'chip_life_designer' );

/**
 * Enqueues front-end CSS to hide elements.
 *
 * @see wp_add_inline_style()
 */
function chip_life_hide_elements() {
	// Elements
	$elements = array();

	// Designer Credit
	if ( false === chip_life_mod( 'chip_life_credit' ) ) {
		$elements[] = '.chip-life-designer';
	}

	// Bail if their are no elements to process
	if ( 0 === count( $elements ) ) {
		return;
	}

	// Build Elements
	$elements = implode( ',', $elements );

	// Build CSS
	$css = sprintf( '%1$s { clip: rect(1px, 1px, 1px, 1px); position: absolute; }', $elements );

	// Add Inline Style
	wp_add_inline_style( 'chip-life-style', $css );
}
add_action( 'wp_enqueue_scripts', 'chip_life_hide_elements', 15 );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function chip_life_attachment_link( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
		return $url;
	}

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
		$url .= '#main';
	}

	return $url;
}
add_filter( 'attachment_link', 'chip_life_attachment_link', 10, 2 );

if ( ! function_exists( 'chip_life_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @return void
 */
function chip_life_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Chip Life attachment size.
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 1140.
	 *     @type int $width  Width of the image in pixels. Default 1140.
	 * }
	 */
	$attachment_size     = apply_filters( 'chip_life_attachment_size', 'full' );
	$next_attachment_url = wp_get_attachment_url();

	if ( $post->post_parent ) { // Only look for attachments if this attachment has a parent object.

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => 100,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {

			foreach ( $attachment_ids as $key => $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					break;
				}
			}

			// For next attachment
			$key++;

			if ( isset( $attachment_ids[ $key ] ) ) {
				// get the URL of the next image attachment
				$next_attachment_url = get_attachment_link( $attachment_ids[$key] );
			} else {
				// or get the URL of the first image attachment
				$next_attachment_url = get_attachment_link( $attachment_ids[0] );
			}

		}

	} // end post->post_parent check

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		esc_attr( get_the_title() ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);

}
endif;
