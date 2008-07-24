<?php get_header();?>
	<div id="content">
		<h2>Search Results for "<?php the_search_query(); ?>"</h2>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<div align="center" class="entrywhole">
				<div class="postmetadata-top">
					<div align="left"><small>Posted on <?php the_time('F j, Y') ?> <?php edit_post_link(); ?></small></div>
				</div>
				<div class="postmetadata-bottom" align="left">
					Tags: <?php the_tags(''); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else : ?>
			<p>Nothing found. Try something else.</p>
		<?php endif; ?>
		<div align="center"><?php posts_nav_link(); ?></div>
	</div>
	<div id="navigationwrap1">
		<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
	</div>
	<div id="navigationwrap2">
		<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
	</div>
</div>
<?php get_footer();?>