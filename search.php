<?php 
/* COLORFUL Theme'sSearch Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	
	Since COLORFUL 1.0
*/

get_header(); ?>

	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="arc-post-title"><?php echo __('Search Results', 'd5-colorful'); ?></h1>
		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h3 class="arc-src"><span><?php echo __('Search Term:', 'd5-colorful');?> </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo __('Number of Results:', 'd5-colorful');?> </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php echo __('Entry Date: ', 'd5-colorful'); ?> <?php the_time('F j, Y'); ?></p>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php the_content('<p class="read-more">'. __('Read the rest of this page &raquo;', 'd5-colorful').'</p>'); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php echo __('Posted in', 'd5-colorful'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'd5-colorful'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'd5-colorful'), __('1 Comment &#187;', 'd5-colorful'), __('% Comments &#187;', 'd5-colorful')); ?> <?php the_tags('<br />'. __('Tags: ', 'd5-colorful'), ', ', '<br />'); ?></p>
 				</div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<div id="content">
        <h1 class="page-title"><?php _e('Not Found', 'd5-colorful'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-colorful'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo home_url(); ?>" title="<?php _e('Browse the Home Page', 'd5-colorful'); ?>">&laquo; <?php _e('Or Return to the Home Page', 'd5-colorful'); ?></a></p><br /><br />
		</div>	
	<?php endif; ?>
	
<?php get_footer(); ?>