<?php 
/* 	Socialia Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <?php echo  d5socialia_get_option ('postedby', 'Posted by'); ?>: <b><?php the_author_posts_link() ?></b> | <?php echo  d5socialia_get_option ('postedon', 'Posted on'); ?>: <b><?php the_time('F j, Y'); ?></b>
 <div class="entrytext"><?php the_post_thumbnail(); ?>
 <?php d5socialia_content(); ?>
 <div class="clear"> </div>
 <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . d5socialia_get_option ('pages', 'Pages'). ': </span>', 'after' => '</div>' ) ); ?>
 <div class="postmetadata"><?php _e('Posted in','d5-socialia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit','d5-socialia'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments','d5-socialia') . ' &#187;', __('One Comment','d5-socialia') . ' &#187;', '% ' . __('Comments','d5-socialia') . ' &#187;'); ?> <?php the_tags('<br />' .  __('Tags','d5-socialia') . ': ', ', ', '<br />'); ?></div>
 </div></div>
 <div class="content-ver-sep"></div><br />
 <?php endwhile; ?>

	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link('&laquo;  ' . __('Previous Entries','d5-socialia') ) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries','d5-socialia') .' &raquo;') ?></div>
	</div>
  
 
 <?php else: ?>
 
		<h1 class="arc-post-title"><?php  _e('Sorry, we could not find anything that matched your search.','d5-socialia'); ?></h1>
		
		<h3 class="arc-src"><span><?php _e('You Can Try Another Search...','d5-socialia'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'd5-socialia'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'd5-socialia'); ?></a></p><br /><br />
		 
<?php endif; ?>
 
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>