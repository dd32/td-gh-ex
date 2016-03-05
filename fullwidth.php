<?php
/*
	Template Name: Full Width
 	Writing Board's Full Width Page to show the Pages Selected Full Width
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/
?>

<?php get_header(); ?><div id="container"> 

<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?> 
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('writingboard-category-thumb'); ?>
 <?php writingboard_content(); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link(__('Edit This Entry','writing-board'), '<p>', '</p>'); ?>
 <?php if (comments_open( $post->ID ) == true ): comments_template('', true); endif; ?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>