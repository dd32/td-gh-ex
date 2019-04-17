<?php if (arenabiz_get_option('arenabiz_testimonial_status') != "off") { ?>   
   
   <div class="testimonial_item_container"> 
                    <div class="testimonial_heading_container"> 
                        <h2 class="arenabiz_testimonial_main_head">
	<?php if(esc_html(arenabiz_get_option('arenabiz_testimonial_main_head')) != NULL){ echo esc_html(arenabiz_get_option(		'arenabiz_testimonial_main_head'));} else echo __('Our Client Testimonials', 'arenabiz'); ?></h2>
                        <h4 class="arenabiz_testimonial_main_desc"><?php if(esc_html(arenabiz_get_option('arenabiz_testimonial_main_desc')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_testimonial_main_desc'));} else echo __('What our Clients say.', 'arenabiz');?></h4>
                    </div>
     
                        <div class="testimonial_item_content row"> 
						
			<?php for ($i = 1; $i <= 3; $i++) { 
			
					$arenabiz_testimonial_page_id = esc_html(arenabiz_get_option('arenabiz_testimonial_page'.$i));

		if($arenabiz_testimonial_page_id){
			$args = array( 
                        'page_id' => absint($arenabiz_testimonial_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>			
										
                            <div class="col-md-4 col-sm-4 testimonial_col_wrap">
                                <div class="testimonial_item arenabiz_testimonial center">  
                                    <p class="testm_descbox">
									<?php if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
									</p>
                                    <div class="testimonial_item_inner arenabiz_testimonial_img">  
					<?php 
					if(has_post_thumbnail()){
						$arenabiz_testimonial_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url($arenabiz_testimonial_image[0]).'">';
			} else echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.get_template_directory_uri() . '/images/quote.png'.'">';
					?>
                                        <div class="testimonial_name_wrapper">  
                        <p><?php if(the_title_attribute('echo=0') != NULL){ echo the_title_attribute('echo=0');} else echo __('Manish gori', 'arenabiz'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

				<?php
				endwhile;
			endif;
		}
	} ?>
                        </div>
                       
                </div>
 <?php }  ?>			
              