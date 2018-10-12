<?php
	/**
	* Template Name: Page - Right Sidebar
	*
	* @package anorya
	*/

	get_header(); ?>	


	<main class="container main-content-container">
		
		<div class="row">
		
			<div class="col-md-8 col-sm-7">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div>
			
			<?php get_sidebar(); ?>			
			
		</div>
	</main>	
	
	<?php get_footer(); ?>