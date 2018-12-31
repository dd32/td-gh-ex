<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package altitude-lite
 */

if ( ! file_exists( get_template_directory() . '/premium/functions.php' ) ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
}

?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
