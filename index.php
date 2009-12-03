<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

	<!-- post -->
	<?php if(is_category() || is_day() || is_month() || is_year() || is_search() || is_tag()) { ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="post-text">
				<div class="post-title">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php edit_post_link('Edit Post', '<span class="alignright">', '</span>'); ?>
					<span class="post-date"><?php the_time('j M, Y'); ?></span>
					<span class="post-categories">in <?php the_category(', ') ?></span>
					<span class="post-author">by <?php the_author_posts_link() ?></span>
				</div>
				<?php the_excerpt(); ?>
			</div>
			<div class="post-foot">
				<?php comments_popup_link('0&nbsp;Comments', '1&nbsp;Comment', '%&nbsp;Comments','comments-link',''); ?>
				<div class="post-meta">
					<div class="post-tags"><?php the_tags('tagged ', ', ', ''); ?></div>
				</div>
			</div>
			<?php comments_template(); ?>
		</div>
		<div class="sep"></div>
	<?php } else { ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="post-text">
				<div class="post-title">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<?php edit_post_link('Edit Post', '<span class="alignright">', '</span>'); ?>
					<span class="post-date"><?php the_time('j M, Y'); ?></span>
					<span class="post-categories">in <?php the_category(', ') ?></span>
					<span class="post-author">by <?php the_author_posts_link() ?></span>
				</div>
				<?php the_content('<p><b>Continue Reading &raquo;</b></p>'); ?>
				<b><?php wp_link_pages(); ?></b>
			</div>
			<div class="post-foot">
				<?php comments_popup_link('0&nbsp;Comments', '1&nbsp;Comment', '%&nbsp;Comments','comments-link',''); ?>
				<div class="post-meta">
					<div class="post-tags"><?php the_tags('tagged ', ', ', ''); ?></div>
				</div>
			</div>
			<?php comments_template(); ?>
		</div>
		<div class="sep"></div>
	<?php } ?> 
	<!--/post -->

	<?php endwhile; ?>

<?php else : ?>

		<div class="post">
			<p><i>Nothing found.</i></p>
		</div>
		
<?php endif; ?>

<?php get_footer(); ?>