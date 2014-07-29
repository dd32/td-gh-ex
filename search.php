<?php 
/**
 * @package Astoned
 */
?>

<?php get_header();?>

<div class="search_part">
    <div class="side1"><?php get_sidebar();?></div>
     
        <p id="search-topic"><?php print('Your search results'). ': ' .get_search_query();?></p>
        
            <?php if(have_posts()): ?>
<?php while(have_posts()): the_post();?>
  <?php get_template_part('content',  get_post_format()); ?>
    
  <?php endwhile; else:?>
<p><?php _e('Sorry, no search matched your criteria.','Astoned'); ?></p>
<?php endif;?>

 <?php get_footer();?>
</div>