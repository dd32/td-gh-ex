<?php
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="columns">
<div class="column-full">
<div class="post">
<h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(''); ?></a></h3>
<div class="meta"><?php edit_post_link(__('Edit This')); ?></div>
<div class="storycontent">
<?php the_content(__('(more...)')); ?>
</div>

<!--
<?php trackback_rdf(); ?>
-->
</div>
</div>
</div>
<?php endwhile; else: ?>

<?php endif; ?>
<div style="margin: 10px 0 10px 0"><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></div>
<?php get_footer(); ?>
