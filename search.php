<?php 
/* Design Theme's Search Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>
<div id="container">
		<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="arc-post-title"><?php echo esc_html__('Search Results', 'd5-design'); ?></h1>
		
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				<h3 class="arc-src"><span><?php echo esc_html__('Search Term:', 'd5-design');?> </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo esc_html__('Number of Results:', 'd5-design');?> </span><?php echo $numposts; ?></h3><br /> 
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <span class="postmetadata"><h3><?php the_time('F j, Y'); ?></h3><div class="content-ver-sep"> </div><h2><?php echo esc_html__('By:', 'd5-design'); ?><?php the_author_posts_link() ?></h2><h5> <?php comments_popup_link(esc_html__('No Comments &#187;', 'd5-design'), esc_html__('1 Comment &#187;', 'd5-design'), esc_html__('% Comments &#187;', 'd5-design')); ?></h5><?php echo esc_html__('Posted in', 'd5-design'); ?> <?php the_category(', ') ?><?php the_tags('<br />'. esc_html__('Tags: ', 'd5-design'), ', ', '<br />'); ?><h5><?php edit_post_link(esc_html__('Edit This Post', 'd5-design')); ?></h5></span>	
 <div class="entrytext"><div class="thumb"><?php the_post_thumbnail(); ?></div>
 <?php the_excerpt(); ?>
 <div class="clear"> </div>
 </div></div>
 <div class="content-ver-sep"></div><br />
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
        <div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(esc_html__('&laquo; Previous Entries', 'd5-design')) ?></div>
	<div class="alignright"><?php next_posts_link(esc_html__('Next Entries &raquo;', 'd5-design')) ?></div>
	</div>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<h1 class="page-title"><?php esc_html_e('Not Found', 'd5-design'); ?></h1>
<h3 class="arc-src"><span><?php esc_html_e('Apologies, but the page you requested could not be found. Perhaps searching will help', 'd5-design'); ?></span></h3>

<?php get_search_form(); ?>
<p><a href="<?php echo esc_url(home_url()); ?>" title="<?php esc_attr_e('Browse the Home Page', 'd5-design'); ?>">&laquo; <?php esc_attr_e('Or Return to the Home Page', 'd5-design'); ?></a></p><br /><br />

<h2 class="post-title-color"><?php esc_html_e('You can also Visit the Following. These are the Featured Contents', 'd5-design'); ?></h2>
<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>
	
<?php get_footer(); ?>