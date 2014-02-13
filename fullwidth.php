<?php
/*
	Template Name: Full Width
 	Smartia Theme's Full Width Page to show the Pages Selected Full Width
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/
?>

<?php get_header(); ?>


<div id="content-full">
<div class="pagead"><?php echo of_get_option('adcodesp', ''); ?></div>

 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <?php if (!is_front_page()): ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
 <div class="entrytext">
 <?php the_content(); ?>
 <?php wp_link_pages(array('before' => '<p><strong>' . of_get_option ('pages', 'Pages'). ': </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
 </div><div class="clear"> </div>
 <?php edit_post_link('Edit', '<p>', '</p>'); ?>
<?php comments_template('', true);?>
 <?php endwhile; endif; ?>
 



</div>
<?php get_footer(); ?>