<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Star
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function star_jetpack_setup() {
	add_theme_support(
		'infinite-scroll',
		array(
			'container' => 'main',
			'footer'    => 'page',
		)
	);

	/**
	 * Support for Jetpack featured-content.
	 *
	 * @link Learn more: https://jetpack.com/support/featured-content/#theme-support
	 */
	add_theme_support(
		'featured-content',
		array(
			'filter'     => 'star_get_featured_posts',
			'max_posts'  => 6,
			'post_types' => array( 'post', 'page' ),
		)
	);

}
add_action( 'after_setup_theme', 'star_jetpack_setup' );

/**
 * Getter function for the Jetpack featured content.
 */
function star_get_featured_posts() {
	return apply_filters( 'star_get_featured_posts', array() );
}

/**
 * Checks if there is at least one featured post.
 *
 * @param int $minimum The minimum number of posts to check for.
 */
function star_has_featured_posts( $minimum ) {
	if ( is_paged() )
		return false;

	$minimum        = absint( $minimum );
	$featured_posts = apply_filters( 'star_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) )
		return false;

	if ( $minimum > count( $featured_posts ) )
		return false;

	return true;
}


/**
 * Remove the jetpack likes and sharing_display filter so that we can resposition them.
 *
 * @link https://jetpack.com/2013/06/10/moving-sharing-icons/
 */
function star_move_share() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );

	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
add_action( 'loop_start', 'star_move_share' );
