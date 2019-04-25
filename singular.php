<?php
/**
 * The template for displaying all pages, single posts and attachments
 *
 * This is a new template file that WordPress introduced in
 * version 4.3. Note that it uses conditional logic to display
 * different content based on the post type.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */


get_header();
// Start the loop.
while ( have_posts() ) : the_post();
	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
<?php		the_post_thumbnail();
			if ( is_singular( 'page' ) ):
				get_template_part('template-parts/headers/header', 'page');
			else:
				get_template_part('template-parts/headers/header', 'post');
			endif;
?>
		</div><!-- .page-thumbnail -->
<?php
	endif; ?>

<main id="main" role="main">
	<div id="main-content" >
<?php
	// Include the page content template.
	if ( is_singular( 'page' ) ):
		get_template_part( 'template-parts/content', 'page' );
	else:
		get_template_part( 'template-parts/content', 'single' );
	endif;

// End of the loop.
endwhile; ?>

	</div><!--/main-content-->
<?php get_sidebar( 'sidebar' ); ?>  
<?php get_footer(); ?>
