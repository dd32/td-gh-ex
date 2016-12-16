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
 * @package Bassist
 * @since Bassist 1.0.0
 */

get_header(); ?>

<div class="inner flex-container" >
	<div id="main-content" >
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			if ( is_singular( 'page' ) ) {
				get_template_part( 'template-parts/content', 'page' );
			} else {
				get_template_part( 'template-parts/content', 'single' );
			}
		// End of the loop.
		endwhile;
		?>

	</div><!--/main-content-->
<?php get_sidebar(); ?>  
</div><!--/inner-->
<?php get_footer(); ?>
