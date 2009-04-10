<?php get_header();?>
	<div id="content">
		<div align="center" class="post"><?php previous_post_link('&lsaquo; %link') ?> &mdash; <?php next_post_link('%link &rsaquo;') ?></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata-top"><small><?php the_date('M d Y'); ?> <?php edit_post_link(); ?></small></div>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<?php the_content('Read more &raquo;'); ?>
					<div align="center"><a href="#top">Back to Top</a></div>
					<div class="postmetadata-bottom"><small><br />Filed In: <?php the_category(', '); ?><br />Tags: <?php the_tags('', ', '); ?></small></div>
				</div>
			</div>
		</div>
		<div><?php comments_template(); ?></div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
	<?php include ('sidebar1.php'); ?>
	<?php include ('sidebar2.php'); ?>
</div>
<?php get_footer();?>