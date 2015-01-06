<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Aileron
 */

/**
 * Google Fonts
 *
 * @return string - Google Fonts URL
 */
function aileron_google_fonts_url() {

    // Fonts URL
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Muli, translate this to 'off'. Do not translate
    * into your own language.
    */
    $muli = _x( 'on', 'Muli font: on or off', 'aileron' );

    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'aileron' );

    if ( 'off' !== $muli || 'off' !== $lato ) {
        $font_families = array();

        if ( 'off' !== $muli ) {
            $font_families[] = 'Muli:300,400,300italic,400italic';
        }

        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:300,400,700,300italic,400italic,700italic';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}

/**
 * Enqueue Google Fonts for custom headers
 */
function aileron_custom_header_fonts() {
    wp_enqueue_style( 'aileron-fonts', aileron_google_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'aileron_custom_header_fonts' );

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

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function aileron_wp_title( $title, $sep ) {
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
			$title .= " $sep " . sprintf( __( 'Page %s', 'aileron' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'aileron_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function aileron_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'aileron_render_title' );
endif;

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