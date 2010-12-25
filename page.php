<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="columns">

<section class="column-full">

<article class="post">
<h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(''); ?></a></h3>
<section class="meta"><?php edit_post_link(__('Edit This')); ?></section>

<?php the_content(__('(more...)')); ?>

</article>

</section>

</section>
<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>
