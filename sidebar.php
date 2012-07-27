<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */
 
	global $post;
	if( $post )
		$layout = get_post_meta( $post->ID,'Sidebar-layout', true ); 
		
	if( empty( $layout ) || ( !is_page() && !is_single() ) )
		$layout='default';
		
	$options = get_option( 'simplecatch_options' );
	if( empty( $options['sidebar_layout'] ) )
		$themeoption_layout='right-sidebar';
	else
		$themeoption_layout = $options['sidebar_layout'];
	
	if( $layout=='left-sidebar' ||( $layout=='default' && $themeoption_layout == 'left-sidebar') ) {
		echo '<div id="sidebar" class="col4 no-margin-left">';
	} else {
		echo '<div id="sidebar" class="col4">';
	} 

	if ( function_exists( 'dynamic_sidebar' ) ) {
		//displays 'sidebar' for all pages
		dynamic_sidebar( 'sidebar' ); 
	}
	?>
	</div><!-- #sidebar -->
	
	<?php 
	if(!( $layout=='left-sidebar' ||( $layout=='default' && $themeoption_layout == 'left-sidebar') ) ) {
		echo '<div class="row-end"></div>';
	}