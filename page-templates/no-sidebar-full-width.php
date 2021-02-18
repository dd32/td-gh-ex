<?php
/**
 * Template Name: Full Width, No Sidebar
 *
 * Description: This template can be used as blog posts page when using a static front page if a blog page without sidebars is preferred.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

get_header(); ?>

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
			get_template_part( 'template-parts/content', 'page' );

		endwhile;

	// Previous/next page navigation.
	the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'aguafuerte' ),
		'next_text'          => __( 'Next page', 'aguafuerte' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
	) );

		if ( comments_open() || get_comments_number() ):
			comments_template();
		endif;

	else :
		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>		
</div><!--/main-content-->    
<?php get_footer(); ?>

