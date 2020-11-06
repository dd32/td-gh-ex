<?php 
/* Writing Board's Index Page to hsow Blog Posts
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

get_header(); ?><div id="container">  

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail');  writingboard_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 <p class="postmetadata"><?php edit_post_link(esc_html__('Edit', 'writing-board'), '', ' | '); ?>  <?php comments_popup_link(wp_kses_post(__('No Comments &#187;', 'writing-board')), wp_kses_post(__('1 Comment &#187;', 'writing-board')), wp_kses_post(__('% Comments &#187;', 'writing-board'))); ?> <?php the_tags('<br />'. esc_html__('Tags: ', 'writing-board'), ', ', '<br />'); ?></p>
 </div>
 </div></div>
 
 <?php endwhile; ?>

<div id="page-nav">
			<div class="alignleft"><?php previous_posts_link('<span class="fa-arrow-left"></span> '.esc_html__('NEWER ENTRIES', 'writing-board') ) ?></div>
			<div class="alignright"><?php next_posts_link(esc_html__('OLDER ENTRIES', 'writing-board').' <span class="fa-arrow-right"></span>') ?></div>
		</div>
  
 
 <?php else: ?>
 
 <h1 class="page-title"><?php _e('Not Found', 'writing-board'); ?></h1>
 <h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'writing-board'); ?></span></h3>

<?php get_search_form(); ?>
<span id="page-nav"><a class="alignleft" href="<?php echo esc_url(home_url()); ?>" ><?php _e('Or Return to the Home Page', 'writing-board'); ?></a></span></p>
<div class="clear"> </div>


 
<?php endif; ?>
 
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>