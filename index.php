<?php 
/* Design Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>

<div id="container">
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <span class="postmetadata"><h3><?php the_time('F j, Y'); ?></h3><div class="content-ver-sep"> </div><h2><?php echo __('By:', 'd5-design'); ?><?php the_author_posts_link() ?></h2><h5> <?php comments_popup_link(__('No Comments &#187;', 'd5-design'), __('1 Comment &#187;', 'd5-design'), __('% Comments &#187;', 'd5-design')); ?></h5><?php echo __('Posted in', 'd5-design'); ?> <?php the_category(', ') ?><?php the_tags('<br />'. __('Tags: ', 'd5-design'), ', ', '<br />'); ?><h5><?php edit_post_link(__('Edit This Post', 'd5-design')); ?></h5></span>	
 <div class="entrytext"><div class="thumb"><?php the_post_thumbnail(); ?></div>
 <?php design_content(); ?>
 <div class="clear"> </div>
 </div></div>
 <div class="content-ver-sep"></div><br />
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'd5-design')) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'd5-design')) ?></div>
</div>
  
 
 <?php else: ?>
<h1 class="page-title"><?php _e('Not Found', 'd5-design'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-design'); ?></span></h3>		<?php get_search_form(); ?><br />
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php _e('You can also Visit the Following. These are the Featured Contents', 'd5-design'); ?></a></p><br />
		 
<?php endif; ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>