<?php
  global $allowedposttags, $avata_sections;
  $section_title     = avata_option('section_title_service_1');
  $section_subtitle  = avata_option('section_subtitle_service_1');
  $section_class     = avata_option('section_css_class_service_1');
  $section_id        = avata_option('section_id_service_1');
  $service           = avata_option('section_items_service_1');
  $fullwidth         =  avata_option('section_fullwidth_service_1');
  $autoheight        =  avata_option('section_autoheight_service_1');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
	 
  ?>
<section class="section section-service-1 <?php echo esc_attr($section_class);?>">
  <div class="<?php echo $container;?>">
  <?php if ( $section_title !='' || $section_subtitle !='' ){?>
    <div class="section-title-area">
      <h2 class="section-title text-center"><?php echo esc_attr($section_title);?></h2>
      <p class="section-subtitle text-center"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
    </div>
    <?php }?>
    <div class="section-content">
    <div class="avata-service-style-1">
    <?php 
	if (is_array($service) && !empty($service) ):
		foreach($service as $item ):
	?>
    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 avata-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1.1s; animation-name: fadeInUp;">
					<div class="avata-icon">
                    <?php if($item['image']!=''){?>
                   <img src="<?php echo esc_url($item['image']);?>" alt="<?php echo esc_attr($item['title']);?>"/>
                    <?php }else{?>
                    <i class="fa fa-<?php echo esc_attr(str_replace('fa-','',$item['icon']));?>"></i>
                    <?php }?>
                    </div>
					<div class="avata-desc">
						<h3><?php echo esc_attr($item['title']);?></h3>
						<p><?php echo wp_kses($item['description'], $allowedposttags);?></p>
					</div>	
				</div>
     <?php 
	 endforeach;
	 endif; 
	 ?>
     </div>
     <div class="content-widgets">
      <?php dynamic_sidebar("section-service-1"); ?>
      </div>
    </div>
  </div>
</section>