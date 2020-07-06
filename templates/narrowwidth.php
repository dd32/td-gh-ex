<?php
/*
	Template Name: Narrow Width
 	Design Theme's Narrow Width Page to show the Pages Selected Narrow Width
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 2.3
*/
get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>

<div id="container">
<div id="content-narrow" class="pageitems">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="entrytext">
 <?php the_content(); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link(esc_html__('Edit This Entry','d5-design'), '<p>', '</p>'); ?>
<?php comments_template(); ?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>