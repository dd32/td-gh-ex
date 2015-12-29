<?php
/**
* @Theme Name	:	Becorp
* @file         :	index-slider.php
* @package      :	Becorp
* @author       :	Asiathemes
* @license      :	license.txt
* @filesource   :	wp-content/themes/becorp/index-slider.php
*/
?>

<!-- Slider Section -->	
<?php 
$becorp_options=theme_default_data(); 
$slider_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); 
if($slider_setting['home_banner_enabled'] == 1 ) {
?>
<div class="homepage-mycarousel">
	<div id="main-slider" class="carousel <?php echo $slider_setting['slider_options']; ?> " data-ride="carousel"
	<?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
		<li data-target="#main-slider" data-slide-to="0" class="active"></li>
		<li data-target="#main-slider" data-slide-to="1"></li>
		<li data-target="#main-slider" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
		<div class="carousel-inner" role="listbox">
		<div class="item active">
		<?php if($slider_setting['slider_image_one'] !='') { ?>
		  <img src="<?php echo esc_url($slider_setting['slider_image_one']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_one']); ?>">
		  <?php } ?>
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
						<?php if($slider_setting['slider_image_title_one'] !='') { ?>
                            <h2><span><?php echo esc_attr($slider_setting['slider_image_title_one']); ?></span></h2>
							<?php } ?>
                            <br>
							<?php if($slider_setting['slider_image_description_one'] !='') { ?>
                            <h3><span><?php echo esc_attr($slider_setting['slider_image_description_one']); ?></span></h3>
							<?php } ?>
                            <br>
							<?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a class="btn btn-theme btn-sm btn-min-block" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
						</div>
                     </div>
		</div>
		<div class="item">
		  <?php if($slider_setting['slider_image_two'] !='') { ?>
		  <img src="<?php echo esc_url($slider_setting['slider_image_two']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_two']); ?>">
		  <?php } ?>
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
						<?php if($slider_setting['slider_image_title_two'] !='') { ?>
                            <h2><span><?php echo esc_attr($slider_setting['slider_image_title_two']); ?></span></h2>
							<?php } ?>
                            <br>
							<?php if($slider_setting['slider_image_description_two'] !='') { ?>
                            <h3><span><?php echo esc_attr($slider_setting['slider_image_description_two']); ?></span></h3>
							<?php } ?>
                            <br>
                            <?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a class="btn btn-theme btn-sm btn-min-block" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
						</div>
                     </div>
		</div>
		<div class="item">
		  <?php if($slider_setting['slider_image_three'] !='') { ?>
		  <img src="<?php echo esc_url($slider_setting['slider_image_three']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_three']); ?>">
		  <?php } ?>
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
						<?php if($slider_setting['slider_image_title_three'] !='') { ?>
                            <h2><span><?php echo esc_attr($slider_setting['slider_image_title_three']); ?></span></h2>
							<?php } ?>
                            <br>
							<?php if($slider_setting['slider_image_description_three'] !='') { ?>
                            <h3><span><?php echo esc_attr($slider_setting['slider_image_description_three']); ?></span></h3>
							<?php } ?>
                            <br>
                            <?php if($slider_setting['slider_button_text'] !='') { ?>
                            <a class="btn btn-theme btn-sm btn-min-block" href="<?php if($slider_setting['slider_image_link'] !='') { echo esc_url($slider_setting['slider_image_link']); } ?>" <?php if($slider_setting['slider_button_tab'] ==1) { echo "target='_blank'"; } ?> ><?php echo esc_attr($slider_setting['slider_button_text']) ?></a>
							<?php } ?>
						</div>
                     </div>
		</div>
		</div>  
		<!-- Pagination --> 
		<ul class="carou-direction-nav">
			<li><a class="carou-prev" href="#main-slider" data-slide="prev"></a></li>
			<li><a class="carou-next" href="#main-slider" data-slide="next"></a></li>
		</ul>
		<!-- /Pagination -->		
		</div>
	</div>
</div>
<!-- /Slider Section -->
<?php } ?>