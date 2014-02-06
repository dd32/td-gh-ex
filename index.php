<?php 
/* 	Socialia Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <?php echo  of_get_option ('postedby', 'Posted by'); ?>: <b><?php the_author_posts_link() ?></b> | <?php echo  of_get_option ('postedon', 'Posted on'); ?>: <b><?php the_time('F j, Y'); ?></b>
 <div class="entrytext"><?php the_post_thumbnail(); ?>
 <?php socialia_content(); ?>
 <div class="clear"> </div>
 <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . of_get_option ('pages', 'Pages'). ': </span>', 'after' => '</div>' ) ); ?>
 <div class="postmetadata"><?php echo  of_get_option ('postedin', 'Posted in'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(of_get_option ('nocomments', 'No Comments') . ' &#187;', of_get_option ('1comment', 'One Comment') . ' &#187;', '% ' . of_get_option ('comments', 'Comments') . ' &#187;'); ?> <?php the_tags('<br />' .  of_get_option ('tags', 'Tags') . ': ', ', ', '<br />'); ?></div>
 </div></div>
 <div class="content-ver-sep"></div><br />
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link('&laquo;  ' . of_get_option('pe3', 'Previous Entries') ) ?></div>
<div class="alignright"><?php next_posts_link(of_get_option('ne3', 'Next Entries') .' &raquo;') ?></div>
</div>
  
 
 <?php else: ?>
 
 <h1 class="arc-post-title"><?php echo of_get_option('swcf', 'Sorry, we could not find anything that matched your search.'); ?></h1>
		
		<h3 class="arc-src"><span><?php echo of_get_option('yctas', 'You Can Try Another Search...'); ?></span></h3>
		<?php get_search_form(); ?><br />
		<p><a href="<?php echo home_url(); ?>">&laquo; <?php echo of_get_option('orhp', 'Or Return to the Home Page'); ?></a></p><br />
		 
<?php endif; ?>
 
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>