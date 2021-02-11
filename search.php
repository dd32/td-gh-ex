<?php 
/* Smartia Theme's Search Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

get_header(); ?>

	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="arc-post-title"><?php esc_html_e('Search Results','d5-smartia'); ?></h1>
		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h3 class="arc-src"><span><?php esc_html_e('Search Term','d5-smartia'); ?>: </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php esc_html_e('Number of Results','d5-smartia'); ?>: </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php esc_html_e('Entry Date','d5-smartia'); ?>: <b><?php the_time('F j, Y'); ?></b></p>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php d5smartia_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php esc_html_e('Posted in','d5-smartia'); ?> <?php the_category(', ') ?> | <?php edit_post_link(esc_html__('Edit','d5-smartia'), '', ' | '); ?>  <?php comments_popup_link(esc_html__('No Comments','d5-smartia') . ' &#187;', esc_html__('One Comment','d5-smartia') . ' &#187;', '% ' . esc_html__('Comments','d5-smartia') . ' &#187;'); ?> <?php the_tags('<br />' .  esc_html__('Tags','d5-smartia') . ': ', ', ', '<br />'); ?></p>
 				</div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<br /><br /><h1 class="arc-post-title"><?php  esc_html_e('Sorry, we could not find anything that matched your search.','d5-smartia'); ?></h1>
		
		<h3 class="arc-src"><span><?php esc_html_e('You Can Try Another Search...','d5-smartia'); ?></span></h3>
		<?php get_search_form(); ?>
		p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'd5-smartia'); ?>">&laquo; <?php esc_html_e('Or Return to the Home Page', 'd5-smartia'); ?></a></p><br /><br />
		
	<?php endif; ?>
	
<?php get_footer(); ?>