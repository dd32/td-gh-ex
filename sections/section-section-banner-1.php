<?php
  global $allowedposttags, $avata_sections;

  $section_class     = avata_option('section_css_class_banner_1');
  $section_id        = avata_option('section_id_banner_1');
  $slider            = avata_option('section_slider_banner_1');
  $autoheight        =  avata_option('section_autoheight_banner_1');
  $autoplay          =  avata_option('section_autoplay_banner_1');
  $timeout           =  avata_option('section_timeout_banner_1');
  
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  
  ?>
<section class="section avata-section section-banner-1 <?php echo esc_attr($section_class);?>">

<div class="carousel-wrap full">
    <div class="avata-slider" data-options='{"autoplay":"<?php echo esc_attr($autoplay);?>","timeout":<?php echo esc_attr($timeout);?>}'>
    <?php 
	if (is_array($slider) && !empty($slider) ):
		foreach($slider as $item ):
		if ($item['image'] !='' ){
			
			$font_color = esc_attr($item['font_color']);
			if(is_numeric($item['image']))
				$item['image'] = wp_get_attachment_image_url($item['image'],'full');
	?>
      <div class="avata-slider-item slide text-center" >
        <div class="text-center avata-fullheight avata-verticalmiddle avata-banner-bgimage" style="background-image: url(<?php echo esc_url($item['image']);?>);">
          <div class="avata-section-content text-center avata-section_slider_banner_1">
            <div class="avata-container">
              <div class="avata-section-title-wrap text-center">
                <h2 class="section-title" style="color:<?php echo $font_color;?>"><span><?php echo esc_attr($item['title']);?></span></h2>
                <p class="section-subtitle" style="color:<?php echo $font_color;?>"><?php echo wp_kses($item['description'], $allowedposttags);?></p>
              </div>
              <div class="avata-button-group">
              <?php if( $item['left_btn_text'] !=''){?>
              <a href="<?php echo esc_url($item['left_btn_link']);?>" target="<?php echo esc_attr($item['left_btn_target']);?>">
              	<span class="btn btn-lg btn-primary"><?php echo esc_attr($item['left_btn_text']);?></span>
              </a>
               <?php } ?>
               <?php if( $item['right_btn_text'] !=''){?>
              <a href="<?php echo esc_url($item['left_btn_link']);?>" target="<?php echo esc_attr($item['right_btn_target']);?>">
              	<span class="btn btn-lg btn-primary btn-outline"><?php echo esc_attr($item['right_btn_text']);?></span>
              </a>
               <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php 
		}
	 endforeach;
	 endif; 
	 ?>
      
    </div>
  </div>
  
  
</section>