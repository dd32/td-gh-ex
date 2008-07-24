<?php get_header();?>
	<div id="content">
		<div id="banner"></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="pagetitle"><?php the_title(); ?></div>
			<div><?php edit_post_link(); ?></div>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<?php the_content('Read more &raquo;'); ?>
				</div>
			</div>
		</div>
		<div><?php comments_template(); ?></div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<div id="navigationwrap">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>