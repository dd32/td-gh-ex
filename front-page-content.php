<?php 
/* 	NewsPress Theme's part for showing blog or page in the front page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since NewsPress 1.0
*/

?>
<br /><div class="content-ver-sep"><br />
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php newspress_author_meta(); ?>
 		<div class="content-ver-sep"> </div>
 		<div class="entrytext"><?php the_post_thumbnail(); ?>
  		<?php $newspress_excerptlength= '90';  newspress_content(); ?>
 		<div class="clear"> </div>
 		<?php newspress_post_meta(); ?>
 		</div>
    </div><br />
 
 	<?php endwhile; newspress_page_nav(); endif; ?>
<div class="clear"></div>