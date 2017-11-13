<?php 
/* 	Template Name: Blog
	Small Business Theme's Blog Posts Showung Template
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/

get_header(); ?>
<div id="content">

<?php
$args = array( 'post_type'=> 'post', 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) );
query_posts( $args ); 

if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<p class="postmetadataw"><?php _e('Posted by: ', 'small-business'); ?><?php the_author_posts_link() ?> | <?php _e(' on ', 'small-business'); ?> <?php the_time('F j, Y'); ?></p> <h3 class="subtitle"><?php echo get_post_meta($post->ID, 'sb_subtitle', 'true'); ?></h3>
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php the_content('<p class="read-more">'. __('Read the rest of this page &raquo;', 'small-business').'</p>'); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 <p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></p>
 </div>
 </div></div>
 
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries','small-business')) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;','small-business'),'') ?></div>
</div>
  
 
 <?php  else:  ?>
 
 		<h1 class="arc-post-title"><?php _e('Sorry, we could not find anything that matched your search', 'small-business'); ?></h1>
		
		<h3 class="arc-src"><span><?php _e('You Can Try Another Search...', 'small-business'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page"><?php _e('&laquo; Or Return to the Home Page', 'small-business'); ?></a></p><br />
		<h2 class="post-title-color"><?php _e('You can also Visit the Following. These are the Featured Contents', 'small-business'); ?></h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?> 
 
<?php endif; wp_reset_query(); ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>