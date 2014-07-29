<?php 
/**
 * @package Astoned
 * 
 */
?>
<html>
    <head> 

    </head>
    <body> 
<?php get_header(); ?>
       
<div class="index-page">
 
 <div class="side1"><?php get_sidebar(); ?></div>
 
 <?php if(have_posts()): ?>
    
<?php while(have_posts()): the_post();?>
  <?php get_template_part('content',  get_post_format()); ?>
   
  <?php endwhile; else:?>
<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
<?php endif;?>
    
<?php paging_nav();?>

<?php get_footer(); ?>
    </body>
</html>