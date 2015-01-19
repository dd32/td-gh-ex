<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php //gridalicious_content_nav( 'nav-below' ); ?>

		<?php 
			/** 
			 * gridalicious_comment_section hook
			 *
			 * @hooked gridalicious_get_comment_section - 10
			 */
			do_action( 'gridalicious_comment_section' ); 
		?>
	<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>