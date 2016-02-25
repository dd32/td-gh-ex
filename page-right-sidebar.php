<?php
/**
 * Template Name: Right sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

get_header();
?>
	<div class="page-wrapper clear">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 col-12">
					<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-12 col-lg-4 col-12">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div><!-- #primary -->
	</div><!-- #primary -->
<?php
get_footer();