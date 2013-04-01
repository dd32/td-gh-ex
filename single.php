<?php get_header();	?>

<div class="container_16 clearfix">
  
  <div class="grid_10">
    <div id="content">	  
	  
	  <?php if ( have_posts() ) : ?>
      
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php get_template_part( 'content', 'single' ); ?>
        
        <?php endwhile; ?>
      
      <?php else : ?>
                  
        <?php get_template_part( 'loop-error' ); ?>
      
      <?php endif; ?>
      
      <?php chiplife_loop_nav_singular_post(); ?>
    
    </div>
  </div>
  
  <?php get_sidebar(); ?>

</div>
  
<?php get_footer(); ?>