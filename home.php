<?php
get_header();
?>

<?php $i =(''); ?>

<section class="column-left">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">                                          
<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php the_post_thumbnail('thumbnail'); ?>

<div class="meta">
<?php edit_post_link(__('Edit This', 'northern')); ?>  
<ul>
<li><?php _e("Published on:", 'northern'); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php _e("Categories:", 'northern'); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'northern'), ' , ' , ''); ?></li>
</ul>
</div>

<?php the_content(__('(more...)', 'northern')); ?>

<div class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'northern'), __('1 Comment', 'northern'), __('% Comments', 'northern'), '', __('Comments are closed.', 'northern') ); ?>
</div>

</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>

<?php $i = 0; rewind_posts(); ?>

<section class="column-right">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php the_post_thumbnail('thumbnail'); ?>

<div class="meta">
<?php edit_post_link(__('Edit This', 'northern')); ?>
<ul>
<li><?php _e("Published on:", 'northern'); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php _e("Categories:", 'northern'); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'northern'), ' , ' , ''); ?></li>
</ul>
</div>

<?php the_content(__('(more...)', 'northern')); ?>

<div class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'northern'), __('1 Comment', 'northern'), __('% Comments', 'northern'), '', __('Comments are closed.', 'northern') ); ?>
</div>

</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>



<section class="pagenav">
<?php northern_pagenavi() ?>
</section>

<?php comments_template( '', true ); ?>

</section>

<?php get_sidebar(''); ?>
<?php get_sidebar('2'); ?>
<?php get_sidebar('3'); ?>
<?php get_sidebar('4'); ?>

<?php get_footer(); ?>