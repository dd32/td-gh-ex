<?php get_header();?>
	<div id="content">
		<div id="banner"></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="postdate"><?php the_time('m.d.Y') ?> <small><?php edit_post_link(); ?></small></div>
			<div class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
			<div><small><?php the_category(', '); ?></small></div>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<?php the_content('Read more &raquo;'); ?>
					<div align="right"><div align="center" class="postmetadatabottom"><small><?php comments_popup_link('Add a Comment', '1 Comment', '% Comments'); ?></small></div></div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div align="center" id="navlink"><?php posts_nav_link(); ?></div>
	</div>
	<div id="navigationwrap">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>