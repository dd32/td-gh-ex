<?php
/**
 * 	Sidebar
 */

if ( function_exists('is_shop') && is_shop() ){
	$bnw_theme_sidebar = 'sidebar-shop';
}else {
	$bnw_theme_sidebar = 'primary-widget';
}

if ( ! is_active_sidebar( $bnw_theme_sidebar ) ) {
	return;
}
?>

<div id="sidebar-widget" class="widget-area" role="complementary">

	<?php if ( is_active_sidebar( $bnw_theme_sidebar ) ) : ?>
		<?php dynamic_sidebar( $bnw_theme_sidebar ); ?>
	<?php endif; ?>

</div>