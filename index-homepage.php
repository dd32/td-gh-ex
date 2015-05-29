<?php
/**
 * Homepage index file.
 *
 * @package Bakery

 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */
			$i = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
					bakery_post_box();
					
					if ($i>=3) {
						$i = 0;
						echo '<div class="clear"></div>';
					}
					$i++;
				?>
				
			<?php endwhile; ?>
            
			<div class="clear"></div>
            
			<?php bakery_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php //get_footer(); ?>
