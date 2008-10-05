<?php get_header(); ?>

<div id="container">

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry">
<div class="title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<?php edit_post_link('Edit', ' <p> ', '</p>'); ?>
</div>

<div class="post contentpost">

<?php the_content('Continue reading ...'); ?>
</div>

<div class="metapost">
<div class="metapost_top"></div>

<ul>

<li class="date">
<?php
$arc_year = get_the_time('Y');
$arc_month = get_the_time('m');
$arc_day = get_the_time('d');
?>
<a href="<?php echo get_day_link("$arc_year", "$arc_month", 
"$arc_day"); ?>"><?php the_time('j M Y') ?></a>
</li>

<li class="author">
<a href="index.php?author=<?php the_author_ID(); ?>">
      <?php the_author(); ?>
</a>
</li>

<li class="commentlink">
<a href="#comments">Comment</a>
</li>

<li class="category">
<?php the_category(', ') ?>
</li>

<li class="tag">
<?php the_tags('Tags:',',',''); ?>
</li>

<?php if ( pings_open() ) : ?>
<li class="trackback">
<a href="<?php trackback_url() ?>" rel="trackback" title="Trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>'); ?></a>
</li>
<?php endif; ?>

<li class="postfeed">
<?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> comments')); ?>
</li>


</ul>
<div class="metapost_bottom"></div>
</div> 


<!--
<?php trackback_rdf(); ?>
-->
<?php comments_template(); // Get wp-comments.php template ?>


<?php endwhile; ?>

<div id="pagenavigation">
<div id="leftnav"><?php previous_post('%','','yes'); ?></div>
<div id="rightnav"><?php next_post('%','','yes'); ?></div>
</div>
</div>
 <?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
</div>


<?php get_sidebar(); ?>
