<?php get_header();?>
	<div id="content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div align="center" class="entrywhole">
				<div class="postmetadata-top">
					<div align="left"><small>Categories: <?php the_category(', '); ?><br />Posted on <?php the_time('F j, Y') ?> <?php edit_post_link(); ?></small></div>
				</div>
				<div align="left" class="entry">
					<?php the_content('Read more &raquo;'); ?>
				</div>
				<div class="postmetadata-bottom" align="left">
					Tags: <?php the_tags('',' / '); ?>
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