<section class="primary-slider col-sm-8" role="slider">			
				
				<div class="slider swipe">

				<?php query_posts('post_type=post&posts_per_page='.get_sub_field('posts_to_show').'&cat='.get_sub_field('filter_by_categories'));?>

				<?php if(have_posts()): ?>

				<?php while(have_posts()):the_post(); ?>

					<div class="h-entry">

						<div class="image">
							<a href="<?php the_permalink(); ?>" class="u-photo">
								<?php the_post_thumbnail(); ?>
							</a>
						</div> <!-- end image -->

						<div class="slider-title-wrap">
							
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>" class="u-url"><?php the_title(); ?></a>
							</h3>
							
						</div> <!-- end slider-title-wrap -->

						<div class="p-category">
							<?php the_category() ?>
						</div> <!-- end p-category -->
					</div> <!-- end h-entry -->

				<?php endwhile; ?>

				<?php endif; ?>

				<?php wp_reset_query(); ?>

				</div> <!-- end slider swipe -->		
			
</section>