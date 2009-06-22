<?php
get_header();
?>

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_time('F jS, Y') ?> by <?php the_author() ?> <i><?php the_tags('Tags: ', ', ', '<br />'); ?></i> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', ''); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

<div class="feedback">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div>

<?php comments_template(); // Get wp-comments.php template ?>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>
		<h2>Nothing was found...</h2>
		<p>Sorry, but you are looking for something that isn't here. Maybe try searching again?</p>
	<?php endif; ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php get_footer(); ?>
