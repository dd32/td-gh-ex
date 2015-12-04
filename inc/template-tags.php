<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package undedicated
 */

if ( ! function_exists( 'undedicated_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function undedicated_posted_on() {
	$time_string = '<time class="entry-date entry-published published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date entry-published published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'undedicated' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'undedicated' ),
		'<span class="author entry-author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	echo '<span class="byline"> ' . $byline . '</span>&nbsp;<span class="posted-on">' . $posted_on . '</span>';

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'undedicated' ) );
		if ( $categories_list && undedicated_categorized_blog() ) {
			$catlist = sprintf(
				esc_html_x( '%s', 'post category', 'undedicated' ),
				'<span class="cat-links">' . $categories_list . '</span>'
				);
		}
		echo '&nbsp;<span class="entry-category">' . $catlist . '</span>&nbsp;';
	}
		
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		comments_popup_link( __( '<span class="comments-link"> [+]</span>', 'undedicated' ), __( '<span class="comments-link"> 1</span>', 'undedicated' ), __( '<span class="comments-link"> %</span>', 'undedicated' ) );
	}
}
endif;

if ( ! function_exists( 'undedicated_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function undedicated_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'undedicated' ) );
		if ( $tags_list ) {
			printf( '<p class="tags-links">' . esc_html__( 'Tags: %1$s', 'undedicated' ) . '</p>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'undedicated' ),
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
function undedicated_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'undedicated_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'undedicated_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so undedicated_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so undedicated_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in undedicated_categorized_blog.
 */
function undedicated_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'undedicated_categories' );
}
add_action( 'edit_category', 'undedicated_category_transient_flusher' );
add_action( 'save_post',     'undedicated_category_transient_flusher' );
