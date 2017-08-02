<?php get_header(); ?>


<!-- Page Content -->
<div id="page-content" class="clear-fix<?php echo ( ashe_options( 'general_single_width' ) === 'boxed' ) ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( ashe_page_layout() ); ?>">

	<?php

	// Sidebar Alt 
	get_template_part( 'templates/sidebars/sidebar', 'alt' ); 

	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' );

	?>

	<!-- Main Container -->
	<div class="main-container">

		<?php

		// Single Post
		get_template_part( 'templates/single/post', 'content' );

		// Author Description
		if ( ashe_options( 'single_page_show_author_desc' ) === true ) {
			get_template_part( 'templates/single/author', 'description' );
		}

		// Single Navigation
		if ( ashe_options( 'single_page_show_author_nav' ) === true ) {
			get_template_part( 'templates/single/single', 'navigation' );
		}
	
		// Related Posts
		if ( ashe_options( 'single_page_related_orderby' ) !== 'none' ) {
			ashe_related_posts( ashe_options( 'single_page_related_title' ), ashe_options( 'single_page_related_orderby' ) );
		}

		// Comments
		if ( ashe_options( 'single_page_show_comments_area' ) === true ) {
			get_template_part( 'templates/single/comments', 'area' );
		}

		?>

	</div><!-- .main-container -->


	<?php // Sidebar Right

	get_template_part( 'templates/sidebars/sidebar', 'right' );

	?>

</div><!-- #page-content -->

<?php get_footer(); ?>