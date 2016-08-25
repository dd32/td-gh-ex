<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Aileron
 */

/**
 * Register fonts for theme.
 *
 * @return string Fonts URL for the theme.
 */
function aileron_google_fonts_url() {

    // Fonts and Other Variables
    $fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

    // Headings Font
    /* Translators: If there are characters in your language that are not
    * supported by Muli, translate this to 'off'. Do not translate
    * into your own language.
    */
    if ( 'off' !== esc_html_x( 'on', 'Muli font: on or off', 'aileron' ) ) {
		$fonts[] = 'Muli';
	}

    // Body Font
	/* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'aileron' ) ) {
		$fonts[] = 'Lato';
	}

	/* Translators: To add an additional character subset specific to your language,
	* translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'.
	* Do not translate into your own language.
	*/
	$subset = esc_html_x( 'no-subset', 'Add new subset (cyrillic, greek, devanagari, vietnamese)', 'aileron' );

	if ( 'cyrillic' === $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' === $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' === $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' === $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Filter 'get_custom_logo'
 *
 * @return string
 */
function aileron_get_custom_logo( $html ) {
	return sprintf( '<div class="site-logo-wrapper">%1$s</div>', $html );
}
add_filter( 'get_custom_logo', 'aileron_get_custom_logo' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function aileron_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['menu_class'] = 'site-primary-menu';
	return $args;
}
add_filter( 'wp_page_menu_args', 'aileron_page_menu_args' );

/**
 * Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
 */
function aileron_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="primary-menu sf-menu">', $class, 1 );
}
add_filter( 'wp_page_menu', 'aileron_page_menu_class' );

/**
 * Filter 'excerpt_length'
 *
 * @param int $length
 * @return int
 */
function aileron_excerpt_length( $length ) {
	return apply_filters( 'aileron_excerpt_length', 35 );
}
add_filter( 'excerpt_length', 'aileron_excerpt_length' );

/**
 * Filter 'the_content_more_link'
 * Prevent Page Scroll When Clicking the More Link.
 *
 * @param string $link
 * @return filtered link
 */
function aileron_the_content_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'aileron_the_content_more_link_scroll' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aileron_body_classes( $classes ) {

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

	// Theme Layout (wide|box)
	$classes[] = 'layout-' . esc_attr( get_theme_mod( 'aileron_theme_layout', 'box' ) );

	return $classes;
}
add_filter( 'body_class', 'aileron_body_classes' );

/**
 * Display Blog Footer.
 *
 * @return void
 */
function aileron_site_info() {
?>
<div class="site-info">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<div class="blog-info">
					<?php
					printf( '%1$s %2$s <span class="sep">%3$s</span> <a href="%4$s">%5$s</a>',
						__( '&copy; Copyright', 'aileron' ), date( 'Y' ), __( '&ndash;', 'aileron' ), esc_url( home_url() ), esc_html( get_bloginfo( 'name' ) )
					);
					?>
				</div>

				<div class="designer-info">
					<?php
					printf( '<a href="%1$s">%2$s</a> <span class="sep">%3$s</span> %6$s <a href="%4$s">%5$s</a>',
						'http://themecot.com/wordpress-theme/aileron/', 'Aileron Theme', __( '&middot;', 'aileron' ), 'http://wordpress.org/', 'WordPress', __( 'Powered by', 'aileron' )
					);
					?>
				</div>

			</div>
		</div>

	</div><!-- .container -->
</div><!-- .site-info -->
<?php
}
add_action( 'aileron_footer', 'aileron_site_info' );

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
function aileron_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'aileron_setup_author' );

if ( ! function_exists( 'aileron_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @return void
 */
function aileron_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Aileron attachment size.
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 1140.
	 *     @type int $width  Width of the image in pixels. Default 1140.
	 * }
	 */
	$attachment_size     = apply_filters( 'aileron_attachment_size', 'full' );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
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

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		esc_attr( get_the_title() ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);

}
endif;
