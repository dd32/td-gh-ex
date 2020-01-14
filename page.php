<?php get_header(); ?>
	<!-- BEGIN PAGE -->
	<div id="page">
<?php do_action('promax_below_navigation'); ?>
    <div id="page-inner" class="clearfix">
		<div id="pagecont"><?php promax_breadcrumbs(); ?>
		
		<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->									
		</div> <!-- end div #content -->
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
