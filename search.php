<?php 
/* 	Easy Theme's Search Page
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/
get_header(); ?>
<div id="container">
	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="page-title fa-search-plus"><?php echo __('Search Results', 'easy'); ?></h1>		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h3 class="arc-src"><span><?php echo __('Search Term:', 'easy');?> </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo __('Number of Results:', 'easy');?> </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<p class="postmetadataw"><?php echo __('Entry Date: ','easy');  the_time('F j, Y'); ?></p>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
					<div class="content-ver-sep"></div>
					<div class="entrytext">
						<?php the_post_thumbnail('thumbnail'); ?>
						<?php easy_content(); ?>
						<div class="clear"> </div>
						<div class="up-bottom-border">
							<p class="postmetadata"><?php echo __('Posted in', 'easy'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'easy'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'easy'), __('1 Comment &#187;', 'easy'), __('% Comments &#187;', 'easy')); ?> <?php the_tags('<br />'. __('Tags: ', 'easy'), ', ', '<br />'); ?></p>
						</div>
					</div>
 				</div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
        
			<h1 class="page-title"><?php echo __('Not Found', 'easy') ?></h1>
			<h3 class="arc-src"><span><?php echo __('Apologies, but the page you requested could not be found. Perhaps searching will help.', 'easy') ?></span></h3>

			<?php get_search_form(); ?>
			<p><a href="<?php echo home_url(); ?>" title="<?php echo __('Browse the Home Page','easy'); ?>">&laquo; <?php echo __('Or Return to the Home Page', 'easy') ?></a></p>

	<?php endif; ?>
	
<?php get_footer(); ?>