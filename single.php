<?php
/**
 * The Template for displaying all single posts.
 *
 * @package beam
 */

get_header(); ?>

	<div id="content" class="site-content">
		<div class="site-content-inner">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php 
				while ( have_posts() ) : the_post();
					do_action( 'beam_before_content_single' );
					get_template_part( 'template-parts/content', 'single' );
					do_action( 'beam_after_content_single' ); 
					
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					
					do_action( 'beam_before_content_nav' ); 
					beam_content_nav( 'nav-below' );
					do_action( 'beam_after_content_nav' ); 

				endwhile; // end of the loop. 
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php 
get_sidebar(); 
get_footer();