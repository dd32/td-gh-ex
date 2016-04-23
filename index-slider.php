<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
$call_us = $current_options['call_us'];
?>
<!-- Slider with Thumbnails -->
<div id="main" role="main">
	<section class="slider">
		<div id="slider" class="flexslider">
			<ul class="slides">
				
				<div>					
					<img alt="slide1" src="<?php echo esc_url($current_options['home_feature']); ?>"/>
					
					<?php if( $current_options['slider_bannerstrip_enable'] == 'yes' ) { ?>
					<div class="container topbar-detail">
						<div class="col-md-3">
							<div class="title">
								<h4><?php if( isset( $current_options['line_one'] ) ){ echo $current_options['line_one']; } ?></h4>
								<h1><?php if( isset( $current_options['line_two'] ) ){ echo $current_options['line_two']; } ?></h1>
							</div>
						</div>
						<div class="col-md-6">
							<p class="description">
								<?php if( isset( $current_options['description'] ) ){ echo $current_options['description']; } ?>
							</p>
						</div>
						<div class="col-md-3"><div class="addr-detail"><address><?php echo esc_attr($current_options['call_us_text']); ?> <strong><?php echo esc_attr($call_us); ?></strong></address></div></div>
					</div>
					<?php } ?>
				</div>
				
			</ul>
		</div>
		
		<div class="slider-thumb-container container">
          <div class="thumb-img-container">
            <?php 	if($current_options['first_thumb_image']!='')  ?>
            <img src="<?php echo $current_options['first_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
          </div>
          <div class="thumb-img-container">
            <?php 	if($current_options['second_thumb_image']!='')  ?>
            <img src="<?php echo $current_options['second_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
          </div>
          <div class="thumb-img-container">
            <?php 	if($current_options['third_thumb_image']!='') ?>
            <img src="<?php echo $current_options['third_thumb_image']; ?>"  alt="Spa Featture" class="slider-thumb" />
          </div>
        </div>
		
	</section>
</div>
<!-- End of Slider with Thumbnails -->
<div class="clearfix"></div>