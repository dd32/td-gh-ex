<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time(get_option('date_format')); ?> <!-- by <?php the_author() ?> --> |  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | Filed in <?php the_category(', ') ?> <?php edit_post_link('Edit'); ?>  </small>
 
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft mainnav"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright mainnav"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>