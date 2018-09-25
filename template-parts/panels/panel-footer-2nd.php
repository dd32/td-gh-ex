<?php
/**
 * Panel in the footer of all pages.
 *
 * @package BA ThemOS
 */


$panel = apply_filters( 'bathemos_flag', null, 'current_panel' );
?>


<aside id="sidebar-<?php echo esc_attr($panel); ?>" class="<?php echo esc_attr(apply_filters( 'bathemos_style', "sidebar sidebar-{$panel}", "sidebar-{$panel}" )); ?> <?php echo esc_attr(apply_filters( 'bathemos_column_width', 'col-md-2', 'footer', 'rest' )); ?>">

	<?php dynamic_sidebar( $panel ); ?>
	
</aside><!-- #sidebar-<?php echo esc_attr($panel); ?> -->

<?php
$panel = null;
