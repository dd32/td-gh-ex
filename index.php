<?php 

get_header();

// Featured Slider, Carousel
if ( is_home() && ashe_options( 'featured_slider_label' ) === true ) {
	get_template_part( 'templates/sliders/slider' ); 
}
?>

<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ashe_options( 'general_content_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php 
	// Featured Links, Banners
	if ( is_home() && ashe_options( 'featured_links_label' ) === true ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}

	// Sidebar Alt
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	// Blog Grid Wrapper
	get_template_part( 'templates/grid/blog', 'grid' );
	?>

</div><!-- #page-content -->

<?php get_footer(); ?>