<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Aileron
 */

/**
 * New wp_body_open Theme Hook - WordPress 5.2
 * Backward Compatibility
 * This can be removed at the launch of WordPress 5.4
 *
 * @see https://make.wordpress.org/core/2019/04/24/miscellaneous-developer-updates-in-5-2/
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
	function wp_body_open() {
		// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
		do_action( 'wp_body_open' );
    }
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
	$args['show_home']  = true;
	$args['menu_class'] = 'site-header-menu-wrapper site-header-menu-responsive-wrapper';
	return $args;
}
add_filter( 'wp_page_menu_args', 'aileron_page_menu_args' );

/**
 * Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
 */
function aileron_page_menu_class( $class ) {
  return preg_replace( '/<ul>/', '<ul class="site-header-menu site-header-menu-responsive">', $class, 1 );
}
add_filter( 'wp_page_menu', 'aileron_page_menu_class' );

/**
 * Filter 'excerpt_length'
 *
 * @param int $length
 * @return int
 */
function aileron_excerpt_length( $length ) {
    if ( is_admin() ) {
		return $length;
	}

	// Custom Excerpt Length
	$length = aileron_mod( 'aileron_excerpt_length' );

	/**
	 * Filters the Excerpt length.
	 *
	 * @param int $length Excerpt Length.
	 */
	return apply_filters( 'aileron_excerpt_length', $length );
}
add_filter( 'excerpt_length', 'aileron_excerpt_length' );

/**
 * Filter 'excerpt_more'
 *
 * Remove [...] string
 * @param str $more
 * @return str
 */
function aileron_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	// Custom Excerpt More
	$more = '&hellip;';

	// Custom Excerpt Length
	$length = aileron_mod( 'aileron_excerpt_length' );

	// No need to show more in case of empty or zero Custom Excerpt Length
	if ( empty( $length ) ) {
		$more = '';
	}

    /**
	 * Filters the Excerpt more string.
	 *
	 * @param string $excerpt_more Excerpt More.
	 */
	return apply_filters( 'aileron_excerpt_more', $more );
}
add_filter( 'excerpt_more', 'aileron_excerpt_more' );

/**
 * Filter 'get_the_archive_title'
 *
 * Possible formats for $title
 * 1. Archive: Name
 * 2. Name
 *
 * @see get_the_archive_title
 * @param string $title Title of Archive.
 * @return string Filtered $title.
 */
function aileron_the_archive_title( $title ) {
	// Find `:`.
	$findme = ':';
	$pos = strpos( $title, $findme );

	// Validation
	if ( $pos === false ) {
		$title = sprintf( '<span class="archive-title-label">%1$s</span>',  trim( $title ) );
	} else {
		// Explode on the basis of `:`.
		$matches = explode( $findme, $title, 2 );

		// Validation
		if ( count( $matches ) > 1 ) {
			$title = sprintf(
				'<span class="archive-title-label archive-title-control">%1$s</span><span class="archive-title-sep archive-title-control">%3$s</span><span class="archive-title-name">%2$s</span>',
				trim( $matches[0] ),
				trim( $matches[1] ),
				/* translators: Archive title separator with a space */
				esc_html__( ': ', 'aileron' )
			);
		}
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'aileron_the_archive_title' );

/**
 * Filter `body_class`
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
	$classes[] = 'has-' . esc_attr( aileron_mod( 'aileron_theme_layout' ) ) . '-layout';

	// Sidebar Class
	if ( aileron_has_sidebar() ) {
		$classes[] = 'has-' . esc_attr( aileron_mod( 'aileron_sidebar_position' ) ) . '-sidebar';
	} else {
		$classes[] = 'has-no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'aileron_body_classes' );

/**
 * Filter `post_class`
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes An array of post class names.
 * @return array
 */
function aileron_post_classes( $classes ) {

	// Post Thumbnail Archive Class
	if ( aileron_has_post_thumbnail() && aileron_mod( 'aileron_archive_co_featured_image' )  ) {
		$classes[] = 'has-post-thumbnail-archive';
	}

	return $classes;
}
add_filter( 'post_class', 'aileron_post_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function aileron_attachment_link( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
		return $url;
	}

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
		$url .= '#main';
	}

	return $url;
}
add_filter( 'attachment_link', 'aileron_attachment_link', 10, 2 );

