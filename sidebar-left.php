<?php
/**
 * Sidebar Left
 *
 * Content for our sidebar, provides prompt for logged in users to create widgets
 *
 * @package Aadya
 * @subpackage Aadya
 * @since Aadya 1.0.0
 */
?>

<?php $col =  aadya_get_sidebar_cols(); 
$layout = of_get_option('page_layouts');
if($layout == "sidebar-content-sidebar" || $layout == "content-sidebar-sidebar") {
	$col = 2;
}
if($layout == "sidebar-content") {
	$smcol = 4;
} elseif($layout == "sidebar-content-sidebar" || $layout == "content-sidebar-sidebar") {
	$smcol = 3;
}

if(is_page_template('page-templates/sidebar-content-sidebar.php') || is_page_template('page-templates/content-sidebar-sidebar.php')) {
	$smcol = 3; $col = 2;
}
?>
<!-- Sidebar -->
<div class="col-xs-12 col-sm-<?php echo $smcol;?> col-md-<?php echo $col;?> sidebar-left" >
<div id="left-secondary">
<?php if ( dynamic_sidebar('aadya_sidebar_left') ) : elseif( current_user_can( 'edit_theme_options' ) ) : ?>
	<h5><?php _e( 'No widgets found.', 'aadya' ); ?></h5>
	<p><?php printf( __( 'It seems you don\'t have any widgets in your sidebar! Would you like to %s now?', 'aadya' ), '<a href=" '. get_admin_url( '', 'widgets.php' ) .' ">populate your sidebar</a>' ); ?></p>
<?php endif; ?>
</div>
</div>
<!-- End Sidebar -->