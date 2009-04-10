<?php get_header();?>
	<div id="content">
		<div class="post">
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2>Archive for the "<font color="#ffffff"><?php single_cat_title(); ?></font>" Category</h2>
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2>Posts Tagged "<font color="#ffffff"><?php single_tag_title(); ?></font>"</h2>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2>Archive for "<font color="#ffffff"><span class="uppercase"><?php the_time('M d Y'); ?></span></font>"</h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for "<font color="#ffffff"><span class="uppercase"><?php the_time('M Y'); ?></span></font>"</h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2>Archive for "<font color="#ffffff"><?php the_time('Y'); ?></font>"</h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2>Author Archive</h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2>Blog Archives</h2>
			<?php } ?>
		</div>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="postmetadata-top"><small><?php the_date('M d Y'); ?> <?php edit_post_link(); ?></small></div>
			<div class="entrywhole">
				<div class="entry">
					<?php $post = $posts[0]; ?>
					<?php if (is_category()) { ?>
						<?php the_excerpt(); ?>
					<?php } elseif( is_tag() ) { ?>
						<?php the_excerpt(); ?>
					<?php } elseif (is_day()) { ?>
						<?php the_content('Read More &rsaquo;'); ?>
					<?php } elseif (is_month()) { ?>
						<?php the_excerpt(); ?>
					<?php } elseif (is_year()) { ?>
						<?php the_excerpt(); ?>
					<?php } elseif (is_author()) { ?>
						<?php the_excerpt(); ?>
					<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<?php the_excerpt(); ?>
					<?php } ?>
					<br />
					<div align="center"><a href="#top">Back to Top</a> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
					<div class="postmetadata-bottom"><small><br />Filed In: <?php the_category(', '); ?><br />Tags: <?php the_tags('', ', '); ?></small></div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div align="center" id="navlink">
			<?php posts_nav_link(' &mdash; ', '&lsaquo; Previous Page', 'Next Page &rsaquo;'); ?>
		</div>
	</div>
	<?php include ('sidebar1.php'); ?>
	<?php include ('sidebar2.php'); ?>
</div>
<?php get_footer();?>