<?php 
/* 	SPARK Theme's Archive Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

get_header(); ?>
<div id="container">
<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="arc-post-title"><?php single_cat_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by category', 'spark') ?></h3>
		<?php if(trim(category_description()) != "<br />" && trim(category_description()) != '') { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<?php }?>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="arc-post-title"><?php single_tag_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by tag', 'spark') ?></h3>
		<div class="clear">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('l, F jS, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by day', 'spark') ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('F, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by month', 'spark') ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by year', 'spark') ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="arc-post-title"><?php echo __('Archives', 'spark') ?></h1><h3 class="arc-src"><?php echo __('now browsing by author', 'spark') ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="arc-post-title"><?php echo __('Archives', 'spark') ?></h1><h3 class="arc-src"><?php echo __('now browsing the general archives', 'spark') ?></h3>
 	 	<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<p class="postmetadataw"><?php echo __('Posted by:', 'spark'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php spark_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php echo __('Posted in', 'spark'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'spark'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'spark'), __('1 Comment &#187;', 'spark'), __('% Comments &#187;', 'spark')); ?> <?php the_tags('<br />'. __('Tags: ', 'spark'), ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link('&laquo; '. __('Newer Entries', 'spark')) ?></div>
	<div class="alignright"><?php next_posts_link( __('Older Entries','spark').'  &raquo;','') ?></div>
	</div>

	<?php else : ?>

	<h1 class="page-title"><?php echo __('Not Found', 'spark') ?></h1>
	<h3 class="arc-src"><span><?php echo __('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'spark') ?></span></h3>

	<?php get_search_form(); ?>
	<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php echo __('Or Return to the Home Page', 'spark') ?></a></p><br /><br />

	<h2 class="post-title-color"><?php echo __('You can also Visit the Following. These are the Featured Contents', 'spark') ?></h2>
	<div class="content-ver-sep"></div><br />
	<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
