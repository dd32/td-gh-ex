     <?php global $safreen;?>
  
  
  
  
  <div class="lay1 wow fadeInup">
  
  
  
  <?php if(is_front_page()) { 
      $args = array(
                     
                     'post_type' => 'post',
                     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                     
                     );
      
     new WP_Query( $args ); 
     
  } ?>
  
  
          
   <?php wp_reset_postdata(); ?>
  
  
         
                     <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                  <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                               </div>
                               
   
     
     
     
                
  
                    <div class="matchhe large-3 medium-6 columns  ">
              
                  <div class="post_image">
                       <!--CALL TO POST IMAGE-->
                             
                       <?php  if ( get_the_post_thumbnail() != '' ) {
						        
								 echo '<div class=" imgwrap">';
    
                                 echo '<a href="';esc_url( the_permalink()); echo '" >';
                                 the_post_thumbnail();
                                 echo '</a>';
                                 echo '</div>';
                                 } else {
    
                                echo '<div class=" imgwrap">';
                                echo '<a href="'; esc_url( the_permalink()); echo '">';
     							echo '<img src="';
     							echo catch_that_image();
     							echo '" alt="" />';
     							echo '</a>';
    							echo '</div>';
    					};?>
        
       
                     </div>
                  
                  
                  <div class=" post_content2">
                 <div class=" post_content3">
                      
                      <?php the_title( sprintf( '<h2 class="postitle_lay"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                       
                      <?php safreen_excerpt('safreen_excerptlength_teaser', 'safreen_excerptmore'); ?> 
                      
                  </div> </div>
   
                          </div>
              <?php endwhile ?> 
  
              <?php endif ?>
          <?php get_template_part('pagination'); ?>  
  </div>
              
                    
       