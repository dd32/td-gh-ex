<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package annina
 */

if ( ! function_exists( 'annina_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function annina_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'annina' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '<div class="meta-nav" title="%title" aria-hidden="true"><i class="fa fa-angle-left spaceRight"></i><span>' . esc_html__( 'Previous Post', 'annina' ) . '</span></div> ' . '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'annina' ) . '</span> ' );
				next_post_link( '<div class="nav-next">%link</div>', '<div class="meta-nav" title="%title" aria-hidden="true"><span>' . esc_html__( 'Next Post', 'annina' ) . '</span><i class="fa fa-angle-right spaceLeft"></i></div> ' . '<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'annina' ) . '</span> ' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'annina_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function annina_posted_on() {
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

	$posted_on = sprintf(
		_x( '<i class="fa fa-calendar spaceRight"></i>%s', 'post date', 'annina' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '<i class="fa fa-user spaceLeftRight" aria-hidden="true"></i>%s', 'post author', 'annina' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	
	if ( 'post' == get_post_type() && is_single() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ' / ', 'annina' ) );
		if ( $categories_list && annina_categorized_blog() ) {
			printf( '<span class="cat-links"><i class="fa fa-folder-open-o spaceLeftRight" aria-hidden="true"></i>' . esc_html__( '%1$s', 'annina' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
	
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o spaceLeftRight" aria-hidden="true"></i>';
		comments_popup_link( esc_html__( 'No Comments', 'annina' ), esc_html__( '1 Comment', 'annina' ), esc_html__( '% Comments', 'annina' ) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'annina_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function annina_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' / ', 'annina' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags spaceRight" aria-hidden="true"></i>' . esc_html__( '%1$s', 'annina' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	edit_post_link( esc_html__( 'Edit', 'annina' ), '<span class="edit-link"><i class="fa fa-wrench spaceRight" aria-hidden="true"></i>', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function annina_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'annina_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'annina_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so annina_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so annina_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in annina_categorized_blog.
 */
function annina_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'annina_categories' );
}
add_action( 'edit_category', 'annina_category_transient_flusher' );
add_action( 'save_post',     'annina_category_transient_flusher' );
