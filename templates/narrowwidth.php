<?php
/*
	Template Name: Narrow Width
 	NewsPress Theme's Narrow Width Page to show the Pages Selected Narrow Width
	Copyright: 2014-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since NewsPress 2.3
*/
?>

<?php get_header(); ?>
<div id="content-narrow" class="pageitems">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 
 <h1 id="post-<?php the_ID(); ?>" class="page-title"><?php the_title();?></h1>
 <div class="content-ver-sep"> </div>
 <div class="entrytext">
 <?php the_post_thumbnail('single-page'); ?>
 <?php newspress_content(); ?>
 <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' .  __('Pages:','newspress-lite') . '</span>', 'after' => '</div>' ) ); ?><br />
 </div><div class="clear"> </div>
 <?php edit_post_link('', '<p>', '</p>'); ?>
 <?php comments_template(); ?>
 <?php endwhile; endif; ?>
 
</div>
<?php get_footer(); ?>