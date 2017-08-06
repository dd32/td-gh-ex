<?php
  global $allowedposttags, $avata_sections;
  $section_title     = avata_option('section_title_team');
  $section_subtitle  = avata_option('section_subtitle_team');
  $section_class     = avata_option('section_css_class_team');
  $section_id        = avata_option('section_id_team');
  $team              = avata_option('section_items_team');
  $fullwidth         =  avata_option('section_fullwidth_team');
  $autoheight        =  avata_option('section_autoheight_team');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  
  ?>
<section class="section section-team <?php echo esc_attr($section_class);?>">
  <div class="<?php echo $container;?>">
  <?php if ( $section_title !='' || $section_subtitle !='' ){?>
    <div class="section-title-area">
      <h2 class="section-title text-center"><?php echo esc_attr($section_title);?></h2>
      <p class="section-subtitle text-center"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>
    </div>
    <?php }?>
    <div class="section-content">
		<div class="row">
    <?php
	$i = 1;
	if (is_array($team) && !empty($team) ):
		foreach($team as $item ):
			if(is_numeric($item['avatar']))
				$item['avatar'] = wp_get_attachment_image_url($item['avatar'],'full');
	?>
    
    <div class="col-md-4">
        <div class="person"> <img src="<?php echo esc_url($item['avatar']);?>" alt="<?php echo esc_attr($item['name']);?>" class="img-responsive">
          <div class="person-content">
            <h4><?php echo esc_attr($item['name']);?></h4>
            <h5 class="role"><?php echo esc_attr($item['role']);?></h5>
            <p><?php echo wp_kses($item['description'], $allowedposttags);?></p>
          </div>
          <ul class="social-icons clearfix">
          	<?php 
				for($i=1;$i<=5;$i++){
					if($item['social_icon_'.$i] !='' ){
			?>
            <li><a target="_blank" href="<?php echo esc_url($item['social_link_'.$i]);?>"><i class="fa fa-<?php echo esc_attr(str_replace('fa-','',$item['social_icon_'.$i]));?>"></i></a></li>
            <?php
					}
				}
			?>
          </ul>
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
</section>