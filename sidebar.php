<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<div id="primary-sidebar" class="widget-area sidebar" role="complementary">
<?php
	// A first sidebar for widgets.
	if( is_active_sidebar('sidebar-1') ) :
		dynamic_sidebar( 'sidebar-1' );
	endif;
?>
</div><!-- #primary .widget-area -->

<div id="secondary-sidebar" class="widget-area sidebar" role="complementary">
<?php
	// A second sidebar for widgets.
	if ( is_active_sidebar( 'sidebar-2' ) ) : 
		dynamic_sidebar( 'sidebar-2' );
	endif;
?>
</div><!-- #secondary .widget-area -->


