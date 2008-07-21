<?php get_header();?>
	<div id="content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php edit_post_link(); ?>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<?php the_content('Read the rest of this page'); ?>
				</div>
			</div>
		</div>
		<div><?php comments_template(); ?></div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div id="navigationwrap1">
		<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
	</div>
	<div id="navigationwrap2">
		<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
	</div>
</div>
<?php get_footer();?>