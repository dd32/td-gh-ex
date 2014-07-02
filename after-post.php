<?php
/**
 * The Template Part for displaying Jetpack Shares, Likes and Related Posts, and the After Post Sidebar.
 *
 * @package Aperture
 */

if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 
if ( class_exists( 'Jetpack_Likes' ) ) {
    $custom_likes = new Jetpack_Likes;
    echo $custom_likes->post_likes( '' );
}

if ( is_single() && !is_attachment() && class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'related-posts' ) ) { ?>
	<div id="aperture-related-posts">
		<?php do_shortcode( '[jetpack-related-posts]' ); ?></div><?php 
}

if ( is_single() && !is_attachment() && !is_singular( 'jetpack-portfolio' ) ) { ?>
	<!-- #after-post-sidebar -->
	<?php get_sidebar( 'after-post' ); 
}

?>
