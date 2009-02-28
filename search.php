<?php get_header(); ?>

	<div id="content_box">
	<div id="content_body">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				
				<div class="h2-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
				<div class="below-title"> <?php the_time('F jS, Y') ?> | <?php the_author_firstname(); ?> <?php the_author_lastname(); ?> | <?php comments_popup_link('No Comments Yet', '1 Comment', '% Comments'); ?>
				</div>
				

				<div class="entry">
					<?php the_content('<br />Read the rest of this entry &raquo;'); ?>
				</div>
<div id="tagbox">
				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
</div>				
				<div class="hr-post-end"></div>
			</div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
			<div class="alignright"><?php next_posts_link(' Older Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<?php include (TEMPLATEPATH . '/archive-list.php'); ?>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>