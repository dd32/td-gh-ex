<?php
/**
 * Right sidebar of the page.
 *
 * @package BA Tours
 */


$panel = apply_filters( 'bathemos_flag', null, 'current_panel' );
?>


<aside id="sidebar-right" class="<?php echo esc_attr(apply_filters( 'bathemos_style', "widget-area sidebar sidebar-right", "sidebar-right" )); ?> <?php echo esc_attr(apply_filters( 'bathemos_column_width', 'col-md-2', 'main', $panel )); ?>">

	<?php 
	do_action( 'bathemos_before_dynamic_sidebar', $panel );
	
	dynamic_sidebar( $panel );
	
	do_action( 'bathemos_after_dynamic_sidebar', $panel );
	?>
	
</aside><!-- #sidebar-right -->

<?php
$panel = null;
