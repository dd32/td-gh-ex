<?php
/**
 * @package WordPress
 * @subpackage EladDD
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<div class="entry">
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	<div class="meta"><div class="bottom"><div class="top">
		Poster: <?php the_author() ?>. Category: <?php the_category(',') ?>. <?php the_tags(__('Tags: '), ', '); ?>
		<div class="comments"><?php comments_popup_link(__('0 Comments'), __('1 Comments'), __('% Comments')); ?></div>
	</div></div></div>
	<a href="<?php the_permalink() ?>" class="more">Read More</a>
	<div class="date">
		<span class="d"><?php the_time('j') ?></span>
		<span class="m"><?php the_time('F') ?></span>
	</div>
</div>

<?php endwhile; ?>

<div class="navigation postnavigation">
	<div class="alignleft"><?php next_posts_link('<span>Previous</span> Page') ?></div>
	<div class="alignright"><?php previous_posts_link('<span>Next</span> Page') ?></div>
</div>

<?php endif; ?>

<?php get_footer(); ?>