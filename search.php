<?php get_header();?>
	<div id="content">
		<div id="banner"></div>
		<div class="pagetitle">Search Results for "<?php the_search_query(); ?>"</div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="postdate"><?php the_time('m.d.Y') ?></div>
			<div class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
			<div><small>Categories: <?php the_category(', '); ?></small></div>
			<div><?php edit_post_link(); ?></div>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<div align="left">Tags: <?php the_tags(', '); ?></div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else : ?>
			<p>Nothing found. Try something else.</p>
		<?php endif; ?>
	</div>
	<div id="navigationwrap">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>