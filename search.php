<?php 
/* Socialia Theme's Search Page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>

	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="arc-post-title"><?php echo of_get_option('srslt', 'Search Results'); ?></h1>
		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h3 class="arc-src"><span><?php echo of_get_option('strm', 'Search Term'); ?>: </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo of_get_option('nosrc', 'Number of Results'); ?>: </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php echo of_get_option('edate', 'Entry Date'); ?>: <b><?php the_time('F j, Y'); ?></b></p>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php socialia_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(of_get_option ('nocomments', 'No Comments') . ' &#187;', of_get_option ('1comment', 'One Comment') . ' &#187;', '% ' . of_get_option ('comments', 'Comments') . ' &#187;'); ?> <?php the_tags('<br />' .  of_get_option ('tags', 'Tags') . ': ', ', ', '<br />'); ?></p>
 				</div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<br /><br /><h1 class="arc-post-title"><?php echo of_get_option('swcf', 'Sorry, we could not find anything that matched your search.'); ?></h1>
		
		<h3 class="arc-src"><span><?php echo of_get_option('yctas', 'You Can Try Another Search...'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>">&laquo; <?php echo of_get_option('orhp', 'Or Return to the Home Page'); ?></a></p><br />
		
	<?php endif; ?>
	
<?php get_footer(); ?>