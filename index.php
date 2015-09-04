<?php
/**
 * The main template file.
 * @package BBird Under
 */

get_header(); ?>

	<div id="primary" class="content-area large-8 columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'template-parts/content', get_post_format() );
				?>
                    
                    

			<?php endwhile; ?>
                    
                    
                     <?php if(function_exists('wp_pagenavi')) {  ?>  
<?php wp_pagenavi();?>  
<?php } else { ?>  
 <?php  the_posts_navigation(); ?>  
<?php } ?>

			

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
