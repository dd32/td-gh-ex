<?php
get_header();
?>

<div id="columns">

<div class="column-left">
<?php if (have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<?php $post_counter++; if($post_counter == 4) : ?>
</div>

<div class="column-right">
<?php endif; ?>
<div class="post">
<?php the_date('','<h2>','</h2>'); ?>
<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="meta"><?php _e("Filed under:"); ?> <?php the_category(',') ?> <?php the_tags(__('Tags:&nbsp;'), ' , ' , ''); ?>  <?php edit_post_link(__('Edit This')); ?></div>
<?php the_content(__('(more...)')); ?>
<?php wp_link_pages(); ?>
<div class="comment"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></div>
</div>
<?php endwhile; ?>
<?php else : ?>
<div class="post" style="width: 500px"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
<?php endif; ?>
</div>
</div>
<?php comments_template(); // Get wp-comments.php template ?>
<div style="clear: both"><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></div>
<?php get_footer(); ?>