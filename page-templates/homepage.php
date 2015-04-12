<?php
/* Template Name: Homepage */
$avocation_options = get_option('avocation_theme_options');
?>
<?php get_header();?>

          <!--==============================Section start=================================-->
        <section>
			
            <!--Slider Start-->
             
		<?php $avocation_i = 0;  ?>
		<?php for ($avocation_loop = 1; $avocation_loop <= 5; $avocation_loop++): ?>
		<?php if (!empty($avocation_options['slider-img-' . $avocation_loop])) { ?>
		<?php if($avocation_i == 0) { ?>
            <div class="carousel slide banner" id="owl-demo" data-ride="carousel" data-interval="3000">                 
                <div class="carousel-inner">
					<?php 
				$avocation_sliderclass = "active";
				}else {
               $avocation_sliderclass = "";
               }  ?>			
				<?php if (!empty($avocation_options['slider-img-' . $avocation_loop])) {
				$avocation_image = getimagesize($avocation_options['slider-img-' . $avocation_loop]); ?>	
				<div class="item <?php echo $avocation_sliderclass; ?> ">                    
                     <?php if (!empty($avocation_options['slider-img-' . $avocation_loop])) { ?>
					<img src="<?php echo esc_url($avocation_options['slider-img-' . $avocation_loop]); ?>"  width="<?php echo $avocation_image[0]; ?>" height="<?php echo $avocation_image[1]; ?>" alt="<?php echo $avocation_loop; ?>"> 
                        <span class="mask-overlay"></span>
                        <?php if (!empty($avocation_options['slidercontent-' . $avocation_loop])) { ?>
                        <div class="carousel-caption">
                            <h3><?php echo esc_attr($avocation_options['slider-title-' . $avocation_loop]); ?></h3>
                            <p><?php echo esc_attr($avocation_options['slidercontent-' . $avocation_loop]); ?></p>
                            
                            <div class="link">
								<?php if(!empty($avocation_options['remove-slider-url-'.$avocation_loop])){
								$remove_slider = "";} else { $remove_slider= "target"; } ?>
								<a class="theme-btn" href="<?php echo esc_url($avocation_options['home-button-link-'.$avocation_loop]);?>" target="<?php echo $remove_slider;?>"><?php echo esc_attr($avocation_options['home-button-title-'.$avocation_loop]);?></a></div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    
                    <?php $avocation_i++; }  
						}  endfor?>
					<?php  if($avocation_loop >= $avocation_i && $avocation_i > 0) { ?>				
					</div>
					<?php } ?>

                     <!-- Controls --> 
					<?php if ($avocation_i >= 2) { ?>	
						<a class="carousel-control left" data-slide="prev" href="#owl-demo">
								<i class="fa fa-chevron-left "></i>
							</a>
							<a class="carousel-control right" data-slide="next" href="#owl-demo">
								<i class="fa fa-chevron-right"></i> 
							</a>
					<?php } ?>
					<?php  if($avocation_loop >= $avocation_i && $avocation_i > 0) { ?>
						</div>
					</div>
					<?php  } ?>
						 
            <!--Slider End-->   

            <div id="myId" class="avocation-container  container">
                <!--About-Us Start-->
                <div class="title-box about-us">
					<?php if(!empty($avocation_options['home-title'])){?>
                    <h2 class="content-heading"> <?php echo esc_attr($avocation_options['home-title']);?></h2>
                    <p class="description"><?php echo wpautop($avocation_options['homedesc']);?></p>
					<?php }?>
                </div>
                <!--About-Us End-->   

                <!--Features Start-->
                <div class="features-wrap">
					 <?php for($avocation_l = 1; $avocation_l <= 4; $avocation_l++):
                if (!empty($avocation_options['section-icon-' . $avocation_l])):
                    ?>
                    <div class="col-md-3 col-sm-6  feature-box">
                        <div class="feature-icon">
                            <span class="circle-rotate spin"></span>
                            <?php if(!empty($avocation_options['remove-url-'.$avocation_l])){
								$remove = "";} else { $remove= "target"; } ?>
                            <a href="<?php echo esc_url($avocation_options['sectionurl-'.$avocation_l]);?>" target="<?php echo $remove; ?>"><i class="<?php echo esc_attr($avocation_options['section-icon-'. $avocation_l]);?>"></i></a>
                        </div>
                       <a href="<?php echo esc_url($avocation_options['sectionurl-'.$avocation_l]);?>" target="blank"> <?php echo esc_attr($avocation_options['sectiontitle-'. $avocation_l]);?></a>
                        <p><?php echo esc_attr($avocation_options['sectiondesc-'. $avocation_l]);?></p>
                    </div>
                   <?php
						endif;
					endfor;
					?>
               </div>
                <!--Features End-->  
            </div>

       
        

            <!--Purpose-Business  Start-->
            <?php if(!empty($avocation_options['perfect-title'])){?>
            <div class="business-wrap">
                <span class="mask-overlay"></span>
                <div class="avocation-container  container business-box"> 
					
                    <h2> <?php echo esc_attr($avocation_options['perfect-title']);?> </h2>
                    <p><?php echo wpautop($avocation_options['perfectdesc']);?></p>
                
                
                </div>
            </div><?php }?>
            <!--Purpose-Business End-->

            <!--Our-Blog  Start-->
            <div class="avocation-container  container"> 
                <div class="blog-wrap">
                    <div class="title-box">
						<?php if(!empty($avocation_options['home-blog-title'])){?>
                        <h2 class="content-heading"><?php echo esc_attr($avocation_options['home-blog-title']);?></h2>
                        <p class="description"><?php echo esc_attr($avocation_options['home-blog-sub-title']);?></p>
                    <?php } else { ?><h2 class="content-heading"> <?php echo _e('Our Blog','avocation');?> </h2> <?php } ?>
                    
                    </div>
					
                    <div class="row ">
						<div class="blog-slider" id="blog_slide">
                                            
                              
                           <?php 
								$avocation_args = array(
							
							'ignore_sticky_posts' => '1',		
							'cat'  => $avocation_options['post-category'],
							'meta_query' => array(
							array(
							 'key' => '_thumbnail_id',
							 'compare' => 'EXISTS'
							),
						)
					);	
				$avocation_query = new WP_Query($avocation_args);
				if ($avocation_query->have_posts() ) : while ($avocation_query->have_posts()) : $avocation_query->the_post(); 
			?>
			<div class="blog-box item">
                            
                                
                                  <?php if ( has_post_thumbnail() ) : ?>
						 <div class="blog-box-img">
						 <?php the_post_thumbnail( 'avocation-latest-post-homepage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
					</div>
				<?php endif; ?>
                                
                                <a href="<?php the_permalink();?>" class="blog-title"><?php echo esc_attr(the_title());?></a>
								  <div class="blog-meta">  
                                    <ul>
                                        <li> <i class="fa fa-calendar"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')));?>">  <?php  the_time(get_option('date_format')); ?> </a></li>
                                        <li> <i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">  <?php the_author();?>  </a></li>    
                                     </ul>
                                </div>
                                
                                <div class="our-blog-details">
                                   <?php the_excerpt(); ?>
                                </div>
                            </div> 
                                    
                            <?php endwhile;?>
			 <?php wp_reset_postdata(); ?>
				<?php endif;?>
                           </div>
                    </div>
                </div>
            </div>
            <!--Our-Blog End-->
        </section>
        <!--==============================Section end=================================-->
      
        <?php get_footer();?>