<?php
/**
 * Template Name: Right Sidebar
 * Template Post Type: post
 *
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AeonBlog
 */
get_header();
?>	
	<div class="breadcrumb">
		<div class="container">
			<?php do_action('aeonblog_breadcrumb_hook'); ?>
		</div>
	</div>
	<div id="primary" class="col-md-8 col-sm-8">
		
		<div class="content-area">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
