<?php get_header(); ?>

<div id="container">
<div id="content">
<div class="entry">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="archive">
<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<p class="meta_archive">

by <a href="index.php?author=<?php the_author_ID(); ?>">
      <?php the_author(); ?></a> - <?php the_time('j M Y'); ?> - posted in <?php the_category(', ') ?> - <?php comments_popup_link(__('No Comment'), __('1 Comment'), __('% Comments')); ?> - <a href="<?php the_permalink() ?>" rel="bookmark">Read the post</a>
</p>


</div>

<!--
<?php trackback_rdf(); ?>
-->
<?php comments_template(); // Get wp-comments.php template ?>


<?php endwhile; ?>

<div id="archivenavigation">
<div id="leftnav"><?php previous_post('%','','yes'); ?></div>
<div id="rightnav"><?php next_post('%','','yes'); ?></div>
</div>

 <?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>
</div>

<?php get_sidebar(); ?>
