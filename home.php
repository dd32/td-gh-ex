<?php get_header(); ?>

<div id="container">
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry">
<div class="title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<?php edit_post_link('Edit', ' <p> ', '</p>'); ?>
</div>

<div class="post excerpt">

<?php the_excerpt(); ?>
</div>

<div class="metapost">
<div class="metapost_top"></div>

<ul>
<li class="date"><?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
$arc_day = get_the_time('d');
?>
<a href="<?php echo get_day_link("$arc_year", "$arc_month", 
"$arc_day"); ?>"><?php the_time('j M Y') ?></a></li>

<li class="author">
<a href="index.php?author=<?php the_author_ID(); ?>">
      <?php the_author(); ?>
</a>
</li>

<li class="commentlink">
<?php comments_popup_link(__('No Comment'), __('1 Comment'), __('% Comments')); ?>
</li>

<li class="category">
<?php the_category(', ') ?>
</li>

<?php if (get_the_tags()) the_tags('<li class="tag">Tags: ', ',', '</li>'); ?> 

<li class="more">
<a href="<?php the_permalink() ?>" rel="bookmark">Continue</a>
</li>

</ul>
<div class="metapost_bottom"></div>
</div> 


<!--
<?php trackback_rdf(); ?>
-->
<?php comments_template(); // Get wp-comments.php template ?>


</div>

<?php endwhile; ?>
<div class="entry">

<div id="pagenavigation">
<div id="leftnav"><?php previous_posts_link('Previous post') ?></div>
<div id="rightnav"><?php next_posts_link('Next post') ?></div>
</div>
</div>

<?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

