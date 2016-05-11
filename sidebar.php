<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package App_Landing_Page
 */



global $post;
$app_landing_page_sidebar_layout = '';

if( $post )
$app_landing_page_sidebar_layout = get_post_meta( $post->ID, 'app_landing_page_sidebar_layout', true ); 

if ( ! is_active_sidebar( 'right-sidebar' ) || ( $app_landing_page_sidebar_layout == 'no-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #secondary -->
