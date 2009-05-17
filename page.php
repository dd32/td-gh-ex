<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post page" id="post_<?php the_ID(); ?>">
	 <h3 class="storytitle"><?php the_title(); ?></h3>
	<div class="story_content">
		<?php the_content(__('Read more...','artsavius')); ?>
	</div>
	<?php wp_link_pages(); ?>
	<?php edit_post_link(__('Edit This','artsavius')); ?>
	<?php the_tags('<div id="tags">',' ','</div>'); ?>

</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.','artsavius'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
