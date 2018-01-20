<?php get_header(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_sticky() ) : ?>
								<h2><i class="fa fa-hourglass-start" aria-hidden="true" title="<?php printf(__('Featured', 'bb10')) ; ?>"></i> <a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<?php else : ?>
						<h2><a href="<?php echo esc_url( the_permalink() ); ?>" title="<?php the_title_attribute( array( 'before' => '', 'after' => '' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php endif; ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( '70x50-right-top' ); ?>
					<?php } ?>
						<?php the_excerpt(); ?>
					</section>
					
					<footer>
						<span class="fa fa-user author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php the_author_posts_link(); ?>
						</span>
						<span class="fa fa-flag cat-links" title="<?php _e('Posted in', 'bb10'); ?>">
							<?php the_category(', '); ?>
						</span>
						<span class="fa fa-comments comments-views">
						<?php comments_popup_link( __( 'Leave a reply', 'bb10' ), __( '<b>1</b>', 'bb10' ), __( '<b>%</b>', 'bb10' ) ); ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->
				
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

				<article id="post-404" class="post no-results not-found">
					<header>
						<h1><?php _e( 'Nothing Found', 'bb10' ); ?></h1>
					</header><!-- .entry-header -->

					<section>
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'bb10' ); ?></p>
					</section><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
		</div><!--#hjylPosts-->
<?php if(!bb10_IsMobile) get_sidebar(); ?>		
<?php get_footer(); ?>