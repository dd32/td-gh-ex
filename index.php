<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a>  by <?php the_author() ?>  |   <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | Filed in <?php the_category(', ') ?> <?php edit_post_link('Edit'); ?>  </small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				</div>

				<p class="postmetadata"> </p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft mainnav"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright mainnav"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	 

	<?php endif; ?>

	</div>
 
<?php get_footer(); ?>