/**
 * Blog Credits.
 *
 * @return void
 */
function aileron_credits_blog() {
	// Blog Credits HTML
	$html = '<div class="credits credits-blog">'. aileron_mod( 'aileron_copyright' ) .'</div>';

	// Convert Chars
	$html = convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $html ) ) ) ) ) );

	// Sanitization
	echo wp_kses_post( $html );
}
add_action( 'aileron_credits', 'aileron_credits_blog' );

/**
 * Designer Credits.
 *
 * @return void
 */
function aileron_credits_designer() {
	printf( '<div class="credits credits-designer">%1$s <a href="%2$s" title="ThemeCot">ThemeCot</a> <span>&sdot;</span> %3$s <a href="%4$s" title="WordPress">WordPress</a></div>',
		esc_html__( 'Aileron Theme by', 'aileron' ),
		esc_url( 'https://themecot.com' ),
		esc_html__( 'Powered by', 'aileron' ),
		esc_url( __( 'https://wordpress.org', 'aileron' ) )
	);
}
add_action( 'aileron_credits', 'aileron_credits_designer' );

/**
 * Enqueues front-end CSS to hide elements.
 *
 * @see wp_add_inline_style()
 */
function aileron_hide_elements() {
	// Elements
	$elements = array();

	// Post Date Archive
	if ( false === aileron_mod( 'aileron_archive_co_post_date' ) ) {
		$elements[] = '.blog .posted-on';
		$elements[] = '.archive .posted-on';
		$elements[] = '.search .posted-on';
	}

	// Post Categories Archive
	if ( false === aileron_mod( 'aileron_archive_co_post_categories' ) ) {
		$elements[] = '.blog .cat-links';
		$elements[] = '.archive .cat-links';
		$elements[] = '.search .cat-links';
	}

	// Post Author Archive
	if ( false === aileron_mod( 'aileron_archive_co_post_author' ) ) {
		$elements[] = '.blog .byline';
		$elements[] = '.archive .byline';
		$elements[] = '.search .byline';
	}

	// Post Comments Archive
	if ( false === aileron_mod( 'aileron_archive_co_post_comments' ) ) {
		$elements[] = '.blog .comments-link';
		$elements[] = '.archive .comments-link';
		$elements[] = '.search .comments-link';
	}

	// Post Date Single
	if ( false === aileron_mod( 'aileron_single_co_post_date' ) ) {
		$elements[] = '.single .posted-on';
	}

	// Post Categories Single
	if ( false === aileron_mod( 'aileron_single_co_post_categories' ) ) {
		$elements[] = '.single .cat-links';
	}

	// Post Tags Single
	if ( false === aileron_mod( 'aileron_single_co_post_tags' ) ) {
		$elements[] = '.single .tags-links';
	}

	// Post Author Single
	if ( false === aileron_mod( 'aileron_single_co_post_author' ) ) {
		$elements[] = '.single .byline';
	}

	// Archive Title
	if ( false === aileron_mod( 'aileron_archive_co_title_label' ) ) {
		$elements[] = '.archive-title-control';
	}

	// Credit
	if ( false === aileron_mod( 'aileron_credit' ) ) {
		$elements[] = '.credits-designer';
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
	wp_add_inline_style( 'aileron-style', $css );
}
add_action( 'wp_enqueue_scripts', 'aileron_hide_elements', 11 );

if ( ! function_exists( 'aileron_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @return void
 */
function aileron_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default aileron attachment size.
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
				if ( $attachment_id === $post->ID ) {
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
		the_title_attribute( 'echo=0' ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);

}
endif;
