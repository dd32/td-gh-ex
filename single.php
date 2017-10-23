<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article <?php post_class('animated slideInLeft duration2'); ?> id="post-<?php the_ID(); ?>">
<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php the_post_thumbnail('thumbnail'); ?>

<div class="meta">
<?php edit_post_link(__('Edit This', 'northern-web-coders')); ?>
<ul>
<li><?php northern_the_breadcrumb(); ?></li>
<li><?php _e("Published on:", 'northern-web-coders'); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php _e("Categories:", 'northern-web-coders'); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'northern-web-coders'), ' , ' , ''); ?></li>
</ul>
</div>

<?php the_content(__('(more...)', 'northern-web-coders')); ?>

<div class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'northern-web-coders'), __('1 Comment', 'northern-web-coders'), __('% Comments', 'northern-web-coders'), '', __('Comments are closed.', 'northern-web-coders') ); ?>
</div>

</article>

<?php endwhile; endif; ?>

<?php comments_template( '', true ); ?> 
        
<div class="pagenav animated fadeIn duration3">
<span class="previous"><?php previous_post_link('%link'); ?></span> - <span class="next"><?php next_post_link('%link'); ?></span>
</div>

</div>

<?php get_sidebar(''); ?>

<?php get_footer(); ?>
