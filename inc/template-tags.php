<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blogghiamo
 */

if ( ! function_exists( 'blogghiamo_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function blogghiamo_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'blogghiamo' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous" title="<?php _e( 'Older Posts', 'blogghiamo' ); ?>"><?php next_posts_link( '<i class="fa fa-lg fa-angle-left"></i>' ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next" title="<?php _e( 'Newer Posts', 'blogghiamo' ); ?>"><?php previous_posts_link( '<i class="fa fa-lg fa-angle-right"></i>' ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'blogghiamo_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function blogghiamo_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'blogghiamo' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<div class="meta-nav" title="%title"><i class="fa fa-angle-left spaceRight"></i><span>'. __('Previous Post', 'blogghiamo') .'</span></div>', 'Previous post link', 'blogghiamo' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<div class="meta-nav" title="%title"><span>'. __('Next Post', 'blogghiamo') .'</span><i class="fa fa-angle-right spaceLeft"></i></div>', 'Next post link',     'blogghiamo' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'blogghiamo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blogghiamo_posted_on() {
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
		_x( '<i class="fa fa-calendar spaceRight"></i> %s', 'post date', 'blogghiamo' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( '<i class="fa fa-user spaceRight"></i> %s', 'post author', 'blogghiamo' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';
	
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( __( ' / ', 'blogghiamo' ) );
		if ( $categories_list && blogghiamo_categorized_blog() ) {
			printf( '<span class="cat-links smallPart"><i class="fa fa-folder-open spaceRight"></i>%1$s</span>', $categories_list );
		}
	}
	
	if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o spaceRight"></i>';
		comments_popup_link( __( 'Leave a comment', 'blogghiamo' ), __( '1 Comment', 'blogghiamo' ), __( '% Comments', 'blogghiamo' ) );
		echo '</span>';
	}

}
endif;

if ( ! function_exists( 'blogghiamo_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blogghiamo_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' / ', 'blogghiamo' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags spaceRight"></i> %1$s</span>', $tags_list );
		}
	}

	edit_post_link( __( 'Edit', 'blogghiamo' ), '<span class="edit-link"><i class="fa fa-wrench spaceRight"></i>', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function blogghiamo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'blogghiamo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'blogghiamo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blogghiamo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blogghiamo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blogghiamo_categorized_blog.
 */
function blogghiamo_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'blogghiamo_categories' );
}
add_action( 'edit_category', 'blogghiamo_category_transient_flusher' );
add_action( 'save_post',     'blogghiamo_category_transient_flusher' );
