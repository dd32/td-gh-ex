<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AeonBlog
 */

get_header();
?>
	<section class="text-left">
	    <div class="container">
	    	<div class="search-title-box">
				<?php if ( have_posts() ) : ?>
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'aeonblog' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>
		</div>
	</section>

	<div id="primary" class="col-md-12 col-sm-12">
		<div class="content-area">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
get_footer();
