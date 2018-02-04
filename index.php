<?php get_header(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part( 'inc/loop', get_post_format() ); ?>
				
				<?php endwhile; ?>
					
					<nav class="hjylNav">
						<?php
							if(function_exists('wp_page_numbers')) {
								wp_page_numbers();
							}
							elseif(function_exists('wp_pagenavi')) {
								wp_pagenavi();
							} else {
								global $wp_query;
								$total_pages = $wp_query->max_num_pages;
								if ( $total_pages > 1 ) {
										posts_nav_link(' | ', __('&laquo; Previous page','bb10'), __('Next page &raquo;','bb10'));
								}
							}
						?>
					</nav>

			<?php else : ?>

				<?php get_template_part( 'inc/loop', 'none' ); ?>

			<?php endif; ?>
		</div><!--#hjylPosts-->
<?php if(!bb10_IsMobile) get_sidebar(); ?>		
<?php get_footer(); ?>