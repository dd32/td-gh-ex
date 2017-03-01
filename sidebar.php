		</div><!--#content-->


		<aside id="sidebar">
			<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>

			<?php else: ?>

			<div class="widget">
				<?php get_search_form(); ?>
			</div>

			<div class="widget">
				<h3><?php _e( 'Recent Posts', 'arix' ) ?></h3>
				<ul>
					<?php
					$arix_recent = new WP_Query( 'posts_per_page=5' ); ?>
					
					<?php if ( $arix_recent->have_posts() ) : ?>

					<?php while ( $arix_recent->have_posts() ) : $arix_recent->the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php else : endif; ?>
				</ul>
			</div>

			<div class="widget widget_calendar">
				<?php get_calendar(); ?>
			</div>

			<?php endif; ?>

		</aside><!--#sidebar-->
