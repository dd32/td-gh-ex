<?php
/**
 * The sidebar Template containing the main widget area
 */
?>

<?php
if(is_front_page()){
$options = get_option('theme_options');
$homesidebarradio = $options['homesidebarradio'];
if( $homesidebarradio  == 1 ) {  $sidebars = 'float_left';} 
elseif( $homesidebarradio  == 3 ) {  $sidebars = 'no-display';} 
else{$sidebars = 'float_right';}}  ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="secondary" class="sidebar <?php echo $sidebars; ?>" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
