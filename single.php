<?php
/**
 *	The template for displaying the Single.
 *
 *	@package WordPress
 *	@subpackage AccountantLaw
 */
?>	
<?php get_header(); ?>
	<section class="wide-nav">
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>
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
			<div class="post">
				<div class="post-meta">
					<span>
						<?php echo get_the_date(); ?> - <?php _e('Posted by:','accountantlaw'); ?> <?php the_author_posts_link(); ?> - <?php _e('In category:','accountantlaw'); ?> <?php the_category(', '); ?> - <a href="#comments-template" title="<?php comments_number( __('No responses','accountantlaw'), __('One comment','accountantlaw'), __('% comments','accountantlaw') ); ?>"><?php comments_number( 'No responses', 'One comment', '% comments' ); ?></a>
					</span><!--/span-->
				</div><!--/div .post-meta-->
				<?php
					if ( $feat_image != NULL ) { ?>
						<div class="post-image">
							<img src="<?php echo $feat_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						</div><!--/div .post-image-->
					<?php } ?>
				<div class="post-excerpt">
					<?php the_content(); ?>
				</div><!--/div .post-excerpt-->
				<?php
				wp_link_pages( array(
					'before'      => '<div class="post-links"><span class="post-links-title">' . __( 'Pages:', 'accountantlaw' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
				<div class="post-tags">
					<?php the_tags('<span>Tags:</span> '); ?>
				</div><!--/div .post-tags-->
				<div class="single-navigation cf">
					<?php next_post_link('%link', 'Next Post', true); ?>
					<?php previous_post_link('%link', 'Previous Post', true); ?>
				</div><!--/div .single-navigation .cf-->
				<?php comments_template(); ?>
			</div><!--/div .post-->
			<?php endwhile; else: ?>
            	<p><?php _e('Sorry, no posts matched your criteria.', 'accountantlaw'); ?></p>
        	<?php endif; ?>
		</div><!--/div #posts-->
		<?php get_sidebar(); ?>
	</div><!--/div .wrapper-->
</main><!--/section #content-->
<?php get_footer(); ?>