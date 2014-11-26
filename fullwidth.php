<?php
/*
	Template Name: Full Width
 	SPARK Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2014-2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/
?>

<?php get_header(); ?>
<div id="container">
<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 
 <?php if (!is_front_page()): ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php spark_content(); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link('Edit This Entry', '<p>', '</p>'); ?>
 <?php if (comments_open( $post->ID ) == true ): comments_template('', true); endif; ?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>