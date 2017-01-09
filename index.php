<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );

get_header(); ?>

<div class="inner flex-container">
	<div id="main-content">
	<?php
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				* Include the post format-specific template for the content. If you want to
				* use this in a child theme, then include a file called called content-___.php
				* (where ___ is the post format) and that will be used instead.
				*/
				if ( 'posts' == get_option( 'show_on_front' ) ):
					get_template_part( 'template-parts/content', get_post_format() );
				elseif ( 'page' == get_option( 'show_on_front' ) && ! has_post_format( array('audio', 'video') ) ):
					get_template_part( 'template-parts/content', get_post_format() );
				endif;
			// End the Loop.
			endwhile;

		// Previous/next page navigation.
		bassist_blog_navigation();

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content', 'none' );

		endif;
	?>

	</div><!--/main-content-->

	<?php get_sidebar(); ?>    

</div><!--/inner-->
<?php get_footer(); ?>

