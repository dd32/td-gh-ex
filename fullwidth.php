<?php
/*
	Template Name: Full Width
 	GREEN EYE Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/
get_header(); ?>
<div id="container">
<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post-container">
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php green_content(); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link(esc_html__('Edit This Entry','green-eye'), '<p>', '</p>'); ?>
 <?php if (green_get_option ('cpage', '' ) != '1' ): comments_template('', true); endif;?>
 <?php endwhile; endif; ?>
 


</div>
</div>
<?php get_footer(); ?>