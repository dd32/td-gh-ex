<?php 
/* 	SPARK Theme's part for showing blog or page in the front page
	Copyright: 2014-2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

?>
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <?php if (!is_page()): ?><p class="postmetadataw"><?php echo __('Posted by:', 'spark'); ?> <?php the_author_posts_link() ?> | <?php echo __(' on', 'spark'); ?> <?php the_time('F j, Y'); ?></p><?php endif; ?>		
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php if (is_page()): spark_content(); else : the_excerpt();  endif;  ?>
 <div class="clear"> </div>
  <?php if (!is_page()): ?><div class="up-bottom-border">
  <p class="postmetadata"><?php echo __('Posted in', 'spark'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'spark'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'spark'), __('1 Comment &#187;', 'spark'), __('% Comments &#187;', 'spark')); ?> <?php the_tags('<br />'. __('Tags: ', 'spark'), ', ', '<br />'); ?></p>
 </div><?php endif; ?>	
 </div></div>
 
 <?php endwhile; if (!is_page()): ?>

<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'spark')) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'spark')) ?></div>
</div>
 
<?php endif; endif; ?>
 
</div>
<?php get_sidebar(); ?>
<div class="clear"></div><div class="lsep"></div>