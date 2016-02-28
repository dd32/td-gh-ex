<?php
/* The Template Slider
*
*/

//Define all Variables.


	$img1 = esc_url ( get_theme_mod('safreen_slide1') );
	$img2 = esc_url ( get_theme_mod('safreen_slide2') );

	
		?>

			<div id="nivo" >
                         			                                               

<?php if( get_theme_mod( 'safreen_slide1' )){ ?>
							
  <div class='slide'><img src="<?php echo $img1 ?>" data-thumb="<?php echo $img1 ?>" title="#caption_1" /></div>
  
  <?php }else{ ?>
  
  <div class='slide'><img src='<?php echo esc_url(get_template_directory_uri(). "/images/slider2.jpg");?>' data-thumb='<?php echo esc_url(get_template_directory_uri(). "/images/slider2.jpg");?>' title="#caption_2" alt="#caption_1" /></div> 
 
 
  <?php } ?>  
 
 
 	
<?php if( get_theme_mod( 'safreen_slide2' )){ ?>
							
  <div class='slide'><img src="<?php echo $img2 ?>" data-thumb="<?php echo $img2 ?>" title="#caption_2" /></div>
  
  <?php }else{ ?>
 
      <div class='slide'><img src='<?php echo esc_url(get_template_directory_uri(). "/images/slider.jpg");?>' data-thumb='<?php echo esc_url(get_template_directory_uri(). "/images/slider.jpg");?>' title="#caption_1" alt="#caption_1" /></div>        
  <?php } ?>  

				                                    
 
			                                      
                         
                         
			               
			            </div>
                        
                        
                        <?php
			            
	
							$title_safreen1 = esc_html( get_theme_mod('safreen_title_slide1',__('Know More','safreen')) );
							$title_safreen2 = esc_html( get_theme_mod('safreen_title_slide2',__('Know More','safreen')) );
							$desc_safreen1= esc_html( get_theme_mod('safreen_dsc_slide1',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.','safreen')) );
							$desc_safreen2 = esc_html( get_theme_mod('safreen_dsc_slide2',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibendum ac. Sed ultrices leo.','safreen')) );

							$url_safreen1 = esc_url ( get_theme_mod('safreen_first_link1',esc_url('#','safreen')) );
							$url_safreen2 = esc_url ( get_theme_mod('safreen_first_link2',esc_url('#','safreen')) );
							$url2_safreen1 = esc_url ( get_theme_mod('safreen_2nd_link1',esc_url('#','safreen')) );
							$url2_safreen2 = esc_url ( get_theme_mod('safreen_2nd_link2',esc_url('#','safreen')) );

							$bnt_safreen = esc_html( get_theme_mod('safreen_link_name1',__('Know More','safreen')) );
							$bnt2_safreen = esc_html ( get_theme_mod('safreen_link_name2',__('Buy Theme','safreen')) );

							
							
							
							?>
							

                        
                        
 			            
			              <div id="caption_1" class="nivo-html-caption slidecaption">
                                                      <div class='row'>
				                <div class='h-line'></div>
				                
					                <h3><?php echo $title_safreen1 ?></h3>
                                    

					                <p><?php echo $desc_safreen1 ?></p>
                                    
                                   <?php if( !empty($url_safreen1) ):?>
                                    <a href="<?php echo $url_safreen1 ?>" class='btn-slider-safreen'>  <?php echo $bnt_safreen ?>  </a>
                                    <?php endif;?>
                                                                         <?php if( !empty($url2_safreen1) ):?>
                                    <a href="<?php echo $url2_safreen1 ?>" class='btn-border-slider-safreen'> <?php echo $bnt2_safreen ?></a>
                                    <?php endif;?>
                                    
                                     					                </div>
				            </div>


			
	<?php	?>
	
                        
 
                            <div class='row'>
                            <div id="caption_2" class="nivo-html-caption slidecaption">
				                <div class='h-line'></div>
				                
					                
                                    <h3><?php echo $title_safreen2 ?></h3>
                                    <p><?php echo $desc_safreen2 ?></p>

                                   
                                    <?php if( !empty($url_safreen2) ):?>
                                    <a href="<?php echo $url_safreen2 ?>" class='btn-slider-safreen'>  <?php echo $bnt_safreen ?>  </a>
                                    <?php endif;?>
                                    
                                    
                                     <?php if( !empty($url2_safreen2) ):?>
                                    <a href="<?php echo $url2_safreen2 ?>" class='btn-border-slider-safreen'> <?php echo $bnt2_safreen ?></a>
                                    <?php endif;?>
					                </div>
				            </div>

			     			
	<?php ?>	  
	
	 