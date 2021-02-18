<?php
/**
 * Template Name: Both Sidebar Full
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

get_header();
?>
	<div class="page-wrapper clear">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php get_sidebar('left'); ?>
				</div>
				<div class="col-md-6">
					<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-3">
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</div><!-- #primary -->
	</div><!-- #primary -->
<?php
get_footer();