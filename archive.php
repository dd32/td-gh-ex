<?php get_header(); ?>

<div id="container">
<div id="content">
<div class="entry">
<?php if(is_category()) {?>
<h4>Archive for the <?php single_cat_title(); ?> category</h4>

<?php } elseif( is_tag() ) { ?>
<h4>Archive for the <?php single_tag_title(); ?> tag</h4>
<?php } elseif(is_month()) { ?>
<h4>Archive for <?php the_time('j M Y'); ?></h4>
<?php } elseif(is_day()) { ?>
<h4>Archive for <?php the_time('j M Y'); ?></h4>
<?php } ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="archive">
<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<p class="meta_archive">

by <a href="index.php?author=<?php the_author_ID(); ?>">
      <?php the_author(); ?></a> - <?php the_time('j M Y'); ?> - posted in <?php the_category(', ') ?> - 
<?php if (get_the_tags()) the_tags('Tags: ', ', ', ' -'); ?>  <?php comments_popup_link(__('No Comment'), __('1 Comment'), __('% Comments')); ?> - <a href="<?php the_permalink() ?>" rel="bookmark">Read the post</a>
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
