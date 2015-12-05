<?php 
/**
 * The single post template file.
 *
 * @package aesblo
 * @since 1.0.0
 */

get_header();
?>
<div id="content" class="site-content clearfix">
	<main id="main" class="site-main">
		<?php 
			// Loop
			while ( have_posts() ) {
				the_post();
				
				// Include the Post-Format-specific template for the content.
				get_template_part( 'template-parts/content', get_post_format() );				
				
				// load the comments template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;				
				}
				
				// Post navigation
				aesblo_post_navigation();				
		?>
	</main><!-- #main -->
</div><!-- #content -->
	
<?php get_sidebar( 'secondary' ); ?>
	
<?php get_footer(); ?>