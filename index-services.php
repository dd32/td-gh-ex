<div class="blog_left">
				
                <div class="testimonial_mn">
				<h2><?php _e("Services",'appointment'); ?><br><span><?php _e("We are a group of passionate designers & developers"); ?></span></h2>	
                
                              
	                
                        <div class="sliderkit-panel">
                         <?php $arg = array( 'post_type' => 'services','paged' => $paged );
						  
						                 $loop = new WP_Query( $arg );
								       $max_num_pages=$loop->max_num_pages;
											//$current = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                              ?>
                            <div class="testimonial_mn_cols">
                               	<?php $defalt_arg =array('class' => "fleft" )?>
                                 <?php if(has_post_thumbnail()):?>
	                               <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_post_thumbnail('', $defalt_arg); ?></a>
                                 <?php endif;?>
                          
                          
                                 <div>
                                   <?php the_excerpt(); ?>
                                      
                                   <a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>"><?php the_title(); ?></a>


                                 </div>
                                                        
                            </div><!--  testimonial_mn_cols-->
      
                               <?php if(wp_link_pages(array('echo'=>0))):?>
                                        <div class="pagination_blog"><ul class="page-numbers"><?php 
                                         $args=array('before' => '<li>'.__('Pages:'),'after' => '</li>');
                                         wp_link_pages($args); ?></ul></div>
                                         <?php endif;?>                    
                            <?php endwhile;?>

	
     				
      
                  </div><!-- closing of the sliderkit-panel-->				
	              
                  </div> <!-- closing of the testimonial_mn--> 
				  <?php       // post pagination
				  //global $wp_query;
 $args = array(
	'base'         => add_query_arg( 'paged', '%#%' ),
	'format'       => '',
	'total'        =>  $max_num_pages,
	'current'      => 0,
	'show_all'     => true,
	'end_size'     => 1,
	'mid_size'     => 1,
	'prev_next'    => True,
	//'prev_text'    => __('« Previous'),
	//'next_text'    => __('Next »'),
	'type'         => 'list',
	'add_args'     => False,
	'add_fragment' => ''
); ?>
         <?php if($max_num_pages != 1 ):?>
        <div class="pagination_blog"><?php _e("Scroll More Posts:",'appointment');?><?php echo paginate_links( $args ) ?> </div>
           <?php endif;?>   </div><!-- closing of the blog_left-->
		
           
            