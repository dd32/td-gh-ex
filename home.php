<?php
/**
 * The home template file.
 *
 * This is home template file is used to display blog posts
 * when Reading Settings set to 'Your latest posts'.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package BOXY
 */
global $boxy;
get_header();
if( get_theme_mod('blog-slider',false) ) { 
	get_template_part('blog-category-slider');
}
 ?>
	<div id="content" class="site-content container">

<?php if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 ) {
	   	   do_action('boxy_two_sidebar_left');
	   } ?>	
	<div id="primary" class="content-area  <?php boxy_layout_class();?> columns">
		<main id="main" class="site-main  blog-content <?php boxy_masonry_blog_layout_class();?>" role="main">

	
				
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content-blog', get_post_format() );
				?>

			<?php endwhile; ?>

		
	<?php 
		if(  get_theme_mod ('numeric_pagination',true) && function_exists( 'boxy_pagination' ) ) : 
				boxy_pagination();
			else :
				boxy_post_nav();     
			endif; 
	?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if( get_theme_mod('blog_layout',1) != 3 && get_theme_mod('blog_layout',1) != 5 ) {
	   	   do_action('boxy_two_sidebar_right');
	   } ?>	

<?php get_footer(); ?>