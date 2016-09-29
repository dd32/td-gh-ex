<?php
/*
	Template Name: Full Width
 	Socialia Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/
?>

<?php get_header(); ?>


<div id="content-full">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <?php if (!is_front_page()): ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
 <div class="entrytext">
 <?php the_content(); ?>
 <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages','d5-socialia'). ': </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link('Edit', '<p>', '</p>'); ?>
<?php if (d5socialia_get_option ('cpage', '' ) != '1' ): comments_template('', true); endif;?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>