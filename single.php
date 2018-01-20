<?php get_header(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php if ( is_sticky() ) : ?>
								<h2><i class="fa fa-hourglass-start" aria-hidden="true" title="<?php printf(__('Featured', 'bb10')) ; ?>"></i> <?php the_title(); ?></h2>
							
						<?php else : ?>
						<h2><?php the_title(); ?></h2>
						<?php endif; ?>
						<div class="date">
							<span class="month"><?php echo date( 'M' ,get_the_time( 'U' ));?> <?php the_time( 'Y' ); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
						</div>
						
					</header>
					
					<section class="hjylEntry">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<nav class="page-link"><span>' . __( 'Pages:', 'bb10' ) . '</span>', 'after' => '</nav>' ) ); ?>
					</section>
					
					<footer>
						<?php the_tags('<p class="tags"><i class="fa fa-tags"></i> ', ', ', '</p>'); ?>
						<span class="fa fa-user author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php the_author_posts_link(); ?>
						</span>
						<span class="fa fa-clock-o last-updated" title="<?php _e('Last Updated', 'bb10'); ?>">
							<?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?><?php the_modified_time('Y-m-j G:i:s'); ?><?php else : ?><?php the_time('Y-m-j G:i:s'); ?><?php endif; ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
					
				<div class="clear"></div>
					<nav id="nav-single">
						<p class="nav-previous"><?php previous_post_link( '%link', __( 'Previous: %title', 'bb10' ) ); ?></p>
						<p class="nav-next"><?php next_post_link( '%link', __( 'Next: %title', 'bb10' ) ); ?></p>
					</nav><!-- #nav-single -->

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