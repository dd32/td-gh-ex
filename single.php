<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post_<?php the_ID(); ?>">
	 <h3 class="storytitle"><?php the_title(); ?></h3>
	<div id="meta"><div class="date"><?php the_time('d.m.Y') ?></div><div class="time"><?php the_time('H:i') ?></div><?php if(function_exists('the_views')) { ?><div class="views"><?php the_views(); ?></div><?php } ?><div class="comments"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></div></div>
<div id="category"><?php the_category(' ') ?></div>
	<div class="story_content">
		<?php the_content(__('Read more...','artsavius')); ?>
	</div>
	<?php wp_link_pages(); ?>
	<?php edit_post_link(__('Edit This','artsavius')); ?>
	<?php the_tags('<div id="tags">',' ','</div>'); ?>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.','artsavius'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
