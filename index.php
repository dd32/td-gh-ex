<?php
get_header();
?>

<?php $i =(''); ?>

<section class="column-left">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) == 0) : $wp_query->next_post(); else : the_post(); ?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<?php the_date('','<h2 class="date">','</h2>'); ?>
<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php
if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<section class="meta">
<?php edit_post_link(__('Edit This')); ?>
<ul>
<li><?php printf(_e("Publish on:")); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php printf(_e("Categories:")); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;'), ' , ' , ''); ?></li> 
</ul>
</section>
<?php the_content(__('(more...)')); ?>
<section class="comment">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('Comments are closed.') ); ?>
</section>
</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>

<?php $i = 0; rewind_posts(); ?>

<section class="column-right">
<?php if (have_posts()) : while(have_posts()) : $i++; if(($i % 2) !== 0) : $wp_query->next_post(); else : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<?php the_date('','<h2 class="date">','</h2>'); ?>
<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php
if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
the_post_thumbnail();
}
?>
<section class="meta">
<?php edit_post_link(__('Edit This')); ?>
<ul>
<li><?php printf(_e("Publish on:")); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php printf(_e("Categories:")); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;'), ' , ' , ''); ?></li> 
</ul>
</section>
<?php the_content(__('(more...)')); ?>
<section class="comment">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('Comments are closed.') ); ?>
</section>
</article>

<?php endif; endwhile; else: ?>
<?php endif; ?>
</section>

<?php comments_template(); ?>

<section id="pagenav">
<?php posts_nav_link(' - ') ?>
</section>

<?php get_footer(); ?>