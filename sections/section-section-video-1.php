<?php
  global $allowedposttags;

  $section_title     = avata_option('section_title_video_1');
  $section_subtitle  = avata_option('section_subtitle_video_1');
  $section_class     = avata_option('section_css_class_testimonial');
  $video             = avata_option('section_url_video_1');
  
  $fullwidth         =  avata_option('section_fullwidth_slogan');
  $autoheight        =  avata_option('section_autoheight_slogan');
  $container         = 'container';
  if ($fullwidth=='1')
 	 $container         = 'container-fluid';
  if($autoheight=='1')
  	$section_class .= ' fp-auto-height';
  ?>

<section class="section section-video-1 <?php echo esc_attr($section_class);?>">
<div class="section-content-wrap">
                <div class="<?php echo esc_attr($container);?> text-center">
                    <!-- Example row of columns -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="video-content">
                            <div class="avate-video-container">
                                <a href="<?php echo esc_attr($video);?>" class="avate-media"><i class="fa fa-play"></i></a>
                                </div>
                                <h2 class="section-title" style="font-size: 32px;font-weight: 400;"><?php echo wp_kses($section_title, $allowedposttags);?></h2>
                                <p class="section-subtitle text-center"><?php echo wp_kses($section_subtitle, $allowedposttags);?></p>

                            </div>
                        </div>
                    </div>
                </div> <!-- /container -->
  </div>
</section>
