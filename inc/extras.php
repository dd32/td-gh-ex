<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Accent
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function accent_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'accent_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accent_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'accent_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function accent_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'accent' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'accent_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function accent_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'accent_setup_author' );

/* Google fonts URL */
function accent_google_fonts_url() {
	$accent_font_families = array();
	
	/* Translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
    $source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Varela Round, translate this to 'off'. Do not translate into your own language. */
	$varela_round = _x( 'on', 'Varela Round: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	$open_sans = _x( 'on', 'Open Sans: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	$lato = _x( 'on', 'Lato: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Merriweather Sans, translate this to 'off'. Do not translate into your own language. */
	$merriweather_sans = _x( 'on', 'Merriweather Sans: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Ubuntu, translate this to 'off'. Do not translate into your own language. */
	$ubuntu = _x( 'on', 'Ubuntu: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Vollkorn, translate this to 'off'. Do not translate into your own language. */
	$vollkorn = _x( 'on', 'Vollkorn: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Alegreya, translate this to 'off'. Do not translate into your own language. */
	$alegreya = _x( 'on', 'Alegreya: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
	$lora = _x( 'on', 'Lora: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Sorts Mill Goudy, translate this to 'off'. Do not translate into your own language. */
	$sorts_mill_goudy = _x( 'on', 'Sorts Mill Goudy: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Droid Serif, translate this to 'off'. Do not translate into your own language. */
	$droid_serif = _x( 'on', 'Droid Serif: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	$noto_serif = _x( 'on', 'Noto Serif: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Gentium Book Basic, translate this to 'off'. Do not translate into your own language. */
	$gentium_book_basic = _x( 'on', 'Gentium Book Basic: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Roboto Condensed, translate this to 'off'. Do not translate into your own language. */
	$roboto_condensed = _x( 'on', 'Roboto Condensed: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	$montserrat = _x( 'on', 'Montserrat: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Sanchez, translate this to 'off'. Do not translate into your own language. */
	$sanchez = _x( 'on', 'Sanchez: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Patua One, translate this to 'off'. Do not translate into your own language. */
	$patua_one = _x( 'on', 'Patua One: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Bitter, translate this to 'off'. Do not translate into your own language. */
	$bitter = _x( 'on', 'Bitter: on or off', 'accent' );
	
	/* Translators: If there are characters in your language that are not supported by Libre Baskerville, translate this to 'off'. Do not translate into your own language. */
	$libre_baskerville = _x( 'on', 'Libre Baskerville: on or off', 'accent' );
	
	// The default Source Sans Pro & Varela Round fonts
	if ( !is_admin() ) {
		if ( 'off' !== $source_sans_pro || 'off' !== $varela_round ) {
			if ( 'off' !== $source_sans_pro ) {
				wp_register_style('accent-source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,700italic', array(), false, 'all');
				wp_enqueue_style('accent-source-sans-pro');
			}
			if ( 'off' !== $varela_round ) {
				wp_register_style('accent-varela-round', 'http://fonts.googleapis.com/css?family=Varela+Round:400', array(), false, 'all');
				wp_enqueue_style('accent-varela-round');
			}
		}
    }
	
	$font_mod_array = array(
		'Open Sans'          => $open_sans,
		'Lato'               => $lato,
		'Merriweather Sans'  => $merriweather_sans,
		'Ubuntu'             => $ubuntu,
		'Vollkorn'           => $vollkorn,
		'Alegreya'           => $alegreya,
		'Lora'               => $lora,
		'Sorts Mill Goudy'   => $sorts_mill_goudy,
		'Droid Serif'        => $droid_serif,
		'Noto Serif'         => $noto_serif,
		'Gentium Book Basic' => $gentium_book_basic,
		'Roboto Condensed'   => $roboto_condensed,
		'Montserrat'         => $montserrat,
		'Sanchez'            => $sanchez,
		'Patua One'          => $patua_one,		
		'Bitter'             => $bitter,
		'Libre Baskerville'  => $libre_baskerville
	);
	
	// Check if body font is not Source Sans Pro 
	if ( 'Source Sans Pro' != get_theme_mod( 'body_font', 'Source Sans Pro' ) ) {
		if ( 'off' !== $font_mod_array[get_theme_mod( 'body_font' )] ) {
			$accent_font_families[] = get_theme_mod( 'body_font' ) . ':400,300,400italic,700,700italic';
		}
	}
	
	// Check if heading font is not Varela Round and it is different from the body font
	if ( 'Varela Round' != get_theme_mod( 'headings_font', 'Varela Round' ) && get_theme_mod( 'body_font' ) != get_theme_mod( 'headings_font' ) ) {
		if ( 'off' !== $font_mod_array[get_theme_mod( 'headings_font' )] ) {
			$accent_font_families[] = get_theme_mod( 'headings_font' ) . ':700,400,400italic';
		}
	} 

	if ( ! empty( $accent_font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $accent_font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

		return $fonts_url;
	}

	return false;
}
