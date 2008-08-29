<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }

	 if (have_posts()) : while (have_posts()) : the_post(); ?>

	
<div class="post home" id="post-<?php the_ID(); ?>">

	<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
	<p class="date"><?php the_time(__('F jS, Y','basic2col')); ?></p>
	
	<div class="postcontent">
		<?php the_content(''. the_title('', '', false) .' '.__('continued &raquo;','basic2col').'' ); ?>
	</div>
	
	
	<p class="postmeta">
		<?php _e('Filed in','basic2col'); ?> <?php the_category(',') ?>

		<?php basic2col_tags_front(); ?>		

		<?php if(comments_open() || pings_open()) : ?>
			- <a href="<?php comments_link(); ?>" title="<?php _e('Comments to','basic2col'); ?> <?php the_title(); ?>">
			<?php comments_number('0','1','%'); ?> <?php _e('Comments','basic2col'); ?></a>
		<?php else : ?>
			- <?php _e('Comments closed','basic2col'); ?>
		<?php endif; ?>
		
	
		<?php edit_post_link(__('Edit','basic2col'),' - ',''); ?>
	</p>

</div>



<?php endwhile; else :

	echo basic2col_404_message();

endif; ?>



<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); } ?>
