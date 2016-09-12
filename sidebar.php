<?php
// The template for rendering the sidebar, i.e. the primary widget area

// Reset the query
wp_reset_postdata();

// Display the content if it's a project post type
if ( get_post_type() == 'project' ) {
	if ( get_post_meta( $post->ID, 'bnt_sidebar_layout', true ) != 'full-width' ) {
	?>
	<div class="sidebar project-info">
		<?php 
		if ( function_exists('bnt_ep_project_sidebar') ) { 
			bnt_ep_project_sidebar(); 
		} 
		?>
	</div>
	<?php 
	}
// Otherwise, check for the cases when no sidebar is needed and then display the classic sidebar
} else {
	if ( is_active_sidebar( 'bnt_sidebar' ) ) { 
		if ( class_exists( 'WooCommerce' ) ) { 
			if ( is_cart() || is_checkout() ) {
				return;
			}
		}
		if ( isset($post->ID) && get_post_meta($post->ID, 'bnt_sidebar_layout', true) == 'full-width' ) {
			return;	
		} else {
			// Display the widgetized sidebar
			?>
			<div class="sidebar widget-area">
				<?php dynamic_sidebar('bnt_sidebar'); ?>
			</div>
			<?php 
		}
	}
}
?>