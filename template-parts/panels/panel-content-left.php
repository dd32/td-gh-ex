<?php
/**
 * Left panel in the content area.
 *
 * @package BA Tours
 */


$panel = apply_filters( 'bathemos_flag', '', 'current_panel' );
?>


<aside id="sidebar-<?php echo esc_attr($panel); ?>" class="<?php echo esc_attr(apply_filters( 'bathemos_style', "widget-area sidebar sidebar-content sidebar-{$panel}", "sidebar-{$panel}" )); ?> <?php echo esc_attr(apply_filters( 'bathemos_column_width', 'col-md-2', 'content', $panel )); ?>">

	<?php 
	do_action( 'bathemos_before_dynamic_sidebar', "sidebar-{$panel}" );
	
	dynamic_sidebar( $panel );
	
	do_action( 'bathemos_after_dynamic_sidebar', "sidebar-{$panel}" );
	?>
	
</aside><!-- #sidebar-<?php echo esc_attr($panel); ?> -->

<?php
$panel = null;
