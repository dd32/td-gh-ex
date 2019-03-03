<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arrival
 */
$default  = arrival_get_default_theme_options();

$_single_post_sidebars = get_theme_mod('arrival_single_post_sidebars',$default['arrival_single_post_sidebars']);

if ( ! is_active_sidebar( 'sidebar-1' )  || ($_single_post_sidebars == 'no_sidebar') ) {
	return;
}
?>

<?php wp_print_styles( array( 'arrival-sidebar' ) ); ?>
<aside id="secondary" class="primary-sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
