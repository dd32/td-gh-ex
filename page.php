<?php
// generic page template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<div class="row">
	<div class="twelve columns">
		<div class="single-page" role="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
			<?php if(!is_front_page()) { ?>
				<h1 id="post-<?php the_ID(); ?>" class="article-title">
					<?php the_title(); ?>
				</h1>
			<?php } ?>
			<section class="post-content">
				<?php the_content(); ?>
			</section>
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