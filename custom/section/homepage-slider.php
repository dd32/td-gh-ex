<?php
	$key = 'slider';	
	$default_content = best_restaurantsection_content_default($key);
 
	$repeater_value = get_theme_mod( 'repeater_slider',$default_content); 
	$slider_li = '';
	$str_active = '';
	
	$j=0;
	
	if ( ! empty( $repeater_value ) ) :	
	  foreach ( $repeater_value as $row ) : 
		if ( isset( $row[ 'slider_page' ] ) && !empty( $row[ 'slider_page' ] ) && $row[ 'slider_page' ]>0 ) :
		
		  if($j==0){ $str =  'class="active"';}
		  $slider_li .= '<li data-target="#myCarousel" data-slide-to="'.$j.'" '.$str_active.'></li>';
		  $sliders[$j] = best_restaurant_get_slider_details($row[ 'slider_page' ]);
		  
		  $j++;
		endif;

	  endforeach;
	endif;
	
	if( !empty($sliders)){
?>
<section id="ct_slider" class="ct_section ct_slider ct_section_1">

<div  class="section_slider ">

  <div id="myCarousel" class="carousel slide ct_slider_warp" data-ride="carousel"  data-interval="<?php echo esc_attr(get_theme_mod( 'slide_time','5000')); ?> " >

    <div class="carousel-inner" role="listbox">
	<?php  
      $k=0;
    
      if ( ! empty( $repeater_value ) ) :	
        foreach ( $repeater_value as $row ) : 
          if ( isset( $row[ 'slider_page' ] ) && !empty( $row[ 'slider_page' ] ) ) :

     ?>       
            
      <div class="item ct_slider_item_<?php echo $k+1;?>  <?php if($k==0){echo 'active';}?> " >
      
              <div class="carousel-caption">
                  <div class="carousel_caption_warp">

                      <div class="slider_text">
						<?php if ( isset( $sliders[$k][ 'content' ] ) && !empty($sliders[$k][ 'content' ] ) ) : ?>
                            <p class="ct_slider_text">
                                <?php echo esc_html( $sliders[$k][ 'content' ] ); ?>
                            </p>
                        <?php endif; ?>                      
                      
                      
						<?php if ( isset( $sliders[$k][ 'title' ] ) && !empty( $sliders[$k][ 'title' ] ) ) : ?>
                            <h1 class="slider_title">
                                <?php echo esc_html( $sliders[$k][ 'title' ] ); ?>
                            </h1>
                        <?php endif; ?>                      


                      </div>
					  
                      <p><a class="btn btn-lg btn-primary" href="<?php if ( isset( $row[ 'slider_url' ] ) && !empty( $row[ 'slider_url' ] ) ){echo esc_url( $row[ 'slider_url' ] ); } ?>" role="button">
                        <?php if ( isset( $row[ 'slider_button_text' ] ) && !empty( $row[ 'slider_button_text' ] ) ){echo esc_html( $row[ 'slider_button_text' ] ); }else{esc_html_e( 'Download Now', 'best-restaurant' );} ?> 
                      </a></p>


                  </div>
                  <div class="clear"></div>

              </div>
          
      </div>         

     <?php
	 		$k++;
          endif;
          
          
        endforeach;	
      endif;
    ?>

    </div>
   	<?php   if($j > 1){  ?>   
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        <span class="sr-only"><?php esc_html_e('Previous', 'best-restaurant');?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
        <span class="sr-only"><?php esc_html_e('Next', 'best-restaurant');?></span>
    </a>  
  	<?php   }  ?>    
  </div>

</div>
<div class="clear"></div>
</section>

<?php } ?>