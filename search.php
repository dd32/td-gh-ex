<?php 
/* Writing Board's Search Page
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

get_header(); ?><div id="container">
	<?php if (have_posts()) : ?>
	<div id="content" class="searchinfo">
        <h1 class="page-title fa-search-plus"><?php echo esc_html__('Search Results', 'writing-board'); ?></h1>
		<?php $counter = 0; global $more; $more = 0; ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) { 
				$numposts = $wp_query->found_posts; // count # of SEARCH RESULTS ?>
				<h3 class="arc-src"><span><?php echo esc_html__('Search Term:', 'writing-board');?> </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo esc_html__('Number of Results:', 'writing-board');?> </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php echo esc_html__('Entry Date: ', 'writing-board'); ?> <?php the_time('F j, Y'); ?></p>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
<?php the_post_thumbnail('thumbnail');  writingboard_content(); ?> 
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php edit_post_link(esc_html__('Edit', 'writing-board'), '', ' | '); ?>  <?php comments_popup_link(wp_kses_post(__('No Comments &#187;', 'writing-board')), wp_kses_post(__('1 Comment &#187;', 'writing-board')), wp_kses_post(__('% Comments &#187;', 'writing-board'))); ?> <?php the_tags('<br />'. esc_html__('Tags: ', 'writing-board'), ', ', '<br />'); ?></p>
 				</div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<br /><br /><h1 class="page-title"><?php _e('Not Found', 'writing-board'); ?></h1>
<h3 class="arc-src"><span><?php _e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'writing-board'); ?></span></h3>

<?php get_search_form(); ?>
<span id="page-nav"><a class="alignleft" href="<?php echo esc_url(home_url()); ?>" ><?php _e('Or Return to the Home Page', 'writing-board'); ?></a></span></p>
<div class="clear"> </div>



	<?php endif; ?>

<?php get_footer(); ?>