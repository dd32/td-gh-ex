<?php get_header(); ?>

<?php if ( ashe_options( 'featured_slider_label' ) === true || ashe_options( 'featured_links_label' ) === true ) : ?>
<div id="featured-area" class="<?php echo ashe_options( 'general_slider_width' ) === 'boxed' ? 'boxed-wrapper': ''; ?>">
<?php
if ( is_home() ) {

	// Featured Slider, Carousel
	if ( ashe_options( 'featured_slider_label' ) === true ) {
		get_template_part( 'templates/sliders/slider' ); 
	}

	// Featured Links, Banners
	if ( ashe_options( 'featured_links_label' ) === true ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}
}

?>
</div>
<?php endif; ?>

<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ashe_options( 'general_content_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php 
	
	// Sidebar Alt
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	// Blog Grid Wrapper
	get_template_part( 'templates/grid/blog', 'grid' );

	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	?>

</div><!-- #page-content -->

<?php get_footer(); ?>