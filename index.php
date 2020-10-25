<?php 
/* 	SPARK Theme's Index Page to hsow Blog Posts
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

get_header(); ?>
<div id="container">
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <p class="postmetadataw"><?php echo __('Posted by:', 'spark'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p>
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php spark_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
<p class="postmetadata"><?php echo __('Posted in', 'spark'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'spark'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'spark'), __('1 Comment &#187;', 'spark'), __('% Comments &#187;', 'spark')); ?> <?php the_tags('<br />'. __('Tags: ', 'spark'), ', ', '<br />'); ?></p>
 </div>
 </div></div>
 
 <?php endwhile; ?>

	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link('&laquo; '. __('Newer Entries', 'spark')) ?></div>
	<div class="alignright"><?php next_posts_link( __('Older Entries','spark').'  &raquo;','') ?></div>
	</div>
  
 
 <?php else: ?>
 
 	<h1 class="page-title"><?php echo __('Not Found', 'spark') ?></h1>
	<h3 class="arc-src"><span><?php echo __('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'spark') ?></span></h3>

	<?php get_search_form(); ?>
	<p><a href="<?php echo esc_url(home_url()); ?>" title="Browse the Home Page">&laquo; <?php echo __('Or Return to the Home Page', 'spark') ?></a></p><br /><br />

	<h2 class="post-title-color"><?php echo __('You can also Visit the Following. These are the Featured Contents', 'spark') ?></h2>
	<div class="content-ver-sep"></div><br />
	<?php get_template_part( 'featured-box' ); ?>
 
<?php endif; ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>