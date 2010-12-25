<?php
get_header();
?>

<section id="columns">

<section class="column-left">
<?php if (have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<?php $post_counter++; if($post_counter == 5) : ?>
</section>

<section class="column-right">
<?php endif; ?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

<?php the_date('','<h2 class="date">','</h2>'); ?>

<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

<section class="meta">
<?php printf(__('Posted in %s', 'nwc'), get_the_category_list(', ')); ?><br />
<?php the_tags(__('Tags:&nbsp;'), ' , ' , ''); ?>  
<?php edit_post_link(__('Edit This')); ?>
</section>

<?php the_content(__('(more...)')); ?>

<section class="comment">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('Comments are closed.') ); ?>
</section>

</article>

<?php endwhile; ?>
<?php else : ?>

<article class="post">
<?php _e('Sorry, no posts matched your criteria.'); ?>
</article>

<?php endif; ?>

</section>
</section>

<?php comments_template(); ?>

<section id="pagenav">
<?php posts_nav_link() ?>
</section>

<?php get_footer(); ?>