<?php 
/**
 * @package Astoned
 * Theme Archives
 */
?>

<?php get_header(); ?>
<div class="archives">
    <div class="sidebar"><?php get_sidebar();?></div>
    
    <?php if(have_posts()):?>
    <?php if (is_date() ) : ?>

    <p id="archive-choice"><?php print ('Archives for').': ' .get_the_date(); ?></p>

    <?php endif; ?>

  <?php while(have_posts()): the_post();?>
 
    <?php get_template_part('content',  get_post_format()); ?>
    
  <?php endwhile; else:?>
   <p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p> 
 <?php endif;?>
    
<?php get_footer();?>
</div>

