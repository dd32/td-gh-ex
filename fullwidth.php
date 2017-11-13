<?php
/*
	Template Name: Full Width
 	smallbusiness Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/
get_header(); ?>
<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('category-thumb'); ?>
 <?php the_content('<p class="read-more">'.__('Read the rest of this page &raquo;', 'small-business').'</p>'); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link(__('Edit This Entry','small-business'), '<p>', '</p>'); ?>
 <?php comments_template( '', true ); ?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>