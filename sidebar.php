<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bakes_And_Cakes
 */

global $post;
$bakes_and_cakes_sidebar_layout = '';

if( $post )
$bakes_and_cakes_sidebar_layout = get_post_meta( $post->ID, 'bakes_and_cakes_sidebar_layout', true ); 

if ( ! is_active_sidebar( 'right-sidebar' ) || ( $bakes_and_cakes_sidebar_layout == 'no-sidebar' ) || is_search() ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->
