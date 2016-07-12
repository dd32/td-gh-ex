<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package aaron
 */

get_header();
aaron_jetpack_featured_posts();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		/* The front page sections should not display on the blog listing page. */
		if ( is_front_page() && is_home() ) {
			if ( get_theme_mod( 'aaron_top_section1' ) || get_theme_mod( 'aaron_top_section2' ) || get_theme_mod( 'aaron_top_section3' ) ) {
				$args = array(
					'post_type' => 'page',
					'orderby' => 'post__in',
					'post__in' => array(
						get_theme_mod( 'aaron_top_section1' ),
						get_theme_mod( 'aaron_top_section2' ),
						get_theme_mod( 'aaron_top_section3' ),
					),
				);

				$top_section_query = new WP_Query( $args );

		     	if ( $top_section_query->have_posts() ) {
		     		while ( $top_section_query->have_posts() ) : $top_section_query->the_post();
						get_template_part( 'content', 'page' );
					endwhile;
					wp_reset_postdata();
				}
			}
		}

		/* This is the end of our top page section. Now lets show the latest posts: */
		if ( have_posts() ) : ?>
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<?php

		/*
		* We have finished printing the latest posts. Check if there are bottom section pages to show:
		* The front page sections should not display on the blog listing page.
		*/
		if ( is_front_page() && is_home() ) {
			if ( get_theme_mod( 'aaron_bottom_section1' ) or get_theme_mod( 'aaron_bottom_section2' ) or get_theme_mod( 'aaron_bottom_section3' ) ) {

				$args = array(
					'post_type' => 'page',
					'orderby' => 'post__in',
					'post__in' => array(
						get_theme_mod( 'aaron_bottom_section1' ),
						get_theme_mod( 'aaron_bottom_section2' ),
						get_theme_mod( 'aaron_bottom_section3' ),
						),
				);

	     		$bottom_section_query = new WP_Query( $args );

	     		if ( $bottom_section_query->have_posts() ) {
		     		while ( $bottom_section_query->have_posts() ) : $bottom_section_query->the_post();
						get_template_part( 'content', 'page' );
					endwhile;
					wp_reset_postdata();
				}
			}
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
