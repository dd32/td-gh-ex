<?php get_header(); ?>
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2><?php the_title(); ?></h2>
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
						<span class="fa fa-user author" title="<?php _e('Posted by', 'bb10'); ?>">
							<?php the_author_posts_link(); ?>
						</span>
						<span class="fa fa-clock-o last-updated" title="<?php printf(__(' Last Updated %s ', 'bb10'),timeago(get_gmt_from_date(get_the_time('Y-m-d G:i:s')))); ?>">
							<?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?><?php the_modified_time('Y-m-j h:s'); ?><?php else : ?><?php the_time('Y-m-j G:i:s'); ?><?php endif; ?>
						</span>

						<?php edit_post_link( __( 'Edit', 'bb10' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->
				
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>
					
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