<?php
  global $allowedposttags, $avata_sections;
  $section_title     = avata_option('section_title_slogan');
  $section_subtitle  = avata_option('section_subtitle_slogan');
  $section_content   = avata_option('section_content_slogan');
  $btn_txt           = avata_option('section_btn_txt_slogan');
  $btn_link          = avata_option('section_btn_link_slogan');
  $btn_target        = avata_option('section_btn_target_slogan');
  $section_class     = avata_option('section_css_class_slogan');
  $section_id        = avata_option('section_id_slogan');
  $service           = avata_option('section_slogan');
  $fullwidth         =  avata_option('section_fullwidth_slogan');
  $autoheight        =  avata_option('section_autoheight_slogan');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  ?>
<section class="section section-slogan <?php echo esc_attr($section_class);?>">
  <div class="<?php echo $container;?>">
    <div class="section-content">
        <div class="col-md-8 col-md-offset-2 text-center">
      <h3><?php echo wp_kses($section_content, $allowedposttags);?></h3>
      <a href="<?php echo esc_url($btn_link);?>" target="<?php echo esc_attr($btn_target);?>" class="btn btn-lg btn-primary"><?php echo esc_attr($btn_txt);?></a> </div>


    </div>
  </div>
</section>