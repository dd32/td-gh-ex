<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="column-full">

<article class="post">
<?php the_date('','<h2 class="date">','</h2>'); ?>
<h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(''); ?></a></h3>
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

<?php comments_template(); ?>

</section>

<section id="pagenav">

<?php previous_post_link('%link'); ?> - <?php next_post_link('%link'); ?>

</section>



<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>
