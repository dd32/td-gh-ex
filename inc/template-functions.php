<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package arena
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function arena_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'arena_body_classes' );

/**
 * Add a pingback url auto-arenay header for single posts, pages, or attachments.
 */
function arena_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'arena_pingback_header' );

if ( ! function_exists( 'arena_title' ) ) :

	/**
	 * Customize header title.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function arena_title( $title ) {

		if ( is_home() ) {
			$title = themeszen_get_option('arena_blogtitle');
		} elseif ( is_singular() ) {
			$title = single_post_title( '', false );
		} elseif ( is_category() || is_tag() ) {
			$title = single_term_title( '', false );
		} elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search Results for: %s', 'arena' ),  get_search_query() );
		} elseif ( is_404() ) {
			$title = esc_html__( '404!', 'arena' );
		}

		return $title;
	}

endif;

add_filter( 'arena_filter_title', 'arena_title' );

/** filter function for wp_title */
function arena_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return  $insert . $old_title . $num;
}

// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'arena_filter_wp_title', 10, 3 );

if ( ! function_exists( 'arena_excerpt_length' ) ) :
/**
 * arena Excerpt Length
 *
 * @since arena 1.0
 */
function arena_excerpt_length( $length ) {
	return 30;
}
endif;
add_filter( 'excerpt_length', 'arena_excerpt_length' );

function arena_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'arena_auto_excerpt_more' );

if ( ! function_exists( 'arena_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function arena_primary_navigation_fallback() {

		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'arena' ) . '</a></li>';

		$args = array(
			'posts_per_page' => 5,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
			);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}

			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;

if ( ! function_exists( 'arena_get_the_excerpt' ) ) :

	/**
	 * Fetch excerpt from the post.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length.
	 * @param WP_Post $post_object WP_Post instance.
	 * @return string Excerpt content.
	 */
	function arena_get_the_excerpt( $length, $post_object = null ) {

		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );

		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'arena_helper_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function arena_helper_the_excerpt( $length = 40, $post_obj = null ) {

		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}
		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 40;
		}
		$source_content = $post_obj->post_content;
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;

	}

endif;

