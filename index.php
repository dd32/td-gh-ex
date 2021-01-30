<?php 
/* Easy Theme's Index Page to hsow Blog Posts
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/

get_header(); ?><div id="container">  
<div id="content">

 <?php if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 	<?php the_post_thumbnail('thumbnail');  easy_content(); ?>
 	<div class="clear"> </div>
 	<div class="up-bottom-border">
 		<p class="postmetadata"><?php echo esc_html__('Posted in', 'easy'); ?> <?php the_category(', ') ?> | <?php edit_post_link( esc_html__('Edit', 'easy'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments &#187;', 'easy'), esc_html__('1 Comment &#187;', 'easy'), esc_html__('% Comments &#187;', 'easy')); ?> <?php the_tags('<br />'. esc_html__('Tags: ', 'easy'), ', ', '<br />'); ?></p>
 	</div>
 </div></div>
 
 <?php endwhile; ?>

<div id="page-nav">
	<div class="floatleft pagenavlink postslink"><?php previous_posts_link(esc_html__('Previous Entries','easy')) ?></div>
	<div class="floatright pagenavlink postslink"><?php next_posts_link(esc_html__('Next Entries','easy')) ?></div>
</div>
  
 
 <?php else: ?>
 		<h1 class="page-title"><?php esc_html_e('Not Found', 'easy'); ?></h1>
		<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'easy'); ?></span></h3>

		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'easy'); ?>">&laquo; <?php esc_html_e('Or Return to the Home Page', 'easy'); ?></a></p>
 
<?php endif; ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>