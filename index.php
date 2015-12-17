<?php 
/**
 * The main template file.
 *
 * @package aesblo
 * @since 1.0.0
 */

get_header();
?>
	
<div id="content" class="site-content clearfix">
	<main id="main" class="site-main" role="main">
		<?php
			if ( have_posts() ) {
				if ( is_home() && ! is_front_page() ) {
					printf( '<header class="page-title screen-reader-text">%s</header>', single_post_title( '', false ) );
				}
				
				// Loop
				while ( have_posts() ) {
					the_post();
					
					// Include the Post-Format-specific template for the content.
					get_template_part( 'template-parts/content', get_post_format() );
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