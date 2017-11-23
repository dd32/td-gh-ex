<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package semplicemente
 */

if ( ! function_exists( 'semplicemente_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function semplicemente_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'semplicemente' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav"><i class="fa spaceRight fa-angle-double-left" aria-hidden="true"></i></span>'. esc_html__('Older Posts', 'semplicemente') ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'semplicemente') . '<span class="meta-nav"><i class="fa spaceLeft fa-angle-double-right" aria-hidden="true"></i></span>' ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'semplicemente_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function semplicemente_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'semplicemente' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav" aria-hidden="true"><i class="fa spaceRight fa-angle-double-left"></i></span>&nbsp;%title' . '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'semplicemente' ) . '</span> ' );
				next_post_link( '<div class="nav-next">%link</div>', '%title&nbsp;<span class="meta-nav" aria-hidden="true"><i class="fa spaceLeft fa-angle-double-right"></i></span>' . '<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'semplicemente' ) . '</span> ' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'semplicemente_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function semplicemente_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

	echo '<span class="posted-on"><i class="fa fa-clock-o spaceRight" aria-hidden="true"></i>' . $posted_on . '</span><span class="byline"><i class="fa fa-user spaceRight" aria-hidden="true"></i>' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'semplicemente_entry_footer' ) ) :
/**
 * Prints HTML with meta information for categories, tags and edit link.
 */
function semplicemente_entry_footer() {
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list && semplicemente_categorized_blog() ) {
			echo '<div class="dataBottom cat-links"><i class="fa spaceRight fa-folder-open-o" aria-hidden="true"></i>' . $categories_list . '</div>';
		}
		$tags_list = get_the_tag_list( '', ' ' );
		if ( $tags_list ) {
			echo '<div class="dataBottom tags-links"><i class="fa fa-tags spaceRight" aria-hidden="true"></i>' . $tags_list . '</div>';
		}
	}

	edit_post_link( esc_html__( 'Edit', 'semplicemente' ), '<span class="edit-link floatLeft"><i class="fa fa-pencil-square-o spaceRight" aria-hidden="true"></i>', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function semplicemente_categorized_blog() {
	$all_the_cool_cats = get_transient( 'semplicemente_categories' );
	
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $categories );

		set_transient( 'semplicemente_categories', $all_the_cool_cats );
	}
	
	return $all_the_cool_cats > 1;
}

/**
 * Flush out the transients used in semplicemente_categorized_blog.
 */
function semplicemente_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'semplicemente_categories' );
}
add_action( 'edit_category', 'semplicemente_category_transient_flusher' );
add_action( 'save_post',     'semplicemente_category_transient_flusher' );
