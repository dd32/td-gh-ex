<?php
/**
 * Template Name: Left Sidebar
 *
 * Description: A custom page template for displaying a page with left sidebar.
 *
 * @package  basepress
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="page-content clearfix">
					
				<?php while (have_posts()) : the_post();

					get_template_part( 'template-parts/content', 'page' );
					
					comments_template();

				endwhile; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();