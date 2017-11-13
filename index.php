<?php 
/* Small Business Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/

get_header(); ?>
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <p class="postmetadataw"><?php _e('Posted by: ', 'small-business'); ?><?php the_author_posts_link() ?> | <?php _e(' on ', 'small-business'); ?> <?php the_time('F j, Y'); ?></p>		
 <h3 class="subtitle"><?php echo get_post_meta($post->ID, 'sb_subtitle', 'true'); ?></h3>
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php the_content('<p class="read-more">'.__('Read the rest of this page &raquo;', 'small-business').'</p>'); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 <p class="postmetadata"><?php _e('Posted in', 'small-business'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit', 'small-business'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'small-business'), __('1 Comment &#187;', 'small-business'), __('% Comments &#187;'.'small-business')); ?> <?php the_tags(__('<br />Tags: ','small-business'), ', ', '<br />'); ?></p>
 </div>
 </div></div>
 
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries','small-business')) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;','small-business'),'') ?></div>
</div>
  
 
 <?php else: ?>
 
<h1 class="arc-post-title"><?php _e('Sorry, we could not find anything that matched your search', 'small-business'); ?></h1>
		
<h1 class="page-title"><?php _e('Not Found', 'small-business'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'small-business'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('Or Return to the Home Page', 'small-business'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'small-business'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
 
<?php endif; ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>