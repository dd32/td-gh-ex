<?php
// image template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<div class="row">
	<div class="twelve columns">
		<div id="single-page" role="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?>>
			<h1 id="post-<?php the_ID(); ?>" class="page-title">
				<?php the_title(); ?>
			</h1>
			<article class="page-content">
			<div class="byline" role="contentinfo">
				<span class="postinfo">
					<?php
						$return = get_permalink( $post->post_parent );
						_e ('Return to <a href="', 'bartleby');
						echo $return;
						_e ('"> parent page</a>', 'bartleby' );
						?>
				</span>
			</div>
			<div class="entry-content">
				<div class="entry-attachment">
					<div class="attachment">
						<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
						<?php
							echo wp_get_attachment_image( $post->ID, 'full' );
							?>
						</a>
					</div>
				<?php if ( ! empty( $post->post_excerpt ) ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
				</div>
			<?php the_content(); ?>
			<br>
			<nav id="image-navigation" class="site-navigation">
				<span class="previous-image">
					<?php previous_image_link( false, __( '<i class="icon-arrow-left"></i>', 'bartleby' ) ); ?>
				</span>
				<span class="next-image">
					<?php next_image_link( false, __( '<i class="icon-arrow-right"></i>', 'bartleby' ) ); ?>
				</span>
			</nav>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bartleby' ), 'after' => '</div>' ) ); ?>
			</div>
			</article>
			</div>
			<?php endwhile; ?>
				<section id="commentbox">
					<?php comments_template(); ?>
				</section>
			<?php else : ?>
				<h2 class="center">
					<?php _e('Nothing is Here - Page Not Found', 'bartleby'); ?>
				</h2>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but we couldn\'t find what you we\'re looking for.', 'bartleby' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>