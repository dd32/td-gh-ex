<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bfastmag
 */

get_header(); ?>

		<div id="primary" class="content-area">
			 
		<div  class="bfastmag-content-left col-md-9">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
								// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="post-navi" aria-hidden="true">' . __( 'NEXT POST', 'bfastmag' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'bfastmag' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="post-navi" aria-hidden="true">' . __( 'PREVIOUS POST', 'bfastmag' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'bfastmag' ) . '</span> ' .
					'<span class="post-title">%title</span>',

			) );


						// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- .bfastmag-content-left -->
		</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
