<?php get_header(); ?>

	<div id="content_box">
	<div id="content_body">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<div class="h2-archive">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; category</div>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<div class="h2-archive">Posts tagged &#8216;<?php single_tag_title(); ?>&#8217;</div>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<div class="h2-archive">Archive for <?php the_time('F jS, Y'); ?></div>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<div class="h2-archive">Archive for <?php the_time('F, Y'); ?></div>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<div class="h2-archive">Archive for <?php the_time('Y'); ?></div>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<div class="h2-archive">Author Archive</div>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<div class="h2-archive">Blog Archives</div>
 	  <?php } ?>

	<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<small><?php the_time('l, F jS, Y') ?></small>
				<div class="h3-archive"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
			<div class="archive-excerpt">
	<?php if(is_category() || is_archive()) {the_excerpt();} else {the_content();} ?></div>
				</div>
<div class="hr-post-end"></div>

		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignright"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
			<div class="alignleft"><?php next_posts_link('Older Entries  &raquo;') ?></div>
		</div>
<?php include (TEMPLATEPATH . '/archive-list.php'); ?>
	<?php else : ?>

		<div class="h2-archive">Not Found</div>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<?php include (TEMPLATEPATH . '/archive-list.php'); ?>

		
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
