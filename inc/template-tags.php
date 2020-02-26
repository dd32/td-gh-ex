<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Chip Life
 */

if ( ! function_exists( 'chip_life_the_posts_pagination' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @see https://codex.wordpress.org/Function_Reference/the_posts_pagination
 * @return void
 */
function chip_life_the_posts_pagination() {

	// Previous/next posts navigation @since 4.1.0
	the_posts_pagination( array (
		'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous Page', 'chip-life' ) . '</span>',
		'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next Page', 'chip-life' ) . '</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'chip-life' ) . ' </span>',
	) );

}
endif;

if ( ! function_exists( 'chip_life_the_post_navigation' ) ) :
/**
 * Previous/next post navigation.
 *
 * @see https://developer.wordpress.org/reference/functions/the_post_navigation/
 * @return void
 */
function chip_life_the_post_navigation() {

	// Previous/next post navigation @since 4.1.0.
	the_post_navigation( array (
		'next_text' => '<span class="meta-nav">' . esc_html__( 'Next', 'chip-life' ) . '</span> ' . '<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav">' . esc_html__( 'Prev', 'chip-life' ) . '</span> ' . '<span class="post-title">%title</span>',
	) );

}
endif;

if ( ! function_exists( 'chip_life_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function chip_life_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	// Posted On
	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		esc_html_x( 'Posted on', 'post date', 'chip-life' ),
		esc_url( get_permalink() ),
		wp_kses( $time_string, array( 'time' => array( 'class' => array(), 'datetime' => array() ) ) )
	);
}
endif;

if ( ! function_exists( 'chip_life_posted_by' ) ) :
/**
 * Prints author.
 */
function chip_life_posted_by() {
	// Global Post
	global $post;

	// We need to get author meta data from both inside/outside the loop.
	$post_author_id = get_post_field( 'post_author', $post->ID );

	// Post Author
	printf( '<span class="byline">%1$s <span class="author vcard"><a class="entry-author-link url fn n" href="%2$s" rel="author"><span class="entry-author-name">%3$s</span></a></span></span>',
		/* translators: %s: post author */
		esc_html_x( 'by', 'post author', 'chip-life' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID', $post_author_id ) ) ),
		esc_html( get_the_author_meta( 'display_name', $post_author_id ) )
	);
}
endif;

if ( ! function_exists( 'chip_life_post_first_category' ) ) :
/**
 * Prints first category for the current post.
 *
 * @return void
*/
function chip_life_post_first_category() {
	// An array of categories to return for the post.
	$categories = get_the_category();

	// Validation
	if ( ! empty( $categories ) && $categories[0] ) {
		// Post First Category HTML
		printf( '<span class="post-first-category cat-links entry-meta-icon"><a href="%1$s" title="%2$s">%3$s</a></span>',
			esc_attr( esc_url( get_category_link( $categories[0]->term_id ) ) ),
			esc_attr( $categories[0]->cat_name ),
			esc_html( $categories[0]->cat_name )
		);
	}
}
endif;

if ( ! function_exists( 'chip_life_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function chip_life_entry_footer() {

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'chip-life' ) );
		if ( $categories_list && chip_life_categorized_blog() ) {
			/* translators: %s: posted in categories */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'chip-life' ) . '</span>', wp_kses_post( $categories_list ) );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'chip-life' ) );
		if ( $tags_list ) {
			/* translators: %s: posted in tags */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'chip-life' ) . '</span>', wp_kses_post( $tags_list ) );
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'chip-life' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function chip_life_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'chip_life_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array (
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'chip_life_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so chip_life_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so chip_life_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in chip_life_categorized_blog.
 */
function chip_life_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'chip_life_categories' );
}
add_action( 'edit_category', 'chip_life_category_transient_flusher' );
add_action( 'save_post',     'chip_life_category_transient_flusher' );

if ( ! function_exists( 'chip_life_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element.
 *
 * @return void
*/
function chip_life_post_thumbnail() {

	// Post Thumbnail HTML
	$html = '';

	// Get Post Thumbnail
	$post_thumbnail = get_the_post_thumbnail( null, 'chip-life-featured', array( 'class' => 'img-featured img-responsive' ) );

	// Validation
	if ( ! empty( $post_thumbnail ) ) {

		// Post Thumbnail HTML
		printf( '<div class="entry-image-wrapper"><figure class="post-thumbnail"><a href="%1$s">%2$s</a></figure></div>',
			esc_attr( esc_url( get_the_permalink() ) ),
			wp_kses_post( $post_thumbnail )
		);
	}
}
endif;

/**
 * A helper conditional function.
 * Theme has Excerpt or Not
 *
 * https://codex.wordpress.org/Function_Reference/get_the_excerpt
 * This function must be used within The Loop.
 *
 * @return bool
 */
function chip_life_has_excerpt() {

	// Post Excerpt
	$post_excerpt = get_the_excerpt();

	/**
	 * Filters the Post has excerpt.
	 *
	 * @param bool
	 */
	return apply_filters( 'chip_life_has_excerpt', ! empty ( $post_excerpt ) );

}

/**
 * A helper conditional function.
 * Theme has Sidebar or Not
 *
 * @return bool
 */
function chip_life_has_sidebar() {

	/**
	 * Filters the theme has active sidebar.
	 *
	 * @param bool
	 */
	return apply_filters( 'chip_life_has_sidebar', is_active_sidebar( 'sidebar-1' ) );

}

/**
 * Display the layout classes.
 *
 * @param string $section - Name of the section to retrieve the classes
 * @return void
 */
function chip_life_layout_class( $section = 'content' ) {

	// Sidebar Position
	$sidebar_position = chip_life_mod( 'chip_life_sidebar_position' );
	if ( ! chip_life_has_sidebar() ) {
		$sidebar_position = 'no';
	}

	// Layout Skeleton
	$layout_skeleton = array(
		'content' => array(
			'content' => 'col-xxl-12',
		),

		'content-sidebar' => array(
			'content' => 'col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8',
			'sidebar' => 'col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4',
		),

		'sidebar-content' => array(
			'content' => 'col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 push-lg-4 push-xl-4 push-xxl-4',
			'sidebar' => 'col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 pull-lg-8 pull-xl-8 pull-xxl-8',
		),

		'sidebar-content-rtl' => array(
			'content' => 'col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 pull-lg-4 pull-xl-4 pull-xxl-4',
			'sidebar' => 'col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 push-lg-8 push-xl-8 push-xxl-8',
		),
	);

	// Layout Classes
	switch( $sidebar_position ) {

		case 'no':
		$layout_classes = $layout_skeleton['content']['content'];
		break;

		case 'left':
			$layout_classes = ( 'sidebar' === $section )? $layout_skeleton['sidebar-content']['sidebar'] : $layout_skeleton['sidebar-content']['content'];
			if ( is_rtl() ) {
				$layout_classes = ( 'sidebar' === $section )? $layout_skeleton['sidebar-content-rtl']['sidebar'] : $layout_skeleton['sidebar-content-rtl']['content'];
			}
		break;

		case 'right':
		default:
		$layout_classes = ( 'sidebar' === $section )? $layout_skeleton['content-sidebar']['sidebar'] : $layout_skeleton['content-sidebar']['content'];

	}

	echo esc_attr( $layout_classes );

}
