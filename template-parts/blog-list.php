<?php global $axiohost; ?>
<?php do_action( 'axiohost_full_column' ); ?>
  <?php       
      if(have_posts()){
           while(have_posts()) : the_post();?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-wow-duration="1s">
                       <?php
                              if(has_post_thumbnail()){?>
                                  <div class="blog-img">
                                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
                                       <div class="blog-calender">
                                          <div class="calender-day"><?php the_time('d'); ?></div>
                                          <div class="calender-month"><?php the_time('M'); ?></div>
                                         </div>
                                    </div>
                                <?php
                            }
                       ?>
                        
                        <div class="blog-content">
                            <?php 
                    
                                if(!empty(get_the_title())){?>
                                    <h4 class="heading-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php
                                }
                            ?>
                           
                    	   	<ul class="recent-meta list-inline">
                    			<li class="list-inline-item"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>
                    			<li class="list-inline-item"><i class="fa fa-comment"></i><?php comments_number(esc_html__('0 Comments', 'axiohost'), esc_html__('1 Comment','axiohost'),'%'.esc_html__(' Comments', 'axiohost')); ?></li>
                    		 </ul>
                          
                                <p>
                                    <?php 
                                         if(class_exists('ReduxFrameworkPlugin')){
                                             $axiohost_limit = $axiohost['except_limit'];
                                         }
                                         else{
                                              $axiohost_limit = 30;   
                                         }
                                         if(has_excerpt()){
                                             the_excerpt();
                                         }
                                         else{
                                            echo esc_html(axiohost_excerpt($axiohost_limit)); 
                                         }
                                     ?>
                                </p>
                           
                           <a class="blog-readmore-btn2" href="<?php the_permalink(); ?>"><?php if(class_exists('redux')){echo esc_html($axiohost['reade_more_label']);}else{ esc_html_e('Read More', 'axiohost'); } ?></a>
                        </div>
                     </article>
          <?php endwhile;
      }
      
  ?>
 
 <?php get_template_part('template-parts/post-pagination', 'pagination'); ?>
 
</div>
<?php get_sidebar(); ?>