<?php 
/* 	Easy Theme's Archive Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/

get_header(); ?>
<div id="container" class="arc-page">
<div id="content">
	<?php if (have_posts()) :
		$post = $posts[0]; ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<div class="description"><?php echo the_archive_description(); ?></div>
		<div class="clear"></div>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post-container">
			<div <?php post_class(); ?>>
				<p class="postmetadataw"><?php echo esc_html__('Posted by:', 'easy'); ?> <?php the_author_posts_link() ?> | <?php echo esc_html__(' on', 'easy'); ?> <?php the_time('F j, Y'); ?></p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php easy_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php echo esc_html__('Posted in', 'easy'); ?> <?php the_category(', ') ?> | <?php edit_post_link( esc_html__('Edit', 'easy'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments &#187;', 'easy'), esc_html__('1 Comment &#187;', 'easy'), esc_html__('% Comments &#187;', 'easy')); ?> <?php the_tags('<br />'. esc_html__('Tags: ', 'easy'), ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
                </div>
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(esc_html__('&laquo; Previous Entries', 'easy')) ?></div>
	<div class="alignright"><?php next_posts_link(esc_html__('Next Entries &raquo;', 'easy')) ?></div>
	</div>

	<?php else : ?>

		<h1 class="page-title"><?php _e('Not Found', 'easy'); ?></h1>
		<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'easy'); ?></span></h3>

		<?php get_search_form(); ?>
		<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php _e('Browse the Home Page', 'easy'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'easy'); ?></a></p>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
