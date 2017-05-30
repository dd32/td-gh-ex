<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Aquaparallax
 * @version 1.2
 */

if ( ! is_active_sidebar( 'aqua_right_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'aqua_right_sidebar' ); ?>
</aside>