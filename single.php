<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package App_Landing_Page
 */

get_header(); ?>
 <div class="row">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			app_landing_page_author_info_box() ;

			the_posts_pagination( array(
   			 'mid_size' => 2,
  			  'prev_text' => __( '<span class="fa fa-angle-double-left"></span>', 'app-landing-page' ),
   			 'next_text' => __( '<span class="fa fa-angle-double-right"></span>', 'app-landing-page' ),
			) ); 

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
