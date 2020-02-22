<?php
/**
* sidebar.php
*
* @author    Franchi Design
* @package   Atomy
* @version   1.0.5
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
