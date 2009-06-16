<?php get_header();?>
	<div id="content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php edit_post_link(); ?>
			<?php the_content(); ?>
			<div align="center"><a href="#top">Back to Top</a></div>
		</div>
		<?php comments_template(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php include ('sidebar1.php'); ?>
	<?php include ('sidebar2.php'); ?>
</div>
<?php get_footer();?>