<?php 
/* 	GREEN EYE Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/

get_header(); ?>
<div id="container">
<div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="post-container">
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <p class="postmetadataw"><?php esc_html_e('Posted by:', 'green-eye'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p>	
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php green_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__('Pages:','green-eye') . '</span>', 'after' => '</div><br/>' ) ); ?>
 <p class="postmetadata"><?php esc_html_e('Posted in', 'green-eye'); ?> <?php the_category(', ') ?> | <?php edit_post_link(esc_html__('Edit', 'green-eye'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments &#187;', 'green-eye'), esc_html__('1 Comment &#187;', 'green-eye'), esc_html__('% Comments &#187;'.'green-eye')); ?> <?php the_tags(esc_html__('Tags: ','green-eye'), ', ', ' '); ?></p>
 </div>
 </div></div>
 </div>
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(esc_html__('&laquo; Previous Entries','green-eye')) ?></div>
<div class="alignright"><?php next_posts_link(esc_html__('Next Entries &raquo;','green-eye'),'') ?></div>
</div>
  
 
 <?php else: ?>
 
 		<h1 class="page-title"><?php esc_html_e('Not Found', 'green-eye'); ?></h1>
		<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'green-eye'); ?></span></h3>

		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'green-eye'); ?>">&laquo; <?php esc_html_e('Or Return to the Home Page', 'green-eye'); ?></a></p><br /><br />

		<h2 class="post-title-color"><?php esc_html_e('You can also Visit the Following. These are the Featured Contents', 'green-eye'); ?></h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?>
 
<?php endif; ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>