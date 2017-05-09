<?php
/**
 * Template Name: Full Width Page
 *
 * Description: A custom page template for displaying a fullwidth page with no sidebar.
 *
 * @package  basepress
 */

get_header(); ?>

	<div id="primary" class="fullwidth-content-area content-area">
		<main id="main" class="site-main" role="main">
					
			<?php while (have_posts()) : the_post();

				get_template_part( 'template-parts/content', 'page' );
				
				comments_template();

			endwhile; ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>