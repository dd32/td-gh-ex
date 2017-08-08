<?php
  global $allowedposttags;
  $section_title     = avata_option('section_title_intro_1');
  $section_subtitle  = avata_option('section_subtitle_intro_1');
  $section_content   = avata_option('section_content_intro_1');
  $section_image     = avata_option('section_image_intro_1');
  $section_class     = avata_option('section_css_class_intro_1');
  $section_id        = avata_option('section_id_intro_1');
  $service           = avata_option('section_intro_1');
  $layout            =  avata_option('section_layout_intro_1');
  $fullwidth         =  avata_option('section_fullwidth_intro_1');
  $autoheight        =  avata_option('section_autoheight_intro_1');
  if(is_numeric($section_image))
		$item['image'] = wp_get_attachment_image_url($section_image,'full');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  
  ?>
<section class="section section-intro-1 <?php echo esc_attr($section_class);?>">
<div class="section-content-wrap">
  <div class="<?php echo $container;?>">
    <div class="section-content">
    
    <div class="intro-container">
    
    <?php if( $layout == '1'){?>
    
     <div class="col-md-6">
    <div class="intro-content">
      <div class="avata-section-title-wrap">
        <h2 class="section-title avata-section_title_intro_1"><?php echo esc_attr($section_title);?></h2>
        <p class="section-subtitle avata-section_subtitle_intro_1"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
      </div>
      <div class="avata-intro">
        <div class="avata-intro-content avata-section_content_intro_1">
         <?php echo wp_kses(do_shortcode($section_content), $allowedposttags);?>
        </div>
        </div>
    </div>
  </div>
  
  <div class="col-md-6 no-padding avata-section_image_intro_1">
     <img src="<?php echo esc_url($section_image);?>" alt="<?php echo esc_attr($section_title);?>"> 
    </div>
    
   
   <?php }else{?>
   <div class="col-md-6 no-padding avata-section_image_intro_1">
     <img src="<?php echo esc_url($section_image);?>" alt="<?php echo esc_attr($section_title);?>"> 
    </div>
    
    <div class="col-md-6">
    <div class="intro-content">
      <div class="avata-section-title-wrap">
        <h2 class="avata-section-title avata-section_title_intro_1"><?php echo esc_attr($section_title);?></h2>
        <p class="avata-section-subtitle avata-section_subtitle_intro_1"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
      </div>
      <div class="avata-intro">
        <div class="avata-intro-conten avata-section_content_intro_1">
         <?php echo wp_kses(do_shortcode($section_content), $allowedposttags);?>
        </div>
        </div>
    </div>
  </div>
   <?php }?>
  
</div>

</div>
    </div>
  </div>
</section>