<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results for "<?php the_search_query(); ?>"</h2>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<div class="postmetadata"><?php the_time('m.d.Y') ?> | Posted in <?php the_category(', ') ?> | Author: <a href="<?php bloginfo('url'); ?>/author/"><?php the_author() ?></a> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><?php the_tags('<br />Tags: ', ', ', ''); ?></div>
			<div class="entry">
				<?php the_excerpt(); ?>
			</div>
		</div>

		<?php endwhile; ?>

  	<div class="navigation">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<?php } ?>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found. Try a different search.</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>