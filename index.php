<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AeonBlog
 */

get_header();
?>
	<div id="primary" class="col-md-8 col-sm-8">
		<div id="main" class="content-area">
			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				/**
	             * aeonblog_post_navigation hook
	             * @since AeonBlog 1.0.0
	             *
	             * @hooked aeonblog_posts_navigation -  10
	             */
	            do_action( 'aeonblog_action_navigation');

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
