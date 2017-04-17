<?php
/**
 * Custom template tags for this theme.
 *
 * @package star
 */

if ( ! function_exists( 'star_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time
	 */
	function star_posted_on() {
		$time_string = '<time datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		echo $time_string;
	}
endif;

if ( ! function_exists( 'star_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function star_entry_footer() {
		if ( ! get_theme_mod( 'star_hide_meta' ) ) {
			echo '<footer class="entry-footer">';

			// Hide category and tag text for pages.
			if ( get_post_type() === 'post' ) {
				/* Translators: used between list items, there is a space after the comma. */
				$tags_list = get_the_tag_list( '', __( ', ', 'star' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">' . __( 'Tags: %1$s', 'star' ) . '</span>', $tags_list );
				}
			}

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link( __( 'Leave a comment', 'star' ), __( '1 Comment', 'star' ), __( '% Comments', 'star' ) );
				echo '</span>';
			}

			/* translators: % is the post title */
			edit_post_link( sprintf( __( 'Edit %s', 'star' ), get_the_title() ), '<span class="edit-link">', '</span>' );

			echo '<div class="byline">' . get_avatar( get_the_author_meta( 'ID' ), 60 ) . '<div class="author">' . esc_html( get_the_author() ) . '</div>
			<div class="author-link"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' .
			esc_html( 'View more posts by this author', 'star' ) . '</a></div></div>';

			/* Display jetpack's share if it's active*/
			if ( function_exists( 'sharing_display' ) ) {
				echo sharing_display();
			}

			/* Display jetpack's like  if it's active */
			if ( class_exists( 'Jetpack_Likes' ) ) {
			    $star_custom_likes = new Jetpack_Likes;
			    echo $star_custom_likes->post_likes( '' );
			}

			echo '</footer><!-- .entry-footer -->';
		} // End if().
	}
} // End if().

if ( ! function_exists( 'star_portfolio_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function star_portfolio_footer() {

		if ( ! get_theme_mod( 'star_hide_meta' ) ) {
			echo '<footer class="entry-footer">';
			global $post;

			echo the_terms( $post->ID, 'jetpack-portfolio-type', '<span class="jetpack-portfolio-type">' . __('Project Type: ','star') ,', ', '</span>' );

			echo the_terms( $post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">' . __( 'Project Tags: ', 'star' ),', ', '</span>' );

			/* translators: % is the post title */
			edit_post_link( sprintf( __( 'Edit %s', 'star' ), get_the_title() ), '<span class="edit-link">', '</span>' );

			/* Display jetpack's share if it's active*/
			if ( function_exists( 'sharing_display' ) ) {
				echo sharing_display();
			}

			/* Display jetpack's like  if it's active */
			if ( class_exists( 'Jetpack_Likes' ) ) {
			    $star_custom_likes = new Jetpack_Likes;
			    echo $star_custom_likes->post_likes( '' );
			}
			echo '</footer><!-- .entry-footer -->';
		}
	}
endif;

/*
* Excerpts.
* Example from Twenty Seventeen
* Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
* Twenty Seventeen is distributed under the terms of the GNU GPL
*/
function star_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="continue">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'star' ), get_the_title( get_the_ID() ) )
	);

	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'star_excerpt_more' );
