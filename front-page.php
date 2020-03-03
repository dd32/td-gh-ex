<?php
/*
	Template Name: Front Page
	smallbusiness Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/
get_header(); ?>
      <div id="slider">
         	<div id="slideshow"><ul class="bjqs">
			<?php $sbargs = smallbusiness_ppp(); query_posts( $sbargs ); 
			if (have_posts()) : while (have_posts()) : the_post();?>
            <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-thumb'); ?><div class="post-slide"><h2><?php the_title(); ?></h2><?php  $sbExcerptLength=30; the_excerpt(); ?></div></a></li>
			<?php endwhile; endif; wp_reset_query(); ?>
            </ul></div>  
      	</div>
 
<?php
$heading = wp_kses_post(smallbusiness_get_option('heading_text', ''));
if($heading): echo '<h1 id="heading">'.$heading.'</h1>'; endif; 

get_template_part( 'featured-box' );  
?>

<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post();?><div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title();?></h2><?php the_post_thumbnail('thumbnail'); ?></a><?php if (is_page()): the_content(); else: $sbExcerptLength=60; the_excerpt(); endif; ?>
</div> 
<br /><div class="clear"> </div>
 
 <?php endwhile; ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries','small-business')) ?></div>
<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;','small-business'),'') ?></div>
</div>
 
<?php endif; ?>
 

</div>

<?php get_sidebar( 'frontpage' ); ?>
<div class="clear"> </div>

<?php
$quotetext = wp_kses_post(smallbusiness_get_option('bottom-quotation', ''));
if($quotetext): echo '<div class="content-ver-sep"></div><div id="customers-comment"><blockquote>'.$quotetext.'</blockquote></div>'; endif;

get_footer();