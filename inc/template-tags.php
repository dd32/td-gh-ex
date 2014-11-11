<?php
/**
 *
 * Custom template tags.
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

if ( !function_exists( 'altitude_content_nav' ) ) :
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function altitude_content_nav ( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( !$next && !$previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

		?>
		<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> row">
			<div class="xs-col-12">
				<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'altitude' ); ?></h2>

				<?php if ( is_single() ) : // navigation links for single posts ?>

					<div class="nav-previous xs-col-6"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'altitude' ) . '</span> %title' ); ?></div>
					<div class="nav-next xs-col-6"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'altitude' ) . '</span>' ); ?></div>

				<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

					<div class="nav-previous xs-col-6"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous Posts', 'altitude' ) ); ?></div>
					<div class="nav-next xs-col-6"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'altitude' ) ); ?></div>

				<?php endif; ?>
			</div>
		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
	}
endif; // altitude_content_nav

if ( !function_exists( 'altitude_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time
	 */
	function altitude_posted_on () {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		printf( '<span class="posted-on">%1$s</span>', $time_string );
	}
endif;

/**
 * Prints comment meta
 */
function altitude_comment_meta () {
	$comments = get_comments_number();
	$comment  = sprintf( __( '%s Comments', 'altitude' ),
		$comments
	);
	if ( !post_password_required() && ( comments_open() && 0 != $comments ) ) {
		printf( '%2$s<span class="comments-link"><a href="%3$s" title="%4$s">%1$s</a></span>',
			( $comments > 1 ) ? $comment : __( '1 Comment', 'altitude' ),
			altitude_get_meta_image( 'comment' ),
			get_comments_link(),
			sprintf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments, 'comments title', 'altitude' ),
				number_format_i18n( get_comments_number() ), get_the_title() )
		);
	}
}

/**
 * Returns true if a blog has more than 1 category
 */
function altitude_categorized_blog () {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
		    'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so altitude_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so altitude_categorized_blog should return false
		return false;
	}
}

/**
 * Echos entry meta images
 *
 * @param $name string accepts author, date, comments, tags, cats
 */
function altitude_get_meta_image ( $name ) {
	$icon = '<span class="genericon genericon-' . $name . '" alt="' . esc_attr( $name ) . '"></span>';

	return $icon;
}

/**
 * Flush out the transients used in altitude_categorized_blog
 */
function altitude_category_transient_flusher () {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}

add_action( 'edit_category', 'altitude_category_transient_flusher' );
add_action( 'save_post', 'altitude_category_transient_flusher' );