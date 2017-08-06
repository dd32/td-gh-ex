<?php
  global $allowedposttags, $avata_sections;
  $section_title     = avata_option('section_title_testimonial');
  $section_subtitle  = avata_option('section_subtitle_testimonial');
  $section_class     = avata_option('section_css_class_testimonial');
  $section_id        = avata_option('section_id_testimonial');
  $testimonial              = avata_option('section_items_testimonial');
  $fullwidth         =  avata_option('section_fullwidth_testimonial');
  $autoheight        =  avata_option('section_autoheight_testimonial');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  
  ?>

<section class="section section-testimonial <?php echo esc_attr($section_class);?>">
  <div class="<?php echo $container;?>">
  <?php if ( $section_title !='' || $section_subtitle !='' ){?>
  <div class="section-title-area">
    <h2 class="section-title text-center"><?php echo esc_attr($section_title);?></h2>
    <p class="section-subtitle text-center"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
  </div>
  <?php }?>
  <div class="section-content">
    <div class="row">
      <div class="col-md-12">
      <div class="wrap-testimonial">
        <div class="owl-carousel-fullwidth owl-carousel owl-theme">
          <?php
	$i = 1;
	if (is_array($testimonial) && !empty($testimonial) ):
		foreach($testimonial as $item ):
	?>
          <div class="item">
            <div class="testimonial-slide text-center">
              <figure> <img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>"> </figure>
              <blockquote>
                <p>"<?php echo wp_kses($item['description'], $allowedposttags);?>"</p>
              </blockquote>
              <span><?php echo esc_attr($item['name']);?>, <?php echo esc_attr($item['role']);?></span>
               </div>
               </div>
            <?php
	 $i++;
	 endforeach;
	 endif; 
	 ?>
     </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
