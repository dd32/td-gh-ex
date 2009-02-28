<?php get_header(); ?>

<div id="content_box">
<div id="content_body">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<div class="h2-title"><?php the_title(); ?></div>
			<div class="entry">
					<?php the_content('<br />Read the rest of this entry &raquo;'); ?>
			</div>

			<?php wp_link_pages('before=<div id="pagination"><b>Continue reading: </b>&after=</div>&next_or_number=number'); ?>
		</div>
		<?php edit_post_link('Edit this entry', '<p>', '</p>'); ?>
		<?php endwhile; else: ?>
<center><p>Sorry. The page that you are looking for doesn't exist.</p></center>
<?php include (TEMPLATEPATH . '/archive-list.php'); ?>
<?php endif; ?>
	
		
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>