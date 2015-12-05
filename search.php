<?php 
/**
 * The template for displaying search results.
 *
 * @package aesblo
 * @since 1.0.0
 */

get_header();
?>
	
<div id="content" class="site-content clearfix">
	<main id="main" class="site-main">
		<?php
			if ( have_posts() ) {
				// Header
				aesblo_archive_header();				
				
				// Loop
				while ( have_posts() ) {
					the_post();
					
					// Include the Post-Format-specific template for the content.
					get_template_part( 'template-parts/content', 'search' );
				}
				
				// Posts navigation
				aesblo_posts_pagination();				
			}
			
			else {
				// Include template part for none content.
				get_template_part( 'template-parts/content', 'none' );
			}
		?>
	</main><!-- #main -->
</div><!-- #content -->
	
<?php get_sidebar( 'secondary' ); ?>
	
<?php get_footer(); ?>