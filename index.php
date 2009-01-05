

<?php get_header(); ?>


<div id="content">


<?php get_sidebar(); ?>


<div id="posts">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div class="post">
<div class="titull"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>

<div class="meta">Posted by <?php the_author_posts_link() ?> under <?php the_category(',') ?> 
on <?php the_date('F j Y'); ?>, 
<a href="<?php comments_link(); ?>"><?php comments_number('0 comments','1 comment','% comments'); ?></a>
<?php edit_post_link(__('-Edit-')); ?>
</div>


<?php if(is_single()|| is_page()) {
     the_content();
 } else {
     the_excerpt();
 } ?> 	

  
<?php if(is_single()){?>
<p class="tags"><strong>Tags:</strong> <?php the_tags('')?></p>
<?php } ?>
 
</div><!-- end of a post -->


<?php if(is_single()){?>
<div class="comments">
<?php comments_template(); // Get wp-comments.php template ?>
</div>
<?php } ?>



<?php endwhile; else: ?>
<h2 align="center"> <?php _e('Not Found!'); ?></h2>
<?php endif; ?>


<div class="navigation">
<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div>

</div>







<?php get_footer(); ?>
