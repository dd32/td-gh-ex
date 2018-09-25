<?php
/**
 * Default panel.
 * This file will be used in case no name-specific file for a panel was found.
 *
 * @package BA Tours
 */


$panel = apply_filters( 'bathemos_flag', null, 'current_panel' );
?>


<aside id="sidebar-<?php echo esc_attr($panel); ?>" class="<?php echo esc_attr(apply_filters( 'bathemos_style', "sidebar sidebar-{$panel}", "sidebar-{$panel}" )); ?>">

	<?php 
	do_action( 'bathemos_before_dynamic_sidebar', "sidebar-{$panel}" );
	
	dynamic_sidebar( $panel );
	
	do_action( 'bathemos_after_dynamic_sidebar', "sidebar-{$panel}" );
	?>
	
</aside><!-- #sidebar-<?php echo esc_attr($panel); ?> -->

<?php
$panel = null;
