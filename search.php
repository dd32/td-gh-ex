<?php get_header(); ?>

	<div id="content">
<div class="content-inside">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="left">
	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<div class="postmetadata">
				<?php the_tags( '<p style="border-top:none;">Tags: ', ', ', '</p>'); ?>
                 <p>Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                </div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<span class="back"></span><span class="backnext">Older Entries</span>')?></div>
			<div class="alignright"><?php previous_posts_link('<span class="next"></span><span class="backnext">Newer Entries</span>')?></div>
		</div>

	<?php else : ?>

		<h2 class="pagetitle">No posts found. Try a different search?</h2>
		<div class="search-content"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>

	<?php endif; ?>
    </td>
    <td class="right"><?php get_sidebar(); ?></td>
  </tr>
</table>

	
	



</div>

	</div>



<?php get_footer(); ?>
