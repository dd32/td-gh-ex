<section id="ct_slider" class="ct_section ct_slider ct_section_1">

<div  class="section_slider ">
  <!-- Carousel================================================== -->
  <div id="myCarousel" class="carousel slide ct_slider_warp" data-ride="carousel"  data-interval="<?php echo get_theme_mod( 'slide_time','5000'); ?> " >
  <!-- Indicators -->
    <ol class="carousel-indicators">
 
	<?php
	  $i=1;
	  $key = 'slider';	
	  $default_content = akaka_section_content_default($key);
	  

	  $repeater_value = get_theme_mod( 'repeater_slider',$default_content); 
		
      $j=0;
      
      if ( ! empty( $repeater_value ) ) :	
        foreach ( $repeater_value as $row ) : 
          if ( isset( $row[ 'slider_image' ] ) && !empty( $row[ 'slider_image' ] ) ) :
    ?>  
           <li data-target="#myCarousel" data-slide-to="<?php echo $j;?>" <?php if($j==0){echo 'class="active"';}?>></li> 
    <?php   
          endif;
          
          $j++;
        endforeach;	
      endif;
    ?>
    </ol>
    
    <div class="carousel-inner" role="listbox">
	<?php  
      $j=0;
	 // $slide_image =array();
      
      if ( ! empty( $repeater_value ) ) :	
        foreach ( $repeater_value as $row ) : 
          if ( isset( $row[ 'slider_image' ] ) && !empty( $row[ 'slider_image' ] ) ) :

     ?>       
            
      <div class="item ct_slider_item_<?php echo $j+1;?> <?php if($j==0){echo 'active';}?>" >
          
              <div class="carousel-caption">
                  <div class="carousel_caption_warp">

                      <div class="slider_text">
						<?php if ( isset( $row[ 'slider_title' ] ) && !empty( $row[ 'slider_title' ] ) ) : ?>
                            <h1 class="slider_title">
                                <?php echo esc_html( $row[ 'slider_title' ] ); ?>
                            </h1>
                        <?php endif; ?>                      

						<?php if ( isset( $row[ 'slider_desc' ] ) && !empty( $row[ 'slider_desc' ] ) ) : ?>
                            <p class="ct_slider_text">
                                <?php echo esc_html( $row[ 'slider_desc' ] ); ?>
                            </p>
                        <?php endif; ?>
                      </div>
					  
                      <p><a class="btn btn-lg btn-primary" href="<?php if ( isset( $row[ 'slider_url' ] ) && !empty( $row[ 'slider_url' ] ) ){echo esc_url( $row[ 'slider_url' ] ); } ?>" role="button">
                        <?php if ( isset( $row[ 'slider_button_text' ] ) && !empty( $row[ 'slider_button_text' ] ) ){echo esc_html( $row[ 'slider_button_text' ] ); }else{esc_html_e( 'Download Now', 'akaka' );} ?> 
                      </a></p>


                  </div>
                  <div class="clear"></div>
              </div>
          
      </div><!--div class="item ct_slider_item  -->           
        
        
     <?php
          endif;
          
          $j++;
        endforeach;	
      endif;
    ?>

    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        <span class="sr-only"><?php _e('Previous', 'akaka');?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
        <span class="sr-only"><?php _e('Next', 'akaka');?></span>
    </a>  
    
  </div><!-- /.carousel -->

</div>
<div class="clear"></div>
</section>