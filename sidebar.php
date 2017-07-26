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
					$vivex_recent = new WP_Query( array(
						'posts_per_page'      => 6,
						'ignore_sticky_posts' => 1,
					) );

					if ( $vivex_recent->have_posts() ) :
						while ( $vivex_recent->have_posts() ) : $vivex_recent->the_post();
							the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</ul>
			</div>

			<div class="widget widget_calendar">
				<?php get_calendar(); ?>
			</div>

			<?php endif; ?>
		</aside><!--#sidebar-->
