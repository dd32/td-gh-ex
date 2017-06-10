<?php get_header(); ?>

<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ( ashe_options( 'general_single_width' ) === 'boxed' && get_field( 'full_width_post_content' )!== 'yes' ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_page_layout() ); ?>">

	<?php 
	// Sidebar Alt 
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	if ( get_field( 'hide_post_sidebar' ) !== 'yes' ) {

		// Sidebar Left
		get_template_part( 'templates/sidebars/sidebar', 'left' );

		// Sidebar Right
		get_template_part( 'templates/sidebars/sidebar', 'right' );

	} 
	?>

	<!-- Blog Single Wrapper -->
	<div class="blog-single-wrap">

		<?php
		get_template_part( 'templates/single/single', 'post' );

		if ( ashe_options( 'single_page_show_author_desc' ) === true ) {
			get_template_part( 'templates/single/author', 'description' );
		}

		if ( ashe_options( 'single_page_show_author_nav' ) === true ) {
			get_template_part( 'templates/single/single', 'navigation' );
		}
	
		if ( ashe_options( 'single_page_related_orderby' ) !== 'none' ) {
			ashe_related_posts( ashe_options( 'single_page_related_title' ), ashe_options( 'single_page_related_orderby' ) );
		}

		if ( ashe_options( 'single_page_show_comments_area' ) === true ) {
			get_template_part( 'templates/single/comments', 'area' );
		}
		?>

	</div><!-- .blog-single-wrap -->

</div><!-- #page-content -->

<?php get_footer(); ?>