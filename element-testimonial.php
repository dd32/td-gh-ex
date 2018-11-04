          <?php if (themeszen_get_option('arena_testimonial_status', 'on') == 'on') { ?>   
   
   <div class="testimonial_item_container"> 
                    <div class="testimonial_heading_container"> 
                        <h2 class="themeszen_testimonial_main_head">
	<?php if(esc_html(themeszen_get_option('themeszen_testimonial_main_head')) != NULL){ echo esc_html(themeszen_get_option(		'themeszen_testimonial_main_head'));} else echo __('Our Client Testimonials', 'arena'); ?></h2>
                        <h4 class="themeszen_testimonial_main_desc"><?php if(esc_html(themeszen_get_option('themeszen_testimonial_main_desc')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_main_desc'));} else echo __('What our Clients say.', 'arena');?></h4>
                    </div>
     
                        <div class="testimonial_item_content row"> 
                            <div class="col-md-4 col-sm-4 testimonial_col_wrap">
                                <div class="testimonial_item themeszen_testimonial center">  
                                    <p class="testm_descbox"><?php if(esc_html(themeszen_get_option('themeszen_testimonial')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial'));} else echo __('Very Elegant and Beautiful theme. Sure to go for, get it today and have wonderful experience.', 'arena');?>
									</p>
                                    <div class="testimonial_item_inner themeszen_testimonial_img">  
<img src="<?php if(esc_url(themeszen_get_option('themeszen_testimonial_img')) != NULL){ echo esc_url(themeszen_get_option('themeszen_testimonial_img'));} else echo get_template_directory_uri() . '/images/quote.png' ?>" />
                                        <div class="testimonial_name_wrapper">  
                                            <p><?php if(esc_html(themeszen_get_option('themeszen_testimonial_name')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_name'));} else echo __('Manish gori', 'arena'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 testimonial_col_wrap">
                                <div class="testimonial_item themeszen_testimonial_2 center">    
                                    <p class="testm_descbox"><?php if(esc_html(themeszen_get_option('themeszen_testimonial_2')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_2'));} else echo __('Very Elegant and Beautiful theme. Sure to go for, get it today and have wonderful experience.', 'arena');?>
									</p>
                                    <div class="testimonial_item_inner themeszen_testimonial_img_2">  
<img src="<?php if(esc_url(themeszen_get_option('themeszen_testimonial_img_2')) != NULL){ echo esc_url(themeszen_get_option('themeszen_testimonial_img_2'));} else echo get_template_directory_uri() . '/images/quote.png' ?>" />
                                        <div class="testimonial_name_wrapper">  
                                            <p><?php if(esc_html(themeszen_get_option('themeszen_testimonial_name_2')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_name_2'));} else echo __('Pia', 'arena'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 testimonial_col_wrap">
                                <div class="testimonial_item themeszen_testimonial_3 center">    
      <p class="testm_descbox"><?php if(esc_html(themeszen_get_option('themeszen_testimonial_3')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_3'));} else echo __('Very Elegant and Beautiful theme. Sure to go for, get it today and have wonderful experience.', 'arena');?>
									</p>
                                    <div class="testimonial_item_inner themeszen_testimonial_img_3">  
<img src="<?php if(esc_url(themeszen_get_option('themeszen_testimonial_img_3')) != NULL){ echo esc_url(themeszen_get_option('themeszen_testimonial_img_3'));} else echo get_template_directory_uri() . '/images/quote.png' ?>" />
                                        <div class="testimonial_name_wrapper">  
                                            <p><?php if(esc_html(themeszen_get_option('themeszen_testimonial_name_3')) != NULL){ echo esc_html(themeszen_get_option('themeszen_testimonial_name_3'));} else echo __('WordPress', 'arena'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                </div>
 <?php }  ?>			
              