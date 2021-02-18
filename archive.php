<?php 
/* 	Socialia Theme's Archive Page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/

get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="arc-post-title"><?php single_cat_title(); ?></h1><h3 class="arc-src"><?php echo of_get_option('arc1', 'now browsing by category'); ?></h3>
		<?php if(trim(category_description()) != "<br />" && trim(category_description()) != '') { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<?php }?>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="arc-post-title"><?php single_tag_title(); ?></h1><h3 class="arc-src"><?php echo of_get_option('arc2', 'now browsing by tag'); ?></h3>
		<div class="clear">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('l, F jS, Y'); ?></h1><h3 class="arc-src"><?php echo of_get_option('arc3', 'now browsing by day'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('F, Y'); ?></h1><h3 class="arc-src"><?php echo of_get_option('arc4', 'now browsing by month'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="arc-post-title"><?php echo get_the_date('Y'); ?></h1><h3 class="arc-src"><?php echo of_get_option('arc5', 'now browsing by year'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php echo of_get_option('arc6', 'now browsing by author'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="arc-post-title">Archives</h1><h3 class="arc-src"><?php echo of_get_option('arc7', 'now browsing the general archives'); ?></h3>
 	 	<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<?php echo  of_get_option ('postedby', 'Posted by'); ?>: <b><?php the_author_posts_link() ?></b> | <?php echo  of_get_option ('postedon', 'Posted on'); ?>: <b><?php the_time('F j, Y'); ?></b>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"> </div>	
				<div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
  <?php socialia_content(); ?>
				</div>
				<div class="clear"> </div>
                <div class="up-bottom-border">
				<p class="postmetadata"><?php echo  of_get_option ('postedin', 'Posted in'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(of_get_option ('nocomments', 'No Comments') . ' &#187;', of_get_option ('1comment', 'One Comment') . ' &#187;', '% ' . of_get_option ('comments', 'Comments') . ' &#187;'); ?> <?php the_tags('<br />' .  of_get_option ('tags', 'Tags') . ': ', ', ', '<br />'); ?></p>
				</div>
            
		                
                </div><!--close post class-->
	
		<?php endwhile; ?>
			
	<div id="page-nav">
	<div class="alignleft"><?php previous_posts_link('&laquo;  ' . of_get_option('pe3', 'Previous Entries') ) ?></div>
	<div class="alignright"><?php next_posts_link(of_get_option('ne3', 'Next Entries') .' &raquo;') ?></div>
	</div>

	<?php else : ?>

		<h1 class="arc-post-title"><?php echo of_get_option('swcf', 'Sorry, we could not find anything that matched your search.'); ?></h1>
		
		<h3 class="arc-src"><span><?php echo of_get_option('yctas', 'You Can Try Another Search...'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; <?php echo of_get_option('orhp', 'Or Return to the Home Page'); ?></a></p><br />
		<h2 class="post-title-color"><?php echo of_get_option('ycvffc', 'You can also Visit the Following. These are the Featured Contents'); ?></h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

