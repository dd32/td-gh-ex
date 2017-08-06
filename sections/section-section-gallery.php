<?php
  global $allowedposttags, $avata_sections;
  $section_title     = avata_option('section_title_gallery');
  $section_subtitle  = avata_option('section_subtitle_gallery');
  $section_class     = avata_option('section_css_class_gallery');
  $section_id        = avata_option('section_id_gallery');
  $gallery           = avata_option('section_items_gallery');
  $fullwidth         = avata_option('section_fullwidth_gallery');
  $autoheight        =  avata_option('section_autoheight_gallery');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  
  ?>
<section class="section section-gallery <?php echo esc_attr($section_class);?>">
  <div class="<?php echo $container;?>">
  <?php if ( $section_title !='' || $section_subtitle !='' ){?>
    <div class="section-title-area">
      <h2 class="section-title text-center"><?php echo esc_attr($section_title);?></h2>
      <p class="section-subtitle text-center"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
    </div>
    <?php }?>
    <div class="section-content">
		<div class="row no-gutter">
    <?php
	$i = 1;
	if (is_array($gallery) && !empty($gallery) ):
		foreach($gallery as $item ):
	?>
    <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="<?php echo esc_url($item['image']);?>" class="work-box"> <img src="<?php echo esc_url($item['image']);?>" alt="<?php echo esc_attr($item['title']);?>">
        <div class="overlay">
          <div class="overlay-caption">
            <p><i class="fa fa-search" aria-hidden="true"></i></p>
          </div>
        </div>
        </a> 
        </div>
     <?php
	 $i++;
	 endforeach;
	 endif; 
	 ?>
		</div>
    </div>
  </div>
</section>