<?php
/**
 * Template Name: Sections
 * 
 * Description: A Page Template that displays your chosen section pages and your static frontpage, without listing your blog content.
 *
 * @package aaron
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				if( get_theme_mod('aaron_top_section1') <>"" OR get_theme_mod('aaron_top_section2') <>"" OR get_theme_mod('aaron_top_section3') <>"" ) {

					$args = array('post_type' => 'page', 'orderby' => 'post__in', 'post__in' => array(get_theme_mod('aaron_top_section1'), get_theme_mod('aaron_top_section2'), get_theme_mod('aaron_top_section3')));

	     		    query_posts($args);
					  while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					  endwhile; 
					 wp_reset_query();
				}
			?>

			<?php
				 while ( have_posts() ) : the_post();

				 	get_template_part( 'content', 'page' ); 

				 endwhile;
			?>

			<?php
				if( get_theme_mod('aaron_bottom_section1') <>"" OR get_theme_mod('aaron_bottom_section2') <>"" OR get_theme_mod('aaron_bottom_section3') <>"") {

					$args = array('post_type' => 'page', 'orderby' => 'post__in', 'post__in' => array(get_theme_mod('aaron_bottom_section1'), get_theme_mod('aaron_bottom_section2'), get_theme_mod('aaron_bottom_section3')));

	     		    query_posts($args);
					  while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

					  endwhile; 
					wp_reset_query();
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

 
<?php get_sidebar(); ?>
<?php get_footer(); ?>