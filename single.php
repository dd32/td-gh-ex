<?php
// single posts template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<div class="row">
	<div class="twelve columns">
		<div class="single-article" role="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 id="post-<?php the_ID(); ?>" class="article-title">
				<?php the_title(); ?>
				</h1>
			<div class="byline" role="contentinfo">
				<span class="postinfo">
					<?php esc_attr_e('By ' , 'bartleby' ); ?>
					<?php the_author_posts_link(); ?>&nbsp;&ndash;
					<?php esc_attr_e('Published: ' , 'bartleby' ); ?>
					<?php the_time('m/d/Y'); ?>&nbsp;&ndash;
					<?php esc_attr_e('Category: ' , 'bartleby' ); ?>
					<?php the_category(', ') ?>
				</span>
			</div>
			<div class="post-content">
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="singlethumb">
					<?php $img_id = get_post_thumbnail_id($post->ID);
						the_post_thumbnail(); ?>
					<?php $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true); ?>
				</div>
				<?php } ?>
				<?php the_content(); ?>
				<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
				<hr>
				<footer class="post-footer">
					<p class="tag-links">
						<?php the_tags(); ?>
					</p>
					<div class="article-nav">
						<?php previous_post_link('%link', '<i class="icon-arrow-left"></i>&nbsp;%title');
							echo ' | ';
								next_post_link('%link', '%title&nbsp;<i class="icon-arrow-right"></i>');
								?>
					</div>
					<hr>
					<?php do_action( 'before_widget' ); ?>
					<?php if ( !dynamic_sidebar( 'belowposts-sidebar' ) ) : ?>
					<?php endif; ?>
				</footer>
			</div>
			</article>
			<?php endwhile; ?>
			<?php comments_template(); ?>
			<?php else : ?>
			<h2 class="center">
				<?php esc_attr_e('Nothing is Here - Page Not Found', 'bartleby'); ?>
			</h2>
			<div class="entry-content">
				<p><?php esc_attr_e( 'Sorry, but we couldn\'t find what you we\'re looking for.', 'bartleby' ); ?></p>
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>