<?php 
/* 	Design Theme's Archive Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>

<div id="container">

<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<div class="description"><?php echo the_archive_description(); ?></div>
		<div class="clear">&nbsp;</div>		
		<div class="clear"></div>


		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <span class="postmetadata"><h3><?php the_time('F j, Y'); ?></h3><div class="content-ver-sep"> </div><h2><?php echo esc_html__('By:', 'd5-design'); ?><?php the_author_posts_link() ?></h2><h5> <?php comments_popup_link(esc_html__('No Comments &#187;', 'd5-design'), esc_html__('1 Comment &#187;', 'd5-design'), esc_html__('% Comments &#187;', 'd5-design')); ?></h5><?php echo esc_html__('Posted in', 'd5-design'); ?> <?php the_category(', ') ?><?php the_tags('<br />'. esc_html__('Tags: ', 'd5-design'), ', ', '<br />'); ?><h5><?php edit_post_link(esc_html__('Edit This Post', 'd5-design')); ?></h5></span>	
 <div class="entrytext"><div class="thumb"><?php the_post_thumbnail(); ?></div>
 <?php the_excerpt(); ?>
 <div class="clear"> </div>
 </div></div>
 <div class="content-ver-sep"></div><br />
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(esc_html__('&laquo; Previous Entries', 'd5-design')) ?></div>
	<div class="alignright"><?php next_posts_link(esc_html__('Next Entries &raquo;', 'd5-design')) ?></div>
	</div>

	<?php else : ?>
	
	<h1 class="page-title"><?php esc_html_e('Not Found', 'd5-design'); ?></h1>
<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-design'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'd5-design'); ?>">&laquo; <?php esc_html_e('Or Return to the Home Page', 'd5-design'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php esc_html_e('You can also Visit the Following. These are the Featured Contents', 'd5-design'); ?></h2>
<div class="content-ver-sep"></div><br />
<?php get_template_part( 'featured-box' ); ?>
	
	
	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
