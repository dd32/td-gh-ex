<?php get_header();?>
	<div id="content">
		<div class="post"><h2>Search Results for "<font color="#ffffff"><?php the_search_query(); ?></font>"</h2></div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata-top"><small><?php the_date('M d Y'); ?> <?php edit_post_link(); ?></small></div>
			<div align="center" class="entrywhole">
				<div align="left" class="entry">
					<?php the_excerpt(); ?>
					<br />
					<div align="center"><a href="#top">Back to Top</a> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
					<div class="postmetadata-bottom"><small><br />Filed In: <?php the_category(', '); ?><br />Tags: <?php the_tags('', ', '); ?></small></div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else : ?>
			<div class="post"><p>Nothing found. Try something else.</p></div>
		<?php endif; ?>
		<div align="center" id="navlink">
			<?php posts_nav_link(' &mdash; ', '&lsaquo; Previous Page', 'Next Page &rsaquo;'); ?>
		</div>
	</div>
	<?php include ('sidebar1.php'); ?>
	<?php include ('sidebar2.php'); ?>
</div>
<?php get_footer();?>