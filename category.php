<?php
/**
 * @package Astoned
 */

get_header(); ?>

		
			<div class="Sample-Page">

			<?php if ( have_posts() ) : ?>
                        <?php get_sidebar(); ?>
				
					<p id="category-choice"><?php
			print( 'Category Archives').': ' .single_cat_title( '', false );
                        ?></p>

					
				</header>

			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php // twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				
					
					<?php _e( 'Nothing Found', 'astoned' ); ?>
					

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'astoned' ); ?></p>
						<?php get_search_form(); ?>
		
				</article

			<?php endif; ?>

			
	


<?php get_footer(); ?>
