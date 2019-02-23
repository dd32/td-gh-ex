<?php
get_header();
?>




<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php the_post_thumbnail('thumbnail'); ?>
<div class="meta">
<?php edit_post_link(__('Edit This', 'northern-web-coders')); ?>
</div>

<?php woocommerce_content(); ?>
<div class="commentlink">
<?php wp_link_pages(); ?>
</div>
</article>

<?php comments_template( '', true ); ?>

</div>

<?php get_sidebar('3'); ?>

<?php get_footer(); ?>
