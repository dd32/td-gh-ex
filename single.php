<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmetadata"><?php the_time('d.m.Y') ?> | Author: <a href="<?php bloginfo('url'); ?>/author/<?php the_author_login(); ?>/"><?php the_author() ?></a> | Posted in <?php the_category(', ') ?></div>
				<div class="entry">
				  <?php the_content(); ?>
				</div>
				<?php edit_post_link('Edit', '<p>', '</p>'); ?>
			</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>