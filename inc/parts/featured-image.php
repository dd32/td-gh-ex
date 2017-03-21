<?php
/**
 * featured-image.php
 * Snippet for displaying featured image in the loop
 *
 * @package WordPress
 * @subpackage Best_Reloaded
 * @since Best Reloaded 0.1
 */

if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'featured-slide', array( 'class' => 'd-block img-fluid' ));
} else {
	// get the url of default featured image
    $featured_image_url = get_template_directory_uri() . '/assets/img/default-post.jpg';
	if( $featured_image_url ){
		// echo the default image
		echo '<img src="' . esc_url( $featured_image_url ) . '" class="d-block img-fluid" />';
	}
}
