<?php
/**
 *  The template for displaying the Front Page.
 *
 *  @package accountant
*/
get_header();
?>
<?php if( get_option( 'show_on_front' ) == 'page' ): ?>
	<?php
	if( is_page_template( 'page-blog.php' ) ):
		get_template_part( 'page-blog' );
	elseif( is_page_template( 'page-home.php' ) ):
		get_template_part( 'page-home' );
	else:
		get_template_part( 'page' );
	endif;
	?>
<?php else: ?>
		<section class="wide-nav">
			<div class="wrapper">
				<h1><?php _e( 'Latest posts', 'accountantlaw' ); ?></h1>
			</div><!--/div .wrapper-->
		</section><!--/section .wide-nav-->
	</header>
	<main role="main" id="content">
		<div class="wrapper cf">
			<div id="posts">
				<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a><!--/a-->
					</h3><!--/h3-->
					<div class="post-meta">
						<span>
							<?php echo get_the_date(); ?> - <?php _e('Posted by:','accountantlaw'); ?> <?php the_author_posts_link(); ?> - <?php _e('In category:','accountantlaw'); ?> <?php the_category(', '); ?> - <a href="<?php the_permalink(); ?>#comments-template" title="<?php comments_number( __('No responses','accountantlaw'), __('One comment','accountantlaw'), __('% comments','accountantlaw') ); ?>"><?php comments_number( __('No responses','accountantlaw'), __('One comment','accountantlaw'), __('% comments','accountantlaw') ); ?></a>
						</span><!--/span-->
					</div><!--/div .post-meta-->
					<?php
						if ( $feat_image != NULL ) { ?>
							<div class="post-image">
								<img src="<?php echo esc_url( $feat_image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							</div><!--/.post-image-->
						<?php } ?>
					<div class="post-excerpt">
						<?php the_content( sprintf( __( 'Continue reading%s', 'textdomain' ), '<span class="screen-reader-text">  '. get_the_title() .'</span>' ) ); ?>
					</div><!--/div .post-excerpt-->
					<a href="<?php the_permalink(); ?>" title="<?php _e('Read More','accountantlaw'); ?>" class="read-more">
						<span><?php _e('Read More','accountantlaw'); ?></span>
					</a><!--/a .read-more-->
				</div><!--/div .post-->
				<?php endwhile; else: ?>
	                <p><?php _e('Sorry, no posts matched your criteria.', 'accountantlaw'); ?></p>
	            <?php endif; ?>
				<div class="posts-navigation">
					<?php next_posts_link(esc_attr__('Prev', 'accountantlaw')); ?>
					<?php previous_posts_link(esc_attr__('Next', 'accountantlaw')); ?>
				</div><!--/div .posts-navigation-->
			</div><!--/div #posts-->
			<?php get_sidebar(); ?>
		</div><!--/div .wrapper-->
	</main><!--/#content-->
	<?php get_footer(); ?>
<?php endif; ?>