<?php
get_header();
?>

<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

<div id="topper"><?php the_time('F jS, Y') ?></div>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		

<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<div id="postinfo">by <?php the_author() ?> | Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> | <?php the_tags('Tags:<i> ', ', '); ?></i>
</div>
			</div>

		<?php endwhile; ?>
<br><br>
		<div class="navigation">
			<?php next_posts_link('&laquo; Older Entries') ?>   <?php previous_posts_link('Newer Entries &raquo;') ?>
		</div>
<br><br><br>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>


<?php get_footer(); ?>

