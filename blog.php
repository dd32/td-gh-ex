<?php 
/* 	Template Name: Blog
	SunRain Theme's Blog Posts Showung Template
	Copyright: 2012-2013, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since sunrain 1.2.6
*/

get_header(); ?>
<div id="container">
<div id="content">

<?php
$args = array( 'post_type'=> 'post', 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) );
query_posts( $args ); 

if (have_posts()) : while (have_posts()) : the_post();?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <?php sunrain_post_date(); ?><div class="post-container">		
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <div class="content-ver-sep"> </div>
 <div class="entrytext"><?php the_post_thumbnail('thumbnail'); ?>
 <?php sunrain_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 <?php sunrain_post_meta(); ?>
 </div>
 </div></div></div><div class="clear"> </div>
 
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link('&laquo;  ' . of_get_option('pe3', 'Previous Entries') ) ?></div>
<div class="alignright"><?php next_posts_link(of_get_option('ne3', 'Next Entries') .' &raquo;') ?></div>
</div>
  
 
 <?php  else:  ?>
 
 <h1 class="arc-post-title">Sorry, we couldn't find anything that matched your search.</h1>
		
		<h3 class="arc-src"><span>You Can Try Another Search...</span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page">&laquo; Or Return to the Home Page</a></p><br />
		<h2 class="post-title-color">You can also Visit the Following. These are the Featured Contents</h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?> 
 
<?php endif; wp_reset_query(); ?>
 

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>