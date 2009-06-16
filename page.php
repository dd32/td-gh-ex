<?php get_header();?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php edit_post_link('- Edit Page'); ?></h2>
			<?php the_content(); ?>
		</div>
		<?php comments_template(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php include ('sidebar1.php'); ?>
</div>
<?php get_footer();?>